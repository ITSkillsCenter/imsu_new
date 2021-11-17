<?php

namespace App\Http\Controllers\student;

use App\BorrowedCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentInfo;
use App\Course;
use App\Course_Student;
use App\Department;
use App\Current_Semester_Running;
use App\FeeHistory;
use App\Helper\Helper;
use App\ManageCourseCreditUnit;
use App\Semester;
use App\Syllabus;
use DB;
require_once __DIR__.'/phpqrcode/qrlib.php';
use QRcode;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class StudentCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

      
    protected $semesters=[
        '1st' => '1st Semester',
        '2nd' => '2nd Semester',
    ];

    public function index()
    {
    	
    	//return $courses;
        

    	return view('admin_student.course.home');
    }

    public function course_reg(Request $request){
        $student = Helper::student_info();
        $curr_semester = Helper::current_semester();
        $current_session = Helper::current_session_details();
        $current_semester = Helper::current_semester_details();
        $dept_id = $student->dept_id;
        $department = Department::find($dept_id);
        $session = Current_Semester_Running::where('id', $curr_semester)->first();
        $semesters = Semester::all();
        $check_for_payment_history = FeeHistory::where(['session_id' => $session->id, 'student_id' => $student->id])->count();
        $pending_payments = FeeHistory::where(['student_id' => $student->id, 'status' => 'unpaid'])->count();
        $all_sessions = Current_Semester_Running::all();
        

        if($request->isMethod('post')){
            $semester = base64_encode($request->semester);
            $level = base64_encode($request->level);
            $session = base64_encode($request->session_id);

            return redirect('/show-reg/'.$session.'/'.$semester.'/'.$level);
            
        }

        $levels = [100, 200, 300, 400, 500, 600];

        return  view('admin_student.course.course',compact('current_session','current_semester', 'syllabus_courses','student','session','semesters','department','all_sessions','pending_payments', 'check_for_payment_history','levels'));
    }

    public function select_course_reg(Request $request){
        $student = Helper::student_info();
        $curr_semester = Helper::current_semester();
        $current_session = Helper::current_session_details();
        $current_semester = Helper::current_semester_details();
        $dept_id = $student->dept_id;
        $department = Department::find($dept_id);
        $session = Current_Semester_Running::where('id', $curr_semester)->first();
        $semesters = Semester::all();
        $check_for_payment_history = FeeHistory::where(['session_id' => $session->id, 'student_id' => $student->id])->count();
        $pending_payments = FeeHistory::where(['student_id' => $student->id, 'status' => 'unpaid'])->count();
        $all_sessions = Current_Semester_Running::all();
        

        if($request->isMethod('post')){
            $semester = base64_encode($request->semester);
            $level = base64_encode($request->level);
            $session = base64_encode($request->session_id);

            return redirect('/show-selected-reg/'.$session.'/'.$semester.'/'.$level);
            
        }

        $levels = [100, 200, 300, 400, 500, 600];

        return  view('admin_student.course.select_registration',compact('current_session','current_semester', 'syllabus_courses','student','session','semesters','department','all_sessions','pending_payments', 'check_for_payment_history','levels'));
    }

    public function view_reg(Request $request, $session, $semester, $level){

        $levels = [100, 200, 300, 400, 500, 600];
        $queryLevelArray = array();

        $student = Helper::student_info();
        $curr_semester = Helper::current_semester();
        $dept_id = $student->dept_id;
        $semester = base64_decode($semester);
        $semester = $semester == 1 ? '1st' : '2nd';
        $session = base64_decode($session);
        $level = base64_decode($level);

        
        foreach($levels as $lev){
            $level  = (int) $level;
            if($level >= $lev){
                $queryLevelArray[] = $lev;
            }
        }


        $department = Department::find($dept_id);

        $courses = Course::where(['dept_id' => $dept_id, 'level' => $level, 'semester' => $semester])->get();
        $compulsory_courses = Course::where(['dept_id' => $dept_id, 'semester' => $semester, 'level' => $level, 'type' => 'compulsory'])->get();
        $elective_courses = Course::where(['dept_id' => $dept_id, 'semester' => $semester, 'level' => $level])->where('type', '!=', 'compulsory')->get();
        $borrowed_courses = BorrowedCourse::select('courses.*', 'borrowed_courses.id as bid', 'borrowed_courses.owner_id', 'borrowed_courses.dept_borrow_id' ,'borrowed_courses.status as bstatus')
        ->join('courses', 'courses.id', '=', 'course_id')->where(['dept_borrow_id' => $dept_id, 'level' => $level, 'borrowed_courses.status' => 'approved'])->get();
        $manageCourseCreditUnit = ManageCourseCreditUnit::where('department_id', $dept_id)->where('level', $level)->first();
        $reg_courses = Course_Student::select('courses.*', 'courses_student.id as cid', 'course_status')->join('courses', 'course_id', '=', 'courses.id')
                    ->where(['session_id' => $session, 'courses_student.semester' => $semester, 'courses_student.level' => $level])->get();
        $reg_arr = [];
        foreach($reg_courses as $single){
            $reg_arr[] = $single->id;
        }
        
        if($request->isMethod('post')){
            try{

                $previouseStudentCourses = Course_Student::with('course')->where('level', $level)
                                            ->where('department', $dept_id)->get();
                $manageCourseCreditUnit = ManageCourseCreditUnit::where('department_id', $dept_id)
                                            ->where('level', $level)->first();

                $totalCreditUnit = 0;
                $previouselyAddedCreditUnit = 0;
                $totalSelectedCreditUnit = 0;

                foreach($request->course_id as $course){
                    $totalCreditUnit = $totalCreditUnit + Course::where('id', $course)->first()->unit;
                    $totalSelectedCreditUnit = $totalSelectedCreditUnit + Course::where('id', $course)->first()->unit;
                }
                 
                if($previouseStudentCourses->count() > 0){
                    foreach($previouseStudentCourses as $studentCourse){
                        $totalCreditUnit = $totalCreditUnit + $studentCourse->course->unit;
                        $previouselyAddedCreditUnit = $previouselyAddedCreditUnit + $studentCourse->course->unit;
                    }
                }

                if($manageCourseCreditUnit->max_credit_unit){
                    if($totalCreditUnit > $manageCourseCreditUnit->max_credit_unit){
                        throw new \Exception("Maximum credit unit for your departnent is {$manageCourseCreditUnit->max_credit_unit}, you have added  {$previouselyAddedCreditUnit} and just selected {$totalSelectedCreditUnit}, making a total of  {$totalCreditUnit}", 1);
                    }
                }

                foreach($request->course_id as $course){
                    $data['session_id'] = $session;
                    $data['semester'] = $semester;
                    $data['level'] = $level;
                    $data['student_id'] = $student->matric_number;
                    $data['course_id'] = $course;
                    $data['department'] = $dept_id;

                    Course_Student::create($data);
                }
                return back()->with('success', count($request->course_id) . ' courses Added');
                
            }catch(\Throwable $th){
                return back()->with('error', $th->getMessage());
            }
        }

        return view('admin_student.course.view_reg',compact('borrowed_courses','manageCourseCreditUnit','compulsory_courses','elective_courses','student','curr_semester','semester','department','level', 'courses','reg_courses', 'reg_arr', 'session'));

    }

    public function view_selected_reg(Request $request, $session, $semester, $level)
    {
        $levels = [100, 200, 300, 400, 500, 600];
        $queryLevelArray = array();

        $student = Helper::student_info();
        $curr_semester = Helper::current_semester();
        $dept_id = $student->dept_id;
        $semester = base64_decode($semester);
        $semester = $semester == 1 ? '1st' : '2nd';
        $session = base64_decode($session);
        $level = base64_decode($level);

        foreach($levels as $lev){
            $level  = (int) $level;
            if($level >= $lev){
                $queryLevelArray[] = $lev;
            }
        }

        $department = Department::find($dept_id);
        $courses = Course::where(['dept_id' => $dept_id, 'level' => $level, 'semester' => $semester])->get();
        $compulsory_courses = Course::where(['dept_id' => $dept_id, 'semester' => $semester, 'level' => $level, 'type' => 'compulsory'])->get();
        $elective_courses = Course::where(['dept_id' => $dept_id, 'semester' => $semester, 'level' => $level])->where('type', '!=', 'compulsory')->get();
        $manageCourseCreditUnit = ManageCourseCreditUnit::where('department_id', $dept_id)->where('level', $level)->first();
        $reg_courses = Course_Student::select('courses.*', 'courses_student.id as cid')->join('courses', 'course_id', '=', 'courses.id')
                    ->where(['session_id' => $session, 'courses_student.semester' => $semester, 'courses_student.level' => $level])->get();
        $reg_arr = [];
        foreach($reg_courses as $single){
            $reg_arr[] = $single->id;
        }

        return view('admin_student.course.view_selected_reg',compact('manageCourseCreditUnit','compulsory_courses','elective_courses','student','curr_semester','semester','department','level', 'courses','reg_courses', 'reg_arr', 'session'));

    }

    public function apply_carry_over(Request $request){
        $student = Helper::student_info();
        $matric_number = $student->matric_number;
        $session = Helper::current_session_details()->id;
        $semester = Helper::current_semester_details();
        $semester = $semester->id == '1' ? '1st' : '2nd';
        $previous = Course_Student::where(['student_id' => $matric_number])->where('session_id', '!=', $session)->where('semester', '!=', $semester)->get();
        if($request->isMethod('post')){
            $previous = Course::where(['semester' => $request->semester, 'dept_id' => $student->dept_id, 'level' =>$request->level])->get();
        }

        

        $previousPending = Course_Student::where(['student_id' => $matric_number, 'course_status' => 'pending', 'reg_type' => 'carry over'])->get();
        return  view('admin_student.course.apply_for_carry_over',compact('previous', 'previousPending', 'student'));

    }

    public function remove_carry_over_course(Request $request, $cid){
        $remove = Course_Student::find($cid)->delete();
        if($remove){
            return back()->with('success', 'Carry over removed successfully');
        }else{
            return back()->with('error', 'An error occured');
        }
    }

    public function apply_carry_over_course(Request $request, $cid){
        $student = Helper::student_info();
        $matric_number = $student->matric_number;
        $session = Helper::current_session_details()->id;
        $semester = Helper::current_semester_details();
        $semester = $semester->id == '1' ? '1st' : '2nd';

        $data['session_id'] = $session;
        $data['semester'] = $semester;
        $data['level'] = $student->level;
        $data['student_id'] = $student->matric_number;
        $data['course_id'] = $cid;
        $data['department'] = $student->dept_id;
        $data['reg_type'] = 'carry over';
        $data['course_status'] = 'pending';

        $save = Course_Student::updateOrCreate(
            [
                'student_id' => $student->matric_number,
                'course_id' => $cid,
                'reg_type' => 'carry over',
                'course_status' => 'pending'
            ],
            $data
        );

        if($save){
            return back()->with('success', 'Application successfull, await approval');
        }else{
            return back()->with('error', 'An error occured');
        }
    }

    public function reg_course(Request $request){
        try{
            $student = Helper::student_info();
            $curr_semester = Helper::current_semester();
            $dept_id = $student->dept_id;
            $semester = $request->semester;
            $level = $request->level;
            $department = Department::find($dept_id);

            if($request->isMethod('post')){
                foreach($request->course_id as $course){
                    $data['session_id'] = $curr_semester;
                    $data['semester'] = $semester;
                    $data['level'] = $level;
                    $data['student_id'] = $student->matric_number;
                    $data['course_id'] = $$course;
                    $data['department'] = $dept_id;
                    Course_Student::create($data);
                }
                return back()->with('success', count($request->course_id) . 'Courses Added');
            }
            $courses = Course::where(['dept_id' => $dept_id, 'level' => $level, 'semester' => $semester])->get();

            return view('admin_student.course.view_reg',compact('student','curr_semester','semester','department','level', 'courses'));
            
        }catch(\Throwable $th){
            return back()->with('error', $th->getMessage());
        }

    }

    public function remove_course(Request $request, $id){
        $rem = Course_Student::find($id);
        $rem->delete();
        return back()->with('success', 'Course Removed Successfully');
    }

    public function course()
    {
        $student = Helper::student_info();
        $dept_id = $student->Program;
        $semester_id = Current_Semester_Running::where('title', $student->Enrollment_Semester)->value('id');
        // return $dept_id.'-'.$semester_id;
        $syllabus_courses = Syllabus::with('course:id,course_code,credit,course_name')->where('department_id',$dept_id)
                                    ->where('session_id',$semester_id)
                                    ->get();
        // return $syllabus_courses;
        return  view('admin_student.course.course',compact('syllabus_courses','student'));
    }

    public function course_fillter($level)
    {
        $id = Session::get('student_id');
        $dept = StudentInfo::select('Program')->where('Registration_Number',$id)->first();
        $courses = DB::table('courses')->where('Program',$dept->Program)->where('levelTerm',$level)
                ->where('status',1)
                ->orderBy('levelTerm','ASC')
                ->get();
        return response()->json( $courses);
    }

    public function generate_exam_pass(Request $request, $session, $semester, $level){
        $id = Session::get('student_id');
        $student = StudentInfo::where(['registration_number' =>$id])->first();
        // dd($student);
        $semester = base64_decode($semester);
        $session = base64_decode($session);
        $level = base64_decode($level);
        
        $reg_courses = Course_Student::join('courses', 'course_id', '=', 'courses.id')
                    ->where(['session_id' => $session, 'courses_student.semester' => $semester, 'courses_student.level' => $level])->get();
        // dd($reg_courses, $session, $student->level, $sm[0]);
        $reg_arr = [];
        foreach($reg_courses as $single){
            $reg_arr[] = $single->course_id;
        }
        return view('admin_student.view_exam_pass',compact('student', 'reg_courses', 'semester', 'session', 'level'));
    }

    public function select_exam_pass(Request $request){
        $student = Helper::student_info();
        $curr_semester = Helper::current_semester();
        $dept_id = $student->dept_id;
        $department = Department::find($dept_id);
        $session = Current_Semester_Running::where('id', $curr_semester)->first();
        $semesters = Semester::all();
        $check_for_payment_history = FeeHistory::where(['session_id' => $session->id, 'student_id' => $student->id])->count();
        $pending_payments = FeeHistory::where(['student_id' => $student->id, 'status' => 'unpaid'])->count();
        $all_sessions = Current_Semester_Running::all();

        if($request->isMethod('post')){
            $semester = base64_encode($request->semester);
            $level = base64_encode($request->level);
            $session = base64_encode($request->session_id);
            // dd($semester, $level, $session);
            return redirect('/show-exam-pass/'.$session.'/'.$semester.'/'.$level);
            
        }

        return view('admin_student.course.select_exam_pass',compact('student', 'curr_semester', 'semesters', 'session', 'check_for_payment_history', 'pending_payments', 'all_sessions'));
    }
}

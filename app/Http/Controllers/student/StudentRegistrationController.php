<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentInfo;
use App\Course;
use App\User;
use App\Registration;
use App\Syllabus;
use App\Current_Semester_Running;
use App\Mark;
use App\TE_Main;
use App\Event;
use App\Course_Student;
use Session;
use App\Notifications\StudentRegistration;
use Helper;
use Illuminate\Support\Facades\DB;

class StudentRegistrationController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('student');
    }

    public function index()
    {
        /**----------------- Temporarily Turn Off Service Starts -----------------------**/
        // $msg = Helper::server_maintenance();
        // if($msg == true){
        //     return "Server Under Maintenance, Please Wait...............";
        // }
        /**----------------- Temporarily Turn Off Service Ends -----------------------**/

        $reg_type = NULL;
        return view('admin_student.registration.index', compact('reg_type'));
    }

    public function type($reg_type){
        try {
            /**--------------------------- Checking Dates For Registration Types Starts --------------------------**/
        
            /** If Registration Type is Regular and Type ID is 1 Starts*/
            if($reg_type == 1){
                $session_id = Current_Semester_Running::where('title',Helper::current_semester())->value('id');
                $event = Event::with('type')
                                ->where('session_id',$session_id)
                                ->where('type_id','1')
                                ->first();
                $current_date = \Carbon\Carbon::now()->format('Y-m-d');
                // dd($current_date, $event->starts, $event->ends);
                // return $current_date;
                $diff = \Carbon\Carbon::parse($current_date)->between(\Carbon\Carbon::parse($event->starts), \Carbon\Carbon::parse($event->ends));
                if($diff == false){
                    toastr()->error('Timeline does not match Please check the event section.','Error');
                    return redirect()->back();
                }
                
                $student = Helper::student_info();
                // return $student;
                                        /** Checking Teacher's Evaluation Starts **/
                $session = Registration::where('student_id', $student->Registration_Number)
                                            ->where('levelTerm', $student->Current_semester)
                                            ->whereIn('reg_type', [1,2])
                                            ->latest()
                                            ->first();
                // return $session;
                // checking if teachers' evaluation performed for current semester
                // $check = TE_Main::where('student_id', $student->Registration_Number)
                //                 ->where('semester_id', $session->semester)
                //                 ->get();
                // // dd($check);
                // // return $check;
                // if($check->isEmpty()){
                //     toastr()->error('Complete Teachers Evaluation for '.$session->semester,'Error');
                //     return redirect()->back();
                // }
                                        /** Checking Teacher's Evaluation Starts **/
            }
            /** If Registration Type is Regular and Type ID is 1 Ends*/
        
            /** If Registration Type is Term Repeat and Type ID is 2 Starts*/
            if($reg_type == 2){
                $session_id = Current_Semester_Running::where('title',Helper::current_semester())->value('id');
                $event = Event::with('type')
                                ->where('session_id',$session_id)
                                ->where('type_id','8')
                                ->first();
                $current_date = \Carbon\Carbon::now()->format('Y-m-d');
                // return $current_date;
                $diff = \Carbon\Carbon::parse($current_date)->between(\Carbon\Carbon::parse($event->starts), \Carbon\Carbon::parse($event->ends));
                if($diff == false){
                    toastr()->error('Timeline does not match Please check the event section.','Error');
                    return redirect()->back();
                }
                $student = Helper::student_info();
                // return $student;
                // defining previous semester
                $session = Registration::where('student_id', $student->Registration_Number)
                                            ->where('levelTerm', $student->Current_semester)
                                            ->whereIn('reg_type', [1,2])
                                            ->latest()
                                            ->first();
                // return $session;
                // checking if teachers' evaluation performed for current semester
                $check = TE_Main::where('student_id', $student->Registration_Number)
                                ->where('semester_id', $session->semester)
                                ->get();
                // return $check;
                if($check->isEmpty()){
                    toastr()->error('Complete Teachers Evaluation for '.$session->semester,'Error');
                    return redirect()->back();
                }
            }
            /** If Registration Type is Term Repeat and Type ID is 2 Ends*/
        
            /** If Registration Type is Referred  and Type ID is 3 Starts*/
            if($reg_type == 3){
                $session_id = Current_Semester_Running::where('title',Helper::current_semester())->value('id');
                $event = Event::with('type')
                                ->where('session_id',$session_id)
                                ->where('type_id','9')
                                ->first();
                $current_date = \Carbon\Carbon::now()->format('Y-m-d');
                // return $current_date;
                $diff = \Carbon\Carbon::parse($current_date)->between(\Carbon\Carbon::parse($event->starts), \Carbon\Carbon::parse($event->ends));
                if($diff == false){
                    toastr()->error('Timeline does not match Please check the event section.','Error');
                    return redirect()->back();
                }
            }
            /** If Registration Type is Referred  and Type ID is 3 Ends*/
            
            /** If Registration Type is Improvement  and Type ID is 4 Starts*/
            if($reg_type == 4){
                $session_id = Current_Semester_Running::where('title',Helper::current_semester())->value('id');
                $event = Event::with('type')
                                ->where('session_id',$session_id)
                                ->where('type_id','10')
                                ->first();
                $current_date = \Carbon\Carbon::now()->format('Y-m-d');
                // return $current_date;
                $diff = \Carbon\Carbon::parse($current_date)->between(\Carbon\Carbon::parse($event->starts), \Carbon\Carbon::parse($event->ends));
                if($diff == false){
                    toastr()->error('Timeline does not match Please check the event section.','Error');
                    return redirect()->back();
                }
            }
            /** If Registration Type is Improvement  and Type ID is 4 Ends*/
            
            /** If Registration Type is Backlog  and Type ID is 5 Starts*/
            if($reg_type == 5){
                $session_id = Current_Semester_Running::where('title',Helper::current_semester())->value('id');
                $event = Event::with('type')
                                ->where('session_id',$session_id)
                                ->where('type_id','11')
                                ->first();
                $current_date = \Carbon\Carbon::now()->format('Y-m-d');
                // return $current_date;
                $diff = \Carbon\Carbon::parse($current_date)->between(\Carbon\Carbon::parse($event->starts), \Carbon\Carbon::parse($event->ends));
                if($diff == false){
                    toastr()->error('Timeline does not match Please check the event section.','Error');
                    return redirect()->back();
                }
            }
            /** If Registration Type is Backlog  and Type ID is 5 Ends*/
            
            /** If Registration Type is Retake  and Type ID is 6 Starts*/
            if($reg_type == 6){
                $session_id = Current_Semester_Running::where('title',Helper::current_semester())->value('id');
                $event = Event::with('type')
                                ->where('session_id',$session_id)
                                ->where('type_id','12')
                                ->first();
                $current_date = \Carbon\Carbon::now()->format('Y-m-d');
                // return $current_date;
                $diff = \Carbon\Carbon::parse($current_date)->between(\Carbon\Carbon::parse($event->starts), \Carbon\Carbon::parse($event->ends));
                if($diff == false){
                    toastr()->error('Timeline does not match Please check the event section.','Error');
                    return redirect()->back();
                }
            }
            /** If Registration Type is Retake  and Type ID is 6 Ends*/
            
            /**--------------------------- Checking Dates For Registration Types Ends --------------------------**/
            
            /** getting student **/
            $student = Helper::student_info();
            
            // return $student;
                
            // defining student level term for registration
            if ($reg_type == '1') {
                if ($student->Current_semester == 'l1t1') {
                    $level = 'l1t2';
                }
                elseif ($student->Current_semester == 'l1t2') {
                    $level = 'l2t1';
                }
                elseif ($student->Current_semester == 'l2t1') {
                    $level = 'l2t2';
                } 
                elseif ($student->Current_semester == 'l2t2') {
                    $level = 'l3t1';
                } 
                elseif ($student->Current_semester == 'l3t1') {
                    $level = 'l3t2';
                } 
                elseif ($student->Current_semester == 'l3t2') {
                    $level = 'l4t1';
                }
                elseif ($student->Current_semester == 'l4t1') {
                      $level = 'l4t2';
                }   
                else {
                    toastr()->error('Already registered for L4-T2 as a regular student','Error');
                    return redirect()->back();
                }
            }
            else{
                $level = $student->Current_semester;
            }
        
            // fetching courses for regular
            if($reg_type == '1'){
                $syllabus_session_id = Current_Semester_Running::select('id')->where('title', $student->Enrollment_Semester)->first();
                // return $syllabus_session_id;
                $courses = Syllabus::with('course:id,course_code,course_name,credit,type')->where('department_id',$student->Program)
                                    ->where('session_id', $syllabus_session_id->id)
                                    ->where('level_term', $level)
                                    ->get();
                // return $courses;
                $total_credit=0;
    
                foreach($courses as $item){
                    $total_credit = $total_credit + $item->course->credit;
                }
            }
        
            // fetching courses for term-repeat
            elseif($reg_type == '2'){
                $session = Registration::where('student_id', $student->Registration_Number)
                                        ->where('levelTerm', $student->Current_semester)
                                        ->whereIn('reg_type', [1,2])
                                        ->value('semester');
                $courses = Mark::with('course:id,course_code,course_name,credit')
                                        ->where('Registration_Number', $student->Registration_Number)
                                        ->where('level', $student->Current_semester)
                                        ->where('semester',  $session)
                                        ->where('course_status', 'F')
                                        ->get();
                // checking if the result is updated or not
                if($courses->isEmpty()){
                    toastr()->error('Previous Semester result not found.', 'Error');
                    return redirect()->back();
                }
    
                $total_credit=0;
    
                foreach($courses as $item){
                    $total_credit = $total_credit + $item->course->credit;
                }
            }
        
            //fetching courses for referred exams
            elseif($reg_type == '3'){
                $courses = Mark::with('course:id,course_code,course_name,credit')
                                    ->where('Registration_Number', $student->Registration_Number)
                                    ->where('semester',Helper::previous_semester())
                                    ->where('course_status', 'F')
                                    ->get();
                // return $courses;
                // checking if the result is updated or not
                if($courses->isEmpty()){
                    toastr()->error('No Courses Found', 'Error');
                    return redirect()->back();
                }
    
                $total_credit="On Selection";
            }
        
            // fetching courses for improvement
            elseif($reg_type == '4'){
                $session = Registration::where('student_id', $student->Registration_Number)
                                        ->where('levelTerm', $student->Current_semester)
                                        ->whereIn('reg_type', [1,2])
                                        ->latest()
                                        ->first();
                // return $session;
                $syllabus_session_id = Current_Semester_Running::select('id')->where('title', $student->Enrollment_Semester)->first();
                // return $syllabus_session_id;
    
                if ($student->Current_semester == 'l1t1') {
                    toastr()->error('Cannot attend improvement exam in Level-1 Term-1');
                }
                elseif ($student->Current_semester == 'l1t2') {
                    $level = ['l1t1'];
                }
                elseif ($student->Current_semester == 'l2t1') {
                    $level = ['l1t1','l1t2'];
                } 
                elseif ($student->Current_semester == 'l2t2') {
                    $level = ['l1t1','l1t2','l2t1'];
                } 
                elseif ($student->Current_semester == 'l3t1') {
                    $level = ['l1t2','l2t1','l2t2'];
                } 
                elseif ($student->Current_semester == 'l3t2') {
                    $level = ['l2t1','l2t2','l3t1'];
                }
                elseif ($student->Current_semester == 'l4t1') {
                    $level = ['l2t2','l3t1','l3t2'];
                }
                elseif($student->Current_semester == 'l4t2'){
                    $level = ['l3t1','l3t2','l4t1'];
                }
                // if the student is an outgoing batch student   
                else {
                    $level = ['l3t2','l4t1','l4t2'];
                }
    
                $courses = Syllabus::with('course:id,course_code,course_name,credit')->where('department_id',$student->Program)
                                    ->where('session_id', $syllabus_session_id->id)
                                    ->whereIn('level_term', $level)
                                    ->get();
                // return $courses;
                $total_credit="On Selection";
            }
            // fetching courses for backlog/retake
            else{
                $session = Registration::where('student_id', $student->Registration_Number)
                                        ->where('levelTerm', $student->Current_semester)
                                        ->whereIn('reg_type', [1,2])
                                        ->latest()
                                        ->first();
                // return $session;
                $level = "not required";
                $courses = Mark::with('course:id,course_code,course_name,credit')
                                    ->where('Registration_Number', $student->Registration_Number)
                                    ->where('course_status', 'F')
                                    ->get();
                // return $courses;
                // checking if the result is updated or not
                if($courses->isEmpty()){
                    toastr()->error('No Courses Found', 'Error');
                    return redirect()->back();
                }
                $total_credit="On Selection";
    
            }
            return view('admin_student.registration.index', compact('reg_type','level','courses','total_credit','session'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
        
        /**----------------- Temporarily Turn Off Service Starts -----------------------**/
        $msg = Helper::server_maintenance();
        if($msg == true){
            return "Server Under Maintenance, Please Wait...............";
        }
        /**----------------- Temporarily Turn Off Service Ends -----------------------**/
        

    }

    public function show_reg(){
        $sid = Session::get('student_id');
        $sessions = DB::table('registrations')
                    ->select('semester','reg_type','created_at')
                    ->where('student_id',$sid)
                    ->distinct()
                    ->latest()
                    ->get();
        return view('admin_student.registration.show_reg',compact('sessions'));
    }

    public function store(Request $request){
        // return $request;
        $student = Helper::student_info();
       
    	$levelTerm = $request->level;
    	$semester = $request->semester;
    	$reg_type = $request->reg_type;
    	$courses = array();
        $courses = $request->course_id;
        $sid=$student->Registration_Number;
        
        // duplication re-check
        $check = DB::table('registrations')
            ->where('student_id',$sid)
            ->where('semester',$semester)
            ->where('reg_type',$reg_type)
            ->get();
            if(count($check)>0) {
                toastr()->error('Registration Already Done.','Error');
                return redirect()->back();
            } 
        // duplication re-check ends
        
        $reg = new Registration();
        $reg->semester = $semester;
        $reg->levelTerm = $levelTerm;
        $reg->student_id = $sid;
        $reg->reg_type = $reg_type;
        $reg->department = $student->Program;
        $reg->save();
       
    	foreach($courses as $key=>$value){

            DB::table('courses_student')->insert(
                [
                    'semester' => $semester,
                    'levelTerm' => $levelTerm,
                    'student_id' => $sid,
                    'course_id' => $value,
                    'reg_type' => $reg_type,
                ]);

        }
       
      $tc = DB::table('courses')
            ->join('courses_student', 'courses.id', '=', 'courses_student.course_id')
            ->select('courses_student.*','courses.credit', 'courses_student.levelTerm')
            ->where('courses_student.levelTerm',$levelTerm)
            ->where('courses_student.semester',$semester)
            ->where('courses_student.student_id',$sid)
            ->where('courses_student.reg_type',$reg_type)
            ->sum('courses.credit');
 
            if($reg_type =='1'|| $reg_type =='2'){
                StudentInfo::where('Registration_Number', $sid)
            ->update(['Current_semester' => $levelTerm]);
            }

            toastr()->success('Registration Successfully  Submitted','Success');
            return view('admin_student.registration.index')->with('success','Registration Successfully  Submitted.');

    }

    public function show_list($semester,$reg_type)
    {
        $sid = Session::get('student_id');
    	
        $reg_students = DB::table('courses_student')
                ->join('courses', 'courses_student.course_id', '=', 'courses.id')
                ->select('courses_student.*', 'courses.course_name','courses.course_code','courses.credit')
                ->where('courses_student.semester',$semester)
                ->where('courses_student.student_id',$sid)
                ->where('courses_student.reg_type',$reg_type)
                ->get();

        
    
         $sessions = DB::table('registrations')
                                ->select('semester','reg_type')
                                ->where('student_id',$sid)
                                ->distinct()
                                ->latest()
                                ->get();

         return view('admin_student.registration.show_reg',compact('reg_students','semester','sessions','reg_type'));
    }

    public function reg_preview(Request $request)
    {
        $this->validate($request,[
            'semester'=>'required',
            'level'=>'required',
            'reg_type'=>'required',
            'course_id'=>'required'
        ]);
        $sid = Session::get('student_id');
        $student = StudentInfo::select('Program')->where('Registration_Number',$sid)->first();
        $sessions = DB::table('student_infos')
                 ->select('Enrollment_Semester')
                 ->distinct()
                 ->latest()
                 ->get();
    	$levelTerm = $request->level;
    	$semester = $request->semester;
    	$reg_type = $request->reg_type;
    	$datas = array();
        $datas = $request->course_id;
        return view('admin_student.registration.reg_details',compact('datas','semester','sessions','levelTerm','reg_type'));
    }
}

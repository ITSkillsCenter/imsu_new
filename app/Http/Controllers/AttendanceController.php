<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\StudentInfo;
use App\Course;
use App\Attendance;
use App\Course_Student;
use App\Current_Semester_Running;
use App\Department;
use App\Helper\Helper;
use App\Semester;
use Validator;
use Carbon\Carbon;
use App\Transformers\AttendanceTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use App\Serializers\MySerializer;
use Illuminate\Support\Facades\DB;
use Nexmo\Laravel\Facade\Nexmo;
use \Shipu\MuthoFun\Facades\MuthoFun;

class AttendanceController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth');
	}
    protected $semesters=[
        'l1t1' => '1st Year 1st Semester',
        'l1t2' => '1st Year 2nd Semester',
        'l2t1' => '2nd Year 1st Semester',
        'l2t2' => '2nd Year 2nd Semester',
        'l3t1' => '3rd Year 1st Semester',
        'l3t2' => '3rd Year 2nd Semester',
        'l4t1' => '4th Year 1st Semester',
        'l4t2' => '4th Year 2nd Semester'
    ];

    public function exam_attendance(Request $request){
        $curr_semester = Helper::current_semester();
        // $dept_id = $student->dept_id;
        $department = Department::all();
        $session = Current_Semester_Running::where('id', $curr_semester)->first();
        $semesters = Semester::all();
        $all_sessions = Current_Semester_Running::all();
        $courses = Course::all();

        if($request->isMethod('post')){
            $semester = base64_encode($request->semester);
            $level = base64_encode($request->level);
            $session = base64_encode($request->session_id);
            $course = base64_encode($request->course_id);
            // dd($semester, $level, $session);
            return redirect('/admin/mark-attendance/'.$session.'/'.$semester.'/'.$level.'/'.$course);
            
        }

        return view('attendance.exam_attendance',compact('courses', 'curr_semester', 'semesters', 'session', 'check_for_payment_history', 'pending_payments', 'all_sessions'));
    }

    public function mark_attendance(Request $request, $session, $semester, $level, $course){
        $semester = base64_decode($semester);
        $session = base64_decode($session);
        $level = base64_decode($level);
        $course = base64_decode($course);
        // dd($semester, $session, $level, $course);
        if($request->isMethod('post')){
            $checkin = Course_Student::where([
                'semester' => $semester,
                'session_id' => $session,
                'level' => $level,
                'course_id' => $course,
                'student_id' => $request->matric_number
            ])->update(['course_status' => 'present']);
            if($checkin){
                return back()->with('success', 'Matric number: ' . $request->matric_number . ' checked in successfully');
            }else{
                return back()->with('error', 'Matric number: ' . $request->matric_number . ' did not register for this course');
            }
            
        }
        
        $crs = Course::find($course);

        return view('attendance.mark_attendance',compact('crs', 'course', 'reg_courses', 'semester', 'session', 'level'));
    }

    public function Create(Request $request)
    {
        $dep=$request->department_id;
        $course=$request->course_id;
        $semester=$request->semester;
        $today = Carbon::today();
        
        $students = DB::table('courses_student')
            ->join('student_infos', 'courses_student.student_id', '=', 'student_infos.Registration_Number')
            ->select('courses_student.*', 'student_infos.Full_Name')
            ->where('courses_student.semester',$semester)
            ->where('courses_student.course_id',$course)
            ->where('courses_student.reg_type',1)
            ->orderBy('courses_student.student_id', 'asc')
            ->get();
            
      // return $students;
        // $subjects = DB::table('courses')
        //     ->join('courses_student', 'courses.id', '=', 'courses_student.course_id')
        //     ->select('courses.*', 'courses_student.semester')
        //     ->where('courses.Program',$dep)
        //     ->where('courses_student.semester',$semester)
        //     ->orderBy('courses.course_code', 'asc')
        //     ->distinct()
        //     ->get();
       // return  $subjects;

       $semesters = DB::table('student_infos')->select('Enrollment_Semester')->distinct()->get();
       $departments = DB::table('student_infos')->select('Program')->distinct()->get();
        return view('attendance.create',compact('departments','students','semesters','course','today','dep','semester','section')); 
    }
    public function store(Request $request)
    {
          $ip=$request->ip();
            $ips = array("116.206.58.205","116.206.58.193"); 
  
            if (!in_array($ip, $ips)) 
              { 
              
                   $notification= array('title' => 'Validation', 'body' => 'Please Take Attendance from BAIUST Campus Network!');
                return Redirect::route('attendance.index')->with("error",$notification); 
              } 
           
         $data =array();
         $data['present'] = $request->present;
         $data['department_id'] = $request->department_id;
         $data['semester'] = $request->semester;
         $data['subject_id'] = $request->subject_id;
         $data['date'] = $request->date;
         //return $data;
        $dateJunk = Carbon::createFromFormat('d/m/Y', $request->date);
            $exists = Attendance::select('id')
            ->where('department_id',$request->department_id)
            ->where('subject_id',$request->subject_id)
            ->where('date','=',$dateJunk->toDateString())
            ->where('semester',$request->semester)
            ->first();

            
            if(count($exists))
            {
                $notification= array('title' => 'Validation', 'body' => 'Attendance already exists!');
                return Redirect::route('attendance.index')->with("error",$notification);
            }

            foreach ($data['present'] as  $key => $value){
                $attendanceData[] = [
                    'department_id' => $data['department_id'],
                    'semester' => $data['semester'],
                    'subject_id' => $data['subject_id'],
                    'date' => Carbon::createFromFormat('d/m/Y', $data['date']),
                    'students_id' => $key,
                    'present' => $value,
                    'faculty_id'=>auth()->user()->name,
                    'ip'=>request()->ip()
                ];
            }
            $attendanceData;
           // dd($attendanceData);
           // return $attendanceData;
            Attendance::insert($attendanceData);

            $c = DB::table('courses')->select('course_name','course_code')->where('id',$request->subject_id)->first();

            $abslists = DB::table('attendances')
                    ->join('student_infos', 'attendances.students_id', '=', 'student_infos.Registration_Number')
                    ->select('attendances.*','student_infos.Guardian_Mobile_Number','student_infos.Full_Name','student_infos.Registration_Number')
                    ->where('attendances.date',$dateJunk->toDateString())
                    ->where('attendances.subject_id',$request->subject_id)
                    ->where('attendances.present',0)
                    ->get();

            //return $abslists;
           
            if(count($abslists)>0){
                
                foreach($abslists as $a){
           
                   
                $user = "baiustict";
                $pass = "20baiustictw";
                $mobile = $a->Guardian_Mobile_Number;
                $sms_content = "আপনার সন্তান  আই ডি- ".$a->Registration_Number." নাম -".$a->Full_Name.",".$c->course_code." ক্লাসে অনুপস্থিত ছিল । তারিখ ".date("Y-m-d");
                $msg=urlencode($sms_content);
                $feed = "http://developer.muthofun.com/sms.php?username=$user&password=$pass&mobiles=$mobile&sms=$msg&uniccode=1";
                $tweets = $this->curl($feed);
                
                $xml = simplexml_load_string($tweets);
                $json = json_encode($xml);
                $array = json_decode($json,TRUE);
                //print_r($array);
                    
                }
            
              
            
            }
            $students = DB::table('attendances')
            ->join('student_infos', 'attendances.students_id', '=', 'student_infos.Registration_Number')
            ->select('attendances.*', 'student_infos.Full_Name', 'student_infos.Registration_Number')
            ->where('attendances.department_id',$request->input('department_id'))
            ->where('attendances.semester',$request->input('semester'))
            ->where('attendances.subject_id',$request->input('subject_id'))
            ->where('attendances.date',$dateJunk->toDateString())
            ->orderBy('student_infos.Registration_Number','asc')
            ->get(); 
                            
          $notification= array('title' => 'Data Store', 'body' => 'Attendance saved Successfully.');
            return Redirect::route('attendance.index')->with(["success"=>$notification,
            'students'=>$students,
            'faculty'=>auth()->user()->name,
            'course_name'=>$c->course_name,
            ]);

    }
    function curl($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
                     }
    public function list()
    {
         
       $departments = DB::table('student_infos')->select('Program')->distinct()->get();
       $courses = DB::table('courses')->get();
       $semesters = DB::table('student_infos')->select('Enrollment_Semester')->distinct()->get();
        return view('attendance.studentList',compact('departments','semesters','courses')); 
    }
    public function index(){
        $today = Carbon::today();
        $students=[];
        $subjects=[];
        $semesters = DB::table('student_infos')->select('Enrollment_Semester')->distinct()->get();
        $departments = DB::table('student_infos')->select('Program')->distinct()->get();
        $selectDep="";
        $selectSem="";
        $selectSub = "";
        return view('attendance.index',compact('selectDep','selectSem','selectSub','departments','students','semesters','subjects','today'));

    }
    public function index2(Request $request){

        $dateJunk= Carbon::createFromFormat('d/m/Y', $request->input('date'));
        
        $students = DB::table('attendances')
            ->join('student_infos', 'attendances.students_id', '=', 'student_infos.Registration_Number')
            ->select('attendances.*', 'student_infos.Full_Name', 'student_infos.Registration_Number')
            ->where('attendances.department_id',$request->input('department_id'))
            ->where('attendances.semester',$request->input('semester'))
            ->where('attendances.subject_id',$request->input('subject_id'))
            ->where('attendances.date',$dateJunk->toDateString())
            ->orderBy('student_infos.Registration_Number','asc')
            ->get();

        $sessions = DB::table('student_infos')->select('Program')->distinct()->get();
        $subjects = DB::table('courses')
                    ->select('id','course_code')
                    ->where('Program',$request->input('department_id'))->orderby('course_code','asc')->get();
        //return $subjects;
       // return $students;
         $semesters = DB::table('student_infos')->select('Enrollment_Semester')->distinct()->get();
        $departments = DB::table('student_infos')->select('Program')->distinct()->get();

        $selectSem=$request->input('levelTerm');
        $selectSub = $request->input('subject_id');
        $selectDep=$request->input('department_id');
       // $session=$request->input('session');
        $today = $dateJunk;

        return view('attendance.index',compact('selectDep','selectSub','session','sessions','departments','students','semesters','courses','today','selectSem'));

    }
    public function update(Request $request,$id){

        $attendance = Attendance::find($id);
        
            $attendance->present = $request->present;
           // return response()->json($attendance);
            $attendance->save();
            $present = $attendance->present ? 'Yes':'No';
            return Response()->json([
            'success' => true,
            'message' => "Attendance updated successfully.",
            'present' => $present
        ], 200);
       
    }

    
    public function StudentList($dID,$semester)
    {  
        $students=DB::table('student_infos')->select('id','Registration_Number','Full_Name')
        ->where('Program',$dID)
        ->where('Current_level',$semester)
        ->get();
        return $students;
        //return view('attendance.studentList',compact('students'));
    //return response(['students'=>$students]);
    }

    public function report(){
        $today = Carbon::today();
        $students=[];
        $subjects=[];
        $semesters = DB::table('student_infos')->select('Enrollment_Semester')->distinct()->get();
        $departments = DB::table('student_infos')->select('Program')->distinct()->get();
        $selectDep="";
        $selectSem="";
        $selectSub = "";
        return view('attendance.report_index',compact('selectDep','selectSem','selectSub','departments','students','semesters','subjects','today'));

    }

    public function reportDetails(Request $request){
        $dateJunk_from = Carbon::createFromFormat('d/m/Y', $request->input('date_from'));
        $dateJunk_to = Carbon::createFromFormat('d/m/Y', $request->input('date_to'));
        //dd($dateJunk_to);
        $semester=$request->input('semester');
        $subject_id = $request->input('subject_id');
        $department_id=$request->input('department_id');
        $dates = DB::table('attendances')->select('date')
                    ->whereBetween('date', [$dateJunk_from, $dateJunk_to])
                    ->distinct()
                    ->get();
                    
        $day = count($dates);
        
        // $day= $day-1;
        $students = DB::table('attendances')->select('students_id')
                      ->where('semester',$semester)
                      ->where('subject_id',$subject_id)
                    ->whereBetween('date', [$dateJunk_from, $dateJunk_to])
                    ->distinct()
                    ->get();

        //dd($students);
        return view('attendance.report',compact('students','dates','day','semester','subject_id','dateJunk_from','dateJunk_to','department_id'));
       
    }

    public function reportStudent(Request $request){
        //return $request->all();
        $id = $request->students_id;
        $name = $request->name;
        $subject_id = $request->subject_id;
        $semester = $request->semester;
        $dateJunk_from = $request->dateJunk_from;
        $dateJunk_to = $request->dateJunk_to;
        $students = DB::table('attendances')
                      ->where('semester',$semester)
                      ->where('subject_id',$subject_id)
                      ->where('students_id',$id)
                    ->whereBetween('date', [$dateJunk_from, $dateJunk_to])
                    ->get();
        return view('attendance.test',compact('students','name','id','dateJunk_from','dateJunk_to','subject_id'));
    }

    private  function checkPresent($id,$presents)
    {
       // dd($presents);
        //echo count($presents);
        foreach ($presents as $key => $value) {
            
            if($id==$key)
            {
                 return 1;  
            }
        }
        
        // foreach ($presents as $key => $value) {
        //     //dd($presents);
        //     if($value=='on'){
        //         return 1;
        //     }
        // }
    }


}

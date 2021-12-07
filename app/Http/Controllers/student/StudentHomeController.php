<?php

namespace App\Http\Controllers\student;

use App\Course_Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentInfo;
use App\Registration;
use App\Online_Class;
use App\Current_Semester_Running;
use App\Event;
use App\FeeHistory;
use App\Helper\Helper;
use App\IctFee;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function home()
    {
		// fetching calender events
		$curr_session = Helper::current_semester();
		$check = IctFee::where(['student_id' => Session::get('student_id'), 'session_id' => $curr_session])->count();
		// dd(Session::get('student'));	
		// if($check < 1){
		// 	return redirect()->route('student.ict');
		// }
		$student_id = Session::get('student')->matric_number;
		$current_session = Current_Semester_Running::where('id',Helper::current_semester())->first();
		$semester = Helper::current_semester_details();
		$semester = $semester->id == 1 ? '1st' : '2nd';
		$current_courses = Course_Student::where(['session_id' => Helper::current_semester(), 'student_id' => $student_id, 'semester' => $semester])->count();
		$events = Event::with('type')->where('session_id',$current_session->id)->get();
		$pending_payments = FeeHistory::where(['student_id' => $student_id, 'status' => 'unpaid'])->count();
		// return $events;
		// event ends
		if(Session::has('student_id')){
    	    $sid = Session::get('student_id');
		    $levelTerm = StudentInfo::select('Current_semester','Program')->where('Registration_Number',$sid)->first();
		
    	
        	// $courses = DB::table('courses')->select('id','course_name','course_code')->where('Program',$dept->Program)->get();
        	$session = Registration::select('semester','reg_type','levelTerm','student_id')
                        ->where('student_id',$sid)
                        ->where('levelTerm',$levelTerm->Current_semester)
    					->first();
    		$courses = DB::table('courses_student')
    					->join('courses', 'courses_student.course_id', '=', 'courses.id')
    					->select('courses_student.*', 'courses.course_name','courses.course_code','courses.unit')
    					->where('courses_student.semester',$session->semester)
    					->where('courses_student.student_id',$sid)
    					->where('courses_student.reg_type',$session->reg_type)
    					->get();
	
        	$clearance= DB::table('clearances_student')
						->join('student_infos', 'clearances_student.student_id', '=', 'student_infos.Registration_Number')
						->select('clearances_student.*', 'student_infos.Full_Name','student_infos.Registration_Number')
						->where('student_infos.Registration_Number',$sid)
						->first();
        	$classes = Online_Class::with('faculty:id,name,email','course:id,course_code,course_name')
						->where('class_for', $levelTerm->Program)
						->where('session', Helper::current_semester())
						->where('level_term', $levelTerm->Current_semester)
						->get();
        // 	return $classes;
    		// return view('admin_student.home.home',compact('clearance','events','classes'));
			return view('admin_student.dashboard',compact('clearance','events','classes','current_session', 'current_courses', 'events', 'pending_payments'));
    	}else{
    		return redirect('student-login')->with('message','You must sign in first');
    	}
    	
    }
    public function profile()
    {
		$id = Session::get('student_id');
		$student = StudentInfo::where('registration_number',$id)->orWhere('matric_number',$id)->first();
    	return view('admin_student.profile.profile', compact('student'));
    	
    }

	public function edit_profile(Request $request){
		$id = Session::get('student_id');
		$student = StudentInfo::where('registration_number',$id)->orWhere('matric_number',$id)->first();
		if ($request->isMethod('post')){
			$update = StudentInfo::where('registration_number',$id)->orWhere('matric_number',$id)->update($request->except(['_token']));
			// dd($update);
			return back()->with('success','Profile Updated'); 
		}
		
		return view('admin_student.profile.edit', compact('student'));
	}
    
}

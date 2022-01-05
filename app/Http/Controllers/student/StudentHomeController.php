<?php

namespace App\Http\Controllers\student;

use App\AssignFee;
use App\ClearanceStudent;
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
		$curr_level = Session::get('student')->level;
		$current_session = Current_Semester_Running::where('id',Helper::current_semester())->first();
		$semester = Helper::current_semester_details();
		$semester = $semester->id == 1 ? '1st' : '2nd';
		$current_courses = Course_Student::where(['session_id' => Helper::current_semester(), 'student_id' => $student_id, 'semester' => $semester, 'level' => $curr_level])->count();
		$credit_unit = Course_Student::Join('courses', 'courses_student.course_id', '=', 'courses.id')
					->where(['session_id' => Helper::current_semester(), 'student_id' => $student_id, 'courses_student.semester' => $semester, 'courses_student.level' => $curr_level])->sum('courses.unit');
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
			return view('admin_student.dashboard',compact('curr_level','credit_unit','semester','clearance','events','classes','current_session', 'current_courses', 'events', 'pending_payments'));
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

	public function student_clearance(Request $request){
		$std_id = Session::get('student_id');
		$std = StudentInfo::where('registration_number', $std_id)->orWhere('matric_number', $std_id)->first();
		$clear = ClearanceStudent::where('student_id', $std->matric_number)->first();
		$clear_step = $clear !== null ? $clear->step : 0;
		return view('admin_student.clearance.index', compact('clear_step'));
	}

	public function personal_info(Request $request){
		$std_id = Session::get('student_id');
		$std = StudentInfo::where('registration_number', $std_id)->orWhere('matric_number', $std_id)->first();
		if($request->isMethod('POST')){
			StudentInfo::where('registration_number', $std_id)->orWhere('matric_number', $std_id)->update($request->except('_token'));
			$rejected_reason = [
				'bursary' => null,
				'hod' => null,
				'records' => null,
				'faculty' => null,
				'library' => null,
				'sport' => null,
				'student_affairs' => null,
				'security' => null,
				'medical' => null,
				'alumni' => null,
			];

			$accepted_reason = [
				'bursary' => null,
				'hod' => null,
				'records' => null,
				'faculty' => null,
				'library' => null,
				'sport' => null,
				'student_affairs' => null,
				'security' => null,
				'medical' => null,
				'alumni' => null,
			];

			$answers= [
				'faculty' => [
					'status' => null,
					'reason' => null,
				],
				'library' =>  [
					'status' => null,
					'reason' => null,
				],
				'sport' =>  [
					'status' => null,
					'reason' => null,
				],
				'sport2' =>  [
					'status' => null,
					'reason' => null,
				],
				'student_affairs' =>  [
					'status' => null,
					'reason' => null,
				],
				'security' => [
					'status' => null,
					'reason' => null,
				],
				'medical' => [
					'status' => null,
					'reason' => null,
				],
				'alumni' => [
					'status' => null,
					'reason' => null,
					'session' => null,
				],
			];

			$search = ClearanceStudent::where('student_id', $std->matric_number)->first();
			if($search == null){
				$clr = ClearanceStudent::updateOrCreate(
					[
						'student_id' => $std->matric_number
					],
					[
						'student_id' => $std->matric_number,
						'step' => 1,
						'accepted_reason' => json_encode($accepted_reason),
						'rejected_reason' => json_encode($rejected_reason),
						'answers' => json_encode($answers),
					]
				);
			}
			
			// dd($std->matric_number);


            return redirect('/student-clearance')->with('success', 'Updated successfully');
		}
		
		return view('admin_student.clearance.personal_info', compact('std'));
	}

	public function financial_info(Request $request){
		$std_id = Session::get('student_id');
		$std = StudentInfo::where('registration_number', $std_id)->orWhere('matric_number', $std_id)->first();
		if($request->isMethod('POST')){
			$clr = ClearanceStudent::updateOrCreate(
                [
                    'student_id' => $std->matric_number
                ],
                [
					'bursary' => 1,
					'step' => 2,
                ]
            );

			return redirect('/student-clearance')->with('success', 'Financial information confirmed, Report has been sent to the bursary department for verification');
		}
		
		$dept_years = Helper::get_department($std->dept_id)->years;
		$check_on_sess_table = Current_Semester_Running::where(['title' => $std->Batch])->first();
		$max_session = $check_on_sess_table->id + $dept_years -1;
		$others_sessions = Current_Semester_Running::whereBetween('id', [$check_on_sess_table->id, $max_session])->get();
		// dd($others_sessions);
		$fee = AssignFee::first();
		$year1 = explode(',', $fee->year1);
		$year2 = explode(',', $fee->year2);
		$year3 = explode(',', $fee->year3);
		$year4 = explode(',', $fee->year4);
		$year5 = explode(',', $fee->year5);
		$general_fee = explode(',', $fee->general);

		$years = [$year1, $year2, $year3, $year4, $year5];
		return view('admin_student.clearance.financial_info', compact('years','dept_years','others_sessions', 'general_fee'));
	}

	public function general_info(Request $request){
		$std_id = Session::get('student_id');
		$std = StudentInfo::where('registration_number', $std_id)->orWhere('matric_number', $std_id)->first();
		if($request->isMethod('post')){
			$answers = $request->except('_token');
			$clr = ClearanceStudent::updateOrCreate(
				[
					'student_id' => $std->matric_number
				],
				[
					'student_id' => $std->matric_number,
					'step' => 3,
					'answers' => json_encode($answers),
				]
			);
			return redirect('/student-clearance')->with('success', 'General information updated successfully and has been sent to the appropriate bodies for approval');

		}
		
		$general = ClearanceStudent::where('student_id', $std->matric_number)->first();
		$answers = json_decode($general->answers, true);
		// dd($answers);
		return view('admin_student.clearance.general_info', compact('general', 'answers'));
	}

    
}

<?php

namespace App\Http\Controllers\applicant;

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

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified_applicant');
    }

    public function home()
    {
		$applicant = Session::get('verified_applicant');
		
		return view('applicant.dashboard', compact('applicant'));
    }

	public function pghome()
    {
		$applicant = Session::get('verified_applicant');
		
		return view('applicant.pg_dashboard', compact('applicant'));
    }

    public function profile()
    {
		$id = Session::get('student_id');
		$student = StudentInfo::where('matric_number',$id)->first();
    	return view('admin_student.profile.profile', compact('student'));
    	
    }

	public function edit_profile(Request $request){
		$id = Session::get('student_id');
		$student = StudentInfo::where('matric_number',$id)->first();
		if ($request->isMethod('post')){
			$update = StudentInfo::where('matric_number',$id)->update($request->except(['_token']));
			// dd($update);
			return back()->with('success','Profile Updated'); 
		}
		
		
		return view('admin_student.profile.edit', compact('student'));
	}
    
}

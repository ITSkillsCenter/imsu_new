<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
class AdmitcardController extends Controller
{
    
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

    public function index()
    {
    	
    	$semesters= $this->semesters; 
        $courses = DB::table('courses')->select('id','course_code','course_name')->get();
        return view('academic.admit_show',compact('semesters','courses'));
    }

    public function depLevel($dep,$level)
    {
        $courses = DB::table('courses')
                ->select('id','course_code','course_name')
                ->where('Program',$dep)
                ->where('levelTerm',$level)
                ->get();
        return response()->json($courses);
    }

    public function download(Request $request)
    {
    	//return $dept;
    	$session = $request->session;
    	$department = $request->department;
    	$level_term = strtolower($request->level_term);
        $datas = array();
        $datas = $request->course_code;
        //dd($datas);
    	$students = DB::table('student_infos')->select('Registration_Number','Full_Name','Program','Photo','Current_semester')
    			->where('Program',$department)
    			->where('Current_semester',$level_term)
    			->orderBy('Registration_Number','ASC')
    			->get();
               // dd($department);
    	if($department=='CSE'){
    		$department = 'Department of Computer Science and Engineering (CSE)';
    	}else if($department == 'EEE'){
            $department = 'Department of Electrical and Electronic Engineering (EEE)';
        }else if($department == 'CE'){
            $department = 'Department of Cvil  Engineering (CE)';
        }else if($department == 'DBA'){
            $department = 'Department of Business Administration';
        }else if($department == 'ENG'){
            $department = 'Department of English';
        }else if($department == 'LLB'){
            $department = 'Department of Law';
        }else{
            $department = 'Department of CSE';
        }

    	return view('admitcard.index',[
    		'session' =>$session, 
    		'department'=>$department,
    		'level_term' => $level_term,
    		'students' => $students, 
            'datas' => $datas
    	]);
    }

}

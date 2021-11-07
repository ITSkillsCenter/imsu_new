<?php

namespace App\Http\Controllers\admin_student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentInfo;
use DB;

class StudentPromotionController extends Controller
{
    public function index(){
    	return view('student.promotion_student');
    }
    
    public function admission(){
      
    	return view('student.active_semester');
    }

    public function promotionList(Request $request){
    	$dept = $request->dept;
    	$level = $request->level;
    	$sec = $request->section;
    	 $students = StudentInfo::select('id','Registration_Number','Full_Name','Current_semester','Section')->where('Program',$dept)->where('Current_semester',$level)->where('Section',$sec)->get();
    	 return view('student.promotion_student',compact('students'));
    	}

    public function promotionUpdate(Request $request)
    {
    	$data = array();
    	$data['Registration_Number'] = $request->Registration_Number;
    	$data['level'] = $request->level;
    	$data['section'] = $request->section;

    	//dd($data);
    	foreach ($data['level'] as  $key => $value){
    		DB::table('student_infos')
    			->where('Registration_Number',$request->Registration_Number[$key])
    			->update([
    				'Current_semester' =>$request->level[$key],
    				'Section' =>$request->section[$key],
    			]);
                
            }

             $notification= array('title' => 'Data Update', 'body' => 'Promotion Updated Successfully.');
            return redirect()->back()->with("success",$notification);

    }
}

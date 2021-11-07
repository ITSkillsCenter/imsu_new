<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ResultController extends Controller
{
    public function index()
    {
       $semesters= DB::table('results')->select('passing_semester')->distinct()->get();
       $departments= DB::table('results')->select('department')->distinct()->get();
        return view('result.index',compact('semesters','departments'));
    }
    public function list(Request $request)
    {
        //return $request->all();
        $dep=$request->department_id;
        $semesters= DB::table('results')->select('semester')->distinct()->get();
       $departments= DB::table('results')->select('department')->distinct()->get();

       
       
       if($request->vclist==1){
        $results = DB::table('results')->where('semester',$request->semester)->where('department',$request->department_id)->where('cgpa','>=',3.90)->orderBy('cgpa','desc')->get();
        
        return view('result.index',compact('semesters','departments','results'));
       }else if($request->deanlist==1 && ($dep=='CSE'||$dep=='EEE'||$dep=='CE')){

        $results = DB::table('results')->where('semester',$request->semester)->where('department',$request->department_id)->where('cgpa','>=',3.75)->where('cgpa','<=',3.90)->orderBy('cgpa','desc')->get();
        
        
        return view('result.index',compact('semesters','departments','results'));
        
       }else if($request->deanlist==1 && ($dep=='BBA'||$dep=='English'||$dep=='LLB')){
        $results = DB::table('results')->where('semester',$request->semester)->where('department',$request->department_id)->where('cgpa','>=',3.70)->where('cgpa','<=',3.90)->orderBy('cgpa','desc')->get();
        return view('result.index',compact('semesters','departments','results'));
       }else{
        $results = DB::table('results')->where('semester',$request->semester)->where('department',$request->department_id)->orderBy('cgpa','desc')->get();
        
        return view('result.index',compact('semesters','departments','results'));
       }

       
    }
}

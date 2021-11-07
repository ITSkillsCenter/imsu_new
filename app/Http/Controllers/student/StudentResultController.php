<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class StudentResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }
    
     public function show_result()
    {
        $sid = Session::get('student_id');
        $sessions = DB::table('marks')
                    ->select('semester')
                    ->where('Registration_Number',$sid)
                    ->distinct()
                    ->latest()
                    ->orderBy('id','ASC')
                    ->get();
        return view('admin_student.result.result',compact('sessions'));
    }

    public function result($sem)
    {
    	
    	 $sid = Session::get('student_id');
    	 
    	 $marks = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$sid)
            ->where('marks.semester','=',$sem)
            ->orderBy('courses.course_code', 'asc')
            ->get();
        
        $sessions = DB::table('marks')
                    ->select('semester')
                    ->where('Registration_Number',$sid)
                    ->distinct()
                    ->latest()
                    ->orderBy('id','ASC')
                    ->get();
         return view('admin_student.result.result',compact('marks','sessions','sem'));
    	
    }
}

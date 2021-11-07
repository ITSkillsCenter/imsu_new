<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use DB;

class StudentInfoReportController extends Controller
{
    public function report_dept($dept)
    {
        $students_total = StudentInfo::where('Program', '=', $dept)
                                    ->orderBy('Registration_Number','ASC')
                                    ->get();
        $students_current = StudentInfo::where('Program', '=', $dept)
                                    ->where('Current_status','current')
                                    ->orderBy('Registration_Number','ASC')
                                    ->get();
        $students_paused = StudentInfo::where('Program', '=', $dept)
                                    ->where('Current_status','paused')
                                    ->orderBy('Registration_Number','ASC')
                                    ->get();
        $students_left = StudentInfo::where('Program', '=', $dept)
                                    ->where('Current_status','left')
                                    ->orderBy('Registration_Number','ASC')
                                    ->get();
        $students_migrated = StudentInfo::where('Program', '=', $dept)
                                    ->where('Current_status','migrated')
                                    ->orderBy('Registration_Number','ASC')
                                    ->get();
        $students_graduated = StudentInfo::where('Program', '=', $dept)
                                    ->where('Current_status','graduate')
                                    ->orderBy('Registration_Number','ASC')
                                    ->get();
        $students_passing = StudentInfo::where('Program', '=', $dept)
                                    ->where('Current_status','passing')
                                    ->orderBy('Registration_Number','ASC')
                                    ->get();
        return view('filter.departmental',compact('students_total','students_current','students_left','students_migrated','students_graduated','students_paused','dept','students_passing'));
    }

    public function report_dept_status($dept,$status)
    {
        $students = DB::table('student_infos')
                     ->where('Program', '=', $dept)
                     ->where('Current_status', '=', $status)
                     ->orderBy('Registration_Number','ASC')
                     ->get();
            $total =count($students);

       //return $total;
         return view('filter.dept_status',['students'=>$students,'total'=>$total,'dept'=>$dept,'status'=>$status]);
    }
}

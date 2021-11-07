<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Imports\MarksImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mark;

class ImportMarkController extends Controller
{
    public function upload(){
    	return view('mark.add');
    }

    public function import_mark(Request $request) 
    {
        
        Excel::import(new MarksImport,request()->file('file'));
       // $marks = Excel::toCollection(new MarksImport,request()->file('file'));
       return back();
        //dd($marks);
        // foreach($marks as $mark)
        // {
        //     // Mark::where('course_id',$mark[1])->update([
        //     //     'grade_letter'=>$mark[2],
        //     //     'grade_point'=>$mark[3],
        //         
        //     // ]);

        //     echo $mark[2].'-'.$mark[3].'<br>';
        // }
        
    
        //    $this->validate($request,[
    //     'file' =>'required|mimes:csv,txt,xlsx'
    //    ]);
    //   $file = $request->file('file');
    //   $filename = explode(".", $_FILES['file']['name']);
    //   $handle = fopen($_FILES['file']['tmp_name'], "r");
     
    //   $data = array();

    //  while($row = fgetcsv($handle)){
       
    //     $data['Registration_Number']=$row[0];
    //     $data['course_id']=$row[1];
    //     $data['grade_letter']=$row[2];
    //     $data['grade_point']=$row[3];
    //     $data['course_credit']=$row[4];
    //     $data['level']=$row[5];
    //     $data['semester']=$row[6];
    //     $data['academic_year']=$row[7];
    //     $data['course_status']=$row[8];

    //     //return $data;
        
        
    //      DB::table('marks')->insert(
    //       [
    //         'Registration_Number'  => $data['Registration_Number'],
    //         'course_id'  => $data['course_id'], 
    //         'grade_letter'  => $data['grade_letter'], 
    //         'grade_point'  => $data['grade_point'], 
    //         'course_credit'  => $data['course_credit'],  
    //         'level'  => $data['level'], 
    //         'semester'  => $data['semester'],
    //         'academic_year'  => $data['academic_year'], 
    //         'course_status'  => $data['course_status'], 
            
    //     ]);
    //     }
    // fclose($handle);
    //     return redirect()->route('mark.create');
    }
}

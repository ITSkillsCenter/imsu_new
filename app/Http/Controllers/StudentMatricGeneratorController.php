<?php

namespace App\Http\Controllers;

use DB;
use App\Lga;
use App\State;
use App\Faculty;
use App\Department;
use App\StudentInfo;
use Illuminate\Http\Request;
use App\Exports\StudentMatricNumExport;
use App\IctFee;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentMatricGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->dept_id !== null){
            $departments = Department::where(['id' => \Auth::user()->dept_id])->orderBy('name', 'asc')->get();
        }else{
            $departments = Department::orderBy('name', 'asc')->get();
        }

        return view('student.matric_no',compact('departments'));
    }

    
   
    public function get_student_by_year_or_dept_level(Request $request){
        $studentsFilter =  StudentInfo::where('Batch', 'LIKE', '%'.$request->year.'%')->where(['dept_id' => $request->dept])
        ->where(function($q){
              $q->whereColumn('matric_number', 'registration_number')
                ->orWhere('matric_number', '=', null);
        })->orderBy('id', 'asc')->get();
        // dd($request->year);
        // $studentsFilter =  StudentInfo::where('Batch', 'LIKE', '%'."$request->year".'%')->where(['matric_number' => null])->get();
        // dd($studentsFilter);
        return view('student.generate_matric_num',compact('studentsFilter'));
    }

    public function checkMatric($year){
        $mtn = 'IMSU/'.$year.'/'.intCodeRandom(4);
        $ct = StudentInfo::where(['matric_number' => $mtn])->count();
        if($ct > 0){
            $this->checkMatric($year);
        }else{
            return $mtn;
        }
    }

    public function mat(){
        $all_departments = []; $all_students = [];
        $faculties = Faculty::orderBy('name')->get();
        foreach($faculties as $faculty){
            $departments = Department::where(['faculty_id' => $faculty->id])->orderBy('name')->get();
            foreach($departments as $department){
                $students = StudentInfo::where(['dept_id' => $department->id])->orderBy('first_name')->get();
                foreach($students as $student){
                    $all_students[] = $student->first_name . $student->last_name;
                }
            }
        }
        dd($all_students);
    }
   

    public function generate_matric_num(Request $request){
    
        $selectedStudents = $request->students_id;
        if($request->students_id !==null){
            foreach($request->students_id as $student){
            
               $generatedMatric = StudentInfo::find($student);
               $year = explode('/',$request->year);
                if(count($year)==2) $year = $year[0];
                else $year = $request->year;
                $skipped = ['2013','2014','2015','2016','2017','2018','2019'];
                $generatedMatric->matric_number = $this->checkMatric($year);
                // if(in_array($year, $skipped)){
                //     $generatedMatric->matric_number = $this->checkMatric($year);
                // }else{
                //     if($generatedMatric->Payment_status == 'paid'){
                //         $generatedMatric->matric_number = $this->checkMatric($year);
                //     }else{
                //         $generatedMatric->matric_number = null;
                //     }
                // }
                
    
               $generatedMatric->save();
               
               $matSt[] = $generatedMatric;
            }
        }
    
        return view('student.generated_result',compact('matSt'))->with('success','Matriculation Number Generated');

    }

    public function get_single_student($id,$newyear){

        // dd($year);
        $newyear = base64_decode($newyear);
        $year = explode('/',$newyear);
        if(count($year)==2) $year = $year[0];
        else $year = $newyear;
        $student = StudentInfo::find(base64_decode($id));
        $student->matric_number = 'IMSU/'.$year.'/'.intCodeRandom(4);
        $student->save();
        return view('student.generated_single_result',compact('student'))->with('success','Matriculation Number Generated');
      
    }

    
}

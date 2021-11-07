<?php

namespace App\Http\Controllers;

use DB;
use App\Fee;
use Session;
use App\Course;
use App\StudentInfo;
use App\Helper\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Validator
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'level' => 'required',
                'nationality' => 'required',
                'state_of_origin' => 'required',
                'lga' => 'required',
                'gender' => 'required',
                'student_mobile_number' => 'required',
                'date_of_birth' => 'required',
                'faculty_id' => 'required',
                'dept_id' => 'required',
                'matric_number' => 'required',
            ]);

            if($validator->fails()){
                toastr()->error($validator->errors(),'Error');
                return redirect()->back();
            }

            $create = StudentInfo::create($request->all());
            if($create){
                toastr()->error('Created successfuly','Success');
                return redirect()->back();
            }
        }
        
        return view('registration.index',compact('departments'));
    }
    
    public function fetch_departments($faculty_id){
        $depts = Helper::get_departments($faculty_id);
        return $depts;
    }
}

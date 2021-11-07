<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentInfo;
use Session;
use DB;

class StudentSettingController extends Controller
{
    public function index()
    {
        return view('admin_student.profile.setting');
    }
    public function edit()
    {
        $id = Session::get('student_id');
        $student = StudentInfo::select('Program')->where('Registration_Number',$id)->first();
        return view('admin_student.profile.edit',compact('student'));
    }
    public function updatepro(Request $request)
    {
        //return $request->all();
        $id = Session::get('student_id');
        DB::table('student_infos')->where('Registration_Number', $id)
          ->update([
              'Full_Name' => $request->Full_Name,
              'Religion' => $request->Religion,
              'Blood_Group' => $request->Blood_Group,
              'Nationality' => $request->Nationality,
              'Date_of_Birth' => $request->Date_of_Birth,
              'Student_Mobile_Number' => $request->Student_Mobile_Number,
              'Gender' => $request->Gender,
              'Fathers_Name' => $request->Fathers_Name,
              'Fathers_Profession' => $request->Fathers_Profession,
              'Mothers_Name' => $request->Mothers_Name,
              'Mothers_Profession' => $request->Mothers_Profession,
              'Guardian_Name' => $request->Guardian_Name,
              'Guardian_Email' => $request->Guardian_Email,
              'Guardian_Mobile_Number' => $request->Guardian_Mobile_Number,
              'Present_Address' => $request->Present_Address,
              'Permanent_Address' => $request->Permanent_Address,
              ]);
             
        return redirect('/student-profile');
    }
    public function passwordChange(Request $request)
    {
        $id = Session::get('student_id');
        $student = DB::table('student_infos')->select('Password')->where('Registration_Number', $id)->first();
        
        if($request->input('for')=="photo"){
            // $this->validate($request, [
            //     'Photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //   ]);
            $imageUrl = $this->imageExistStatus($request);
            //return $imageUrl;
            DB::table('student_infos')->where('Registration_Number',$id)
                ->update([
                    'Photo'=> $imageUrl
                ]);
        }
        if($request->input('for')=="pass"){
           
            if($student->Password==$request->old_password){
                
                DB::table('student_infos')->where('Registration_Number', $id)
                ->update([
                    'Password'=>$request->new_password
                ]);
            }
        }
        //$imageUrl = $this->imageExistStatus($request);
        //return $request->all();
       
        return redirect('/student-profile');

    }

    private function imageExistStatus($request) {
        $id = Session::get('student_id');
        $studentId = StudentInfo::where('Registration_Number',$id)->first();
        $Photo = $request->file('Photo');
        if ($Photo) {
            unlink($studentId->Photo);
            
            //$name = $Photo->getClientOriginalName();
            $name = str_slug($id).'.'.$Photo->getClientOriginalExtension();
            $uploadPath = 'public/StudentImage/';
            $Photo->move($uploadPath, $name);
            $imageUrl = $uploadPath.$name;
           
        } else {
            
            $imageUrl = $studentId->Photo;
            
        }
        return $imageUrl;
    }
}

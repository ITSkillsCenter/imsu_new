<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ApplicationFee;
use DB;
use App\Lga;
use App\State;
use App\Faculty;
use App\Department;
use App\StudentInfo;
use Illuminate\Http\Request;

use App\Imports\StudentsImport;
use App\Exports\StudentInfoExport;
use App\Pgapplicant;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StudentinfoExportImportController extends Controller
{

    public function export_std(Request $request)
    {
        $semester = $request->semester;
        $department = $request->department;
        //return $request->all();
        return Excel::download(new StudentInfoExport($semester, $department), 'students.xlsx');
    }


    public function exportform(Request $request){
        if($request->isMethod('post')){
            $extension = $request->csv_file->getClientOriginalExtension();
            if($extension !== 'csv'){
                return back()->with('error','Invalid file type, upload a csv file');
            }
           $user_information = fopen("$request->csv_file","r");
           $row = 0;
            while($oldUser = fgetcsv($user_information)){
                // dd(count($oldUser), $oldUser[0]);
               
                if($row == 0){
                    // if(strtolower($oldUser[0]) !== "s/n"){
                    //     return back()->with('error','S/N should be the first column');
                    // }
                    if(strtolower($oldUser[1]) !== 'lastname'){
                        return back()->with('error','lastname should be the second column');
                    }
                    if(strtolower($oldUser[2]) !== 'firstname'){
                        return back()->with('error','firstname should be the third column');
                    }
                    if(strtolower($oldUser[3]) !== 'middlename'){
                        return back()->with('error','middlename should be the fourth column');
                    }
                    if(strtolower($oldUser[4]) !== 'faculty'){
                        return back()->with('error','faculty should be the fifth column');
                    }
                    if(strtolower($oldUser[5]) !== 'department'){
                        return back()->with('error','department should be the sixth column');
                    }
                    if(strtolower($oldUser[6]) !== 'regno' && strtolower($oldUser[6]) !== 'reg no' && strtolower($oldUser[6]) !== 'reg no.'){
                        return back()->with('error','reg no should be the seventh column');
                    }
                    if(strtolower($oldUser[7]) !== 'matno' && strtolower($oldUser[7]) !== 'mat no' && strtolower($oldUser[7]) !== 'mat no.'){
                        return back()->with('error','S/N should be the eighth column');
                    }
                    if(strtolower($oldUser[8]) !== 'state'){
                        return back()->with('error','state should be the ninth column');
                    }
                    if(strtolower($oldUser[9]) !== 'lga'){
                        return back()->with('error','lga should be the tenth column');
                    }
                    if(strtolower($oldUser[10]) !== 'level'){
                        return back()->with('error','level should be the eleventh column');
                    }
                    if(strtolower($oldUser[11]) !== 'sex'){
                        return back()->with('error','sex should be the twelveth column');
                    }
                    if(strtolower($oldUser[12]) !== 'admission_year'){
                        return back()->with('error','admission_year should be the thirteenth column');
                    }
                    if(count($oldUser) !== 13){
                        return back()->with('error','The number of column didn\'t match the sample format');
                    }

                }
                if($row !== 0){
                    //skip duplicate registration_number
                    $userFound = StudentInfo::where('registration_number','=',$oldUser[6])->first();
                    if($userFound){
                        $found[$row]['registration_number'] = $userFound->registration_number;
                        continue;
                    }
                    //skip duplicate matric_number
                    $userFound = StudentInfo::where('matric_number','=',$oldUser[7])->first();
                    if($userFound){
                        $found[$row]['matric_number'] = $userFound->matric_number;
                        continue;
                    }
                    $faculty = Faculty::where(['name' => trim($oldUser[4])])->first();
                    $department = Department::where(['name' => trim($oldUser[5])])->first();
                    if(!$faculty){
                        return back()->with('error','Faculty: ' . $oldUser[4]. ' not found, please check the faculty list for the appropriate name');
                    }
                    if(!$department){
                        return back()->with('error','Department: ' . $oldUser[5]. ' not found, please check the department list for the appropriate name');
                    }
                    $state = State::where(['name' => trim($oldUser[8])])->first();
                    $lga = Lga::where(['name' => trim($oldUser[9])])->first();
                    $user[$row]['first_name'] = $oldUser[1];
                    $user[$row]['last_name'] = $oldUser[2];
                    $user[$row]['middle_name'] = $oldUser[3];
                    $password = uniqid();
                    $user[$row]['password'] = bcrypt($password);
                    $user[$row]['temp_password'] = $password;
                    $user[$row]['faculty_id'] = $faculty->id;
                    $user[$row]['dept_id'] = $department->id;
                    $user[$row]['registration_number'] = $oldUser[6];
                    $user[$row]['matric_number'] = $oldUser[7];
                    if(strlen($oldUser[7]) < 2){
                        $user[$row]['matric_number']=Null;
                    }
                    $user[$row]['state_of_origin'] =  $state !== null ? $state->name : null;
                    $user[$row]['lga'] = $lga !== null ? $lga->name : null;
                    $user[$row]['level'] = $oldUser[10];
                    $user[$row]['gender'] = $oldUser[11];
                    $user[$row]['Batch'] = $oldUser[12];
                }
               $row++;
            }
            $all= [];
            // dd($user);
            if(@$user !== null){
                StudentInfo::insert($user);
                return back()->with('success','Students Added');
                // return redirect()->back()->with(['success']);
            }else{
                return back()->with('error','Students already exist');
            }
        }

        return view('student.import');
        
    }

    public function importjamb(Request $request){
        if($request->isMethod('post')){
            $extension = $request->csv_file->getClientOriginalExtension();
            if($extension !== 'csv'){
                return back()->with('error','Invalid file type, upload a csv file');
            }
           $user_information = fopen("$request->csv_file","r");
           $row = 0;
            while($oldUser = fgetcsv($user_information)){
                // dd(count($oldUser), $oldUser[0]);
               
                if($row == 0){
                    if(($oldUser[0]) !== "RG_NUM"){
                        return back()->with('error','RG_NUM should be the first column');
                    }
                    if(($oldUser[1]) !== 'RG_CANDNAME'){
                        return back()->with('error','RG_CANDNAME should be the second column');
                    }
                    if(($oldUser[2]) !== 'RG_SEX'){
                        return back()->with('error','RG_SEX should be the third column');
                    }
                    if(($oldUser[3]) !== 'STATE_NAME'){
                        return back()->with('error','STATE_NAME should be the fourth column');
                    }
                    if(($oldUser[4]) !== 'LGA_NAME'){
                        return back()->with('error','LGA_NAME should be the fifth column');
                    }
                    if(($oldUser[5]) !== 'RG_AGGREGATE'){
                        return back()->with('error','RG_AGGREGATE should be the sixth column');
                    }
                    if(($oldUser[6]) !== 'CO_NAME'){
                        return back()->with('error','CO_NAME should be the seventh column');
                    }
                    if(($oldUser[7]) !== 'Subject1'){
                        return back()->with('error','Subject1 should be the eighth column');
                    }
                    if(($oldUser[8]) !== 'RG_Sub1Score'){
                        return back()->with('error','RG_Sub1Score should be the ninth column');
                    }
                    if(($oldUser[9]) !== 'Subject2'){
                        return back()->with('error','Subject2 should be the tenth column');
                    }
                    if(($oldUser[10]) !== 'RG_Sub2Score'){
                        return back()->with('error','RG_Sub2Score should be the eleventh column');
                    }
                    if(($oldUser[11]) !== 'Subject3'){
                        return back()->with('error','Subject3 should be the twelveth column');
                    }
                    if(($oldUser[12]) !== 'RG_Sub3Score'){
                        return back()->with('error','RG_Sub3Score should be the thirteenth column');
                    }
                    if(($oldUser[13]) !== 'EngScore'){
                        return back()->with('error','EngScore should be the thirteenth column');
                    }
                    if($oldUser[14] !== 'Year'){
                        return back()->with('error','Year should be the thirteenth column');
                    }
                    if(count($oldUser) !== 15){
                        return back()->with('error','The number of column didn\'t match the sample format');
                    }

                }
                if($row !== 0){
                    //skip duplicate registration_number
                    $userFound = Applicant::where('application_number','=',$oldUser[0])->first();
                    if($userFound){
                        $found[$row]['application_number'] = $userFound->application_number;
                        continue;
                    }
                    //skip duplicate matric_number
                    $user[$row]['application_number'] = $oldUser[0];
                    $user[$row]['full_name'] = $oldUser[1];
                    $user[$row]['sex'] = $oldUser[2];
                    $user[$row]['state'] = $oldUser[3];
                    $user[$row]['lga'] = $oldUser[4];
                    $user[$row]['jamb_score'] = $oldUser[5];
                    $user[$row]['course'] = $oldUser[6];
                    $user[$row]['jamb_subject1'] = $oldUser[7];
                    $user[$row]['score1'] = $oldUser[8];
                    $user[$row]['jamb_subject2'] = $oldUser[9];
                    $user[$row]['score2'] = $oldUser[10];
                    $user[$row]['jamb_subject3'] = $oldUser[11];
                    $user[$row]['score3'] = $oldUser[12];
                    $user[$row]['jamb_subject4'] = 'English';
                    $user[$row]['score4'] = $oldUser[13];
                    $user[$row]['year'] = $oldUser[14];
                    $user[$row]['type'] = 'jamb';
                }
               $row++;
            }
            $all= [];
            // dd($user);
            if(@$user !== null){
                Applicant::insert($user);
                return back()->with('success','Students Added');
                // return redirect()->back()->with(['success']);
            }else{
                return back()->with('error','Jamb Students already exist');
            }
        }

        return view('student.import_jamb');
    }

    public function importDe(Request $request){
        if($request->isMethod('post')){
            $extension = $request->csv_file->getClientOriginalExtension();
            if($extension !== 'csv'){
                return back()->with('error','Invalid file type, upload a csv file');
            }
           $user_information = fopen("$request->csv_file","r");
           $row = 0;
            while($oldUser = fgetcsv($user_information)){
                // dd(count($oldUser), $oldUser[0]);
               
                if($row == 0){
                    if(($oldUser[0]) !== "RG_NUM"){
                        return back()->with('error','RG_NUM should be the first column');
                    }
                    if(($oldUser[1]) !== 'RG_CANDNAME'){
                        return back()->with('error','RG_CANDNAME should be the second column');
                    }
                    if(($oldUser[2]) !== 'RG_SEX'){
                        return back()->with('error','RG_SEX should be the third column');
                    }
                    if(($oldUser[3]) !== 'STATE_NAME'){
                        return back()->with('error','STATE_NAME should be the fourth column');
                    }
                    if(($oldUser[4]) !== 'LGA_NAME'){
                        return back()->with('error','LGA_NAME should be the fifth column');
                    }
                    if(($oldUser[5]) !== 'CO_NAME'){
                        return back()->with('error','CO_NAME should be the sixth column');
                    }
                    if(($oldUser[6]) !== 'YEAR'){
                        return back()->with('error','YEAR should be the seventh column');
                    }
                    
                    if(count($oldUser) !== 7){
                        return back()->with('error','The number of column didn\'t match the sample format');
                    }

                }
                if($row !== 0){
                    //skip duplicate registration_number
                    $userFound = Applicant::where('application_number','=',$oldUser[0])->first();
                    if($userFound){
                        $found[$row]['application_number'] = $userFound->application_number;
                        continue;
                    }
                    //skip duplicate matric_number
                    $user[$row]['application_number'] = $oldUser[0];
                    $user[$row]['full_name'] = $oldUser[1];
                    $user[$row]['sex'] = $oldUser[2];
                    $user[$row]['state'] = $oldUser[3];
                    $user[$row]['lga'] = $oldUser[4];
                    $user[$row]['course'] = $oldUser[5];
                    $user[$row]['year'] = $oldUser[6];
                    $user[$row]['type'] = 'DE';
                }
               $row++;
            }
            $all= [];
            // dd($user);
            if(@$user !== null){
                Applicant::insert($user);
                return back()->with('success','Students Added');
                // return redirect()->back()->with(['success']);
            }else{
                return back()->with('error','Direct entry Students already exist');
            }
        }

        return view('student.import_jamb');
    }

    public function viewjamb(Request $request){
        if($request->isMethod('post')){
            if($request->type == 'pg'){
                $applicants = Pgapplicant::where(['year' => $request->year])->get();
                $type = $request->type;
                $year = $request->year;
                return view('student.pg_applicants', compact('applicants', 'year', 'type'));
            }else if($request->type == 'DE'){
                $bydept = Applicant::select('applicants.*', 'application_payments.*')->join('application_payments', 'applicants.application_number','application_payments.application_number')
                ->where(['applicants.mode_of_admission' => 'Direct Entry', 'year' => $request->year])->get()->groupBy('course')->map(function($values) {
                    return $values->count();
                });
                // $applicants = Applicant::join('application_payments', 'applicants.application_number','application_payments.application_number')
                // ->where(['mode_of_admission' => 'Direct Entry', 'year' => $request->year, 'application_payments.status' => 'PAID'])
                // ->groupBy('applicants.application_number')->get();
                $applicants = Applicant::select('applicants.*', 'application_payments.*')->join('application_payments', 'applicants.application_number','application_payments.application_number')
                ->where(['mode_of_admission' => 'Direct Entry', 'year' => $request->year, 'application_payments.status' => 'PAID'])
                ->groupBy('applicants.application_number')->get();

                $bydept = $applicants->groupBy('course');

                $type = $request->type;
                $year = $request->year;
                return view('student.jamb_students', compact('applicants', 'year', 'type', 'bydept'));
            }else{
                $bydept = Applicant::select('applicants.*', 'application_payments.*')->join('application_payments', 'applicants.application_number','application_payments.application_number')
                ->where(['applicants.mode_of_admission' => 'UTME', 'year' => $request->year])->get()->groupBy('course')->map(function($values) {
                    return $values->count();
                });
                // $applicants = Applicant::join('application_payments', 'applicants.application_number','application_payments.application_number')
                // ->where(['mode_of_admission' => 'UTME', 'year' => $request->year, 'application_payments.status' => 'PAID'])
                // ->groupBy('applicants.application_number')->get();

                $applicants = Applicant::select('applicants.*', 'application_payments.*')->join('application_payments', 'applicants.application_number','application_payments.application_number')
                ->where(['mode_of_admission' => 'UTME', 'year' => $request->year, 'application_payments.status' => 'PAID'])
                ->groupBy('applicants.application_number')->get();

                $bydept = $applicants->groupBy('course');

                // $applicants = ApplicationFee::where(['status' => 'PAID'])
                // ->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
                // ->get()->keyBy('application_number');
                // dd($applicants);

                // $applicants = Applicant::where(['type' => $request->type, 'year' => $request->year])->get();
                $type = $request->type;
                $year = $request->year;
                return view('student.jamb_students', compact('applicants', 'year', 'type', 'bydept'));
            }
            
        }
        return view('student.jamb_students');
    }

    public function viewjamb_bydept(Request $request, $year, $type, $id){
        if($type == 'jamb'){
                $applicants = Applicant::join('application_payments', 'applicants.application_number','application_payments.application_number')
            ->where(['mode_of_admission' => 'UTME', 'year' => $request->year, 'course' => base64_decode($id), 'application_payments.status' => 'PAID'])
            ->groupBy('applicants.application_number')->get();
        }elseif($type == 'DE'){
                $applicants = Applicant::join('application_payments', 'applicants.application_number','application_payments.application_number')
            ->where(['mode_of_admission' => 'Direct Entry', 'year' => $request->year, 'course' => base64_decode($id), 'application_payments.status' => 'PAID'])
            ->groupBy('applicants.application_number')->get();
        }
        // $applicants = Applicant::where(['type' => $type, 'year' => $year, 'course' => base64_decode($id)])->get();
        // $applicants = Applicant::join('application_payments', 'applicants.application_number','application_payments.application_number')
        // ->where(['type' => $request->type, 'year' => $request->year, 'course' => base64_decode($id), 'application_payments.status' => 'PAID'])
        // ->groupBy('applicants.application_number')->get();
        
        $tot = count($applicants);
        $msg = base64_decode($id);
        return view('student.jamb_students', compact('applicants', 'year', 'type', 'bydept', 'msg', 'tot'));
    }

    public function import_std(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        $path = $request->file('file')->getRealPath();
        $data = Excel::load($path)->get();

        if ($data->count()) {
            foreach ($data as $key => $value) {
                print_r($value);

                $arr[] = [
                    'Enrollment_Semester' => $value->Enrollment_Semester,
                    'Registration_Number' => $value->Registration_Number,
                    'Full_Name' => $value->Full_Name,
                    'Batch' => $value->Batch,
                    'Program' => $value->Program,
                    'Date_of_Birth' => $value->Date_of_Birth,
                    'Gender' => $value->Gender,
                    'Marital_Status' => $value->Marital_Status,
                    'Blood_Group' => $value->Blood_Group,
                    'Religion' => $value->Religion,
                    'Nationality' => $value->Nationality,
                    'Fathers_Name' => $value->Fathers_Name,
                    'Fathers_Profession' => $value->Fathers_Profession,
                    'Mothers_Name' => $value->Mothers_Name,
                    'Mothers_Profession' => $value->Mothers_Profession,
                    'Student_Mobile_Number' => '88' . $value->Student_Mobile_Number,
                    'Guardian_Name' => $value->Guardian_Name,
                    'Guardian_Mobile_Number' => $value->Guardian_Mobile_Number,
                    'Guardian_Email' => $value->Guardian_Email,
                    'Present_Address' => $value->Present_Address,
                    'Permanent_Address' => $value->Permanent_Address
                ];
            }
            print_r($arr);
            exit();
            if (!empty($arr)) {
                StudentInfo::insert($arr);
            }
        }
        return back()->with('success', 'Insert Record successfully.');
    }


    // public function handleImportUser(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'file' => 'required'
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect()
    //             ->back()
    //             ->withErrors($validator);
    //     }
    //     $file = $request->file('file');
    //     $csvData = file_get_contents($file);
    //     $rows = array_map("str_getcsv", explode("\n", $csvData));
    //     $header = array_shift($rows);
    //     foreach ($rows as $row) {
    //         $row = array_combine($header, $row);
    //         StudentInfo::create([
    //             'Enrollment_Semester'  => $row[0],
    //             'Registration_Number'  => $row[1],
    //             'Full_Name'  => $row[2],
    //             'Batch'  => $row[3],
    //             'Program'  => $row[4],
    //             'Gender'  => $row[4],
    //             'Date_of_Birth'  => $row['MATRIC / REGNO'],
    //             'Marital_Status'  => $row[6],
    //             'Blood_Group'  => $row[7],
    //             'Religion'  => $row[8],
    //             'Nationality'  => $row[9],
    //             'Fathers_Name'  => $row[10],
    //             'Fathers_Profession'  => $row[11],
    //             'Mothers_Name'  => $row[12],
    //             'Mothers_Profession'  => $row[13],
    //             'Student_Mobile_Number'  => $row[14],
    //             'Guardian_Name'  => $row[15],
    //             'Guardian_Mobile_Number'  => $row[16],
    //             'Guardian_Email'  => $row[17],
    //             'Present_Address'  => $row[18],
    //             'Permanent_Address'  => $row[19],
    //             'Major_1'  => $row[20],
    //             'Major_2'  => $row[21],
    //             'Minor_1'  => $row[22],
    //             'Minor_2'  => $row[23],
    //             'Remarks'  => $row[24],
    //         ]);
    //     }
    //     flash('Students imported');
    //     return redirect()->back();
    // }

   
}

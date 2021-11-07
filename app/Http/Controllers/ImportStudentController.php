<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\StudentInfo;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportStudentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function export()
  {

    return Excel::download(new StudentsExport, 'stdexs.csv');
  }

  public function import_std()
  {

    return view('student.import');
    //return "test";
  }


  public function import_st(Request $request)
  {


    $this->validate($request, [
      'file' => 'required|mimes:csv,txt,xlsx'
    ]);
    $file = $request->file('file');
    $filename = explode(".", $_FILES['file']['name']);
    $handle = fopen($_FILES['file']['tmp_name'], "r");
    // $csvData = file_get_contents($file);
    //$rows = array_map('str_getcsv',explode("\n", $csvData));
    //$header = array_shift($rows);

    $students = fgetcsv($handle);

    //foreach($rows as $row){
    // while ($row = getcwd()) {


    //   $data['Enrollment_Semester'] = $row[0];
    //   $data['Registration_Number'] = $row[1];
    //   $data['Full_Name'] = $row[2];
    //   $data['Batch'] = $row[3];
    //   $data['Program'] = $row[4];
    //   $data['Date_of_Birth'] = $row[5];
    //   $data['Gender'] = $row[6];
    //   $data['Marital_Status'] = $row[7];
    //   $data['Blood_Group'] = $row[8];
    //   $data['Religion'] = $row[9];
    //   $data['Nationality'] = $row[10];
    //   $data['Fathers_Name'] = $row[11];
    //   $data['Fathers_Profession'] = $row[12];
    //   $data['Mothers_Name'] = $row[13];
    //   $data['Mothers_Profession'] = $row[14];
    //   $data['Student_Mobile_Number'] = $row[15];
    //   $data['Email_Address'] = $row[16];
    //   $data['Password'] = $row[17];
    //   $data['Guardian_Name'] = $row[18];
    //   $data['Guardian_Mobile_Number'] = $row[19];
    //   $data['Guardian_Email'] = $row[20];
    //   $data['Present_Address'] = $row[21];
    //   $data['Permanent_Address'] = $row[22];
    //   $data['Current_semester'] = $row[23];
    //   $data['Current_status'] = $row[24];
    //   $data['Payment_status'] = $row[25];
    //   $data['Major_1'] = $row[26];
    //   $data['Major_2'] = $row[27];
    //   $data['Minor_1'] = $row[28];
    //   $data['Minor_2'] = $row[29];
    //   $data['Remarks'] = $row[30];
    //   $data['Division'] = $row[31];
    //   $data['District'] = $row[32];
    //   $data['Upazila'] = $row[33];
    //   $data['Unions'] = $row[34];
    //   $data['BCN'] = $row[35];
    //   //return $data;


    //   // $row = array_combine($header, $row);
    //   DB::table('student_infos')->insert(
    //     [
    //       'Enrollment_Semester'  => $data['Enrollment_Semester'],
    //       'Registration_Number'  => $data['Registration_Number'],
    //       'Full_Name'  => $data['Full_Name'],
    //       'Batch'  => $data['Batch'],
    //       'Program'  => $data['Program'],
    //       'Date_of_Birth'  => $data['Date_of_Birth'],
    //       'Gender'  => $data['Gender'],
    //       'Marital_Status'  => $data['Marital_Status'],
    //       'Blood_Group'  => $data['Blood_Group'],
    //       'Religion'  => $data['Religion'],
    //       'Nationality'  => $data['Nationality'],
    //       'Fathers_Name'  => $data['Fathers_Name'],
    //       'Fathers_Profession'  => $data['Fathers_Profession'],
    //       'Mothers_Name'  => $data['Mothers_Name'],
    //       'Mothers_Profession'  => $data['Mothers_Profession'],
    //       'Student_Mobile_Number'  => $data['Student_Mobile_Number'],
    //       'Email_Address' => $data['Email_Address'],
    //       'Password' => $data['Password'],
    //       'Guardian_Name'  => $data['Guardian_Name'],
    //       'Guardian_Mobile_Number'  => $data['Guardian_Mobile_Number'],
    //       'Guardian_Email'  => $data['Guardian_Email'],
    //       'Present_Address'  => $data['Present_Address'],
    //       'Permanent_Address'  => $data['Permanent_Address'],
    //       'Current_semester'  => $data['Current_semester'],
    //       'Current_status'  => $data['Current_status'],
    //       'Payment_status'  => $data['Payment_status'],
    //       'Major_1'  => $data['Major_1'],
    //       'Major_2'  => $data['Major_2'],
    //       'Minor_1'  => $data['Minor_1'],
    //       'Minor_2'  =>  $data['Minor_2'],
    //       'Remarks'  => $data['Remarks']
    //     ]
    //   );
    // }
    // fclose($handle);
    // return redirect()->route('studentinfo.create');
  }
}

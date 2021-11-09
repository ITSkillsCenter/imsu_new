<?php

namespace App\Helper;

use App\Applicant;
use App\ApplicationFee;
use App\Course;
use App\Current_Semester_Running;
use App\Department;
use App\StudentInfo;
use App\Faculty;
use App\FeeHistory;
use App\Semester;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Helper
{
    public static function get_student($mat){
        $std = StudentInfo::where(['matric_number' => $mat])->first();
        return $std;
    }
    public static function get_course($cid){
        $course = Course::find($cid);
        return $course;
    }

    public static function current_semester(){
        $current_semester = Current_Semester_Running::where('status','active')->first();
        return $current_semester->id;
    }

    public static function current_session_details(){
        $current_semester = Current_Semester_Running::where('status','active')->first();
        return $current_semester;
    }

    public static function current_semester_details(){
        $current_semester = Semester::where('status', 'active')->first();
        return $current_semester;
    }

    public static function get_current_semester(){
        $current_semester = Current_Semester_Running::where('status','active')->first();
        return $current_semester->title;
    }

    public static function get_session($id){
        $current_semester = Current_Semester_Running::where('id',$id)->first();
        return $current_semester->title;
    }

    public static function get_sem(){
        $sem = Semester::where('status','active')->first();
        return $sem->name;
    }

    public static function check_payment($student_id){
        $std = StudentInfo::where(['registration_number' => $student_id])->first();
        $pending_payments = FeeHistory::where(['student_id' => $std->id, 'status' => 'unpaid'])->count();
        return $pending_payments;
    }
    
    public static function previous_semester(){
        $previous_semester = Current_Semester_Running::where('previous_semester','1')->first();
        return $previous_semester->title;
    }

    public static function student_info(){
        $id = Session::get('student_id');
        $student_info = StudentInfo::where('registration_number', $id)->first();
        return $student_info;
    }

    public static function get_payment_status_for_applicant($application_number){
        $check = ApplicationFee::where(['application_number' => $application_number, 'status' => 'PAID'])->first();
        return $check !== null? 'Paid' : 'Unpaid';
    }

    public static function get_departments($faculty_id){
        $depts = Department::where(['faculty_id' => $faculty_id])->get();
        return $depts;
    }

    public static function get_department($dept_id){
        $dept = Department::find($dept_id);
        return $dept;
    }

    public static function get_faculty($faculty_id){
        $faculty = Faculty::find($faculty_id);
        return $faculty;
    }
    
    public static function student_batch($dept){
        
        $student_batch = StudentInfo::select('Batch')->where('Program', $dept)->distinct('Batch')->get();
        return $student_batch;
    }
    
    static function send_sms($contact, $msg) {
        $url = "http://esms.urssbd.com/smsapi";
        $data = [
          "api_key" => "C20072965fd58cf65186e9.30871691",
          "type" => "unicode",
          "contacts" => $contact,
          "senderid" => "BAIUST",
          "msg" => $msg,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    public static function server_maintenance(){
        $clientIP = Request::getClientIp(true);
        if($clientIP =! '116.206.58.205'){
            return true;
        }
    }
}

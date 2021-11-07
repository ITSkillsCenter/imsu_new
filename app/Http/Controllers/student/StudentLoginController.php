<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentInfo;
use App\Mail\PasswordReset;
use App\Otp;
use Mail;
use \Carbon\Carbon;
use App\Helper\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentLoginController extends Controller
{
    public function login_show()
    {
        // return "Server Under Maintenance";
        // if(Session::has('student_id')){
        //     return redirect()->route('student.home');
        // }else{
        //     return view('admin_student.login.login');
        // }
        return redirect()->route('base_url');
    }

    public function login(Request $request)
    {
        try{
            //return $request()->all();
            $id = $request->student_id;
        	$password = $request->password;
        	$data = StudentInfo::where('matric_number',$id)->first();
            // dd(Hash::check($password, $data->password));
            if (!Hash::check($password, $data->password)){
                toastr()->error('ID or Password Incorrect','Invalid Login');
        		return redirect()->route('base_url');
            }
            Session::put('student',$data);
        	$student_id = $data['matric_number'];
            Session::put('student_id',$student_id);
            return redirect()->route('student.home');
        	
        	if($data->Payment_status=='due'){
        	     toastr()->error('Our database record says that you have pending dues, please contact treasurer branch');
                 return redirect()->route('base_url');
        	 }
        	
        	 if($data->Current_status=='left'||$data->Current_status=='graduate'){
        	     toastr()->error('Our database record says that you are left or graduated from BAIUST');
                 return redirect()->route('base_url');
        	 }
    
        	// if(isset($data)&&($data==true)){
        	// 	Session::put('student_id',$student_id);
        	// 	return redirect()->route('student.home');
        	// }else{
        	//     toastr()->error('ID or Password Incorrect','Invalid Login');
        	// 	return redirect()->route('base_url');
        	// }
        }catch(\Exception $e){
            return $e->getMessage();
        }
    		
    }
    public function logout()
    {
        
        //Session::put('student_id','');
        session()->flush();
        return redirect('/student-portal')->with('message','Successfully logout');
    }
    
    public function send_otp(Request $request){
        // return $request;
        $student = StudentInfo::where('Student_Mobile_Number',$request->phone_number)
                                ->where('Current_status','current')
                                ->first();
        // return $student;
        if(!isset($student)){
            toastr()->error('No valid student found by this mobile number/student is not a current student!','Invalid Request');
            return redirect()->back();
        }
        else{
            $otp_gen = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $otp = Otp::create([
                'identifier' => $request->phone_number,
                'token' => $otp_gen
            ]);
            $msg = "BAIUST IUMSS Password Reset OTP - ".$otp->token;
            // send sms
            Helper::send_sms($request->phone_number,$msg);
            // send sms ends
            toastr()->warning('Your OTP will be expired in 5 minutes, please change your password within this time frame','Warning');
            return view('password_reset',compact('otp','student'));
        }
    }

    public function passwordUpdate(Request $request)
    {
        // return $request;
        $otp = Otp::find($request->otp_id);
        // return $otp;
        $now = strtotime(date("Y-m-d H:i:s"));
        $from = strtotime($otp->created_at);
        $diff = round(($now - $from)/60);
        // return $now.' '.$from;
        // return round(($now - $from)/60);
        // return $diff;
        if($request->sent_otp != $otp->token){
            // return "otp does not match";
            Otp::where('id',$request->otp_id)->update([
                'valid'=>0    
            ]);
            toastr()->error('OTP does not Match','error');
            return redirect('/');
        }
        elseif($diff > 5){
            // return $diff;
            Otp::where('id',$request->otp_id)->update([
                'valid'=>0    
            ]);
            toastr()->error('Time exceeded','error');
            return redirect('/');
        }
        else{
            StudentInfo::where('Registration_Number',$request->std_id)->update([
                'Password' => $request->password
            ]);
            Otp::where('id',$request->otp_id)->update([
                'valid'=>0    
            ]);
            toastr()->success('Password Reset Successfully','Success');
            return redirect('/');
        }
    }
    
}

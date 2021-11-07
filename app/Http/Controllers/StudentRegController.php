<?php
namespace App\Http\Controllers;

use App\Department;
use App\DepartmentOption;
use Illuminate\Http\Request;

use App\Http\Requests;
// use Session;
use App\Institute;
use App\User;
use App\Faculty;
use App\Helper\Helper;
use App\IctFee;
use App\Lga;
use App\Mail\InvoiceMail;
use App\State;
use App\Country;
use App\FeeHistory;
use App\FeeList;
use App\GeneralSettings;
use App\Mail\ApprovalEmail;
use App\Student_Templogin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\StudentInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class StudentRegController extends Controller {

	
	  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('studentreg');
    }
    
	public function ict_fee(Request $request)
	{

        $std = StudentInfo::where(['matric_number' => $request->datastring['user_id']])->orWhere(['registration_number' => $request->datastring['user_id']])->first();
		return view('homepage.ict_fee');
	}

    public function generateMatric($year){
		$mat = 'IMSU/'.$year.'/'.substr(hexdec(uniqid()), -5);
		$check = StudentInfo::where(['matric_number' => $mat])->first();
		if($check == null){
			return $mat;
		}else{
			$this->generateMatric($year);
		}
	}

    public function save_ict_payment(Request $request){
        $data['reference_id'] = $request->datastring['reference_id'];
        $data['student_id'] =$request->datastring['user_id'];
        $data['amount'] = $request->datastring['amount']/100;
        $data['session_id'] = Helper::current_semester();
        $data['status'] = 'paid';
        $invoice = IctFee::create($data);

        $std = StudentInfo::where(['matric_number' => $request->datastring['user_id']])->orWhere(['registration_number' => $request->datastring['user_id']])->first();
        $details['amount'] = $request->datastring['amount']/100;
        $details['name'] = $std->first_name . ' ' . $std->last_name;
        $details['email'] = $std->Email_Address;
        $details['matric'] = $std->matric_number;
        $details['phone'] = $std->Student_Mobile_Number;
        $details['reference_id'] = $request->datastring['reference_id'];
        $details['item'] = 'Acceptance Fee';

        $std->Payment_status = 'paid';
        if (strlen($std->matric_number) < 2) {
            $std->matric_number = $this->generateMatric($std->Batch);
        }
        $std->save(); 



        Mail::to(urldecode($std->Email_Address))->send(new InvoiceMail($details));
        
        if($invoice){
            $resp['body'] = 'success';
            $resp['status'] = true;
            return $resp;
        }
        $resp['body'] = 'fail';
        $resp['status'] = false;
        return $resp;
    }

    public function student_registration_form(Request $request){
        //dd($request);
        $student_id = Session::get('student_id');
        $student = Session::get('student');
        $student_type = Session::get('student_type');
        // if($student['Payment_status'] !== 'paid' && $student_type == 'new'){
        //     return redirect('/pay-acceptance-fee');
        // }
        //dd($student);

        if($student['status'] == null){
            return redirect('registration-steps')->with('error','Verify your email address');
        }

        //dd('569',$request->type);
        $curr_session = Helper::current_semester();
        if($request->isMethod('post')){ 
            if($request->profile_image){
                $extensions = ['jpeg','png','jpg'];
                $extension = $request->profile_image->getClientOriginalExtension();
                if(!in_array($extension, $extensions)){
                    return back()->with('error','Invalid file type, upload a jpeg,png or jpg file');
                }
                $imageName = time().'.'.$request->profile_image->getClientOriginalExtension();
                $request->profile_image->move(public_path('profile_images'), $imageName);
                $request->merge(['Photo' => $imageName]);
            }
            $upd = StudentInfo::where(['id' => $student->id])->update($request->except(['_token', 'profile_image']));
            if($upd){
                
                return redirect('/student-registration-form/preview');
            }
        }

        $check = IctFee::where(['student_id' => $student_id, 'session_id' => $curr_session])->count();
        // if($check < 1){
        //     return redirect('ict-fee');
        // }

        
        $states = State::all();
        $department = Department::find($student->dept_id);
        $country = Country::all();
        $faculty = Faculty::find($student->faculty_id);
        $faculties = Faculty::all();
        return view('homepage.full_registration', compact('country','states', 'department', 'faculty', 'student', 'faculties'));

    }

    public function approve_student($student_id){
            
        $std = StudentInfo::find($student_id);
        $std->Current_status = 'approved';
        $std->status = 'approved';
        $std->save();

        if(strtolower(trim($std->state_of_origin)) == 'imo'){
            $fl = FeeList::where(['fee_type' => 4])->get();
        }else{
            //get only one schoolfees, either faculty level, department level, or others
            $fl = FeeList::where(['faculty_id' => $std->faculty_id])->where('is_schoolfees','yes')->get();
            if($fl->isEmpty()){
                $fl = FeeList::where(['department_id' => $std->dept_id])->where('is_schoolfees','yes')->get();
                 if($fl->isEmpty()){
                     $fl = FeeList::where(['faculty_id' => 'all'])->where('is_schoolfees','yes')->get();
                }
            }
        }
        
        if(count($fl) > 0){
            foreach($fl as $single){
                if($single->invoice_creation == 'auto'){
                    $al[] = $single;
                    $data['fee_id'] = $single->id;
                    $data['amount'] = $single->amount;
                    $data['student_id'] = $std->id;
                    $data['session_id'] = $current =  Helper::current_semester();
                    $data['is_applicable_discount'] = 'no';
                    $data['status'] = 'unpaid';
                    $data['faculty_id'] = $std->faculty_id;
                    $data['department_id'] = $std->dept_id;

                    //check if this invoice already exist, dont duplicate
                    $exist = FeeHistory::where('fee_id',$single->id)->where('student_id',$std->id)->where('session_id',$current)->count();
                    if($exist > 0){
                        continue;
                    }
                    FeeHistory::create($data);
                }
            }
        }
           
        return 'done';

    }

    public function preview(){
        $student_id = Session::get('student_id');
        $student__id = Session::get('student');
        $student = StudentInfo::find($student__id->id);
        $student->status = 'saved';
        $student->save();
        $curr_session = Helper::current_semester();
        $check = IctFee::where(['student_id' => $student_id, 'session_id' => $curr_session])->count();
        // if($check < 1){
        //     return redirect('ict-fee');
        // }

        
        $states = State::all();
        $department = Department::find($student->dept_id);
        // dd($student->dept_id);
        $faculty = Faculty::find($student->faculty_id);

        return view('homepage.preview', compact('states', 'department', 'faculty', 'student'));

    }

    public function preview_success(){
        $student_id = Session::get('student_id');
        $student__id = Session::get('student');
        $student = StudentInfo::find($student__id->id);
        $curr_session = Helper::current_semester();
        $check = IctFee::where(['student_id' => $student_id, 'session_id' => $curr_session])->count();
        // if($check < 1){
        //     return redirect('ict-fee');
        // }
        
        $states = State::all();
        $department = Department::find($student->dept_id);
        // dd($student->dept_id);
        $faculty = Faculty::find($student->faculty_id);
        
        $settings = GeneralSettings::first();
        if(!$settings && $settings->hod_approval == 'on'){
           $print = 'show'; 
        }else{
            // dd($student->id);
            $appr = $this->approve_student($student->id);

            $print = 'false';
        }
        $succ = 1;

        return view('homepage.preview', compact('states', 'department', 'faculty', 'student', 'print', 'succ'));

    }

    public function upload_csv(Request $request){
        if($request->isMethod('post')){
           $user_information = fopen("$request->csv_file","r");
           $row = 0;
            while($oldUser = fgetcsv($user_information)){
               if($row !== 0){
                    $userFound = StudentInfo::where('matric_number','=',$oldUser[6])->first();
                    if($userFound){
                        $found[$row]['email'] = $userFound->matric_number;
                        continue;
                    }
                    // dd($oldUser[1]);
                    $faculty = Faculty::where(['name' => $oldUser[3]])->first();
                    $department = Department::where(['name' => $oldUser[4]])->first();
                    $state = State::where(['name' => $oldUser[7]])->first();
                    $lga = Lga::where(['name' => $oldUser[8]])->first();
                    $user[$row]['first_name'] = $oldUser[1];
                    $user[$row]['last_name'] = $oldUser[2];
                    $password = uniqid();
                    $user[$row]['password'] = bcrypt($password);
                    $user[$row]['temp_password'] = $password;
                    $user[$row]['faculty_id'] = $faculty->id;
                    $user[$row]['dept_id'] = $department->id;
                    $user[$row]['batch'] = $oldUser[5];
                    $user[$row]['matric_number'] = $oldUser[6];
                    // $user[$row]['country'] = ' ';
                    $user[$row]['state_of_origin'] = $state->name;
                    $user[$row]['lga'] = $lga->name;
                    // $user[$row]['city'] = ' ';
                    // $user[$row]['phone'] = ' ';
                    // $user[$row]['joined_via'] = 'card';
                    // $user[$row]['email_verified'] = 1;
                    // $user[$row]['account_status'] = 'active';
                    // $user[$row]['referral_code'] = 'TGIC'.rand(0000,99999);
                    // $user[$row]['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
                    // $user[$row]['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
               }
               $row++;
            }
            $all= [];
            if(@$user !== null){
                StudentInfo::insert($user);

                dd('added');
            }else{
                dd('error');
            }
        }
        
        return view('homepage.upload');
    }

    
    


}

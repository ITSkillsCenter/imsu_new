<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ApplicationFee;
use App\Course;
use App\StudentInfo;
use App\Current_Semester_Running;
use App\Department;
use App\Faculty;
use App\FeeHistory;
use App\FeeList;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Requests\StudentInfoRequest;
use App\IctFee;
use App\Mail\ApprovalEmail;
use App\Mail\VerifyEmail;
use App\Pgapplicant;
use App\Scholarship;
use App\Semester;
use App\State;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Input, Redirect;
use Entrust;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PDF;
use Hash;
use Illuminate\Support\Facades\DB;
use Image;
class StudentInfoController extends Controller
{
    
    
    public function __construct()
	{
		//$this->middleware('permission:student-create');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        if(Auth::user()->dept_id !== null){
            $departments = Department::where(['id' => Auth::user()->dept_id])
                ->orderBy('name', 'asc')->get();
        }else{
            $departments = Department::orderBy('name', 'asc')->get();
        }
         
        return view('student.index', compact('departments'));
    }

    public function find($type=null){
        $join = false;
        if($type=='created'){
            $type = 'Account Created';
            $students = StudentInfo::with(['faculty','department'])->where('Email_Address','!=',Null)->get();
        }elseif($type =='registered'){
            $type = 'Registration Completed';
            $students = StudentInfo::where('status','!=',Null)->get();
        }elseif($type=='paid'){
            $type = 'Paid School Fees';
            $join = true; //check if join is not active
            //$students = StudentInfo::where('Payment','!=',Null)->get();
            $students = DB::table('fee_histories')
            ->join('student_infos', 'fee_histories.student_id', '=', 'student_infos.id')
            ->join('departments', 'departments.id', '=', 'student_infos.dept_id')
            ->join('faculties', 'faculties.id', '=', 'student_infos.faculty_id')
            ->select('student_infos.first_name', 'student_infos.last_name', 'student_infos.registration_number','student_infos.matric_number', 'fee_histories.status', 'fee_histories.fee_id','fee_histories.amount','departments.name as dept','faculties.name as faculty')
            ->where('fee_histories.status','paid')
            ->orderBy('fee_histories.id', 'desc')
            ->get();
        }

        //dd($students);
      


        return view('student.index', compact('students','type','join'));
    }

    public function manage_admission(Request $request){
        $applicants = ApplicationFee::where(['status' => 'PAID'])
        ->select('application_number', 'name', 'phone', 'amount', 'reference_id', 'pms_id', 'status', 'created_at', 'updated_at')
        ->get()->keyBy('application_number');
        $states = State::all();
        $departments = Department::all();
        $msg = null;
        return view('accounting.receivable.admission_fee_list', compact('applicants', 'states', 'lgas', 'departments', 'msg'));
    }

    public function get_mat_num($reg){
        $std = StudentInfo::where(['registration_number' => $reg])->first();
        if($std !== null){
            return $std->matric_number;
        }else{
            return null;
        }
        
    }

    public function student_year(Request $request)
    {
        $students = [];
        $dept = '';
        $registration = '';

        if($request->isMethod('post')){
            // dd($request->all());
            $dept = $request->dept;
            // $reqno = $request->registration_number;
            if($request->year){
                
                $csv_file = public_path('docs/students_'.$request->year.'.csv');

                $user_information = fopen("$csv_file", "r");
                $row = $count = 0;
                //dd($user_information);

                while ($oldUser = fgetcsv($user_information)) {
                    if ($row == 0) {
                        $error = false;
                    }else{
                        if($request->dept){
                            if($oldUser[5] == $dept){
                                $students[$row]['first_name'] = $oldUser[1];
                                $students[$row]['last_name'] = $oldUser[2];
                                $students[$row]['middle_name'] = $oldUser[3];
                                $students[$row]['faculty'] = $oldUser[4];
                                $students[$row]['dept']  = $oldUser[5];
                                $students[$row]['registration_number'] = $oldUser[6];
                                $students[$row]['matric_number'] = $this->get_mat_num($oldUser[6]);
                                $students[$row]['state_of_origin'] =  $oldUser[8];
                                $students[$row]['lga'] = $oldUser[9];
                                $students[$row]['Batch'] = $request->year;
                            }
                        }else{
                            $students[$row]['first_name'] = $oldUser[1];
                            $students[$row]['last_name'] = $oldUser[2];
                            $students[$row]['middle_name'] = $oldUser[3];
                            $students[$row]['faculty'] = $oldUser[4];
                            $students[$row]['dept']  = $oldUser[5];
                            $students[$row]['registration_number'] = $oldUser[6];
                            $students[$row]['matric_number'] = $this->get_mat_num($oldUser[6]);
                            $students[$row]['state_of_origin'] =  $oldUser[8];
                            $students[$row]['lga'] = $oldUser[9];
                            $students[$row]['Batch'] = $request->year;
                        }
                        
                        
                        
                    }
                    $row++;
                }
            }

            // dd($dept, $students);


        }

        if(Auth::user()->dept_id !== null){
            $departments = Department::where(['id' => Auth::user()->dept_id])
                ->orderBy('name', 'asc')->get();
        }else{
            $departments = Department::orderBy('name', 'asc')->get();
        }
        
         
        return view('student.student_year', compact('departments','students','dept'));
    }
    
    public function studentview(Request $request)
    {
        $id = $request->Registration_Number;
       
        $student = StudentInfo::where('Registration_Number',$id)->first();
       // return $student;
        return view('filter.single_student',['student'=>$student]);
    }

    public function studentDownload($id){
       
        $id = Crypt::decrypt($id);
       // return $id;
        $student = StudentInfo::where('Registration_Number',$id)->first();

       // return $student;
       //$pdf = PDF::loadView('filter.download'); 
       //dd($pdf); 
       //return $pdf->download('student.pdf');
        return view('filter.download',compact('student'));
    }

    public function dept_current_view(Request $request)
    {
            $this->validate($request,[
                'dept'=>'required',
                'status'=>'required'
            ]);
            $dept = $request->dept;
            $status = $request->status;
         
         $students = DB::table('student_infos')
                     ->where('Program', '=', $dept)
                     ->where('Current_status', '=', $status)
                     ->orderBy('Registration_Number','ASC')
                     ->get();
            $total =count($students);

       //return $total;
         return view('filter.dept_status',['students'=>$students,'total'=>$total,'dept'=>$dept,'status'=>$status]);
    }
    
    public function dept_level_view(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'dept'=>'required'
        ]);
        
        $dept = $request['dept'];
        $level = $request['level'];
       
       
        if($request['level'] == 'outgoing'){
            $students = StudentInfo::where('dept_id',$request['dept'])
                                ->where('Current_semester',$request['level'])
                                ->where('Current_status','passing')
                                ->get();
        }
        elseif($request['level'] == 'graduate'){
            $students = StudentInfo::where('dept_id',$request['dept'])
                                ->where('Current_status','graduate')
                                ->get();
        }

        if($dept){
             $total = StudentInfo::where('dept_id',$request['dept'])
                    ->where('Current_semester',$request['level'])
                    ->whereIn('Current_status',['current','paused'])
                    ->count();

            if($dept && $level){
                $students = StudentInfo::where(['dept_id' => $request['dept']])->where('level',$request['level'])->get();
            }else{
                $students = StudentInfo::where(['dept_id' => $request['dept']])->get();
            }
             
        }

        // dd($students, $total);
        
        // if($request->de)
        $dept = Department::where(['id' => $request['dept']])->first();
        $faculty = Faculty::where(['id' => $dept->faculty_id])->first();
        $paused =  StudentInfo::where('dept_id', $request['dept'])
                            ->where('Current_semester',$request['level'])
                            ->where('Current_status','paused')
                            ->get();
        $level = $request['level'];

        // dd($request['dept_id']);

        return view('filter.dept_level',compact('students','total','paused','dept', 'faculty','level'));     
    }

    public function scholarship(Request $request, $dept_id = null, $level = null){
        if(!is_null($dept_id) && !is_null($level)){
            $scholarships = Scholarship::select('scholarships.id','scholarships.matric_number', 'first_name', 'last_name', 'dept_id', 'faculty_id', 'lga', 'level', 'state_of_origin', 'photo')
                            ->join('student_infos', 'scholarships.matric_number', '=', 'student_infos.matric_number')
                            ->where(['dept_id' => base64_decode($dept_id), 'level' => base64_decode($level)])
                            ->get();
        }else{
            $scholarships = Scholarship::select('scholarships.id', 'scholarships.matric_number', 'first_name', 'last_name', 'dept_id', 'faculty_id', 'lga', 'level', 'state_of_origin', 'photo')
            ->join('student_infos', 'scholarships.matric_number', '=', 'student_infos.matric_number')->get();
        }
        // dd($scholarships);
        return view('filter.scholarship_students',compact('scholarships')); 
        
    }

    public function view_scholarship(Request $request, $id){
        // dd(base64_decode($id));
        if($request->isMethod('post')){
            $id = base64_decode($id);
            $scholarship = Scholarship::find($id);
            $scholarship->status = 'approved';
            $scholarship->reason = 'scholarship';
            $scholarship->save();
            $student = StudentInfo::where(['matric_number' => $scholarship->matric_number])->first();
            $affected = FeeHistory::where(['student_id' => $student->id])->update(['discount' => 50, 'is_applicable_discount' => 'yes']);
            if($affected){
                return back()->with('success','Application Approved Successfully');
            }
            
        }
        $scholarship = Scholarship::find(base64_decode($id));
        
        // dd($scholarships);
        return view('filter.view_scholarship',compact('scholarship', 'id'));
    }


    public function approve_acceptance(Request $request, $student_id = null){
        
        $all_emails = [];
        if($student_id !== null && $student_id!='waiting' && $student_id!='paid'){
            try{
                $std = StudentInfo::where('registration_number',base64_decode($student_id))->first();
                
                if($std){
                    $std->Payment_status = 'paid';
                    $std->save();
                }

                $std2 = IctFee::where('student_id',base64_decode($student_id))->first();
                if($std2){
                    $std2->status = 'approved';
                    $std2->save();
                }

                if($std->Email_Address !== null){
                    $data['title'] = 'Acceptance Verified';
                    $data['body'] = 'Your Acceptance Payment Receipt has been verified';
                    // $data['body'] = 'Your Acceptance Payment Receipt has been verified';
                    Mail::to($std->Email_Address)->send(new ApprovalEmail($data));
                }
                // dd($std->faculty_id, $std->dept_id, $fl);
                return back()->with('success','Acceptance Receipt Approved Successfully');
            }catch(\Throwable $th){
                return back()->with('error',$th->getMessage());
            }
        }
        if($request->isMethod('post')){
            try{
                foreach($request->student_id as $student){
                    $std = StudentInfo::where('registration_number',$student)->first();
                    if($std->Email_Address !== null){
                        $all_emails[] = $std->Email_Address;
                    }
                    $std->Payment_status = 'paid';
                    $std->save();
                    
                    $std2 = IctFee::where('student_id',$student)->first();
                    $std2->status = 'approved';
                    $std2->save();

                }
                $data['title'] = 'Acceptance Verified';
                $data['body'] = 'Your Acceptance Payment Receipt has been verified';
                Mail::to($all_emails[0])
                ->bcc($all_emails)
                ->send(new ApprovalEmail($data));

                // toastr()->success('Registration Approved Successfully', 'Success');
                return back()->with("success",'Acceptance Receipt Approved Successfully');
            }catch(\Throwable $th){

                return back()->with('error',$th->getMessage());
            }
        }

        $waiting = DB::table('ict_payments')
            ->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
            ->select('student_infos.first_name', 'student_infos.last_name', 'student_infos.registration_number', 'student_infos.Email_Address', 'ict_payments.*')
            ->where('student_infos.Payment_status','unpaid')
            ->orderBy('ict_payments.id', 'desc')
            ->get();
        $students = DB::table('ict_payments')
            ->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
            ->select('student_infos.first_name', 'student_infos.last_name', 'student_infos.registration_number', 'ict_payments.*')
            ->where('student_infos.Payment_status','paid')
            ->orderBy('ict_payments.id', 'desc')
            ->get();
        // dd($students);

        return view('filter.approve_acceptance',compact('students','waiting','student_id'));

    }

    public function reject_acceptance(Request $request){
        $student = StudentInfo::find($request->student_id);
        $std2 = IctFee::where('student_id', $student->registration_number)->first();
        if($std2){
            $std2->status = 'rejected';
            $std2->reason = $request->reason;
            $std2->save();
        }

        try{
            $data['title'] = 'Acceptance fee receipt rejected';
            $data['body'] = $request->reason;
            Mail::to($student->Email_Address)->send(new ApprovalEmail($data));
            return back()->with('success','Acceptance Payment Receipt has been verified successfully');
        }catch(\Throwable $th){
            return back()->with('error', $th->getMessage());
        }
        
    }

    public function approve_student(Request $request, $dept_id, $level, $student_id = null){
        
        $all_emails = [];
        if($student_id !== null){
            try{
                $std = StudentInfo::find(base64_decode($student_id));
                $std->Current_status = 'approved';
                $std->status = 'approved';
                $std->save();
                

                if($std->Email_Address !== null){
                    $data['title'] = 'Registration Approved';
                    $data['body'] = 'Your registration has been approved. You can now log in to your dashboard and complete your course registration';
                    Mail::to($std->Email_Address)->send(new ApprovalEmail($data));
                }

                if(strtolower(trim($std->state_of_origin)) == 'imo'){
                    $fl = FeeList::where(['fee_type' => 4])->get();
                }else{
                    $fl = FeeList::where(['faculty_id' => $std->faculty_id])
                    ->orwhere(['faculty_id' => 'all'])->orwhere(['department_id' => $std->dept_id])->get();
                }
                
                if(count($fl) > 0){
                    foreach($fl as $single){
                        if($single->invoice_creation == 'auto'){
                            $al[] = $single;
                            $data['fee_id'] = $single->id;
                            $data['amount'] = $single->amount;
                            $data['student_id'] = $std->id;
                            $data['session_id'] = $current = Helper::current_semester();
                            $data['is_applicable_discount'] = 'no';
                            $data['status'] = 'unpaid';
                            $data['faculty_id'] = $std->faculty_id;
                            $data['department_id'] = $std->dept_id;
                            
                            $exist = FeeHistory::where('fee_id',$single->id)->where('student_id',$std->id)->where('session_id',$current)->count();
                            if($exist > 0){
                                continue;
                            }

                            FeeHistory::create($data);
                        }
                    }
                }
                // dd($al);
                return back()->with('success','Registration Approved Successfully');
            }catch(\Throwable $th){
                return back()->with('error',$th->getMessage());
            }
        }
        if($request->isMethod('post')){
            try{
                foreach($request->student_id as $student){
                    $std = StudentInfo::find($student);
                    if($std->Email_Address !== null){
                        $all_emails[] = $std->Email_Address;
                    }
                    $std->Current_status = 'approved';
                    $std->status = 'approved';
                    $std->save();

                    if(strtolower(trim($std->state_of_origin)) == 'imo'){
                        $fl = FeeList::where(['fee_type' => 4])->get();
                    }else{
                        $fl = FeeList::where(['faculty_id' => $std->faculty_id])
                        ->orwhere(['faculty_id' => 'all'])->orwhere(['department_id' => $std->dept_id])->get();
                    }
                    
                    if(count($fl) > 0){
                        foreach($fl as $single){
                            if($single->invoice_creation == 'auto' && $single->is_applicable_to == $std->student_group){
                                $data['fee_id'] = $single->id;
                                $data['amount'] = $single->amount;
                                $data['student_id'] = $std->id;
                                $data['session_id'] = $current = Helper::current_semester();
                                $data['is_applicable_discount'] = 'no';
                                $data['status'] = 'unpaid';
                                $data['faculty_id'] = $std->faculty_id;
                                $data['department_id'] = $std->dept_id;

                                $exist = FeeHistory::where('fee_id',$single->id)->where('student_id',$std->id)->where('session_id',$current)->count();
                                if($exist > 0){
                                    continue;
                                }
                                FeeHistory::create($data);
                            }
                        }
                    }
                }
                $dat['title'] = 'Registration Approved';
                $dat['body'] = 'Your registration has been approved. You can now log in to your dashboard and complete your course registration';
                Mail::to($all_emails[0])
                ->bcc($all_emails)
                ->send(new ApprovalEmail($dat));

                // toastr()->success('Registration Approved Successfully', 'Success');
                return back()->with("success",'Registration Approved Successfully');
            }catch(\Throwable $th){

                return back()->with('error',$th->getMessage());
            }
        }

        
        $dept = Department::where(['id' => base64_decode($dept_id)])->first();
        $students = StudentInfo::where(['dept_id' => base64_decode($dept_id)])
                ->where('level',base64_decode($level))
                ->get();
        return view('filter.approve',compact('students','dept','level'));

    }

    public function reject_student(Request $request){

        $student = StudentInfo::find($request->student_id);
        $student->Current_status = 'rejected';
        $student->status = 'rejected';
        $student->reason = $request->reason;
        $student->save();
        try{
            $dat['title'] = 'Registration Rejected';
            $dat['body'] = $request->reason;
            Mail::to($student->Email_Address)->send(new ApprovalEmail($dat)); 
            return back()->with("success",'Registration Rejected Successfully');
        }catch(\Exception $th){
            return back()->with('error','Registration rejected but email didn\'t send');
        }
    }

    public function view_student(Request $request, $student_id){
        $student_id = base64_decode($student_id);
        $student = StudentInfo::find($student_id);

        return view('filter.view_student', compact('student'));
        // dd($student);
    }

    

    public function resend_email($id){
        $std = StudentInfo::find($id);
        if($std->Email_Address !== null){
            $new_data['email'] = $std->Email_Address;
			Mail::to(strtolower($std->Email_Address))->send(new VerifyEmail($new_data));
			return back()->with('success', 'Verification Email Sent!');
        }else{
            return back()->with('error', 'This student does not have a valid email address!');
        }
    }

    public function view_applicant(Request $request, $id){
        $applicant = Applicant::where(['application_number' => $id])->first();

        return view('student.view_applicant', compact('applicant'));
    }

    public function view_pgapplicant(Request $request, $id){
        $applicant = Pgapplicant::where(['application_number' => base64_decode($id)])->first();
        return view('student.view_pgapplicant', compact('applicant'));
    }

    public function print_slip($dept_id=null, $level=null){
        if($dept_id){
            $dept_id = base64_decode($dept_id);
            $level = base64_decode($level);
         
           $dept = Department::where(['id' => $dept_id])->first();
           if($dept){
               $faculty = Faculty::where(['id' => $dept->faculty_id])->first();
                $students = StudentInfo::where(['dept_id' => $dept_id])
                                ->where('level',$level)
                                ->get();
                 return view('filter.print_slip',compact('students','dept', 'faculty'));  
           }
           
        }
    }

    public function id_management(){
        $students = DB::table('fee_histories')
            ->join('student_infos', 'fee_histories.student_id', '=', 'student_infos.id')
            ->join('departments', 'student_infos.dept_id', '=', 'departments.id')
            ->join('faculties', 'student_infos.faculty_id', '=', 'faculties.id')
            ->select('student_infos.first_name', 'student_infos.id', 'student_infos.last_name', 'student_infos.registration_number', 'student_infos.matric_number', 
            'student_infos.dept_id', 'student_infos.level', 'departments.name as dept', 'faculties.name as fs')
            ->where(['fee_histories.fee_id'=>42, 'fee_histories.status' => 'PAID'])
            ->orderBy('fee_histories.id', 'desc')
            ->get();

        return view('filter.id_management',compact('students'));
    }

    public function staff_id_management(){
       $staffs = User::join('departments', 'users.dept_id', '=', 'departments.id')
       ->join('faculties', 'users.faculty_id', '=', 'faculties.id')
       ->select('users.name', 'users.id', 'users.dept_id', 'departments.name as dept', 'faculties.name as fs')
       ->where('users.status', 'active')->get();

        return view('filter.staff_id_management',compact('staffs'));
    }

    public function view_id_management(Request $request, $id){
        $student = StudentInfo::find(base64_decode($id));
        return view('filter.id_management_single',compact('student'));
    }

    public function view_staff_id_management(Request $request, $id){
        $staff = User::find(base64_decode($id));
        return view('filter.id_management_single_staff',compact('staff'));
    }

    public function view_id_management_bulk(Request $request){
        if($request->isMethod('post')){
            foreach($request->student_id as $student){
                $student = StudentInfo::find($student);
                $all_students[] = $student;
            }
        }else{
            return redirect('/admin/id-management');
        }
        // $student = StudentInfo::find(base64_decode($id));
        return view('filter.id_management_bulk',compact('all_students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Current_Semester_Running::orderBy('status','asc')->get();
        $dept = Department::all();
        $states = State::all();
        $faculty = Faculty::all();

        return view('student.create', compact('semesters', 'faculty','dept','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentInfoRequest $request)
    {
        // return $request;
        try{
         
            $Photo = $request->file('Photo');
            
            if(file_exists($Photo)){
                
                $image = $request->file('Photo');
                $filename  = $image->getClientOriginalName();
        
                //Fullsize
                $image->move(public_path().'/uploads/images/students/',$filename);
        
                $image_resize = Image::make(public_path().'/uploads/images/students/'.$filename);
                $image_resize->fit(300, 300);
                $image_resize->save(public_path('/uploads/images/students/thumbnail/' .$filename));
              

            }else{
                $imageUrl='/uploads/images/students/avatar'.$request->Registration_Number.'.png';
            }
        
            //return $imageUrl;
        
            $stdinfo = new StudentInfo();
            $stdinfo->Enrollment_Semester = $request->Enrollment_Semester;
            $stdinfo->registration_number = $request->registration_number;
            $stdinfo->matric_number = $request->matric_number;
            $stdinfo->last_name = $request->last_name;
            $stdinfo->first_name = $request->first_name;
            $stdinfo->middle_name = $request->middle_name;
            $stdinfo->faculty_id = $request->faculty_id;
            $stdinfo->dept_id = $request->dept_id;
            $stdinfo->level = $request->level;
            $stdinfo->date_of_birth = $request->date_of_birth;
            $stdinfo->gender = $request->gender;
            $stdinfo->Marital_Status = $request->Marital_Status;
            $stdinfo->Blood_Group = $request->Blood_Group;
            $stdinfo->Religion = $request->Religion;
            $stdinfo->nationality = $request->nationality;
            $stdinfo->state_of_origin = $request->state_of_origin;
            $stdinfo->lga = $request->lga;
            $stdinfo->fathers_name = $request->fathers_name;
            $stdinfo->fathers_address = $request->fathers_address;
            $stdinfo->fathers_phone = $request->fathers_phone;
            $stdinfo->mothers_name = $request->mothers_name;
            $stdinfo->mothers_address = $request->mothers_address;
            $stdinfo->mothers_phone = $request->mothers_phone;
            $stdinfo->Student_Mobile_Number = $request->Student_Mobile_Number;
            $stdinfo->Email_Address = $request->Email_Address;
            $stdinfo->password = Hash::make('stdTempPass#');
            $stdinfo->temp_password = Hash::make('stdTempPass#');
            $stdinfo->student_type = $request->student_type;
            $stdinfo->guardians_name = $request->guardians_name;
            $stdinfo->guardians_phone = $request->guardians_phone;
            $stdinfo->guardians_relationship = $request->guardians_relationship;
            $stdinfo->guardians_address = $request->guardians_address;
            $stdinfo->sponsors_name = $request->sponsors_name;
            $stdinfo->sponsors_phone = $request->sponsors_phone;
            $stdinfo->sponsors_relationship = $request->sponsors_relationship;
            $stdinfo->sponsors_address = $request->sponsors_address;
            $stdinfo->Photo = $filename;
            
            $stdinfo->save();

            // $notification= array('title' => 'Data Saved', 'body' => "Student Info Save Successfully");
            return redirect()->route('studentinfo.create')->with("success","Student Info Save Successfully");

        }catch(\Throwable $th){
            
             return back()->with('error',$th->getMessage());
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentInfo  $studentInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Crypt::decrypt($id);

        try
        {

            $student = StudentInfo::where('Registration_Number',$data)->first();
            //return $student;
            return view('student.show',compact('student'));
        }
        catch (Exception $e)
        {
            $notification= array('title' => 'Data Edit', 'body' => "There is no record.");
            return Redirect::route('student.index')->with("error",$notification);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentInfo  $studentInfo
     * @return \Illuminate\Http\Response
     */
    
    public function verify(Request $request, $id)
    {
        $student = StudentInfo::where('id',base64_decode($id))->first(); 
        $student->status = 'verified';
        $student->save();
        
        $notification= array('title' => 'Account Verified', 'body' => 'Student Info verified Successfully.');
        
        return redirect()->route('studentinfo.index')->with("success",$notification);  
        
    }

    public function edit(Request $request, $id)
    {
        $student = StudentInfo::where('id',base64_decode($id))->first();   
        if($request->isMethod('post')){
          $student->update($request->all());
          return back()->with('success','Updated successfully!');  
        }

        try{

            $semesters = Current_Semester_Running::orderBy('status','asc')->get();
            $dept = Department::all();
            $states = State::all();
            $faculty = Faculty::all();
            
            return view('student.edit_student',compact('semesters', 'faculty','dept','states','student'));
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentInfo  $studentInfo
     * @return \Illuminate\Http\Response
     */
    public function update(StudentInfoRequest $request, $id)
    {
       try {

        // $this->validate($request,[
        //     'Student_Mobile_Number' => 'required|max:255',
        // ]);
            $stdinfo  = StudentInfo::where('Registration_Number',$id)->first();

            $imageUrl = $this->imageExistStatus($request);

            $stdinfo = new StudentInfo();
            $stdinfo->Enrollment_Semester = $request->Enrollment_Semester;
            $stdinfo->Registration_Number = $request->Registration_Number;
            $stdinfo->matric_number = $request->matric_number;
            $stdinfo->last_name = $request->last_name;
            $stdinfo->first_name = $request->first_name;
            $stdinfo->middle_name = $request->middle_name;
            $stdinfo->faculty_id = $request->faculty_id;
            $stdinfo->dept_id = $request->dept_id;
            $stdinfo->level = $request->level;
            $stdinfo->date_of_birth = $request->date_of_birth;
            $stdinfo->gender = $request->gender;
            $stdinfo->Marital_Status = $request->Marital_Status;
            $stdinfo->Blood_Group = $request->Blood_Group;
            $stdinfo->Religion = $request->Religion;
            $stdinfo->nationality = $request->nationality;
            $stdinfo->state_of_origin = $request->state_of_origin;
            $stdinfo->lga = $request->lga;
            $stdinfo->fathers_name = $request->fathers_name;
            $stdinfo->fathers_address = $request->fathers_address;
            $stdinfo->fathers_phone = $request->fathers_phone;
            $stdinfo->mothers_name = $request->mothers_name;
            $stdinfo->mothers_address = $request->mothers_address;
            $stdinfo->mothers_phone = $request->mothers_phone;
            $stdinfo->Student_Mobile_Number = $request->Student_Mobile_Number;
            $stdinfo->Email_Address = $request->Email_Address;
            $stdinfo->password = Hash::make('stdTempPass#');
            $stdinfo->temp_password = Hash::make('stdTempPass#');
            $stdinfo->student_type = $request->student_type;
            $stdinfo->guardians_name = $request->guardians_name;
            $stdinfo->guardians_phone = $request->guardians_phone;
            $stdinfo->guardians_relationship = $request->guardians_relationship;
            $stdinfo->guardians_address = $request->guardians_address;
            $stdinfo->sponsors_name = $request->sponsors_name;
            $stdinfo->sponsors_phone = $request->sponsors_phone;
            $stdinfo->sponsors_relationship = $request->sponsors_relationship;
            $stdinfo->sponsors_address = $request->sponsors_address;
            
            $stdinfo->Photo = $filename;

            $stdinfo->Photo = $imageUrl;
            //return $stdinfo;
           $stdinfo->save();
           
           $notification= array('title' => 'Data Store', 'body' => 'Student Info Updated Successfully.');
           
           return redirect()->route('studentinfo.index')->with("success",$notification); 
       } catch (\Throwable $th) {
           $th->getMessage();
       }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentInfo  $studentInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentInfo $studentInfo)
    {
        //
    }

     private function imageExistStatus($request) {
        $studentId = StudentInfo::where('Registration_Number', $request->Registration_Number)->first();
        $Photo = $request->file('Photo');
        if ($Photo) {
            unlink($studentId->Photo);
            
            $name = $Photo->getClientOriginalName();
            $uploadPath = 'public/StudentImage/';
            $Photo->move($uploadPath, $name);
            $imageUrl = $uploadPath.$name;
           
        } else {
            
            $imageUrl = $studentId->Photo;
            
        }
        return $imageUrl;
    }

    public function export_all(){
        $students = StudentInfo::with(['faculty','department'])->where('registration_number','!=',"")->get();
        return view('student.all-student',compact('students'));
    }
}

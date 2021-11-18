<?php

namespace App\Http\Controllers\student;

use App\Applicant;
use App\ApplicationFee;
use App\Current_Semester_Running;
use App\Fee;
use App\FeeHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeeList;
use App\Helper\Helper;
use App\IctFee;
use App\Mail\InvoiceMail;
use App\PaymentNotification;
use App\Pgapplicant;
use App\PgApplicationFee;
use App\Semester;
use App\StudentInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// use Session;
// use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PDF;
use NumberToWords\NumberToWords;


class PaymentController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')){
            // dd($request->all());
            if($request->image) {
				$extensions = ['jpeg', 'png', 'jpg'];
				$extension = $request->image->getClientOriginalExtension();
				if (!in_array($extension, $extensions)) {
					return back()->with('error', 'Invalid file type, upload a jpeg,png or jpg file');
				}
				$imageName = time() . '.' . $request->image->getClientOriginalExtension();
				$request->image->move(public_path('/uploads/images/receipts'), $imageName);
				$request->merge(['receipt' => $imageName]);
			}
            $save = FeeHistory::find($request->invoice_id);
            $save->receipt = $imageName;
            $save->save();
            return back()->with('success', 'Receipt uploaded successfuly, await admin\'s approval');
        }
        $student_id = Session::get('student_id');
        $std_id = StudentInfo::where(['matric_number' => $student_id])->orWhere(['registration_number' => $student_id])->first();
        $fees = FeeHistory::select('title', 'fee_id', 'fee_name', 'fee_histories.amount', 'fee_histories.id', 'student_id', 'session_id', 'is_applicable_discount', 'discount', 'fee_histories.status', 'due_date', 'reason', 'fee_histories.receipt')
            ->join('fee_lists', 'fee_id', '=', 'fee_lists.id')
            ->join('current__semester__runnings', 'session_id', '=', 'current__semester__runnings.id')
            ->where(['student_id' => $std_id->id])->get();
        $sid = Session::get('student_id');
        $sessions = Current_Semester_Running::all();
        $semesters = Semester::all();
        $fee_lists = FeeList::all();
        //   dd($sessions);
        return view('admin_student.payment.index', compact('sessions', 'fees', 'fee_lists', 'semesters'));
    }

    public function payment_notification(Request $request){
        $save = PaymentNotification::create($request->all());
        return $save;
    }

    public function generate_invoice(Request $request){
        $fee = FeeList::find($request->revenue_heads);
        $session = Current_Semester_Running::find($request->session);
        $student_data = Session::get('student');
        $data['amount'] = $fee->amount;
        $data['fee_id'] = $fee->id;
        $data['student_id'] = $student_data->id;
        $data['session_id'] = $session->id;
        $data['semester'] = $request->semester;
        $data['amount'] = $fee->amount;
        $data['is_applicable_discount'] = 'no';
        $data['department_id'] = $student_data->dept_id;
        $data['status'] = 'unpaid';
        $data['reason'] = 'generated';

        $create_inv = FeeHistory::create($data);
        if($create_inv){
            return redirect('/student-payment/view/'.base64_encode($create_inv->id));
        }
    }

    public function cancel_invoice(Request $request, $inv){
        $invoice = FeeHistory::find(base64_decode($inv))->delete();
        if($invoice){
            return redirect('/student-payment');
        }
    }

    public function save_payment_page(Request $request, $invoice_id){
        $invoice_id = base64_decode($invoice_id);
        // dd($request->all());
        $invoice = FeeHistory::where(['id' => $invoice_id])
            ->update(['reference_id' => $request->reference, 'invoice_id' => $request->invoice_no , 'status' => $request->status == 'PAID'? 'paid':'unpaid', 'payment_channel' => 'remita']);
        $std = StudentInfo::where(['matric_number' => $request->matric_no])->first();
        // dd($std);
        $inv = FeeHistory::find($invoice_id);
        $fl = FeeList::find($inv->fee_id);
        $details['amount'] = $inv->amount;
        $details['name'] = $std->first_name . ' ' . $std->last_name;
        $details['email'] = $std->Email_Address;
        $details['matric'] = $std->matric_number;
        $details['phone'] = $std->Student_Mobile_Number;
        $details['reference_id'] = $request->reference;
        $details['invoice_id'] = $request->invoice_no;
        $details['item'] = $fl->fee_name;

        // dd($details);
        Mail::to(urldecode($std->Email_Address))->send(new InvoiceMail($details));

        return redirect('/student-payment/view/' . base64_encode($invoice_id));
    }

    public function save_payment_page_interswitch(Request $request, $invoice_id){
        $invoice_id = base64_decode($invoice_id);
        // dd($request->all());
        $invoice = FeeHistory::where(['id' => $invoice_id])
            ->update(['reference_id' => $request->reference, 'invoice_id' => $request->invoice_no , 'status' => $request->status == 'PAID'? 'paid':'unpaid', 'payment_channel' => 'interswitch']);
        $std = StudentInfo::where(['matric_number' => $request->matric_no])->first();
        // dd($std);
        $inv = FeeHistory::find($invoice_id);
        $fl = FeeList::find($inv->fee_id);
        $details['amount'] = $inv->amount;
        $details['name'] = $std->first_name . ' ' . $std->last_name;
        $details['email'] = $std->Email_Address;
        $details['matric'] = $std->matric_number;
        $details['phone'] = $std->Student_Mobile_Number;
        $details['reference_id'] = $request->reference;
        $details['invoice_id'] = $request->invoice_no;
        $details['item'] = $fl->fee_name;

        // dd($details);
        Mail::to(urldecode($std->Email_Address))->send(new InvoiceMail($details));

        return redirect('/student-payment/view/' . base64_encode($invoice_id));
    }

    public function payment_page(Request $request, $invoice_id)
    {
        $invoice_id = base64_decode($invoice_id);

        $fee = FeeHistory::select('title', 'fee_id', 'fee_name', 'fee_histories.amount', 'fee_histories.id', 'student_id', 'session_id', 'is_applicable_discount', 'discount', 'fee_histories.status', 'due_date', 'reason', 'fee_lists.pms_id', 'fee_lists.interswitch_item_code', 'fee_lists.remita_service_id')
            ->join('fee_lists', 'fee_id', '=', 'fee_lists.id')
            ->join('current__semester__runnings', 'session_id', '=', 'current__semester__runnings.id')
            ->where(['fee_histories.id' => $invoice_id])->first();

        return view('admin_student.payment.payment_page', compact('fee', 'invoice_id'));
    }

    public function update_payment_details(Request $request){
        // dd($request->all(), $request->response);
        if($request->response['data']['status'] == 'PAID'){
            $update_history = FeeHistory::where(['reference_id' => $request->response['data']['tranx_ref']])
            ->update(['status' => 'paid']);
            // dd($update_history, $request->response['data']['rrr']);
            if($update_history){
                $resp['body'] = 'success';
                $resp['status'] = true;
            }else{
                $resp['body'] = 'error';
                $resp['status'] = false;
            }
            return $resp;
        }
    }

    public function update_application_payment(Request $request){
        if($request->response['data']['status'] == 'Paid'){
            $update_history = ApplicationFee::updateOrCreate(
                [
                    'application_number' => $request->response['data']['matric_no'],
                    'reference_id' => $request->response['data']['tranx_ref'],
                ],
                [
                'pms_id' => $request->response['data']['inv_no'],
                'status' => 'PAID',
                'amount' => $request->response['data']['amount'],
                'phone' => $request->phone,
                'name' => $request->name,
            ]);
            // dd($update_history, $request->response['data']['rrr']);
            if($update_history){
                $resp['body'] = 'success';
                $resp['status'] = true;
            }else{
                $resp['body'] = 'error';
                $resp['status'] = false;
            }
            return $resp;
        }else{
            $resp['body'] = 'error';
            $resp['status'] = false;
        }
    }

    public function save_bank_ref(Request $request){
        FeeHistory::where(['id' => $request->client_ref ])->update(['reference_id' => $request->rrr, 'payment_channel' => $request->payment_channel]);
        $resp['body'] = 'success';
        $resp['status'] = true;
        return $resp;
    }

    public function save_application_fee(Request $request)
    {
        $std = Applicant::where(['application_number' => $request->matric_no])->first();
        $fee = FeeList::where(['fee_name' => 'PUTME Fee'])->first();
        $details['amount'] = $fee->amount;
        $details['name'] = $std->full_name;
        $details['email'] = $std->email;
        $details['application_number'] = $request->matric_no;
        $details['phone'] = $std->phone_number;
        $details['reference_id'] = $request->reference;
        $details['pms_id'] = $request->invoice_no;
        $details['status'] = $request->status;
        $details['item'] = $fee->fee_name;
        $details['payment_channel'] = 'remita';
        // dd($request->all(), $details);

        $cr = ApplicationFee::create($details);
        // dd($details, $cr);
        if($cr){
            $std->status = 'paid';
            $std->save();
        }
       
        Mail::to(urldecode($std->email))->send(new InvoiceMail($details));
        Session::put('jamb_reg', $request->matric_no);
        return redirect('/application-step3/'.$request->matric_no);
        
    }

    public function save_application_fee_interswitch(Request $request){
        $std = Applicant::where(['application_number' => $request->matric_no])->first();
        $fee = FeeList::where(['fee_name' => 'PUTME Fee'])->first();
        $details['amount'] = $fee->amount;
        $details['name'] = $std->full_name;
        $details['email'] = $std->email;
        $details['application_number'] = $request->matric_no;
        $details['phone'] = $std->phone_number;
        $details['reference_id'] = $request->reference;
        $details['pms_id'] = $request->invoice_no;
        $details['status'] = $request->status;
        $details['item'] = $fee->fee_name;
        $details['payment_channel'] = 'interswitch';
        // dd($request->all(), $details);

        $cr = ApplicationFee::create($details);
        // dd($details, $cr);
        if($cr){
            $std->status = 'paid';
            $std->save();
        }
       
        Mail::to(urldecode($std->email))->send(new InvoiceMail($details));
        Session::put('jamb_reg', $request->matric_no);
        return redirect('/application-step3/'.$request->matric_no);
    }

    public function save_direct_interswitch(Request $request){
        $fee = FeeList::find($request->client_ref);
        $student = StudentInfo::where(['registration_number' => $request->matric_no])->first();
        $details['fee_id'] = $fee->id;
        $details['amount'] = $fee->amount;
        $details['student_id'] = $student->id;
        $details['session_id'] = Helper::current_session_details()->id;
        $details['is_applicable_discount'] = 'no';
        $details['status'] = $request->status;
        $details['payment_channel'] = 'interswitch';
        $details['reference'] = $request->reference;
        $details['reference_id'] = $request->reference;
        $details['payment_type'] = $request->invoice_no;
        $details['name'] = $student->full_name;
        $details['email'] = $student->Email_Address;
        $details['application_number'] = $request->matric_no;
        $details['phone'] = $student->Student_Mobile_Number;
        $details['item'] = $fee->fee_name;
        // dd($details);
        $sv = FeeHistory::create($details);
        // Mail::to(urldecode($student->Email_Address))->send(new InvoiceMail($details));
      
        return redirect('/success-payment/'.base64_encode($sv->id))->with('success', 'Payment is Successful, An reciept has been sent to your email');
    }

    public function pg_save_application_fee(Request $request)
    {
        $std = Pgapplicant::where(['application_number' => $request->matric_no])->first();
        $fee = FeeList::where(['fee_name' => 'IMSU - PG APPLICATION FORM'])->first();
        $details['amount'] = $fee->amount;
        $details['name'] = $std->full_name;
        $details['email'] = $std->email;
        $details['application_number'] = $request->matric_no;
        $details['phone'] = $std->phone_number;
        $details['reference_id'] = $request->reference;
        $details['pms_id'] = $request->invoice_no;
        $details['status'] = $request->status;
        $details['item'] = $fee->fee_name;
        $details['payment_channel'] = 'remita';
        // dd($request->all(), $details);

        $cr = PgApplicationFee::create($details);
        // dd($details, $cr);
        if($cr){
            $std->status = 'paid';
            $std->save();
        }
       
        Mail::to(urldecode($std->email))->send(new InvoiceMail($details));
        // Session::put('jamb_reg', $request->matric_no);
        return redirect('/pg-application-step3/'.base64_encode($std->application_number));
        
    }

    public function pg_save_application_fee_interswitch(Request $request){
        $std = Pgapplicant::where(['application_number' => $request->matric_no])->first();
        $fee = FeeList::where(['fee_name' => 'IMSU - PG APPLICATION FORM'])->first();
        $details['amount'] = $fee->amount;
        $details['name'] = $std->full_name;
        $details['email'] = $std->email;
        $details['application_number'] = $request->matric_no;
        $details['phone'] = $std->phone_number;
        $details['reference_id'] = $request->reference;
        $details['pms_id'] = $request->invoice_no;
        $details['status'] = $request->status;
        $details['item'] = $fee->fee_name;
        $details['payment_channel'] = 'interswitch';
        // dd($request->all(), $details);

        $cr = PgApplicationFee::create($details);
        // dd($details, $cr);
        if($cr){
            $std->status = 'paid';
            $std->save();
        }
       
        Mail::to(urldecode($std->email))->send(new InvoiceMail($details));
        // Session::put('jamb_reg', $request->matric_no);
        return redirect('/pg-application-step3/'.base64_encode($std->application_number));
    }



    // public function save_application_fee_interswitch(Request $request)
    // {
    //     // dd($request->all());
    //     $std = Applicant::where(['application_number' => $request->datastring['user_id']])->first();
    //     $fee = FeeList::where(['fee_name' => 'PUTME Fee'])->first();
    //     $details['amount'] = $fee->amount;
    //     $details['name'] = $std->full_name;
    //     $details['email'] = $std->email;
    //     $details['application_number'] = $request->datastring['user_id'];
    //     $details['phone'] = $std->phone_number;
    //     $details['reference_id'] = $request->datastring['reference_id'];
    //     $details['pms_id'] = 11;
    //     $details['status'] = 1;
    //     $details['item'] = $fee->fee_name;
    //     $details['payment_channel'] = 'interswitch';

    //     $cr = ApplicationFee::create($details);
    //     if($cr){
    //         $std->status = 'paid';
    //         $std->save();
    //     }
    //     Mail::to(urldecode($std->email))->send(new InvoiceMail($details));
    //     $resp['body'] = 'success';
    //     $resp['status'] = true;
    //     return $resp;
        
    // }

    public function save_acceptance_fee(Request $request)
    {
        $data['reference_id'] = $request->reference;
        $data['student_id'] = $request->matric_no;
        $data['amount'] = $request->amount;
        $data['session_id'] = Helper::current_semester();
        $data['paid_via'] = 'remita';
        $data['status'] = 'paid';
        IctFee::create($data);

        $std = StudentInfo::where(['registration_number' => $request->matric_no])->first();
        $details['amount'] = $request->amount;
        $details['name'] = $std->first_name . ' ' . $std->last_name;
        $details['email'] = $std->Email_Address;
        $details['matric'] = $std->matric_number;
        $details['phone'] = $std->Student_Mobile_Number;
        $details['reference_id'] = $request->reference;
        $details['item'] = 'Acceptance Fee';
        $std->Payment_status = 'paid';
        $std->save();
        Mail::to(urldecode($std->Email_Address))->send(new InvoiceMail($details));
        return redirect('/registration-steps');
        
    }

    public function save_acceptance_fee_interswitch(Request $request)
    {
        $data['reference_id'] = $request->reference;
        $data['student_id'] = $request->matric_no;
        $data['amount'] = $request->amount;
        $data['session_id'] = Helper::current_semester();
        $data['paid_via'] = 'interswitch';
        $data['status'] = 'paid';
        IctFee::create($data);

        $std = StudentInfo::where(['registration_number' => $request->matric_no])->first();
        $details['amount'] = $request->amount;
        $details['name'] = $std->first_name . ' ' . $std->last_name;
        $details['email'] = $std->Email_Address;
        $details['matric'] = $std->matric_number;
        $details['phone'] = $std->Student_Mobile_Number;
        $details['reference_id'] = $request->reference;
        $details['item'] = 'Acceptance Fee';
        $std->Payment_status = 'paid';
        $std->save();
        Mail::to(urldecode($std->Email_Address))->send(new InvoiceMail($details));
        return redirect('/registration-steps');
        
    }

    

    public function view_invoice(Request $request, $invoice_id)
    {
        $invoice_id = base64_decode($invoice_id);
        $fee = FeeHistory::select('title', 'fee_id', 'fee_name', 'fee_histories.amount','fee_histories.reason' , 'fee_histories.id', 'fee_histories.reference_id', 'student_id', 'session_id', 'is_applicable_discount', 'discount', 'fee_histories.status', 'due_date', 'fee_histories.created_at')
            ->join('fee_lists', 'fee_id', '=', 'fee_lists.id')
            ->join('current__semester__runnings', 'session_id', '=', 'current__semester__runnings.id')
            ->where(['fee_histories.id' => $invoice_id])->first();

        return view('admin_student.payment.view_invoice', compact('fee', 'invoice_id'));
    }

    public function save_payment_details(Request $request)
    {
        //    dd($request->all());
        $invoice = FeeHistory::where(['id' => $request->datastring['invoice_id']])
            ->update(['reference_id' => $request->datastring['reference_id'], 'status' => 'paid', 'payment_channel' => $request->datastring['payment_channel']]);
        $std = Session::get('student');
        $inv = FeeHistory::find($request->datastring['invoice_id']);
        $fl = FeeList::find($inv->fee_id);
        $details['amount'] = $inv;
        $details['name'] = $std->first_name . ' ' . $std->last_name;
        $details['email'] = $std->Email_Address;
        $details['matric'] = $std->matric_number;
        $details['phone'] = $std->Student_Mobile_Number;
        $details['reference_id'] = $request->datastring['reference_id'];
        $details['item'] = $fl->fee_name;
        Mail::to(urldecode($std->Email_Address))->send(new InvoiceMail($details));
        if ($invoice) {
            $resp['body'] = 'success';
            $resp['status'] = true;
            return $resp;
        }
        $resp['body'] = 'fail';
        $resp['status'] = false;
        return $resp;
    }

    public function totalPaid()
    {
        $student_id = Session::get('student_id');
        $fees = DB::table('fee_histories')
            ->join('fees', 'fee_histories.fee_id', '=', 'fees.id')
            ->select('fee_histories.*', 'fees.total_payable')
            ->where('fee_histories.student_id', $student_id)
            ->get();
        //return $fees;
        return view('admin_student.payment.payment_history', compact('fees'));
    }


    public function paymentView($semester, $reg_type, $level)
    {

        $student_id = Session::get('student_id');

        $fee = DB::table('fees')
            ->select('semester', 'student_id', 'total_payable', 'due', 'remarks')
            ->where('student_id', $student_id)
            ->where('semester', $semester)
            ->first();
        $sessions = DB::table('registrations')
            ->select('semester', 'reg_type', 'levelTerm')
            ->where('student_id', $student_id)
            ->distinct()
            ->latest()
            ->get();
        //return $fee;
        // $semester = $request->semester;
        // $level = $request->level;
        // $reg_type = $request->reg_type;
        // $fees = DB::table('fee_lists')
        //         ->join('fee_details', 'fee_lists.id', '=', 'fee_details.feelist_id')
        //         ->select('fee_lists.*', 'fee_details.student_id')
        //         ->where('fee_details.student_id',$student_id)
        //         ->where('fee_details.semester',$semester)
        //         ->where('fee_details.levelterm',$level)
        //         ->where('fee_details.reg_type',$reg_type)
        //         ->get();

        //     $sessions = DB::table('registrations')
        //         ->select('semester','reg_type','levelTerm')
        //         ->where('student_id',$student_id)
        //         ->distinct()
        //         ->latest()
        //         ->get();


        // $total_credit = DB::table('courses_student')
        //         ->join('courses', 'courses_student.course_id', '=', 'courses.id')
        //         ->select('courses_student.*', 'courses.course_name','courses.course_code','courses.credit')
        //         ->where('courses_student.semester',$semester)
        //         ->where('courses_student.student_id',$student_id)
        //         ->where('courses_student.reg_type',$reg_type)
        //         ->sum('courses.credit');
        //         //return $total_credit;

        // $dept =  DB::table('student_infos')
        //         ->select('Program')
        //         ->where('Registration_Number',$student_id)
        //         ->first();

        //         if($dept->Program=='CSE'|| $dept->Program=='EEE' || $dept->Program=='CE'){
        //             $credit_cost=3200;
        //         }else if($dept->Program=='BBA'){
        //             $credit_cost=1850;
        //         }else if($dept->Program=='LLB'){
        //             $credit_cost=1475;
        //         }else{
        //             $credit_cost=1100;
        //         }
        //         $credit_fee = $credit_cost*$total_credit;
        //         if($reg_type==3||$reg_type==2||$reg_type==4){
        //             $fees=array();
        //             $fees= [
        //                 'fee_name'=>'Credit Fee',
        //                 'fee_amount'=>$credit_fee,
        //             ];
        //             return view('admin_student.payment.index',compact('fees','sessions','credit_fee','semester','level','reg_type','credit_cost','total_credit'));
        //         } 
        return view('admin_student.payment.index', compact('fee', 'sessions'));
    }
    public function payment_slip(Request $request)
    {
        $student_id = Session::get('student_id');
        $semester = $request->semester;
        $level = $request->level;
        $reg_type = $request->reg_type;
        $fees = DB::table('fee_lists')
            ->join('fee_details', 'fee_lists.id', '=', 'fee_details.feelist_id')
            ->select('fee_lists.*', 'fee_details.student_id')
            ->where('fee_details.student_id', $student_id)
            ->where('fee_details.semester', $semester)
            ->where('fee_details.levelterm', $level)
            ->where('fee_details.reg_type', $reg_type)
            ->get();

        $sessions = DB::table('student_infos')
            ->select('Enrollment_Semester')
            ->distinct()
            ->get();
        $student = DB::table('student_infos')
            ->where('Registration_Number', $student_id)
            ->first();

        $total_credit = DB::table('courses_student')
            ->join('courses', 'courses_student.course_id', '=', 'courses.id')
            ->select('courses_student.*', 'courses.course_name', 'courses.course_code', 'courses.credit')
            ->where('courses_student.semester', $semester)
            ->where('courses_student.student_id', $student_id)
            ->where('courses_student.reg_type', $reg_type)
            ->sum('courses.credit');


        $dept =  DB::table('student_infos')
            ->select('Program')
            ->where('Registration_Number', $student_id)
            ->first();

        if ($dept->Program == 'CSE' || $dept->Program == 'EEE' || $dept->Program == 'CE') {
            $credit_cost = 3200;
        } else if ($dept->Program == 'BBA') {
            $credit_cost = 1850;
        } else if ($dept->Program == 'LLB') {
            $credit_cost = 1475;
        } else {
            $credit_cost = 1100;
        }
        $credit_fee = $credit_cost * $total_credit;
        //return $credit_cost;
        $sumArray = 0;
        foreach ($fees as $fee) {
            $sumArray = $sumArray + $fee->fee_amount;
        }

        $total_sum = $sumArray + $credit_fee;
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        $word = $numberTransformer->toWords($total_sum);

        $data = [
            'fees' => $fees,
            'credit_fee' => $credit_fee,
            'total_sum' => $total_sum,
            'word' => $word,
            'credit_cost' => $credit_cost,
            'total_credit' => $total_credit,
            'total_sum' => $total_sum,
            'reg_type' => $reg_type,
            'semester' => $semester,
            'levelTerm' => $level,
            'student' => $student
        ];


        // $pdf = PDF::loadView('admin_student.payment.receipt', $data);
        // return $pdf->download('recepit.pdf');
    }
}

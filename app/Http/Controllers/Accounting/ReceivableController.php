<?php

namespace App\Http\Controllers\Accounting;

use App\ApplicationFee;
use App\Fee;
use App\FeeDetail;
use Carbon\Carbon;
use App\Department;
use App\Receivable;
use App\StudentInfo;
use App\Registration;
use App\ReceivableDetail;
use Illuminate\Http\Request;
use App\Current_Semester_Running;
use App\FeeHistory;
use App\FeeList;
use App\Helper\Helper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Contracts\Session\Session;

class ReceivableController extends Controller
{

    public function show($id)
    {
        $today = Carbon::today();

        $receivable = Receivable::find($id);
        $dues = DB::table('receivables')
            ->join('registrations', 'receivables.registration_id', '=', 'registrations.id')
            ->select('receivables.due', 'registrations.semester')
            ->where('receivables.student_id', $receivable->student_id)
            ->get();
        $fees = Fee::all();
        //return $dues;
        $reg_student = Registration::where('id', $receivable->registration_id)->first();
        $totalCredit = $this->totalCredit($reg_student);
        $student = StudentInfo::where('Registration_Number', $receivable->student_id)->first();
        $particulars_fee = ReceivableDetail::where('receivable_id', $receivable->id)->where('section', 'fee')->get();
        $particulars_less = ReceivableDetail::where('receivable_id', $receivable->id)->where('section', 'less')->get();
        $particulars_paid = ReceivableDetail::where('receivable_id', $receivable->id)->where('section', 'paid')->get();
        $previous_dues = ReceivableDetail::where('student_id', $receivable->student_id)->where('section', 'due')->get();
        $feeDetails = FeeDetail::with('feelists')
            ->where('registration_id', $receivable->registration_id)->get();
        //return $receivable;
        return view('accounting.receivable.studentInvoice', compact('receivable', 'particulars_fee', 'feeDetails', 'student', 'particulars_less', 'particulars_paid', 'today', 'totalCredit', 'fees', 'dues', 'previous_dues'));
    }
    private function totalCredit($reg_student)
    {
        $courses = DB::table('courses')
            ->join('courses_student', 'courses.id', '=', 'courses_student.course_id')
            ->select('courses.course_code', 'courses.credit', 'courses_student.student_id', 'courses_student.course_id', 'courses_student.reg_type')
            ->where('courses_student.student_id', $reg_student->student_id)
            ->where('courses_student.semester', $reg_student->semester)
            ->where('courses_student.reg_type', $reg_student->reg_type)
            ->get();

        $total = 0;
        foreach ($courses as $c) {
            $total = $total + $c->credit;
        }
        return $total;
    }

    // choosing department
    public function receivable(Request $request)
    {
        $chart_account_id = $request->input('chart_account_id') ? $request->input('chart_account_id') : NULL;
        //return $chart_account_id;
        $departments = Department::all();
        $semesters = NULL;
        return view('accounting.receivable.index', compact('departments', 'semesters', 'chart_account_id'));
    }

    public function create_invoice(Request $request)
    {
        if ($request->isMethod('post')) {
            $created = 0;
            foreach ($request->students as $student) {

                $current = $request->session_id;

                $exist = FeeHistory::where('fee_id', '=', $request->fee_id)->where('student_id', '=', $student)->where('session_id', '=', $current)->get();
                //dd(count($exist),$request->fee_id,$student,$current,$request->all());
                if (count($exist) > 0) {
                    continue;
                }
                $created++;

                $request->merge(['student_id' => $student]);
                FeeHistory::create($request->all());
            }
            if ($created > 0) {
                return back()->with('success', 'Invoice created');
            } else {
                return back()->with('error', 'Invoices already exists for these students!');
            }
        }
        $departments = Department::all();
        $fees = Fee::all();
        $fee_list = FeeList::all();
        $sessions = Current_Semester_Running::all();
        return view('accounting.invoice.index', compact('departments', 'semesters', 'chart_account_id', 'sessions', 'fee_list'));
    }

    public function get_department_fees(Request $request)
    {
        $fee_list = FeeList::all();
        $fee_chosen = FeeList::find($request->fee_chosen);
        if ($fee_chosen && $fee_chosen->fee_type == 4) {
            //Indigenes only
            $students = StudentInfo::where(['state_of_origin' => 'Imo'])->where(['dept_id' => $request->dept_id])->get();
        } else {
            $students = StudentInfo::where(['dept_id' => $request->dept_id])->get();
        }


        $resp['body'] = $fee_list;
        $resp['students'] = $students;
        return $resp;
    }

    // choosing session
    public function receivable_dept($dept_id)
    {

        $sessions = Current_Semester_Running::latest()->get();
        $departments = NULL;
        return view('accounting.receivable.index', compact('departments', 'sessions', 'dept_id'));
    }
    // choosing department and account
    public function receivable_dept_account($dept_id, $chart_account_id)
    {


        $batches = Helper::student_batch($dept_id);
        //return $batches;
        $departments = NULL;
        return view('accounting.receivable.index', compact('departments', 'batches', 'dept_id', 'chart_account_id'));
    }

    // choosing level term 
    public function receivable_dept_session($dept_id, $session_id)
    {
        $departments = NULL;
        $semesters = NULL;
        return view('accounting.receivable.index', compact('departments', 'semesters', 'dept_id', 'session_id'));
    }

    // choosing Batch
    public function receivable_dept_batch($dept_id, $batch)
    {
        $students = StudentInfo::select('Registration_Number', 'Full_Name')->where('Batch', $batch)->get();
        return view('accounting.ledger.index', compact('students'));
        $departments = NULL;
        $batch = NULL;
        return view('accounting.receivable.index', compact('departments', 'batch', 'dept_id'));
    }

    // select departmental courses for level term
    public function receivable_dept_session_level($dept_id, $session_id, $level_term)
    {
        $reg_students = FeeHistory::join('student_infos', 'student_id', '=', 'student_infos.id')
            ->where(['department_id' => $dept_id])->get();

        // dd($reg_students);                        // $reg_students = DB::table('receivables')
        //         ->join('registrations', 'receivables.registration_id', '=', 'registrations.id')
        //         ->join('student_infos', 'receivables.student_id', '=', 'student_infos.Registration_Number')
        //         ->select('receivables.*', 'registrations.semester','registrations.levelTerm','registrations.department','student_infos.Full_Name','student_infos.Current_semester')
        //         ->where('registrations.semester',$session_id)
        //         ->where('registrations.levelTerm',$level_term)
        //         ->where('registrations.department',$dept_id)
        //         ->get();
        return view('accounting.receivable.studentList', compact('level_term', 'reg_students', 'dept_id', 'session_id'));
    }

    public function view_admission_payment_details(Request $request, $id = null)
    {

        if ($request->isMethod('post')) {
            $msg = 'Searching ';
            $title = '';

            $query = ApplicationFee::query();
            $query->select('applicants.*', 'application_payments.name', 'application_payments.amount', 'application_payments.status');
            $query->join('applicants', 'application_payments.application_number', '=', 'applicants.application_number');
            $msg = 'Searching ';
            
            if ($request->state != 'all') {
                $query->where(['state' => $request->state]);
                $msg .= ' - State ' . $request->state;
            }
            if ($request->department != 'all') {
                $query->where(['course' => $request->department]);
                $msg .= ' - Department ' . $request->department;
            }
            if ($request->lga != 'all' && $request->lga !== null) {
                $query->where(['lga' => $request->lga]);
                $msg .= ' - LGA ' . $request->lga;
            }
            if ($request->application_number != null) {
                $query->where(['applicants.application_number' => $request->application_number]);
                $msg .= ' - Application Number ' . $request->application_number;
            }
            if ($request->name != null) {
                $query->where('full_name', 'LIKE', '%' . $request->name . '%');
                $msg .= ' - Full Name ' . $request->name;
            }

            $applicants = $query->get();
            // $applicants = ApplicationFee::all();
            $states = State::all();
            $departments = Department::all();
            $filter = true;
            return view('accounting.receivable.admission_fee_list', compact('applicants', 'states', 'lgas', 'departments', 'filter', 'msg'));

        }
        return redirect('/admin/manage-admission');
        return view('accounting.receivable.payment_details', compact('acceptance', 'type', 'school_fees', 'title'));


        // dd($id);
        if ($id == 0) {
            $acceptance = DB::table('ict_payments')
                ->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
                ->select('ict_payments.*', 'student_infos.*')->where(['ict_payments.status' => 'paid'])->orWhere(['ict_payments.status' => 'approved'])
                ->get();
            $type = 'acceptance';
            // dd($acceptance_fees);
            $title = 'Acceptance Fees';

            //return view('accounting.receivable.payment_details', compact('acceptance_fees','type'));

        } else {
            $school_fees = DB::table('fee_histories')
                ->join('student_infos', 'fee_histories.student_id', '=', 'student_infos.id')
                ->join('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
                ->select('fee_histories.*', 'student_infos.*', 'fee_histories.id as rid', 'fee_histories.status as paid', 'fee_histories.reason as res', 'fee_name')
                ->where(['fee_histories.status' => 'paid'])
                ->where(['fee_histories.fee_id' => $id])
                ->get();
            //dd($school_fees);
            $title = FeeList::find($id);
            $title = $title->fee_name;
            $type = 'school_fees';
        }

        return view('accounting.receivable.payment_details', compact('acceptance', 'school_fees', 'type', 'title'));
    }

    public function view_payment_details(Request $request, $id = null)
    {

        if ($request->isMethod('post')) {

            //dd($request->all(), isset($request['filter']));
            $student_id = '';

            if ($request['revenue_heads'] == 5) {
                $acceptance = DB::table('ict_payments')
                    ->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
                    ->select('ict_payments.*', 'student_infos.*')->where(['ict_payments.status' => 'paid'])->orWhere(['ict_payments.status' => 'approved'])
                    ->get();
                //dd('acceptance',$acceptance);
                $type = 'acceptance';
                $title = 'Acceptance Fees';
            } else {
                $id = $request['revenue_heads'];
                $msg = 'Searching ';
                $title = '';

                $query = FeeHistory::query();
                $query->join('student_infos', 'fee_histories.student_id', '=', 'student_infos.id')
                    ->join('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
                    ->select('fee_histories.*', 'student_infos.*', 'fee_histories.id as rid', 'fee_histories.status as paid', 'fee_histories.reason as res', 'fee_name')
                    ->where(['fee_histories.status' => 'paid']);
                // dd($request->all());
                if ($request['revenue_heads'] != 'all') {
                    $title = FeeList::find($id);
                    $title = $title->fee_name;
                    $msg .= $title;
                    $query->where(['fee_histories.fee_id' => $id]);
                }

                if ($request['session'] != 'all') {
                    $s = Current_Semester_Running::find($request['session']);
                    $msg .= ' - Session ' . $s->title;
                    $query->where('fee_histories.session_id', $request['session']);
                }
                if ($request['department'] != 'all') {
                    $d = Department::find($request['department']);
                    $msg .= ' - Department ' . $d->name;
                    $query->where('fee_histories.department_id', $request['department']);
                }
                if ($request['matno'] != Null) {
                    $stud = StudentInfo::where('registration_number', $request['matno'])->first();
                    $msg .= ' - ' . $stud->first_name . ' ' . $stud->last_name;
                    if ($stud) {
                        // dd($stud->id);
                        $query->where('fee_histories.student_id', $stud->id);
                    }
                }
                if ($request['student_name'] != Null) {
                    $name = explode(' ', $request['student_name']);
                    $st = StudentInfo::query();
                    if (isset($name[0])) $st->where('first_name', 'LIKE', '%' . $name[0] . '%');
                    if (isset($name[1])) $st->orWhere('last_name', 'LIKE', '%' . $name[1] . '%');

                    $stud = $st->get()->toArray();
                    $msg .= '- students matching ' . $request['student_name'];
                    //dd($stud, $msg);
                    if (count($stud)) {
                        // $query->where('fee_histories.student_id',$stud->id);
                    }
                }

                if ($request['start_date'] != Null && $request['end_date'] != Null) {

                    $from = date($request['start_date']);
                    $to = date($request['end_date']);
                    // dd($from, $to);
                    $msg .= ' - between ' . $from . ' to ' . $to;
                    $query->whereBetween('fee_histories.created_at', [$from, $to]);
                }

                //dd($msg);
                $school_fees = $query->get();
                $title = $msg;
                $type = 'school_fees';
            }

            return view('accounting.receivable.payment_details', compact('acceptance', 'type', 'school_fees', 'title'));
        }

        $id = base64_decode($id);

        // dd($id);
        if ($id == 0) {
            $acceptance = DB::table('ict_payments')
                ->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
                ->select('ict_payments.*', 'student_infos.*')->where(['ict_payments.status' => 'paid'])->orWhere(['ict_payments.status' => 'approved'])
                ->get();
            $type = 'acceptance';
            // dd($acceptance_fees);
            $title = 'Acceptance Fees';

            //return view('accounting.receivable.payment_details', compact('acceptance_fees','type'));

        } else {
            $school_fees = DB::table('fee_histories')
                ->join('student_infos', 'fee_histories.student_id', '=', 'student_infos.id')
                ->join('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
                ->select('fee_histories.*', 'student_infos.*', 'fee_histories.id as rid', 'fee_histories.status as paid', 'fee_histories.reason as res', 'fee_name')
                ->where(['fee_histories.status' => 'paid'])
                ->where(['fee_histories.fee_id' => $id])
                ->get();
            //dd($school_fees);
            $title = FeeList::find($id);
            $title = $title->fee_name;
            $type = 'school_fees';
        }

        return view('accounting.receivable.payment_details', compact('acceptance', 'school_fees', 'type', 'title'));
    }

    // select All receivable
    public function receivable_all()
    {
        // $reg_students = DB::table('receivables')
        //         ->join('registrations', 'receivables.registration_id', '=', 'registrations.id')
        //         ->join('student_infos', 'receivables.student_id', '=', 'student_infos.Registration_Number')
        //         ->select('receivables.*', 'registrations.semester','registrations.levelTerm','registrations.department','student_infos.Full_Name','student_infos.Current_semester')
        //         ->get();
        // $school_fees = DB::table('fee_histories')
        //         ->join('student_infos', 'fee_histories.student_id', '=', 'student_infos.id')
        //         ->join('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
        //         ->select('fee_histories.*', 'student_infos.*', 'fee_histories.id as rid', 'fee_histories.status as paid', 'fee_histories.reason as res', 'fee_name')
        //         ->where(['fee_histories.status'=>'paid'])->orWhere('fee_histories.receipt', '!=', 'null')
        //         ->get();
        $school_fees = DB::table('fee_histories')
            ->join('student_infos', 'fee_histories.student_id', '=', 'student_infos.id')
            ->join('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
            ->select('fee_histories.*', 'student_infos.*', 'fee_histories.id as rid', 'fee_histories.status as paid', 'fee_histories.reason as res', 'fee_name')
            ->where(['fee_histories.status' => 'paid'])
            ->get();

        $acceptance_fees = DB::table('ict_payments')
            ->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
            ->select('ict_payments.*', 'student_infos.*')->where(['ict_payments.status' => 'paid'])->orWhere(['ict_payments.status' => 'approved'])
            ->get();

        // dd($school_fees[22]);

        //FeeHistory::where(['status'=>'paid']);

        //dd($reg_students);

        $departments = Department::orderBy('name')->get();
        // dd($departments[0]);
        // $fees = Fee::all();
        $fee_list = FeeList::all();
        $sessions = Current_Semester_Running::all();
        // dd($sessions, $departments, $fee_list);

        return view('accounting.receivable.studentList', compact('departments', 'fee_list', 'sessions', 'school_fees', 'acceptance_fees'));
    }

    public function verify_receivable()
    {

        $fee_list = FeeList::get();
        $departments = Department::get();
        $sessions = Current_Semester_Running::get();

        $school_fees = DB::table('fee_histories')
            ->join('student_infos', 'fee_histories.student_id', '=', 'student_infos.id')
            ->join('fee_lists', 'fee_histories.fee_id', '=', 'fee_lists.id')
            ->select('fee_histories.*', 'student_infos.*', 'fee_histories.id as rid', 'fee_histories.status as paid', 'fee_name')
            ->where(['fee_histories.status' => 'unpaid'])->where('fee_histories.receipt', '!=', 'null')
            ->get();
        $acceptance_fees = DB::table('ict_payments')
            ->join('student_infos', 'ict_payments.student_id', '=', 'student_infos.registration_number')
            ->select('ict_payments.*', 'student_infos.*')->where(['ict_payments.status' => 'paid'])->orWhere(['ict_payments.status' => 'approved'])
            ->get();

        // dd($school_fees);

        return view('accounting.receivable.studentList', compact('school_fees', 'acceptance_fees', 'fee_list', 'departments', 'sessions'));
    }

    public function approve_school_fees(Request $request)
    {
        $invoice = FeeHistory::find($request->invoice_id);
        // dd($request->all());
        if ($request->disapprove == null) {
            $invoice->status = 'paid';
            $invoice->save();
            return back()->with('success', 'Payment Approved successfully');
        } else {
            $invoice->reason = $request->disapprove;
            $invoice->save();
            return back()->with('success', 'Payment Disapproved successfully');
        }
    }
}

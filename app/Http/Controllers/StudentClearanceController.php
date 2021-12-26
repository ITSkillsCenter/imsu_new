<?php

namespace App\Http\Controllers;

use App\ClearanceStudent;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\StudentInfo;
use App\Registration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentClearanceController extends Controller
{

    public function index()
    {
        //return 'working';
        //  return $registrations;
        // $students = DB::table('clearances_student')
        //         ->join('registrations','clearances_student.student_id','=','registrations.student_id')
        //         ->join('student_infos','clearances_student.student_id','=','student_infos.Registration_Number')
        //                 ->select('clearances_student.*','student_infos.Full_Name','student_infos.Enrollment_Semester')   
        //                 ->where('registrations.semester','=','Spring-2020')
        //                 ->where('registrations.reg_type','=',1)
        //                 ->orwhere('registrations.reg_type','=',2)
        //                 ->get();
        return view('clearance.reg_clear');
        //    $students = Registration::select('student_id')
        //                      ->where('semester','Spring-2020')
        //                      ->where('reg_type',2)
        //                      ->get();
        //     foreach($students as $student){
        //         DB::table('clearances_student')->insert(
        //             [
        //                 'student_id' => $student->student_id,
        //                 'transport'=>1,
        //                 'canteen'=>1,
        //                 'department'=>1,
        //                 'library'=>1
        //             ]
        //         );

        //    }
        //return $students;
        //  return redirect()->back();

    }
    public function clearance_type($type)
    {
        if ($type == 'outgoing') {
            // return $type;
            try {
                $registrations = DB::table('student_infos')
                    ->join('registrations', 'student_infos.Registration_Number', '=', 'registrations.student_id')
                    ->select('registrations.*', 'student_infos.Full_Name', 'student_infos.Current_status', 'student_infos.Current_semester')
                    ->where('student_infos.Current_semester', 'outgoing')
                    // ->where('registrations.semester','=','Fall-2020')
                    ->whereIn('registrations.reg_type', [1, 2])
                    ->get();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            try {
                $current_sem = Helper::current_semester();
                $registrations = DB::table('student_infos')
                    ->join('registrations', 'student_infos.Registration_Number', '=', 'registrations.student_id')
                    ->select('registrations.*', 'student_infos.Full_Name', 'student_infos.Current_status', 'student_infos.Current_semester')
                    ->where('student_infos.Current_status', 'current')
                    ->where('registrations.semester', '=', $current_sem)
                    ->whereIn('registrations.reg_type', [1, 2])
                    ->get();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        // return $registrations;
        return view('clearance.reg_clear', compact('registrations'));
    }
    public function report($id)
    {

        $student = DB::table('clearances_student')
            ->join('student_infos', 'clearances_student.student_id', '=', 'student_infos.Registration_Number')
            ->select('clearances_student.*', 'student_infos.Full_Name', 'student_infos.Registration_Number')
            ->where('student_infos.Registration_Number', $id)
            ->first();
        return view('clearance.clear_report', compact('student'));
    }

    public function clearance(Request $request, $id)
    {

        $clear_type = $request->get('type');

        $reg = Registration::find($id);
        //return $reg;
        // Department clearance type=1
        if ($clear_type == 1) {
            if ($reg->dept_clearance == 0) {
                DB::table('registrations')->where('id', $id)
                    ->update(['dept_clearance' => 1, 'dept_approved' => auth()->user()->name]);
            } else {
                DB::table('registrations')->where('id', $id)
                    ->update(['dept_clearance' => 0, 'dept_approved' => auth()->user()->name]);
            }
            $notification = array('title' => 'Data Saved', 'body' => "Department Clearance  Updated");
            return redirect()->route('cr_department.clearance')->with("success", $notification);
        }
        // Hostel clearance type=2
        if ($clear_type == 2) {
            if ($reg->hostel_clearance == 0) {
                DB::table('registrations')->where('id', $id)
                    ->update(['hostel_clearance' => 1, 'hostel_approved' => auth()->user()->name]);
            } else {
                DB::table('registrations')->where('id', $id)
                    ->update(['hostel_clearance' => 0, 'hostel_approved' => auth()->user()->name]);
            }

            $notification = array('title' => 'Data Saved', 'body' => "Hostel Clearance  Updated");
            return redirect()->route('cr_hall.hall')->with("success", $notification);
        }

        // Transportation clearance type=3
        if ($clear_type == 3) {
            if ($reg->transport == 0) {
                DB::table('registrations')->where('id', $id)
                    ->update(['transport' => 1]);
            } else {
                DB::table('registrations')->where('id', $id)
                    ->update(['transport' => 0]);
            }
            $notification = array('title' => 'Data Saved', 'body' => "Transportation Clearance  Updated");
            return redirect()->route('cr_transport.clearance')->with("success", $notification);
        }
        // Canteen clearance type=4
        if ($clear_type == 4) {
            if ($reg->canteen == 0) {
                DB::table('clearances_student')->where('student_id', $id)
                    ->update(['canteen' => 1]);
            } else {
                DB::table('clearances_student')->where('student_id', $id)
                    ->update(['canteen' => 0]);
            }

            $notification = array('title' => 'Data Saved', 'body' => "Canteen Clearance  Updated");
            return redirect()->route('cr_canteen.clearance')->with("success", $notification);
        }

        // Library clearance type=5
        if ($clear_type == 5) {
            if ($reg->library == 0) {
                DB::table('registrations')->where('id', $id)
                    ->update(['library' => 1]);
            } else {
                DB::table('registrations')->where('id', $id)
                    ->update(['library' => 0]);
            }
            $notification = array('title' => 'Data Saved', 'body' => "Library Clearance  Updated");
            return redirect()->route('cr_library.clearance')->with("success", $notification);
        }


        return redirect()->back();
    }


    public function cr_department()
    {
        $students = DB::table('student_infos')
            ->join('registrations', 'student_infos.Registration_Number', '=', 'registrations.student_id')
            ->select('registrations.*', 'student_infos.Full_Name', 'student_infos.Current_status', 'student_infos.Current_semester')
            ->whereIn('registrations.reg_type', [1, 2])

            ->get();
        //return $students;


        return view('clearance.department', compact('students'));
    }

    public function hall()
    {

        $students = DB::table('student_infos')
            ->join('registrations', 'student_infos.Registration_Number', '=', 'registrations.student_id')
            ->select('registrations.*', 'student_infos.Full_Name', 'student_infos.Current_status', 'student_infos.Current_semester')
            ->whereIn('registrations.reg_type', [1, 2])
            ->get();

        return view('clearance.hall', compact('students'));
    }

    public function cr_transport()
    {
        $students = DB::table('student_infos')
            ->join('registrations', 'student_infos.Registration_Number', '=', 'registrations.student_id')
            ->select('registrations.*', 'student_infos.Full_Name', 'student_infos.Current_status', 'student_infos.Current_semester')
            ->whereIn('registrations.reg_type', [1, 2])
            ->get();
        return view('clearance.transport', compact('students'));
    }

    public function cr_canteen()
    {
        $students = DB::table('clearances_student')
            ->join('registrations', 'clearances_student.student_id', '=', 'registrations.student_id')
            ->join('student_infos', 'clearances_student.student_id', '=', 'student_infos.Registration_Number')
            ->select('clearances_student.*', 'student_infos.Full_Name', 'student_infos.Enrollment_Semester')
            ->where('registrations.semester', '=', 'Spring-2020')
            ->where('registrations.reg_type', '=', 1)
            ->orwhere('registrations.reg_type', '=', 2)
            ->get();
        return view('clearance.canteen', compact('students'));
    }

    public function cr_library()
    {
        $students = DB::table('student_infos')
            ->join('registrations', 'student_infos.Registration_Number', '=', 'registrations.student_id')
            ->select('registrations.*', 'student_infos.Full_Name', 'student_infos.Current_status', 'student_infos.Current_semester')
            ->whereIn('registrations.reg_type', [1, 2])
            ->distinct('registrations.student_id')
            ->get();
        return view('clearance.library', compact('students'));
    }

    public function cr_treasurer()
    {
        // $students = DB::table('clearances_student')
        //         ->join('registrations','clearances_student.student_id','=','registrations.student_id')
        //         ->join('student_infos','clearances_student.student_id','=','student_infos.Registration_Number')
        //                 ->select('clearances_student.*','student_infos.Full_Name','student_infos.Enrollment_Semester')   
        //                 ->where('registrations.semester','=','Spring-2020')
        //                 ->where('registrations.reg_type','=',1)
        //                 ->orwhere('registrations.reg_type','=',2)
        //                 ->get();
        //  $approved = DB::table('clearances_student')
        //                 ->join('registrations','clearances_student.student_id','=','registrations.student_id')
        //                 ->join('student_infos','clearances_student.student_id','=','student_infos.Registration_Number')
        //                 ->select('clearances_student.*','student_infos.Full_Name')
        //                 ->where('registrations.semester','=','Spring-2020')
        //                 ->where('clearances_student.treasurer',1)
        //                 ->where('registrations.reg_type','=',1)
        //                 ->orwhere('registrations.reg_type','=',2)
        //                 ->sum('clearances_student.treasurer');

        //     $total= count($students);
        return view('clearance.treasurer');
    }
    public function cr_treasurer_type($type)
    {
        if ($type == 'outgoing') {
            // return $type;
            try {
                $registrations = DB::table('student_infos')
                    ->join('registrations', 'student_infos.Registration_Number', '=', 'registrations.student_id')
                    ->select('registrations.*', 'student_infos.Full_Name', 'student_infos.Current_status', 'student_infos.Current_semester')
                    ->where('student_infos.Current_semester', 'outgoing')
                    // ->where('registrations.semester','=','Fall-2020')
                    ->whereIn('registrations.reg_type', [1, 2])
                    ->get();
                $approved = $registrations->where('account_clearance', '1')->count();
                // return $approved;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            try {
                $current_sem = Helper::current_semester();
                $registrations = DB::table('student_infos')
                    ->join('registrations', 'student_infos.Registration_Number', '=', 'registrations.student_id')
                    ->select('registrations.*', 'student_infos.Full_Name', 'student_infos.Current_status', 'student_infos.Current_semester')
                    ->where('student_infos.Current_status', 'current')
                    ->where('registrations.semester', '=', $current_sem)
                    ->whereIn('registrations.reg_type', [1, 2])
                    ->get();
                $approved = $registrations->where('account_clearance', '1')->count();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return view('clearance.treasurer', compact('registrations', 'approved'));
    }

    public function treasurer(Request $request)
    {
        // return $request;
        $clear = Registration::find($request->reg_id);
        // return $clear;
        $clear->update([
            'account_clearance' => $request->treasurer,
            'tb_remarks' => $request->tb_remarks,
            'account_approved' => auth()->user()->name
        ]);

        toastr()->success('Cleance given by ' . auth()->user()->name, 'Success');
        return redirect()->back();
    }

    public function report_dept_treasurer($dept)
    {
        $students = DB::table('clearances_student')
            ->join('student_infos', 'clearances_student.student_id', '=', 'student_infos.Registration_Number')
            ->select('clearances_student.*', 'student_infos.Full_Name')
            ->where('student_infos.Current_status', '!=', 'graduate')
            ->where('student_infos.Current_status', '!=', 'left')
            ->where('student_infos.Program', $dept)
            ->get();
        $approved = DB::table('clearances_student')
            ->join('student_infos', 'clearances_student.student_id', '=', 'student_infos.Registration_Number')
            ->select('clearances_student.*', 'student_infos.Full_Name')
            ->where('student_infos.Current_status', '!=', 'graduate')
            ->where('student_infos.Current_status', '!=', 'left')
            ->where('student_infos.Program', $dept)
            ->where('clearances_student.treasurer', 1)
            ->sum('clearances_student.treasurer');

        $total = count($students);
        return view('clearance.treasurer', compact('students', 'total', 'approved'));
    }

    public function regClear(Request $request)
    {
        $dept = $request->input('type');
        // var_dump(isset($dept));
        // die();
        if (isset($dept)) {
            $students = StudentInfo::where('Payment_status', 'due')->where('Program', $dept)->get();
        } else {
            $students = StudentInfo::where('Payment_status', 'due')->get();
        }


        return view('clearance.registration_clear', compact('students'));
    }

    public function regClearPaid($sid)
    {
        $student = StudentInfo::where('Registration_Number', $sid)->first();
        $student->Payment_status = 'paid';
        $student->save();
        $notification = array('title' => 'Data Saved', 'body' => "Payment Dues  Updated");
        return redirect()->route('clear.registration_clearance')->with("success", $notification);
    }
}

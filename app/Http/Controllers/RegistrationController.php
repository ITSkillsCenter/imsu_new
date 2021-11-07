<?php

namespace App\Http\Controllers;

use DB;
use App\Fee;
use Session;
use App\Course;
use App\FeeList;
use App\FeeDetail;
use Carbon\Carbon;
use App\Receivable;
use App\StudentInfo;
use App\Registration;
use App\ReceivableDetail;
use App\Ledger;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{
    public function index()
    {
       // $registrations = Registration::all();
       $departments = Registration::select('department')->distinct()->get();
       
        return view('registration.index',compact('departments'));
    }
    public function courseReport()
    {
        
        $dept = auth()->user()->dept;
        // return $dept;
         if(is_null($dept)){
            $courses = Course::with('croutine')->orderBy('Program','ASC')->get();
         }

         if(!empty($dept)){
            $courses = Course::with('croutine')->where('Program',$dept)->orderBy('Program','ASC')->get();
         }
        return view('registration.courseReport',compact('courses'));
    }
    public function courseReportFind(Request $request)
    {
        $semester= $request->input('semester');
        $course= $request->input('course_id');
        $students = DB::table('courses_student')
                ->join('student_infos', 'courses_student.student_id', '=', 'student_infos.Registration_Number')
                ->select('courses_student.*', 'student_infos.Full_Name')
                ->where('courses_student.semester',$semester)
                ->where('courses_student.course_id',$course)
                ->orderBy('courses_student.student_id', 'asc')
                ->get();
        $singleCourse = Course::with('croutine')->where('id',$course)->first();
       // dd($students->toArray());
         $dept = auth()->user()->dept;
                // return $dept;
                 if(is_null($dept)){
                    $courses = Course::with('croutine')->orderBy('Program','ASC')->get();
                 }
        
                 if(!empty($dept)){
                    $courses = Course::with('croutine')->where('Program',$dept)->orderBy('Program','ASC')->get();
                 }
        return view('registration.courseReport',compact('courses','students','semester','singleCourse'));
            
    }
    

    public function notRegistered()
    {
        return view('registration.notregistred');
    }

    public function notRegisteredFind(Request $request)
    {
        try{
            // return $request;
            $students = DB::select("SELECT student_id from(select Registration_Number AS student_id from student_infos where Current_status='current' and Program='$request->department')as table1 where student_id not in (Select student_id from registrations where department='$request->department' and reg_type in (1,2) and semester='$request->semester') order by table1.student_id asc");
            // return $students;
            return view('registration.notregistred',compact('students','request'));
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
    
    public function clearance(Request $request,$id)
    {
           $clear_type= $request->get('type');
           $reg = Registration::find($id);


           if($clear_type==1){
               if($reg->dept_clearance==0){
                Registration::where('id',$id)
                            ->update(['dept_clearance'=>1,'dept_approved'=>auth()->user()->name]);
                            if($reg->reg_type==1){
                                StudentInfo::where('Registration_Number',$reg->student_id)
                                        ->update(['Current_semester'=>$reg->levelTerm]);
                            }
                
               }else{
                Registration::where('id',$id)
                ->update(['dept_clearance'=>0,'dept_approved'=>auth()->user()->name]);
               }
           }

           if($clear_type==2){
            if($reg->hostel_clearance==0){
             Registration::where('id',$id)
                         ->update(['hostel_clearance'=>1,'hostel_approved'=>auth()->user()->name]);
             
            }else{
             Registration::where('id',$id)
             ->update(['hostel_clearance'=>0,'hostel_approved'=>auth()->user()->name]);
            }
         }

         if($clear_type==3){
            if($reg->account_clearance==0){
             Registration::where('id',$id)
                         ->update(['account_clearance'=>1,'account_approved'=>auth()->user()->name]);
                         if($reg->reg_type==1){
                            StudentInfo::where('Registration_Number',$reg->student_id)
                                        ->update(['Payment_status'=>'paid']);
                         }
            }else{
             Registration::where('id',$id)
             ->update(['account_clearance'=>0,'account_approved'=>auth()->user()->name]);
            }
         }

           return redirect()->back();


    }

    public function department()
    {
        $semesters = DB::table('student_infos')
                    ->select('Enrollment_Semester')
                    ->distinct()
                    ->orderby('Enrollment_Semester','DESC')
                    ->get();
        $departments = DB::table('student_infos')
                 ->select('Program')
                 ->distinct()
                 ->get();
        $registrations = DB::table('registrations')
                ->join('student_infos','registrations.student_id','=','student_infos.Registration_Number')
                        ->select('registrations.*','student_infos.Full_Name')
                        ->where('registrations.department',Session::get('department'))
                        ->where('registrations.semester',Session::get('semester'))
                        ->where('registrations.reg_type',Session::get('reg_type'))
                        ->get();
        return view('registration.department',compact('semesters','departments','registrations'));
    }

     public function department_clear($id)
    {
         try{
             $reg_student= Registration::find($id);
        //  return $reg_student;
        $semester = StudentInfo::select('Enrollment_Semester')->where('Registration_Number',$reg_student->student_id)->first();

        $sem= $this->checkSemester($reg_student,$semester);
     
        $fee_structure= $this->checkFeeStructure($reg_student,$sem);
        
        //Regular registration Receivable
        if($reg_student->reg_type=='1'){
            $totalCreditFee=0;
          $tutionFee=0;
          $totalTutionFee=0;
          // if student as under Fall-2018 Fee Structure
        if($sem=='Fall-2018'){
            $total_credit= $this->totalCredit($reg_student);

            foreach($fee_structure as $fee){
                $feeDetailData[]=[
                    'registration_id'=>$reg_student->id,
                    'feelist_id'=>$fee->id,
                    'student_id'=>$reg_student->student_id,
                ];
                if($fee->fee_type==2){
                    $CreditFee=$fee->amount;
                }else{
                    $tutionFee=$tutionFee+$fee->amount;
                }   
            }

            $totalCreditFee=$total_credit*$CreditFee;
            $totalTutionFee=$tutionFee+$totalCreditFee;
        }else if($sem=='Spring-2016'){
            
            foreach($fee_structure as $fee){
                $feeDetailData[]=[
                    'registration_id'=>$reg_student->id,
                    'feelist_id'=>$fee->id,
                    'student_id'=>$reg_student->student_id,
                ];
                    $totalTutionFee=$totalTutionFee+$fee->amount;
            }
        }else if($sem=='Fall-2015'){
            foreach($fee_structure as $fee){
                $feeDetailData[]=[
                    'registration_id'=>$reg_student->id,
                    'feelist_id'=>$fee->id,
                    'student_id'=>$reg_student->student_id,
                ];
                    $totalTutionFee=$totalTutionFee+$fee->amount;
            }
        }else if($sem=='Spring-2015'){
            foreach($fee_structure as $fee){
                $feeDetailData[]=[
                    'registration_id'=>$reg_student->id,
                    'feelist_id'=>$fee->id,
                    'student_id'=>$reg_student->student_id,
                ];
                    $totalTutionFee=$totalTutionFee+$fee->amount;
            }
        }
        
        
        
            //return $fee_structure;
        //status 1 means semester fee id   
        $fee=Fee::where('status',1)->first(); 
        $std=StudentInfo::select('Registration_Number','Full_Name')->where('Registration_Number',$reg_student->student_id)->first();
           // return $this->totalCredit($reg_student);        
           FeeDetail::insert($feeDetailData); 
           
           $receivable=Receivable::create([
            'student_id'=>$reg_student->student_id,
            'registration_id'=>$reg_student->id,
            'total'=>$totalTutionFee,
            'due'=>$totalTutionFee,
           ]);

          $rd=ReceivableDetail::create([
            'student_id'=>$reg_student->student_id,
            'date'=>Carbon::today(),
            'fee_id'=>$fee->id,
            'particular'=>$std->Full_Name.' ('.$std->Registration_Number.')',
            'amount'=>$totalTutionFee,
            'account_type'=>$fee->account_type,
            'section'=>$fee->section,
            'receivable_id'=>$receivable->id,
            'is_semester'=>'1',
          ]); 
           
           Ledger::create([
                        'chart_account_id'=>'3',
                        'student_id'=>$reg_student->student_id,
                        'date'=>Carbon::today(),
                        'particular'=>$std->Full_Name.' ('.$std->Registration_Number.')',
                        'amount'=>$totalTutionFee,
                        'account_type'=>'Dr',
                        'receivable_id'=>$receivable->id,
                        'fee_list_id'=>$fee->id,
                        'rd_id'=>$rd->id,
                        ]);
           
           foreach($fee_structure as $fee){
                
                if($fee->fee_type==2){
                    $ledgerData[]=[
                        'chart_account_id'=>$fee->chart_account_id,
                        'student_id'=>$reg_student->student_id,
                        'date'=>Carbon::today(),
                        'particular'=>$fee->fee_name,
                        'amount'=>$totalCreditFee,
                        'account_type'=>'Cr',
                        'receivable_id'=>$receivable->id,
                        'fee_list_id'=>$fee->id,
                        'rd_id'=>$rd->id,
                        ];
                }else{
                    $ledgerData[]=[
                        'chart_account_id'=>$fee->chart_account_id,
                        'student_id'=>$reg_student->student_id,
                        'date'=>Carbon::today(),
                        'particular'=>$fee->fee_name,
                        'amount'=>$fee->amount,
                        'account_type'=>'Cr',
                        'receivable_id'=>$receivable->id,
                        'fee_list_id'=>$fee->id,
                        'rd_id'=>$rd->id,
                        ];
                } 
            }
            Ledger::insert($ledgerData);
            //return $ledgerData;
           
           Registration::where('semester',$reg_student->semester)
                        ->where('student_id',$reg_student->student_id)
                        ->where('reg_type',$reg_student->reg_type)
                        ->update(['dept_clearance'=>1,'reg_approved'=>auth()->user()->name]);
                        
        // return $sem;               

        $notification= array('title' => 'Data Store', 'body' => 'Regular Registration Approved Succesfully.');
        return redirect()->back()->with('success',$notification);
        }
        // Term repate receivable Generate
        if($reg_student->reg_type=='2'){
            
            //return $fee_structure;
            $total_credit= $this->totalCredit($reg_student);
            $totalCreditFee=0;
            $totalTutionFee=0;
            
                $feeDetailData[]=[
                    'registration_id'=>$reg_student->id,
                    'feelist_id'=>$fee_structure->id,
                    'student_id'=>$reg_student->student_id,
                ];

            $totalTutionFee=$total_credit*$fee_structure->amount;
          
             //status 2 means Term Repeat fee id   
        $fee=Fee::where('status',2)->first();
        $std=StudentInfo::select('Registration_Number','Full_Name')->where('Registration_Number',$reg_student->student_id)->first();
           
        // return $this->totalCredit($reg_student);        
        FeeDetail::insert($feeDetailData); 
        
        $receivable=Receivable::create([
         'student_id'=>$reg_student->student_id,
         'registration_id'=>$reg_student->id,
         'total'=>$totalTutionFee,
         'due'=>$totalTutionFee,
        ]);

        ReceivableDetail::create([
         'student_id'=>$reg_student->student_id,
         'date'=>Carbon::today(),
         'fee_id'=>$fee->id,
         'particular'=>$std->Full_Name.' ('.$std->Registration_Number.')',
         'amount'=>$totalTutionFee,
         'account_type'=>$fee->account_type,
         'section'=>$fee->section,
         'receivable_id'=>$receivable->id,
         'is_semester'=>'1',
        ]);
        
         Ledger::create([
                        'chart_account_id'=>'3',
                        'student_id'=>$reg_student->student_id,
                        'date'=>Carbon::today(),
                        'particular'=>$std->Full_Name.' ('.$std->Registration_Number.')-Term repeat',
                        'amount'=>$totalTutionFee,
                        'account_type'=>'Dr',
                        'receivable_id'=>$receivable->id,
                        'fee_list_id'=>$fee_structure->id,
                        ]);
           
         $ledgerData[]=[
                        'chart_account_id'=>$fee_structure->chart_account_id,
                        'student_id'=>$reg_student->student_id,
                        'date'=>Carbon::today(),
                        'particular'=>$fee_structure->fee_name,
                        'amount'=>$totalTutionFee,
                        'account_type'=>'Cr',
                        'receivable_id'=>$receivable->id,
                        'fee_list_id'=>$fee_structure->id,
                        ];
        Ledger::insert($ledgerData);
        
        Registration::where('semester',$reg_student->semester)
                     ->where('student_id',$reg_student->student_id)
                     ->where('reg_type',$reg_student->reg_type)
                     ->update(['dept_clearance'=>1,'reg_approved'=>auth()->user()->name]);
            $notification= array('title' => 'Data Store', 'body' => 'Term Repeat Registration Approved Succesfully.');
        return redirect()->back()->with('success',$notification);
        }
         }catch(\Throwable $th){
             return $th->getMessage();
         }
          
                
        
    }

    private function totalCredit($reg_student){
        $courses = DB::table('courses')
        ->join('courses_student','courses.id','=','courses_student.course_id')
        ->select('courses.course_code','courses.credit','courses_student.student_id','courses_student.course_id','courses_student.reg_type')
        ->where('courses_student.student_id',$reg_student->student_id)
        ->where('courses_student.semester',$reg_student->semester)
        ->where('courses_student.reg_type',$reg_student->reg_type)
        ->get();
        
        $total=0;
        foreach($courses as $c){
            $total=$total+$c->credit;
        }
        return $total;
    }

    private function checkSemester($reg_student,$semester){
        if($semester->Enrollment_Semester=='Spring-2015'){
            $sem='Spring-2015';
        }elseif($semester->Enrollment_Semester=='Fall-2015'){
            $sem='Fall-2015';
        }elseif($semester->Enrollment_Semester=='Spring-2016'||$semester->Enrollment_Semester=='Fall-2016'||$semester->Enrollment_Semester=='Spring-2017'||$semester->Enrollment_Semester=='Fall-2017'||$semester->Enrollment_Semester=='Spring-2018'){
            $sem='Spring-2016';
        }else{
            $sem='Fall-2018'; 
        }
       
        return $sem;
    }

    private function checkFeeStructure($reg_student,$sem){
        if($reg_student->reg_type=='1'){
            if($reg_student->reg_type==1 && $reg_student->levelTerm=='l1t1'){
                $fee_structure=FeeList::where('semester',$sem)->where('department',$reg_student->department)->get();
            }else{
                $fee_structure=FeeList::where('semester',$sem)->where('department',$reg_student->department)->whereIn('fee_type',[2,3])->get();
            }
            
            return $fee_structure;
        }

        if($reg_student->reg_type=='2'){
                $fee_structure=FeeList::where('department',$reg_student->department)->where('fee_type',2)->first();
                return $fee_structure;
        }
        
    }
    public function hostel()
    {
        $semesters = DB::table('student_infos')
                    ->select('Enrollment_Semester')
                    ->distinct()
                    ->orderby('Enrollment_Semester','DESC')
                    ->get();
        $departments = DB::table('student_infos')
                 ->select('Program')
                 ->distinct()
                 ->get();
        $registrations = DB::table('registrations')
                ->join('student_infos','registrations.student_id','=','student_infos.Registration_Number')
                        ->select('registrations.*','student_infos.Full_Name')
                        ->where('registrations.department',Session::get('department'))
                        ->where('registrations.semester',Session::get('semester'))
                        ->where('registrations.reg_type',Session::get('reg_type'))
                        ->get();
        return view('registration.hostel',compact('semesters','departments','registrations'));
    }

    public function hostel_clear(Request $request)
    {
        //return $request->department;
        
        $semesters = DB::table('student_infos')
                    ->select('Enrollment_Semester')
                    ->distinct()
                    ->orderby('Enrollment_Semester','DESC')
                    ->get();
        $departments = DB::table('student_infos')
                 ->select('Program')
                 ->distinct()
                 ->get();

        $registrations = DB::table('registrations')
                ->join('student_infos','registrations.student_id','=','student_infos.Registration_Number')
                        ->select('registrations.*','student_infos.Full_Name')
                        ->where('registrations.department',$request->department)
                        ->where('registrations.semester',$request->semester)
                        ->where('registrations.reg_type',$request->reg_type)
                        ->get();
                Session::put('department',$request->department);
                Session::put('semester',$request->semester);
                Session::put('reg_type',$request->reg_type);
        return view('registration.hostel',compact('semesters','departments','registrations'));
    }
    public function account()
    {
        $semesters = DB::table('student_infos')
                    ->select('Enrollment_Semester')
                    ->distinct()
                    ->orderby('Enrollment_Semester','DESC')
                    ->get();
        $departments = DB::table('student_infos')
                 ->select('Program')
                 ->distinct()
                 ->get();
        $registrations = DB::table('registrations')
                ->join('student_infos','registrations.student_id','=','student_infos.Registration_Number')
                        ->select('registrations.*','student_infos.Full_Name')
                        ->where('registrations.department',Session::get('department'))
                        ->where('registrations.semester',Session::get('semester'))
                        ->where('registrations.reg_type',Session::get('reg_type'))
                        ->get();
        return view('registration.account',compact('semesters','departments','registrations'));
    }

    public function account_clear(Request $request)
    {
        //return $request->department;
        
        $semesters = DB::table('student_infos')
                    ->select('Enrollment_Semester')
                    ->distinct()
                    ->orderby('Enrollment_Semester','DESC')
                    ->get();
        $departments = DB::table('student_infos')
                 ->select('Program')
                 ->distinct()
                 ->get();

        $registrations = DB::table('registrations')
                ->join('student_infos','registrations.student_id','=','student_infos.Registration_Number')
                        ->select('registrations.*','student_infos.Full_Name')
                        ->where('registrations.department',$request->department)
                        ->where('registrations.semester',$request->semester)
                        ->where('registrations.reg_type',$request->reg_type)
                        ->get();
                Session::put('department',$request->department);
                Session::put('semester',$request->semester);
                Session::put('reg_type',$request->reg_type);
        return view('registration.account',compact('semesters','departments','registrations'));
    }
    
    public function department_reg($dept)
    {
        
       // $registrations = DB::table('registrations')->where('department',$dept)->get();
        $departments = Registration::select('department')->distinct()->get();
        $semesters = DB::table('registrations')->select('semester')->distinct()->latest()->get();
       // $total = count($registrations);
        return view('registration.index',compact('departments','semesters','dept'));
    }

    public function semester_reg($dept,$semester)
    {
        
        $registrations = DB::table('registrations')->where('department',$dept)->where('semester',$semester)->distinct('student_id')->get();
        //return $registrations;
        $departments = Registration::select('department')->distinct()->get();
        $semesters = DB::table('registrations')->select('semester')->distinct()->latest()->take(3)->get();
        $total = count($registrations);
        return view('registration.index',compact('departments','semesters','registrations','dept','semester','total'));
    }
    // performing manual registration
    public function manual_reg(Request $request){
        
        $this->validate($request,[
            'sid'=>'required',
            'semester'=>'required',
            'reg_type'=>'required',
            'level'=>'required',
            'course_id'=>'required', 
        ]);
        
        $dept = StudentInfo::select('Enrollment_Semester','Program')->where('Registration_Number',$request->sid)->first();
       
    	$levelTerm = $request->level;
    	$semester = $request->semester;
    	$reg_type = $request->reg_type;
    	$courses = array();
        $courses = $request->course_id;
        //return $courses;
        $check = DB::table('registrations')
                ->where('student_id',$request->sid)
                ->where('semester',$semester)
                ->where('reg_type',$reg_type)
                // ->where('levelTerm',$levelTerm)
                ->get();
        if(count($check)>0) {
                toastr()->error('Registration Already Done','Error');
                return redirect()->back();
        }   
        $reg = new Registration();
        $reg->semester = $semester;
        $reg->levelTerm = $levelTerm;
        $reg->student_id = $request->sid;
        $reg->reg_type = $reg_type;
        $reg->department = $dept->Program;
        $reg->save();
       
    	foreach($courses as $key=>$value){

            DB::table('courses_student')->insert(
                [
                    'semester' => $semester,
                    'levelTerm' => $levelTerm,
                    'student_id' => $request->sid,
                    'course_id' => $value,
                    'reg_type' => $reg_type,
                ]);

        }
        if($reg_type =='1'|| $reg_type =='2'){
           StudentInfo::where('Registration_Number', $request->sid)->update(['Current_semester' => $request->level]);
        }
        toastr()->success('Registration Complete','Success');
        return redirect()->back();
    }
    public function edit($student_id,$semester,$type)
    {
        $reg_students = DB::table('courses_student')
                ->join('courses', 'courses_student.course_id', '=', 'courses.id')
                ->select('courses_student.*', 'courses.course_name','courses.course_code','courses.credit')
                ->where('courses_student.semester',$semester)
                ->where('courses_student.student_id',$student_id)
                ->where('courses_student.reg_type',$type)
                ->get();
        
        return view('registration.registration_edit',compact('reg_students','semester','student_id','type'));
    }
    
    public function delete($student_id,$semester,$type)
    {
        $reg = Registration::where('student_id',$student_id)
                            ->where('semester',$semester)
                            ->where('reg_type',$type)
                            ->first();
        $reg->delete();
        
        $courses = DB::table('courses_student')
                    ->where('student_id',$student_id)
                    ->where('semester',$semester)
                    ->where('reg_type',$type)
                    ->delete();
        
        toastr()->error('Registration Deleted','Success');
        return redirect()->back();
    }
    
    public function reg_type_update(Request $request, $student_id,$semester,$type){
        $request->validate([
            'reg_type' => 'required'
        ]);
        
        $reg = Registration::where('student_id',$student_id)
                            ->where('semester',$semester)
                            ->where('reg_type',$type)
                            ->first();
        $reg->reg_type = $request['reg_type'];
        $reg->save();
        
        $courses = DB::table('courses_student')
                    ->where('student_id',$student_id)
                    ->where('semester',$semester)
                    ->where('reg_type',$type)
                    ->update(array('reg_type' => $request->reg_type));
        
        toastr()->success('Registration type updated','Success');
        return redirect()->route('registration.semester_reg', [$reg->department, $semester]);
    }
    
    public function details($student_id,$semester,$type)
    {
        $reg_students = DB::table('courses_student')
                ->join('courses', 'courses_student.course_id', '=', 'courses.id')
                ->select('courses_student.*', 'courses.course_name','courses.course_code','courses.credit')
                ->where('courses_student.semester',$semester)
                ->where('courses_student.student_id',$student_id)
                ->where('courses_student.reg_type',$type)
                ->get();
        
        return view('registration.details',compact('reg_students','semester','student_id','type'));
    }

    public function download($student_id,$semester,$type)
    {
        $reg_students = DB::table('courses_student')
                ->join('courses', 'courses_student.course_id', '=', 'courses.id')
                ->select('courses_student.*', 'courses.course_name','courses.course_code','courses.credit')
                ->where('courses_student.semester',$semester)
                ->where('courses_student.student_id',$student_id)
                ->where('courses_student.reg_type',$type)
                ->get();
        
        return view('registration.download',compact('reg_students','semester','student_id','type'));
    }
    
    public function details_dept($dept,$semester,$type)
    {
          $registrations = DB::table('registrations')
                            ->select('id','student_id','semester','reg_type','department','dept_clearance','levelTerm','created_at')
                            ->where('department',$dept)
                            ->where('semester',$semester)
                            ->where('reg_type',$type)
                            ->distinct('student_id')
                            ->get();
            //return  $registrations; 
            
        $departments = Registration::select('department')->distinct()->get();
        $semesters = DB::table('registrations')->select('semester')->distinct()->latest()->take(3)->get();
        $total = count($registrations);
        return view('registration.type',compact('departments','semesters','registrations','dept','semester','total','type'));
    }
    
    
    public function addCourseReg(Request $request)
    {
        //return $request;
        $request->validate([
            'course_id' => 'required',
            'semester' =>'required',
            'student_id' => 'required',
            'reg_type' => 'required'
        ]);
        
        $levelTerm = Registration::select('levelTerm')
                                ->where('student_id',$request->student_id)
                                ->where('semester',$request->semester)
                                ->where('reg_type',$request->reg_type)
                                ->first('levelTerm');
                                
        $check = DB::table('courses_student')
                    ->select('id')
                    ->where('semester' , $request->semester)
                    ->where('levelTerm' , $levelTerm->levelTerm)
                    ->where('student_id' , $request->student_id)
                    ->where('course_id' , $request->course_id)
                    ->where('reg_type' , $request->reg_type)
                    ->count();
        
        if($check<1){
             DB::table('courses_student')->insert(
                [
                    'semester' => $request->semester,
                    'levelTerm' => $levelTerm->levelTerm,
                    'student_id' => $request->student_id,
                    'course_id' => $request->course_id,
                    'reg_type' => $request->reg_type,
                ]);
                toastr()->success('Courses added successfully','Success');
        }else{
            toastr()->warning('Courses already added','Warning');
            return redirect()->back();
        }
        return redirect()->back();
    }
    
    public function deleteCourseReg($id)
    {
        $course = DB::table('courses_student')->delete($id);
        toastr()->error('Courses deleted successfully','Success');
        return redirect()->back();
    }
}

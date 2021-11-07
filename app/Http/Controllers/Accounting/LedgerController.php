<?php

namespace App\Http\Controllers\Accounting;

use App\Fee;
use Carbon\Carbon;
use App\Receivable;
use App\StudentInfo;
use App\FeeDetail;
use App\ReceivableDetail;
use App\Registration;
use App\ChartAccount;
use App\Ledger;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=StudentInfo::select('Registration_Number','Full_Name')->get();
         $fees= Fee::all();
         $today=Carbon::today();
        return view('accounting.ledger.index',compact('students','fees','today'));
    }
    public function index2()
    {
       // return 'Hello';
        $today=Carbon::today();
         try{
            $bs_items=ChartAccount::where('parent_id',0)->where('account','BS')->get();
            $bs_items_all=ChartAccount::where('account','IS')->get();
        //return $bs_items_all;
        foreach($bs_items_all as $item){
           // return $item->id;
          // return $this->parent_total($item->id);
        }
       
        $is_items=ChartAccount::where('parent_id',0)->where('account','IS')->get();
        return view('accounting.ledger.index2',compact('bs_items','is_items','today'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
        //return view('accounting.ledger.index2',compact('today'));
    }

    public function indexReport(Request $request)
    {
         
        $from = $request->from;
        $to = $request->to;
        $today=Carbon::today();
        //  $data= ChartAccount::with('childs', 'parent')->get();
         // return $to;
        // return $request;
        // $opening_bal= ReceivableDetail::whereBetween('date', [$from, $to])->where('fee_id',8)->sum('amount');
        // $debit= ReceivableDetail::whereBetween('date', [$from, $to])->where('account_type','Dr')->sum('amount');
        // $credit= ReceivableDetail::whereBetween('date', [$from, $to])->where('account_type','Cr')->sum('amount');
       try{
           
            $bs_items=ChartAccount::where('parent_id',0)->where('account','BS')->get();
            $bs_items_all=ChartAccount::with('childs', 'parent')->get();
        //return $bs_items_all->where('parent_id',0)->where('account','BS');
        $Drtotal_child=0;
        $Crtotal_child=0;
        foreach($bs_items_all->where('parent_id',0)->where('account','BS') as $item){
           
            //return $item->id;
            foreach($item->childs as $it){
                 $child_ids[]=$it->id;
            }
             //return $child_ids;
             $Drtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Dr')->whereIn('chart_account_id',$child_ids)->sum('amount');
             $Crtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Cr')->whereIn('chart_account_id',$child_ids)->sum('amount');
             
             $account[]=[
                 $item->id=>$Drtotal_child+$Crtotal_child
                 ];
                 $Drtotal_child=0;
                 $Crtotal_child=0;
           //return $this->parent_total($item->id,$from,$to);
        }
        
       // return $account;
      
        $is_items=ChartAccount::where('parent_id',0)->where('account','IS')->get();
        return view('accounting.ledger.index2',compact('bs_items','is_items','today','from','to'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
        return view('accounting.ledger.index2',compact('today','opening_bal','debit','credit','from','to'));
    }
    
    private function parent_total($cid,$from,$to)
    {
        $child= DB::table('chart_accounts')->select('id','parent_id')->where('parent_id',$cid)->first();
            
            $Drtotal_parent=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Dr')->where('chart_account_id',$child->parent_id)->sum('amount');
           
            $Drtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Dr')->where('chart_account_id',$child->id)->sum('amount');
            
            $Drtotal=$Drtotal_parent+$Drtotal_child;
    
        $Crtotal_parent=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Cr')->where('chart_account_id',$child->parent_id)->sum('amount');
        
        $Crtotal_child=DB::table('ledgers')->whereBetween('date', [$from, $to])->where('account_type','Cr')->where('chart_account_id',$child->id)->sum('amount');
        
         $Crtotal=$Crtotal_parent+$Crtotal_child;
          if($Drtotal>=$Crtotal){
            return $Drtotal-$Crtotal;
        }else{
            return $Crtotal-$Drtotal;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $student_id= $request->input('student_id');
        $receivable_id= $request->input('receivable_id');
        $students=StudentInfo::select('Registration_Number','Full_Name')->get();
        $bs_items=ChartAccount::where('parent_id',0)->where('account','BS')->get();
        $is_items=ChartAccount::where('parent_id',0)->where('account','IS')->get();
         $fees= Fee::all();
         $today=Carbon::today();
        return view('accounting.ledger.create',compact('students','fees','today','bs_items','is_items','student_id','receivable_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return $request;
        $request->validate([
            'date' => 'required',
        ]);
        
        try{
            $fee_id_1=Fee::where('id',$request->fee_id_1)->first();
        $fee_id_2=Fee::where('id',$request->fee_id_2)->first();
        
        if($request->type=='payment'){
           $rd=ReceivableDetail::create([
            'student_id'=>$request->student_id,
            'date'=>$request->date,
            'fee_id'=>$fee_id_1->id,
            'particular'=>$fee_id_1->fee_name,
            'amount'=>$request->amount_1,
            'account_type'=>$fee_id_1->account_type,
            'section'=>$fee_id_1->section,
            'receivable_id'=>$request->receivable_id?$request->receivable_id:'journal entry '.$request->type,
            'remarks'=>$request->remarks_1,
           ]); 
        }else{
            $rd=ReceivableDetail::create([
            'student_id'=>$request->student_id,
            'date'=>$request->date,
            'fee_id'=>$fee_id_2->id,
            'particular'=>$fee_id_2->chart_account_id=='3'? $fee_id_2->fee_name.'-'.$request->student_id:$fee_id_2->fee_name.' ',
            'amount'=>$request->amount_2,
            'account_type'=>$fee_id_2->account_type,
            'section'=>$fee_id_2->section,
            'receivable_id'=>$request->receivable_id?$request->receivable_id:'journal entry'.$request->type,
            'remarks'=>$request->remarks_2,
           ]); 
        }
        
           
          Ledger::create([
                        'chart_account_id'=>$fee_id_1->chart_account_id,
                        'student_id'=>$request->student_id,
                        'date'=>$request->date,
                        'particular'=>$fee_id_1->fee_name,
                        'amount'=>$request->amount_1,
                        'account_type'=>$fee_id_1->account_type,
                        'receivable_id'=>$request->receivable_id?$request->receivable_id:'journal Entry',
                        'fee_id'=>$fee_id_1->id,
                        'rd_id'=>$rd->id,
                        ]);
            Ledger::create([
                        'chart_account_id'=>$fee_id_2->chart_account_id,
                        'student_id'=>$request->student_id,
                        'date'=>$request->date,
                        'particular'=>$fee_id_2->chart_account_id=='3'? $fee_id_2->fee_name.'-'.$request->student_id:$fee_id_2->fee_name.' ',
                        'amount'=>$request->amount_2,
                        'account_type'=>$fee_id_2->account_type,
                        'receivable_id'=>$request->receivable_id?$request->receivable_id:'journal Entry',
                        'fee_id'=>$fee_id_2->id,
                        'rd_id'=>$rd->id,
                        ]);
        
        if(isset($request->receivable_id)){
                    $fee_total=0;
                   $less_total=0;
                   $paid_total=0;
                   //total fee
                $particulars_fee= ReceivableDetail::where('receivable_id',$request->receivable_id)
                                    ->where('student_id',$request->student_id)
                                    ->where('section','fee')->get();
                foreach ($particulars_fee as $fee){
                    $fee_total+=$fee->amount;
                }
                
                //less fee calculate
                $particulars_less= ReceivableDetail::where('receivable_id',$request->receivable_id)->where('section','less')->get();
                foreach ($particulars_less as $less){
                    $less_total+=$less->amount;
                }
                
                $less_amount=$fee_total-$less_total;
        
                $particulars_paid= ReceivableDetail::where('receivable_id',$request->receivable_id)->where('section','paid')->get();
                foreach ($particulars_paid as $paid){
                    $paid_total+=$paid->amount;
                }
                Receivable::where('id',$request->receivable_id)
                ->update(['total'=>$fee_total,'less'=>$less_total,'paid'=>$paid_total,'due'=>$less_amount-$paid_total]);
                $notification= array('title' => 'Data Store', 'body' => 'Ledger Created  Succesfully.');
        return redirect()->route('student.ledger',$request->student_id)->with('success',$notification);
        }else{
          $notification= array('title' => 'Data Store', 'body' => 'Ledger Added Succesfully.');
        return redirect()->back()->with('success',$notification);  
        }
        }catch(\Exception $e){
            return $e->getMessage();
        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $rd=ReceivableDetail::find($id);
         //return $rd;
        $ld=Ledger::where('rd_id',$id)->get();
        //return $ld;
        $students=StudentInfo::select('Registration_Number','Full_Name')->get();
        $bs_items=ChartAccount::where('parent_id',0)->where('account','BS')->get();
        $is_items=ChartAccount::where('parent_id',0)->where('account','IS')->get();
         $fees= Fee::all();
         $today=Carbon::today();
        return view('accounting.ledger.edit',compact('students','fees','today','bs_items','is_items','ld','rd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                //return $request;
        $rd=ReceivableDetail::find($id);
        $ld=Ledger::where('rd_id',$id)->get();
        $fee_id_1=Fee::where('id',$request->fee_id_1)->first();
        $fee_id_2=Fee::where('id',$request->fee_id_2)->first();
        //return  $fee_id_2;
        if($request->type=='payment'){
            $rd->update([
             'student_id'=>$request->student_id,
             'date'=>$request->date,
             'fee_id'=>$fee_id_1->id,
             'particular'=>$fee_id_1->fee_name,
             'amount'=>$request->amount_1,
             'account_type'=>$fee_id_1->account_type,
             'section'=>$fee_id_1->section,
             'receivable_id'=>$request->receivable_id?$request->receivable_id:'journal entry updated '.$request->type,
             'remarks'=>$request->remarks_1,
            ]); 
         }else{
             $rd->update([
             'student_id'=>$request->student_id,
             'date'=>$request->date,
             'fee_id'=>$fee_id_2->id,
             'particular'=>$fee_id_2->chart_account_id=='3'? $fee_id_2->fee_name.'-'.$request->student_id:$fee_id_2->fee_name.' ',
             'amount'=>$request->amount_2,
             'account_type'=>$fee_id_2->account_type,
             'section'=>$fee_id_2->section,
             'receivable_id'=>$request->receivable_id?$request->receivable_id:'journal entry updated'.$request->type,
             'remarks'=>$request->remarks_2,
            ]); 
         }
        //return $ld[0];
        $ld[0]->update([
            'chart_account_id'=>$fee_id_1->chart_account_id,
            'student_id'=>$request->student_id,
            'date'=>$request->date,
            'particular'=>$fee_id_1->fee_name,
            'amount'=>$request->amount_1,
            'account_type'=>$fee_id_1->account_type,
            'receivable_id'=>$request->receivable_id?$request->receivable_id:'journal entry updated',
            'fee_id'=>$fee_id_1->id,
            'rd_id'=>$rd->id,
            ]);
        $ld[1]->update([
            'chart_account_id'=>$fee_id_2->chart_account_id,
            'student_id'=>$request->student_id,
            'date'=>$request->date,
            'particular'=>$fee_id_2->chart_account_id=='3'? $fee_id_2->fee_name.'-'.$request->student_id:$fee_id_2->fee_name.' ',
            'amount'=>$request->amount_2,
            'account_type'=>$fee_id_2->account_type,
            'receivable_id'=>$request->receivable_id?$request->receivable_id:'journal entry updated',
            'fee_id'=>$fee_id_2->id,
            'rd_id'=>$rd->id,
            ]);
        $notification= array('title' => 'Data Store', 'body' => 'Ledger updated  Succesfully.');
        return redirect()->route('student.ledger',$request->student_id)->with('success',$notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function studentLedger($student_id)
    {
        $today=Carbon::today();
        $particulars= ReceivableDetail::where('student_id',$student_id)->orderby('date','asc')->get();
        $student=StudentInfo::where('Registration_Number',$student_id)->first();
        $students=StudentInfo::all();
        return view('accounting.receivable.studentLedger', compact('particulars','student','students','today'));
    }

    public function studentJournal($id)
    {
        
        
        $particular= ReceivableDetail::find($id);
        $recivable=Receivable::find($particular->receivable_id);
        $reg_student=Registration::where('id',$recivable->registration_id)->first();
        //return $recivable;
        $totalCredit= $this->totalCredit($reg_student);
        $feeDetails= FeeDetail::with('feelists')
                    ->where('registration_id',$recivable->registration_id)->get();
        
       //return $particular;
        return view('accounting.ledger.journal', compact('particular','feeDetails','totalCredit'));
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

    public function delete($id)
    {
        $receivable= ReceivableDetail::find($id);
        //$receivable->delete();
        //return $receivable;
        Ledger::where('rd_id',$id)->delete();
        //return $ld->delete();
        
        
        
        if(is_numeric($receivable->receivable_id)==true){
            $receivable->delete();
            Ledger::where('rd_id',$id)->delete();
            //return 'receivable id exist';
                    $fee_total=0;
                    $less_total=0;
                    $paid_total=0;
                    //total fee
                 $particulars_fee= ReceivableDetail::where('receivable_id',$receivable->receivable_id)
                                     ->where('student_id',$receivable->student_id)
                                     ->where('section','fee')->get();
                 foreach ($particulars_fee as $fee){
                     $fee_total+=$fee->amount;
                 }
                 
                 //less fee calculate
                 $particulars_less= ReceivableDetail::where('receivable_id',$receivable->receivable_id)->where('section','less')->get();
                 foreach ($particulars_less as $less){
                     $less_total+=$less->amount;
                 }
                 
                 $less_amount=$fee_total-$less_total;
            
                 $particulars_paid= ReceivableDetail::where('receivable_id',$receivable->receivable_id)->where('section','paid')->get();
                 foreach ($particulars_paid as $paid){
                     $paid_total+=$paid->amount;
                 }
                 Receivable::where('id',$receivable->receivable_id)
                 ->update(['total'=>$fee_total,'less'=>$less_total,'paid'=>$paid_total,'due'=>$less_amount-$paid_total]);
        }else{
            $receivable->delete();
            Ledger::where('rd_id',$id)->delete();
            
        }
        //var_dump(is_numeric($receivable->receivable_id));
       

     $notification= array('title' => 'Data Store', 'body' => 'Ledger Delete Succesfully.');
        return redirect()->back()->with('warning',$notification);
    }
    
}

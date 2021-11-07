<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeeList;
use App\StudentInfo;
use App\Department;
use App\Faculty;
use App\Semester;

class FeeListController extends Controller
{
    
    protected $semesters=[
        'l1t1' => '1st Year 1st Semester',
        'l1t2' => '1st Year 2nd Semester',
        'l2t1' => '2nd Year 1st Semester',
        'l2t2' => '2nd Year 2nd Semester',
        'l3t1' => '3rd Year 1st Semester',
        'l3t2' => '3rd Year 2nd Semester',
        'l4t1' => '4th Year 1st Semester',
        'l4t2' => '4th Year 2nd Semester'
    ];
    
    protected $feetypes=[
        '1' => 'During Admission',
        '2' => 'Term Wise(Dynamic Based on Credit Fee)',
        '3' => 'Term Wise(Fixed)',
        '4' => 'Citizens of Imo State (Indigenes)'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feelists = FeeList::all();
        //$semesters = FeeList::select('semester')->distinct()->get();
        
        return view('accounting.feelist.index',compact('feelists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        $semesters= $this->semesters;
        $feetypes= $this->feetypes;
        return view('accounting.feelist.create',compact('departments','semesters','feetypes','faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'department_id'=>'required',
        // ]);
        $attr = $request->all();
        // dd($attr);
        $attr['chart_account_id'] = 1;
        //return $request->all();
        // dd($attr);
        FeeList::create($attr);
        return back()->with('success','FeeList data store Succesfully');
        // $notification= array('title' => 'Data Store', 'body' => 'FeeList data store Succesfully.');
        // return redirect()->route('feelist.create')->with('success',$notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($semester)
    {
        $feeStructures = FeeList::where('semester',$semester)->get();
        $departments = FeeList::select('department')->distinct()->get();  
        $semesters = FeeList::select('semester')->distinct()->get();  
        return view('accounting.feelist.show',compact('feeStructures','semesters','departments','semester'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->isMethod('post')){
            $fee = FeeList::find($id);
            $fee->update($request->all());
            return back()->with('success','FeeList data updated Succesfully.');
        }
        $fl = FeeList::find($id);
        $departments = Department::all();
        $faculties = Faculty::all();
        $semesters = Semester::all();
        $feetypes= $this->feetypes;
        return view('accounting.feelist.edit',compact('departments','fl','semesters','feetypes','faculties'));
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
        $fee = FeeList::find($id);

       // $fee->semester = $request->semester;
        $fee->department_id = $request->department;
        $fee->fee_name = $request->fee_name;
        $fee->amount = $request->amount;
        $fee->fee_type = $request->fee_type;
        $fee->status = $request->status;
        //dd($fee);
       // return $fee;
        $fee->save();
        return back()->with('success','FeeList data updated Succesfully.');
        // $notification= array('title' => 'Data Updated', 'body' => 'FeeList data updated Succesfully.');
        // return redirect()->route('feelist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = FeeList::find($id);
        $course->delete();
        $notification= array('title' => 'Data Deleted', 'body' => 'FeeList data deleted Succesfully.');
        return redirect()->route('feelist.index');
    }
    
}

<?php

namespace App\Http\Controllers\Accounting;

use App\Fee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$fees=Fee::all();
       $fees= DB::table('fees')
    	    ->whereNotNull('chart_account_id')
    	    ->get();
    	    //return $fees;
        return view('accounting.fee.index',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fees= DB::table('chart_accounts')
    	    ->get();
        return view('accounting.fee.create',compact('fees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fee::create($request->all());
        toastr()->success('Ledger Particular Created Successfully!');
        return redirect()->back();
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
        $fee=Fee::find($id);
        return view('accounting.fee.edit',compact('fee'));
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
        $fee=Fee::find($id);
        $fee->fee_name=$request->fee_name;
        $fee->account_type=$request->account_type;
        $fee->section=$request->section;
        $fee->status=$request->status;
        $fee->save();
        return redirect()->route('fee.index')->with('msg','Ledger Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee=Fee::find($id);
        $fee->delete();
        return redirect()->route('fee.index')->with('msg','Ledger Deleted Successfully!');
    }
}

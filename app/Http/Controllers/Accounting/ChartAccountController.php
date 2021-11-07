<?php

namespace App\Http\Controllers\Accounting;

use App\ChartAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ChartAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $bs_items=ChartAccount::where('parent_id',0)->where('account','BS')->get();
            //$bs_items_all=ChartAccount::where('account','IS')->get();
        //return $bs_items_all;
        // foreach($bs_items_all as $item){
        //   // return $item->id;
        //   // return $this->parent_total($item->id);
        // }
       
        $is_items=ChartAccount::where('parent_id',0)->where('account','IS')->get();
        return view('accounting.chart_account.index',compact('bs_items','is_items'));
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    private function parent_total($cid){
        $child= DB::table('chart_accounts')->select('id','parent_id')->where('parent_id',$cid)->first();
            
            $Drtotal_parent=DB::table('ledgers')->where('account_type','Dr')->where('chart_account_id',$child->parent_id)->sum('amount');
           
            $Drtotal_child=DB::table('ledgers')->where('account_type','Dr')->where('chart_account_id',$child->id)->sum('amount');
            
            $Drtotal=$Drtotal_parent+$Drtotal_child;
    
        $Crtotal_parent=DB::table('ledgers')->where('account_type','Cr')->where('chart_account_id',$child->parent_id)->sum('amount');
        
        $Crtotal_child=DB::table('ledgers')->where('account_type','Cr')->where('chart_account_id',$child->id)->sum('amount');
        
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        ChartAccount::create(request()->all());
        toastr()->success('Master Account Created Successfully', 'System Says');
        return back();
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function show(ChartAccount $chartAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartAccount $chartAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChartAccount $chartAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChartAccount  $chartAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChartAccount $chartAccount)
    {
        //
    }
}

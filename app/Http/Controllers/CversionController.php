<?php

namespace App\Http\Controllers;

use App\Cversion;
use Illuminate\Http\Request;

class CversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cversions = Cversion::all();
        return view('cversion.index',['cversions'=>$cversions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cversion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Cversion::create($request->all());
        return redirect()->route('cversion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cversion  $cversion
     * @return \Illuminate\Http\Response
     */
    public function show(Cversion $cversion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cversion  $cversion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cversion = Cversion::find($id);
        return view('cversion.edit',['cversion'=>$cversion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cversion  $cversion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cversion = Cversion::find($id);
        $cversion->version_name = $request->version_name;
        $cversion->acyear_start = $request->acyear_start;
        $cversion->acyear_end = $request->acyear_end;
        $cversion->save();
        return redirect()->route('cversion.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cversion  $cversion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cversion = Cversion::find($id);
         $cversion->delete();
         return redirect()->route('cversion.index');
    }
}

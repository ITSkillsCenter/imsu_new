<?php

namespace App\Http\Controllers;

use App\Croutine;
use App\Faculty;
use Illuminate\Http\Request;

class CroutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $croutines = Croutine::all();
        return view('croutine.index',['croutines'=>$croutines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::where('status',1)->get();
        return view('croutine.create',['faculties'=>$faculties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Croutine::create($request->all());
        return redirect()->route('croutine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Croutine  $croutine
     * @return \Illuminate\Http\Response
     */
    public function show(Croutine $croutine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Croutine  $croutine
     * @return \Illuminate\Http\Response
     */
    public function edit(Croutine $croutine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Croutine  $croutine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Croutine $croutine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Croutine  $croutine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Croutine $croutine)
    {
        //
    }
}

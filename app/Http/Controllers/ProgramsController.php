<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('programs.index',compact('programs'));
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
        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $program = new Program([
            'name'=>$request->name,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'notice'=>$request->notice,
        ]);
        $program->save();
        toastr()->success('Program add successful','Success');
        return back()->with('success', 'Program add successful');
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
        $program = Program::find($id);
        return view('programs.edit',compact('program'));
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
        $program = Program::find($id);
        $request->validate([
            'name'=>'required',
        ]);
        $program->name = $request->name;
        $program->description = $request->description;
        $program->start_date = $request->start_date;
        $program->end_date = $request->end_date;
        $program->notice = $request->notice;
        $program->save();
        // toastr()->success('Department updated successfully','Success');
        return redirect()->route('programs.index')->with('success','Program updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        toastr()->error('Program deleted successfully','Error');
        return redirect()->back();
    }
}

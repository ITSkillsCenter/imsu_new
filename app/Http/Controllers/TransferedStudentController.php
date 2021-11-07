<?php

namespace App\Http\Controllers;

use App\TransferedStudent;
use Illuminate\Http\Request;

class TransferedStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = TransferedStudent::all();
        return view('transfered.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transfered.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            TransferedStudent::create($request->all());
        $notification= array('title' => 'Data Store', 'body' => 'Creadit Transfer Student Added Succesfully.');
        return redirect()->route('transfer.index')->with("success",$notification);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransferedStudent  $transferedStudent
     * @return \Illuminate\Http\Response
     */
    public function show(TransferedStudent $transferedStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransferedStudent  $transferedStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student= TransferedStudent::find($id);
        return view('transfered.student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransferedStudent  $transferedStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $student = TransferedStudent::find($id);
            $student->update($request->all());
            $notification= array('title' => 'Data Saved', 'body' => "Student Data Updated Successfully");
            return redirect()->route('transfer.index')->with("success",$notification);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransferedStudent  $transferedStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransferedStudent $transferedStudent)
    {
        //
    }
}

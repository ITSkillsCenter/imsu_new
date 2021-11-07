<?php

namespace App\Http\Controllers;

use App\Course;
use App\WaivedCourse;
use Illuminate\Http\Request;

class WaivedCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=WaivedCourse::all();
        return view('transfered.waived.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return view('transfered.waived.create',compact('courses'));
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
            WaivedCourse::create($request->all());
        $notification= array('title' => 'Data Store', 'body' => 'Waived Course Created Succesfully.');
        return redirect()->route('waived.index')->with("success",$notification);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WaivedCourse  $waivedCourse
     * @return \Illuminate\Http\Response
     */
    public function show(WaivedCourse $waivedCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WaivedCourse  $waivedCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(WaivedCourse $waivedCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WaivedCourse  $waivedCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WaivedCourse $waivedCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WaivedCourse  $waivedCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(WaivedCourse $waivedCourse)
    {
        //
    }
}

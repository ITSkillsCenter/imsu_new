<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Faculty;

class Department_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with('faculty')->get();
        return view('departments.index',compact('departments'));
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
            'short_name'=>'required',
            'type'=>'required',
            'faculty_id'=>'required'
        ]);
        $department = new Department([
            'name'=>$request->name,
            'short_name'=>$request->short_name,
            'type'=>$request->type,
            'faculty_id'=>$request->faculty_id
        ]);
        $department->save();
        toastr()->success('Department add successful','Success');
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
        $department = Department::find($id);
        $faculties = Faculty::all();
        return view('departments.edit',compact('department', 'faculties'));
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
        $department = Department::find($id);
        $request->validate([
            'name'=>'required',
            'short_name'=>'required',
            'type'=>'required',
            'faculty_id'=>'required'
        ]);
        $department->name = $request->name;
        $department->short_name = $request->short_name;
        $department->type = $request->type;
        $department->faculty_id = $request->faculty_id;

        $department->save();
        // toastr()->success('Department updated successfully','Success');
        return redirect()->route('departments.index')->with('success','Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        toastr()->error('Department deleted successfully','Error');
        return redirect()->back();
    }


    public function listDepartmentByFaculty(Request $request)
    {
        $departments = Department::where('faculty_id', $request['faculty_id'])->pluck("name", "id");

        return response()->json($departments);
    }
}


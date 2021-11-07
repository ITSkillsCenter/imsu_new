<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Faculty;
use App\Online_Class;
use App\User;
use App\Department;
use App\Current_Semester_Running;

class Online_Class_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $faculty = Faculty::with('department:id,short_name')->find(auth()->user()->teacher_id);
            // return $faculty;
            $all_classes = Online_Class::with('faculty:id,faculty_id,name,email','course:id,course_code,course_name')
                                        ->where('dept_id',$faculty->department->short_name)
                                        ->where('faculty_id', auth()->user()->teacher_id)
                                        ->latest()
                                        ->get();
            // return $all_classes;
            return view('online_class.index', compact('all_classes'));
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $faculty = Faculty::with('department:id,short_name')->find(auth()->user()->teacher_id);
            // return $faculty;
            $courses = Course::all();
            // return $courses;
            return view('online_class.create', compact('faculty','courses'));
        }catch(\Throwable $th){
            return $th->getMessage();
        }
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
            // return $request;
            Online_Class::create($request->all());
            toastr()->success('Success','Class added successfully.');
            return redirect()->back();
        }catch(\Throwable $th){
            return $th->getMessage();
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
        try{
            // return $id;
            $this_class = Online_Class::with('faculty:id,faculty_id,name,email','course:id,course_code,course_name')->find($id);
            if($this_class->dept_id == "Sc&Hum"){
                $courses = Course::all();
            }else{
                $courses = Course::select('id','course_code','course_name','levelTerm')->where('Program',$this_class->dept_id)->get(); 
            }
            // return $courses;
            return view('online_class.edit', compact('this_class', 'courses'));
        }catch(\Throwable $th){
            return $th->getMessage();
        }
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
        try{
            // return $request;
            $class = Online_Class::find($id);
            $class->update($request->all());
            toastr()->success('Success','Class has been updated...');
            return redirect()->route('online-class.index');
        }catch(\Throwable $th){
            $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $class = Online_Class::find($id);
            $class->delete();
            toastr()->error('Class Deleted', 'Deleted');
            return redirect()->back();
        }catch(\Throwable $th){
            $th->getMessage();
        }
    }
    
    /** check and report starts **/
    public function all_classes(){
        $departments = Department::select('short_name')->get();
        $sessions = Current_Semester_Running::select('title')->latest()->get();
        // return $sessions;
        return view('online_class.report', compact('departments','sessions'));
    }
    
    public function classes_search(Request $request){
        $classes = Online_Class::where('dept_id', $request->department)->where('session', $request->session)->latest()->get();
        // return $classes;
        return view('online_class.report', compact('classes'));
    }
}

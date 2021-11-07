<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Faculty;
use App\Department;
class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();
       // return $faculties;
        return view('faculty.index',['faculties'=>$faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('faculty.create',compact('departments'));
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
            'name' => 'required', 
            'short_name' => 'required',
            'email'=> 'required|unique:faculties', 
            'status'=> 'required', 
        ]);

        if($request->picture !== null){
            $extensions = ['jpeg','png','jpg'];
            $extension = $request->picture->getClientOriginalExtension();
            if(!in_array($extension, $extensions)){
                return back()->with('error','Invalid file type, upload a jpeg,png or jpg file');
            }
            $imageName = time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('faculty_images'), $imageName);
            $request->merge(['image' => $imageName]);
        }

        $slug = str_replace(' ', '-',$request->name);
        $request->merge(['slug' => $slug]);

        $faculty = Faculty::create($request->except(['_token']));
        return back()->with('success','Faculty added successfully');
        // toastr()->success('Faculty added successfully','success');
        // return redirect()->route('faculty.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::find($id);
        $departments = Department::all();
        return view('faculty.edit',compact('faculty','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faculty = Faculty::find($id);
        if($request->picture !== null){
            $extensions = ['jpeg','png','jpg'];
            $extension = $request->picture->getClientOriginalExtension();
            if(!in_array($extension, $extensions)){
                return back()->with('error','Invalid file type, upload a jpeg,png or jpg file');
            }
            $imageName = time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('faculty_images'), $imageName);
            $faculty->image = $imageName;
        }
        $faculty->faculty_id = $request->faculty_id;
        $faculty->name = $request->name;
        $faculty->short_name = $request->short_name;
        $faculty->email = $request->email;
        $faculty->about = $request->about;
        $faculty->why_study_here = $request->why_study_here;
        $faculty->alumni = $request->alumni;
        $faculty->benefit = $request->benefit;
        $faculty->phone_number = $request->phone_number;
        $faculty->slug = str_replace(' ', '-', $request->name);
        // $faculty->email = $request->email;
        $faculty->save();
        return back()->with('success','Faculty edited successfully');
        // return redirect()->route('faculty.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
        $faculty = Faculty::find($id);
        $faculty->delete();
        toastr()->error('Item deleted!','Deleted');
        return redirect()->route('faculty.index');
    }
}

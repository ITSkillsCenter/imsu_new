<?php

namespace App\Http\Controllers;

use App\Course;
use App\Faculty;
use App\ManageCourseCreditUnit;
use App\Program;
use Illuminate\Http\Request;

class ManageCourseCreditUnitController extends Controller
{

    
	public function list()
	{
		$courseCreditUnits = ManageCourseCreditUnit::with('program','faculty','department')->get();
		// dd($courseCreditUnits->toArray());
        return view('course_credit_unit.list',compact('courseCreditUnits'));
	}

    public function create()
	{
        $faculties = Faculty::get();
        $programs = Program::get();
        return view('course_credit_unit.create',compact('faculties','programs'));
	}
    

	public function store(Request $request)
	{
		$this->validate($request,[
			'faculty_id' => 'required|exists:faculties,id',
			'program_id' => 'required|exists:programs,id',
			'department_id' => 'required|exists:departments,id',
			'program_level' => 'required',
            'max_credit_unit' => 'required',
            'min_credit_unit' => 'required'
		]);

		$request['level'] = $request['program_level'];

		$manageCourseCreditUnit = ManageCourseCreditUnit::where('faculty_id', $request['faculty_id'])
                                    ->where('program_id', $request['program_id'])
                                    ->where('department_id', $request['department_id'])
                                    ->where('level', $request['level'])
                                    ->first();
        if($manageCourseCreditUnit){
            return back()->with('error', 'Record already exist');
        }

        $manageCourseCreditUnit = ManageCourseCreditUnit::create($request->all());

		if(!$manageCourseCreditUnit){
			return back()->with("error",'Unable to create record at this time, please try again');
		}
		
		return back()->with("success",'Record created');
	}


    public function edit($id)
	{
		$faculties = Faculty::get();
        $programs = Program::get();
		$manageCourseCreditUnit = ManageCourseCreditUnit::with('program','faculty','department')->where('id', base64_decode($id))->first();
        return view('course_credit_unit.edit',compact('manageCourseCreditUnit','faculties','programs'));
	}

    public function update($id, Request $request)
	{
        // $this->validate($request,[
		// 	'level' => 'required',
        //     'max_credit_unit' => 'required'
		// ]);

		$manageCourseCreditUnit = ManageCourseCreditUnit::where('id', ($id))->first();
        if(!$manageCourseCreditUnit){
            return back()->with('error', 'Record not found');
        }
        $manageCourseCreditUnit->update($request->all());

		return back()->with("success",'Record updated');

	}

}

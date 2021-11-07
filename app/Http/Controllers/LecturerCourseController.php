<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use App\Lecturer;
use App\LecturerCourse;
use Illuminate\Http\Request;

class LecturerCourseController extends Controller
{
    public function assignCouseGet()
	{
		$lecturers = Lecturer::with('user')->get();
		if((isset($_GET['lecturer_id']))){
			$lecturerDatad = Lecturer::where('id', base64_decode($_GET['lecturer_id']))->with('user')->first();
			$lecturerData = $lecturerDatad ? $lecturerDatad : null;
		}else{
			$lecturerData = null;
		}
		$departments = Department::get();
		
		$courses = Course::get();

        return view('lecturer.assign-course',compact('lecturers','courses', 'lecturerData', 'departments' ));
	}

	public function assignCousePost(Request $request)
	{
		$this->validate($request,[
			'lecturer_id' => 'required|exists:lecturers,id',
			'course_id' => 'required|exists:courses,id',
			'department_id' => 'required|exists:departments,id',
		]);

		$lecturer  = Lecturer::with('user')->where('id', $request['lecturer_id'])->first();

		$course  = Course::where('id', $request['course_id'])->first();
		$lectuerCourse = LecturerCourse::where('lecturer_id', $request['lecturer_id'])->where('course_id',$request['course_id'])->first();
		if($lectuerCourse){
			return back()->with("error",'Course already assigned to this lecturer');
		}
		$lect = LecturerCourse::create([
			'user_id' => $lecturer->user->id,
			'lecturer_id' => $request['lecturer_id'],
			'course_id' => $request['course_id'],
			'department_id' => $course->dept_id,
			'faculty_id' => $course->faculty_id,
		]);
		if(!$lect){	
			return back()->with("error",'An error occured, try again');
		}

		return back()->with("success",'Course assigned');


	}

	public function lecturerCourses()
	{
		$lecturerCourses = LecturerCourse::where('user_id', auth()->id())->get();
        return view('lecturer.my-courses',compact('lecturerCourses'));
	}


}

<?php

namespace App\Http\Controllers;

use App\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function listLecturer()
	{
		$lecturers = Lecturer::with('user','lecturerCourses.course')->get();
        return view('lecturer.list',compact('lecturers'));
	}
}

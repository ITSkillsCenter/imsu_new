<?php

namespace App\Http\Controllers;

use App\BorrowedCourse;
use App\Course;
use App\Course_Student;
use App\Cversion;
use App\Croutine;
use App\StudentInfo;
use App\Department;
use App\Current_Semester_Running;
use App\Faculty;
use App\Syllabus;
use App\Imports\SyllabusImport;
use App\Program;
use App\Programme;
use App\Specialization;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CourseController extends Controller
{
    
    protected $semesters=[
        '1st' => '1st Semester',
        '2nd' => '2nd Semester',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $dept = $request->dept;
        }elseif($id){
            $dept = base64_decode($id);
        }

        if(Auth::user()->dept_id !== null){
            $departments = Department::where(['id' => Auth::user()->dept_id])->get();
        }else{
            $departments = Department::all();
        }

        $programs = Program::all();
        // return $dept;
         if($dept){
            $prg = $request->program;
            $department = Department::find($dept);
            $sel_prog = Program::find($prg);
            $courses = Course::where(['dept_id' => $dept, 'program' => $request->program])->get();
            // dd($dept,$request->program, $courses);
         }

        return view('course.index',compact('dept','courses','departments','department', 'programs', 'prg', 'sel_prog'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(Auth::user()->dept_id !== null){
            $departments = Department::where(['id' => Auth::user()->dept_id])->get();
        }else{
            $departments = Department::all();
        }
        $faculty = Faculty::all();
        $programs = Program::all();
        $semesters= $this->semesters;
        //return $semesters; 
        return view('course.create',[
            'departments' =>$departments,
            'faculties' =>$faculty,
            'semesters'=>$semesters,
            'programs' => $programs
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'course_code'=>'required',
            'course_name'=>'required',
            'unit' => 'required',
            'type' => 'required',
            'dept_id' => 'required',
            'program' => 'required',
            // 'level' => 'required',
            'semester' => 'required',
        ]);
        $attr = $request->all(); 
        $dept = Department::find($request->dept_id);
        if($dept){
            $attr['faculty_id'] = $dept->faculty_id;
        }
        //dd($attr);
        Course::create($attr);
        // $notification= array('title' => 'Data Store', 'body' => 'Course data store Succesfully.');
        return redirect()->route('course.create')->with('success','Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id=null)
    {
        $id = base64_decode($id);
        $course = Course::find($id);
        $departments = Department::all();
        $faculty = Faculty::all();
        $programs = Program::all();
        $semesters= $this->semesters;
        
        if($request->isMethod('post')){
            $course = Course::find($id);
            $course->update($request->all());
            $notification= array('title' => 'Data Saved', 'body' => "Course Data Updated Successfully");
            return redirect()->route('course.index')->with("success",$notification);
        }
        //return $semesters; 
        return view('course.edit',[
            'course'=>$course,
            'departments' =>$departments,
            'faculties' =>$faculty,
            'semesters'=>$semesters,
            'programs' => $programs
        ]);
        
        // return view('course.edit',[
        //     'course'=>$course,
            
        //     'departments' =>$departments,
        //     'semesters'=>$semesters
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $id = base64_decode($id);
        $course = Course::find($id);
        
        $course->update($request->all());
        $notification= array('title' => 'Data Saved', 'body' => "Course Data Updated Successfully");
        // $url ="/admin/course/index/". base64_encode($course->dept_id);
        return back()->with("success",'Course Data Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('course.index')->with('success','Course Deleted');
    }
    
     
    public function department($dept)
    {
        //return $dept;
        $departments = Department::find($dept);
        $courses = Course::where(['dept_id' => $dept])->get();
        return view('course.index',['courses'=>$courses,'departments'=>$departments]);
    }


    public function subjetsByDptSem($department,$semester)
    {
        $subjects = DB::table('courses')->where('Program',$department)
        ->where('levelTerm',$semester)->where('status',1)->get();
        //echo json_encode($subjects);
       return response(['subjects'=>$subjects]); 
 
    }
    public function subjetsByDpt($department)
    {
        $subjects = DB::table('courses')->where('Program', $department)->where('status',1)->orderBy('course_name','asc')->get();
        //echo json_encode($subjects);
       return response(['subjects'=>$subjects]); 
 
    }

                                /** Syllabus Functions */
// choosing department
    public function syllabus(){
        $departments = Department::all();
        $semesters = NULL;
        return view('syllabus.index', compact('departments','semesters'));
    }
// choosing session
    public function syllabus_dept($dept_id){
        $semesters = Current_Semester_Running::latest()->get();
        $departments = NULL;
        return view('syllabus.index', compact('departments','semesters','dept_id'));
    }
 // choosing level term 
    public function syllabus_dept_session($dept_id, $semester_id){
        $departments = NULL;
        $semesters = NULL;
        return view('syllabus.index', compact('departments','semesters','dept_id','semester_id'));
    }
// select departmental courses for level term
    public function syllabus_dept_session_level($dept_id, $semester_id, $level_term){
        $courses = Course::where('Program',$dept_id)->get();
        $syllabus_courses = Syllabus::with('course:id,course_code,credit,course_name')->where('department_id',$dept_id)
                                    ->where('session_id',$semester_id)
                                    ->where('level_term',$level_term)
                                    ->get();
        $total_credit=0;

        foreach($syllabus_courses as $item){
            $total_credit = $total_credit + $item->course->credit;
        }
        return view('syllabus.courses', compact('dept_id','semester_id','level_term','syllabus_courses','courses','total_credit'));
    }
// assigning courses
    public function syllabus_post(Request $request){
        //return $request;
        $request->validate([
            'course_id' => 'required|array'
        ]);

        foreach($request->course_id as $course){
            Syllabus::create([
                'department_id' => $request->department_id,
                'session_id' => $request->session_id,
                'level_term' => $request->level_term,
                'course_id' => $course,
                'status' => 'active'
            ]);
        }
        toastr()->success('Success','Syllabus added successfully');
        return redirect()->back();
    }
// course status change
    public function syllabus_edit($id){
        $course = Syllabus::find($id);
        return view('syllabus.edit', compact('course'));
    }
// status update
    public function syllabus_update(Request $request, $id){
        $course = Syllabus::find($id);
        Syllabus::where('id', $id)->update(['status' => $request->status]);
        toastr()->success('Updated','Syllabus Updated Successfully');
        return redirect()->route('syllabus.level',[$request->dept_id,$request->session_id,$request->level_term]);
    }
// remove course from syllabus
    public function syllabus_delete($id){
        Syllabus::destroy($id);
        toastr()->error('Deleted!','Course Deleted');
        return redirect()->back();
    }
// syllabus import
    public function syllabus_import(Request $request){
        // return $request;
        Excel::import(new SyllabusImport, request()->file('file'));
        toastr()->success('Syllabus Added Successfully','Success');
        return redirect()->back();
    }


    public function showPlainCourseMarkSheet($courseId)
    {
        $course = Course::with('faculty','department','coursesStudents.studentInfo')->where('id', $courseId)->firstOrFail();
        // dd($course->coursesStudents->toArray());
        return view('course.plain-course-mark-sheet',[
            'course' =>$course
        ]);
    }


    public function listCoursesByDepartment(Request $request)
    {
        $courses = Course::where('dept_id', $request['department_id'])->pluck("course_name", "id");

        return response()->json($courses);
    }

    public function carryover(Request $request, $id=null){
        if($request->isMethod('post')){
            $dept = $request->dept;
        }elseif($id){
            $dept = base64_decode($id);
        }

        if(Auth::user()->dept_id !== null){
            $departments = Department::where(['id' => Auth::user()->dept_id])->get();
        }else{
            $departments = Department::all();
        }

        if($dept){
            $department = Department::find($dept);
            $students = Course_Student::distinct()->where('course_status','=', 'pending')->get(['student_id']);
        }

        return view('course.carryover',compact('dept','students','departments','department'));
    }

    public function view_student_carryover(Request $request, $matric){
        $previousPending = Course_Student::where(['student_id' => base64_decode($matric), 'course_status' => 'pending', 'reg_type' => 'carry over'])->get();
        return view('course.view_student_carryover',compact('previousPending', 'matric'));
    
    }

    public function approve_student_carryover(Request $request, $cid){
        $upd = Course_Student::find($cid);
        $upd->course_status = 'approved';
        $upd->save();
        return back()->with('success', 'Carry over approved successfully');

    }

    public function reject_student_carryover(Request $request, $cid){
        $upd = Course_Student::find($cid);
        $upd->course_status = 'rejected';
        $upd->save();
        return back()->with('success', 'Carry over rejected successfully');

    }

    public function programme(Request $request, $dept_id){
        if($request->isMethod('post')){
           Programme::create($request->except('_token'));
           return back()->with('success', 'Programme Saved'); 
        }
        $specialization = Specialization::all();
        $programme = Programme::where(['dept_id' => $dept_id])->get();
        // dd($programme);
        return view('course.view_programme',compact('specialization', 'programme', 'dept_id'));
    }

    public function remove_programme(Request $request, $id){
        Programme::find($id)->delete();
        return back()->with('success', 'Programme Deleted Successfully');
    }

    public function remove_specialization(Request $request, $id){
        Specialization::find($id)->delete();
        return back()->with('success', 'Specialization Deleted Successfully');
    }

    public function programme_specialization(Request $request, $id){
        if($request->isMethod('post')){
            Specialization::create($request->except('_token'));
            return back()->with('success', 'Programme Saved'); 
        }
        $programme = Programme::find($id);
        $specialization = Specialization::where(['programme_id' => $id])->get();
        // dd($programme);
        return view('course.view_specialization',compact('specialization', 'programme'));
        
    }

    public function borrowed_course(Request $request){
        if($request->isMethod('post')){
            return redirect('/admin/course/borrowed/'.base64_encode($request->dept).'/'.base64_encode($request->program));
        }

        if(Auth::user()->dept_id !== null){
            $departments = Department::where(['id' => Auth::user()->dept_id])->get();
            $courses = BorrowedCourse::select('courses.*', 'borrowed_courses.id as bid', 'borrowed_courses.owner_id', 'borrowed_courses.dept_borrow_id' ,'borrowed_courses.status as bstatus')->join('courses', 'courses.id', '=', 'course_id')->where(['owner_id' => Auth::user()->dept_id])->get();
        }else{
            $departments = Department::all();
        }

        $programs = Program::all();
        return view('course.borrowed_index',compact('dept','courses','departments','department', 'programs'));
    }

    public function show_borrowed_course(Request $request, $dept_id, $program){
        $dept = base64_decode($dept_id);
        $prg= base64_decode($program);
        $department = Department::find($dept);
        $sel_prog = Program::find($prg);
        $departments = Department::all();
        $faculties = Faculty::all();
        $courses = BorrowedCourse::join('courses', 'courses.id', '=', 'course_id')->where(['dept_borrow_id' => $dept, 'program' => $prg])->get();
        // $courses = Course::where(['dept_id' => $dept, 'program' => $request->program])->get();
        // dd($dept,$prg, $courses);
        return view('course.show_borrowed_index',compact('dept','courses','departments','department','faculties', 'sel_prog'));
    
    }  
    
    public function get_courses_dept_level(Request $request){
        $courses = Course::where(['program'=>$request->program, 'level' => $request->level, 'dept_id' => $request->dept_id])->get();
        return $courses;
    }

    public function apply_borrowed_course(Request $request, $dept_id, $program, $course_id){
        $crs = Course::find($course_id);
        $data['course_id'] = $course_id;
        $data['owner_id'] = $crs->dept_id;
        $data['dept_borrow_id'] = $dept_id;
        $data['status'] = 'pending';

        BorrowedCourse::create($data);
        return back()->with('success', 'Appication successful, awaiting approval');

    }

    public function toggle_borrowed_course(Request $request, $id, $status){
        $b = BorrowedCourse::find($id);
        $b->status = $status;
        $b->save();
        return back()->with('success', ucwords($status) . ' successfully');
    }
    
}

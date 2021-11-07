<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Course;
use App\StudentInfo;
use Illuminate\Http\Request;
use DB;

class MarkController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected $semesters=[
        'l1t1' => '1st Year 1st Semester',
        'l1t2' => '1st Year 2nd Semester',
        'l2t1' => '2nd Year 1st Semester',
        'l2t2' => '2nd Year 2nd Semester',
        'l3t1' => '3rd Year 1st Semester',
        'l3t2' => '3rd Year 2nd Semester',
        'l4t1' => '4th Year 1st Semester',
        'l4t2' => '4th Year 2nd Semester'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $marks = DB::table('marks')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name')
            ->where('marks.grade_letter','=','F')
           // ->where('marks.Registration_Number','=','1101018')
            ->get();
            //return $marks;

     return view('mark.index',compact('marks'));

    }
    public function marksheet()
    {
        return view('mark.single_student');
    }
    public function semester()
    {
        return view('mark.semester_result');
    }
    public function single_marksheet(Request $request)
    {
        try{
            $id = $request->student_id;
        //dd($id);
        $marks = DB::table('marks')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name')
            ->where('marks.Registration_Number','=',$id)
            ->get();

        $totals = DB::table('marks')
        ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
        ->join('courses', 'marks.course_id', '=', 'courses.id')
        ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name','student_infos.Program')
        ->where('student_infos.Registration_Number','=',$id)
        ->where('marks.grade_letter','!=','F')
        ->distinct()
        ->get();
            
        $res=0;
        $creditsum = 0;
        $cgpa = 0;
        foreach ($totals as $mark) {
            $credit = $mark->course_credit;
            $point = $mark->grade_point;
            $res = $res+($credit*$point);
            $creditsum = $creditsum+$credit;
            if($mark->level='l4t2'){
                $sem = $mark->semester;
                $dep= $mark->Program;
                $name= $mark->Full_Name;
            }
           // echo "<br>".$creditsum;
        }
            
       $cgpa= ($res/$creditsum);
       $total_cgpa =number_format((float)$cgpa, 2,'.',' ');
       $exist = DB::table('results')->where('student_id',$id)->first();
       if(count($exist)>0){
        DB::table('results')
                ->where('student_id', $id)
                ->update(['cgpa' => $total_cgpa,'credit'=>$creditsum]);
       }else{
        DB::table('results')->insert(
            [
                'student_id' => $id,
                'name' => $name,
                'department' => $dep,
                'passing_semester' => $sem,
                'cgpa'=>$total_cgpa,
                'credit'=>$creditsum
            ]
        );
       }
       if($dep =='CSE'||$dep =='CE'||$dep =='EEE' && $creditsum>=154){
        // DB::table('student_infos')
        // ->where('Registration_Number', $id)
        // ->update(['Current_status' => 'graduate','Current_semester'=>'complete']);
       }else if($dep=='LLB'||$dep=='BBA'||$dep=='English'&& $creditsum>=120){
        // DB::table('student_infos')
        // ->where('Registration_Number', $id)
        // ->update(['Current_status' => 'graduate','Current_semester'=>'complete']);
       }
       //return $total_cgpa;
        if(count($marks)>0){
            return view('mark.single_student',compact('marks','name','dept','total_cgpa','creditsum'));
        }
        return redirect()->route('mark.sheet');
        }catch(\Throwable $th){
            return $th->getMessage();
        }
        
    }

    public function semester_marksheet(Request $request)
    {
        $id = $request->student_id;
        //dd($id);
        $level = $request->level;
        $marks = DB::table('marks')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name')
            ->where('marks.Registration_Number','=',$id)
            ->where('marks.level','=',$level)
            ->get();
        if(count($marks)>0){
            return view('mark.semester_result',compact('marks'));
        }
        return redirect()->route('mark.sheet');
        
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters= $this->semesters;
        $courses = Course::select('id','course_code','course_name','Program')->get();
        //return $courses;
        return view('mark.create',compact('courses','semesters')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'Registration_Number'=>'required',
                'course_id'=>'required',
                'grade_letter'=>'required',
                'grade_point'=>'required',
                'course_credit'=>'required',
                'level'=>'required',
                'semester'=>'required',
                'academic_year'=>'required',
                'course_status'=>'required',
            ]);
        
        $mark = new Mark();
        $mark->Registration_Number=$request->Registration_Number;
        $mark->course_id=$request->course_id;
        $mark->grade_letter=$request->grade_letter;
        $mark->grade_point=$request->grade_point;
        $mark->course_credit =$request->course_credit;
        $mark->level=$request->level;
        $mark->semester=$request->semester;
        $mark->academic_year=$request->academic_year;
        $mark->course_status=$request->course_status;
        $mark->save();
        $notification= array('title' => 'Data Saved', 'body' => "Marks Save Successfully");
        return redirect()->route('mark.create')->with("success",$notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = Mark::find($id);
        $course_id = $mark->course_id;
        $course = Course::find($course_id);
       // return $mark;
        return view('mark.edit',compact('mark','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $mark = Mark::find($id);
        $mark->Registration_Number=$request->Registration_Number;
        $mark->course_id=$request->course_id;
        $mark->grade_letter=$request->grade_letter;
        $mark->grade_point=$request->grade_point;
        $mark->course_credit=$request->course_credit;
        $mark->level=$request->level;
        $mark->academic_year=$request->academic_year;
        $mark->semester=$request->semester;
        $mark->course_status=$request->course_status;
        $mark->save();
        $notification= array('title' => 'Data Update', 'body' => 'Fail Student data updated Succesfully.');
        return redirect()->route('mark.index')->with('success',$notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Mark::find($id);
        $mark->delete();
        return redirect()->back();
    }
      public function Student(Request $request)
    {
        $id = $request->input('student_id');
        $student = StudentInfo::where('Registration_Number',$id)->first();
        return view('mark.show',['student'=>$student]);
        
    }
}

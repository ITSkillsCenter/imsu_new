<?php

namespace App\Http\Controllers;

use App\Mark;
use App\StudentInfo;
use Illuminate\Http\Request;
use DB;

class AcademicTranscriptController extends Controller
{
    public function show()
    {
    	return view('academic.show');
    }
    public function transcript(Request $request)
    {
        $student_id =$request->student_id;
        $serial_no =$request->serial_no;
        $id = $student_id;
        $result_publish = $request->result_publish;
        $duration_program = $request->duration_program;
        $complete_degree = $request->complete_degree;
        $pvc =$request->ispvc;
        $major = $request->major;
        $cdate= date_create($complete_degree);
        $prodate= date_format($cdate,"F Y"); 
        $transdate= date_format($cdate,"d F Y"); 
        $publish= date_create($result_publish); 
        $publish_result= date_format($publish,"d F Y"); 
        //return $publish_result;


       $l1t1s = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','l1t1')
            ->orderBy('courses.course_code', 'asc')
            ->get();


       $l1t2s = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','l1t2')
            ->orderBy('courses.course_code', 'asc')
            ->get();
        //return $l1t2s;

      $l2t1s = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','l2t1')
            ->orderBy('courses.course_code', 'asc')
            ->get();
           // return $l2t1s;

     $l2t2s = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','l2t2')
            ->orderBy('courses.course_code', 'asc')
            ->get();

    $l3t1s = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','l3t1')
            ->orderBy('courses.course_code', 'asc')
            ->get();
           // return $l3t1s;
    $l3t2s = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','l3t2')
            ->orderBy('courses.course_code', 'asc')
            ->get();
            //return $l3t2s;

     $l4t1s = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','l4t1')
            ->orderBy('courses.course_code', 'asc')
            ->get();
            //return $l4t1s;

        $l4t2s = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','l4t2')
            ->orderBy('courses.course_code', 'asc')
            ->get();
            //only for BBA
        $acs = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','ac')
            ->orderBy('courses.course_code', 'asc')
            ->get();
            
        $totals = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
           // ->where('marks.grade_letter','!=','F')
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
               // echo "<br>".$creditsum;
            }
            //return $creditsum;
           $cgpa= ($res/$creditsum);
           $total_cgpa =number_format((float)$cgpa, 2,'.',' ');
           //return $total_cgpa;
           if($pvc =="1"){

            return view('academic.provisionalcrt',[
                'id'=>$id,
                'total_cgpa'=>$total_cgpa, 
                'publish_result'=>$publish_result,
                'complete_degree'=>$prodate,
                'issue_date'=>$transdate,
                'l1t1s'=>$l1t1s,
                'l4t2s'=>$l4t2s,
                'serial_no'=>$serial_no,
                'major'=>$major,
                
            ]);
           }


           return view('mark.transcript',[
            'l1t1s'=>$l1t1s,
            'l1t2s'=>$l1t2s,
            'l2t1s'=>$l2t1s,
            'l2t2s'=>$l2t2s,
            'l3t1s'=>$l3t1s,
            'l3t2s'=>$l3t2s, 
            'l4t1s'=>$l4t1s,
            'l4t2s'=>$l4t2s,
            'total_cgpa'=>$total_cgpa, 
            'degree_award'=>$degree_award, 
            'duration_program'=>$duration_program, 
            'complete_degree'=>$transdate,
            'major'=>$major,
            'acs'=>$acs,
            'serial_no'=>$serial_no,
        ]);
    }

    public function pro_show()
    {
    	return view('academic.pro_show');
    }
    public function pro_save()
    {
    	return view('academic.provisionalcrt');
    }
    public function new_transcript(Request $request)
    {
        $student_id =$request->student_id;
        $serial_no =$request->serial_no;
        $id = $student_id;
        $result_publish = $request->result_publish;
        $duration_program = $request->duration_program;
        $complete_degree = $request->complete_degree;
        $pvc =$request->ispvc;
        $major = $request->major;
        $cdate= date_create($complete_degree);
        $prodate= date_format($cdate,"F Y"); 
        $transdate= date_format($cdate,"d F Y"); 
        $publish= date_create($result_publish); 
        $publish_result= date_format($publish,"d F Y"); 
        
        $std= DB::table('student_infos')->where('Registration_Number',$id)->first();

       $marks = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->orderBy('courses.course_code', 'asc')
            ->get();
     //return $marks;
    $non_marks = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit','courses.order_id', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','!=','ac')
            ->orderBy('courses.order_id', 'asc')
            ->orderBy('courses.id', 'asc')
            ->get();
    $ac_marks = DB::table('marks')
            ->join('student_infos', 'marks.Registration_Number', '=', 'student_infos.Registration_Number')
            ->join('courses', 'marks.course_id', '=', 'courses.id')
            ->select('marks.*', 'courses.course_code','courses.credit', 'courses.course_name','student_infos.Full_Name')
            ->where('student_infos.Registration_Number','=',$id)
            ->where('marks.level','=','ac')
            ->orderBy('courses.course_name', 'asc')
            ->orderBy('marks.course_id', 'asc')
            ->get();
         
        
        $tcredit=0;$tpoint=0;$res = 0;
        foreach($marks as $mark){
            $credit=$mark->course_credit;
            $tcredit=$tcredit+$mark->course_credit;
            
            $point=$mark->grade_point;
            $res = $res+($credit*$point);
        }
        $total_cgpa=$res/$tcredit;
       
 //dd(reset($semesters)->semester);
 //dd($semesters[count($semesters)-1]->semester);

    //  dd('trans');
       
           
           if($std->Program=='CSE'){
            $semesters_1=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->limit(2)->get()->toArray();
            $semesters_2=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(2)->limit(4)->get()->toArray();
            $semesters_3=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(6)->limit(4)->get()->toArray();
            $semesters_4=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(10)->limit(2)->get()->toArray();
            //return $semesters_3;
             $this->resultUpload($request,$std,$total_cgpa,$tcredit,$semesters_1,$semesters_2,$semesters_3,$semesters_4);
            if($pvc =="1"){

                return view('academic.provisionalcrt_new',[
                    'id'=>$id,
                    'total_cgpa'=>number_format((float)$total_cgpa , 2, '.', ''), 
                    'publish_result'=>$publish_result,
                    'complete_degree'=>$prodate,
                    'issue_date'=>$transdate,
                    'semesters_1'=>$semesters_1,
                    'semesters_2'=>$semesters_2,
                    'semesters_3'=>$semesters_3,
                    'serial_no'=>$serial_no,
                    'major'=>$major,
                    
                    
                ]);
               }

            return view('mark.transcript_engineer',[
                'marks'=>$marks,
                'semesters_1'=>$semesters_1,
                'semesters_2'=>$semesters_2,
                'semesters_3'=>$semesters_3,
                'semesters_4'=>$semesters_4,
                'serial_no'=>$serial_no,
                'std'=>$std,
                'duration_program'=>$duration_program,
                'total_cgpa'=>number_format((float)$total_cgpa , 2, '.', ''),
                'tcredit'=>$tcredit,
                'major'=>$major,
                'complete_degree'=>$transdate,
            ]);
        }elseif($std->Program=='EEE'){
            $semesters_1=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->limit(2)->get()->toArray();
            $semesters_2=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(2)->limit(4)->get()->toArray();
            $semesters_3=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(6)->limit(4)->get()->toArray();
            $semesters_4=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(10)->limit(2)->get()->toArray();
            //return $semesters_4;
             $this->resultUpload($request,$std,$total_cgpa,$tcredit,$semesters_1,$semesters_2,$semesters_3,$semesters_4);
            if($pvc =="1"){

                return view('academic.provisionalcrt_new',[
                    'id'=>$id,
                    'total_cgpa'=>number_format((float)$total_cgpa , 2, '.', ''), 
                    'publish_result'=>$publish_result,
                    'complete_degree'=>$prodate,
                    'issue_date'=>$transdate,
                    'semesters_1'=>$semesters_1,
                    'semesters_2'=>$semesters_2,
                    'semesters_3'=>$semesters_3,
                    'semesters_4'=>$semesters_4,
                    'serial_no'=>$serial_no,
                    'major'=>$major,
                    
                    
                ]);
               }

            return view('mark.transcript_engineer',[
                'marks'=>$marks,
                'semesters_1'=>$semesters_1,
                'semesters_2'=>$semesters_2,
                'semesters_3'=>$semesters_3,
                'semesters_4'=>$semesters_4,
                'serial_no'=>$serial_no,
                'std'=>$std,
                'duration_program'=>$duration_program,
                'total_cgpa'=>number_format((float)$total_cgpa , 2, '.', ''),
                'tcredit'=>$tcredit,
                'major'=>$major,
                'complete_degree'=>$transdate,
            ]);
        }elseif($std->Program=='CE'){
            $semesters_1=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->limit(2)->get()->toArray();
            $semesters_2=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(2)->limit(4)->get()->toArray();
            $semesters_3=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(6)->limit(4)->get()->toArray();
            $semesters_4=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(10)->limit(2)->get()->toArray();
            //return $semesters_1;
            
            $this->resultUpload($request,$std,$total_cgpa,$tcredit,$semesters_1,$semesters_2,$semesters_3,$semesters_4);
            
            if($pvc =="1"){

                return view('academic.provisionalcrt_new',[
                    'id'=>$id,
                    'total_cgpa'=>number_format((float)$total_cgpa , 2, '.', ''), 
                    'publish_result'=>$publish_result,
                    'complete_degree'=>$prodate,
                    'issue_date'=>$transdate,
                    'semesters_1'=>$semesters_1,
                    'semesters_2'=>$semesters_2,
                    'semesters_3'=>$semesters_3,
                    'serial_no'=>$serial_no,
                    'major'=>$major,
                    
                    
                ]);
               }

            return view('mark.transcript_engineer',[
                'marks'=>$marks,
                'semesters_1'=>$semesters_1,
                'semesters_2'=>$semesters_2,
                'semesters_3'=>$semesters_3,
                'semesters_4'=>$semesters_4,
                'serial_no'=>$serial_no,
                'std'=>$std,
                'duration_program'=>$duration_program,
                'total_cgpa'=>number_format((float)$total_cgpa , 2, '.', ''),
                'tcredit'=>$tcredit,
                'major'=>$major,
                'complete_degree'=>$transdate,
            ]);
        }else{
            $semesters_1=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->limit(4)->get()->toArray();
            $semesters_2=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->offset(4)->limit(4)->get()->toArray();
            $semesters_3=DB::table('marks')->select('semester')->where('Registration_Number',$id)->distinct()->orderby('academic_year','asc')->orderby('semester','desc')->offset(8)->limit(4)->get()->toArray();
            //return $semesters_1;
            $this->resultUpload($request,$std,$total_cgpa,$tcredit,$semesters_1,$semesters_2,$semesters_3);
            
            if($pvc =="1"){

                return view('academic.provisionalcrt_new',[
                    'id'=>$id,
                    'total_cgpa'=>number_format((float)$total_cgpa , 2, '.', ''), 
                    'publish_result'=>$publish_result,
                    'complete_degree'=>$prodate,
                    'issue_date'=>$transdate,
                    'semesters_1'=>$semesters_1,
                    'semesters_2'=>$semesters_2,
                    'semesters_3'=>$semesters_3,
                    'serial_no'=>$serial_no,
                    'major'=>$major,
                    
                    
                ]);
               }
            return view('mark.transcript_nonengineer',[
                'marks'=>$non_marks,
                'ac_marks'=>$ac_marks,
                'semesters_1'=>$semesters_1,
                'semesters_2'=>$semesters_2,
                'semesters_3'=>$semesters_3,
                'serial_no'=>$serial_no,
                'std'=>$std,
                'duration_program'=>$duration_program,
                'total_cgpa'=>number_format((float)$total_cgpa , 2, '.', ''),
                'tcredit'=>$tcredit,
                'major'=>$major,
                'complete_degree'=>$transdate,
            ]);
        }

    }
    
    private function resultUpload($request,$std,$total_cgpa,$creditsum,$semesters_1,$semesters_2,$semesters_3,$semesters_4=null)
    {
        $student_id =$request->student_id;
        $serial_no =$request->serial_no;
        $id = $student_id;
        $complete_degree = $request->complete_degree;
         $enroll_semester= reset($semesters_1)->semester; 
            if(count($semesters_4)>0){
                $passing_semester= end($semesters_4)->semester;
            } else if(count($semesters_3)>0){
                $passing_semester= end($semesters_3)->semester;
            } else{
                $passing_semester= end($semesters_2)->semester;
            }
             
            //return $enroll_semester.' to '.$passing_semester;
        
         $exist = DB::table('results')->where('student_id',$id)->first();
         //dd($exist);
           if(count($exist)>0){
            DB::table('results')
                    ->where('student_id', $id)
                    ->update(['cgpa' => $total_cgpa,'credit'=>$creditsum,'enroll_semester' => $enroll_semester,'passing_semester' => $passing_semester]);
           }else{
               if(count($std)>0){
                    DB::table('results')->insert(
                    [
                        'student_id' => $id,
                        'name' => $std->Full_Name,
                        'department' => $std->Program,
                        'enroll_semester' => $enroll_semester,
                        'passing_semester' => $passing_semester,
                        'cgpa'=>$total_cgpa,
                        'credit'=>$creditsum
                    ]
                );
               }
           }
            
               
            
           
    }
    
}
 
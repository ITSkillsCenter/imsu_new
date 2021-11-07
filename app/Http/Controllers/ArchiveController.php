<?php

namespace App\Http\Controllers;

use App\Archive;

use App\StudentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archives=Archive::all();
        $departments = StudentInfo::select('Program')->distinct()->get();
        return view('archive.index',compact('archives','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archive.create');
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
            'student_id'=>'required|unique:archives|max:7',
            'transcript'=>'required|mimes:pdf',
            'pvc' => 'required',
            'status' => 'required',
        ]);
        
        $transcript = $request->file('transcript');
        $pvc = $request->file('pvc');
        if(file_exists($transcript)){
            $transcriptUrl = $this->transcriptExistStatus($request);  
            }else{
                $transcriptUrl='public/AcademicTranscript/transcript.pdf';
            }
        if(file_exists($pvc)){
                $pvcUrl = $this->pvcExistStatus($request);  
                }else{
                    $pvcUrl='public/AcademicPvc/transcript.pdf';
                }
            
        $archive = new Archive();
        $archive->student_id=$request->student_id;
        $archive->transcript=$transcriptUrl;
        $archive->pvc=$pvcUrl;
        $archive->status=$request->status;
        $archive->remarks=$request->remarks;
        $archive->save();       
        $notification= array('title' => 'Data Saved', 'body' => "Archive Info Save Successfully");
            return redirect()->route('archive.index')->with("success",$notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show($dept)
    {
        $departments = StudentInfo::select('Program')->distinct()->get();
        $archives = DB::table('archives')
                ->join('student_infos', 'archives.student_id', '=', 'student_infos.Registration_Number')
                ->select('archives.*', 'student_infos.Full_Name','student_infos.Program')
                ->where('student_infos.Program',$dept)
                ->get();
              //  return $archives;
        return view('archive.index',compact('archives','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $student= Archive::find($id);
        return view('archive.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $archive =  Archive::find($id);
        $transcript = $request->file('transcript');
        $pvc = $request->file('pvc');
        if(file_exists($transcript)){
            
            $transcriptUrl = $this->transcriptExistStatus($request);  
            }else{
                $transcriptUrl=$archive->transcript;
            }
        
        if(file_exists($pvc)){
                $pvcUrl = $this->pvcExistStatus($request);  
                }else{
                    $pvcUrl=$archive->pvc;
                }
        
        $archive->student_id=$request->student_id;
        $archive->transcript=$transcriptUrl;
        $archive->pvc=$pvcUrl;
        $archive->status=$request->status;
        $archive->remarks=$request->remarks;
        $archive->save();       
        $notification= array('title' => 'Data Saved', 'body' => "Archive Info Updated Successfully");
            return redirect()->route('archive.index')->with("success",$notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        //
    }



    private function transcriptExistStatus($request) {
        $studentId = Archive::where('student_id', $request->student_id)->first();
        $transcript = $request->file('transcript');
      
        if ($transcript) {
            unlink($studentId->transcript);
            
            $name = $transcript->getClientOriginalName();
            $uploadPath = 'public/AcademicTranscript/';
            $transcript->move($uploadPath, $name);
            $transcriptUrl = $uploadPath.$name;
           
        } else {
            
            $transcriptUrl = $studentId->transcript;
            
        }
        return $transcriptUrl;
    }

    private function pvcExistStatus($request) {
        $studentId = Archive::where('student_id', $request->student_id)->first();
        $pvc = $request->file('pvc');
        if ($pvc) {
            unlink($studentId->pvc);
            
            $name = $pvc->getClientOriginalName();
            $uploadPath = 'public/AcademicPvc/';
            $pvc->move($uploadPath, $name);
            $pvcUrl = $uploadPath.$name;
           
        } else {
            
            $pvcUrl = $studentId->pvc;
            
        }
        return $pvcUrl;
    }
}

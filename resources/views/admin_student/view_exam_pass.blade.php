@extends('admin_student.layout')
@section('content')
@php
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;
@endphp

<div class="row">
    <div class="col-lg-12">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Exam Pass'])
    </div>
    <div class="col-lg-6">
        <a href="/generate-exam-pass" class="btn btn-primary submit_form">Back</a>
        <button class="btn btn-primary submit_form">Print</button>
    </div>

    <div class="col-sm-12 col-md-12" id="preview_exam_pass">
        <div class="card card-stats card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-sm-12 text-center" style="border-bottom: 7px solid #3db166;">
                        <img src="/homepage/upload/logo.png" style="margin: auto; margin-bottom:20px" height="60" alt="logo">
                        <span style="padding-left:10px; font-size: 35px; color:green">IMO STATE UNIVERSITY, OWERRI</span>
                    </div>
                    <div class="col-lg-12" style="display:flex; border-bottom: 1px solid purple;">
                        <div class="col-lg-10">
                            <div class="col-lg-12 mt-3" style="background-color: purple; color: white; padding: 1px 10px; ">
                                <h3>Session: <strong>{{Helper::get_session($session)}}</strong></h3>
                                <h3>Semester: <strong>{{$semester}} Semester</strong></h3>
                            </div>

                            <h1 style="color: green;"><b>COURSE REGISTRATION & EXAM CARD</b></h1>
                        </div>
                        <div class="col-lg-2" style="margin-top: 10px;">
                            <div class="text-center" style="border: 1px solid purple;">
                                <img alt="image" class="img-circle m-t-xs img-responsive" height="100" src="/profile_images/{{$student->Photo}}">

                            </div>
                        </div>
                    </div>

                    <div class="row col-lg-10" style="padding: 15px 30px;">
                        <div class="col-lg-4">
                            <div class="mt-2"><span style="color:green; border: 1px solid purple; padding:3px">Name: </span><strong>&nbsp; {{$student->first_name . ' ' . $student->last_name}}</strong></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-2"><span style="color:green; border: 1px solid purple; padding:3px">Matric Number: </span><strong>&nbsp; {{$student->matric_number}}</strong></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-2"><span style="color:green; border: 1px solid purple; padding:3px">Level: </span><strong>&nbsp; {{$student->level}}</strong></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-3"><span style="color:green; border: 1px solid purple; padding:3px">Faculty: </span><strong>&nbsp; {{Helper::get_faculty($student->faculty_id)->name}}</strong></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-3"><span style="color:green; border: 1px solid purple; padding:3px">Department: </span><strong>&nbsp;&nbsp; {{Helper::get_department($student->dept_id)->name}}</strong></div>
                        </div>

                        <div class="col-lg-12 mt-4" style="display: flex;">
                            <div style="color: white; background:green; padding:5px; width:60%">COURSES REGISTERED</div>
                            <span class="" style="border-bottom: 3px solid green; width:40%;position: relative;top: -13px; "></span>
                        </div>

                    </div>

                    <div class="col-lg-2 text-left">
                        {{-- {!!FacadesQrCode::size(200)->generate($student->matric_number)!!} --}}

                        {{-- <img class="" src="data:image/png;base64, {!! base64_encode(FacadesQrCode::format('png')->size(170)->generate($student->matric_number)) !!} "> --}}
                    </div>

                    <div class="col-lg-12">
                        <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                            @if(count($reg_courses)>0)
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Name</th>
                                        <th>Course Code</th>
                                        <th>Unit</th>
                                        <th>Date & TIme</th>
                                        <th>Cleared By <br>(Name and Signature)</th>

                                    </tr>
                                </thead>
                                <tbody id="">
                                    @if(count($reg_courses)>0)
                                    @php $sn = 1; $count = 0; @endphp
                                    @foreach($reg_courses as $course)
                                    <tr>
                                        @php $count = $course->unit + $count; @endphp

                                        <td>{{$sn++}}</td>
                                        <td>{{$course->course_name}}</td>
                                        <td>{{$course->course_code}}</td>
                                        <td>{{$course->unit}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right text-success">Total Unit:</td>
                                        <td class="text-success" style="font-weight:1000;">{{$count}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            @else
                            <div class="alert alert-primary text-center">You have not registered any courses yet!</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col-lg-12 text-center" style="color: green;"><br> INSTRUCTIONS TO STUDENTS</div>
                        <div class="col-lg-12" style="padding:15px; border: 1px solid black">
                            <span style="color: red;">Note: </span>Take this exam card to the exam hall, 
                            as you will be required to present this card for clearance before you'll be allowed to write any exam in the university
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-lg-12 text-center" style="color: green;"><br>FOR OFFICIAL USE ONLY</div>
                        <div class="col-lg-12">
                            <p>Comment: <span style="width: 20em;display: block; margin: -5px 71px;height: 1px;background-color: #4b4b4d;"></span></p>
                            <p>Name: <span style="width: 20em;display: block; margin: -5px 71px;height: 1px;background-color: #4b4b4d;"></span></p>
                            <p>Signature: <span style="width: 20em;display: block; margin: -5px 71px;height: 1px;background-color: #4b4b4d;"></span></p>
                            <p>Date: <span style="width: 20em;display: block; margin: -5px 71px;height: 1px;background-color: #4b4b4d;"></span></p>
                            <p>Designation: <span style="width: 20em;display: block; margin: -5px 71px;height: 1px;background-color: #4b4b4d;"></span></p>
                        </div>
                    </div>

                    <!-- <div class="col-lg-6">

                        <img src="/homepage/upload/signature.jpg" style="margin: auto; margin-bottom:20px" height="30" alt="logo"> <br>
                        (Registrar)

                    </div> -->

                    <!-- <div class="col-sm-7" style="margin-top: 10px;">
                        <h3>Name: <strong>{{$student->first_name . ' ' . $student->last_name}}</strong></h3>
                        <h3>Faculty: <strong>{{Helper::get_faculty($student->faculty_id)->name}}</strong></h3>
                        <h3>Department: <strong>{{Helper::get_department($student->dept_id)->name}}</strong></h3>
                        <h3>Year: <strong>{{$student->Batch}}</strong></h3>
                        <h3>Session: <strong>{{Helper::get_current_semester()}}</strong></h3>

                    </div> -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    .table td, .table th {
   
    height: 30px;
}
</style>
<script>
    $('.submit_form').click(function() {
        var element = document.getElementById('preview_exam_pass');
        // console.log(element);
        var opt = {
            filename: 'Exam_Pass.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
        };
        html2pdf(element, opt)
    })
</script>
@endsection
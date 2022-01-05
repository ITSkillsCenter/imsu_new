@extends('admin_student.layout')
@section('title')
Student || Clearance
@endsection
@section('content')
@include('layouts.includes.crumbMenuStudent',['pageTitle'=>'Clearance', 'pageLink' => '/student-clearance','Title'=>'General Information'])
<div class="row">
    <div class="col-lg-12">
        @include('homepage.flash_message')
    </div>

    <div class="card col-lg-12">
        <div class="card-header">
            <div class="card-title">General Information</div>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>FACULTY CLEARANCE <br> Are you indebted to the faculty? If yes, specify</label>
                            <div class="row col-lg-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="faculty[status]" {{$answers['faculty']['status'] == 'yes'? 'checked': ''}} value="yes" required>Yes
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="faculty[status]" {{$answers['faculty']['status'] == 'no'? 'checked': ''}} value="no">No
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="faculty[reason]" value="{{$answers['faculty']['reason']}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>LIBRARY CLEARANCE <br> Are you indebted to the library? If yes, specify</label>
                            <div class="row col-lg-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="library[status]" {{$answers['library']['status'] == 'yes'? 'checked': ''}} value="yes" required>Yes
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="library[status]" {{$answers['library']['status'] == 'no'? 'checked': ''}} value="no">No
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="library[reason]" value="{{$answers['library']['reason']}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>STUDENT AFFAIRS CLEARANCE <br> Are you indebted to the student affairs? If yes, specify</label>
                            <div class="row col-lg-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="student_affairs[status]" {{$answers['student_affairs']['status'] == 'yes'? 'checked': ''}} value="yes" required>Yes
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="student_affairs[status]" {{$answers['student_affairs']['status'] == 'no'? 'checked': ''}} value="no">No
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="student_affairs[reason]" value="{{$answers['student_affairs']['reason']}}">
                        </div>
                    </div>

                    <div class="col-lg-12" style="padding-left: 25px;"><br> <b>SPORTS CLEARANCE </b></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Are you indebted to the university sport unit? If yes, specify</label>
                            <div class="row col-lg-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sport[status]" {{$answers['sport']['status'] == 'yes'? 'checked': ''}} value="yes" required>Yes
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sport[status]" {{$answers['sport']['status'] == 'no'? 'checked': ''}} value="no">No
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="sport[reason]" value="{{$answers['sport']['reason']}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Have you ever damaged any sport facility of the university? If yes, specify</label>
                            <div class="row col-lg-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sport2[status]" {{$answers['sport2']['status'] == 'yes'? 'checked': ''}} value="yes" required>Yes
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sport2[status]" {{$answers['sport2']['status'] == 'no'? 'checked': ''}} value="no">No
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="sport2[reason]" value="{{$answers['sport2']['reason']}}">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>SECURITY CLEARANCE <br> Have you had any security issue/problem in the university? If yes, specify</label>
                            <div class="row col-lg-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="security[status]" {{$answers['security']['status'] == 'yes'? 'checked': ''}} value="yes" required>Yes
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="security[status]" {{$answers['security']['status'] == 'no'? 'checked': ''}} value="no">No
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="security[reason]" value="{{$answers['security']['reason']}}">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>MEDICAL CLEARANCE <br> Are you indebted to the medical center of the university? If yes, specify</label>
                            <div class="row col-lg-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="medical[status]" {{$answers['medical']['status'] == 'yes'? 'checked': ''}} value="yes" required>Yes
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="medical[status]" {{$answers['medical']['status'] == 'no'? 'checked': ''}} value="no">No
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="medical[reason]" value="{{$answers['medical']['reason']}}">
                        </div>
                    </div>

                    <div class="col-lg-12" style="padding-left: 25px;"><br> <b>ADVANCEMENT AND ALUMNI CENTER </b></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Were you a Student Union Executive? If yes what position did you hold?</label>
                            <div class="row col-lg-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="alumni[status]" {{$answers['alumni']['status'] == 'yes'? 'checked': ''}} value="yes" required>Yes
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="alumni[status]" {{$answers['alumni']['status'] == 'no'? 'checked': ''}} value="no">No
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="alumni[reason]" value="{{$answers['alumni']['reason']}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Which academic session?</label>
                            <input type="text" class="form-control" placeholder="" name="alumni[session]" value="{{$answers['alumni']['session']}}" required>
                        </div>
                    </div>

                    




                </div>
                @csrf
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <a href="/student-clearance" class="btn btn-danger">Return</a>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
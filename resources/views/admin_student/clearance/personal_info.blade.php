@extends('admin_student.layout')
@section('title')
Student || Clearance
@endsection
@section('content')
@include('layouts.includes.crumbMenuStudent',['pageTitle'=>'Clearance', 'pageLink' => '/student-clearance','Title'=>'Personal Information'])
<div class="row">
    <div class="col-lg-12">
        @include('homepage.flash_message')
    </div>
    <div class="card col-lg-12">
        <div class="card-header">
            <div class="card-title">Pesonal Information</div>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <p>{{$std->first_name}}</p>
                            <!-- <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{$std->first_name}}"> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <p>{{$std->last_name}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Last Name" name="last_name"> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <p>{{$std->middle_name}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Middle Name" name="middle_name"> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Matric Number</label>
                            <p>{{$std->matric_number}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Matric Number" name="matric_number"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Faculty</label>
                            <p>{{Helper::get_faculty($std->faculty_id)->name}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Faculty" name="faculty"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Department</label>
                            <p>{{Helper::get_department($std->dept_id)->name}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Department" name="department"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <p>{{$std->date_of_birth}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Date of Borth" name="date_of_birth"> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <p>{{$std->Student_Mobile_Number}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Mobile Number" name="Student_Phone_Number"> -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Email</label>
                            <p>{{$std->Email_Address}}</p>
                            <!-- <input type="email" class="form-control" placeholder="Email Address" name="Email_Address"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Gender</label>
                            <p>{{$std->gender}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Gender" name="gender"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nationality</label>
                            <p>{{$std->nationality}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Nationality" name="nationality"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>State of origin</label>
                            <p>{{$std->state_of_origin}}</p>
                            <!-- <input type="text" class="form-control" placeholder="State of origin" name="state_of_origin"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Lga</label>
                            <p>{{$std->lga}}</p>
                            <!-- <input type="text" class="form-control" placeholder="Lga" name="lga"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select name="blood_group" class="form-control" id="">
                                <option value="{{$std->blood_group}}">{{$std->blood_group}}</option>
                                <option value="">Blood Group</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A-">A-</option>
                                <option value="A+">A+</option>
                                <option value="B-">B-</option>
                                <option value="B+">B+</option>
                                <option value="AB">AB</option>
                            </select>
                            <!-- <input type="text" class="form-control" placeholder="Blood Group" name="blood_group"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Marital status</label>
                            <select name="marital_status" class="form-control" id="">
                                <option value="{{$std->marital_status}}">{{ucfirst($std->marital_status)}}</option>
                                <option value="">Marital Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorce">Divorced</option>
                            </select>
                            <!-- <input type="text" class="form-control" placeholder="Marital status" name="marital_status"> -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Father's Name</label>
                            <input type="text" class="form-control" placeholder="Father's Name" name="fathers_name" value="{{$std->fathers_name}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Father's Number</label>
                            <input type="text" class="form-control" placeholder="Father's Number" name="fathers_phone" value="{{$std->fathers_phone}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Mother's Name</label>
                            <input type="text" class="form-control" placeholder="Mother's Name" name="mothers_name" value="{{$std->mothers_name}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Mother's Number</label>
                            <input type="text" class="form-control" placeholder="Mother's Number" name="mothers_phone" value="{{$std->mothers_phone}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Guardian's Name</label>
                            <input type="text" class="form-control" placeholder="Guardians's Name" name="guardians_name" value="{{$std->guardians_name}}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Guardian's Number</label>
                            <input type="text" class="form-control" placeholder="Guardians's Number" name="guardians_name" value="{{$std->guardians_phone}}">
                        </div>
                    </div>



                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Year of Graduation</label>
                            <select name="Passing_Batch" class="form-control" id="">
                                    @if($std->Passing_Batch !== null)
                                    <option value="{{$std->Passing_Batch}}">{{$std->Passing_Batch}}</option>
                                    @endif
                                    @for($i=2010;$i <= 2030; $i++) 
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                            </select>
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
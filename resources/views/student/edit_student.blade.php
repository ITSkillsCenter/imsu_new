@extends('layouts.master',['title'=>'Create Student'])


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Manage Student','Title'=>'Student'])

        <div class="row">
            <div class="col-md-12">
                @include('homepage.flash_message')
                <form method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Academic Information</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-row">

                                        <!--enrolled semester-->
                                        <div class="form-group col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                            <label for="Enrollment_Semester">Enrollment Semester: <span class="text-danger">*</span></label>
                                            <select name="Enrollment_Semester" class="form-control has-feedback-left"
                                                required>
                                                @foreach ($semesters as $s)
                                                    <option value="{{ $s->title }}">{{ $s->title }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="Enrollment_Semester"
                                                class="text-danger">{{ $errors->first('Enrollment_Semester') }}</span>
                                        </div>
                                        <!--registration-->
                                       <div class="form-group col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                            <label for="registration_number">Registration Number: <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="registration_number"
                                                class="form-control has-feedback-left" name="registration_number"
                                                placeholder="1101031" value="{{ $student->registration_number }}" required />
                                            {{-- <i class="fa fa-child form-control-feedback left" ></i> --}}
                                            <span id="registration_number"
                                                class="text-danger">{{ $errors->first('registration_number') }}</span>
                                        </div> 
                                        <!--batch-->
                                        <div class="form-group col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                            <label for="Batch">Matric Number: <span class="text-danger">*</span></label>
                                            <input type="text" id="matric_number"
                                                class="form-control has-feedback-left" name="matric_number"
                                                placeholder="14/234234" value="{{ $student->matric_number }}"  required />
                                            {{-- <i class="fa fa-info form-control-feedback left" ></i> --}}
                                            <span id="msg_bncReg" class="text-danger">{{ $errors->first('matric_number') }}</span>
                                        </div>
                                        <!--program-->
                                        <div class="form-group col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                            <label for="Program">Faculty: <span class="text-danger">*</span></label>
                                            <select name="faculty_id" id="faculty" class="form-control has-feedback-left"
                                                required>
                                                @foreach ($faculty as $s)
                                                    <option {{ $student->faculty_id == $s->id ? 'selected': ''  }} value="{{ $s->id }}">{{ $s->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_faculty"
                                                class="text-danger">{{ $errors->first('faculty') }}</span>
                                        </div>

                                       <div class="form-group col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                            <label for="Program">Department: <span class="text-danger">*</span></label>
                                            <select name="dept_id" id="departments" class="form-control has-feedback-left"
                                                required>
                                                @foreach ($dept as $s)
                                                    <option {{ $student->dept_id == $s->id ? 'selected': ''  }} value="{{ $s->id }}">{{ $s->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Program"
                                                class="text-danger">{{ $errors->first('Department') }}</span>
                                        </div>

                                         <div class="form-group col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                            <label for="Program">Level: <span class="text-danger">*</span></label>
                                            <select name="level" id="level" class="form-control has-feedback-left"
                                                required>
                                                <option value="{{$student->level}}" selected>{{$student->level}}</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                                <option value="500">500</option>
                                            </select>
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Program"
                                                class="text-danger">{{ $errors->first('Level') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Student Information --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Student Information</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <!--student information-->
                                    <div class="form-row">
                                        <!--full name-->
                                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                            <label for="last_name">Surname: <span class="text-danger">*</span></label>
                                            <input type="text" id="last_name" value="{{$student->last_name}}"
                                                class="form-control has-feedback-left" name="last_name"
                                                required="required" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_last_name"
                                                class="text-danger">{{ $errors->first('last_name') }}</span>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                            <label for="first_name">First Name: <span class="text-danger">*</span></label>
                                            <input type="text" id="first_name" value="{{$student->first_name}}"
                                                class="form-control has-feedback-left" name="first_name"
                                                required="required" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_first_name"
                                                class="text-danger">{{ $errors->first('first_name') }}</span>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                            <label for="middle_name">Middle Name: </label>
                                            <input type="text" id="middle_name" value="{{$student->middle_name}}"
                                                class="form-control has-feedback-left" name="middle_name" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_middle_name"
                                                class="text-danger">{{ $errors->first('middle_name') }}</span>
                                        </div>

                                        <!--gender-->
                                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                            <label for="Gender">Gender: </label>
                                            <select class="form-control" name="gender" required>
                                                <option {{$student->gender == 'male' || $student->gender == 'm' ? 'selected' : ''}} value="Male">Male</option>
                                                <option {{$student->gender == 'female' || $student->gender == 'f' ? 'selected' : ''}} value="Female">Female</option>
                                            </select>
                                            <span id="msg_Program"
                                                class="text-danger">{{ $errors->first('gender') }}</span>
                                        </div>

                                        <!--f Birth-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="date_of_birth">Date of birth: </label>
                                            <input type="date" name="date_of_birth" id="date_of_birth"
                                                value="{{$student->date_of_birth}}" class="form-control has-feedback-left"
                                                data-inputmask="'mask': '99/99/9999'" placeholder="dd/mm/YYYY">
                                            {{-- <i class="fa fa-calendar form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_date_of_birth"
                                                class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                        </div>

                                        <!--blood group-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="Blood_Group">Blood Group: </label><br>
                                            <select name="blood_group" id="Blood_Group"
                                                class="has-feedback-left form-control">
                                                <option value="{{$student->blood_group}}">{{$student->blood_group}}</option> 
                                                <option value="A+">A+</option> 
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                            {{-- <i class="fa fa-info form-control-feedback left"></i> --}}
                                            <span id="msg_Blood_Group"
                                                class="text-danger">{{ $errors->first('Blood_Group') }}</span>
                                        </div>

                                        <!--student mobile number-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="Student_Mobile_Number">Student Mobile Number: </label>
                                            <input type="text" class="form-control has-feedback-left"
                                                name="Student_Mobile_Number" value="{{$student->Student_Mobile_Number}}" minlength="11" maxlength="11" required/>
                                            {{-- <i class="fa fa-phone form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_session"
                                                class="text-danger">{{ $errors->first('Student_Mobile_Number') }}</span>
                                        </div>

                                        <!--email address-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="Email_Address">Email Address :<span class=""></span></label>
                                            <input type="email" id="Email_Address" class="form-control has-feedback-left"
                                                name="Email_Address" data-parsley-trigger="change" value="{{$student->Email_Address}}" required />
                                            {{-- <i class="fa fa-envelope form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Email_Address"
                                                class="text-danger">{{ $errors->first('Email_Address') }}</span>
                                        </div>

                                        <!--religion-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="Religion">Religion: </label><br>
                                            <select name="religion" id="Religion" class="has-feedback-left form-control"
                                                >
                                                <option value="{{$student->religion}}">{{$student->religion}}</option>
                                                <option value="Cristian">Christian</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddhist">Buddhist</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Religion"
                                                class="text-danger">{{ $errors->first('Religion') }}</span>
                                        </div>


                                        <!--marital status-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="Marital_Status">Marital Status: </label><br>
                                            <select name="marital_status" id="Marital_Status"
                                                class="has-feedback-left form-control" tabindex="-1">
                                                <option value="{{$student->marital_status}}">{{$student->marital_status}}</option>
                                                <option value="Married">Married</option>
                                                <option value="Unmarried">Unmarried</option>

                                            </select>
                                            {{-- <i class="fa fa-info form-control-feedback left"></i> --}}
                                            <span id="msg_bloodgroup"
                                                class="text-danger">{{ $errors->first('Marital_Status') }}</span>
                                        </div>

                                        <!--photograph-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="Photo">Photograph: <span class="text-danger"></span></label>
                                            <input type="file" id="Photo" class="form-control has-feedback-left"
                                                name="Photo">
                                            {{-- <i class="fa fa-file-image-o form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Photo" class="text-danger">{{ $errors->first('Photo') }}</span>
                                        </div>

                                        <!--quota-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="quota">Student Type: </label><br>
                                            <select name="student_type" class="has-feedback-left form-control">
                                                <option value="{{$student->student_type}}">{{$student->student_type}}</option>
                                                <option value="undergraduate">Undergraduate</option>
                                                <option value="postgraduate">PostGraduate</option>
                                                <option value="direct_entry">Direct Entry</option>
                                            </select>
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_student_type"
                                                class="text-danger">{{ $errors->first('student_type') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     {{-- Location Information --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Location Information</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">

                                    <!--geographic information-->
                                    <div class="form-row">

                                        <!--nationality-->
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="Nationality">Nationality:</label>
                                            <select name="nationality" id="quota" class="has-feedback-left form-control"  required>
                                                <option value="{{$student->nationality}}">{{$student->nationality}}</option>
                                                <option value="nigerian">Nigerian</option>
                                                <option value="non-nigerian">Non-Nigerian</option>
                                            </select>
                                            <span id="msg_Nationality"
                                                class="text-danger">{{ $errors->first('Nationality') }}</span>
                                        </div>

                                      
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="">State of Origin: <span class="text-danger">*</span></label>
                                            <select name="state_of_origin" id="state_of_origin" class="form-control" required>
                                               <option value="">State of Origin</option>
                                                @foreach($states as $state)
                                                <option value="{{$state->name}}" {{$student->state_of_origin == $state->name? 'selected' : ''}} data-id="{{$state->id}}">{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                            <span id="msg_Nationality"
                                                class="text-danger">{{ $errors->first('state_of_origin') }}</span>
                                        </div>

                                       
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <label for="Nationality">LGA: <span class="text-danger">*</span></label>
                                            <select name="lga" id="lga" class="form-control" required>
                                               <option value="{{$student->lga}}">{{$student->lga}}</option>
                                            </select>
                                            <span id="msg_Nationality"
                                                class="text-danger">{{ $errors->first('LGA') }}</span>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Student Academic Information --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Parent's Information</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">

                                    <!--student academic information-->
                                    <div class="form-row">

                                        <!--ssc year-->
                                        <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="ssc_year">Father's Name: </label>
                                            <input type="text" value="{{$student->fathers_name}}"
                                                class="form-control has-feedback-left" name="fathers_name" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Full_Name"
                                                class="text-danger">{{ $errors->first('fathers_name') }}</span>
                                        </div>

                                        <!--ssc_gpa-->
                                        <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="fathers_phone">Father's Phone number: </label>
                                            <input type="text" value="{{$student->fathers_phone}}"
                                                class="form-control has-feedback-left" name="fathers_phone" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Full_Name"
                                                class="text-danger">{{ $errors->first('fathers_phone') }}</span>
                                        </div>

                                        <!--hsc_year-->
                                        <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="hsc_year">Mother's Full name: </label>
                                            <input type="text" value="{{$student->mothers_name}}"
                                                class="form-control has-feedback-left" name="mothers_name" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Full_Name"
                                                class="text-danger">{{ $errors->first('mothers_name') }}</span>
                                        </div>

                                        <!--hsc_gpa-->
                                        <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                            <label for="hsc_gpa">Mother's Phone Number </label>
                                            <input type="text" value="{{$student->mothers_phone}}"
                                                class="form-control has-feedback-left" name="mothers_phone" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_Full_Name"
                                                class="text-danger">{{ $errors->first('mothers_phone') }}</span>
                                        </div>

                                         <!--present address-->
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="fathers_address">Father's Residential Address: <span
                                                    class="text-danger"></span>(optional)</label>
                                            <textarea id="fathers_address" 
                                                class="form-control has-feedback-left" name="fathers_address"
                                                data-parsley-trigger="keyup" data-parsley-minlength="20"
                                                data-parsley-maxlength="255"
                                                data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                                data-parsley-validation-threshold="10">{{$student->fathers_address}}</textarea>
                                            <!-- {{-- <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i> --}} -->
                                            <span id="msg_pra"
                                                class="text-danger">{{ $errors->first('fathers_address') }}</span>
                                        </div>

                                        <!--permanent address -->
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="mothers_address">Mother's Residential Address: </label>
                                            <textarea id="mothers_address" 
                                                class="form-control has-feedback-left"
                                                placeholder=""
                                                name="mothers_address">{{$student->mothers_address}}</textarea>
                                            {{-- <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="mothers_address"
                                                class="text-danger">{{ $errors->first('mothers_address') }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Guardian Information --}}
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Guardian Information</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <!--guardian information-->
                                    <div class="form-row">

                                        <!--fathers name-->
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label for="guardians_name">Guardian's Name: </label>
                                            <input type="text" id="guardians_name" value="{{$student->guardians_name}}"
                                                class="form-control has-feedback-left" name="guardians_name" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_guardians_name"
                                                class="text-danger">{{ $errors->first('guardians_name') }}</span>
                                        </div>

                                        <!--fathers profession-->
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label for="Fathers_Profession">Guardian's Phone Number: </label>
                                            <input type="text" id="guardians_phone"
                                                value="{{$student->guardians_phone}}"
                                                class="form-control has-feedback-left" name="guardians_phone" />
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_guardians_phone"
                                                class="text-danger">{{ $errors->first('guardians_phone') }}</span>
                                        </div>
                                        
                                        <!--mothers profession-->
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label for="guardians_relationship">Relationship with student: </label>
                                            <input type="text" id="guardians_relationship"
                                                class="form-control has-feedback-left" name="guardians_relationship" value="{{$student->guardians_relationship}}" />
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_guardians_relationship"
                                                class="text-danger">{{ $errors->first('guardians_relationship') }}</span>
                                        </div>

                                         <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="guardians_address">Guardian's Residential Address: </label>
                                            <textarea id="guardians_address" 
                                                class="form-control has-feedback-left"
                                                placeholder=""
                                                name="guardians_address">{{$student->guardians_address}}</textarea>
                                            {{-- <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="guardians_address"
                                                class="text-danger">{{ $errors->first('motherguardians_addresss_address') }}</span>
                                        </div>

                                        <!--guardian -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="card">
                        <div class="card-header">
                            <div class="card-title">Sponsor Information</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <!--guardian information-->
                                    <div class="form-row">

                                        <!--fathers name-->
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label for="sponsors_name">Sponsor's Name:</label>
                                            <input type="text" id="sponsors_name" value="{{$student->sponsors_name}}"
                                                class="form-control has-feedback-left" name="sponsors_name" />
                                            {{-- <i class="fa fa-user form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_sponsors_name"
                                                class="text-danger">{{ $errors->first('sponsors_name') }}</span>
                                        </div>

                                        <!--fathers profession-->
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label for="Fathers_Profession">Sponsor's Phone Number: </label>
                                            <input type="text" id="sponsors_phone"
                                                value="{{$student->sponsors_phone}}"
                                                class="form-control has-feedback-left" name="sponsors_phone"  />
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_sponsors_phone"
                                                class="text-danger">{{ $errors->first('sponsors_phone') }}</span>
                                        </div>
                                        
                                        <!--mothers profession-->
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <label for="sponsors_relationship">Relationship with student: </label>
                                            <input type="text" id="sponsors_relationship"
                                                class="form-control has-feedback-left" name="sponsors_relationship"  value="{{$student->sponsors_relationship}}"/>
                                            {{-- <i class="fa fa-info form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="msg_sponsors_relationship"
                                                class="text-danger">{{ $errors->first('sponsors_relationship') }}</span>
                                        </div>

                                         <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="sponsors_address">Sponsor's Residential Address: </label>
                                            <textarea id="sponsors_address" 
                                                class="form-control has-feedback-left"
                                                placeholder=""
                                                name="sponsors_address">{{$student->sponsors_address}}</textarea>
                                            {{-- <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="sponsors_address"
                                                class="text-danger">{{ $errors->first('sponsors_address') }}</span>
                                        </div>

                                        <!--guardian -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <!--guardian information-->
                                    <div class="form-row">

                                         <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label for="medical_info">Medical Information: </label>
                                            <textarea id="medical_info" 
                                                class="form-control has-feedback-left"
                                                placeholder=""
                                                name="medical_info">{{$student->medical_info}}</textarea>
                                            {{-- <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i> --}}
                                            <span id="medical_info"
                                                class="text-danger">{{ $errors->first('medical_info') }}</span>
                                        </div>

                                        <!--guardian -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-6 col-md-offset-3 btn-group">
                               <button id="send" type="submit" class="btn btn-success">Update Student</i></button>
                               &nbsp;
                               <a href="{{url()->previous()}}" class="btn btn-info">Return Back</i></a>
                             </div>
                           </div>



                </form>
            </div>
        </div>

    </div>
@endsection

@section('extrascript')
<!-- 
    <script src="{{ URL::asset('assets/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/icheck.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/validator.min.js') }}"></script> -->


    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#state_of_origin').change(function(){
        let state_id = $(this).find(":selected").data('id')
        $('#lga')
            .find('option')
            .remove()
            .end()
            .append('<option value="">Select LGA</option>')
            .val('')
        ;
        $.post('/get_lgas',{state_id}).done(function(response){
            response.body.map((item)=>{
                $('#lga').append(`<option value='${item.name}'>${item.name}</option>`)
            })
        });
    })

    $('#faculty').change(function(){
        alert('asdf');
        let faculty_id = $(this).find(":selected").val()
        $('#departments').find('option').remove().end().append('<option value="">Select department</option>').val('')
        ;
        $.post('/get_departments',{faculty_id}).done(function(response){
            response.body.map((item)=>{
                $('#departments').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })

    $('#departments').change(function(){
        let dept_id = $(this).find(":selected").val()
        $('#department').find('option').remove().end().append('<option value="">Select department</option>').val('')
        $.post('/get_department_options',{dept_id}).done(function(response){
            response.body.map((item)=>{
                $('#department_options').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })
</script>

@endsection

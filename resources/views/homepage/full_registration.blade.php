@extends('layouts.homepage_layout')
@section('content')
<style>
    label{
        color: #3b4b6b;
    }
</style>
<div class="gdlr-core-page-builder-body">

    <div class="gdlr-core-pbf-wrapper" id="div_1dd7_105">
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container ">
                <div class="gdlr-core-course-search-item gdlr-core-item-pdb gdlr-core-item-pdlr ">
                    <form class="gdlr-core-course-form clearfix" method="post" enctype="multipart/form-data">
                        <div class="gdlr-core-pbf-column gdlr-core-column-full">
                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                    <div class="gdlr-core-pbf-element">
                                        <div class="class_style gdlr-core-accordion-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-accordion-style-background-title-icon gdlr-core-left-align gdlr-core-icon-pos-right">
                                            
                                            <div class="gdlr-core-accordion-item-tab clearfix  gdlr-core-active">
                                                <div class="gdlr-core-pbf-element">
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                                                        <div class="gdlr-core-title-item-title-wrap clearfix">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">REGISTRATION Form</h3>
                                                        </div>
                                                        <span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Hello  <b>{{session()->get('student')['first_name']}} {{session()->get('student')['last_name']}}</b>, kindly fill the form below to complete your registration.</span>
                                                        <span><a style="text-decoration: underline;" href="/student-logout">Logout</a></span>
                                                    </div>
                                                    
                                                </div>
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Basic Information (Some Fields Are Not Editable)</h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                                           
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">First Name</label>
                                                                    <input type="text" class="my_input" placeholder="First name" name="first_name" value="{{$student->first_name}}" required/>
                                                                </div>
                                                            </div>
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Middle Name</label>
                                                                    <input type="text" class="my_input" placeholder="Middle name" name="middle_name" value="{{$student->middle_name}}" required />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Last Name</label>
                                                                    <input type="text" class="my_input" placeholder="Last name" name="last_name" value="{{$student->last_name}}" required />
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Email Address</label>
                                                                    <p>{{$student->Email_Address}}</p>
                                                                    <input type="text" class="my_input" placeholder="" name="email_address" value="{{$student->Email_Address}}" hidden/>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Matric Number</label>
                                                                    <p>{{$student->matric_number}}</p>
                                                                    <input type="text" class="my_input" older="Matric Number" name="matric_number" value="{{$student->matric_number}}" hidden/>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Phone Number</label>
                                                                    <p>{{$student->Student_Mobile_Number}}</p>
                                                                    <input type="tel" class="my_input" name="student_mobile_number" value="{{$student->Student_Mobile_Number}}" hidden/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="gdlr-core-accordion-item-tab clearfix">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Personal Information</h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Date of Birth</label>
                                                                    <input type="date" class="my_input" placeholder="Date of Birth" name="date_of_birth" value="" required/>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                    <label for="">Gender</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="gender" required>
                                                                            <option value="">Gender</option>
                                                                            <option value="male">Male</option>
                                                                            <option value="female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                    <label for="">Blood Group</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="blood_group" required>
                                                                            <option value="">Blood Group</option>
                                                                            <option value="O+">O+</option>
                                                                            <option value="O-">O-</option>
                                                                            <option value="A-">A-</option>
                                                                            <option value="A+">A+</option>
                                                                            <option value="B-">B-</option>
                                                                            <option value="B+">B+</option>
                                                                            <option value="AB">AB</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Profile picture</label>
                                                                    <input type="file" class="my_input" name="profile_image" required/>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                    <label for="">Marital Status</label>
                                                                    <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                        <select class="gdlr-core-skin-e-content my_input2" name="marital_status" required>
                                                                            <option value="">Marital Status</option>
                                                                            <option value="single">Single</option>
                                                                            <option value="married">Married</option>
                                                                            <option value="divorce">Divorced</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Residential information </h4>
                                                    <div class="gdlr-core-accordion-item-content">

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Country of Residence</label> 
                                                            <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="country_residence" required>
                                                                        <option value="">Country of Residence</option>
                                                                        @foreach($country as $c)
                                                                        <option value="{{$c->name}}">{{$c->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">State of residence</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="state_of_residence" id="state_of_residence" required>
                                                                        <option value="">State of residence</option>
                                                                        @foreach($states as $state)
                                                                        <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">LGA</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="lga_of_residence" id="lga_of_residence" required>
                                                                        <option value="">LGA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Origin </h4>
                                                    <div class="gdlr-core-accordion-item-content">

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Country</label> 
                                                            <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="nationality" required>
                                                                        <option value="">Country</option>
                                                                        @foreach($country as $c)
                                                                        <option value="{{$c->name}}">{{$c->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">State of Origin</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_inpu2t" name="state_of_origin" id="state_of_origin" required>
                                                                        <option value="">State of Origin</option>
                                                                        @foreach($states as $state)
                                                                        <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">LGA</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="lga" id="lga" required>
                                                                        <option value="">LGA</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Academics</h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">Faculty</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content my_input2" name="faculty_id" id="faculty" required>
                                                                        <option value="">--Select faculty--</option>
                                                                        @foreach($faculties as $faculty)
                                                                            <option value="{{$faculty->id}}" {{$student->faculty_id == $faculty->id? 'selected': ''}}>{{$faculty->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">Department</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content" name="dept_id" id="departments" required>
                                                                        <option value="{{$student->dept_id}}">{{Helper::get_department($student->dept_id)->name}}</option>
                                                                        <option value="">Department</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                <label for="">Level</label>
                                                                <div class="gdlr-core-course-form-combobox gdlr-core-skin-e-background">
                                                                    <select class="gdlr-core-skin-e-content" name="level" id="level" required>
                                                                        <option value="">--Level--</option>
                                                                        <option {{$student->level == '100'? 'selected': ''}} value="100">100</option>
                                                                        <option {{$student->level == '200'? 'selected': ''}} value="200">200</option>
                                                                        <option {{$student->level == '300'? 'selected': ''}} value="300">300</option>
                                                                        <option {{$student->level == '400'? 'selected': ''}} value="400">400</option>
                                                                        <option {{$student->level == '500'? 'selected': ''}} value="500">500</option>
                                                                        <option {{$student->level == '600'? 'selected': ''}} value="600">600</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Department</label>
                                                                <p>{{$department->name}}</p>
                                                                <input type="text" class="my_input" value="{{$department->name}}" hidden />
                                                            </div>
                                                        </div> -->
                                                        
                                                        <!-- <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Level</label>
                                                                <p>{{$student->level}}</p>
                                                                <input type="text" class="my_input" value="{{$student->level}}" hidden />
                                                            </div>
                                                        </div> -->

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Parent's Information </h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <p class="gdlr-core-course-column gdlr-core-column-full">Father's Information</p>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Full name</label>
                                                                <input type="text" class="my_input" value="" name="fathers_name" placeholder="Father's Name" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Residential Address</label>
                                                                <input type="text" class="my_input" value="" name="fathers_address" placeholder="Father's Address" />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Phone number</label>
                                                                <input type="text" class="my_input" value="" name="fathers_phone" placeholder="Father's Phone Number" />
                                                            </div>
                                                        </div>

                                                        <p class="gdlr-core-course-column gdlr-core-column-full">Mother's Information</p>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Full name</label>
                                                                <input type="text" class="my_input" value="" name="mothers_name" placeholder="Mother's Name" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Residential Address</label>
                                                                <input type="text" class="my_input" value="" name="mothers_address" placeholder="Mother's Address" />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Phone number</label>
                                                                <input type="text" class="my_input" value="" name="mothers_phone" placeholder="Mother's Phone Number" />
                                                            </div>
                                                        </div>

                                                    </div>

                                                    
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Guardian's Information </h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Full name</label>
                                                                <input type="text" class="my_input" value="" name="guardians_name" placeholder="Guardian's Name" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Residential Address</label>
                                                                <input type="text" class="my_input" value="" name="guardians_address" placeholder="Guardian's Address" />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Phone number</label>
                                                                <input type="text" class="my_input" value="" name="guardians_phone" placeholder="Guardian's Phone Number" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Relationship with student</label>
                                                                <input type="text" class="my_input" value="" name="guardians_relationship" placeholder="Guardian's Relationship With Student" />
                                                            </div>
                                                        </div>

                                                    </div>

                                                    
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Sponsor's Information </h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Full name</label>
                                                                <input type="text" class="my_input" value="" name="sponsors_name" placeholder="Sponsor's Name" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Residential Address</label>
                                                                <input type="text" class="my_input" value="" name="sponsors_address" placeholder="Sponsor's Address" />
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Phone number</label>
                                                                <input type="text" class="my_input" value="" name="sponsors_phone" placeholder="Sponsor's Phone Number" />
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Relationship with student</label>
                                                                <input type="text" class="my_input" value="" name="sponsors_relationship" placeholder="Sponsor's Relationship With Student" />
                                                            </div>
                                                        </div>

                                                    </div>

                                                    
                                                </div>
                                            </div>

                                            <div class="gdlr-core-accordion-item-tab clearfix ">
                                                <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                                <div class="gdlr-core-accordion-item-content-wrapper">
                                                    <h4 class="gdlr-core-accordion-item-title gdlr-core-js  gdlr-core-skin-e-background gdlr-core-skin-e-content">Medical Information</h4>
                                                    <div class="gdlr-core-accordion-item-content">
                                                        <div class="gdlr-core-course-column gdlr-core-column-60">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="" class="gdlr-core-column-60">Do you have any Medical Condition? If yes, provide us more information.</label>
                                                                <textarea maxlength="500"name="medical_info" style="background-color: #3b4b6b; color: #b1c0e0;" class="gdlr-core-column-30 input1 scholarship" cols="20" rows="10"></textarea>
                                                                <!-- <input type="text" value="" name="sponsors_name" placeholder="Sponsor's Name" /> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @csrf
                                            <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                                <!-- <input  value="Submit" /> -->
                                                <button type="submit" id="submit_form" class="gdlr-core-button">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="/student_registration" style="display: none;" id="clickme">Click to Open Success Modal</a> -->
    <!-- <a href="#" id="clickme2">Click to Open fail Modal</a> -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#submit_form').click(function(){
        $('.gdlr-core-accordion-item-tab').addClass('gdlr-core-active')
    })

    $('#faculty').change(function(){
        let faculty_id = $(this).find(":selected").val()
        $('#departments').find('option').remove().end().append('<option value="">Select department</option>').val('')
        ;
        $.post('/get_departments',{faculty_id}).done(function(response){
            response.body.map((item)=>{
                $('#departments').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })

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

    $('#state_of_residence').change(function(){
        let state_id = $(this).find(":selected").data('id')
        $('#lga_of_residence')
            .find('option')
            .remove()
            .end()
            .append('<option value="">Select LGA</option>')
            .val('')
        ;
        $.post('/get_lgas',{state_id}).done(function(response){
            response.body.map((item)=>{
                $('#lga_of_residence').append(`<option value='${item.name}'>${item.name}</option>`)
            })
        });
    })

</script>

@endsection
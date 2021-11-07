@extends('layouts.master')

@section('title', 'Student')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/green.css')}}" rel="stylesheet">
@endsection

@section('content')

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			    
			    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
				<div class="x_panel">
					<div class="x_title">
						<h2>Student Admission<small class="text-danger"> * Feilds are required.</small></h2>
						<div class="clearfix"></div>
					</div>
					
					<div class="x_content">
						<form method="post" action="{{ route('studentinfo.update',$student->Registration_Number) }}" enctype="multipart/form-data">
						@csrf
						@method("PATCH")
						<!--academic information-->
							<div class="form-row">
							    <!--title-->
							    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h3 class="text-info text-center">Academic Information</h3>
								</div>
								
							    <!--enrolled semester-->
								<div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<label for="Enrollment_Semester">Enrollment Semester: <span class="text-danger">*</span></label>
									<select name="Enrollment_Semester"  class="form-control has-feedback-left" required>
										@foreach($semesters as $s)
										    <option value="{{ $s->title }}" @if ($s->title == $student->Enrollment_Semester) selected @endif>{{ $s->title }}</option>
										@endforeach
									</select>
									<i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
									<span id="Enrollment_Semester" class="text-danger" >{{ $errors->first('Enrollment_Semester') }}</span>
								</div>
								
								<!--registration-->
								<div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<label for="Registration_Number">Registration Number: <span class="text-danger">*</span></label>
									<input type="text" id="Registration_Number" class="form-control has-feedback-left" name="Registration_Number" value="{{ $student->Registration_Number }}"  required />
									<i class="fa fa-child form-control-feedback left" aria-hidden="true"></i>
									<span id="Registration_Number" class="text-danger" >{{ $errors->first('Registration_Number') }}</span>
								</div>
								
								<!--batch-->
								<div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<label for="Batch">Batch: <span class="text-danger">*</span></label>
									<input type="text" name="Batch" class="form-control has-feedback-left" value="{{ $student->Batch }}"/>
									<i class="fa fa-info form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_bncReg" class="text-danger" >{{ $errors->first('Batch') }}</span>
								</div>
								
								<!--program-->
								<div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<label for="Program">Program: <span class="text-danger">*</span></label>
									<select name="Program" id="Program" class="form-control has-feedback-left" required>
									    <option value="CSE" @if ($student->Program == 'CSE') selected @endif>CSE</option>
									    <option value="EEE" @if ($student->Program == 'EEE') selected @endif>EEE</option>
									    <option value="CE" @if ($student->Program == 'CE') selected @endif>CE</option>
									    <option value="BBA" @if ($student->Program == 'BBA') selected @endif>BBA</option>
									    <option value="English" @if ($student->Program == 'English') selected @endif>English</option>
									    <option value="LLB" @if ($student->Program == 'LLB') selected @endif>LLB</option>
									</select>
									<i class="fa fa-info form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Program" class="text-danger" >{{ $errors->first('Program') }}</span>
								</div>

								<!--level-term-->
								<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<label for="Current_semester">Level-Term: <span class="text-danger">*</span></label>
									<select name="Current_semester" id="Current_semester" class="form-control has-feedback-left" required>
									    <option value="l1t1" @if ($student->Current_semester == 'l1t1') selected @endif>l1t1</option>
									    <option value="l1t2" @if ($student->Current_semester == 'l1t2') selected @endif>l1t2</option>
									    <option value="l2t1" @if ($student->Current_semester == 'l2t1') selected @endif>l2t1</option>
									    <option value="l2t2" @if ($student->Current_semester == 'l2t2') selected @endif>l2t2</option>
									    <option value="l3t1" @if ($student->Current_semester == 'l3t1') selected @endif>l3t1</option>
									    <option value="l3t2" @if ($student->Current_semester == 'l3t2') selected @endif>l1t1</option>
									    <option value="l4t1" @if ($student->Current_semester == 'l4t1') selected @endif>l4t1</option>
									    <option value="l4t2" @if ($student->Current_semester == 'l4t2') selected @endif>l1t1</option>
									    <option value="outgoing" @if ($student->Current_semester == 'outgoing') selected @endif>outgoing</option>
									    
									</select>
									<i class="fa fa-info form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Program" class="text-danger" >{{ $errors->first('Program') }}</span>
								</div>

								<!--status-->
								<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<label for="Current_status">Current-Status: <span class="text-danger">*</span></label>
									<select name="Current_status" class="form-control has-feedback-left" required>
									    <option value="current" @if ($student->Current_status == 'current') selected @endif>current</option>
									    <option value="paused" @if ($student->Current_status == 'paused') selected @endif>paused</option>
									    <option value="left" @if ($student->Current_status == 'left') selected @endif>left</option>
									    <option value="migrated" @if ($student->Current_status == 'migrated') selected @endif>migrated</option>
									    <option value="passing" @if ($student->Current_status == 'passing') selected @endif>passing</option>
									    <option value="graduate" @if ($student->Current_status == 'graduate') selected @endif>graduate</option>
									    
									    
									</select>
									<i class="fa fa-info form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Program" class="text-danger" >{{ $errors->first('Program') }}</span>
								</div>
							</div>
							
                        <!--student information-->
							<div class="form-row">
							    <!--title-->
							    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h3 class="text-info text-center" style="margin-top:4%">Student Information</h3>
								</div>
								
							    <!--full name-->
								<div class="form-group col-md-6 col-sm-12 col-xs-12">
									<label for="Full_Name">Full Name: <span class="text-danger">*</span></label>
									<input type="text" id="Full_Name" value="{{ $student->Full_Name }}" class="form-control has-feedback-left" name="Full_Name" required="required"/>
									<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
								</div>
								
								<!--gender-->
								<div class="form-group col-md-6 col-sm-12 col-xs-12">
									<label for="Gender">Gender: <span class="text-danger">*</span></label>
									<select class="form-control" name="Gender">
									    <option value="Male" @if ($student->Gender == 'Male') selected @endif>Male</option>
									    <option value="Female" @if ($student->Gender == 'Female') selected @endif>Female</option>
									</select>
									<span id="msg_Program" class="text-danger" >{{ $errors->first('Gender') }}</span>
								</div>
								
								<!--Date of Birth-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="Date_of_Birth">Date of birth: <span class="text-danger">*</span></label>
									<input type="date" name="Date_of_Birth" value="{{ \Carbon\Carbon::parse($student->Date_of_Birth)->format('Y-m-d') }}" class="form-control has-feedback-left" required>
									<i class="fa fa-calendar form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Date_of_Birth" class="text-danger" >{{ $errors->first('Date_of_Birth') }}</span>
								</div>
								
								<!--blood group-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="Blood_Group">Blood Group: <span class="text-danger">*</span></label><br>
									<select name="Blood_Group" id="Blood_Group" class="has-feedback-left form-control">
										<option value="A+" @if ($student->Blood_Group == 'A+') selected @endif>A+</option>
										<option value="A-" @if ($student->Blood_Group == 'A-') selected @endif>A-</option>
										<option value="B+" @if ($student->Blood_Group == 'B+') selected @endif>B+</option>
										<option value="B-" @if ($student->Blood_Group == 'B-') selected @endif>B-</option>
										<option value="AB+" @if ($student->Blood_Group == 'AB+') selected @endif>AB+</option>
										<option value="AB-" @if ($student->Blood_Group == 'AB-') selected @endif>AB-</option>
										<option value="O+" @if ($student->Blood_Group == 'O+') selected @endif>O+</option>
										<option value="O-" @if ($student->Blood_Group == 'O-') selected @endif>O-</option>
									</select>
									<i class="fa fa-info form-control-feedback left"></i>
									<span id="msg_Blood_Group" class="text-danger" >{{ $errors->first('Blood_Group') }}</span>
								</div>
								
								<!--student mobile number-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="Student_Mobile_Number">Student Mobile Number: <span class="text-danger">*</span></label>
									<input type="text" class="form-control has-feedback-left" name="Student_Mobile_Number" minlength="11" maxlength="11" required value="{{ $student->Student_Mobile_Number }}" />
									<i class="fa fa-phone form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_session" class="text-danger" >{{ $errors->first('Student_Mobile_Number') }}</span>
								</div>
								
								<!--email address-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="Email_Address">Email Address :<span class=""></span></label>
									<input type="email" id="Email_Address" class="form-control has-feedback-left" name="Email_Address" value="{{ $student->Email_Address }}" required />
									<i class="fa fa-envelope form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Email_Address" class="text-danger" >{{ $errors->first('Email_Address') }}</span>
								</div>
								
								<!--religion-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="Religion">Religion: <span class="text-danger">*</span></label><br>
									<select name="Religion" id="Religion" class="has-feedback-left form-control" required>
										<option value="Islam" @if ($student->Religion == 'Islam') selected @endif>Islam</option>
										<option value="Hindu" @if ($student->Religion == 'Hindu') selected @endif>Hindu</option>
										<option value="Cristian" @if ($student->Religion == 'Cristian') selected @endif>Cristian</option>
										<option value="Buddhist" @if ($student->Religion == 'Buddhist') selected @endif>Buddhist</option>
										<option value="Other" @if ($student->Religion == 'Other') selected @endif>Other</option>
									</select>
									<i class="fa fa-info form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Religion" class="text-danger" >{{ $errors->first('Religion') }}</span>
								</div>
								
								<!--BCN/NID-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="Date_of_Birth">BCN/NID: <span class="text-danger"></span></label>
									<input type="text" name="BCN" id="BCN" class="form-control has-feedback-left" value="{{ $student->BCN }}">
									<i class="fa fa-calendar form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Date_of_Birth" class="text-danger" >{{ $errors->first('BCN') }}</span>
								</div>
								
								<!--marital status-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="Marital_Status">Marital Status: <span class="text-danger">*</span></label><br>
									<select name="Marital_Status" id="Marital_Status" class="has-feedback-left form-control" tabindex="-1">
										<option selected>--Select One--</option>
										<option value="Married" @if ($student->Marital_Status == 'Married') selected @endif>Married</option>
										<option value="Unmarried" @if ($student->Marital_Status == 'Unmarried') selected @endif>Unmarried</option>
									</select>
									<i class="fa fa-info form-control-feedback left"></i>
									<span id="msg_bloodgroup" class="text-danger" >{{ $errors->first('Marital_Status') }}</span>
								</div>
								
								<!--photograph-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="Photo">Photograph: <span class="text-danger"></span></label>
									<input type="file" id="Photo" class="form-control has-feedback-left" name="Photo">
									<i class="fa fa-file-image-o form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Photo" class="text-danger" >{{ $errors->first('Photo') }}</span>
								</div>

								<!--quota-->
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
									<label for="quota">Quota: <span class="text-danger">*</span></label><br>
									<select name="quota" id="quota" class="has-feedback-left form-control" required>
										<option value="general" @if($student->quota == "general") selected @endif>General</option>
										<option value="ff" @if($student->quota == "ff") selected @endif>Freedom Fighter</option>
										<option value="defense" @if($student->quota == "defense") selected @endif>Defense</option>
									</select>
									<i class="fa fa-info form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Religion" class="text-danger" >{{ $errors->first('Religion') }}</span>
								</div>
							</div>
							
						<!--student academic information-->
							<div class="form-row">
							    <!--title-->
							    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
								    <h3 class="text-info text-center" style="margin-top:4%">Student Academic Information</h3>
								</div>
								
							    <!--ssc year-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="ssc_year">SSC Year:</label>
									<input type="number" value="{{ $student->ssc_year }}" class="form-control has-feedback-left" name="ssc_year"/>
									<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Full_Name" class="text-danger" >{{ $errors->first('ssc_year') }}</span>
								</div>
								
								<!--ssc_gpa-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="ssc_gpa">SSC GPA:</label>
									<input type="number" value="{{ $student->ssc_gpa }}" class="form-control has-feedback-left" name="ssc_gpa" step="0.01"/>
									<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Full_Name" class="text-danger" >{{ $errors->first('ssc_gpa') }}</span>
								</div>
								
								<!--hsc_year-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="hsc_year">HSC Year:</label>
									<input type="number" value="{{ $student->hsc_year }}" class="form-control has-feedback-left" name="hsc_year" />
									<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Full_Name" class="text-danger" >{{ $errors->first('hsc_year') }}</span>
								</div>
								
								<!--hsc_gpa-->
								<div class="form-group col-md-3 col-sm-12 col-xs-12">
									<label for="hsc_gpa">HSC GPA:</label>
									<input type="number" value="{{ $student->hsc_gpa }}" class="form-control has-feedback-left" name="hsc_gpa" step="0.01"/>
									<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Full_Name" class="text-danger" >{{ $errors->first('hsc_gpa') }}</span>
								</div>
							</div>
							
						<!--guardian information-->
                            <div class="form-row">
                                <!--title-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="text-info text-center" style="margin-top:4%">Guardian Information</h3>
                                </div>
                                
                                <!--fathers name-->
                                <div class="col-md-4 col-sm-12 col-xs-12">
									<label for="Fathers_Name">Father's Name: <span class="text-danger">*</span></label>
									<input type="text" id="Fathers_Name" value="{{ $student->Fathers_Name }}" class="form-control has-feedback-left" name="Fathers_Name" maxlength="11" minlength="11" required />
									<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Fathers_Name" class="text-danger" >{{ $errors->first('Fathers_Name') }}</span>
								</div>
								
								<!--fathers profession-->
								<div class="col-md-4 col-sm-12 col-xs-12">
									<label for="Fathers_Profession">Father's Profession: <span class="text-danger">*</span></label>
									<input type="text" value="{{ $student->Fathers_Profession }}" class="form-control has-feedback-left"  name="Fathers_Profession" required />
									<i class="fa fa-info form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Fathers_Profession" class="text-danger" >{{ $errors->first('Fathers_Profession') }}</span>
								</div>
								
								<!--mothers name-->
								<div class="col-md-4 col-sm-12 col-xs-12">
									<label for="Mothers_Name">Mother's Name: <span class="text-danger">*</span></label>
									<input type="text" id="Mothers_Name" value="{{ $student->Mothers_Name }}" class="form-control has-feedback-left" name="Mothers_Name" required />
									<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Mothers_Name" class="text-danger" >{{ $errors->first('Mothers_Name') }}</span>
								</div>
								
								<!--mothers profession-->
								<div class="col-md-4 col-sm-12 col-xs-12">
									<label for="Mothers_Profession">Mother's Profession: <span class="text-danger">*</span></label>
									<input type="text" id="Mothers_Profession" class="form-control has-feedback-left"  name="Mothers_Profession" value="{{ $student->Mothers_Profession }}" required />
									<i class="fa fa-info form-control-feedback left" aria-hidden="true"></i>
									<span id="msg_Mothers_Profession" class="text-danger" >{{ $errors->first('Mothers_Profession') }}</span>
								</div>
								
								<!--guardian name-->
								<div class="col-md-4 col-sm-12 col-xs-12">
									<label for="Guardian_Name"> Guardian Name :<span class="text-danger">*</span></label>
									<input type="text" id="Guardian_Name" value="{{ $student->Guardian_Name }}" class="form-control has-feedback-left" name="Guardian_Name" />
									<i class="fa fa-user form-control-feedback left" aria-hidden="true"></i>
									<span id="Guardian_Name" class="text-danger" >{{ $errors->first('Guardian_Name') }}</span>
								</div>
								
								<!--guardian mobile no-->
								<div class="col-md-4 col-sm-12 col-xs-12">
									<label for="Guardian_Mobile_Number">Guardian Mobile No :<span class="text-danger">*</span></label>
									<input type="text" value="{{ $student->Guardian_Mobile_Number }}" class="form-control has-feedback-left" name="Guardian_Mobile_Number"  />
									<i class="fa fa-phone form-control-feedback left" aria-hidden="true"></i>
									<span id="Guardian_Mobile_Number" class="text-danger" >{{ $errors->first('Guardian_Mobile_Number') }}</span>
								</div>
								
								<!--guardian -->
                            </div>
                            
                        <!--geographic information-->
                            <div class="form-row">
                                <!--title-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h3 class="text-info text-center" style="margin-top:4%">Location Information</h3>
                            	</div>
                            
                                <!--nationality-->
                                <div class="form-group col-md-3 col-sm-3 col-xs-12">
    								<label for="Nationality">Nationality: <span class="text-danger">*</span></label>
    								<input type="text" name="Nationality" class="form-control" value="Bangladeshi">
    								<span id="msg_Nationality" class="text-danger" >{{ $errors->first('Nationality') }}</span>
    							</div>
							
    							<!--division-->
    							@php 
    							    $divisions= DB::table('divisions')->select('id','name')->get(); 
    							@endphp
    							<div class="form-group col-md-3 col-sm-3 col-xs-12">
    								<label for="">Division: <span class="text-danger">*</span></label>
    								<select name="Division" id="division_id" class="form-control select2_single" >
    									@foreach ($divisions as $d)
    									    <option value="{{ $d->id }}" @if ($d->id == $student->Division)
												selected
											@endif >{{ $d->name }}</option>
    									@endforeach
    								</select>
    								<span id="msg_Nationality" class="text-danger" >{{ $errors->first('Division') }}</span>
    							</div>
							
    							<!--district-->
    							@php 
    							    $districts= DB::table('districts')->select('id','name','bn_name')->get(); 
    							@endphp
    							<div class="form-group col-md-3 col-sm-3 col-xs-12">
    								<label for="Nationality">District: <span class="text-danger">*</span></label>
    								<select name="District" id="district_id" class="form-control select2_single" >
    								    @foreach ($districts as $d)
    									    <option value="{{ $d->id }}" @if ($d->id == $student->District)
												selected
											@endif>{{ $d->name }} - {{ $d->bn_name }}</option>
    									@endforeach
    								</select>
    								<span id="msg_Nationality" class="text-danger" >{{ $errors->first('District') }}</span>
    							</div>
							
    							<!--upazilla-->
    							@php 
    							    $upazilas= DB::table('upazilas')->select('id','name','bn_name')->get(); 
    							@endphp
    							<div class="form-group col-md-3 col-sm-3 col-xs-12">
    								<label for="Nationality">Upazila: <span class="text-danger">*</span></label>
    								<select name="Upazila" id="upazila_id" class="form-control select2_single" >
    									@foreach ($upazilas as $u)
    									    <option value="{{ $u->id }}" @if ($u->id == $student->Upazila)
												selected
											@endif>{{ $u->name }} - {{ $u->bn_name }}</option>
    									@endforeach
    								</select>
    								<span id="msg_Nationality" class="text-danger" >{{ $errors->first('Upazila') }}</span>
    							</div>
							
    							<!--union-->
    							@php 
    							    $unions= DB::table('unions')->select('id','name','bn_name')->get(); 
    							@endphp
    						    <div class="form-group col-md-12 col-sm-12 col-xs-12">
    								<label for="Nationality">Union: <span class="text-danger">*</span></label>
    								<select name="Unions" id="union_id" class="form-control select2_single" >
    									@foreach ($unions as $u)
    									    <option value="{{ $u->id }}" @if ($u->id == $student->Unions)
												selected
											@endif>{{ $u->name }} - {{ $u->bn_name }}</option>
    									@endforeach
    								</select>
    								<span id="msg_Nationality" class="text-danger" >{{ $errors->first('Unions') }}</span>
								</div>
							
    							<!--present address-->
    							<div class="form-group col-md-12 col-sm-12 col-xs-12">
    								<label for="Present_Address">Present Address: <span class="text-danger"></span>(optional)</label>
    								<textarea id="Present_Address" required="required" class="form-control has-feedback-left" name="Present_Address">{{ $student->Present_Address }}</textarea>
    								<i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
    								<span id="msg_pra" class="text-danger" >{{ $errors->first('Present_Address') }}</span>
    							</div>
							
    							<!--permanent address -->
    							<div class="form-group col-md-12 col-sm-12 col-xs-12">
    								<label for="Permanent_Address">Parmanent Address: <span class="text-danger">*</span></label>
    								<textarea id="Permanent_Address" required="required" class="form-control has-feedback-left" placeholder="Village name  will be here.." name="Permanent_Address" >{{ $student->Permanent_Address }}</textarea>
    								<i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
    								<span id="Permanent_Address" class="text-danger" >{{ $errors->first('Permanent_Address') }}</span>
    							</div>
                            </div>
                            
                        <!--certificate information-->
                            <div class="form-row">
                                <!--title-->
                                <div class="form-group col-md-12">
                                    <h3 class="text-info text-center" style="margin-top:4%">Certificate and Optional Information</h3>
                                </div>

                                <!--data-->
                                <table class="table">
                                    <!--hostel seat-->
    								<tr>
    									<td>1. Resident (For Hostel Seat)</td>
    									<td>
    									    <select name="Major_1" class="has-feedback-left  form-control" id="Major_1">
    											<option value="YES" @if ($student->Major_1 == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($student->Major_1 == "NO")selected @endif>NO</option>
    										</select>
    								   </td>
    								</tr>
    								
    								<!--ssc certificate-->
    								<tr>
    									<td>2. SSC Certificate, Orginal</td>
    									<td>
    									    <select name="ssc_c" class="has-feedback-left  form-control" id="ssc_c">
    											<option value="YES" @if ($certificates->ssc_c == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->ssc_c == "NO")selected @endif>NO</option>
    										</select>
    								   </td>
    								</tr>
    								
    								<!--ssc mark sheet-->
    								<tr>
    									<td>3. SSC Mark Sheet, Orginal</td>
    									<td>
    									    <select name="ssc_m" class="has-feedback-left  form-control" id="ssc_m ">
        										<option value="YES" @if ($certificates->ssc_m == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->ssc_m == "NO")selected @endif>NO</option>
        									</select>
    								   </td>
    								</tr>
    								
    								<!--hsc certificate-->
    								<tr>
    									<td>4. HSC Certificate, Orginal</td>
    									<td>
    									    <select name="hsc_c" class="has-feedback-left  form-control" id="hsc_c">
        										<option value="YES" @if ($certificates->hsc_c == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->hsc_c == "NO")selected @endif>NO</option>
        									</select>
    								   </td>
    								</tr>
    								
    								<!--hsc marsheet-->
    								<tr>
    									<td>5. HSC Mark Sheet, Orginal</td>
    									<td>
    									    <select name="hsc_m" class="has-feedback-left  form-control" id="hsc_m">
        										<option value="YES" @if ($certificates->hsc_m == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->hsc_m == "NO")selected @endif>NO</option>
        									</select>
    								   </td>
    								</tr>
    								
    								<!--character certificate-->
    								<tr>
    									<td>6. Character Certificate from the Last Educational institution</td>
    									<td>
    									    <select name="cc" class="has-feedback-left  form-control" id="cc">
        										<option value="YES" @if ($certificates->cc == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->cc == "NO")selected @endif>NO</option>
        									</select>
    								   </td>
    								</tr>
    								
    								<!--nationality-->
    								<tr>
    									<td>7. Nationality / Birth Certificate from the Uunion Council Chairman</td>
    									<td>
    									    <select name="bc" class="has-feedback-left  form-control" id="cc">
        										<option value="YES" @if ($certificates->bc == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->bc == "NO")selected @endif>NO</option>
        									</select>
    								   </td>
    								</tr>
    								
    								<!--liberation certificate-->
        							<tr>
        								<td>8. Certificate and Participation in the War of Liberation for sons/daughters of FFs</td>
        								<td>
        								    <select name="ff" class="has-feedback-left  form-control" id="bc">
        										<option value="YES" @if ($certificates->ff == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->ff == "NO")selected @endif>NO</option>
        									</select>
        							   </td>
        							</tr>
        							
        							<!--character certificate from dc-->
    								<tr>
    									<td>9. Character Certificate from the Circle Chiefs and DCs for tribal Candidates</td>
    									<td>
    									    <select name="tc" class="has-feedback-left  form-control" id="ssc_c">
    											<option value="YES" @if ($certificates->tc == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->tc == "NO")selected @endif>NO</option>
    										</select>
    								   </td>
    								</tr>
    								
    								<!--medical fitness-->
    								<tr>
    									<td>10. Medical Fitness Certificate : Urine (RE),Blood Grouping</td>
    									<td>
    									    <select name="mfc" class="has-feedback-left  form-control" id="ssc_c">
    										    <option value="YES" @if ($certificates->mfc == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->mfc == "NO")selected @endif>NO</option>
    									    </select>
    								   </td>
    								</tr>
    								
    								<!--leaving bond-->
    								<tr>
    									<td>11. Bond for Leaving the Course and the University before Completing the Course</td>
    									<td>
    									    <select name="blc" class="has-feedback-left  form-control" id="blc">
        										<option value="YES" @if ($certificates->blc == "YES")selected @endif>YES</option>
    											<option value="NO" @if ($certificates->blc == "NO")selected @endif>NO</option>
        									</select>
    								   </td>
    								</tr>
    			                </table>
                            </div>
                        
                        <!--submission-->
                            <div class="form-row">
								<div class="form-group col-md-12">
								<button type="submit" class="btn btn-primary btn-lg pull-right">Submit</button>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
@endsection
@section('extrascript')

<script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/icheck.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>


<script>
$(document).ready(function() {

	$(".select2_single").select2({
		placeholder: "Select a Option",
		allowClear: true
	});

	$(".session").select2({
                  placeholder: "Pick a session",
                  allowClear: true
               });

               //get subject lists
               $('#division_id').on('change',function (){
                  var dept= $('#division_id').val();
                 
            
                  if(!dept){
                     new PNotify({
                        title: 'Validation Error!',
                        text: 'Please Pic A Division or Write session!',
                        type: 'error',
                        styling: 'bootstrap3'
                     });
                  }
                  else {
                     //for students
                     //populateStudentGrid(dept);

                     
                     $.ajax({
                        url:'/admin/add/'+dept,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                          
                           console.log(data);
                            $('#district_id').empty();
                           // alert(data.subjects);
                           $('#district_id').append('<option >Select a District</option>');
                           $.each(data.subjects, function(key, value) {
                              //alert('working');
                              $('#district_id').append('<option  value="'+value.id+'">'+value.name+'['+value.bn_name+']</option>');

                           });
                           
                           $(".subject").select2({
                              placeholder: "Pick a Subject",
                              allowClear: true
                           });
                           
                         

                        },
                        error: function(data){
                           var respone = JSON.parse(data.responseText);
                           $.each(respone.message, function( key, value ) {
                              new PNotify({
                                 title: 'Error!',
                                 text: value,
                                 type: 'error',
                                 styling: 'bootstrap3'
                              });
                           });
                        }
                     });
                  }
               });

			   $('#district_id').on('change',function (){
                  var dept= $('#district_id').val();
                // alert(dept);
            
                  if(!dept){
                     new PNotify({
                        title: 'Validation Error!',
                        text: 'Please Pic A District or Write session!',
                        type: 'error',
                        styling: 'bootstrap3'
                     });
                  }
                  else {
                     //for students
                     //populateStudentGrid(dept);

                     $.ajax({
                        url:'/admin2/add/'+dept,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                          
                           console.log(data);
                            $('#upazila_id').empty();
                           // alert(data.subjects);
                           $('#upazila_id').append('<option >Select a Upazila</option>');
                           $.each(data.subjects, function(key, value) {
                              //alert('working');
                              $('#upazila_id').append('<option  value="'+value.id+'">'+value.name+'['+value.bn_name+']</option>');

                           });
                           
                           $(".subject").select2({
                              placeholder: "Pick a Subject",
                              allowClear: true
                           });
                           
                         

                        },
                        error: function(data){
                           var respone = JSON.parse(data.responseText);
                           $.each(respone.message, function( key, value ) {
                              new PNotify({
                                 title: 'Error!',
                                 text: value,
                                 type: 'error',
                                 styling: 'bootstrap3'
                              });
                           });
                        }
                     });
                  }
               });

			   $('#upazila_id').on('change',function (){
                  var dept= $('#upazila_id').val();
                // alert(dept);
            
                  if(!dept){
                     new PNotify({
                        title: 'Validation Error!',
                        text: 'Please Pic A Upazilla or Write session!',
                        type: 'error',
                        styling: 'bootstrap3'
                     });
                  }
                  else {
                     //for students
                     //populateStudentGrid(dept);

                     $.ajax({
                        url:'/admin3/add/'+dept,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                          
                           console.log(data);
                            $('#union_id').empty();
                           // alert(data.subjects);
                           $('#union_id').append('<option >Select a Union</option>');
                           $.each(data.subjects, function(key, value) {
                              //alert('working');
                              $('#union_id').append('<option  value="'+value.id+'">'+value.name+'['+value.bn_name+']</option>');

                           });
                           
                           $(".subject").select2({
                              placeholder: "Pick a Subject",
                              allowClear: true
                           });
                           
                         

                        },
                        error: function(data){
                           var respone = JSON.parse(data.responseText);
                           $.each(respone.message, function( key, value ) {
                              new PNotify({
                                 title: 'Error!',
                                 text: value,
                                 type: 'error',
                                 styling: 'bootstrap3'
                              });
                           });
                        }
                     });
                  }
               });
});
</script>

@endsection
@section('extrascript')
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
<!-- validator -->
   <script>
     // initialize the validator function
     validator.message.date = 'not a real date';

     // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
     $('form')
       .on('blur', 'input[required], input.optional, select.required', validator.checkField)
       .on('change', 'select.required', validator.checkField)
       .on('keypress', 'input[required][pattern]', validator.keypress);


     $('form').submit(function(e) {
       e.preventDefault();
       var submit = true;

       // evaluate the form using generic validaing
       if (!validator.checkAll($(this))) {
         submit = false;
       }

       if (submit)
         this.submit();

       return false;
     });
   </script>
   <!-- /validator -->
@endsection

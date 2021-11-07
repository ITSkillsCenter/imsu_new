@extends('layouts.master')

@section('title', 'Student')
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <!-- row start -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Students<small> Student information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="profile_img">
                         <!-- end of image cropping -->
                         <div id="crop-avatar">
                           <!-- Current avatar -->
                           
                           <img class="img-responsive avatar-view" src="{{asset($student->Photo)}}"  heigth="200" width="200" title="{{$student->Full_Name}}" alt="{{$student->Full_Name}}">
                           <!-- Loading state -->
                           <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                         </div>
                         <!-- end of image cropping -->
                    </div>
                    @php $divi=DB::table('divisions')->where('id',$student->Division)->first();
                    $district=DB::table('districts')->where('id',$student->District)->first();

                    $upazila=DB::table('upazilas')->where('id',$student->Upazila)->first();
                    $union=DB::table('unions')->where('id',$student->Unions)->first();
                    @endphp
                       <h3>{{$student->Full_Name}} </h3>

                       <ul class="list-unstyled user_data">
                         <li><i class="fa fa-map-marker user-profile-icon"></i> {{$student->Permanent_Address}}, Union:{{  $union->name}}, Upazilla:{{ $upazila->name }}, District:{{ $district->name }}, Division: {{ $divi->name }}
                         </li>
                         <li><i class="fa fa-phone user-profile-icon"></i> {{$student->Student_Mobile_Number}}
                         </li>

                         <li>
                           <i class="fa fa-building user-profile-icon"></i>
                         </li>

                         <li class="m-top-xs">
                           <i class="fa fa-clock-o user-profile-icon"></i> {{$student->Enrollment_Semester}}

                         </li>
                       </ul>
                       @php
            $id = Crypt::encrypt($student->Registration_Number);
            @endphp
                        @permission('student-edit')
                       <a class="btn btn-success" href="{{URL::route('studentinfo.edit',$id)}}"><i class="fa fa-edit m-right-xs"></i> Edit Infomation</a>
                       @endpermission
                       <br />
                    </div>
                      <div class="col-md-9 col-sm-12 col-xs-12">

                       <div class="" role="tabpanel" data-example-id="togglable-tabs">
                         <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                           <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Academic Info</a>
                           </li>
                           <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Basic Info</a>
                           </li>
                           <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Guardian Info</a>
                           </li>
                           <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Others Information</a>
                           </li>
                         </ul>
                         <div id="myTabContent" class="tab-content">
                           <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                             <ul class="list-unstyled">
                               <li>
                                 <i class="fa fa-2x fa-building"></i> <strong>Department: </strong> 
                                {{$student->Program}}
                               </li>
                               
                               <li>
                                 <i class="fa fa-2x fa-home"></i> <strong>Email Address: </strong>  {{$student->Email_Address}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>Batch No: </strong>  {{$student->Batch}}
                               </li>

                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>ID No: </strong>  {{$student->Registration_Number}}
                               </li>
                             </ul>


                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                             <ul class="list-unstyled">
                               <li>
                                 <i class="fa fa-2x fa-user"></i> <strong>Name: </strong> {{$student->Full_Name}}
                               </li>
                               <li>
                                 @if($student->Gender=="Male")
                                 <i class="fa fa-2x fa-male"></i> <strong>Gender: </strong>  {{$student->Gender}}
                               @else
                                 <i class="fa fa-2x fa-female"></i> <strong>Gender: </strong>  {{$student->Gender}}

                               @endif
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>Blood Group: </strong>  {{$student->Blood_Group}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>Religion: </strong>  {{$student->Religion}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>Nationality: </strong>  {{$student->Nationality}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-calendar"></i> <strong>Date Of Birth: </strong>  {{$student->Date_of_Birth}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-phone"></i> <strong>Mobile No: </strong>  {{$student->Student_Mobile_Number}}
                               </li>
                             </ul>
                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                             <ul class="list-unstyled">
                               <li>
                                 <i class="fa fa-2x fa-user"></i> <strong>Father's Name: </strong> {{$student->Fathers_Name}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-phone"></i> <strong>Father's Profession : </strong>  {{$student->Fathers_Profession}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-user"></i> <strong>Mother's Name: </strong>  {{$student->Mothers_Name}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-phone"></i> <strong>Mother Profession: </strong>  {{$student->Mothers_Profession}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-user"></i> <strong> Guardian: </strong>  {{$student->Guardian_Name}}
                               </li>
                               <li>
                                <li>
                                 <i class="fa fa-2x fa-user"></i> <strong> Guardian Email: </strong>  {{$student->Guardian_Email}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-phone"></i> <strong>Local Guardian Mobile No: </strong>  {{$student->Guardian_Mobile_Number}}
                               </li>
                               <li><i class="fa fa-2x fa-map-marker"></i> <strong>Present Address: </strong> {{$student->Present_Address}}
                               </li>
                               <li><i class="fa fa-2x fa-map-marker"></i> <strong>Parmanent Address: </strong> {{$student->Permanent_Address}}
                               </li>
                             </ul>
                           </div>

                           <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                             <ul class="list-unstyled">
                               <li>
                                 <i class="fas fa-2x fa-layer-group"></i> <strong>Current Semester: </strong> {{$student->Current_semester}}
                               </li>
                               <li>
                                 <i class="fas fa-2x fa-user-graduate"></i> <strong>Current Status: </strong>  <span class="bg-primary">{{strtoupper($student->Current_status)}}</span>
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-building"></i> <strong>Resident (BAIUST Hostel) : </strong> {{$student->Major_1}}
                               </li>
                               <?php $check= DB::table('student_certificates')->where('student_id',$student->Registration_Number)->first();?>
                               <li>
                                 <i class="fa fa-2x fa-file-pdf"></i> <strong>SSC Certificate, Orginal : </strong>  {{   $check->ssc_c }}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-file-pdf"></i> <strong>SSC Marksheet, Orginal: </strong>  {{   $check->ssc_m }}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-file-pdf"></i> <strong>HSC Certificate, Orginal: </strong>  {{   $check->hsc_c }}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-file-pdf"></i> <strong>HSC Marksheet, Orginal: </strong>  {{   $check->hsc_m }}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>Remarks: </strong>  {{$student->Remarks}}
                               </li>
                               @permission('password-read')
                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>Password: </strong>  {{$student->Password}}
                               </li>
                               @endpermission
                             </ul>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>


                  </div>
                </div>
              </div>
            </div>
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
        </div>
        <!-- /page content -->
@endsection

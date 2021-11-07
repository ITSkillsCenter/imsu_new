@extends('layouts.homepage_layout')
@section('content')
<style>
    label {
        color: #3b4b6b;
    }
</style>
<div class="gdlr-core-page-builder-body">

    <div class="gdlr-core-pbf-wrapper" id="div_1dd7_105">
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container ">
                <div class="gdlr-core-course-search-item gdlr-core-item-pdb gdlr-core-item-pdlr ">
                    <div class="gdlr-core-pbf-element" style="width: 100%;margin: auto;">
                        <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                            <div class="gdlr-core-title-item-title-wrap clearfix">
                                @if($print == null)
                                <a class="gdlr-core-button" href="javascript:history.go(-1)" style="float: left;">Back</a>
                                @endif
                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">Bio data {{ ($print !== null? '' : 'Preview')}} </h3><br>
                                <hr>
                                @if($print == 'show')
                                <div class="gdlr-core-button" id="suc_msg">
                                    <strong>Your registration has been successfully submitted. Feedback will be communicated to you within 24 hours. Thank you</strong>
                                </div><br>
                                @endif
                                @if($succ !== null)
                                <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                    <button class="gdlr-core-button" type="button" id="print">Print</button>
                                    <a href="/send-biodata-email" class="gdlr-core-button" type="button">Send to Email</a>
                                    <a href="/student-portal" class="gdlr-core-button" type="button">Login</a>
                                </div>
                                @else
                                <span>Please confirm your details before submitting.</span>
                                @endif
                                <br>
                                @include('homepage.flash_message')
                            </div>
                        </div>

                        <form class="gdlr-core-course-form clearfix" method="post">
                            <div class="gdlr-core-course-form clearfix element-to-print" id="preview" style="padding: 10px; border: 1px solid black;">
                                <div class="gdlr-core-course-column gdlr-core-column-50" style="width: 100%; display: flex; justify-content:center">
                                    <img class="gdlr-core-course-column gdlr-core-column-10" style="margin-bottom: 20px;" src="/homepage/images/logo.png" alt="">
                                </div>
                                <h5 style="text-align: center;">STUDENT BIODATA</h5>
                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                    <img class="gdlr-core-course-column gdlr-core-column-50" src="/profile_images/{{$student->Photo}}" alt="">

                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for=""><br>Faculty: </label>
                                            <span>{{$faculty->name}}</span>
                                            <input type="text" value="{{$faculty->name}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Department: </label>
                                            <span>{{$department->name}}</span>
                                            <input type="text" value="{{$department->name}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Level: </label>
                                            <span>{{$student->level}}</span>
                                            <input type="text" value="{{$student->level}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-column gdlr-core-column-40">
                                    <h5 class="gdlr-core-course-column gdlr-core-column-50" style="border-bottom: 3px solid black;">Basic Information</h5>
                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">First Name: </label>
                                            <span>{{ucwords($student->first_name)}}</span>
                                            <input type="text" placeholder="First name" name="first_name" value="{{$student->first_name}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>
                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Last Name: </label>
                                            <span>{{ucwords($student->last_name)}}</span>
                                            <input type="text" placeholder="Last name" name="last_name" value="{{$student->last_name}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Email Address: </label>
                                            <span>{{$student->Email_Address}}</span>
                                            <input type="text" placeholder="" name="email_address" value="{{$student->Email_Address}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Matric Number: </label>
                                            <span>{{$student->matric_number}}</span>
                                            <input type="text" placeholder="Matric Number" name="matric_number" value="{{$student->matric_number}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Phone Number: </label>
                                            <span>{{$student->Student_Mobile_Number}}</span>
                                            <input type="text" placeholder="Phone Number" name="student_mobile_number" value="{{$student->Student_Mobile_Number}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>
                                    <h5 class="gdlr-core-course-column gdlr-core-column-50" style="border-bottom: 3px solid black;">Personal Information</h5>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Date of Birth: </label>
                                            <span>{{$student->date_of_birth}}</span>
                                            <input type="date" placeholder="Date of Birth" name="date_of_birth" value="{{$student->date_of_birth}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">Gender: </label>
                                            <span>{{ucwords($student->gender)}}</span>
                                            <input type="text" value="{{$student->gender}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">Blood Group: </label>
                                            <span>{{$student->blood_group}}</span>
                                            <input type="text" value="{{$student->blood_group}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">Marital Status: </label>
                                            <span>{{ucwords($student->marital_status)}}</span>
                                            <input type="text" value="{{$student->marital_status}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <h5 class="gdlr-core-course-column gdlr-core-column-50" style="border-bottom: 3px solid black;">Residential Information</h5>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">Country of Residence: </label>
                                            <span>{{ucwords($student->country_residence)}}</span>
                                            <input type="text" value="{{$student->country_residence}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">State of residence: </label>
                                            <span>{{$student->state_of_residence}}</span>
                                            <input type="text" value="{{$student->state_of_residence}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">LGA: </label>
                                            <span>{{$student->lga_of_residence}}</span>
                                            <input type="text" value="{{$student->lga_of_residence}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">Country: </label>
                                            <span>{{ucwords($student->nationality)}}</span>
                                            <input type="text" value="{{$student->nationality}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">State of Origin: </label>
                                            <span>{{$student->state_of_origin}}</span>
                                            <input type="text" value="{{$student->state_of_origin}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                            <label for="">LGA of Origin: </label>
                                            <span>{{$student->lga}}</span>
                                            <input type="text" value="{{$student->lga}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>


                                    <h5 class="gdlr-core-course-column gdlr-core-column-50" style="border-bottom: 3px solid black;">Other Information</h5>

                                    <p class="gdlr-core-course-column gdlr-core-column-50" style="text-decoration:underline"><b>Father's Information</b></span>
                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Full name: </label>
                                            <span>{{ucwords($student->fathers_name)}}</span>
                                            <input type="text" value="{{$student->fathers_name}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Residential Address: </label>
                                            <span>{{ucwords($student->fathers_address)}}</span>
                                            <input type="text" value="{{$student->fathers_address}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Phone number: </label>
                                            <span>{{$student->fathers_phone}}</span>
                                            <input type="text" value="{{$student->fathers_phone}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <p class="gdlr-core-course-column gdlr-core-column-50" style="text-decoration:underline"><br> 
                                    <b>Mother's Information</b></span>
                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Full name: </label>
                                            <span>{{ucwords($student->mothers_name)}}</span>
                                            <input type="text" value="{{$student->mothers_name}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Residential Address: </label>
                                            <span>{{$student->mothers_address}}</span>
                                            <input type="text" value="{{$student->mothers_address}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Phone number: </label>
                                            <span>{{$student->mothers_phone}}</span>
                                            <input type="text" value="{{$student->mothers_phone}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <p class="gdlr-core-course-column gdlr-core-column-50" style="text-decoration:underline"><br> 
                                    <b>Guardian's Information</b></span>
                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Full name: </label>
                                            <span>{{$student->guardians_name}}</span>
                                            <input type="text" value="{{$student->guardians_name}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Residential Address: </label>
                                            <span>{{$student->guardians_address}}</span>
                                            <input type="text" value="{{$student->guardians_address}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Phone number: </label>
                                            <span>{{$student->guardians_phone}}</span>
                                            <input type="text" value="{{$student->guardians_phone}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Relationship with student: </label>
                                            <span>{{$student->guardians_relationship}}</span>
                                            <input type="text" value="{{$student->guardians_relationship}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <p class="gdlr-core-course-column gdlr-core-column-50" style="text-decoration:underline">
                                    <b>Sponsor's Information: </b></p>
                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Full name: </label>
                                            <span>{{$student->sponsors_name}}</span>
                                            <input type="text" value="{{$student->sponsors_name}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Residential Address: </label>
                                            <span>{{$student->sponsors_address}}</span>
                                            <input type="text" value="{{$student->sponsors_address}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Phone number: </label>
                                            <span>{{$student->sponsors_phone}}</span>
                                            <input type="text" value="{{$student->sponsors_phone}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>

                                    <div class="gdlr-core-course-column gdlr-core-column-30" style="width:100%;">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Relationship with student: </label>
                                            <span>{{$student->sponsors_relationship}}</span>
                                            <input type="text" value="{{$student->sponsors_relationship}}" hidden style="background-color: #3b4b6b; color: #b1c0e0" />
                                        </div>
                                    </div>
                                    <div class="gdlr-core-course-column gdlr-core-column-60">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <input type="text" style="opacity: 0; height: 5px" name="">
                                        </div>
                                    </div>
                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <label for="">Medical Information: </label>
                                            <div>{{$student->medical_info}}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            @if($print !== null && $succ !== 'null')
                            <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                <button class="gdlr-core-button" type="button" id="print">Print</button>
                            </div>
                            @endif
                            @if($print == null)
                            <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                <input class="gdlr-core-full-size" type="button" id="submit" value="Submit" />
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <a href="/student_registration" style="display: none;" id="clickme">Click to Open Success Modal</a> -->
        <!-- <a href="#" id="clickme2">Click to Open fail Modal</a> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js" integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#print').click(function() {

            // $(".element-to-print").printThis({importCSS: true,});
            var element = document.getElementById('preview');
            // console.log(element);
            var opt = {
                filename:     'biodata.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
            };
            html2pdf(element, opt)
        })

        $(document).ready(function() {
            setTimeout(function() {
                $('#suc_msg').slideUp();
            }, 20000);
        })

        $('.close').click(function(){
            $('#close_alert').slideUp()
        })

        $('#submit').click(function() {
            window.location.href = '/student-registration-success'
        })
    </script>

    @endsection
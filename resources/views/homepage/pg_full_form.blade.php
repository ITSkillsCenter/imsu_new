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
                    <!-- <form class="gdlr-core-course-form clearfix" method="post" enctype="multipart/form-data"> -->
                    <div class="gdlr-core-pbf-column gdlr-core-column-full">
                        <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                            <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                <div class="gdlr-core-pbf-element">
                                    <div class="class_style gdlr-core-accordion-item gdlr-core-item-pdlr gdlr-core-item-pdb  gdlr-core-accordion-style-background-title-icon gdlr-core-left-align gdlr-core-icon-pos-right">

                                        <div class="gdlr-core-accordion-item-tab clearfix gdlr-core-active">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                                                    <div class="gdlr-core-title-item-title-wrap clearfix">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 32px ;">ACKNOWLEDGEMENT SLIP</h3>
                                                    </div>
                                                    <!-- <p class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Thank you for applying for the Post UTME of Imo State University, your application has been submitted successfully. You will be notified when the Post –UTME screening exercise is scheduled by the university. Thank You once again!</p> -->
                                                </div>
                                            </div>
                                            <div>
                                                @if($check !== null)
                                                <button type="button" class="btn btn-primary" id="show_receipt">Show Receipt</button>
                                                @endif
                                                <button type="button" class="btn btn-primary submit_form">Print Pass</button>
                                                <!-- <a class="btn btn-primary" style="color: white;" id="app_dash" href="/student-portal">Go to your application dashboard</a> -->
                                                <button type="button" class="btn btn-primary">
                                                    <a style="color: white;" href="/home/logout">Logout</a>
                                                </button>

                                            </div>
                                            <br>
                                            <div id="preview" style="display:none;">
                                                <div class="gdlr-core-course-form clearfix element-to-print" id="preview_page" style="padding: 10px; border: 1px solid black;">
                                                    <div class="gdlr-core-course-column gdlr-core-column-50" style="width: 100%; display: flex; justify-content:center">
                                                        <img class="gdlr-core-course-column gdlr-core-column-10" style="margin-bottom: 20px;" src="/homepage/images/logo.png" alt="">
                                                    </div>
                                                    <h5 style="text-align: center;">RECEIPT</h5>

                                                    <div class="gdlr-core-pbf-column gdlr-core-column-full">
                                                        <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;"></h5>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Date </label>
                                                                @php $date = date_create($check->created_at); @endphp
                                                                <p>{{ date_format($date,"jS F, Y") }}</p>
                                                                <!-- <p>{{$check->created_at}}</p> -->

                                                            </div>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Payment Reference </label>
                                                                <p>{{$check->reference_id}}</p>

                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Paid By </label>
                                                                <p>{{$std->first_name}} {{$std->last_name}}</p> <br>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Phone Number </label>
                                                                <p>{{$std->phone}}</p> <br>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-20">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Application Number </label>
                                                                <p>{{$std->application_number}}</p> <br>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-full">
                                                            <table>
                                                                <thead>
                                                                    <th style="text-align: center;">S/N</th>
                                                                    <th style="text-align: center;">Fee Name</th>
                                                                    <th style="text-align: center;">Amount</th>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Application Fee</td>
                                                                        <td>₦{{number_format($check->amount, 2)}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>

                                                </div>
                                                <br>
                                                <div>
                                                    <button type="button" class="btn btn-primary" id="print_receipt">Print Receipt</button>
                                                </div>
                                                <br>
                                            </div>


                                            <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                            <div class="gdlr-core-course-form clearfix element-to-print" id="preview_exam_pass" style="padding: 10px; border: 1px solid black;">
                                                <div class="gdlr-core-course-column gdlr-core-column-50" style="width: 100%; display: flex; justify-content:center">
                                                    <img class="gdlr-core-course-column gdlr-core-column-20" style="margin-bottom: 20px;" src="/homepage/images/logo.png" alt="">
                                                </div>
                                                <!-- <h5 style="text-align: center;">EXAM PASS</h5> -->
                                                <p style="text-align: center; font-weight:bold;">IMO STATE UNIVERSITY, OWERRI, NIGERIA POST-GRADUATE SCREENING EXERCISE ACKNOWLEDGEMENT SLIP</p>
                                                <div class="gdlr-core-pbf-column gdlr-core-column-full">
                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">Basic Information</h5>
                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Full Name: </label>
                                                            <p>{{ucwords($std->first_name . ' ' . $std->last_name)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Application Number: </label>
                                                            <p>{{$std->application_number}}</p>
                                                        </div>
                                                    </div>



                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Title: </label>
                                                            <p>{{ucwords($std->title)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Email Address: </label>
                                                            <p>{{$std->email}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Phone Number: </label>
                                                            <p>{{$std->phone}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Date of Birth: </label>
                                                            <p>{{$std->dob}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Gender: </label>
                                                            <p>{{$std->gender}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Marital Status: </label>
                                                            <p>{{$std->marital_status}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Country of Origin: </label>
                                                            <p>{{ucwords($std->country_of_origin)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">State of Origin: </label>
                                                            <p>{{ucwords($std->state_of_origin)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">LGA of Origin: </label>
                                                            <p>{{ucwords($std->lga_of_origin)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Home Town: </label>
                                                            <p>{{ucwords($std->town_of_origin)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Country of Residence: </label>
                                                            <p>{{ucwords($std->state_of_residence)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">State of Residence: </label>
                                                            <p>{{ucwords($std->state_of_residence)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">LGA of Residence: </label>
                                                            <p>{{ucwords($std->lga_of_residence)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Town of residence: </label>
                                                            <p>{{ucwords($std->town_of_residence)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Address of residence</label>
                                                            <p>{{$std->location_of_residence}}</p>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Program</label>
                                                                    <p>Undergraduate</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Mode of Admission</label>
                                                                    <p>{{$std->mode_of_admission}}</p>
                                                                </div>
                                                            </div> -->
                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">&nbsp;</label>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                    </div>

                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">PROGRAMME OF STUDY DETAILS</h5>

                                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Faculty: </label>
                                                            <p>{{ucwords(Helper::get_faculty($std->faculty_id)->name)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Department: </label>
                                                            <p>{{ucwords(Helper::get_department($std->dept_id)->name)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Programme: </label>
                                                            <p>{{ucwords(Helper::get_programme($std->programme_id)->name)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Specialization: </label>
                                                            <p>{{ucwords(Helper::get_specialization($std->specialization_id)->name)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Qualification: </label>
                                                            <p>{{ucwords($std->qualification)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-full">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Study Type: </label>
                                                            <p>{{ucwords($std->study_type)}}</p>
                                                        </div>
                                                    </div>

                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">FUNDING DETAILS</h5>

                                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">How you intend to finance your studies: </label>
                                                            <p>{{ucwords($std->funding)}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Is this funding definite or proposed? </label>
                                                            <p>{{ucwords($std->funding_type)}}</p>
                                                        </div>
                                                    </div>


                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">PREVIOUS EDUCATION DETAILS</h5>
                                                    @php
                                                    $prev = json_decode($std->previous_education, true);
                                                    $olevel = json_decode($std->olevel, true);

                                                    $ct = 1; $ol = 1;
                                                    @endphp



                                                    @foreach($prev as $single)
                                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for=""></label>
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <p>Institution {{$ct++}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-course-column gdlr-core-column-10">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">&nbsp;</label>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Name</label>
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <p>{{$single['name']}}</p>
                                                                <!-- <input type="text" class="my_input" value="" name="prevedu[1][name]" placeholder="Imo state university" required /> -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Programme Studied</label>
                                                            <p>{{$single['programme_studied']}}</p>
                                                            <!-- <input type="text" class="my_input" name="prevedu[1][]" value="" required /> -->
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Qualification</label>
                                                            <p>{{$single['qualification']}}</p>
                                                            <!-- <input type="text" class="my_input" name="prevedu[1][]" value="" required /> -->
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Grade Achieved</label>
                                                            <p>{{$single['grade_achieved']}}</p>
                                                            <!-- <input type="text" class="my_input" name="prevedu[1][grade_achieved]" value="" required /> -->
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Duration of studies</label>
                                                            <p>{{$single['duration_of_studies']}}</p>
                                                            <!-- <input type="text" class="my_input" name="prevedu[1][duration_of_studies]" value="" required /> -->
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Date of award</label>
                                                            <p>{{$single['date_of_award']}}</p>
                                                            <!-- <input type="date" class="my_input" name="prevedu[1][date_of_award]" value="" required /> -->
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                    <!-- <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">O'Level</h5> -->

                                                    @foreach($olevel as $single)
                                                    @if($single['exam_type'] !== null)
                                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for=""></label>
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <p>O'level {{$ol++}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-course-column gdlr-core-column-10">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">&nbsp;</label>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Exam Type: </label>
                                                            <p>{{ucwords($single['exam_type'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">School: </label>
                                                            <p>{{ucwords($single['school'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Exam Number: </label>
                                                            <p>{{ucwords($single['exam_number'])}}</p>
                                                        </div>
                                                    </div>


                                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                                        <label for="">Grade: </label>
                                                        @foreach($single['exams']['subject'] as $key => $value)
                                                        @if($value !== null)
                                                        <span>{{$value}} - {{$single['exams']['grade'][$key]}},</span>
                                                        @endif
                                                        @endforeach
                                                        <br>
                                                    </div>
                                                    @endif
                                                    @endforeach

                                                    <div class="gdlr-core-course-column gdlr-core-column-10">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">&nbsp;</label>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                    </div>


                                                    @php 
                                                        $employment = json_decode($std->employment, true);
                                                        $nok = json_decode($std->next_of_kin, true);
                                                    @endphp
                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;"><br> PREVIOUS EMPLOYMENT DETAILS</h5>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Name of Employer</label>
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <p>{{ucwords($employment['name'])}}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Address of employer </label>
                                                            <p>{{ucwords($employment['address'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Phone number of employer </label>
                                                            <p>{{ucwords($employment['phone'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Duration of Employment </label>
                                                            <p>{{ucwords($employment['duration'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Designation </label>
                                                            <p>{{ucwords($employment['designation'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Key responsibilities </label>
                                                            <p>{{ucwords($employment['responsibilities'])}}</p>
                                                        </div>
                                                    </div>

                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;"><br> Next Of Kin</h5>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Name</label>
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <p>{{ucwords($nok['name'])}}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Phone </label>
                                                            <p>{{ucwords($nok['phone'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Address </label>
                                                            <p>{{ucwords($nok['address'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Email</label>
                                                            <p>{{ucwords($nok['email'])}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-10">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">&nbsp;</label>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                    </div>

                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;"><br> Statement in support of your application</h5>

                                                    <div class="gdlr-core-course-column gdlr-core-column-50">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <!-- <label for="">Essay</label> -->
                                                            <p>{{$std->supporting_information}}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        @csrf
                                        <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                            <!-- <input  value="Submit" /> -->
                                            <button type="button" id="submit_form" class="submit_form btn btn-primary">Print</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="/std_registration" style="display: none;" id="clickme">Click to Open Success Modal</a> -->
    <!-- <a href="#" id="clickme2">Click to Open fail Modal</a> -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        var url_string = window.location.href
        var url = new URL(url_string);
        var c = url.searchParams.has("p");
        if (c == true) {
            // $('.submit_form').click()
            $('#app_dash').slideUp()
        }
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    $('#show_receipt').click(function() {
        $('#preview').slideToggle()
    })

    $('#print_receipt').click(function() {

        // $(".element-to-print").printThis({importCSS: true,});
        var element = document.getElementById('preview_page');
        // console.log(element);
        var opt = {
            filename: 'Application_fee_receipt.pdf',
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
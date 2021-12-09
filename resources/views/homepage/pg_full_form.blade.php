@extends('layouts.homepage_layout')
@section('content')
<style>
    label {
        color: #3b4b6b;
    }

    .kingster-body p,
    .kingster-body label {
        line-height: 1px !important;
        margin-bottom: 20px !important;
    }

    .stylo {
        width: 100%;
        display: flex;
        justify-content: space-between;
        margin-bottom: 2px !important;
    }

    h5 {
        margin-bottom: 5px !important;
    }

    table tr td {
        padding: 0px !important;
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
                                                <button type="button" class="btn btn-primary submit_form">Print Acknowledgement Slip</button>
                                                <a class="btn btn-primary" style="color: white;" id="app_dash" href="/pg-application-step3/{{base64_encode($std->email)}}">Edit Application</a>
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
                                                                    <th style="padding:0px; text-align: center;">S/N</th>
                                                                    <th style="padding:0px; text-align: center;">Fee Name</th>
                                                                    <th style="padding:0px; text-align: center;">Amount</th>
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
                                            <div class="gdlr-core-course-form clearfix element-to-print" id="preview_exam_pass" style="padding: 20px; border: 1px solid black;">
                                                <div class="gdlr-core-course-column gdlr-core-column-50" style="width: 100%; display: flex; justify-content:space-around">
                                                    <img class="gdlr-core-course-column gdlr-core-column-20" style="margin-bottom: 20px;" src="/homepage/images/logo.png" alt="">
                                                    <!-- <img class="gdlr-core-course-column gdlr-core-column-20" style="margin-bottom: 20px; height:100px" src="/uploads/postgraduate/{{$std->passport}}" alt=""> -->
                                                </div>
                                                <div>
                                                    <h5 style="text-align: center;">SCHOOL OF POST-GRADUATE STUDIES</h5>
                                                    <p style="text-align: center; font-weight:bold; margin-bottom: 0px;">POSTGRADUATE APPLICATION SUMMARY FORM</p>
                                                    <P style="text-align: center; font-weight:bold; margin-bottom: 0px;">{{Helper::get_current_semester()}}ACADEMIC SESSION</P>
                                                    <!-- <p style="text-align: center; font-weight:bold; margin-bottom: 0px;">Application For Admission Acknowledgement Form</p> -->
                                                </div>

                                                <div class="gdlr-core-pbf-column gdlr-core-column-full">
                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black; text-align:center">Basic Information</h5>
                                                    <br>
                                                    <div class="gdlr-core-course-column gdlr-core-column-40">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Full Name: </label>
                                                            <p>{{ucwords($std->first_name . ' ' . $std->last_name)}}</p>
                                                        </div>
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Application Number: </label>
                                                            <p>{{$std->application_number}}</p>
                                                        </div>
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Title: </label>
                                                            <p>{{ucwords($std->title)}}</p>
                                                        </div>
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Email Address: </label>
                                                            <p>{{$std->email}}</p>
                                                        </div>
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Phone Number: </label>
                                                            <p>{{$std->phone}}</p>
                                                        </div>
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Date of Birth: </label>
                                                            <p>{{$std->dob}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Gender: </label>
                                                            <p>{{$std->gender}}</p>
                                                        </div>


                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Country of Origin: </label>
                                                            <p>{{ucwords($std->country_of_origin)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">State of Origin: </label>
                                                            <p>{{ucwords($std->state_of_origin)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">LGA of Origin: </label>
                                                            <p>{{ucwords($std->lga_of_origin)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Home Town: </label>
                                                            <p>{{ucwords($std->town_of_origin)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Country of Residence: </label>
                                                            <p>{{ucwords($std->state_of_residence)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">State of Residence: </label>
                                                            <p>{{ucwords($std->state_of_residence)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">LGA of Residence: </label>
                                                            <p>{{ucwords($std->lga_of_residence)}}</p>
                                                        </div>



                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Town of residence: </label>
                                                            <p>{{ucwords($std->town_of_residence)}}</p>
                                                        </div>


                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id stylo">
                                                            <label for="">Address of residence</label>
                                                            <p>{{$std->location_of_residence}}</p>
                                                        </div>

                                                    </div>


                                                    <div class="gdlr-core-course-column gdlr-core-column-20" style="min-height: 47vh; display: flex; align-items: center;">
                                                        <img class="gdlr-core-course-column" src="/uploads/postgraduate/{{$std->passport}}" alt="">
                                                    </div>



                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black; text-align:center">&nbsp;</h5>

                                                    <h5 class="gdlr-core-course-column gdlr-core-column-full text-center mt-5">PROGRAMME DETAILS</h5>

                                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for=""> </label>
                                                            <p><b>Faculty:</b> {{ucwords(Helper::get_faculty($std->faculty_id)->name)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for=""> </label>
                                                            <p><b>Qualification:</b> {{ucwords($std->qualification)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for=""> </label>
                                                            <p><b>Programme:</b> {{ucwords(Helper::get_programme($std->programme_id)->name)}}</p>
                                                        </div>

                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for=""> </label>
                                                            <p><b>Department:</b> {{ucwords(Helper::get_department($std->dept_id)->name)}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for=""> </label>
                                                            <p><b>Specialization:</b> {{ucwords(Helper::get_specialization($std->specialization_id)->name) ?? ' '}}</p>
                                                        </div>

                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for=""></label>
                                                            <p><b>Study Type: </b>{{ucwords($std->study_type)}}</p>
                                                        </div>

                                                    </div>

                                                    <!-- <div class="gdlr-core-course-column gdlr-core-column-10">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Qualification: </label>
                                                            <p>{{ucwords($std->qualification)}}</p>
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
                                                            <p>{{ucwords(Helper::get_specialization($std->specialization_id)->name) ?? ' '}}</p>
                                                        </div>
                                                    </div>



                                                    <div class="gdlr-core-course-column gdlr-core-column-full">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Study Type: </label>
                                                            <p>{{ucwords($std->study_type)}}</p>
                                                        </div>
                                                    </div> -->

                                                    @php
                                                    $prev = json_decode($std->previous_education, true);
                                                    $olevel = json_decode($std->olevel, true);
                                                    $first_referee = json_decode($std->first_referee, true);
                                                    $second_referee = json_decode($std->second_referee, true);
                                                    $third_referee = json_decode($std->third_referee, true);

                                                    $ct = 1; $ol = 1;
                                                    @endphp
                                                    <div class="gdlr-core-course-column gdlr-core-column-full">
                                                        <table>
                                                            <thead>
                                                                <th style="padding:0px; text-align: center;">INSTITUTIONS</th>
                                                                <th style="padding:0px; text-align: center;">QUALIFICATIONS</th>
                                                                <th style="padding:0px; text-align: center;">CLASS OF DEGREE</th>
                                                                <th style="padding:0px; text-align: center;">DISCIPLINE</th>
                                                                <th style="padding:0px; text-align: center;">YEAR</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($prev as $single)
                                                                <tr>
                                                                    <td>{{$single['name']}}</td>
                                                                    <td>{{$single['qualification']}}</td>
                                                                    <td>{{$single['grade_achieved']}}</td>
                                                                    <td>{{$single['programme_studied']}}</td>
                                                                    <td>{{$single['duration_of_studies']}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-full">
                                                        <table>
                                                            <thead>
                                                                <th style="padding:0px; text-align: center;">Referee</th>
                                                                <th style="padding:0px; text-align: center;">Address</th>
                                                                <th style="padding:0px; text-align: center;">Mobile No.</th>
                                                                <th style="padding:0px; text-align: center;">Email</th>
                                                            </thead>
                                                            <tbody>
                                                                @if($first_referee !== null)
                                                                <tr>
                                                                    <td>{{$first_referee['name']}}</td>
                                                                    <td>{{$first_referee['address']}}</td>
                                                                    <td>{{$first_referee['phone']}}</td>
                                                                    <td>{{$first_referee['email']}}</td>
                                                                </tr>
                                                                @endif
                                                                @if($second_referee !== null)
                                                                <tr>
                                                                    <td>{{$second_referee['name']}}</td>
                                                                    <td>{{$second_referee['address']}}</td>
                                                                    <td>{{$second_referee['phone']}}</td>
                                                                    <td>{{$second_referee['email']}}</td>
                                                                </tr>
                                                                @endif
                                                                @if($third_referee !== null)
                                                                <tr>
                                                                    <td>{{$third_referee['name']}}</td>
                                                                    <td>{{$third_referee['address']}}</td>
                                                                    <td>{{$third_referee['phone']}}</td>
                                                                    <td>{{$third_referee['email']}}</td>
                                                                </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br><br><br>
                                                    @foreach($olevel as $single)
                                                    <div class="gdlr-core-course-column gdlr-core-column-{{count($olevel) > 1 ? '30' : 'full'}}">
                                                        
                                                        @if($single['exam_type'] !== null)
                                                        <div class="gdlr-core-course-column gdlr-core-column-50">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for=""></label>
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id" style="padding-top: 10px;">
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
                                                        <div class="gdlr-core-course-column gdlr-core-column-30">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Exam Type: </label>
                                                                <p>{{ucwords($single['exam_type'])}}</p>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-30">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">School: </label>
                                                                <p>{{ucwords($single['school'])}}</p>
                                                            </div>
                                                        </div>

                                                        <div class="gdlr-core-course-column gdlr-core-column-30">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Exam Number: </label>
                                                                <p>{{ucwords($single['exam_number'])}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="gdlr-core-course-column gdlr-core-column-30">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">Exam Year: </label>
                                                                <p>{{ucwords($single['year'])}}</p>
                                                            </div>
                                                        </div>


                                                        <div class="gdlr-core-course-column gdlr-core-column-full">
                                                            <table style="text-align: left; margin-bottom:0px;">
                                                                <thead>
                                                                    <th style="padding:0px;">Subject</th>
                                                                    <th style="padding:0px;">Grade</th>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($single['exams']['subject'] as $key => $value)
                                                                @if($value !== null)
                                                                    <tr>
                                                                        <td>{{$value}}</td>
                                                                        <td>{{$single['exams']['grade'][$key]}}</td>
                                                                    </tr>
                                                                @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        @endif
                                                        <br>
                                                        <!-- <div class="gdlr-core-course-column gdlr-core-column-10">
                                                            <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                <label for="">&nbsp;</label>
                                                                <p>&nbsp;</p>
                                                            </div>
                                                        </div> -->
                                                        
                                                        
                                                    </div>
                                                    @endforeach

                                                    <div class="gdlr-core-course-column gdlr-core-column-60">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label for="">Abstract: </label>
                                                            <div style="min-height: 70vh;">{{$std->supporting_information}}</div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="gdlr-core-course-column gdlr-core-column-10">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            &nbsp;
                                                        </div>
                                                    </div> -->

                                                    <br><br><br><br>

                                                    <div class="gdlr-core-course-column gdlr-core-column-full">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                            <label style="text-align: center;" for="">Section B (For official use only)</label>
                                                            <div>Recommendations of the departmental postgraduate committee</div>
                                                            <div>
                                                                a) Name of Department <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                b) Application recommended for approval (Yes/No) <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                c) Comments <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                d) Name of supervisor(s) (if recommended) <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                e) Head of department's name <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                Signature <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> 
                                                                Date <span style="width: 15em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> 
                                                            </div>
                                                            <br>
                                                            <div>Recommendations of the faculty postgraduate committee</div>
                                                            <div>
                                                                a) Application recommended for approval (Yes/No) <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                b) Comments <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                c) Dean's name <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                Signature <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> 
                                                                Date <span style="width: 15em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> 
                                                            </div>
                                                            <br>
                                                            <div>Decision of school of postgraduate studies</div>
                                                            <div>
                                                                a) Application recommended for approval (Yes/No) <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                b) Comments (if any)<span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> <br>
                                                                c)Signature <span style="width: 20em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> 
                                                                Date <span style="width: 15em;display: inline-block; height: 1px;background-color: #4b4b4d;"></span> 
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <!-- <div class="gdlr-core-course-column gdlr-core-column-20">
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
                                                    </div> -->

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
                                                    <!-- <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">&nbsp;</label>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                    </div> -->

                                                    <!-- <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">PROGRAMME OF STUDY DETAILS</h5> -->

                                                    <!-- <div class="gdlr-core-course-column gdlr-core-column-30">
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
                                                            <p>{{ucwords(Helper::get_specialization($std->specialization_id)->name) ?? ' '}}</p>
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
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Programme Studied</label>
                                                            <p>{{$single['programme_studied']}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Qualification</label>
                                                            <p>{{$single['qualification']}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Grade Achieved</label>
                                                            <p>{{$single['grade_achieved']}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Duration of studies</label>
                                                            <p>{{$single['duration_of_studies']}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="gdlr-core-course-column gdlr-core-column-20">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">Date of award</label>
                                                            <p>{{$single['date_of_award']}}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach -->

                                                    <!-- <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">O'Level</h5> -->

                                                    <!-- @foreach($olevel as $single)
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
                                                    <div class="gdlr-core-course-column gdlr-core-column-10">
                                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <label for="">&nbsp;</label>
                                                            <p>&nbsp;</p>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                    


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
                                                            <p>{{$std->supporting_information}}</p>
                                                        </div>
                                                    </div> -->

                                                </div>
                                            </div>
                                        </div>

                                        @csrf
                                        <div class="gdlr-core-course-form-submit gdlr-core-course-column gdlr-core-column-first gdlr-core-center-align">
                                            <!-- <input  value="Submit" /> -->
                                            <button type="button" id="submit_form" class="submit_form btn btn-primary">Print Acknowledgement Slip</button>
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
            filename: 'PG_Acknoledgement_form.pdf',
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
                quality: 1
            },
            html2canvas: {
                scale: 1
            },
        };
        html2pdf(element, opt)
    })

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

@endsection
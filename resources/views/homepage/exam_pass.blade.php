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
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 32px ;">Exam Pass</h3>
                                                            </div><p class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Thank you for applying for the Post UTME of Imo State University, your application has been submitted successfully. You will be notified when the Post –UTME screening exercise  is scheduled by the university. Thank You once again!</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-primary" id="show_receipt">Show Receipt</button>
                                                        <button type="button" class="btn btn-primary submit_form">Print Pass</button>
                                                        <a class="btn btn-primary" style="color: white;" id="app_dash" href="/student-portal">Go to your application dashboard</a>
                                                        <button type="button"  class="btn btn-primary">
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
                                                                        <p>{{$check->name}}</p> <br>
                                                                    </div>
                                                                </div>

                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <label for="">Phone Number </label>
                                                                        <p>{{$check->phone}}</p> <br>
                                                                    </div>
                                                                </div>

                                                                <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                    <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                        <label for="">Jamb Registration Number </label>
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
                                                        <p style="text-align: center; font-weight:bold;">IMO STATE UNIVERSITY, OWERRI, NIGERIA POST-UTME/DIRECT ENTRY SCREENING EXERCISE ACKNOWLEDGEMENT SLIP</p>
                                                        <div class="gdlr-core-pbf-column gdlr-core-column-full">
                                                            <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">Basic Information</h5>
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Full Name: </label>
                                                                    <p>{{ucwords($std->full_name)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Jamb Registration Number: </label>
                                                                    <p>{{$std->application_number}}</p>
                                                                </div>
                                                            </div>



                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                    <label for="">Course: </label>
                                                                    <p>{{ucwords($std->course)}}</p>
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
                                                                    <p>{{$std->phone_number}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Date of Birth: </label>
                                                                    <p>{{$std->date_of_birth}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Gender: </label>
                                                                    <p>{{$std->sex}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Country: </label>
                                                                    <!-- <p>{{ucwords($std->country)}}</p> -->
                                                                    <p>Nigeria</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">State: </label>
                                                                    <p>{{ucwords($std->state)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">LGA: </label>
                                                                    <p>{{ucwords($std->lga)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Home Town: </label>
                                                                    <p>{{ucwords($std->home_town)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Address</label>
                                                                    <p>{{$std->address}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
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
                                                            </div>
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">&nbsp;</label>
                                                                    <p>&nbsp;</p>
                                                                </div>
                                                            </div>

                                                            <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">Result</h5>

                                                            <div class="gdlr-core-course-column gdlr-core-column-30">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-department">
                                                                    <label for="">Jamb Score: </label>
                                                                    <p>{{ucwords($std->jamb_score)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-30">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Jamb Score: </label>
                                                                    <p>
                                                                        {{$std->jamb_subject1}} ({{$std->score1}}), {{$std->jamb_subject2}} ({{$std->score2}}),
                                                                        {{$std->jamb_subject3}} ({{$std->score3}}), {{$std->jamb_subject4}} ({{$std->score4}})
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            @php
                                                            $exam1 = json_decode($std->exam_1);
                                                            $olevel_1 = json_decode($std->olevel_1, true)

                                                            @endphp

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Exam Type: </label>
                                                                    <p>{{ucwords($exam1->type)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">School: </label>
                                                                    <p>{{ucwords($exam1->school)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Exam Number: </label>
                                                                    <p>{{ucwords($exam1->exam_number)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-60">
                                                                <label for="">Grade: </label>
                                                                @foreach($olevel_1 as $key => $value)
                                                                <span>{{$key}} - {{$value}},</span>
                                                                @endforeach
                                                                <br>
                                                            </div>

                                                            @if($std->exam_2 !== null)

                                                            @php
                                                            $exam2 = json_decode($std->exam_2);
                                                            $olevel_2 = json_decode($std->olevel_2, true)

                                                            @endphp

                                                            <br>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Exam Type 2: </label>
                                                                    <p>{{ucwords($exam2->type)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">School 2: </label>
                                                                    <p>{{ucwords($exam2->school)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Exam Number 2: </label>
                                                                    <p>{{ucwords($exam2->exam_number)}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-60">
                                                                <label for="">Grade 2: </label>
                                                                @foreach($olevel_2 as $key => $value)
                                                                <span>{{$key}} - {{$value}},</span>
                                                                @endforeach
                                                                <br>
                                                            </div>

                                                            @endif

                                                            @if($std->mode_of_admission == 'Direct Entry')
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Higher Institution Attended: </label>
                                                                    <p>{{$std->higher_institution_attended}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Programme Studied: </label>
                                                                    <p>{{$std->programme_studied}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Certificate Obtained: </label>
                                                                    <p>{{$std->certificate_obtained}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Grade Achieved: </label>
                                                                    <p>{{$std->grade_achieved}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-40">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">&nbsp;</label>
                                                                    <p>&nbsp;</p>
                                                                </div>
                                                            </div>
                                                            @endif


                                                            <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;"><br> Other Information</h5>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Alternate Phone </label>
                                                                    <p>{{$std->phone_number_alt}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Alternate Email</label>
                                                                    <p>{{$std->email_alt}}</p>
                                                                </div>
                                                            </div>



                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Next of Kin</label>
                                                                    <p>{{$std->phone_number_alt}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="gdlr-core-course-column gdlr-core-column-20">
                                                                <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                                    <label for="">Next of Kin phone number</label>
                                                                    <p>{{$std->next_of_kin_phone}}</p>
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
    $(document).ready(function(){
        var url_string = window.location.href
        var url = new URL(url_string);
        var c = url.searchParams.has("p");
        if(c == true){
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
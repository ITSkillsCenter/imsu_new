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
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 32px ;">TRANSCRIPT LABEL</h3>
                                                    </div>
                                                    <p class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;"></p>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary submit_form">Print Transcript Label</button>
                                            </div>
                                            <br>

                                            <div class="gdlr-core-accordion-item-icon gdlr-core-js gdlr-core-skin-icon "></div>
                                            <div class="gdlr-core-course-form clearfix element-to-print" id="preview_exam_pass" style="padding: 10px; border: 1px solid black;">
                                                <div class="gdlr-core-course-column gdlr-core-column-50" style="width: 100%; display: flex; justify-content:center">
                                                    <img class="gdlr-core-course-column gdlr-core-column-20" style="margin-bottom: 20px;" src="/homepage/images/logo.png" alt="">
                                                </div>
                                                <div>
                                                    <h5 style="text-align: center;">SCHOOL OF POST-GRADUATE STUDIES</h5>
                                                    <!-- <p style="text-align: center; font-weight:bold;">Application for Admission Acknowledgement Slip</p> -->
                                                </div>
                                                <!-- <h5 style="text-align: center;">EXAM PASS</h5> -->
                                                <hr>
                                                <!-- <div class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 1px solid balck;"></div> -->
                                                <!-- <p style=" font-weight:bold;">TRANSCRIPT LABEL</p> -->
                                                <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="text-align: center; font-size: 25px ;">TRANSCRIPT LABEL</h3>
                                                <div class="gdlr-core-pbf-column gdlr-core-column-full">
                                                    <!-- <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">Basic Information</h5> -->
                                                    <div class="gdlr-core-course-column gdlr-core-column-30">

                                                        <div style="border: 1px solid black; min-height:96vh; padding:10px 15px" class="gdlr-core-course-column gdlr-core-column-full gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <div>
                                                                <p>To the registrar,</p> <br>
                                                                <p style="width: 300px; border-bottom: 1px solid black"></p>
                                                                <p>Please attach this label to the official transcript of my academic record and forward to</p>
                                                                <p>
                                                                    The Secretary, <br>
                                                                    School of Post Graduate Studies, <br>
                                                                    Imo State University, <br>
                                                                    Owerri, Imo State, Nigeria. <br><br>
                                                                    Thank you.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="gdlr-core-course-column gdlr-core-column-10">&nbsp;</div> -->
                                                    </div>



                                                    <div class="gdlr-core-course-column gdlr-core-column-30">
                                                        <div style="border: 1px solid black; min-height:96vh; padding:10px 15px" class="gdlr-core-course-column gdlr-core-column-full gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                                            <p for="" style="font-weight: bold;">Application Number: </p>
                                                            <p style="border-bottom: 1px solid black">{{$std->application_number}}</p>

                                                            <p for="" style="font-weight: bold;">Surname: </p>
                                                            <p style="border-bottom: 1px solid black">{{$std->last_name}}</p>

                                                            <p for="" style="font-weight: bold;">Other Names: </p>
                                                            <p style="border-bottom: 1px solid black">{{$std->first_name}}</p>

                                                            <p for="" style="font-weight: bold;">Faculty to which admission is sought: </p>
                                                            <p style="border-bottom: 1px solid black">{{Helper::get_faculty($std->faculty_id)->name}}</p>

                                                            <p for="" style="font-weight: bold;">Department: </p>
                                                            <p style="border-bottom: 1px solid black">{{Helper::get_department($std->dept_id)->name}}</p>

                                                            <p for="" style="font-weight: bold;">Programme: </p>
                                                            <p style="border-bottom: 1px solid black">{{Helper::get_programme($std->programme_id)->name}}</p>

                                                            <p for="" style="font-weight: bold;">Applying For Session Commencing On: </p>
                                                            <p style="border-bottom: 1px solid black">{{Helper::current_session_details()->title}}</p>

                                                        </div>
                                                        <!-- <div class="gdlr-core-course-column gdlr-core-column-10">&nbsp;</div> -->
                                                    </div>

                                                    <div style="padding: 10px;">
                                                        <br> NOTE: <br>
                                                        Please complete the Transcript Label and ask your university to send the Label along with your Transcript.
                                                        If you are a graduate of Imo State University and you are proposing to pursue postgraduate studies, you should enclose the photocopy of the notification of your Imo State University Degree Result with your application acknowledgement form.
                                                        <br>
                                                    </div>

                                                    <!-- <h5 class="gdlr-core-course-column gdlr-core-column-full" style="border-bottom: 3px solid black;">Result</h5> -->





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
            filename: 'SPGS_IMSU_Transcript_Label.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 1
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
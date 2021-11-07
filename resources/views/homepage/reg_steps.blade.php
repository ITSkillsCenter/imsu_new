@extends('layouts.homepage_layout')
@section('content')
<div class="gdlr-core-page-builder-body">

    <div class="gdlr-core-pbf-wrapper" id="div_1dd7_105">
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container ">

                <div class="gdlr-core-pbf-wrapper " style="padding: 115px 0px 40px 0px;">
                    <div class="gdlr-core-pbf-background-wrap" style="background-color: #f3f3f3 ;"></div>
                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                            <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                                <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                    <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " style="max-width: 760px ;">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                                                <div class="gdlr-core-title-item-title-wrap clearfix">
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">REGISTRATION STEPS</h3>
                                                </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Hello <b>{{session()->get('student')['first_name']}} {{session()->get('student')['last_name']}}</b>, you are required to follow the steps below to complete your registration.</span>
                                            </div>
                                        </div>
                                        <div>
                                        @include('homepage.flash_message')
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div>
                                            <b>1. As a new student, you need to signup and verify your email.</b><br>
                                            Ensure you verify your email, after which you will be required to pay acceptance fee.
                                            </div><br>
                                            <div>
                                                <b>2. Pay or Verify Acceptance Fee</b><br>
                                              If you have paid for acceptance fee elsewhere, kindly verify the payment by clicking the "Verify Acceptance fee" button and upload your payment receipt. Wait for 24 hours for Admin to verify and approve your payment. 
                                            </div><br>
                                            <div>
                                                <b>3. As New Student</b><br>
                                                Ensure you have verified your email, click continue to complete your registration process.
                                            </div><br>
                                            <div>
                                                <b>4. Complete Registration Form</b><br>
                                                Instruction for passport photo Color, Facing forward and looking straight to the camera, white or red background. <br>
                                                Complete your Student registration form. Preview your completely filled form, ensure no mistakes, then submit.
                                            </div><br>
                                            <div>
                                                <b>5. Print Your submitted form and Login to pay your school fees</b><br>
                                                click the Login button, proceed to your student dashboard and pay your School Fees.
                                            </div><br>

                                            <div>
                                                <a class="gdlr-core-button gdlr-core-button-solid gdlr-core-button-no-border" href="/student-registration-form">Continue</a>
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
    
    <style>
        .payment_btn{width:49%;}
        @media (max-width: 768px) {
            .payment_btn{width:100%; margin-bottom:10px!important;}
        }
        
    </style>
    <!-- <a href="/student_registration" style="display: none;" id="clickme">Click to Open Success Modal</a>
    <a href="#" id="clickme2">Click to Open fail Modal</a> -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.close').click(function(){
        $('#close_alert').slideUp()
    })
    
</script>
@endsection
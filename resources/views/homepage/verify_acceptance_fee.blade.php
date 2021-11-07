@extends('layouts.homepage_layout')
@section('content')
<style>
   

    #vn-info {
        display: none;
        /* background: #fff; */
        color: #000;
        padding: 30px 20px
    }

    @media (max-width: 768px) {
        .payment_btn {
            width: 100%;
            margin-bottom: 10px !important;
        }
    }
</style>
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
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">VERIFY ACCEPTANCE FEE</h3>
                                                </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Hello <b>{{session()->get('student')['first_name']}} {{session()->get('student')['last_name']}}</b>, Kindly indicate where you paid your fee and upload your receipt for verification.</span>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                                @include('homepage.flash_message')
                                                <div role="form" class="wpcf7">
                                                    <div class="screen-reader-response"></div>
                                                    <form class="quform" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="quform-elements">
                                                            @if(session()->get('student')['registration_number'])
                                                              <input id="" 
                                                                name="student_id" type="hidden" value="{{session()->get('student')['registration_number']}}" class="input1" aria-required="true" readonly>
                                                            @else
                                                               <div class="quform-element">
                                                                    <p>Registration Number
                                                                        <br>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input id="" type="text" name="student_id" class="input1" aria-required="true" required>
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            @endif
                                                            <div class="quform-element">
                                                                <p>Where did you pay your Acceptance Fee?
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <input id="paid_via" type="text" name="paid_via" class="input1" aria-required="true" required>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="quform-element">
                                                                <p>When: Enter date
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <input id="date" type="date" name="date" class="input1" aria-required="true" required>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="quform-element">
                                                                <p>Upload your receipt
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-email">
                                                                        <input name="receipt_image" class="input1" aria-required="true" type="file">
                                                                    </span>
                                                                </p>
                                                            </div>

                                                            <a href="/">
                                                            <div class="col-md-5 btn btn-primary" style="background-color: #d9534f;">
                                                                      <span class="">Cancel</span>
                                                            </div>
                                                            </a>
                                                            <div class="col-md-2"></div>

                                                            <button type="submit" class="col-md-5 btn btn btn-primary">
                                                                <span class="">Submit for Verification</span>
                                                            </button>
                                                        </div>
                                                    </form>
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
    </div>
</div>
<style>
    input:read-only {
        cursor: not-allowed;
    }
</style>

@endsection
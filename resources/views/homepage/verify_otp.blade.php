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
                                                    <h4 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">Verify OTP</h4>
                                                </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 14px ;font-style: normal ;text-transform: uppercase ;">Verify OTP to continue</span>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                                @include('homepage.flash_message')
                                                <div role="form" class="wpcf7">
                                                    <div class="screen-reader-response"></div>
                                                    <form class="quform" method="post">
                                                        @csrf
                                                        <div class="quform-elements">
                                                            <div class="quform-element">
                                                                <p>OTP
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-email">
                                                                        <input type="hidden" name="email" value="{{Session::get('email')}}" class="input1" aria-required="true" required>
                                                                        <input id="otp" type="text" name="otp" class="input1" aria-required="true" required>

                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <p>
                                                            <div class="quform-submit">
                                                                <div class="quform-submit-inner">
                                                                    <button type="submit" class="submit-button"><span>Submit</span></button>
                                                                </div>
                                                                <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                                            </div>
                                                            <br>
                                                            <div><a href="/student-portal-registration"> << Back to Login</a></div>
                                                            </p>
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
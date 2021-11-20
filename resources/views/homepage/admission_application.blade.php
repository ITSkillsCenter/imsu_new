@extends('layouts.homepage_layout')
@section('content')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<style>
    .input1 {
        height: 20px;
    }

    .gdlr-core-tab-style1-horizontal .gdlr-core-tab-item-title {
        border: 0px;
        margin-left: 0px;
        padding: 20px 37px 24px;
    }

    .kingster-item-pdlr,
    .gdlr-core-item-pdlr {
        padding-left: 2px;
        padding-right: 2px;
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
                                                    @if ($message = Session::get('success'))
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">Application Successful</h3>
                                                    @else
                                                    <h4>Welcome to the Admission Application Page</h4>
                                                    <p>You are required to sign-up first to continue your application</p>
                                                    <h5>Choose your application category and proceed</h5>
                                                    @endif
                                                </div>
                                            </div>
                                            @include('homepage.flash_message')

                                            <div class="gdlr-core-pbf-background-wrap"></div>
                                            <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                                                <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-tab-item gdlr-core-js gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-tab-style1-horizontal gdlr-core-item-pdlr">
                                                            <div class="gdlr-core-tab-item-wrap">
                                                                <div class="gdlr-core-tab-item-title-wrap clearfix gdlr-core-title-font">
                                                                    <div class="gdlr-core-tab-item-title gdlr-core-active" data-tab-id="1">Post-UTME</div>
                                                                    <div class="gdlr-core-tab-item-title" data-tab-id="4">Direct Entry</div>
                                                                    <div class="gdlr-core-tab-item-title" id="spgs" data-tab-id="2">Post-graduate</div>
                                                                    <div class="gdlr-core-tab-item-title" data-tab-id="33">ICEP</div>
                                                                </div>
                                                                <div class="gdlr-core-tab-item-content-wrap clearfix">

                                                                    <div class="gdlr-core-tab-item-content " data-tab-id="1" id="und" style="background-color: rgb(255, 255, 255); background-image: url(&quot;upload/tab-bg.png&quot;); background-position: right top; display: block;">
                                                                        <div role="form" class="wpcf7" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                                                            <div class="screen-reader-response"></div>
                                                                            @if((date('Y-m-d') >= $undergraduate->start_date) && (date('Y-m-d') <= $undergraduate->end_date))
                                                                                <form class="quform" method="post">
                                                                                    @csrf
                                                                                    <input type="hidden" name="type" value="jamb">
                                                                                    <input type="hidden" name="mode_of_admission" value="UTME">
                                                                                    <div class="quform-elements">
                                                                                        <div class="quform-element">
                                                                                            <p>Jamb Registration Number
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="jamb_reg" style="background-color: #efefef ;" type="text" name="jamb_reg" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Full Name
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="jamb_reg" style="background-color: #efefef ;" type="text" name="full_name" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Email
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="email" style="background-color: #efefef ;" type="email" name="email" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Phone Number
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="phone_number" style="background-color: #efefef ;" type="tel" name="phone_number" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Password
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="password" style="background-color: #efefef ;" type="password" name="password" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Confirm Password
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="conf_password" style="background-color: #efefef ;" type="password" name="conf_password" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <p>
                                                                                        <div class="quform-submit">
                                                                                            <div class="quform-submit-inner">
                                                                                                <button type="submit" class="submit-button"><span>Sign up</span></button>
                                                                                            </div>
                                                                                            <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div>Applied ? <a href="/student-portal">Click here to login</a></div>
                                                                                        </p>
                                                                                    </div>
                                                                                </form>
                                                                                @else
                                                                                <div>{{$undergraduate->notice}}</div>
                                                                                @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="gdlr-core-tab-item-content " data-tab-id="4" style="background-color: rgb(255, 255, 255); background-image: url(&quot;upload/tab-bg.png&quot;); background-position: right top; display: none;">
                                                                        <div role="form" class="wpcf7" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                                                            <div class="screen-reader-response"></div>
                                                                            @if((date('Y-m-d') >= $undergraduate->start_date) && (date('Y-m-d') <= $undergraduate->end_date))
                                                                                <form class="quform" method="post">
                                                                                    @csrf
                                                                                    <input type="hidden" name="type" value="de">
                                                                                    <input type="hidden" name="mode_of_admission" value="Direct Entry">
                                                                                    <div class="quform-elements">
                                                                                        <div class="quform-element">
                                                                                            <p>Jamb Registration Number
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="jamb_reg" style="background-color: #efefef ;" type="text" name="jamb_reg" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Email
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="email" style="background-color: #efefef ;" type="email" name="email" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Phone Number
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="phone_number" style="background-color: #efefef ;" type="tel" name="phone_number" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Password
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="password" style="background-color: #efefef ;" type="password" name="password" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Confirm Password
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input id="conf_password" style="background-color: #efefef ;" type="password" name="conf_password" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <p>
                                                                                        <div class="quform-submit">
                                                                                            <div class="quform-submit-inner">
                                                                                                <button type="submit" class="submit-button"><span>Sign up</span></button>
                                                                                            </div>
                                                                                            <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div>Applied ? <a href="/student-portal">Click here to login</a></div>
                                                                                        </p>
                                                                                    </div>
                                                                                </form>
                                                                                @else
                                                                                <div>{{$undergraduate->notice}}</div>
                                                                                @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="gdlr-core-tab-item-content " data-tab-id="2" id="spgs_id" style="background-color: rgb(255, 255, 255); background-image: url(&quot;upload/tab-bg.png&quot;); background-position: right top; display: none;">
                                                                        <div role="form" class="wpcf7" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                                                            <div class="screen-reader-response"></div>
                                                                                @if((date('Y-m-d') >= $postgraduate->start_date) && (date('Y-m-d') <= $postgraduate->end_date))
                                                                                <form class="quform" method="post" action="/post-graduate-application">
                                                                                    @csrf
                                                                                    <div class="quform-elements">

                                                                                        <div class="quform-element">
                                                                                            <p>First Name
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input style="background-color: #efefef ;" id="first_name" type="text" name="first_name" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="quform-element">
                                                                                            <p>Last Name
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input style="background-color: #efefef ;" id="last_name" type="text" name="last_name" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="quform-element">
                                                                                            <p>Email
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input style="background-color: #efefef ;" id="email" type="email" name="email" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="quform-element">
                                                                                            <p>Phone
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-name">
                                                                                                    <input style="background-color: #efefef ;" id="phone" type="text" name="phone" maxlength="12" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="quform-element">
                                                                                            <p>Password
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-email">
                                                                                                    <input style="background-color: #efefef ;" id="password" type="password" name="the_password" class="input1" aria-required="true" required>
                                                                                                </span>
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="quform-element">
                                                                                            <p>Confirm Password
                                                                                                <br>
                                                                                                <span class="wpcf7-form-control-wrap your-email">
                                                                                                    <input style="background-color: #efefef ;" id="cnf_password" type="password" name="cnf_password" class="input1" aria-required="true" required>
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
                                                                                        <div>Registered ? <a href="/student-portal">Click here to login</a></div>
                                                                                        </p>
                                                                                    </div>
                                                                                </form>
                                                                                @else
                                                                                <div>{{$postgraduate->notice}}</div>
                                                                                @endif
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="gdlr-core-tab-item-content " data-tab-id="33" style="background-color: rgb(255, 255, 255); background-image: url(&quot;upload/tab-bg.png&quot;); background-position: right top; display: none;">
                                                                    <div role="form" class="wpcf7" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                                                        <div class="screen-reader-response"></div>
                                                                        @if((date('Y-m-d') >= $icep->start_date) && (date('Y-m-d') <= $icep->end_date))
                                                                            <form class="quform" method="post">
                                                                                @csrf
                                                                                <input type="hidden" name="type" value="icep">
                                                                                <div class="quform-elements">
                                                                                    <div class="quform-element">
                                                                                        <p>First Name
                                                                                            <br>
                                                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                                                <input id="first_name" style="background-color: #efefef ;" type="text" name="first_name" class="input1" aria-required="true" required>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                    <div class="quform-element">
                                                                                        <p>Middle Name
                                                                                            <br>
                                                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                                                <input id="middle_name" style="background-color: #efefef ;" type="text" name="middle_name" class="input1" aria-required="true" required>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                    <div class="quform-element">
                                                                                        <p>Last Name
                                                                                            <br>
                                                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                                                <input id="last_name" style="background-color: #efefef ;" type="text" name="last_name" class="input1" aria-required="true" required>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                    <div class="quform-element">
                                                                                        <p>Email
                                                                                            <br>
                                                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                                                <input id="email" style="background-color: #efefef ;" type="email" name="email" class="input1" aria-required="true" required>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                    <div class="quform-element">
                                                                                        <p>Phone Number
                                                                                            <br>
                                                                                            <span class="wpcf7-form-control-wrap your-name">
                                                                                                <input id="phone_number" style="background-color: #efefef ;" type="text" name="phone_number" class="input1" aria-required="true" required>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                    <p>
                                                                                    <div class="quform-submit">
                                                                                        <div class="quform-submit-inner">
                                                                                            <button type="submit" class="submit-button"><span>Get Details</span></button>
                                                                                        </div>
                                                                                        <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                                                                    </div>
                                                                                    <br>
                                                                                    <div>Applied ? <a href="/admission-portal">Click here to login</a></div>
                                                                                    </p>
                                                                                </div>
                                                                            </form>
                                                                            @else
                                                                            <div>{{$icep->notice}}</div>
                                                                            @endif
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
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.steps.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        if (window.location.href.indexOf("#pg") > -1) {
            $('.gdlr-core-tab-item-title').removeClass('gdlr-core-active')
            $('#spgs').addClass('gdlr-core-active')
            $('#und').css('display', 'none')
            $('#spgs_id').css('display', 'block')
            // alert("your url contains the name franky");
        }
    });
    // $(document).ready(function() {
    //     $("#wizard").steps();
    // })
    $('.close').click(function() {
        $('#close_alert').slideUp()
    })
</script>
@endsection
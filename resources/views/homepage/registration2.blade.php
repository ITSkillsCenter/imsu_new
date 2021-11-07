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
                                                    @if ($message = Session::get('success'))
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">THANK YOU FOR SIGNING UP</h3>
                                                    @else
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">Student Registration</h3>
                                                    @endif
                                                <!-- </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;text-transform: uppercase ;"></span> -->
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                                @include('homepage.flash_message')
                                                <div role="form" class="wpcf7" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>
                                                    <form class="quform" method="post">
                                                        @csrf
                                                        <div class="quform-elements">
                                                            <div class="quform-element">
                                                                <p>Student Type
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <select id="" name="type" class="input1" aria-required="true" required>
                                                                            <option value="">--Select--</option>
                                                                            <option value="returning">Returning Student</option>
                                                                            <option value="new">New Student</option>
                                                                            <option value="graduate">Graduate</option>
                                                                            <option value="pg">PostGraduate Student</option>
                                                                        </select>
                                                                    </span>
                                                                </p>
                                                            </div>

                                                            <div class="quform-element">
                                                                <p>Registration Number Only
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <input id="matric_number" type="text" name="matric_number" class="input1" aria-required="true" required>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="quform-element">
                                                                <p>Email
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <input id="email" type="email" name="email" class="input1" aria-required="true" required>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="quform-element">
                                                                <p>Phone
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <input id="phone" type="text" name="phone" maxlength="12" class="input1" aria-required="true" required>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="quform-element">
                                                                <p>Password
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-email">
                                                                        <input id="password" type="password" name="password" class="input1" aria-required="true" required>
                                                                    </span>
                                                                </p>
                                                            </div>

                                                            <div class="quform-element">
                                                                <p>Confirm Password
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-email">
                                                                        <input id="cnf_password" type="password" name="cnf_password" class="input1" aria-required="true" required>
                                                                    </span>
                                                                </p>
                                                            </div>

                                                            <div class="quform-element">
                                                                <p>Year of Admission
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <select id="" name="year" class="input1" aria-required="true" required>
                                                                            <option value="">--Select--</option>
                                                                            <option value="2014">2014/2015</option>
                                                                           <option value="2015">2015/2016</option>
                                                                           <option value="2016">2016/2017</option>
                                                                           <option value="2017">2017/2018</option>
                                                                           <option value="2018">2018/2019</option>
                                                                           <option value="2019">2019/2020</option>
                                                                            <option value="2020">2020/2021</option>
                                                                        </select>
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
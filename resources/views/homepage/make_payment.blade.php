@extends('layouts.homepage_layout')
@section('content')
<style>
    #vn-click {
        padding: 10px 15px;
        background: #FD6CA3;
        color: #fff;
        cursor: pointer;
        display: inline-block
    }

    #vn-info {
        display: none;
        background: #fff;
        color: #000;
        padding: 30px 20px
    }
</style>
<div class="gdlr-core-page-builder-body">

    <div class="gdlr-core-pbf-wrapper" id="div_1dd7_105">
        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js">
            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container ">

                <div class="panel">
                    <div class="panel-body">
                        <div class="gdlr-core-pbf-element">
                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                                <div class="gdlr-core-title-item-title-wrap clearfix">
                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 32px ;">Make Payment</h3>
                                </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">You can make any payment to the school below and print your receipt</span>
                                <!-- <p style="color:red; font-style:italic">Note: Bank payment takes within 24 hours to update on the portal</p> -->
                            </div>
                        </div>

                        <div class="gdlr-core-course-column gdlr-core-column-30">
                            <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                <div>
                                    <p>PROCEDURES FOR ONLINE PAYMENT OF FEES:</p> 
                                    <p>This option is meant for payers who were admitted to Imo State University before 2016, those admitted after 2016 should login to their students’ accounts on the portal to make their payments.</p> 
                                        i. Visit the University official website: www.imsu.edu.ng <br>
                                        ii. Click on make payment on the top menu <br>
                                        iii. Enter your full name, mat number , functional email address, phone number and select fees you want to pay <br>
                                        iv. Click to Make Payment - You will be shown different payment options: <br>
                                        &nbsp;&nbsp; a. Pay with REMITA <br>
                                       <p style="padding-left: 20px;">This option will redirect to the REMITA Payment Gateway to facilitate your payment with options listed below:</p>
                                       <p style="padding-left: 20px;">• CARD: This button will provide with the option to pay with your ATM Card </p>
                                       <p style="padding-left: 20px;">• BANK: This button with generate an RRR number that you can take to any bank branch to make payment.</p> 

                                        &nbsp;&nbsp;b. Pay with INTERSWITCH <br>
                                        <p style="padding-left: 20px;">• Pay with Interswitch Card option - This option will redirect to the INTERSWITCH Payment Gateway to facilitate payment with your ATM Card</p>
                                        <p style="padding-left: 20px;">• Pay with Interswitch Bank option - This option will generate a REFERENCE NUMBER (in the format: MNTA******)</p>
                                        <p style="padding-left: 20px;">• You can take this REFERENCE NUMBER to any bank brank and tell the bank teller you want to make payment for “IMSU-PAYDIRECT</p>
                                        <p style="padding-left: 20px;">• You can also use that REFERENCE NUMBER on this URL https://quickteller.com/imsu.edu.ng</p>
                                        <p style="padding-left: 20px;">• Search for IMO STATE UNIVERSITY</p>
                                        <p style="padding-left: 20px;">• Enter your Email and put the generated reference number in the INVOICE NUMBER</p>
                                        v. Print your receipt from the payment page of from your email <br>
                                        vi. Submit your receipt to the bursary for confirmation <br>
                                </div>
                            </div>
                        </div>

                        <div class="gdlr-core-course-column gdlr-core-column-30">
                            <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                @include('homepage.flash_message')
                                <div role="form" class="wpcf7" style="width: 60%; margin: 0 auto" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response"></div>
                                    <!-- <form class="quform" method="post"> -->
                                    @csrf
                                    <div class="quform-elements">
                                        <div class="quform-element">
                                            <p>Payment for
                                                <br>

                                                <span class="wpcf7-form-control-wrap your-name">
                                                    <select id="fee" class="input" aria-required="true" name="type" required>
                                                        <option value="">--Select--</option>
                                                        @foreach($fee_lists as $fee_list)
                                                        <option value="{{$fee_list->id}}" data-item_code="{{$fee_list->interswitch_item_code}}" data-amount="{{$fee_list->amount}}" data-remita_service_id="{{$fee_list->remita_service_id}}">
                                                            {{$fee_list->fee_name}} - {{$fee_list->amount}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                            </p>
                                        </div>

                                        <div class="quform-element">
                                            <p>Name
                                                <br>
                                                <span class="wpcf7-form-control-wrap your-name">
                                                    <input type="text" name="Full_Name" id="name" aria-required="true" required>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="quform-element">
                                            <p>Email Address
                                                <br>
                                                <span class="wpcf7-form-control-wrap your-name">
                                                    <input id="email" type="text" name="Email_Address" id="email" aria-required="true" required>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="quform-element">
                                            <p>Matric Number (If applicable)
                                                <br>
                                                <span class="wpcf7-form-control-wrap your-name">
                                                    <input id="registration_number" type="text" name="registration_number" aria-required="true" required>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="quform-element">
                                            <p>Phone Number
                                                <br>
                                                <span class="wpcf7-form-control-wrap your-name">
                                                    <input id="phone" type="text" name="Student_Mobile_Number" id="phone" aria-required="true" required>
                                                </span>
                                            </p>
                                        </div>



                                    </div>


                                    <div class="col-lg-4">
                                        <input type="hidden" name="callback_url" id="callback_url" value="https://imsu.edu.ng/api/save_application_fee/{{base64_encode($fee->id)}}">
                                        <input type="hidden" name="callback_url" id="callback_url_interswitch" value="https://imsu.edu.ng/api/save_direct_interswitch">
                                        <!-- <input type="hidden" name="email" id="email" value="{{$std->email}}">
                                            <input type="hidden" name="phone" id="phone" value="{{$std->phone_number}}">
                                            <input type="hidden" name="first_name" id="first_name" value="{{$std->full_name}}">
                                            <input type="hidden" name="last_name" id="last_name" value="{{$std->full_name}}">
                                            <input type="hidden" name="matric_no" id="matric_no" value="{{Session::get('jamb_reg')}}">
                                            <input type="hidden" name="amount" id="amount" value="{{$fee->amount}}">
                                            <input type="hidden" name="channel" id="channel" value="card">
                                            <input type="hidden" name="item_code" id="item_code" value="{{$fee->pms_id}}">
                                            <input type="hidden" name="interswitch_item_code" id="interswitch_item_code" value="{{$fee->interswitch_item_code}}">
                                            <input type="hidden" name="remita_service_id" id="remita_service_id" value="{{$fee->remita_service_id}}">
                                            <input type="hidden" name="client_ref" id="client_ref" value="{{Session::get('jamb_reg')}}"> -->
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button id="shr" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Interswitch</i></button>
                                        <!-- <button id="send" type="button" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay with remita</i></button> -->
                                        <!-- <button id="interswitch" type="button" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay with Interswitch</i></button> -->
                                    </div>

                                    <div class="col-md-12 text-center" id="remita" style="display: none;">
                                        <br>
                                        <button id="interswitch" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Card</i></button>
                                        <!-- <button id="send" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Interswitch (Card)</i></button> -->
                                        <button id="bank" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with (Bank)</i></button>
                                    </div>
                                    <!-- </form> -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <style>
        .ssh {
            left: 25%;
        }

        @media (max-width: 768px) {
            .payment_btn {
                width: 100%;
                margin-bottom: 10px !important;
            }

            .ssh {
                left: 0 !important;
            }
        }
    </style>

    <div class="ssh" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; top: 5%; position: absolute; margin: 0 auto;">
        <div class="modal-dialog" style="border: 0;" role="document">
            <div class="modal-content" style="border: 0;">
                <div class="modal-header text-white" style="display:flex; justify-content:space-between; background: linear-gradient(90deg,rgb(17, 182, 122) 0%, rgb(0, 148, 68) 100%);">
                    <!-- <p style="font-weight:bold; color:white">News Update!</p> -->
                    <button type="button" id="closeit" class="close" data-dismiss="modal" style="opacity: 1; color:white" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4>Kindly copy the Reference Number below.</h4>
                    <p>Note: This payment can be made via bank or via <a target="_blank" href="https://quickteller.com/pay-bills">quickteller</a> </p>
                    <input class="form-control" type="text" id="rrr" readonly>
                    <br>
                    <button class="btn" data-clipboard-target="#rrr">
                        Copy <i class="fa fa-copy"></i>
                    </button> &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-success" href="/make-payment">Close</a>
                </div>
            </div>
        </div>
    </div>

</div>

<a style="display: none;" id="clickme" href="#myModal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
<a style="display: none;" id="clickme2" href="#myModal2" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
<!-- <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Kindly copy the Reference Number below.</h4>
                <p>Note: This payment can be made via bank or via <a target="_blank" href="https://quickteller.com/pay-bills">quickteller</a> </p>
                <input class="form-control" type="text" id="rrr" readonly>
                <br>
                <button class="btn" data-clipboard-target="#rrr">
                    Copy <i class="fa fa-copy"></i>
                </button> &nbsp;&nbsp;&nbsp;
                <a class="btn btn-success" href="/student-payment">Close</a>
            </div>
        </div>
    </div>
</div> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script>
    $(document).ready(function() {
        new ClipboardJS('.btn');
    })

    $('#closeit').click(function() {
        $('#centralModal').css('display', 'none');
        $('#overlay').css('display', 'none');
    });

    $('#send').click(function() {
        // $('#interswitch').attr('disabled', 'true');
        $(this).html('Loading...')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var settings = {
            "url": "https://imorms.ng/api/v1/college/cie/27?token=1GnUy2F50dCtcJsRcGccx5E6KrSp4fyQ9nhDoIC5UqRA898FHFBHF21213HFHRH2HHD8F&userId=1",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
                // "Cookie": "ci_session=9pmf6h66uun6pnuqqiinrtccq3q1jku9"
            },
            "data": JSON.stringify({
                "first_name": $('#first_name').val(),
                "last_name": $('#last_name').val(),
                "email": $('#email').val(),
                "phone": $('#phone').val(),
                "matric_no": $('#matric_no').val(),
                "amount": $('#amount').val(),
                "channel": "card",
                "callback_url": $('#callback_url').val(),
                "item_code": $('#item_code').val(),
                "remita_service_id": $('#remita_service_id').val(),
                "client_ref": $('#client_ref').val(),
            }),
        };

        $.ajax(settings).done(function(response) {
            console.log(JSON.parse(response));
            let resp = JSON.parse(response)
            let invoice_no = resp.data.invoice_no
            let status = resp.data.status
            let client_ref = resp.data.client_ref
            window.location.href = resp.data.authorization_url

        });
    });

    $('#shr').click(function() {
        $('#remita').slideToggle();
    })

    $('#interswitch').click(function() {
        let email = $('#email').val()
        let name = $('#name').val()
        let registration_number = $('#registration_number').val()
        let phone = $('#phone').val()
        let fee = $('#fee').val()
        console.log(email, name, registration_number, phone)
        if (email == '' || name == '' || phone == '' || fee == '') {
            return alert('All fields is required')
        }
        $('#bank').attr('disabled', true)
        $(this).attr('disabled', 'true');
        $(this).html('Loading...')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var settings = {
            "url": "/create-user",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
                // "Cookie": "ci_session=9pmf6h66uun6pnuqqiinrtccq3q1jku9"
            },
            "data": JSON.stringify({
                "Full_name": $('#name').val(),
                "Email_Address": $('#email').val(),
                "Student_Mobile_Number": $('#phone').val(),
                "registration_number": $('#registration_number').val(),
            }),
        };

        $.ajax(settings).done(function(response) {
            console.log(JSON.parse(response));

        });

        var setting2 = {
            "url": "https://imorms.ng/api/v1/college/cie/27?token=1GnUy2F50dCtcJsRcGccx5E6KrSp4fyQ9nhDoIC5UqRA898FHFBHF21213HFHRH2HHD8F&userId=1",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
                // "Cookie": "ci_session=9pmf6h66uun6pnuqqiinrtccq3q1jku9"
            },
            "data": JSON.stringify({
                "first_name": $('#name').val(),
                "last_name": '',
                "email": $('#email').val(),
                "phone": $('#phone').val(),
                "matric_no": $('#email').val(),
                "amount": $("#fee").find(":selected").data('amount'),
                "channel": "card",
                "callback_url": $('#callback_url_interswitch').val(),
                "item_code": $("#fee").find(":selected").data('item_code'),
                "remita_service_id": '',
                "client_ref": $("#fee").find(":selected").val(),
            }),
        };

        $.ajax(setting2).done(function(response) {
            console.log(JSON.parse(response));
            let resp = JSON.parse(response)
            let invoice_no = resp.data.invoice_no
            let status = resp.data.status
            let client_ref = resp.data.client_ref
            window.location.href = resp.data.authorization_url

        });
    });

    $('#bank').click(function() {
        let email = $('#email').val()
        let name = $('#name').val()
        let registration_number = $('#registration_number').val()
        let phone = $('#phone').val()
        let fee = $('#fee').val()
        console.log(email, name, registration_number, phone)
        if (email == '' || name == '' || phone == '' || fee == '') {
            return alert('All fields is required')
        }
        $('#interswitch').attr('disabled', true)
        $(this).attr('disabled', 'true');
        $(this).html('Loading...')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var settings = {
            "url": "/create-user",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
                // "Cookie": "ci_session=9pmf6h66uun6pnuqqiinrtccq3q1jku9"
            },
            "data": JSON.stringify({
                "Full_name": $('#name').val(),
                "Email_Address": $('#email').val(),
                "Student_Mobile_Number": $('#phone').val(),
                "registration_number": $('#registration_number').val(),
            }),
        };

        $.ajax(settings).done(function(response) {
            console.log(JSON.parse(response));

        });

        var setting2 = {
            "url": "https://imorms.ng/api/v1/college/cie/27?token=1GnUy2F50dCtcJsRcGccx5E6KrSp4fyQ9nhDoIC5UqRA898FHFBHF21213HFHRH2HHD8F&userId=1",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
                // "Cookie": "ci_session=9pmf6h66uun6pnuqqiinrtccq3q1jku9"
            },
            "data": JSON.stringify({
                "first_name": $('#name').val(),
                "last_name": '',
                "email": $('#email').val(),
                "phone": $('#phone').val(),
                "matric_no": $('#email').val(),
                "amount": $("#fee").find(":selected").data('amount'),
                "channel": "bank",
                "callback_url": $('#callback_url_interswitch').val(),
                "item_code": $("#fee").find(":selected").data('item_code'),
                "remita_service_id": '',
                "client_ref": $("#fee").find(":selected").val(),
            }),
        };

        $.ajax(setting2).done(function(response) {
            console.log(JSON.parse(response));
            let resp = JSON.parse(response)
            let invoice_no = resp.data.invoice_no
            let status = resp.status
            let client_ref = resp.data.client_ref
            let matric_no = resp.data.matric_no
            let rrr = resp.data.tranx_ref
            let payment_channel = 'interswitch'
            $.post('/api/save_bank_ref_direct', {
                rrr,
                client_ref,
                payment_channel,
                invoice_no,
                matric_no,
            }).done(function(response) {
                $('#rrr').val(rrr)
                $('#interswitch').attr('disabled', false)
                $('#bank').attr('disabled', false)
                $('#bank').html('Pay with bank')
                $('#centralModal').css('display', 'block');
                window.location.href = `/bank-payment-invoice/${rrr}`
            })

        });
    });
</script>

@endsection
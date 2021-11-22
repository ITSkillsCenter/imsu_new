@extends('layouts.homepage_layout')
@section('content')
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/payment.css">
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
<main id="main">
    <section class="space-ptb">
        <div class="section-banner mb-5">
            <div class="title text-center pb-2 pb-lg-4">
                <h1 class="text-uppercase">How to make payment to imo state university</h1>
                <p>You can make any payment to the university by following the guide below</p>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 pr-lg-3 mx-0 mb-4 mb-lg-0 border-right">
                    <div class="pro-info pro-info-style-08">
                        <div class="pro-info_title text-md-left mb-4">
                            <h5 class="pro-info-title text-uppercase">
                                Procedures for online payment of fees:
                            </h5>
                            <p>
                                This option is meant for payers who were admitted to Imo
                                State University before 2016, those admitted after 2016
                                should login to their students’ accounts on the portal to
                                make their payments.
                            </p>
                        </div>
                        <div class="pro-info-inner">
                            <div class="pro-info-item">
                                <div class="pro-info-number"><span>01</span></div>
                                <div class="pro-info-content">
                                    <p class="mb-0">
                                        Visit the University official website:
                                        <a href="https://imsu.edu.ng">www.imsu.edu.ng</a>
                                    </p>
                                </div>
                            </div>
                            <div class="pro-info-item">
                                <div class="pro-info-number"><span>02</span></div>
                                <div class="pro-info-content">
                                    <p class="mb-0">Click on make payment on the top menu.</p>
                                </div>
                            </div>
                            <div class="pro-info-item">
                                <div class="pro-info-number"><span>03</span></div>
                                <div class="pro-info-content">
                                    <p class="mb-0">
                                        Enter your full name, matric number , functional email
                                        address, phone number and select fees you want to pay
                                    </p>
                                </div>
                            </div>
                            <div class="options pro-info-item">
                                <div class="pro-info-number"><span>04</span></div>
                                <div class="pro-info-content">
                                    <p class="mb-0">
                                        Click to Make Payment - You will be shown different
                                        payment options:
                                    </p>

                                    <ul class="list-unstyle pro-list m-0 p-0">
                                        <li class="pro-option">
                                            <div class="pro-info-number"><span>i</span></div>
                                            <div class="pro-info-content">
                                                <h5 class="pro-info-subtitle">Pay with REMITA</h5>
                                                <p>
                                                    This option will redirect to the REMITA Payment
                                                    Gateway to facilitate your payment with options
                                                    listed below:
                                                </p>
                                                <ul class="sub-list">
                                                    <li>
                                                        <strong>CARD OPTION:</strong> This button will
                                                        provide you an option to pay with your ATM
                                                        Card
                                                    </li>
                                                    <li>
                                                        <strong>BANK OPTION:</strong> This button with
                                                        generate an RRR number that you can take to any
                                                        bank branch to make payment.
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="pro-option mt-0">
                                            <div class="pro-info-number"><span>ii</span></div>
                                            <div class="pro-info-content">
                                                <h5 class="pro-info-subtitle">
                                                    Pay with INTERSWITCH
                                                </h5>
                                                <p>
                                                    This option will redirect to the REMITA Payment
                                                    Gateway to facilitate your payment with options
                                                    listed below:
                                                </p>
                                                <ul class="sub-list">
                                                    <li>
                                                        <strong>CARD OPTION:</strong> This option will
                                                        redirect to the INTERSWITCH Payment Gateway to
                                                        facilitate payment with your ATM Card
                                                    </li>
                                                    <li>
                                                        <strong>BANK OPTION:</strong> This option will
                                                        generate a REFERENCE NUMBER (in the format:
                                                        MNTA******).
                                                    </li>
                                                    <li>
                                                        You can take this REFERENCE NUMBER to any bank
                                                        branch and tell the bank teller you want to make
                                                        payment for “IMSU-PAYDIRECT
                                                    </li>
                                                    <li>
                                                        You can also use that REFERENCE NUMBER on this
                                                        URL
                                                        <a href="https://quickteller.com/imsu.edu.ng">https://quickteller.com/imsu.edu.ng</a>
                                                    </li>
                                                    <li>Search for IMO STATE UNIVERSITY</li>
                                                    <li>
                                                        Enter your Email and put the generated reference
                                                        number in the INVOICE NUMBER
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pro-info-item">
                                <div class="pro-info-number"><span>05</span></div>
                                <div class="pro-info-content">
                                    <p class="mb-0">
                                        Print your receipt from the payment page of from your
                                        email.
                                    </p>
                                </div>
                            </div>
                            <div class="pro-info-item">
                                <div class="pro-info-number"><span>06</span></div>
                                <div class="pro-info-content">
                                    <p class="mb-0">
                                        Submit your receipt to the bursary for confirmation.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 px-4 py-4 rounded payment-form" style="max-height: 120vh;">
                    <div role="form" class="pay-form">
                        <div class="screen-reader-response"></div>
                        <!-- <form class="quform" method="post"> -->
                        <input type="hidden" name="_token" />
                        <div class="pro-info_title text-center pty-dash mb-3 pb-2">
                            <h5 class="pro-info-title text-uppercase text-white ">
                                Make Payments
                            </h5>
                            <p class="text-white ">
                                You can make any payment to the university below and print your receipt
                            </p>
                        </div>
                        <div class="quform-elements">
                            <div class="quform-element">
                                <label class="d-block form-label" for="fee">
                                    <span>Payment for</span>
                                    <span class="wpcf7-form-control-wrap your-name">
                                        <select id="fee" class="input form-control form-control-lg px-4" aria-required="true" name="type" required="">
                                            <option value="">--Select--</option>
                                            @foreach($fee_lists as $fee_list)
                                            <option value="{{$fee_list->id}}" data-fee_name="{{$fee_list->fee_name}}" data-item_code="{{$fee_list->interswitch_item_code}}" data-amount="{{$fee_list->amount}}" data-remita_service_id="{{$fee_list->remita_service_id}}">
                                                {{$fee_list->fee_name}} - {{$fee_list->amount}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </span>
                                </label>
                            </div>

                            <div class="quform-element">
                                <label class="d-block form-label" for="name">
                                    <span>Fullname</span>
                                    <span class="wpcf7-form-control-wrap your-name">
                                        <input type="text" name="Full_Name" id="name" class="form-control form-control-lg w-100" aria-required="true" required="" />
                                    </span>
                                </label>
                            </div>
                            <div class="quform-element">
                                <label class="d-block form-label" for="email">
                                    <span>Email Address</span>
                                    <span class="wpcf7-form-control-wrap your-name">
                                        <input id="email" type="text" name="Email_Address" class="form-control form-control-lg w-100" aria-required="true" required="" />
                                    </span>
                                </label>
                                <span id="em_stat" style="color: red"></span>
                            </div>
                            <div class="quform-element">
                                <label class="d-block form-label" for="registration_number">
                                    <span>Matric Number (If applicable)</span>
                                    <span class="wpcf7-form-control-wrap your-name">
                                        <input id="registration_number" type="text" name="registration_number" class="form-control form-control-lg w-100" aria-required="true" required="" />
                                    </span>
                                </label>
                            </div>
                            <div class="quform-element">
                                <label class="d-block form-label" for="phone">
                                    <span>Phone Number</span>
                                    <span class="wpcf7-form-control-wrap your-name">
                                        <input id="phone" type="text" name="Student_Mobile_Number" class="form-control form-control-lg w-100" aria-required="true" required="" />
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <input type="hidden" name="callback_url" id="callback_url" value="https://imsu.edu.ng/api/save_direct_remita" />
                            <input type="hidden" name="callback_url" id="callback_url_interswitch" value="https://imsu.edu.ng/api/save_direct_interswitch" />
                        </div>
                        <div class="col-md-12 text-center">
                            <button id="shr" type="button" class="btn btn-lg" style="padding: 10px; font-size:14px">
                                <i class="bx bx-money pr-2"></i> Pay with Interswitch
                            </button>
                            <button id="send" type="button" class="btn btn-lg" style="padding: 10px; font-size:14px">
                                <i class="bx bx-money pr-2"></i> Pay with remita
                            </button>
                        </div>
                        <div class="col-md-12 text-center" id="remita" style="display: none;">
                            <br>
                            <button id="interswitch" type="button" style="padding: 10px; font-size:14px" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay with Card</i></button>
                            <button id="bank" type="button" style="padding: 10px; font-size:14px" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay with (Bank)</i></button>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="gdlr-core-page-builder-body">



    <style>
        .ssh {
            left: 25%;
        }

        #overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
            cursor: pointer;
        }

        #centralModal {
            display: block;
            top: 0%;
            position: absolute;
            margin: 0 auto;
            width: 100%;
            z-index: 190;
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

    <!-- <div class="ssh" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; top: 5%; position: absolute; margin: 0 auto;">
        <div class="modal-dialog" style="border: 0;" role="document">
            <div class="modal-content" style="border: 0;">
                <div class="modal-header text-white" style="display:flex; justify-content:space-between; background: linear-gradient(90deg,rgb(17, 182, 122) 0%, rgb(0, 148, 68) 100%);">
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
    </div> -->

</div>

<a style="display: none;" id="clickme" href="#myModal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
<a style="display: none;" id="clickme2" href="#myModal2" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
<div class="" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; top: 25%; position: absolute; margin: 0 auto;">
    <div class="modal-dialog" style="border: 0;" role="document">
        <div class="modal-content" style="border: 0;">
            <div class="modal-header text-white" style="display:flex; justify-content:space-between; background: linear-gradient(90deg,rgb(17, 182, 122) 0%, rgb(0, 148, 68) 100%);">
                <p style="font-weight:bold; color:white">News Update!</p>
                <button type="button" id="closeit" class="close" data-dismiss="modal" style="opacity: 1; color:white" aria-label="Close">
                    <span aria-hidden="true" class="white-text">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div id="resb">
                        This student with email <b><span id="em"></span></b> already paid for <b><span id="fn"></span></b>. Do you still want to make the same payment for this student? If no, kindly correct the email address
                    </div>
                    <!-- <p>Registration of students on the portal has commenced Click here to register
                  </p> -->
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button class="btn btn-primary" id="closeit2">Yes</button>
                            <button class="btn btn-secondary" id="closeit3">No</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="overlay"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script>
    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function validate() {
        const $result = $("#result");
        const email = $("#email").val();
        $result.text("");

        if (validateEmail(email)) {
            return true
        } else {
            return false
        }
        return false;
    }

    $('#email').on('blur', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var settings = {
            "url": "/check-former-payment",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Content-Type": "application/json",
                // "Cookie": "ci_session=9pmf6h66uun6pnuqqiinrtccq3q1jku9"
            },
            "data": JSON.stringify({
                "Full_name": $('#name').val(),
                "Email_Address": $('#email').val(),
                "fee_id": $("#fee").find(":selected").val(),
                // "registration_number": $('#registration_number').val(),
            }),
        };

        $.ajax(settings).done(function(response) {
            console.log(response);
            let rsp = response
            if (rsp !== 'Continue') {
                $('#centralModal').css('display', 'block');
                $('#overlay').css('display', 'block');
                $('#em').html($('#email').val())
                $('#fn').html($("#fee").find(":selected").data('fee_name'))
            }
        });

    })

    $(document).ready(function() {
        new ClipboardJS('.btn');
    })

    $('#closeit').click(function() {
        $('#centralModal').css('display', 'none');
        $('#overlay').css('display', 'none');
    });

    $('#closeit2').click(function() {
        $('#centralModal').css('display', 'none');
        $('#overlay').css('display', 'none');
    });

    $('#closeit3').click(function(){
        $('#email').val('')
        $('#centralModal').css('display', 'none');
        $('#overlay').css('display', 'none');
    })

    $('#send').click(function() {
        let email = $('#email').val()
        let name = $('#name').val()
        let registration_number = $('#registration_number').val()
        let phone = $('#phone').val()
        let fee = $('#fee').val()
        console.log(email, name, registration_number, phone)
        if (email == '' || name == '' || phone == '' || fee == '') {
            return alert('All fields is required')
        }
        if (!validate($("#email").val())) {
            return alert('Invalid Email, please provide a valid email address')
        }
        $('#shr').attr('disabled', true)
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
                "callback_url": $('#callback_url').val(),
                "item_code": $("#fee").find(":selected").data('item_code'),
                "remita_service_id": $("#fee").find(":selected").data('remita_service_id'),
                "client_ref": $("#fee").find(":selected").val(),
            }),
        };

        // $.ajax(setting2).done(function(response) {
        //     console.log(JSON.parse(response));
        //     let resp = JSON.parse(response)
        //     let invoice_no = resp.data.invoice_no
        //     let status = resp.data.status
        //     let client_ref = resp.data.client_ref
        //     window.location.href = resp.data.authorization_url

        // });
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
        if (!validate($("#email").val())) {
            return alert('Invalid Email, please provide a valid email address')
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
                "amount": parseInt($("#fee").find(":selected").data('amount')) + 200,
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
        if (!validate($("#email").val())) {
            return alert('Invalid Email, please provide a valid email address')
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
                "amount": parseInt($("#fee").find(":selected").data('amount')) + 200,
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
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
                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">REGISTRATION FEE</h3>
                                </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Hello {{session()->get('student')['first_name']}} {{session()->get('student')['last_name']}}, you are required to pay your registration fee before you can register on the portal.</span>
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
                                                <p>Matric Number/Jamb Number
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input id="matric_number" type="hidden" name="matric_number" class="input1" aria-required="true" required>
                                                        <input id="" type="text" value="{{session()->get('student_id')}}" class="input1" aria-required="true" readonly>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Amount
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                        <input id="amount" type="hidden" name="amount" value="100" class="input1">
                                                        <input value="₦100" class="input1" aria-required="true" readonly>
                                                    </span>
                                                </p>
                                            </div>

                                            <div class="col-md-6 col-xs-6 text-center payment_btn" style="display: inline-flex;align-content: center;justify-content: center;" id="for_card">
                                                <a href="/" class="submit-button" type="button" style="border: 1px solid rgb(206, 206, 206);
                                                                    height: 40px;
                                                                    margin: 0;
                                                                    box-shadow: rgb(226, 224, 224) 0px 1px 3px;
                                                                    padding: 0 2em 0 0.8em;
                                                                    font-weight: 700;
                                                                    border-radius: 4px;
                                                                    color: rgb(0, 66, 95);
                                                                    font-size: 13px;
                                                                    text-transform: uppercase;
                                                                    background-color: #FFF;
                                                                    background-image: url(https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btnbg.png);
                                                                    width: 260px;
                                                                    display: inline-block;
                                                                    box-sizing: border-box;
                                                                    cursor: pointer;
                                                                    font-family: 'proxima-nova', sans-serif, 'Helvetica';">
                                                    <span style="margin-top: 10px;display: inline-block;margin-left: 8px;">
                                                        Cancel
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="col-md-6">
                                                <span id="vn-click">Pay Now</span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" id="vn-info">
                        <div class="row">
                            <div class="col-md-4 col-xs-4 text-center payment_btn" style="display: inline-flex;align-content: center;justify-content: center;" id="for_card">
                                <input type="hidden" name="cust_id" value="{{session()->get('student_id')}}" id="cust_id">
                                <input type="hidden" name='currency' value="566" />
                                <input type="hidden" name='invoice_id' id="invoice_id" value="ICT-{{session()->get('student_id')}}" />
                                <input type="hidden" name='txn_ref' id="tranRef" />
                                <input type="hidden" name='merchant_code' />
                                <input type="hidden" name='pay_item_id' />
                                <input type="hidden" name='site_redirect_url' />
                                <input type="hidden" name='display_mode' value='PAGE' />
                                <button class="submit-button" type="button" style="border: 1px solid rgb(206, 206, 206);
                                    height: 40px;
                                    margin: 0;
                                    box-shadow: rgb(226, 224, 224) 0px 1px 3px;
                                    padding: 0 2em 0 0.8em;
                                    font-weight: 700;
                                    border-radius: 4px;
                                    color: rgb(0, 66, 95);
                                    font-size: 13px;
                                    text-transform: uppercase;
                                    background-color: #FFF;
                                    background-image: url(https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btnbg.png);
                                    width: 260px;
                                    display: inline-block;
                                    box-sizing: border-box;
                                    cursor: pointer;
                                    font-family: 'proxima-nova', sans-serif, 'Helvetica';" onclick="checkout()">
                                    <img style="float:left;" class="isw-pay-logo" src="https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btn.png" />
                                    <span style="margin-top: 10px;display: inline-block;margin-left: 8px;">
                                        Pay with Interswitch
                                    </span>
                                </button>
                            </div>
                            <div class="col-md-4">
                                <form>

                                    <!-- <a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK-cba53ee1341aba1ec03fcee26568ae0d-X" data-txref="rave-checkout-1500826869" data-amount="1000" data-customer_email="user@example.com" data-currency="NGN" data-pay_button_text="Pay Now" data-country="NG" data-custom_title="Demo" data-custom_description="" data-redirect_url="" data-custom_logo="" data-payment_method="both">
                                        
                                    </a> -->

                                    <button class="submit-button" type="button" style="border: 1px solid rgb(206, 206, 206);
                                                                    height: 40px;
                                                                    margin: 0;
                                                                    box-shadow: rgb(226, 224, 224) 0px 1px 3px;
                                                                    padding: 0 2em 0 0.8em;
                                                                    font-weight: 700;
                                                                    border-radius: 4px;
                                                                    color: rgb(0, 66, 95);
                                                                    font-size: 13px;
                                                                    text-transform: uppercase;
                                                                    background-color: #FFF;
                                                                    background-image: url(https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btnbg.png);
                                                                    width: 260px;
                                                                    display: inline-block;
                                                                    box-sizing: border-box;
                                                                    cursor: pointer;
                                                                    font-family: 'proxima-nova', sans-serif, 'Helvetica';" onClick="payWithRave()">
                                        <img style="float:left;" class="isw-pay-logo" src="https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btn.png" />
                                        <span style="margin-top: 10px;display: inline-block;margin-left: 8px;">
                                            Pay with Flutterwave
                                        </span>
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-4">

                            <button class="submit-button" type="button" style="border: 1px solid rgb(206, 206, 206);
                                                                    height: 40px;
                                                                    margin: 0;
                                                                    box-shadow: rgb(226, 224, 224) 0px 1px 3px;
                                                                    padding: 0 2em 0 0.8em;
                                                                    font-weight: 700;
                                                                    border-radius: 4px;
                                                                    color: rgb(0, 66, 95);
                                                                    font-size: 13px;
                                                                    text-transform: uppercase;
                                                                    background-color: #FFF;
                                                                    background-image: url(https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btnbg.png);
                                                                    width: 260px;
                                                                    display: inline-block;
                                                                    box-sizing: border-box;
                                                                    cursor: pointer;
                                                                    font-family: 'proxima-nova', sans-serif, 'Helvetica';" onClick="payWithPaystack()">
                                        <img style="float:left;" class="isw-pay-logo" src="https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btn.png" />
                                        <span style="margin-top: 10px;display: inline-block;margin-left: 8px;">
                                            Pay with Paystack
                                        </span>
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <style>
        @media (max-width: 768px) {
            .payment_btn {
                width: 100%;
                margin-bottom: 10px !important;
            }
        }
    </style>
    <!-- <a href="/student_registration" style="display: none;" id="clickme">Click to Open Success Modal</a>
    <a href="#" id="clickme2">Click to Open fail Modal</a> -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#vn-click").click(function() {
            $("#vn-info").slideToggle(1000);
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<!-- **** Paystack Inline Payment **** -->
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    function payWithPaystack() {
        var handler = PaystackPop.setup({
            key: 'pk_test_86d32aa1nV4l1da7120ce530f0b221c3cb97cbcc',
            email: 'customer@email.com',
            amount: 10000,
            currency: "NGN",
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                custom_fields: [{
                    display_name: "Mobile Number",
                    variable_name: "mobile_number",
                    value: "+2348012345678"
                }]
            },
            callback: function(response) {
                alert('success. transaction ref is ' + response.reference);
            },
            onClose: function() {
                alert('window closed');
            }
        });
        handler.openIframe();
    }
</script>
<!-- **** Paystack Inline Payment End **** -->
<!-- **** Flutterwave Inline Payment **** -->

<script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<script>
    const API_publicKey = "FLWPUBK-cba53ee1341aba1ec03fcee26568ae0d-X";

    function payWithRave() {
        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            customer_email: "user@example.com",
            amount: 2000,
            customer_phone: "234099940409",
            currency: "NGN",
            txref: "rave-123456",
            meta: [{
                metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.data.txRef; // collect txRef returned and pass to a                    server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.data.chargeResponseCode == "00" ||
                    response.data.chargeResponseCode == "0"
                ) {
                    // redirect to a success page
                } else {
                    // redirect to a failure page.
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>
<!-- **** Flutterwave Inline Payment End **** -->
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://webpay.interswitchng.com/collections/public/javascripts/inline-checkout.js"></script>
<!-- <script src="https://qa.interswitchng.com/collections/public/javascripts/inline-checkout.js"></script> -->
<script>
    function customCallback(response) {
        console.log(response);
    }

    function checkout() {
        var merchantCode = "MX18847"; //'MX20245';
        var payItemId = "9182240"; //'9716256';   
        amount = document.getElementsByName('amount')[0].value
        amount = amount + '00'
        console.log(amount)
        var transRef = randomReference();

        var paymentRequest = {
            merchant_code: merchantCode,
            pay_item_id: payItemId,
            txn_ref: transRef,
            amount: amount,
            cust_id: document.getElementsByName('cust_id')[0].value,
            currency: document.getElementsByName('currency')[0].value,
            site_redirect_url: window.location.origin,
            onComplete: paymentCallback,
            mode: 'LIVE' //TEST
        };
        window.webpayCheckout(paymentRequest);
    }

    // function checkout() {
    //     var merchantCode =  "MX20245"; //'MX20245';
    //     var payItemId = "9716256";    //'9716256';   
    //     amount = document.getElementsByName('amount')[0].value
    //     amount = amount + '00'
    //     console.log(amount)
    //     var transRef = randomReference();

    //     var paymentRequest = {
    //         merchant_code: merchantCode,
    //         pay_item_id: payItemId,
    //         txn_ref: transRef,
    //         amount: amount,
    //         cust_id: document.getElementsByName('cust_id')[0].value,
    //         currency: document.getElementsByName('currency')[0].value,
    //         site_redirect_url: window.location.origin,
    //         onComplete: paymentCallback,
    //         mode: 'TEST'  //TEST
    //     };
    //     window.webpayCheckout(paymentRequest);
    // }

    //generate a random transaction ref
    function randomReference() {
        var length = 10;
        var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var result = '';
        for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
        return result;
    }

    //callback function that gets triggered on payment success or failure
    function paymentCallback(response) {
        if (response.desc == "Approved by Financial Institution") {
            console.log(response);
            var datastring = {
                user_id: document.getElementsByName('cust_id')[0].value,
                invoice_id: document.getElementsByName('invoice_id')[0].value,
                payment_method: 'card',
                amount: amount,
                reference_id: response.txnref
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.LoadingOverlay("show");
            $.post('/save_ict_payment', {
                datastring
            }).done(function(data) {
                if (data.body == "success") {
                    $.LoadingOverlay("hide");
                    window.location.href = '/student-registration-form'
                } else {
                    alert('error')
                    $.LoadingOverlay("hide");
                }
            });
        }

    }
</script>
@endsection
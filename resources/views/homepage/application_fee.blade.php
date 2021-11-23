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
                                </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Hello <b>{{$std->full_name}}</b>, you are required to pay your registration fee before you can register on the portal.</span>
                                <p style="color:red; font-style:italic">Note: Bank payment takes within 24 hours to update on the portal</p>
                            </div>
                        </div>

                        <div class="gdlr-core-pbf-element gdlr-core-column-60">
                            <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                @include('homepage.flash_message')
                                <div role="form" class="wpcf7" style="width: 60%; margin: 0 auto" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response"></div>
                                    <form class="quform" method="post">
                                        @csrf
                                        <div class="quform-elements">

                                            <div class="quform-element">
                                                <p>Jamb Registration Number
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input id="jamb_reg" type="hidden" name="jamb_reg" aria-required="true" required>
                                                        <input id="" type="text" value="{{$std->application_number}}" aria-required="true" readonly>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Amount
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                        <input id="amount" type="hidden" name="amount" value="{{$fee->amount}}">
                                                        <input value="₦{{number_format($fee->amount)}}" aria-required="true" readonly>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        
                                        @php /* @endphp
                                        <div class="col-md-6 col-xs-8 text-center" id="for_card">
                                            <input type="hidden" name="cust_id" value="{{$std->application_number}}" id="cust_id">
                                            <input type="hidden" name='currency' value="566" />
                                            <input type="hidden" name='invoice_id' id="invoice_id" value="{{$fee->id}}" />
                                            <input type="hidden" name='txn_ref' id="tranRef" />
                                            <input type="hidden" name='merchant_code' />
                                            <input type="hidden" name='pay_item_id' />
                                            <input type="hidden" name='site_redirect_url' />
                                            <input type="hidden" name='display_mode' value='PAGE' />
                                            <button class="cmd_pay1" type="button" style="border: 1px solid rgb(206, 206, 206);
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
                                        @php */ @endphp

                                        <div class="col-lg-4">
                                            <input type="hidden" name="callback_url" id="callback_url" value="https://imsu.edu.ng/api/save_application_fee/{{base64_encode($fee->id)}}">
                                            <input type="hidden" name="callback_url" id="callback_url_interswitch" value="https://imsu.edu.ng/api/save_application_fee_interswitch/{{base64_encode($fee->id)}}">
                                            <input type="hidden" name="email" id="email" value="{{$std->email}}">
                                            <input type="hidden" name="phone" id="phone" value="{{$std->phone_number}}">
                                            <input type="hidden" name="first_name" id="first_name" value="{{$std->full_name}}">
                                            <input type="hidden" name="last_name" id="last_name" value="{{$std->full_name}}">
                                            <input type="hidden" name="matric_no" id="matric_no" value="{{Session::get('jamb_reg')}}">
                                            <input type="hidden" name="amount" id="amount" value="{{$fee->amount}}">
                                            <input type="hidden" name="channel" id="channel" value="card">
                                            <input type="hidden" name="item_code" id="item_code" value="{{$fee->pms_id}}">
                                            <input type="hidden" name="interswitch_item_code" id="interswitch_item_code" value="{{$fee->interswitch_item_code}}">
                                            <input type="hidden" name="remita_service_id" id="remita_service_id" value="{{$fee->remita_service_id}}">
                                            <input type="hidden" name="client_ref" id="client_ref" value="{{Session::get('jamb_reg')}}">
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button id="send" type="button" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay with remita</i></button>
                                            <button id="interswitch" type="button" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay with Interswitch</i></button>
                                        </div>
                                    </form>

                                   

                                    <!-- <form class="col-lg-12" method="post" action="http://localhost/pms/api/process-payment">
                                        @csrf
                                        <input type="hidden" name="redirect_url" id="redirect_url" value="http://localhost:4000/api/save_application_fee/{{base64_encode($fee->id)}}">
                                        <input type="hidden" name="email" id="email" value="{{$std->email}}">
                                        <input type="hidden" name="phone" id="phone" value="{{$std->phone_number}}">
                                        <input type="hidden" name="name" id="name" value="{{Session::get('jamb_reg')}}">
                                        <input type="hidden" name="gateway" id="gateway" value="interswitch">
                                        <input type="hidden" name="reference_id" id="reference_id" value="{{uniqid()}}">
                                        <input type="hidden" name="amount" id="amount" value="{{$fee->amount}}">
                                        <input type="hidden" name="pms_id" id="pms_id" value="{{$fee->pms_id}}">
                                        <input type="hidden" name="public_key" id="public_key" value="QdvItofJDYlpVaKaswF6yAXGY1msRpVl4naFeeLDkj1zSJ0BoM">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            <button id="send" type="submit" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay</i></button>
                                        </div>
                                    </form> -->
                                </div>
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
<!-- <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script> -->
<!-- <script src="https://webpay.interswitchng.com/collections/public/javascripts/inline-checkout.js"></script> -->
<script>
    // function checkout() {
    //     var merchantCode = "MX18847"; //'MX20245';
    //     var payItemId = "9182240"; //'9716256';   
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
    //         mode: 'LIVE'
    //     };
    //     window.webpayCheckout(paymentRequest);
    // }

    // //generate a random transaction ref
    // function randomReference() {
    //     var length = 10;
    //     var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     var result = '';
    //     for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    //     return result;
    // }

    //callback function that gets triggered on payment success or failure
    // function paymentCallback(response) {
    //     $.LoadingOverlay("show");
    //     if (response.desc == "Approved by Financial Institution") {
    //         console.log(response);
    //         // alert(response.desc);
    //         // alert(response.desc); //Approved by Financial Institution //Customer cancellation
    //         // alert(response.code);

    //         // var site_urls = $('.cmd_pay1').attr('site_url');

    //         // var datastring='user_id='+document.getElementsByName('cust_id')[0].value;
    //         let app_num =  document.getElementsByName('cust_id')[0].value
    //         var datastring = {
    //             user_id: document.getElementsByName('cust_id')[0].value,
    //             invoice_id: document.getElementsByName('invoice_id')[0].value,
    //             payment_method: 'card',
    //             amount: amount,
    //             reference_id: response.txnref
    //         }

    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });


    //         $.post('/save_application_fee_interswitch', {
    //             datastring
    //         }).done(function(data) {
    //             if (data.body == "success") {
    //                 window.location.href = '/application-step3/'+app_num
    //                 $.LoadingOverlay("hide");
    //                 // $('#clickme').click()
    //                 // $(".enablePrintOut").show().html('<a href="javascript:;"><span class="fa fa-print icon-color icon-bigger"></span><p>APPLICATION PRINTOUT</p></a>').addClass('printout');
    //             } else {
    //                 $.LoadingOverlay("hide");
    //                 window.location.href = '/application-step3/'+app_num

    //                 // $('#clickme2').click()
    //             }
    //         });
    //     } else {
    //         $.LoadingOverlay("hide");
    //     }

    // }

    $('#send').click(function(){
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

    $('#interswitch').click(function(){
        $('#send').attr('disabled', 'true');
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
                "amount": parseInt($('#amount').val()) + 200,
                "channel": "card",
                "callback_url": $('#callback_url').val(),
                "item_code": $('#interswitch_item_code').val(),
                "remita_service_id": '',
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
</script>

@endsection
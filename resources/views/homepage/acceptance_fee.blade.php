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
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 39px ;">ACCEPTANCE FEE</h3>
                                                </div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 19px ;font-style: normal ;">Hello <b> {{session()->get('student')['first_name']}} {{session()->get('student')['last_name']}}</b>, you are required to pay or verify your acceptance fee before you can register on the portal.</span>
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
                                                                <p>Registration Number
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-name">
                                                                        <input id="matric_number" type="hidden" name="matric_number" class="input1" aria-required="true" required value="{{session()->get('student')['registration_number']}}">
                                                                        <input id="" type="text" value="{{session()->get('student')['registration_number']}}" class="input1" aria-required="true" readonly>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <div class="quform-element">
                                                                <p>Amount
                                                                    <br>
                                                                    <span class="wpcf7-form-control-wrap your-email">
                                                                        <input id="amount" type="hidden" name="amount" value="{{$fee->amount}}" class="input1">
                                                                        <input value="₦{{number_format($fee->amount,2,'.',',')}}" class="input1" aria-required="true" readonly>
                                                                    </span>
                                                                </p>
                                                            </div>

                                                            <a href="/">
                                                                <div class="col-md-4 btn btn-primary" style="background-color: #d9534f;">
                                                                    <span class="">Cancel</span>
                                                                </div>
                                                            </a>

                                                            <div class="col-md-4 btn btn-primary" id="vn-click">
                                                                <span class="">Pay Now</span>
                                                            </div>
                                                            <a href="/verify-acceptance-fee">
                                                                <div id="verify" class="col-md-4 btn btn btn-primary">
                                                                    <span class="">Verify Acceptance Fee</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" id="vn-info">
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12 text-center payment_btn" style="align-content: center;justify-content: center;" id="for_card">
                                                    <div class="col-lg-12">
                                                        <input type="hidden" name="callback_url" id="callback_url" value="https://imsu.edu.ng/api/save_acceptance_fee/{{base64_encode($fee->id)}}">
                                                        <input type="hidden" name="callback_url" id="callback_url_interswitch" value="https://imsu.edu.ng/api/save_acceptance_fee_interswitch/{{base64_encode($fee->id)}}">
                                                        <input type="hidden" name="email" id="email" value="{{$std->Email_Address}}">
                                                        <input type="hidden" name="phone" id="phone" value="{{$std->phone_number}}">
                                                        <input type="hidden" name="first_name" id="first_name" value="{{$std->first_name}}">
                                                        <input type="hidden" name="last_name" id="last_name" value="{{$std->last_name}}">
                                                        <input type="hidden" name="matric_no" id="matric_no" value="{{$std->registration_number}}">
                                                        <input type="hidden" name="amount" id="amount" value="{{$fee->amount}}">
                                                        <input type="hidden" name="channel" id="channel" value="card">
                                                        <input type="hidden" name="item_code" id="item_code" value="{{$fee->pms_id}}">
                                                        <input type="hidden" name="remita_service_id" id="remita_service_id" value="{{$fee->remita_service_id}}">
                                                        <input type="hidden" name="interswitch_item_code" id="interswitch_item_code" value="{{$fee->interswitch_item_code}}">
                                                        <input type="hidden" name="client_ref" id="client_ref" value="{{$std->registration_number}}">
                                                        <div class="col-md-12">
                                                            <button id="send" type="button" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay with remita</i></button>
                                                            <button id="interswitch" type="button" class="btn btn-lg btn-success"><i class="fa fa-money"> Pay with Interswitch</i></button>
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

    $('#send').click(function(){
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
                "Cookie": "ci_session=9pmf6h66uun6pnuqqiinrtccq3q1jku9"
            },
            "data": JSON.stringify({
                "first_name": $('#first_name').val(),
                "last_name": $('#last_name').val(),
                "email": $('#email').val(),
                "phone": $('#phone').val(),
                "matric_no": $('#matric_no').val(),
                "amount": $('#amount').val(),
                "channel": "card",
                "callback_url": $('#callback_url_interswitch').val(),
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

<!-- **** Flutterwave Inline Payment End **** -->
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://webpay.interswitchng.com/collections/public/javascripts/inline-checkout.js"></script>
<script src="https://qa.interswitchng.com/collections/public/javascripts/inline-checkout.js"></script>

@endsection
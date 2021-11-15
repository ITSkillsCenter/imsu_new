@extends('admin_student.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Payment page</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal form-label-left" method="post">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Session<span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-10 col-xs-12">
                                    <input id="fee_title" type="text" class="form-control col-md-7 col-xs-12" name="session" value="{{$fee->title}}" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Fee Name <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-10 col-xs-12">
                                    <input id="fee_name" type="text" class="form-control col-md-7 col-xs-12" name="fee_name" value="{{$fee->fee_name}}" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Amount <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-10 col-xs-12">
                                    <input id="amount" type="text" class="form-control col-md-7 col-xs-12" name="amount" value="{{$fee->amount - ($fee->amount * ($fee->discount/100))}}" readonly>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Status <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-10 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12" name="amount" value="{{$fee->status}}" readonly>
                                </div>
                            </div>

                            

                            @if($fee->status == 'unpaid')
                            <!-- <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-lg btn-success"><i class="fa fa-check"> Save</i></button>
                                </div>
                            </div> -->
                            <!-- <div class="row">
                                <div class="col-md-3 col-xs-8 text-center" id="for_card" style="margin-top: 23px;">
                                <input type="hidden" name="cust_id" value="<?= $fee->student_id ?>" id="cust_id">
                                <input type="hidden" name='currency' value="566" />
                                <input type="hidden" name='invoice_id' id="invoice_id" value="{{$fee->id}}" />
                                <input type="hidden" name='txn_ref' id="tranRef" />
                                <input type="hidden" name='merchant_code' />
                                <input type="hidden" name='pay_item_id' />
                                <input type="hidden" name='site_redirect_url' />
                                <input type="hidden" name='display_mode' value='PAGE' />
                                <button class="cmd_pay1" type="button" style="border: 1px solid rgb(206, 206, 206);
                                    box-shadow: rgb(226, 224, 224) 0px 1px 3px;
                                    padding: 0 2em 0 0.8em;
                                    height: 40px;
                                    font-weight: 700;
                                    border-radius: 4px;
                                    color: rgb(0, 66, 95);
                                    font-size: 13px;
                                    text-transform: uppercase;
                                    background-color: #FFF;
                                    background-image: url(https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btnbg.png);
                                    cursor: pointer;
                                    font-family: 'proxima-nova', sans-serif, 'Helvetica';" onclick="checkout()">
                                    <img style="float:left;" class="isw-pay-logo" src="https://paymentgateway.interswitchgroup.com/paymentgateway/public/images/isw_paynow_btn.png" />
                                    <span style="margin-top: 10px;display: inline-block;margin-left: 8px;">
                                        Pay with Interswitch
                                    </span>
                                </button>
                            </div> -->
                            <div class="col-md-5">
                                <input type="hidden" name="callback_url" id="callback_url" value="https://imsu.edu.ng/api/student-payment/pay/{{base64_encode($fee->id)}}">
                                <input type="hidden" name="callback_url" id="callback_url_interswitch" value="https://imsu.edu.ng/api/student-payment/pay-interswitch/{{base64_encode($fee->id)}}">
                                <input type="hidden" name="email" id="email" value="{{Session::get('student')->Email_Address}}">
                                <input type="hidden" name="phone" id="phone" value="{{Session::get('student')->Student_Mobile_Number}}">
                                <input type="hidden" name="first_name" id="first_name" value="{{Session::get('student')->first_name}}">
                                <input type="hidden" name="last_name" id="last_name" value="{{Session::get('student')->last_name}}">
                                <input type="hidden" name="matric_no" id="matric_no" value="{{Session::get('student')->matric_number}}">
                                <input type="hidden" name="amount" id="amount" value="{{$fee->amount - ($fee->amount * ($fee->discount/100))}}">
                                <input type="hidden" name="channel" id="channel" value="card">
                                <input type="hidden" name="item_code" id="item_code" value="{{$fee->pms_id}}">
                                <input type="hidden" name="interswitch_item_code" id="interswitch_item_code" value="{{$fee->interswitch_item_code}}">
                                <input type="hidden" name="remita_service_id" id="remita_service_id" value="{{$fee->remita_service_id}}">
                                <input type="hidden" name="client_ref" id="client_ref" value="{{$invoice_id}}">
                                <br>
                                <div class="col-md-12">
                                    <button id="send" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Remita </i></button>
                                    <button id="shr" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Interswitch</i></button>
                                    <!-- <button id="interswitch" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Interswitch</i></button> -->
                                </div>
                                <div class="col-md-12 col-md-offset-3" id="remita" style="display: none;">
                                    <button id="interswitch" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Interswitch</i></button>
                                    <!-- <button id="send" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Interswitch (Card)</i></button> -->
                                    <button id="bank" type="button" class="btn btn-success"><i class="fa fa-money"> Pay with Interswitch (Bank)</i></button>
                                </div>
                            </div>
                            </div>
                            
                            @endif
                        </form>
                        @if($fee->status == 'unpaid')
                        
                        @endif
                    </div>
                    <a style="display: none;" id="clickme" href="#myModal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
                    <a style="display: none;" id="clickme2" href="#myModal2" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
                    <div id="myModal" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <div class="icon-box">
                                        <i class="material-icons">&#xE876;</i>
                                    </div>
                                </div>
                                <div class="modal-body text-center">
                                    <h4>Kindly copy the RRR number below.</h4>
                                    <input class="form-control" type="text" id="rrr" readonly>
                                    <br>
                                    <button class="btn" data-clipboard-target="#rrr">
                                       Copy <i class="fa fa-copy"></i>
                                    </button> &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-success" href="/student-payment">Close</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="myModal2" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <div class="icon-box">
                                        <i class="material-icons">&#xE876;</i>
                                    </div>
                                </div>
                                <div class="modal-body text-center">
                                    <h4>Error!</h4>
                                    <p>An error occured</p>
                                    <a class="btn btn-success" href="/student-payment">Finish</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://webpay.interswitchng.com/collections/public/javascripts/inline-checkout.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<script>
    $(document).ready(function(){
        new ClipboardJS('.btn');
    })

    $('#shr').click(function(){
        $('#remita').slideToggle();
    })
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
            // resp.data.payment_channel = 'remita';

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

    $('#bank').click(function(){
        $(this).html('Loading...')
        $('#send').attr('disabled', true)
        $('#interswitch').attr('disabled', true)
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
                "channel": "bank",
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
            let status = resp.status
            let client_ref = resp.data.client_ref
            let rrr = resp.data.tranx_ref
            let payment_channel = 'interswitch'
            $.post('/api/save_bank_ref', {rrr, client_ref, payment_channel}).done(function(response){
                $('#rrr').val(rrr)
                $('#clickme').click()
            })

        });
    });


    
   
    function checkout() {
        var merchantCode =  "MX18847"; //'MX20245';
        var payItemId = "9182240";    //'9716256';   
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
            mode: 'LIVE'
        };
        window.webpayCheckout(paymentRequest);
    }

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
        $.LoadingOverlay("show");
        if (response.desc == "Approved by Financial Institution") {
            console.log(response);
            // alert(response.desc);
            // alert(response.desc); //Approved by Financial Institution //Customer cancellation
            // alert(response.code);

            // var site_urls = $('.cmd_pay1').attr('site_url');

            // var datastring='user_id='+document.getElementsByName('cust_id')[0].value;
            var datastring = {
                user_id: document.getElementsByName('cust_id')[0].value,
                invoice_id: document.getElementsByName('invoice_id')[0].value,
                // pms_id: document.getElementsByName('pms_id')[0].value,
                payment_method: 'card',
                amount: amount,
                reference_id: response.txnref,
                payment_channel: 'interswitch'
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.post('/save_payment_details',{datastring}).done(function(data){
                if (data.body == "success") {
                    $.LoadingOverlay("hide");
                    $('#clickme').click()
                    // $(".enablePrintOut").show().html('<a href="javascript:;"><span class="fa fa-print icon-color icon-bigger"></span><p>APPLICATION PRINTOUT</p></a>').addClass('printout');
                } else {
                    $.LoadingOverlay("hide");
                    $('#clickme2').click()
                }
            });
        }else{
            $.LoadingOverlay("hide");
        }

    }
</script>
@endsection
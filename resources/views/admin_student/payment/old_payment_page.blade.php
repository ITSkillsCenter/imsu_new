@extends('admin_student.master')
@section('title')
Student||Payment
@endsection
@section('main')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link  btn btn-outline-success" href="/student-payment">Go Back <span class="sr-only">(current)</span></a>&nbsp;&nbsp;

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Payment Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-label-left" method="post">
                        @include('homepage.flash_message')
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Session<span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="fee_name" type="text" class="form-control col-md-7 col-xs-12" name="session" value="{{$fee->title}}" readonly>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Fee Name <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="fee_name" type="text" class="form-control col-md-7 col-xs-12" name="fee_name" value="{{$fee->fee_name}}" readonly>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Amount <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="amount" type="text" class="form-control col-md-7 col-xs-12" name="amount" value="{{$fee->amount}}" readonly>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input id="amount" type="text" class="form-control col-md-7 col-xs-12" name="amount" value="{{$fee->status}}" readonly>
                            </div>
                        </div>

                        @if($fee->status == 'unpaid')
                        <!-- <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-lg btn-success"><i class="fa fa-check"> Save</i></button>
                                </div>
                            </div> -->
                        <div class="col-md-8 col-xs-8 text-center" id="for_card">
                            <input type="hidden" name="cust_id" value="<?= $fee->student_id ?>" id="cust_id">
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
                        @endif
                    </form>
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
                                <h4>Great!</h4>
                                <p>Payment made successfully.</p>
                                <a class="btn btn-success" href="/student-payment">Finish</a>
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
        <!-- /.card-body -->
        <div class="card-footer text-center">

        </div>
    </div>
    <!-- /.card -->
</section>
<script src="https://qa.interswitchng.com/collections/public/javascripts/inline-checkout.js"></script>
<script>
   
    function checkout() {
        var merchantCode = 'MX20245';
        var payItemId = '9716256';
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
            mode: 'TEST'
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
                payment_method: 'card',
                amount: amount,
                reference_id: response.txnref
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.post('/save_payment_details',{datastring}).done(function(data){
                if (data.body == "success") {
                    $('#clickme').click()
                    // $(".enablePrintOut").show().html('<a href="javascript:;"><span class="fa fa-print icon-color icon-bigger"></span><p>APPLICATION PRINTOUT</p></a>').addClass('printout');
                } else {
                    $('#clickme2').click()
                }
            });
        }

    }
</script>
@endsection
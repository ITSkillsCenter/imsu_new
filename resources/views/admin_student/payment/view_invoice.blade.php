@extends('admin_student.layout')
@section('content')
<div class="row ">
    <div class="col-12 col-lg-10 col-xl-12">
        <a href="/student-payment" class="btn btn-primary">Back</a>
        <div class="row align-items-center">
            <br>
            <div class="col">
                <h6 class="page-pretitle">
                    Payments
                </h6>
                <h4 class="page-title">{{$fee->status == 'paid' ? 'Receipt' : 'Invoice'}} #IMSU-000{{$fee->id}}</h4>
            </div>
            <div class="col-auto">
                <button id="download" onclick="createPdf()" class="btn btn-light btn-border">
                    Download
                </button>
                @if($fee->status == 'unpaid')
                <a href="/student-payment/pay/{{base64_encode($fee->id)}}" class="btn btn-primary ml-2">
                    Pay
                </a>
                <button id="check_pay_status" class="btn btn-info">Check Payment Status</button>
                @endif
                @if($fee->reason == 'generated')
                <a href="/cancel-invoice/{{base64_encode($fee->id)}}" class="btn btn-danger">Cancel</a>
                @endif
            </div>
        </div>
        <div class="page-divider"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-invoice" id="invoice">
                    <div class="card-header">
                        <div class="invoice-header">
                            <h3 class="invoice-title">
                                {{$fee->status == 'paid' ? 'Receipt' : 'Invoice'}}
                            </h3>
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('admin_student/assets/img/logo.png')}}" alt="company logo">
                            </div>
                        </div>
                        <div class="invoice-desc">
                            Imo State University, Owerri,<br />P.M.B, 2000
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="separator-solid"></div>
                        <div class="row">
                            <div class="col-md-4 info-invoice">
                                <h5 class="sub">Date</h5>
                                @if($fee->status == 'unpaid')
                                @php $date = date_create($fee->created_at); @endphp
                                <p>{{ date_format($date,"jS F, Y") }}</p>
                                @else
                                @php $date = date_create($fee->updated_at); @endphp
                                <p>{{ date_format($date,"jS F, Y") }}</p>
                                @endif
                            </div>
                            <div class="col-md-4 info-invoice">
                                @if($fee->status == 'unpaid')
                                <h5 class="sub">Invoice ID</h5>
                                <p>#IMSU-000{{$fee->id}}</p>
                                @else
                                <h5 class="sub">Payment Reference</h5>
                                <p>{{$fee->reference_id}}</p>
                                @endif
                            </div>
                            <div class="col-md-4 info-invoice">
                                @if($fee->status == 'unpaid')
                                <h5 class="sub">Invoice To</h5>
                                @else
                                <h5 class="sub">Paid By</h5>
                                @endif
                                <p>
                                    {{session()->get('student')['first_name']}} {{session()->get('student')['last_name']}} {{session()->get('student')['middle_name']}},<br />Matric Number: {{session()->get('student')['matric_number']}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-detail">
                                    <div class="invoice-top">
                                        <h3 class="title"><strong>Summary</strong></h3>
                                    </div>
                                    <div class="invoice-item">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <td><strong>S/N</strong></td>
                                                        <td class="text-center"><strong>Session</strong></td>
                                                        <td class="text-center"><strong>Fee Name</strong></td>
                                                        @if($fee->is_applicable_discount == 'yes')
                                                        <td class="text-center"><strong>Discount</strong></td>
                                                        @endif
                                                        <td class="text-right"><strong>Amount</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td class="text-center">{{$fee->title}}</td>
                                                        <td class="text-center">{{$fee->fee_name}}</td>
                                                        @if($fee->is_applicable_discount == 'yes')
                                                        <td class="text-center">{{$fee->discount}}</td>
                                                        @endif
                                                        <td class="text-right">₦{{number_format($fee->amount, 2)}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator-solid  mb-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-8 col-md-6 mb-3 mb-md-0 transfer-to">
                                <h5 class="sub">Imo State University</h5>
                                <div class="account-transfer">
                                    <div>Imo State University, Owerri, P.M.B, 2000</div>
                                    <div>Phone: 0806*******</div>
                                    <div>Email: info@imsu.edu.ng</div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-6 transfer-total">
                                <h5 class="sub">Total Amount</h5>
                                <div class="price">₦{{number_format($fee->amount, 2)}}</div>
                                <!-- <span>Taxes Included</span> -->
                            </div>
                        </div>
                        <div class="separator-solid"></div>
                        <h6 class="text-uppercase mt-4 mb-3 fw-bold">
                            Notes
                        </h6>
                        <p class="text-muted mb-0">

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a style="display: none;" id="clickme" href="#myModal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
<a style="display: none;" id="clickme2" href="#myModal2" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
<a style="display: none;" id="clickme3" href="#myModal3" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="fa fa-check">&#xE876;</i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Succes!</h4>
                <p>Payment Status Updated!</p>
                <a class="btn btn-success" href="/student-payment">Continue</a>
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
<div id="myModal3" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="fa fa-times">&#xE876;</i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Error!</h4>
                <p>Payment hasn't been made for this invoice</p>
                <a class="btn btn-success" href="/student-payment">Close</a>
            </div>
        </div>
    </div>
</div>
<div id="editor"></div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.2.0/jspdf.umd.min.js"></script> -->

<script>
    function createPdf() {
        $('#invoice').printThis({
            importCSS: true,
        });
    }

    $('#check_pay_status').click(function() {
        $(this).html('Loading...')
        var settings = {
            "url": "https://imorms.ng/api/v1/college-requery/27/{{$fee->reference_id ?? abcd}}",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Cookie": "ci_session=m33j75ft4lhpupt90cvder4p2doufhfo"
            },
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax(settings).done(function(response) {
            $('#check_pay_status').html('Done')
            console.log(response)
            if (response.status !== 'error') {
                $.post('/update_payment_details', {
                    response
                }).done(function(data) {
                    if (data.body == "success") {
                        $('#clickme').click()
                    } else {
                        $('#clickme2').click()
                    }
                })
            }else{
                $('#clickme3').click()
            }
        });
    })
</script>
@endsection
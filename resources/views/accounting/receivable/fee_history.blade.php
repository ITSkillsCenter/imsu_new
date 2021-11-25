@extends('layouts.master',['title'=>'Payment History'])


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Payment History','Title'=>'Ledger'])

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Payment History.</div>
                </div>
                <div class="card-header">
                    <a id="clickme2" href="#myModal2" class="btn btn-primary trigger-btn" data-toggle="modal" data-backdrop="static">Click here to verify payment</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            @if(count($all_fees)>0)
                            <div class="x_content">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Matric Number</th>
                                            <th>Payment For</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Reference</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <!-- <th>Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($all_fees as $fl)
                                        <tr>
                                            <td>{{$fl->first_name . ' ' . $fl->last_name}}</td>
                                            <td>{{$fl->matric_number ?? $fl->registration_number}}</td>
                                            <td>{{$fl->fee_name}}</td>
                                            <td>{{$fl->amount}}</td>
                                            <td>{{$fl->pstatus}}</td>
                                            <td>{{$fl->reference_id}}</td>
                                            <td>{{date_format(date_create($fl->fcreated), 'd/m/Y')}}</td>
                                            <td>{{date_format(date_create($fl->fupdated), 'd/m/Y')}}</td>
                                            <!-- <td>
                                                <div class="btn-group">
                                                    <a title='Update' class='btn btn-info btn-xs btnUpdate' href="">
                                                        <i class="fas fa-check icon-white"></i>
                                                    </a>
                                                </div>
                                            </td> -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="myModal2" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h3>Verify Payment</h3>
            </div>
            <div class="modal-body text-center">
                <input type="hidden" id="full_name" value="{{$applicant->full_name ?? $applicant->first_name. ' ' . $applicant->last_name}}">
                <input type="hidden" id="phone" value="{{$applicant->phone_number}}">
                <input class="form-control" style="padding: 10px;" type="text" id="verify_rrr" placeholder="Type your RRR number here"> <br>
                <button class="btn btn-success" id="check_pay_status">Verify</button><br><br>
            </div>
        </div>
    </div>
</div>

<a style="display: none;" id="suc_clickme" href="#success_modal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>
<a style="display: none;" id="err_clickme" href="#error_modal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>

<div id="success_modal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="fa fa-check">&#xE876;</i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Payment verified successfully!</h4>
                <p>Payment status now updated to paid!</p>
                <a class="btn btn-success" href="/admin/fee-history">Continue</a>
            </div>
        </div>
    </div>
</div>
<div id="error_modal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>
            </div>
            <div class="modal-body text-center">
                <h4>Error!</h4>
                <p style="font-size: 14px;">Payment hasn't been made for this reference number</p>
                <a class="btn btn-success" href="/admin/fee-history">Finish</a>
                <br><br>
            </div>
        </div>
    </div>
</div>
<a style="display: none;" id="clickme" href="#myModal" class="trigger-btn" data-toggle="modal" data-backdrop="static">Click to Open Success Modal</a>


@endsection

@section('extrascript')
<script src="{{ URL::asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.flash.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.toggle-sidebar').click()
        //datatables code
        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    responsive: true,
                    dom: "Bfrtip",
                    buttons: [{
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        TableManageButtons.init();

    });
</script>
<script>
    $('#check_pay_status').click(function() {
        $(this).html('Loading...')
        let rrr = $('#verify_rrr').val()
        // alert(rrr)
        var settings = {
            "url": "https://imorms.ng/api/v1/college-requery/27/" + rrr,
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
                $.post('/admin/update_payment_details', {
                    response
                }).done(function(data) {
                    console.log(data)
                    if (data.body == "success") {
                        $('#suc_clickme').click()
                    } else {
                        $('#err_clickme').click()
                    }
                })
            }else{
                $('#clickme3').click()
            }
        });
    })
  </script>
<!-- /validator -->
@endsection
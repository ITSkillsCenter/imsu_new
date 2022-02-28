@extends('layouts.master')

@section('crumbmenu')
@include('layouts.includes.masterBreadCrumb')
@endsection

@section('content')
<div class="p-5">
    <div class="row">
        <!-- <div class="col-12 col-sm-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5><b>Total Acceptance Fee Payment</b></h5>
                                <a href="/admin/approve_acceptance/paid" class="text-muted btn btn-sm btn-info"
                                    style="color: white !important">View Details</a>
                            </div>
                            <h3 class="text-info fw-bold">&#x20A6;{{ number_format($acceptance_total, 2, '.', ',') }}</h3>
                        </div>
                    </div>
                </div>
            </div> -->

        <div class="col-sm-12 col-md-12">
            <h3>ACADEMIC</h3>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/programs">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-book-open"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-4 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Number of Programmes</p>
                                    <h4 class="card-title">
                                        {{ $programs }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <a href="/admin/faculty">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-4 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Number of Faculties</p>
                                    <h4 class="card-title">
                                        {{ ($faculties) }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/departments">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-4 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Number of Departments</p>
                                    <h4 class="card-title">
                                        {{ ($departments) }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-12">
            <h3>STUDENTS</h3>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/student_year">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Students in Database </p>
                                    <h4 class="card-title">{{ ($db_students) }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/studentinfo/find/created">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Created Accounts </p>
                                    <h4 class="card-title">{{ ($created_students) }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/studentinfo/find/registered">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Registered Students</p>
                                    <h4 class="card-title">{{ $registered_students }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/studentinfo/find/paid">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Number of Payments</p>
                                    <h4 class="card-title">{{ $paid_students }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/manage-admission">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">No. of Applicants Post UTME</p>
                                    <h4 class="card-title">{{ $pu }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/view-applicants">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">No. of Applicants Direct Entry</p>
                                    <h4 class="card-title">{{ $pd }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/view-applicants">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">No. of Applicants Postgraduate</p>
                                    <h4 class="card-title">{{ $paid_pg }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/view-applicants">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">No. of Applicants ICEP</p>
                                    <h4 class="card-title">{{ 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/view-applicants">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">No. of Applicants JUPEB</p>
                                    <h4 class="card-title">{{ 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="/admin/view-applicants">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">No. of Applicants Pre-degree</p>
                                    <h4 class="card-title">{{ 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-12">
            <h3>STAFF</h3>
        </div>

        <div class="col-sm-4 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Staffs</p>
                                <h4 class="card-title">{{0}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Academic Staffs</p>
                                <h4 class="card-title">{{ 0}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Non-Academic Staffs</p>
                                <h4 class="card-title">{{ 0}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @permission('receivable-read')
        <div class="col-sm-12 col-md-12">
            <h3>FINANCIAL</h3>
        </div>

        <div class="col-12 col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>Total Revenue Expected (This Section)</b></h5>
                            <!-- <p class="small">This includes all revenue heads expected to be paid by students</p> -->
                            <a href="/admin/receivable-all" class="text-muted btn btn-sm btn-info" style="color: white !important">View Details</a>
                        </div>
                        <h3 class="text-info fw-bold">&#x20A6;{{ number_format($expected, 2, '.', ',') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>Total Revenue Realized</b></h5>
                            <!-- <p class="small">This includes Acceptance fee, school fees, all revenue heads and those paid outside the portal, yet to be confirmed</p> -->
                            <!-- <a href="/admin/receivable-all" class="text-muted btn btn-sm btn-info" style="color: white !important">View Details</a> -->
                            <a href="/admin/all-receivable" class="text-muted btn btn-sm btn-info" style="color: white !important">View Details</a>

                        </div>
                        <h3 class="text-info fw-bold">&#x20A6; 
                            <!-- <span id="tot_rev">{{ number_format($revenue + $acceptance_total, 2, '.', ',') }}</span> -->
                            <span id="tot_rev">---------------------</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>



        <br>
        <br>
        <br>
        <div class="col-sm-12 col-md-12">
            <h3 style="margin-top:50px;">PAYMENT SUMMARY
                @if($showing)
                <span style="color:red"> ({{$showing}})</span>
                @endif
            </h3>
        </div>
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="col-sm-12 col-md-12">
            <div class="row">
                <div class=" col-lg-6">
                    <form action="" type="get">
                        <div class="form-row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>{{ __('Start Date') }}</label>
                                    <input type="date" class="form-control" name="start_date" required="">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>{{ __('End Date') }}</label>
                                    <input type="date" class="form-control" name="end_date" required="">
                                </div>
                            </div>
                            <div class="col-lg-2 mt-2">
                                <button type="submit" class="btn btn-primary mt-3">{{ __('Search') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class=" mt-2 col-lg-3"></div>
                <div class=" mt-2 col-lg-3">
                    <form action="" type="get">
                        <div class="input-group form-row mt-3">
                            <select class="form-control" name="select_day">
                                <option value="all">{{ __('All') }}</option>
                                <option value="today">{{ __('Today') }}</option>
                                <option value="thisWeek">{{ __('This Week') }}</option>
                                <option value="thisMonth">{{ __('This Month') }}</option>
                                <option value="thisYear">{{ __('This Year') }}</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="col-4 mt-2">
                        <form action="{{ url('/admin/report') }}" type="get">
                            <div class="input-group form-row mt-3">

                                <input type="text" class="form-control" placeholder="Search ..." required=""
                                        name="value" autocomplete="off" value="">
                                    <select class="form-control" name="type">
                                        <option value="customer_name">{{ __('Customer name') }}</option>
                                        <option value="customer_email">{{ __('Customer email') }}</option>
                                        <option value="plan_name">{{ __('plan name') }}</option>
                                        <option value="getway_name">{{ __('gateway name') }}</option>
                                        <option value="exp_date">{{ __('exp date') }}</option>
                                        <option value="payment_id">{{ __('payment id') }}</option>
                                    </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> -->
            </div>
        </div>


        <div class="col-sm-12 col-md-12">
            <div class="card card-stats card-round">
                <div class="card-body">

                    <table id="datatable-students" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Fee Type</th>
                                <th>Total Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $ct = 1; @endphp
                            <tr>
                                <td>{{$ct++}}</td>
                                <td>PUTME Fee</td>
                                <td>&#x20A6;{{number_format($putme,2)}}</td>
                                <td><a href="/admin/manage-admission" class="btn btn-sm btn-primary">View Details </a></td>
                            </tr>
                            @if(count($transactions_overview)>0)
                            @foreach($transactions_overview as $overview)
                            <tr>
                                <td>{{$ct++}}</td>
                                <td>{{$overview['fee_name']}}</td>
                                <td>&#x20A6;{{number_format($overview['total_val'],2)}}</td>
                                <td><a href="/admin/view_payment_details/{{base64_encode($overview['fee_id'])}}" class="btn btn-sm btn-primary">View Details </a></td>
                            </tr>
                            @endforeach

                            @if(count($acceptance_fees) > 0)
                            @php $tot = 0; @endphp
                            @foreach($acceptance_fees as $p)
                            @php $tot += $p->amount; @endphp
                            @endforeach
                            <tr>
                                <td>{{$ct++}}</td>
                                <td>Acceptance Fees</td>
                                <td>&#x20A6;{{number_format($tot,2)}}</td>
                                <td><a href="/admin/view_payment_details/{{base64_encode(0)}}" class="btn btn-sm btn-primary">View Details </a></td>
                            </tr>
                            @endif

                            @else
                            <tr>
                                <td colspan="3" align="center">No Results Found!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Payment Channel</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $ct = 1; @endphp
                            <tr>
                                <td>{{$ct++}}</td>
                                <td>Remita</td>
                                <td>&#x20A6;{{number_format($remita,2)}}</td>
                            </tr>
                            <tr>
                                <td>{{$ct++}}</td>
                                <td>Interswitch</td>
                                <td>&#x20A6;{{number_format($interswitch,2)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @endpermission

    </div>
</div>
<!-- /page content -->

<style>
    .btn {
        margin: 0;
    }

    .mt-3,
    .my-3 {
        margin-top: 31px !important;
    }
</style>

@endsection
@section('extrascript')

<script>
    var myVar = setInterval(function() {
        myTimer();
    }, 1000);

    function myTimer() {
        var d = new Date();
        document.getElementById("clock").innerHTML = d.toLocaleTimeString();
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function call(){
        $.get('https://imorms.ng/api/v1/payment/summary/27?fromDate=01-02-2022&toDate=31-02-2022').done(function(data) {
            data = JSON.parse(data)
            let total = data.total_amount
            // alert(total)
            $('#tot_rev').html(new Intl.NumberFormat().format(total))
        })
    }

    call()

</script>

@endsection
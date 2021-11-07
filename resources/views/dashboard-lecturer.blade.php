@extends('layouts.master')

@section('crumbmenu')
@include('layouts.includes.masterBreadCrumb')
@endsection

@section('content')
<div class="p-5">
    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="card card-stats card-round ">
                <div class="card-body text-center">
                    <h1 style="font-weight:bolder;">{{auth()->user()->welcome}}</h1>
                   {{-- <span style="font-size: 20px;">Session:  {{\Helper::get_current_semester()}}. </span>  <span style="font-size: 20px;">Semester: {{\Helper::get_sem()}}.</span>  <span style="font-size: 20px;">Date: {{now()->toFormattedDateString()}}</span>  --}}
                </div>
            </div>
        </div>

        {{-- <div class="col-sm-12 col-md-12">
            <h3>STUDENTS</h3>
        </div> --}}
        <div class="col-sm-6 col-md-4">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <a href="{{route('lecturerAssignedCourses.list')}}">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Number of Courses</p>
                                    <h4 class="card-title">{{ ($lecturer_course_count) }}</h4>
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
                    <a href="javascript:void();">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Number of Students </p>
                                    <h4 class="card-title">{{ ($student_count) }}</h4>
                                
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
                    <a href="javascript:void();" class="link-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Number of Unread messages </p>
                                    <h4 class="card-title">0</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="card card-stats card-round  pb-5">
                <div class="card-body">
                    <a  href="javascript:void();" class="link-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="row align-items-center">
                            {{-- <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div> --}}
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Notifications</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round  pb-5">
                <div class="card-body">
                    <a href="javascript:void();" class="link-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="row align-items-center">
                            {{-- <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div> --}}
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Messages and Chat</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round  pb-5">
                <div class="card-body">
                    <a href="javascript:void();" class="link-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="row align-items-center">
                            {{-- <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div> --}}
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Time table</p>
                                </div>
                            </div>
                        </div>
                    </a>
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
                            <a href="/admin/receivable-all" class="text-muted btn btn-sm btn-info" style="color: white !important">View Details</a>

                        </div>
                        <h3 class="text-info fw-bold">&#x20A6;{{ number_format($revenue + $acceptance_total, 2, '.', ',') }}</h3>
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
                            @if(count($transactions_overview)>0)
                            @php $ct = 1; @endphp
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
                                @php    $tot += $p->amount;  @endphp
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

        @endpermission
        
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> --}}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h1>Coming soon...</h1>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
<!-- /page content -->

<style>
    .btn{margin: 0;}
    .mt-3, .my-3 {
        margin-top: 31px!important;
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
</script>

@endsection
@extends('admin_student.layout')
@section('content')

<div class="row">
    @if($pending_payments > 0)
    <div class="col-sm-12 col-lg-12">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <span class="stamp stamp-md bg-danger mr-3">
                    <i class="fa fa-money-check-alt"></i>
                </span>
                <div>
                    <h5 class="mb-1"><b><a href="/student-payment">You have {{$pending_payments}} pending payments</a></b></h5>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-primary card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-users"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Current Session</p>
                            <h4 class="card-title">{{$current_session->title}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-info card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-interface-6"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Courses Registered</p>
                            <h4 class="card-title">{{$current_courses}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-success card-round">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-analytics"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">CGPA</p>
                            <h4 class="card-title">N/A</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">You are almost there....</div>
            <div class="card-body">
                <div>
                    <b>1. Pay Your School Fess</b><br>
                    Check the Payment tab for pending payments, and pay your school fees.
                </div><br>
                <div>
                    <b>2. Complete Course Registration</b><br>
                   After Paying your school fees, complete your course registration by clicking the Course Registration tab on the sidebar.
                </div><br>
               
            </div>
        </div>
    </div>
</div>

@endsection
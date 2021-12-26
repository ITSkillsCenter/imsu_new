@extends('admin_student.layout')
@section('title')
Student || Clearance
@endsection
@section('content')
@include('layouts.includes.crumbMenuStudent',['pageTitle'=>'Clearance', 'pageLink' => '/student-clearance','Title'=>'Financial Information'])
<div class="row">
    <div class="col-lg-12">
        @include('homepage.flash_message')
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Year 1
            </div>
            <div class="card-body">
                @foreach($year1 as $yr)
                    <p>{{Helper::get_fee($yr)->fee_name}} ---------------- {{Helper::student_paid_fee_check($yr)}}</p>
                @endforeach

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Year 2
            </div>
            <div class="card-body">
                @foreach($year2 as $yr)
                    <p>{{Helper::get_fee($yr)->fee_name}} ---------------- {{Helper::student_paid_fee_check($yr)}}</p>
                @endforeach

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Year 3
            </div>
            <div class="card-body">
                @foreach($year3 as $yr)
                    <p>{{Helper::get_fee($yr)->fee_name}} --------------- {{Helper::student_paid_fee_check($yr)}}</p>
                @endforeach

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Year 4
            </div>
            <div class="card-body">
                @foreach($year4 as $yr)
                    <p>{{Helper::get_fee($yr)->fee_name}} --------------- {{Helper::student_paid_fee_check($yr)}}</p>
                @endforeach

            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Year 5
            </div>
            <div class="card-body">
                @foreach($year5 as $yr)
                    <p>{{Helper::get_fee($yr)->fee_name}} ---------------- {{Helper::student_paid_fee_check($yr)}}</p>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection
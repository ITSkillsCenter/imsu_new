@extends('admin_student.layout')
@section('title')
Student || Clearance
@endsection
@section('content')
@include('layouts.includes.crumbMenuStudent',['pageTitle'=>'Clearance'])
<div class="row">
    <div class="col-lg-12">
        @include('homepage.flash_message')
    </div>
    <div class="col-lg-4">
        <a href="/student-clearance/personal-info" class="card">
            <div class="card-body text-center" style="color: {{$clear_step == 0 ? 'black' : '#3db170'}}">
                <i class="fa fa-user fa-3x"></i> <br><br>
                Personal information
            </div>
        </a>
    </div>
    <div class="col-lg-4">
        <a href="/student-clearance/financial-info" class="card">
            <div class="card-body text-center" style="color: {{$clear_step < 2 ? 'black' : '#3db170'}}">
                <i class="fas fa-money-check-alt fa-3x"></i> <br><br>
                Financial Information
            </div>
        </a>
    </div>
    <div class="col-lg-4">
        <a href="/student-clearance/general-info" class="card">
            <div class="card-body text-center" style="color: {{$clear_step < 3 ? 'black' : '#3db170'}}">
                <i class="fas fa-book fa-3x"></i> <br><br>
                GENERAL CLEARANCE
            </div>
        </a>
    </div>
</div>

@endsection
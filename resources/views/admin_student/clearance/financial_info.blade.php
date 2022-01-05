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
    @for($i=1; $i<=$dept_years; $i++) <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Year {{$i}}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Fee Name</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach($years[$i-1] as $yr)
                        <tr>
                            <td>{{Helper::get_fee($yr)->fee_name}}</td>
                            <td>{{Helper::student_paid_fee_check($yr, $others_sessions[$i-1]->id)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endfor

<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            General Fee
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>Fee Name</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach($general_fee as $yr)
                    <tr>
                        <td>{{Helper::get_fee($yr)->fee_name}}</td>
                        <td>{{Helper::student_paid_fee_check($yr)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row col-lg-12">
    <form method="post" class="col-lg-6">
        @csrf
        <button type="submit" class="btn btn-success">Confirm</button>
        <a href="/student-clearance" class="btn btn-danger">Return</a>
    </form>
</div>


</div>

@endsection
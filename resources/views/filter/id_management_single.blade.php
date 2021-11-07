@extends('layouts.master')


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'ID Card Management','Title'=>'ID Card'])
    <a href="/admin/id-management" class="btn btn-primary">Back</a> <br><br>
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-sm-12 text-center" style="border-bottom: 7px solid #3db166;">
                            <img src="/homepage/upload/logo.png" style="margin: auto; margin-bottom:20px" height="30" alt="logo">
                            <span style="padding-left:10px; font-size: 25px;">IMO STATE UNIVERSITY</span>
                        </div>
                        <div class="col-sm-5" style="margin-top: 10px;">
                            <div class="text-center">
                                <img alt="image" class="img-circle m-t-xs img-responsive" height="100" src="/profile_images/{{$student->Photo}}">
                                <div class="m-t-xs font-bold"><br><strong>{{ucwords($student->student_type)}}</strong></div>
                            </div>
                        </div>
                        <div class="col-sm-7" style="margin-top: 10px;">
                            <h3>Name: <strong>{{$student->first_name . ' ' . $student->last_name}}</strong></h3>
                            <h3>Faculty: <strong>{{Helper::get_faculty($student->faculty_id)->name}}</strong></h3>
                            <h3>Department: <strong>{{Helper::get_department($student->dept_id)->name}}</strong></h3>
                            <h3>Year: <strong>{{$student->Batch}}</strong></h3>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn {
        min-width: 133px;
    }
</style>
<script>

</script>
@endsection
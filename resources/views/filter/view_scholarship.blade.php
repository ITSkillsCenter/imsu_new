@extends('layouts.master',['title'=>'View Scholarship Application'])


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Scholarship','Title'=>'Scholarship Application'])

    <div class="row">
        <div class="col-md-12">
            @include('homepage.flash_message')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">View Scholarship Application</div>
                </div>
                <form method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="col-md-12">
                                    <div class="panel panel-default no-margin-bottom">
                                        <div class="panel-body row" id="create-article">
                                            <div class="form-group col-md-12 bold"><b>Father's Information</b></div>
                                            <div class="form-group col-md-4">
                                                <label for="title">Father's Name:</label>
                                                <p>{{$scholarship->fathers_name}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Father's place of work:</label>
                                                <p>{{$scholarship->fathers_place_of_work}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Father's role at work:</label>
                                                <p>{{$scholarship->fathers_role_at_work}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Father's monthly income:</label>
                                                <p>{{$scholarship->fathers_monthly_income}}</p>
                                            </div>

                                            <div class="form-group col-md-12"><b>Mother's Information</b></div>
                                            <div class="form-group col-md-4">
                                                <label for="title">Mother's Name:</label>
                                                <p>{{$scholarship->mothers_name}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Mother's place of work:</label>
                                                <p>{{$scholarship->mothers_place_of_work}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Mother's role at work:</label>
                                                <p>{{$scholarship->mothers_role_at_work}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Mother's monthly income:</label>
                                                <p>{{$scholarship->mothers_monthly_income}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Sponsor:</label>
                                                <p>{{ucwords($scholarship->sponsor)}}</p>
                                            </div>

                                            @if($scholarship->sponsor == 'other')
                                            <div class="form-group col-md-4">
                                                <label for="title">Sponsor's Name:</label>
                                                <p>{{$scholarship->sponsors_name}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Sponsor's place of work:</label>
                                                <p>{{$scholarship->sponsors_place_of_work}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Sponsor's role at work:</label>
                                                <p>{{$scholarship->sponsors_role_at_work}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Sponsor's monthly income:</label>
                                                <p>{{$scholarship->sponsors_monthly_income}}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="title">Sponsor's relationship with student:</label>
                                                <p>{{ucwords($scholarship->sponsor_relationship)}}</p>
                                            </div>
                                            @endif

                                            <div class="form-group col-md-12">
                                                <label for="title">Application Letter:</label>
                                                <div>{{($scholarship->application_letter)}}</div>
                                            </div>

                                            
                                            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <input type="hidden" name="id" value="{{$id}}">
                        @if($scholarship->status !== 'approved')
                        <button type="submit" class="btn btn-success">Approve</button>
                        @else
                        Status: Approved
                        @endif  
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
@endsection


@section('extrascript')
<script src="https://cdn.ckeditor.com/4.16.1/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
        height: 500
    });
</script>
@endsection
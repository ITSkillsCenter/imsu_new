@extends('layouts.master')


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Program','Title'=>'Edit'])

    <div class="row">
        <div class="col-md-8 mx-auto">
            @include('homepage.flash_message')
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Program - Edit</div>
                </div>
                <form method="POST" action="{{ route('programs.update',$program->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">

                                <div class="form-group">
                                    <label>Name: </label>
                                    <input class="form-control" name="name" value="{{ $program->name }}" />
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Description: </label>
                                    <input class="form-control" name="description" value="{{ $program->description }}" required />
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Admission Commence Date: </label>
                                    <input type="date" class="form-control" value="{{$program->start_date}}" id="start_date" name="start_date" />
                                </div>
                                <div class="form-group">
                                    <label>Admission End Date: </label>
                                    <input type="date" class="form-control" value="{{$program->end_date}}" id="end_date" name="end_date" />
                                </div>
                                <div class="form-group">
                                    <label for="">Notice (Will display after end date):</label>
                                    <textarea name="notice" class="form-control" id="" cols="30" rows="10">{{$program->notice}}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success">Submit</button>
                        <a href="{{url('admin/programs')}}" class="btn btn-danger">Return</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
<script>
    $('#start_date').change(function() {
        $('#end_date').attr('min', $(this).val());
    })
</script>
@endsection
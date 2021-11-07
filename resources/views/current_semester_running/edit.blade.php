@extends('layouts.master',['title'=>'Semester Detail'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Semester Detail','Title'=>'Semester'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Semester Detail - Edit</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <form method="POST" action="{{route('current-semester-running.update', $semester->id)}}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                    <div class="form-group">
                                        <label>Semester Title: </label>
                                        <input class="form-control" name="title" placeholder="Semester - Year" value="{{ $semester->title }}"/>
                                    </div>
                                    <div class="form-group datepicker">
                                        <label>Starts From: </label>
                                        <input type="date" class="form-control" name="from" value="{{ $semester->from }}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Till: </label>
                                        <input type="date" class="form-control" name="to" value="{{ $semester->to }}"/>
                                    </div>
                                    <div class="form-group">
                                    <label>Status: </label>
                                    <select name="status" class="form-control">
                                        <option value="active" @if ($semester->status == 'active')
                                            selected
                                        @endif>active</option>
                                        <option value="inactive" @if ($semester->status == 'inactive')
                                            selected
                                        @endif>inactive</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                    <label>Define As Previous Semester: </label>
                                    <select name="previous_semester" class="form-control">
                                        <option value="0">no</option>
                                        <option value="1">yes</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                  <div class="btn-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    &nbsp;
                                    <a href="{{url()->previous()}}" class="btn btn-info">Return Back</a>
                                  </div>
                                    </div>
                                </form>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
 
</div>
@endsection

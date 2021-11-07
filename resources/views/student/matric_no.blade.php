@extends('layouts.master')


@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'Generate Matric Number','Title'=>'Student'])
  <div class="row">
    <div class="col-md-12">


      <div class="card">
        <div class="card-header">
          {{-- <h4 class="card-title">All Student Information</h4> --}}
          <h4 class="text-primary">Search Student By Year and Department:</h4>
        </div>
        <div class="card-body">

          <form class="" method="POST" action="{{ route('student.matric.num') }}">
            @csrf
            <div class="row col-md-12 col-sm-12 col-xs-12">
              <div class="form-group col-md-6">
                <label for="Registration_Number">Select Year: <span class="text-danger">*</span></label>
                <select name="year" class="form-control" required>
                  <option value="">--Select Year--</option>
                  <option value="2010/2011">2010/2011</option>
                  <option value="2011/2012">2011/2012</option>
                  <option value="2012/2013">2012/2013</option>
                  <option value="2013/2014">2013/2014</option>
                  <option value="2014/2015">2014/2015</option>
                  <option value="2015/2016">2015/2016</option>
                  <option value="2016/2017">2016/2017</option>
                  <option value="2017/2018">2017/2018</option>
                  <option value="2018/2019">2018/2019</option>
                  <option value="2019/2020">2019/2020</option>
                  <option value="2020/2021">2020/2021</option>
                  <option value="2021/2022">2021/2022</option>
                  <option value="2022/2023">2022/2023</option>
                </select>
                <span id="Registration_Number" class="text-danger">{{ $errors->first('Registration_Number') }}</span>
                <!-- {{-- <small id="emailHelp2" class="form-text text-danger"><strong>Students Without Mariculation Number Will Be Filtered.</strong></small> --}} -->
              </div>
              <div class="form-group col-md-6">
                <label for="Registration_Number">Select Department: <span class="text-danger">*</span></label>
                <select name="dept" class="form-control" required>
                  <option value="">--Select Department--</option>
                  @foreach($departments as $department)
                  <option value="{{$department->id}}">{{$department->name}}</option>
                  @endforeach
                </select>
                <span id="dept" class="text-danger">{{ $errors->first('dept') }}</span>
                <!-- {{-- <small id="emailHelp2" class="form-text text-danger"><strong>Students Without Mariculation Number Will Be Filtered.</strong></small> --}} -->

                <!-- <button type="submit" style="margin-top: 5px" class="btn btn-md btn-primary pull-right"><i class="fa fa-check"></i> Search </button> -->
              </div>
              <button type="submit" style="margin-top: 5px" class="btn btn-md btn-primary text-left"><i class="fa fa-check"></i> Search </button>
            </div>
          </form>
        </div>
      </div>
      <!-- <div class="card">
        <div class="card-header">
          {{-- <h4 class="card-title">All Student Information</h4> --}}
          <h4 class="text-primary">Search Student By Department:</h4>
        </div>
        <div class="card-body">
          <form class="" method="POST" action="{{route('student.matric.num') }}">
            @csrf
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group col-md-6">
                <label for="Registration_Number">Select Department: <span class="text-danger">*</span></label>
                <select name="dept" class="form-control" required>
                  <option value="">--Select Department--</option>
                  @foreach($departments as $department)
                  <option value="{{$department->id}}">{{$department->name}}</option>
                  @endforeach
                </select>
                <span id="dept" class="text-danger">{{ $errors->first('dept') }}</span>
                {{-- <small id="emailHelp2" class="form-text text-danger"><strong>Students Without Mariculation Number Will Be Filtered.</strong></small> --}}

                <button type="submit" style="margin-top: 5px" class="btn btn-md btn-primary pull-right"><i class="fa fa-check"></i> Search </button>
              </div>
            </div>
          </form>
        </div>
      </div> -->
    </div>
  </div>


</div>
@endsection

@section('extrascript')


@endsection
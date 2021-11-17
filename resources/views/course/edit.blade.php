@extends('layouts.master',['title'=>'Course'])


@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'Course','Title'=>'Course'])

  <div class="row">
    <div class="col-md-12">
      @include('homepage.flash_message')
      <div class="card">
        <div class="card-header">
          <div class="card-title">Course basic information.</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <form class="form-horizontal form-label-left" novalidate method="post" action="/admin/course/edit/{{base64_encode($course->id)}}">
                {{csrf_field()}}

                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="course_code">Course Code <span class="required">*</span>
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input id="course_code" type="text" class="form-control col-md-12 col-sm-12 col-xs-12" name="course_code" value="{{$course->course_code}}" required="required" type="text">
                    <span class="text-danger">{{ $errors->first('course_code') }}</span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="course_name">Course Name <span class="required">*</span>
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input id="course_name" type="text" class="form-control col-md-12 col-sm-12 col-xs-12" name="course_name" value="{{$course->course_name}}" required="required" type="text">
                    <span class="text-danger">{{ $errors->first('course_name') }}</span>
                  </div>
                </div>

                {{-- course type --}}
                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="course_name">Course Type <span class="required">*</span>
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <select name="type" class="form-control">
                      <option {{$course->type=='compulsory' ? 'selected' : ''}} value="compulsory">Compulsory</option>
                      <option {{$course->type=='optional' ? 'selected' : ''}} value="optional">Optional</option>
                      <option {{$course->type=='general' ? 'selected' : ''}} value="general">General</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('course_name') }}</span>
                  </div>
                </div>
                <!-- {{-- ends --}} -->
                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="credit">Credit<span class="required">*</span>
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="text" id="credit" class="form-control col-md-12 col-sm-12 col-xs-12" name="unit" value="{{$course->unit}}" required="required">
                    <span class="text-danger">{{ $errors->first('unit') }}</span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="croutine_id">Department
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <select class="form-control col-md-12 col-sm-12 col-xs-12" name="dept_id" required="required">
                      @foreach($departments as $department)
                      <option value="{{$department->id}}" {{ ($course->dept_id  == $department->id) ? 'selected': '' }}>{{$department->name}}</option>
                      @endforeach
                    </select>
                    <!-- <span class="text-danger">{{ $errors->first('Program') }}</span> -->
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Program
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <select class="form-control col-md-12 col-sm-12 col-xs-12" id="crid" name="program" required="required">
                      <option value="">--Select one--</option>
                      @foreach($programs as $program)
                      <option value="{{$program->id}}" {{$course->program == $program->id ? 'selected' : ''}}>{{$program->name}}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('program') }}</span>
                  </div>
                </div>

                <div class="item form-group" id="level" style="display: {{$course->program == 2 ? 'none' : 'block'}}" >
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Level
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <select name="level" class="form-control" required>
                      <option value="">Select Level</option>
                      <option {{$course->type=='100' ? 'selected' : ''}} value="100">100 Level</option>
                      <option {{$course->type=='200' ? 'selected' : ''}} value="200">200 Level</option>
                      <option {{$course->type=='300' ? 'selected' : ''}} value="300">300 Level</option>
                      <option {{$course->type=='400' ? 'selected' : ''}} value="400">400 Level</option>
                      <option {{$course->type=='500' ? 'selected' : ''}} value="500">500 Level</option>
                      <option {{$course->type=='600' ? 'selected' : ''}} value="600">600 Level</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('Level') }}</span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">
                    Sememster
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <select name="semester" class="form-control" required>
                      <option value="">Select Semester</option>
                      @foreach($semesters as $k=>$semester)
                      <option {{$course->semester==$k ? 'selected' : ''}} value="{{$k}}">{{$semester}}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('Semester') }}</span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="remarks">
                    Remarks
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <textarea name="remarks" id="remarks" class="form-control col-md-12 col-sm-12 col-xs-12" name="remarks">{{$course->remarks}}</textarea>

                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12" for="status">Course Status
                  </label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <select class="form-control col-md-12 col-sm-12 col-xs-12" name="status">
                      <option {{$course->status==1 ? 'selected' : ''}} value="1" selected>Active</option>
                      <option {{$course->status==0 ? 'selected' : ''}} value="0">Not Active</option>
                    </select>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3 btn-group">
                    <button id="send" type="submit" class="btn btn-success"> Update</i></button>
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


@section('extrascript')
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
<!-- validator -->
<script>
  // initialize the validator function
  validator.message.date = 'not a real date';

  // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
  $('form')
    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern]', validator.keypress);


  $('form').submit(function(e) {
    e.preventDefault();
    var submit = true;

    // evaluate the form using generic validaing
    if (!validator.checkAll($(this))) {
      submit = false;
    }

    if (submit)
      this.submit();

    return false;
  });
</script>
<script>
  $(document).ready(function() {

    $("#time").inputmask();
  });
</script>
<!-- /validator -->
<script>
  $('#crid').change(function(){
        let c_id = $(this).find(":selected").val()
        if(c_id == 2){
          $('#level').slideUp()
        }else{
          $('#level').slideDown()
        } 
    })
</script>
@endsection
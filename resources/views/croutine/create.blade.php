@extends('layouts.master')

@section('title', 'Course routine')

@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <!-- row start -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Course Routine<small> Courses Routine basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('croutine.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_code">Course Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="course_code" type="text" class="form-control col-md-7 col-xs-12"  name="course_code" value="{{old('course_code')}}" placeholder="e.g CSE-101" required="required" type="text">
                            <span class="text-danger">{{ $errors->first('course_code') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="faculty">Faculty <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="faculty" required="required">
                            <option disabled selected>--Select one--</option>
                            @foreach($faculties as $faculty)
                            <option value="{{$faculty->shortend}}">{{$faculty->full_name}}({{$faculty->shortend}})</option>
                            @endforeach
                          </select>
                            <span class="text-danger">{{ $errors->first('faculty') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Time<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="time" class="form-control col-md-7 col-xs-12"  name="time" value="{{old('time')}}" placeholder="10:00-11:30" data-inputmask="'mask': '99:99-99:99'" required="required">
                            <span class="text-danger">{{ $errors->first('time') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_room">Class Room<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="class_room" class="form-control col-md-7 col-xs-12"  name="class_room" value="{{old('class_room')}}" placeholder="5" data-inputmask="'mask': '9999'"  required="required">
                            <span class="text-danger">{{ $errors->first('class_room') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="day_of_week">Day of Week<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="day_of_week" class="form-control col-md-7 col-xs-12"  name="day_of_week" value="{{old('day_of_week')}}" placeholder="SUN,MON" data-inputmask="'mask': '9999'" required="required">
                            <span class="text-danger">{{ $errors->first('day_of_week') }}</span>
                        </div>
                      </div>
                      


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Save</i></button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
        </div>
        <!-- /page content -->
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
@endsection

@extends('layouts.master')

@section('title', 'Marks| Edit')

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
                    <h2>Marks Edit<small> Marks Edit basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('mark.update',$mark->id)}}">
                            {{csrf_field()}}
                      {{method_field('patch')}}
                     
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Registration_Number">Registration Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Registration_Number" type="text" class="form-control col-md-7 col-xs-12"  name="Registration_Number" value="{{$mark->Registration_Number}}" readonly>
                            <span class="text-danger">{{ $errors->first('Registration_Number') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_name">Course Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="course_name" type="text" class="form-control col-md-7 col-xs-12" value="{{$course->course_name}}"  readonly>
                          <input id="course_id" type="hidden" class="form-control col-md-7 col-xs-12"  name="course_id" value="{{$mark->course_id}}" required="required">
                            <span class="text-danger">{{ $errors->first('course_id') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="grade_letter">Grade letter<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="grade_letter" class="form-control col-md-7 col-xs-12"  name="grade_letter" value="{{$mark->grade_letter}}"   required="required">
                            <span class="text-danger">{{ $errors->first('grade_letter') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="grade_point">Grade Point<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="grade_point" class="form-control col-md-7 col-xs-12"  name="grade_point" value="{{$mark->grade_point}}"   required="required">
                            <span class="text-danger">{{ $errors->first('grade_point') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="  course_credit">Course Credit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="course_credit" class="form-control col-md-7 col-xs-12"  name="course_credit" value="{{$mark->  course_credit }}"   required="required">
                            <span class="text-danger">{{ $errors->first('   course_credit ') }}</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="level" class="form-control col-md-7 col-xs-12"  name="level" value="{{$mark->level}}"   required="required">
                            <span class="text-danger">{{ $errors->first('level') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="academic_year">Academic year<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="academic_year" class="form-control col-md-7 col-xs-12"  name="academic_year" value="{{$mark->academic_year}}"   required="required">
                            <span class="text-danger">{{ $errors->first('academic_year') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="semester" class="form-control col-md-7 col-xs-12"  name="semester" value="{{$mark->semester}}"   required="required">
                            <span class="text-danger">{{ $errors->first('semester') }}</span>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_status">Course status
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="course_status" required="required">
                            <option selected value="{{$mark->course_status}}">{{$mark->course_status}}</option>
                            <option  value="P">Pass-P</option>
                            <option  value="R">Retake-R**</option>
                            <option  value="F">Fail-F</option>    
                            <option  value="I">Improvement-I*</option>     
                          </select>
                            <span class="text-danger">{{ $errors->first('croutine_id') }}</span>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Update</i></button>
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
   <!-- /validator -->
@endsection

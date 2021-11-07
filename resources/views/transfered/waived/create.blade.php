@extends('layouts.master')

@section('title', 'waived Courses')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/sweetalert.css')}}" rel="stylesheet">

@endsection

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
                    <h2>Waived Courses<small> Waived Courses with student  information.</small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_panel">
                    <form class="form-horizontal form-label-left"  method="post" action="{{route('waived.store')}}">
                            {{csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Registration_Number">Registration Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Registration_Number" type="text" class="form-control col-md-7 col-xs-12"  name="student_id"  placeholder="1101031">
                            <span class="text-danger">{{ $errors->first('student_id') }}</span>
                        </div>
                      </div>
                      <div class="item form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_name">Course Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control subject select2 col-md-7 col-xs-12" name="course_id" required="required">
                            <option selected>--Select One--</option>
                            @foreach($courses as $course)
                            <option  value="{{$course->id}}">{{$course->course_code}}- {{$course->course_name}}[{{ $course->Program }}]</option>
                            @endforeach   
                          </select>
                            <span class="text-danger">{{ $errors->first('course_id') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="grade_letter">Grade letter<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="grade_letter" class="form-control subject select2 col-md-7 col-xs-12">
                            <option selected>-- Select One--</option>
                            <option  value="A+">A+</option>
                            <option  value="A">A</option>
                            <option  value="A-">A-</option>    
                            <option  value="B+">B+</option>  
                            <option  value="B">B</option>  
                            <option  value="B-">B-</option>  
                            <option  value="C+">C+</option>  
                            <option  value="C">C</option>  
                            <option  value="D">D</option> 
                            <option  value="F">F</option> 
                            </select>
                            <span class="text-danger">{{ $errors->first('grade_letter') }}</span>
                        </div>
                      </div>
                     
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_credit">Course Credit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="course_credit" class="form-control col-md-7 col-xs-12"  name="credit"   required="required">
                            <span class="text-danger">{{ $errors->first('credit') }}</span>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Save</i></button>
                        </div>
                      </div>

                    </form>

                    <div class="clearfix"></div>
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
<script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>
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

  $(".subject").select2({
                placeholder: "Select Subject",
                allowClear: true
            });
});
</script>
   <!-- /validator -->
@endsection

@extends('layouts.master')

@section('title', 'Course version')

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
                    <h2>Course Version<small> Course Versions basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('cversion.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="version_name">Version Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="version_name" type="text" class="form-control col-md-7 col-xs-12"  name="version_name" value="{{old('version_name')}}" placeholder="v1" required="required" >
                            <span class="text-danger">{{ $errors->first('version_name') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="acyear_start">Academic Year Start <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="acyear_start" class="form-control col-md-7 col-xs-12"  name="acyear_start" value="{{old('acyear_start')}}" placeholder="Spring-2015"  required="required">
                            <span class="text-danger">{{ $errors->first('acyear_start') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="acyear_start">Academic Year End 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="acyear_end" class="form-control col-md-7 col-xs-12"  name="acyear_end" value="{{old('acyear_end')}}" placeholder="Spring-2015"  >
                            <span class="text-danger">{{ $errors->first('acyear_end') }}</span>
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

  $("#acyear_start").inputmask();
});
</script>
   <!-- /validator -->
@endsection

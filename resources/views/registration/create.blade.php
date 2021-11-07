@extends('layouts.master')

@section('title', 'Faculty')

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
                    <h2>Faculty<small> Faculties basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('faculty.store')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="faculty_id">Faculty Id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="faculty_id" type="text" class="form-control col-md-7 col-xs-12"  name="faculty_id"  value="{{old('faculty_id')}}" placeholder="1511002" required="required" type="text">
                            <span class="text-danger">{{ $errors->first('faculty_id') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="full_name">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="full_name" class="form-control col-md-7 col-xs-12"  name="full_name" value="{{old('full_name')}}" placeholder="Jahidul Arafat"  required="required">
                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="shortend">Shortend <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="shortend" class="form-control col-md-7 col-xs-12"  name="shortend" value="{{old('shortend')}}" placeholder="JA"  required="required">
                            <span class="text-danger">{{ $errors->first('shortend') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="status">
                            <option disabled selected>--Select one--</option>
                            <option value="1">Current</option>
                            <option value="2">On Study Leave</option>
                            <option value="0">Left</option>
                          </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
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

   <!-- /validator -->
@endsection

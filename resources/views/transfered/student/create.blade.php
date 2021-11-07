@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Credit Transfer','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-6 lg-8 sm-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">  <h2>Credit Transfer<small> Student Credit Transfer Information</small></h2></div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">

                           <form class="form-horizontal form-label-left"  method="post" action="{{route('transfer.store')}}">
                            {{csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label " for="Registration_Number">Registration Number <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input id="Registration_Number" type="text" class="form-control "  name="student_id"  placeholder="1101031">
                            <span class="text-danger">{{ $errors->first('student_id') }}</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label " for="university_name">University Name <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="university_name" class="form-control "  name="university_name"   required="required">
                            <span class="text-danger">{{ $errors->first('university_name') }}</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label " for="start_semester">Start Semester(BAIUST)<span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="start_semester" class="form-control "  name="start_semester" placeholder="Spring-2019">
                            <span class="text-danger">{{ $errors->first('start_semester') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label " for="end_semester">End Semester(BAIUST)<span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="end_semester" class="form-control "  name="end_semester" >
                            <span class="text-danger">{{ $errors->first('end_semester') }}</span>
                        </div>
                      </div>

                      {{-- <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Save</i></button>
                        </div>
                      </div> --}}
                      <div class="card-action">
                        <button  type="submit" class="btn btn-success">Submit</button>
                        <a href="{{url()->previous()}}" class="btn btn-danger">Return Back</a>
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

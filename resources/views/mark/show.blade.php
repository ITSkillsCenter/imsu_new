@extends('layouts.master')

@section('title', 'Mark')

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
                    <h2>Mark<small> Marks  basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>

                  
                  @if(count($student)>0)
                  <div class="x_content">
                   <div class="row">
                     <div class="col-md-3">
                      <div id="crop-avatar">
                           <!-- Current avatar -->
                           <img class="img-responsive avatar-view" src="{{asset($student->Photo)}}" alt="{{$student->photo}}" heigth="100" width="100" title="{{$student->Full_Name}}" alt="Image">
                           <!-- Loading state -->
                           <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                         </div>

                       <p><b> Photo:</b>{{$student->Full_Name}}</p> 
                     </div>
                     <div class="col-md-4">
                        <ul class="list-unstyled">
                          <li>
                                 <i class="fa fa-2x fa-user"></i> <strong>Name: </strong> {{$student->Full_Name}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-building"></i> <strong>Department: </strong> 
                                {{$student->Program}}
                               </li>
                               
                               <li>
                                 <i class="fa fa-2x fa-home"></i> <strong>Email Address: </strong>  {{$student->Email_Address}}
                               </li>
                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>Batch No: </strong>  {{$student->Batch}}
                               </li>

                               <li>
                                 <i class="fa fa-2x fa-info-circle"></i> <strong>ID No: </strong>  {{$student->Registration_Number}}
                               </li>
                           </div>
                         </div>
                         @endif
                          
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

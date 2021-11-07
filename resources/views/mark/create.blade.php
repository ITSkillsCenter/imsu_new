@extends('layouts.master')

@section('title', 'Mark')
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
                    <h2>Mark<small> Marks  basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_panel">
                    <form class="form-horizontal form-label-left"  method="post" action="{{route('mark.store')}}">
                            {{csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Registration_Number">Registration Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Registration_Number" type="text" class="form-control col-md-7 col-xs-12"  name="Registration_Number"  placeholder="1101031">
                            <span class="text-danger">{{ $errors->first('Registration_Number') }}</span>
                        </div>
                      </div>
                      <div class="item form-group"> 
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_name">Course Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control subject select2 col-md-7 col-xs-12" name="course_id" required="required">
                            <option selected>-- Select One--</option>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="grade_point">Grade Point<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="grade_point" class="form-control col-md-7 col-xs-12"  name="grade_point" value="{{$mark->grade_point}}"   required="required"placeholder="A+ = 4.00/ A= 3.75 /A- = 3.50 /B+ = 3.25 / B=3.00 / B- =2.75 / C+ = 2.50 / C=2.25 / D=2.00">
                            <span class="text-danger">{{ $errors->first('grade_point') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="  course_credit">Course Credit<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="course_credit" class="form-control col-md-7 col-xs-12"  name="course_credit" value="{{$mark->  course_credit }}"   required="required">
                            <span class="text-danger">{{ $errors->first('course_credit') }}</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="level" required="required">
                            <option selected>-- Select One--</option>
                            <option  value="l1t1">l1t1</option>
                            <option  value="l1t2">l1t2</option>
                            <option  value="l2t1">l2t1</option>    
                            <option  value="l2t2">l2t2</option>     
                            <option  value="l3t1">l3t1</option>     
                            <option  value="l3t2">l3t2</option>     
                            <option  value="l4t1">l4t1</option>     
                            <option  value="l4t2">l4t2</option>     
                            <option  value="ac">After Complete</option>     
                          </select>
                            <span class="text-danger">{{ $errors->first('level') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="academic_year">Academic year<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="academic_year" class="form-control col-md-7 col-xs-12"  name="academic_year" placeholder="2015"  required="required">
                            <span class="text-danger">{{ $errors->first('academic_year') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="semester">Semester<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="semester" class="form-control col-md-7 col-xs-12"  name="semester" placeholder="Spring-2015"   required="required">
                            <span class="text-danger">{{ $errors->first('semester') }}</span>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_status">Course status
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="course_status" required="required">
                            <option selected>-- Select One--</option>
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
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Save</i></button>
                        </div>
                      </div>

                    </form>

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
                     <div class="col-md-9">
                        <ul class="list-unstyled">
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
                             </ul>


                           </div>
                           <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                             <ul class="list-unstyled">
                               <li>
                                 <i class="fa fa-2x fa-user"></i> <strong>Name: </strong> {{$student->Full_Name}}
                               </li>
                               <li>
                                 @if($student->Gender=="Male")
                                 <i class="fa fa-2x fa-male"></i> <strong>Gender: </strong>  {{$student->Gender}}
                               @else
                                 <i class="fa fa-2x fa-female"></i> <strong>Gender: </strong>  {{$student->Gender}}

                               @endif
                               </li>
                     </div>
                   </div>
                  </div>
                  @endif
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

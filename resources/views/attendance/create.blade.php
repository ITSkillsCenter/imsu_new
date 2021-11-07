@extends('layouts.master')

@section('title', 'Attendance')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/switchery.min.css')}}" rel="stylesheet">
<style>

</style>
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
            <form id="attendanceForm" class="form-horizontal form-label-left custom-error" novalidate method="post" action="{{URL::route('attendance.store')}}">

               <div class="x_title">
                  <h2>Attendance<small> Student Attendance </small></h2>

                  <label class="pull-right">
                     <input id="isSendSMS" type="checkbox" class="SendSMS js-switch" name="isSMS" /> Send SMS
                  </label>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  @if (count($errors) > 0)
                   <div class="alert alert-danger">
                       <strong>Whoops!</strong> There were some problems with your input.<br><br>
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif
               
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="row">
                        <div class="col-md-5">
                           <div class="item form-group">
                              <label class="control-label " for="department">Department <span class="required">*</span>
                              </label>     
                        <select class="form-control   has-feedback-left" name="department_id" id="department_id">

                            <option selected >{{$dep}}</option>
                            @foreach($departments as $department)
                            <option value="{{$department->name}}">{{$department->name}}</option>
                            @endforeach
                          </select>
                              <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                              <span class="text-danger">{{ $errors->first('department_id') }}</span>

                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="item form-group">
                              <label class="control-label " for="department">Semester <span class="required">*</span>
                              </label>     
                        <select class="form-control   has-feedback-left" name="semester" id="department_id">

                            <option selected >{{$semester}}</option>
                            @foreach($semesters as $semester)
                            <option value="{{$semester->Enrollment_Semester}}">{{$semester->Enrollment_Semester}}</option>
                            @endforeach
                          </select>
                              <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                              <span class="text-danger">{{ $errors->first('department_id') }}</span>

                           </div>
                        </div>



                     </div>
                  
                     <div class="row">

                        <div class="col-md-2">
                           <div class="item form-group">
                              <label class="control-label" for="date">Date <span class="required">*</span>
                              </label>
                              <input class="form-control" id="presentDate" name="date" value="{{$today->format('d/m/Y')}}" required="required" />
                              <span class="text-danger">{{ $errors->first('date') }}</span>

                           </div>
                        </div>
                        {{-- <div class="col-md-5">
                           <div class="item form-group">
                              <label class="control-label" for="subject_id">Subject <span class="required">*</span>
                              </label>
                              <select class="form-control subject select2  has-feedback-left" name="subject_id" id="subject_id">
                            <option selected disable> --Select a Course--</option>
                            @foreach($subjects as $course)
                            <option value="{{$course->id}}">{{$course->course_code}}-{{$course->course_name}}</option>
                            @endforeach
                          </select>
                              <i class="fa fa-book form-control-feedback left" aria-hidden="true"></i>
                              <span class="text-danger">{{ $errors->first('subject_id') }}</span>

                           </div>
                        </div> --}}
                        <input type="hidden" value="{{ $course }}" name="subject_id">
                        <div class="col-md-5">

                           <button  type="submit" class="btn btn-success btn-attend"><i class="fa fa-check"> Submit</i></button>

                        </div>

                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table id="studentList" class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>

                                       <th>Id No</th>
                                       <th>Name</th>
                                       <th>Is Present? </th>

                                    </tr>
                                 </thead>
                                 <tbody>
                        @foreach($students as $student)
                           <tr>
                              <td>{{$student->student_id}}</td>
                              <td>{{$student->Full_Name}}</td>
                              <td><input  type="radio"  value="1" checked class="js-switch"  name="present[{{$student->student_id}}]">Yes<input  type="radio"  value="0" class="js-switch"  name="present[{{$student->student_id}}]">No</td>
                           </tr>
                           @endforeach

                                    </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>


                     </div>
                     </form>
                  </div>
                  <!-- row end -->



               </div>
            </div>
            <!-- /page content -->
            @endsection
            @section('extrascript')

            <script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/switchery.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/daterangepicker.js')}}"></script>
            <!-- validator -->
            <script>
            $(document).ready(function() {
               $('#btnsave').hide();
               $('#presentDate').daterangepicker({
                  singleDatePicker: true,
                  calender_style: "picker_1",
                  format:'D/M/YYYY'
               });
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
            @endsection

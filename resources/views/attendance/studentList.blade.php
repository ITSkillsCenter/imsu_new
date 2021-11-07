@extends('layouts.master')

@section('title', 'Attendance')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/switchery.min.css')}}" rel="stylesheet">
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
              <form action="{{route('attendance.view')}}" method="post">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="row">
                           <div class="col-md-3">
                                 <div class="item form-group">
                                    <label class="control-label " for="department">Semester <span class="required">*</span>
                                    </label> 
                              <select class="form-control  semester has-feedback-left" name="semester" id="department" required>
                                  <option selected > --Select Semester--</option>
                                  @foreach($semesters as $semester)
                                  <option value="{{$semester->Enrollment_Semester}}">{{$semester->Enrollment_Semester}}</option>
                                  @endforeach
                                </select>
                                    <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                    <span class="text-danger">{{ $errors->first('semester') }}</span>
      
                                 </div>
                              </div>

                        <div class="col-md-3">
                           <div class="item form-group">
                              <label class="control-label " for="department">Department <span class="required">*</span>
                              </label> 
                        <select class="form-control department  has-feedback-left" name="department_id" id="department_id" required>
                            <option selected> --Select Department--</option>
                            @foreach($departments as $department)
                            <option value="{{$department->name}}">{{$department->name}}</option>
                            @endforeach
                          </select>
                              <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                              <span class="text-danger">{{ $errors->first('department_id') }}</span>

                           </div>
                        </div>
                        <div class="col-md-3">
                              <div class="item form-group">
                                 <label class="control-label " for="department">Course <span class="required">*</span>
                                 </label> 
                           <select class="form-control  course has-feedback-left" name="course_id" id="subject_id" required>
                                 <option selected > --Select Course--</option>
                               
                             </select>
                                 <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                 <span class="text-danger">{{ $errors->first('course_id') }}</span>
   
                              </div>
                           </div>

                        <div class="col-md-2">
                           <div class="item form-group"></div>
                          <button type="submit" style="margin-top: 16px;" class="btn btn-success btn-md btn-md">Get Students</button>
                        </div>
                     </div>
                  </form>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table id="studentList" class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>

                                       <th>Id No</th>
                                       <th>Name</th>
                                       <th>Is Present? <div class="pull-right"><input type="checkbox" id="allcheck" class="js-switch allCheck" name="allcheck">All Select</div></th>

                                    </tr>
                                 </thead>
                                 <tbody>


                                    </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>


                     </div>
                    
                  </div>
                  <!-- row end -->



               </div>
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

               <!-- /validator -->
               $(".department").select2({
                  placeholder: "Pick a department",
                  allowClear: true
               });
               $(".course").select2({
                  placeholder: "Pick a course",
                  allowClear: true
               });
               $(".semester").select2({
                  placeholder: "Pick a semester",
                  allowClear: true
               });
               $(".session").select2({
                  placeholder: "Pick a session",
                  allowClear: true
               });

               //get subject lists
               $('#department_id').on('change',function (){
                  var dept= $('#department_id').val();
                 // var semester = $(this).val();
            
                  if(!dept){
                     new PNotify({
                        title: 'Validation Error!',
                        text: 'Please Pic A Department or Write session!',
                        type: 'error',
                        styling: 'bootstrap3'
                     });
                  }
                  else {
                     //for students
                     populateStudentGrid(dept);

                     //for subjects
                     $.ajax({
                        url:'/admin/subject/'+dept,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                          
                           console.log(data);
                            $('#subject_id').empty();
                           // alert(data.subjects);
                           $('#subject_id').append('<option >Select a Subject</option>');
                           $.each(data.subjects, function(key, value) {
                              //alert('working');
                              $('#subject_id').append('<option  value="'+value.id+'">'+value.course_name+'['+value.course_code+']</option>');

                           });
                           $(".subject").select2({
                              placeholder: "Pick a Subject",
                              allowClear: true
                           });
                           
                         

                        },
                        error: function(data){
                           var respone = JSON.parse(data.responseText);
                           $.each(respone.message, function( key, value ) {
                              new PNotify({
                                 title: 'Error!',
                                 text: value,
                                 type: 'error',
                                 styling: 'bootstrap3'
                              });
                           });
                        }
                     });
                  }
               });
               //fucntions
               function populateStudentGrid(dept,semester)
               {
                  $.ajax({
                     url:'/admin/students/'+dept+'/'+semester,
                     type: 'get',
                     dataType: 'json',
                     success: function(data) {
                        //console.log(data);
                        $("#studentList").find("tr:gt(0)").remove();
                        if(data.students.length>0)
                        {
                           $('#btnsave').show();
                        }
                        else {
                           $('#btnsave').hide();
                        }
                        $.each(data.students.data, function(key, value) {
                           addRow(value.id,value.name,value.idNo);
                        });
                        var elems = Array.prototype.slice.call(document.querySelectorAll('.tb-switch'));
                        elems.forEach(function(html) {
                           var switchery = new Switchery(html);
                        });


                     },
                     error: function(data){
                        var respone = JSON.parse(data.responseText);
                        $.each(respone.message, function( key, value ) {
                           new PNotify({
                              title: 'Error!',
                              text: value,
                              type: 'error',
                              styling: 'bootstrap3'
                           });
                        });
                     }
                  });
               }
               //add row to table
               function addRow(id,stdname,idNo) {
                  var table = document.getElementById('studentList');
                  var rowCount = table.rows.length;
                  var row = table.insertRow(rowCount);


                  var cell2 = row.insertCell(0);
                  var regiNo = document.createElement("label");

                  regiNo.innerHTML=idNo;
                  cell2.appendChild(regiNo);
                  var hdregi = document.createElement("input");
                  hdregi.name="ids[]";
                  hdregi.value=id;
                  hdregi.type="hidden";
                  cell2.appendChild(hdregi);

                  var cell4 = row.insertCell(1);
                  var name = document.createElement("label");
                  name.innerHTML=stdname;
                  cell4.appendChild(name);

                  var cell5 = row.insertCell(2);
                  var chkbox = document.createElement("input");
                  chkbox.type = "checkbox";
                  chkbox.checked=false;
                  chkbox.className="js-switch tb-switch";
                  chkbox.name="present["+id+"]";
                  chkbox.size="3";
                  cell5.appendChild(chkbox);
               };
               //make all checkbox checked
               $('.allCheck').on('change',function() {
                  $('.tb-switch').trigger('click');
               });
               //experimental code



            });

            </script>
            @endsection

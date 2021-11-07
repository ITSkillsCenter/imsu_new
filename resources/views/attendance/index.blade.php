@extends('layouts.master')

@section('title', 'Attendance')
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
                        <h2>Attendance<small> Attendance List.</small></h2>
                        
                        <a href="{{route('attendance.index')}}" class="btn btn-primary btn-md" style="float:right;">Refresh</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_title">
                        
                        <div>
                        <ul>
                            <li>First step select department.<span class="required">***</span></li>
                            <li>Second step select semester.<span class="required">**</span></li>
                            <li>Third step select subject.<span class="required">*</span></li>
                            <li>To sorting display results click the heading.</li>
                        </ul>
                        </div>
                    </div>
                    
                    <div class="x_content">
                        <div class="row">
                            @if(Session::has('students'))
                            <h2 class="text-center">Today Attendance List</h2>
                            <p>Course Name: {{ Session::get('course_name')}}</p>
                            <p>Teacher Name: {{ Session::get('faculty')}}</p>
                            @else
                            <form id="attendanceForm" class="form-horizontal form-label-left custom-error" novalidate method="post" action="{{URL::route('attendance.index2')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="item form-group">
                                            <label class="control-label " for="department">Department <span class="required">*</span>
                                            </label>
                                            <select class="form-control   has-feedback-left" name="department_id" id="department_id">
                                                <option selected disable> --Select Department--</option>
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
                                            <select class="form-control   has-feedback-left" name="semester" id="semester">
                                                <option selected disable> --Select Semester--</option>
                                                @foreach($semesters as $semester)
                                                <option value="{{ $semester->Enrollment_Semester }}">{{ $semester->Enrollment_Semester }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                            <span class="text-danger">{{ $errors->first('semester') }}</span>

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
                                <div class="col-md-5">
                                    <div class="item form-group">
                                        <label class="control-label" for="subject_id">Subject <span class="required">*</span>
                                        </label>


                                        <select class="form-control subject_id  has-feedback-left" name="subject_id" id="subject_id">
                                            <option selected disable> --Select  a Subject--</option>
                                           
                                        </select>


                                        <i class="fa fa-book form-control-feedback left" aria-hidden="true"></i>
                                        <span class="text-danger">{{ $errors->first('subject_id') }}</span>

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-lg btn-primary btn-attend"><i class="fa fa-check"></i> Go </button>
                                </div>
                            </form>

                            @endif
                        </div>
                        <br>
                        
                        
                        <div class="row">
                                @if(Session::has('students'))
                                <?php $students = session()->get( 'students' );?>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable-buttons" class="table table-striped table-bordered">
                                   <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>ID no</th>
                                        <th>Present</th>
                                         @permission('attendance-edit')
                                        <th>Actions</th>
                                        @endpermission
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>

                        <td>{{$student->Full_Name}}</td>
                        <td>{{$student->Registration_Number}}</td>
                        <td class="tdPresent">
                         @if($student->present) Yes @else No @endif

                         </td>
                          @permission('attendance-edit')
                            <td>
                            <a title='Edit' href="#" class='btn btn-success btn-xs btnUpdate' data-present="{{$student->present}}" data-id='{{$student->id}}'> <i class="fa fa-power-off icon-white"></i></a>
                            </td>
                            @endpermission
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                        @if(!Session::has('students'))
                        @if(count($students)>0)
                                
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable-buttons" class="table table-striped table-bordered">
                                   <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>ID no</th>
                                        <th>Present</th>
                                         @permission('attendance-edit')
                                        <th>Actions</th>
                                        @endpermission
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>

                        <td>{{$student->Full_Name}}</td>
                        <td>{{$student->Registration_Number}}</td>
                        <td class="tdPresent">
                         @if($student->present) Yes @else No @endif

                         </td>
                         @permission('attendance-edit')
                            <td>
            <a title='Edit' href="#" class='btn btn-success btn-xs btnUpdate' data-present="{{$student->present}}" data-id='{{$student->id}}'> <i class="fa fa-power-off icon-white"></i></a>

            </td>
            @endpermission
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                        @endif
                    </div>
                
                    
                </div>

            </div>
        </div>

    </div>
    <!-- row end -->
    <div class="clearfix"></div>

</div>
</div>
<!-- /page content -->

    <!-- Modal For Present -->
    <div id ="presentModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Present Information<label class="control-label status confirm" id="invoiceStatus"></label></h4>
                </div>
                <div class="modal-body">

                    <form id="presentUpdateForm" class="" novalidate  method="patch" action="{{url('/admin/attendance/',$id)}}" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="blue"><strong>Present:<strong></label><br>
                                    <select id="presentDrop" name="present" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                            </div>


                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="id" id="hiddenId" >
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary pull-left" id="btnUpdate" type="button"><i class="fa fa-refresh"></i> Update</button>
                        </form>
                        <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal For Attendance Update -->


    @endsection
    @section('extrascript')
    <!-- dataTables -->
    <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/buttons.flash.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/buttons.html5.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/buttons.print.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script>
    <script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/daterangepicker.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#presentDate').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1",
                format:'D/M/YYYY'
            });

            $(".department").select2({
                placeholder: "Select Department",
                allowClear: true
            });

            $(".semester").select2({
                placeholder: "Select Semester",
                allowClear: true
            });
            $(".subject_id").select2({
                placeholder: "Select Subject",
                allowClear: true
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

            //datatables code
            var handleDataTableButtons = function() {
                if ($("#datatable-buttons").length) {
                    $("#datatable-buttons").DataTable({
                        "pageLength": 50,
                        responsive: true,
                        dom: "Bfrtip",
                        buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                        ],
                        responsive: true
                    });
                }
            };

            TableManageButtons = function() {
                "use strict";
                return {
                    init: function() {
                        handleDataTableButtons();
                    }
                };
            }();

            TableManageButtons.init();

            @if($selectDep!="" && count($students)==0)
            new PNotify({
                title: "Data Fetch",
                text: 'There are no student!',
                styling: 'bootstrap3'
            });
            @endif

            //get subjects on semeter change
            //get subject lists
            $('#semester').on('change',function (){
                var dept= $('#department_id').val();
               // var semester = $(this).val();
               // alert(dept+' '+semester);
               if(!dept){
                new PNotify({
                    title: 'Validation Error!',
                    text: 'Please Pic A Department!',
                    type: 'error',
                    styling: 'bootstrap3'
                });
            }
            else {
                    //for subjects
                    $.ajax({
                        url:'/admin/subject/'+dept,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                           // alert(data);
                            console.log(data);
                            $('#subject_id').empty();
                            $('#subject_id').append('<option  value="">Pic a Subject</option>');
                            $.each(data.subjects, function(key, value) {
                                $('#subject_id').append('<option  value="'+value.id+'">'+value.course_name+'['+value.course_code+']</option>');

                            });
                            $(".subject").select2({
                                placeholder: "Pick a Subject",
                                allowClear: true
                            });

                        },
                        error: function(data){
                            console.log(data);
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
            //update button click
            var tdPresent=null;
            $('.btnUpdate').on('click',function (){
                tdPresent=$(this).closest('tr').children('td.tdPresent');
                var id = $(this).attr('data-id');
                var present = $(this).attr('data-present');
                //alert(id);
                $('#presentDrop').val(present);
                $('#hiddenId').val(id);
                $('#presentModal').modal('show');
            });
            //updat form submit
            $('#btnUpdate').on('click',function(e) {

                var data= $('#presentUpdateForm').serialize();
               
               var id = $('#hiddenId').val();
               // console.log(postURL);
               
               // alert(postURL);
                $.ajax({

                    url: '/admin/attendance/'+id,
                    type: 'patch',
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        //alert(data);
                        console.log(data);
                        $('#presentUpdateForm').trigger("reset");
                        new PNotify({
                            title: 'Data Update.',
                            text: data.message,
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                        tdPresent.text(data.present);
                        $('#presentModal').modal('hide');

                    },
                    error: function(data){
                        console.log(data);
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
            });
        });

    </script>

    @endsection

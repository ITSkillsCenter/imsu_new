@extends('layouts.master')

@section('title', 'Attendance|report')
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
                        <h2>Attendance<small> Attendance Report.</small></h2>
                        
                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                        <div class="row">

                            <form id="attendanceForm" class="form-horizontal form-label-left custom-error" novalidate method="post" action="{{URL::route('attendance.report')}}">
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
                                            <select class="form-control   has-feedback-left" name="semester" id="department_id">
                                                <option selected disable> --Select Semester--</option>
                                                @foreach($semesters as $semester)
                                                <option value="{{ $semester->Enrollment_Semester }}">{{ $semester->Enrollment_Semester }}</option>
                                                @endforeach
                                            </select>
                                            <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                            <span class="text-danger">{{ $errors->first('semester') }}</span>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                  
                                    </div>

                             </div>
                             <div class="row">

                                <div class="col-md-2">
                                    <div class="item form-group">
                                        <label class="control-label" for="date">From Date <span class="required">*</span>
                                        </label>
                                        <input class="form-control" id="presentDate" name="date_from" value="{{$today->format('d/m/Y')}}" required="required" />
                                        <span class="text-danger">{{ $errors->first('date') }}</span>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="item form-group">
                                        <label class="control-label" for="date_to">To Date <span class="required">*</span>
                                        </label>
                                        <input class="form-control" id="toDate" name="date_to" value="{{$today->format('d/m/Y')}}" required="required" />
                                        <span class="text-danger">{{ $errors->first('date_to') }}</span>

                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="item form-group">
                                        <label class="control-label" for="subject_id">Subject <span class="required">*</span>
                                        </label>


                                        <select class="form-control subject  has-feedback-left" name="subject_id" id="subject_id">
                                            <option selected disable> --Select  a Subject--</option>
                                           
                                        </select>


                                        <i class="fa fa-book form-control-feedback left" aria-hidden="true"></i>
                                        <span class="text-danger">{{ $errors->first('subject_id') }}</span>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-lg btn-primary btn-attend"><i class="fa fa-check"></i> Get Report </button>
                                </div>
                            </form>
                        </div>
                        <br>
                       


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

            $('#toDate').daterangepicker({
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
            $(".subject").select2({
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
            $('#department_id').on('change',function (){
                var dept= $('#department_id').val();
               // var semester = $(this).val();
                //alert(dept);
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

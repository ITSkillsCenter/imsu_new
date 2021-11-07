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
                        <h2>Attendance<small> Attendance Report .</small></h2>
                        
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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="item form-group">
                                            <h3 class="control-label " for="department">Department <span >:{{$department_id}}</span>
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="item form-group">
                                         <h3 class="control-label" for="levelTerm">Semester <span>: {{$semester}}</span>
                                         </h3>
                                     </div>
                                 </div>

                             </div>
                             <div class="row">

                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <h3 class="control-label" for="subject_id">Subject <span>:
                                        @php
                                           $subject = DB::table('courses')->select('course_code','course_name')
                                                ->where('id',$subject_id)
                                                ->first();
                                        @endphp
                                            {{$subject->course_code}} [{{$subject->course_name}}]
                                        </span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="control-label" for="subject_id">Date <span>: From [{{date("d-M-Y",strtotime($dateJunk_from))}}] to [{{date("d-M-Y",strtotime($dateJunk_to))}}]</span>
                                        </h3>
                                    
                                </div>
                            </form>
                        </div>
                        <br>
                        @if(count($students)>0)
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                               <table id="datatable-buttons" class="table table-striped table-bordered">
                                   <thead>
                                    <tr>
                                        
                                        <th>ID no</th>
                                        <th>Name</th>
                                        <th>Percentage</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>

                        
                        <td>{{$sid = $student->students_id}}</td>

                    @php
                      $names =  DB::table('student_infos')->select('Full_Name')->where('Registration_Number',$student->students_id)->get()
                    @endphp
                    @foreach($names as $name)
                        <td>{{$name = $name->Full_Name}}</td>
                    @endforeach   
                        <td class="tdPresent">
                         @php
                             $present = DB::table('attendances')
                             ->select('present')
                      ->where('semester',$semester)
                      ->where('subject_id',$subject_id)
                      ->where('present',1)
                      ->where('students_id',$student->students_id)
                      ->whereBetween('date', [$dateJunk_from, $dateJunk_to])
                      ->get();
                    $percent =(count($present)/$day)*100; 
                         @endphp
                         @if($percent>=80)
                         <span class="label label-success"> {{number_format((float)$percent,'2','.','')}}%  </span> || Num of Class:-{{$day}} || Present-{{count($present)}} || Absent-{{$day-count($present)}}
                        @else
                        <span class="label label-danger"> {{number_format((float)$percent,'2','.','')}}%</span>  || Num of Class:-{{$day}} || Present-{{count($present)}} || Absent-{{$day-count($present)}}
                        @endif
                         </td>
                            <td>
                <form action="{{route('attendance.student')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$sid}}" name="students_id">
                    <input type="hidden" value="{{$name}}" name="name">
                    <input type="hidden" value="{{$semester}}" name="semester">
                    <input type="hidden" value="{{$subject_id}}" name="subject_id">
                    <input type="hidden" value="{{$dateJunk_from}}" name="dateJunk_from">
                    <input type="hidden" value="{{$dateJunk_to}}" name="dateJunk_to">
                    <button type="submit" class="btn btn-primary">Report</button>
                </form>

            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
    <!-- row end -->
    <div class="clearfix"></div>

</div>
</div>
<!-- /page content -->

    

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
            $('#levelTerm').on('change',function (){
                var dept= $('#department_id').val();
                var semester = $(this).val();
                //alert(dept+' '+semester);
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
                        url:'/admin/subject/'+dept+'/'+semester,
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

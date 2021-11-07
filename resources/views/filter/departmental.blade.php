
@extends('layouts.master')

@section('title', 'Students')

@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <h2>Students  information of {{ $dept }}</h2>
            <div class="x_title"></div>
            <div class="x_content">
              <div class="row">
                <div class="col-md-12">
                  <h4>Total Student Admitted: <b>{{ count($students_total) }}</b></h4>
                  <br>
                  <h4>Total Current: <b>{{ count($students_current) }}</b></h4>
                  <br>
                  <h4>
                    Total Paused: <b>{{ count($students_paused) }} - </b> &nbsp;
                    <a class="btn btn-info btn-md" href="#" data-toggle="modal" data-target="#paused">View Paused Students</a>
                  </h4>
                  <h4>
                    Total Passing: <b>{{ count($students_passing) }} </b>
                  </h4>
                  <h4>
                    Total Graduated: <b>{{ count($students_graduated) }} - </b> &nbsp;
                    <a class="btn btn-info btn-md" href="#" data-toggle="modal" data-target="#graduated">View Graduated Students</a>
                  </h4>
                  <h4>
                    Total Migrated: <b>{{ count($students_migrated) }} - </b> &nbsp;
                    <a class="btn btn-info btn-md" href="#" data-toggle="modal" data-target="#migrated">View Migrated Students</a>
                  </h4>
                  <h4>
                    Total Students (Left): <b>{{ count($students_left) }} - </b> &nbsp;
                    <a class="btn btn-info btn-md" href="#" data-toggle="modal" data-target="#std_left">View Left Students</a>
                  </h4>
                  <br>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <table  class="table table-striped table-bordered datatable-buttons">
                    <thead>
                      <tr>
                        <th>Photo</th>
                        <th>Full Name</th>
                        <th>Registration Number</th>
                        <th>Guardian Number</th>
                        <th>Student Mobile</th>
                        <th>Level Term</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($students_current)>0)
                        @foreach($students_current as $student)
                          <tr>
                            <td>
                              <img src="{{asset('/').$student->Photo}}" alt="photo" class="" width="80px" height="70px">
                            </td>
                            <td>{{$student->Full_Name}} </td>
                            <td>{{$student->Registration_Number}}</td>
                            <td>{{(int)$student->Guardian_Mobile_Number }}</td>
                            <td>{{(int)$student->Student_Mobile_Number}}</td>
                            <td>{{$student->Current_semester}}</td>
                            <td>{{$student->Current_status}}</td>
                            <td>{{$student->Remarks}}</td>
                            <td>
                              @php
                                $id = Crypt::encrypt($student->Registration_Number);
                              @endphp
                                  @permission('student-read')
                                  <a title='View' class='btn btn-success btn-sm btnUpdate' href='{{URL::route('studentinfo.show',$id)}}'> <i class="fas fa-eye"></i></a>
                                  @endpermission

                                  @permission('student-edit')
                                  <a title='Update' class='btn btn-info btn-sm btnUpdate' id='{{$student->Registration_Number}}' href='{{URL::route('studentinfo.edit',$id)}}'> <i class="fas fa-edit"></i></a>
                                  @endpermission

                                  @permission('student-delete')
                                  <form class="deleteForm" method="POST" action="{{URL::route('studentinfo.destroy',$student->Registration_Number)}}">
                                      <input name="_method" type="hidden" value="DELETE">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="submit" class='btn btn-danger btn-sm btnDelete' href=''> <i class="fa fa-trash icon-white"></i></a>
                                  </form>
                                  @endpermission
                              </td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <div id="paused" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Paused Students List</h4>
        </div>
        <div class="modal-body">
          <table  class="table table-striped table-bordered datatable-buttons">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Registration Number</th>
                <th>Guardian Number</th>
                <th>Student Mobile</th>
                <th>Level Term</th>
                <th>Remarks</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if(count($students_paused)>0)
                @foreach($students_paused as $student)
                  <tr>
                    <td>{{$student->Full_Name}} </td>
                    <td>{{$student->Registration_Number}}</td>
                    <td>{{(int)$student->Guardian_Mobile_Number }}</td>
                    <td>{{(int)$student->Student_Mobile_Number}}</td>
                    <td>{{$student->Current_semester}}</td>
                    <td>{{$student->Remarks}}</td>
                    <td>
                      @php
                        $id = Crypt::encrypt($student->Registration_Number);
                      @endphp
                      <a title='View' class='btn btn-success btn-xs btnUpdate' href='{{URL::route('studentinfo.show',$id)}}'> <i class="fa fa-zoom-out icon-white"></i></a>
                      <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$student->Registration_Number}}' href='{{URL::route('studentinfo.edit',$id)}}'> <i class="fa fa-check icon-white"></i></a>
                      <form class="deleteForm" method="POST" action="{{URL::route('studentinfo.destroy',$student->Registration_Number)}}">
                        <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class='btn btn-danger btn-xs btnDelete' href=''> <i class="fa fa-trash icon-white"></i></a>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="modal-footer" style="margin-top: 5%">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
  <div id="graduated" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Graduated Student List</h4>
        </div>
        <div class="modal-body">
          <table  class="table table-striped table-bordered datatable-buttons">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Registration Number</th>
                <th>Guardian Number</th>
                <th>Student Mobile</th>
                <th>Level Term</th>
                <th>Remarks</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if(count($students_graduated)>0)
                @foreach($students_graduated as $student)
                  <tr>
                    <td>{{$student->Full_Name}} </td>
                    <td>{{$student->Registration_Number}}</td>
                    <td>{{(int)$student->Guardian_Mobile_Number }}</td>
                    <td>{{(int)$student->Student_Mobile_Number}}</td>
                    <td>{{$student->Current_semester}}</td>
                    <td>{{$student->Remarks}}</td>
                    <td>
                      @php
                        $id = Crypt::encrypt($student->Registration_Number);
                      @endphp
                      <a title='View' class='btn btn-success btn-xs btnUpdate' href='{{URL::route('studentinfo.show',$id)}}'> <i class="fa fa-zoom-out icon-white"></i></a>
                      <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$student->Registration_Number}}' href='{{URL::route('studentinfo.edit',$id)}}'> <i class="fa fa-check icon-white"></i></a>
                      <form class="deleteForm" method="POST" action="{{URL::route('studentinfo.destroy',$student->Registration_Number)}}">
                        <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class='btn btn-danger btn-xs btnDelete' href=''> <i class="fa fa-trash icon-white"></i></a>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="modal-footer" style="margin-top: 5%">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>
  <div id="migrated" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Migrated Student List</h4>
        </div>
        <div class="modal-body">
          <table  class="table table-striped table-bordered datatable-buttons">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Registration Number</th>
                <th>Guardian Number</th>
                <th>Student Mobile</th>
                <th>Level Term</th>
                <th>Remarks</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if(count($students_migrated)>0)
                @foreach($students_migrated as $student)
                  <tr>
                    <td>{{$student->Full_Name}} </td>
                    <td>{{$student->Registration_Number}}</td>
                    <td>{{(int)$student->Guardian_Mobile_Number }}</td>
                    <td>{{(int)$student->Student_Mobile_Number}}</td>
                    <td>{{$student->Current_semester}}</td>
                    <td>{{$student->Remarks}}</td>
                    <td>
                      @php
                        $id = Crypt::encrypt($student->Registration_Number);
                      @endphp
                      <a title='View' class='btn btn-success btn-xs btnUpdate' href='{{URL::route('studentinfo.show',$id)}}'> <i class="fa fa-zoom-out icon-white"></i></a>
                      <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$student->Registration_Number}}' href='{{URL::route('studentinfo.edit',$id)}}'> <i class="fa fa-check icon-white"></i></a>
                      <form class="deleteForm" method="POST" action="{{URL::route('studentinfo.destroy',$student->Registration_Number)}}">
                        <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class='btn btn-danger btn-xs btnDelete' href=''> <i class="fa fa-trash icon-white"></i></a>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="modal-footer" style="margin-top: 5%">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div id="std_left" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Students left</h4>
        </div>
        <div class="modal-body">
          <table  class="table table-striped table-bordered datatable-buttons">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Registration Number</th>
                <th>Guardian Number</th>
                <th>Student Mobile</th>
                <th>Level Term</th>
                <th>Remarks</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @if(count($students_left)>0)
                @foreach($students_left as $student)
                  <tr>
                    <td>{{$student->Full_Name}} </td>
                    <td>{{$student->Registration_Number}}</td>
                    <td>{{(int)$student->Guardian_Mobile_Number }}</td>
                    <td>{{(int)$student->Student_Mobile_Number}}</td>
                    <td>{{$student->Current_semester}}</td>
                    <td>{{$student->Remarks}}</td>
                    <td>
                      @php
                        $id = Crypt::encrypt($student->Registration_Number);
                      @endphp
                      <a title='View' class='btn btn-success btn-xs btnUpdate' href='{{URL::route('studentinfo.show',$id)}}'> <i class="fa fa-zoom-out icon-white"></i></a>
                      <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$student->Registration_Number}}' href='{{URL::route('studentinfo.edit',$id)}}'> <i class="fa fa-check icon-white"></i></a>
                      <form class="deleteForm" method="POST" action="{{URL::route('studentinfo.destroy',$student->Registration_Number)}}">
                        <input name="_method" type="hidden" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class='btn btn-danger btn-xs btnDelete' href=''> <i class="fa fa-trash icon-white"></i></a>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="modal-footer" style="margin-top: 5%">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
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

   <script>

     $(document).ready(function() {
       $(".select2_single").select2({
           placeholder: "Select Department",
            allowClear: true
       });
     //datatables code
     var handleDataTableButtons = function() {
       if ($(".datatable-buttons").length) {
         $(".datatable-buttons").DataTable({
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
          text: 'There are no student in this department!',
          styling: 'bootstrap3'
    });
    @endif
   });
   </script>
   <!-- /validator -->
@endsection

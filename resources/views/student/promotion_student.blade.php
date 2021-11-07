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
            <!-- row start -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Students<small> Promotional Students information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel panel-success">
                              <div class="panel-heading">
                                <h3 class="panel-title">Filter Department and Level Wise</h3>
                              </div>
                              <div class="panel-body">
                                 <form class="" method="POST" action="{{route('promotion.list') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="input-group">
                                      <select name="dept" class="form-control">
                                        <option selected disabled>--Select One--</option>
                                        <option value="CSE">CSE</option>
                                        <option value="EEE">EEE</option>
                                        <option value="CE">CE</option>
                                        <option value="BBA">BBA</option>
                                        <option value="English">ENG</option>
                                        <option value="LLB">LLB</option>
                                        option
                                      </select>
                                      <span id="dept" class="text-danger" >{{ $errors->first('dept') }}</span>
                                      </div>
                                      </div>
                                      <div class="col-md-3">
                                         <div class="input-group">
                                            <select name="level" class="form-control">
                                              <option selected disabled>--Select One--</option>
                                              <option value="l1t1">Level-1 Term-1</option>
                                              <option value="l1t2">Level-1 Term-2</option>
                                              <option value="l2t1">Level-2 Term-1</option>
                                              <option value="l2t2">Level-2 Term-2</option>
                                              <option value="l3t1">Level-3 Term-1</option>
                                              <option value="l3t2">Level-3 Term-2</option>
                                              <option value="l4t1">Level-4 Term-1</option>
                                              <option value="l4t2">Level-4 Term-2</option>
                                            </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                         <div class="input-group">
                                            <select name="section" class="form-control">
                                    
                                              <option value="A">Section-A</option>
                                              <option value="B">Section-B</option>
                                              
                                            </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                        <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-check"></i> Get List </button>
                                      </div>
                                    </div>


                                 </form>
                              </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <br>
                   
              <div class="clearfix"></div>

              

          </div>
        </div>
        <!-- /page content -->
        @if(count($students)>0)
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Promotion<small> Promotional Students List</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <form action="{{ route('promotion.update') }}" method="POST" accept-charset="utf-8">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <table  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Full Name</th>
                          <th>Registration Number</th>
                          <th>Level Term</th>
                          <th>Section</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($students)>0)
                      @foreach($students as $student)
                        <tr>
                          <td>{{$student->Full_Name}} </td>
                        <td>
                          {{$student->Registration_Number}}
                        <input type="hidden" name="Registration_Number[{{$student->Registration_Number}}]" value="{{$student->Registration_Number}}" />
                        </td>
                          
                          <td>
                            
                            <select name="level[{{$student->Registration_Number}}]" class="form-control" >
                                    <option @if($student->Current_semester =='l1t1') selected @endif value="l1t1">Level-1 Term-1</option>
                                    <option @if($student->Current_semester == 'l1t2') selected @endif value="l1t2">Level-1 Term-2</option>
                                    <option @if($student->Current_semester == 'l2t1') selected @endif value="l2t1">Level-2 Term-1</option>
                                    <option @if($student->Current_semester == 'l2t2') selected @endif value="l2t2">Level-2 Term-2</option>
                                    <option @if($student->Current_semester == 'l3t1') selected @endif value="l3t1">Level-3 Term-1</option>
                                    <option @if($student->Current_semester == 'l3t2') selected @endif value="l3t2">Level-3 Term-2</option>
                                    <option @if($student->Current_semester == 'l4t1') selected @endif value="l4t1">Level-4 Term-1</option>
                                    <option @if($student->Current_semester == 'l4t2') selected @endif value="l4t2">Level-4 Term-2</option>
                                    <option @if($student->Current_semester == 'complete') selected @endif value="complete">Level Complete</option>
                                    </select>
                          </td>
                          <td>
                            <select name="section[{{$student->Registration_Number}}]" class="form-control">  
                             <option @if($student->Section =='A') selected @endif value="A">Section-A</option>
                            <option @if($student->Section =='B') selected @endif value="B">Section-B</option>
                            </select></td>
                        </tr>
                        @endforeach
                      @endif
                      </tbody>
              </table>
              <button type="submit" class="btn btn-lg btn-info">Update Student List</button>
              </form>
                </div>
                
              </div>
        </div>
        @endif
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
          text: 'There are no student in this department!',
          styling: 'bootstrap3'
    });
    @endif
   });
   </script>
   <!-- /validator -->
@endsection

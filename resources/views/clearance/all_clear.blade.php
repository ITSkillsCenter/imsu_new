@extends('layouts.master')

@section('title', 'All Clearance Report')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
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
                 <div class="row">
                        <h3 class="text-primary text-center"> :Important Info: </h3>
                        <h4 class="text-center text-info">Student Information Module is handled by Admission Office, so if you find any ID missing in this list please contact Admission Office to check if that student is updated as an outging student! After that admission office must ICT WING that they have updated that particular student's information.</h4>
                    </div>

                    <div class="clearfix"></div>
                    @if(count($errors) > 0)
                  <div>
                      <ul>
                          @foreach($errors->all() as $error)
                              <p class="text-danger">{{ $error }}</p>
                          @endforeach
                      </ul>
                  </div>
              @endif
                  </div>

                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Student Id</th>
                          <th>Full Name</th>
                          <th>Dept Clearance</th>    
                          <th>Hall Clearance</th>    
                          <th>Treasurer Clearance</th> 
                          <th>Transport Clearance</th>
                          <th>Library Clearance</th>
                          <th>Updated At</th> 
                              
                        </tr>
                      </thead>
                      <tbody>
                        
                      @foreach($students as $reg)
                        <tr>
                          <td>{{$reg->student_id}}</td>
                          <td><a title="Click to View Details"    href='{{URL::route('report.clearance',[$reg->student_id])}}'>{{$reg->Full_Name}} </a></td>   
                      <td>
                         <p>
                          <?php
                          if($reg->department ==1){
                            echo '<b class="label label-success"> Approved  </b>';
                          }elseif($reg->department == 0){
                            echo '<b class="label label-danger"> Pending </b>';
                          }
                          ?>
                        </p>
                      </td>
                      <td>
                        <p>
                         <?php
                         if($reg->hostel ==1){
                           echo '<b class="label label-success"> Approved  </b>';
                         }elseif($reg->hostel == 0){
                           echo '<b class="label label-danger"> Pending </b>';
                         }
                         ?>
                       </p>
                     </td>
                     <td>
                      <p>
                       <?php
                       if($reg->treasurer ==1){
                         echo '<b class="label label-success"> Approved  </b>';
                       }elseif($reg->treasurer == 0){
                         echo '<b class="label label-danger"> Pending </b>';
                       }
                       ?>
                     </p>
                   </td>
             
                   <td>
                    <p>
                     <?php
                     if($reg->transport ==1){
                       echo '<b class="label label-success"> Approved  </b>';
                     }elseif($reg->transport == 0){
                       echo '<b class="label label-danger"> Pending </b>';
                     }
                     ?>
                   </p>
                 </td>
                 <td>
                    <p>
                     <?php
                     if($reg->library ==1){
                       echo '<b class="label label-success"> Approved  </b>';
                     }elseif($reg->library == 0){
                       echo '<b class="label label-danger"> Pending </b>';
                     }
                     ?>
                   </p>
                 </td>
              <td>{{ $reg->updated_at}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
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

   <script>

     $(document).ready(function() {

     //datatables code
     var handleDataTableButtons = function() {
       if ($("#datatable-buttons").length) {
         $("#datatable-buttons").DataTable({
          "pageLength": 100,
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

   });
   </script>
   <!-- /validator -->
@endsection

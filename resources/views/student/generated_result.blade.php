@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Import Student','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            @include('homepage.flash_message')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Students Matric Number</h4>
                </div>

                <div class="card-header">
                    <a href="{{url('admin/matric-number')}}" class="btn btn-info btn-md">Go Back</a>
                </div>
               
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-students" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Matric Number</th>
                                    <th>Department</th>
                                    <th>Year of Admission</th>
                                    <th>State of Origin</th>
                                    <th>LGA</th>
                                </tr>
                            </thead>
                            <tbody id="student_container">
                                @if(count($matSt)>0)
                                @php
                                    $count =1
                                @endphp
                                @foreach($matSt as $student)
                                <tr>
                                    <td>
                                        {{$count}}
                                    </td>
                                    <td>{{$student->first_name}} {{$student->last_name}} </td>
                                    <td>{{$student->matric_number}}</td>
                                    <td>{{$student->department->name}}</td>
                                    <td>{{$student->Batch}}</td>
                                    <td>{{$student->state_of_origin}}</td>
                                    <td>{{$student->lga}}</td>
                                    
                                </tr>
                                @php
                                    $count++
                                @endphp
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
            </div>
        </div>
         
        </div>
    </div>
</div>


@endsection

@section('extrascript')
<!-- dataTables -->
{{-- <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script> --}}
{{-- <script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script> --}}
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
       if ($("#datatable-students").length) {
         $("#datatable-students").DataTable({
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
@extends('layouts.master',['title'=>'Faculty'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Faculty','Title'=>'Faculty'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">     <h2>Faculty<small> Faculties basic information.</small></h2></div>
                </div>
                <div class="card-header">
                  @permission('faculty-create')
                  <a class="btn btn-success" href="{{route('faculty.create')}}">+ Add New</a>
                  @endpermission
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>S/N</th>
                                <th>Full Name</th>
                                <th>Shortend</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                            @foreach($faculties as $k=>$faculty)
                              <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$faculty->name}}</td>
                                <td>{{$faculty->short_name}}</td>
                               
                                <td>
                                    @permission('faculty-edit')
                                    <a href="{{ route('faculty.edit',$faculty->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> edit</a>
                                    @endpermission
                                    @permission('faculty-delete')
                                    <a href="{{ route('faculty.destroy',$faculty->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> delete</a>
                                    @endpermission
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
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

   });
   </script>
   <!-- /validator -->
@endsection
@extends('layouts.master',['title'=>'User Role'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'User Role','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">  
                       <h2>User Role</h2></div>
                </div>

                <div class="card-header">
                  <div class="d-flex align-items-center">
                    {{-- <h4 class="card-title">Create User</h4> --}}
                        {{-- <button type="button" class="btn btn-primary ml-auto btn-sm" data-toggle="modal" data-target=".create-semester-modal">+ Add New</button> --}}
                        {{-- <a class="" href="{{ route('transfer.create') }}">+Add Student</a> --}}
                        @role('super-admin')
                        <a class="btn btn-primary ml-auto btn-sm" href="{{route('role.create')}}"> <i class="fa fa-plus"></i> Create Role</a>
                        @endrole
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered" id="datatable-permissinon">
                    <thead>
                      <tr>
                          <th>Name</th>
                          <th>Display Name</th>
                          <th>Description</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                </thead>
                    <tbody>
                      @forelse($permissions as $permission)
                          <tr>
                              <td>{{$permission->name}}</td>
                              <td>{{$permission->display_name}}</td>
                              <td>{{$permission->description}}</td>
                              <td>
                                  <a class="btn btn-info btn-sm" href="{{route('permission.edit',$permission->id)}}">Edit</a> 
                              </td>
                              <td>
                                <form action="{{route('permission.destroy',$permission->id)}}"  method="POST">
                                     {{csrf_field()}}
                                     {{method_field('DELETE')}}
                                     <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                   </form>
                              </td>
                          </tr>
                          @empty
                          <tr>
                              <td>No roles</td>
                          </tr>
                          @endforelse
                    </tbody>
                  </table>
                   
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
       if ($("#datatable-permissinon").length) {
         $("#datatable-permissinon").DataTable({
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

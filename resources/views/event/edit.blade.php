@extends('layouts.master',['title'=>'Event Types'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Edit Event','Title'=>'Event'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Event</div>
                </div>
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                           
                          <form action="{{ route('event-types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
                            @method("PATCH")    
                            @csrf
                                <div class="form-row">
                                  <div class="col-md-6">
                                    <label for="">Title:</label>
                                    <input type="text" class="form-control" name="title" value="{{ $type->title }}">
                                  </div>
                                  <div class="col-md-6">
                                    <label for="">Status:</label>
                                    <select name="status" class="form-control">
                                      <option value="active">active</option>
                                      <option value="inactive">inactive</option>
                                    </select>
                                  </div>
                                  <div class="col-md-12" style="margin-top: 10px">
                                    <div class="btn-group">
                                      <button type="submit" class="btn btn-success btn-md pull-right">Update</button>
                                      &nbsp;
                                      <a href="{{url()->previous()}}" class="btn btn-info">Return Back</a>
                                   </div>
                                   
                                  </div>
                                </div>
                              </form>
                            
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

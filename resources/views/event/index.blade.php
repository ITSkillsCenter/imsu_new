@extends('layouts.master',['title'=>'Event Types'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Event Types','Title'=>'Event'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Event Type</div>
                </div>
                <div class="card-header">
                  <div class="btn-group">
                    @permission('eventsTypes-create')
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg">+ Add Event Type</button>
                    @endpermission
                    &nbsp;
                     <a href="{{url()->previous()}}" class="btn btn-info">Return Back</a>
                  </div>
  
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                           
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Database ID</th>
                                <th>Title</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($types as $type)
                                  <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->title }}</td>
                                    <td>
                                      @permission('eventsTypes-edit')
                                        <a href="{{ route('event-types.edit', $type->id) }}" class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> edit</a>
                                      @endpermission
      
                                      @permission('eventsTypes-delete')
                                        <a href="{{ route('event-types.destroy', $type->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fas fa-trash"></i> delete</a>
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

 {{-- modal --}}

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Create Event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        <form action="{{ route('event-types.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-row">
              <div class="col-md-6">
                <label for="">Title:</label>
                <input type="text" class="form-control" name="title">
              </div>
              <div class="col-md-6">
                <label for="">Status:</label>
                <select name="status" class="form-control">
                  <option value="active">active</option>
                  <option value="inactive">inactive</option>
                </select>
              </div>
              <div class="col-md-12" style="margin-top: 10px">
                <button type="submit" class="btn btn-success btn-md pull-right">submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
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

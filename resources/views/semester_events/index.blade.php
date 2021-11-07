@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Import Student','Title'=>'Student'])
      
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Form Elements</div>
                </div>

                <div class="card-header">
                  <div class="d-flex align-items-center">
                    @permission('events-create')
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">+ Add New</button>
                        &nbsp;
                        <a href="{{url()->previous()}}" class="btn btn-info" >Return Back</a>
                      </div>
                  @endpermission
                  </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                         
                          @if (Session::has('msg'))
                          <div class="alert alert-success">
                              {!! \Session::get('msg') !!}
                          </div>
                      @endif

                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Title</th>
                                <th>Starts</th>
                                <th>Ends</th>
                                <th>Remarks</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($events as $item)
                                  <tr>
                                    <td>{{ $item->type->title }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->starts)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->ends)->format('d M Y') }}</td>
                                    <td>{{ $item->remarks }}</td>
                                    <td>
                                      @permission('events-create')
                                        <a href="{{ route('semester-event.edit', $item->id) }}" class="btn btn-warning"> <i class="fas fa-edit"></i> edit</a>
                                      @endpermission
      
                                      @permission('events-create')
                                        <a href="{{ route('semester-event.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fas fa-trash"></i> delete</a>
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

{{-- MODAL >>>>>>>>>>>>>>>>>>>>>>>> --}}
       
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="clearfix"></div>
          <!-- row start -->
        

<div class="card">
  <div class="card-header">
      <div class="card-title">Form Elements</div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Add Semester Details</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form method="POST" action="{{ route('semester-event.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label>Semester Title: </label>
                    <input class="form-control" name="session_id" value="{{ $session_id }}" readonly>
                </div>

                <div class="form-group">
                  <label>Event: </label>
                  <select name="type_id" class="form-control" required>
                    @foreach ($types as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label>Starts From: </label>
                    <input type="date" class="form-control" name="starts" required/>
                </div>

                <div class="form-group">
                  <label>Ends at: </label>
                  <input type="date" class="form-control" name="ends" required/>
                </div>

                <div class="form-group">
                    <label>Remarks: </label>
                    <textarea name="remarks" class="form-control"></textarea>
                </div>
                
                <div class="card-action">
                <div class="btn-group">
                  <button  type="submit" class="btn btn-success">Submit</button>
                  &nbsp;
                  <button data-dismiss="modal" class="btn btn-info">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      <!-- row end -->
      <div class="clearfix"></div>

  </div>
</div>
  </div>
 
</div>
      </div>
  </div>
</div>
{{-- MODAL >>>>>>>>>>>>>>>>>>>>>>>> --}}
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

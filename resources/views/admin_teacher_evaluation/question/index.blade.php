@extends('layouts.master')

@section('title', 'Faculty')
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
                    <h2>Questions > Category: {{ $category->category_name }}</h2>

                    <div class="clearfix"></div>
                  </div>
                  @permission('FEquestion-create')
                  <div class="x_title text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">+ Add New</button>

                    <div class="clearfix"></div>
                  </div>
                  @endpermission
                  <div class="x_content">
                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {!! \Session::get('msg') !!}
                        </div>
                    @endif
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>Question Category</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($questions as $question)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $question->question_title }}</td>
                              <td>{{ $category->category_name }}</td>
                              <td>
                                  @permission('FEquestion-edit')
                                  <a href="{{ route('teacher-evaluation-qs.edit', $question->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> edit</a>
                                  @endpermission
                                  @permission('FEquestion-delete')
                                  <a href="{{ route('teacher-evaluation-qs.destroy', $question->id) }}" onclick="return confirm('Are you sure you want to Remove?');" class="btn btn-danger"><i class="fas fa-trash"></i> delete</a>
                                  @endpermission
                              </td>
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
        </div>
        </div>
            
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="clearfix"></div>
                    <!-- row start -->
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Questions > Category: {{ $category->category_name }}</h2>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <form method="POST" action="{{route('teacher-evaluation-qs.store')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label>Question Title: </label>
                                    <input class="form-control" name="question_title" placeholder="question" />
                                    <input type="text" name="question_category" value="{{ $category->id }}" hidden>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-md pull-right">submit</button>
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

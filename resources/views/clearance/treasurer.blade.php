@extends('layouts.master')

@section('title', 'Treasurer Clearance Report')
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
                    <h2>Select Student Type</h2>
                    <div class="clearfix"></div>
                    @if(Request::routeIs('cr_treasurer.clearance'))
                        <a href="{{ route('cr_treasurer.type','outgoing') }}" class="btn btn-primary btn-sm">outgoing-students</a>
                        <a href="{{ route('cr_treasurer.type','current') }}" class="btn btn-primary btn-sm">current-students</a>
                    @endif
                  </div>
                    @if(Request::routeIs('cr_treasurer.type'))
                        <div class="x_title">
                            <div class="row">
                            <div class="col-md-4"><h1 class="text-info"> Total: {{ $registrations->count() }}</h1> </div>
                            <div class="col-md-4"><h1 class="text-success"> Approved:{{ $approved }}</h1> </div>
                            <div class="col-md-4"><h1 class="text-danger"> Pending: {{ $registrations->count()-$approved }}</h1> </div>
                        </div>
                            <div class="row">
                            <h3 class="text-primary text-center"> :Important Info: </h3>
                            <h4 class="text-center text-info">Student Information Module is handled by Admission Office, so if you find any ID missing in this list please contact Admission Office to check if that student is updated as an outging student! After that admission office must ICT WING that they have updated that particular student's information.</h4>
                        </div>
                        </div>

                        <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Student Id</th>
                          <th>Full Name</th>
                          <th>Treasurer Clearance</th>
                          <th>Remarks</th>
                          @permission('treasurerclear-edit')
                          <th>Action</th>
                           @endpermission
                        </tr>
                      </thead>
                      <tbody>
                        
                      @foreach($registrations as $reg)
                        <tr>
                          <td>{{ $reg->student_id}}</td>
                          <td>{{$reg->Full_Name}}</td>   
                          @if($reg->account_clearance == 1)
                            <td class="text-success">Approved by {{ $reg->account_approved }}</td>
                          @else
                            <td class="text-danger">Pending</td>
                          @endif
                      <td>{{$reg->tb_remarks}}</td>
                       @permission('treasurerclear-edit')
                      <td>
                      <a  data-reg_id="{{ $reg->id}}" data-student_id="{{ $reg->student_id}}" data-tb_remarks="{{$reg->tb_remarks}}" href="#"  class="btn btn-info" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i>
                           Edit 
                      </a>
                     </td>
                      @endpermission
                    
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                    @endif
                </div>
              <!-- row end -->
              <div class="clearfix"></div>
                
               <!-- Modal -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Treasurer Clearance</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="myform" action="{{route('treasurer.clearance')}}" method="post">

                    {{ csrf_field() }}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input id="student_id" class="form-control" type="text" name="student_id" readonly>
                    <input id="reg_id" class="form-control" type="hidden" name="reg_id" >
                  </div>
                    <div class="form-group">
                        
                          <label class="input-group-text" for="treasurer">Status</label>
                        
                        <select class="form-control" name="treasurer" id="treasurer">
                          <option selected value="1">Approved</option>
                          <option value="0">Pending</option>
                        </select>
                      </div>
                     
                      <div class="form-group">
                        
                          <label class="input-group-text" for="inputGroupSelect01">Remarks</label>
                        
                        <textarea name="tb_remarks" class="form-control" id="tb_remarks" cols="30" rows="10"></textarea>
                      </div>
                </div>
              </div>
            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button form="myform" type="submit" class="btn btn-primary">Save changes</button>
            </div>
          
          </div>
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

   <script>

     $(document).ready(function() {

     //datatables code
     var handleDataTableButtons = function() {
       if ($("#datatable-buttons").length) {
         $("#datatable-buttons").DataTable({
          "pageLength": 30,
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

// value submission



   });
   </script>
   <!-- /validator -->
   <script type="text/javascript">
   

   $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var reg_id = button.data('reg_id') 
      var student_id = button.data('student_id') 
      var tb_remarks = button.data('tb_remarks') 
      
      var modal = $(this)
      modal.find('.modal-body #reg_id').val(reg_id);
      modal.find('.modal-body #student_id').val(student_id);
      modal.find('.modal-body #tb_remarks').val(tb_remarks);
      
})

</script>
@endsection

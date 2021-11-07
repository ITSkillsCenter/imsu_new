@extends('layouts.master')

@section('title', 'Dues List')
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
                    <h2>Students<small> All Students information.</small></h2>
                    @php $departments=DB::table('student_infos')->select('Program')->distinct()->get();  @endphp
                    <div class="clearfix"></div>
                    <div class="row">
                      <div class="col-md-3">
                        @foreach ($departments as $dept)
                            <a href="{{ route('clear.registration_clearance',['type'=>$dept->Program]) }}" class="btn btn-info">{{ $dept->Program }}</a>
                        @endforeach
                        </div>
                  </div>
                  </div>
                  <div class="x_title">
                    <div class="row">
                    <div class="col-md-4"><h1 class="text-info"> Total: {{count($students)}}</h1> </div>
                       
                    </div>
                  </div>

                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Student Id</th>
                          <th>Full Name</th>
                          <th>Guardian Number</th>
                          <th>Payment Status</th>

                        </tr>
                      </thead>
                      <tbody>
                        
                      @foreach($students as $reg)
                        <tr>
                          <td>{{ $reg->Registration_Number}}</td>
                          <td>{{$reg->Full_Name}}</td>
                          <td>{{$reg->Guardian_Mobile_Number}}</td> 
                          @permission('treasurerclear-edit')
                      <td>
                         <a  href="{{ route('clear.registration_paid',$reg->Registration_Number) }}"  onclick="return confirm('Are you sure you want to Aproved this Student?')">
                          <?php
                         
                            echo '<b class="label label-danger"> DUE </b>';
                         
                          ?>
                        </a>
                      </td>
                    @endpermission

                    
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                 
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
      var student_id = button.data('student_id') 
      var tb_remarks = button.data('tb_remarks') 
      
      var modal = $(this)
      modal.find('.modal-body #student_id').val(student_id);
      modal.find('.modal-body #tb_remarks').val(tb_remarks);
      
})

</script>
@endsection

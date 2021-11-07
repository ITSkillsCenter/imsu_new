@extends('layouts.master')

@section('title', 'Archive')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/sweetalert.css')}}" rel="stylesheet">
<style>
@media print {
      table td:last-child {display:none}
      table th:last-child {display:none}
  }

</style>

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
                    <h2>Academic Archive<small> All Archive information.</small></h2>
                    <div class="clearfix"></div>
                    @if(count($departments)>0)
                    @foreach ($departments as $d)
                  <a href="{{ route('archive.show',$d->Program) }}" class="btn btn-info">{{$d->Program}}</a>
                    @endforeach
                    @endif

                    <a href="{{URL::Route('archive.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> New Archive </a>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <h3>All Transcripts and Provisional Certificates</h3>
                      <br>
                      <center><h4>Total-{{ count($archives) }}</h4></center>

    <table id="datatable-buttons" class="table table-bordered">
        <thead>
        <tr>
            <th>Student ID</th>
            <th>Transcript</th>
            <th>PVC</th>
            <th>Status</th>
            <th>Action</th>
            
        </tr>
        </thead>
        <tbody>
        @forelse($archives as $user)
            <tr>
                <td>{{$user->student_id}}</td>
                <td><a href='{{asset($user->transcript)}}' download> Download Transcript</a></td>
                <td><a href='{{asset($user->pvc)}}' download> Download PVC</a></td>
                <td>{{$user->status==1? 'Withdraw': 'Not withdraw'}}</td>
                <td><a title='Update' class='btn btn-info btn-xs btnUpdate'  href='{{URL::route('archive.edit',$user->id)}}'> <i class="fa fa-check icon-white"></i></a></td>  
            </tr>
        @empty
            <td>no data</td>
        @endforelse
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
<script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
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
<script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $(".select3").select2();
    
});
</script>

   <script>

     $(document).ready(function() {

     //datatables code
     var handleDataTableButtons = function() {
       if ($("#datatable-buttons").length) {
         $("#datatable-buttons").DataTable({
           responsive: true,
           iDisplayLength:100,
           dom: "Bfrtip",
           buttons: [
             {
               extend: "copy",
               className: "btn-sm",
               exportOptions: {
               columns: [0,1,2,3,4]
                }
             },
             {
               extend: "csv",
               className: "btn-sm",
               exportOptions: {
               columns: [0,1,2,3,4,5,6]
                }
             },
             {
               extend: "excel",
               className: "btn-sm",
               exportOptions: {
               columns: [0,1,2,3,4,5,6]
                }
             },
             {
               extend: "pdfHtml5",
               className: "btn-sm",
               exportOptions: {
               columns: [0,1,2,3,4,5,6]
                }
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
//delete warning
$('.deleteForm').submit(function(e) {
  e.preventDefault();
  form=this;
  swal({
      title: "User Deletion!",
      text: 'Are you sure to delete this user?',
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#cc3f44",
      confirmButtonText: "Yes",
      closeOnConfirm: true,
      html: false
  }, function( isConfirm ) {
      if(isConfirm)
         form.submit();
  });
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

@endsection

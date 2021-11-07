@extends('layouts.master')

@section('title', 'FeeList')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
@endsection
@section('content')

<!-- page content -->
<div class="row" role="main">
  <div class="col-md-12">

    <div class="clearfix"></div>
    <!-- row start -->
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12">
          <div class="col-md-12">
            <h2>FeeList<small> Feelists basic information.</small></h2>

            <div class="clearfix"></div>

          </div>
          <div class="col-md-12">

            <div class="text-right">
              <a class="btn btn-success " href="{{route('feelist.create')}}">+ Add New</a>
            </div>


            <div class="clearfix"></div>
          </div>

          @if(count($feelists)>0)
          <div class="col-md-12">
            <table id="datatable-buttons" class="col-md-12 table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Fee Name</th>
                  <th>Fee Amount</th>
                  <th>Deparment</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

                @foreach($feelists as $fl)
                <tr>
                  <td>{{$fl->fee_name}}</td>
                  <td>{{$fl->amount}}</td>
                  <td>{{$fl->department}}</td>
                  <td>{{$fl->semester}}</td>

                  <td>
                    <?php
                    if ($fl->status == 1) {
                      echo '<b class="label label-success"> Active</b>';
                    } else {
                      echo '<b class="label label-danger"> Not Active</b>';
                    }
                    ?>
                  </td>


                  <td>
                    <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$fl->id}}' href='{{URL::route('feelist.edit',$fl->id)}}'> <i class="fa fa-edit icon-white"></i></a>
                    <form class="deleteForm" method="POST" action="{{URL::route('feelist.destroy',$fl->id)}}">
                      {{csrf_field()}}
                      {{ method_field('DELETE') }}
                      <button type="submit" class='btn btn-danger btn-xs btnDelete' onclick="return confirm('Are you sure want to delete this?');"> <i class="fa fa-trash icon-white"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
        </div>
        <!-- row end -->
        <div class="clearfix"></div>

      </div>
    </div>
    <div class="text-right">
      <a class="btn btn-success " href="{{route('feelist.create')}}">+ Add New</a>
    </div>

    <div class="clearfix"></div>
  </div>

  
</div>
<!-- row end -->
<div class="clearfix"></div>

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
          buttons: [{
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
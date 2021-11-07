@extends('layouts.master',['title'=>'Receivable | List'])


@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'Revenue | List','Title'=>'Revenue'])

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">{{$title}}</div>
        </div>
        
        <div class="card-body">

       
          @if($type=='school_fees')
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                  <h4 class="text-primary">Total: {{ count($school_fees) }}</h4>
                  <div class="clearfix"></div>
                  <!--<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-top: 15px">+ Add Courses</button>-->
                </div>
                @include('homepage.flash_message')
                <div class="row">
                  <table id="datatable-buttons" class="table-responsive table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Level</th>
                        <th>Session</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Receipt</th>
                      </tr>
                    </thead>
                    @php
                    $total=0;
                    @endphp
                    <tbody>
                      @foreach ($school_fees as $item)
                      <tr>
                        <td>{{ $item->matric_number }}</td>
                        <td>{{ $item->first_name }} {{$item->last_name}}</td>
                        <td>{{ Helper::get_department($item->dept_id)->name}}</td>
                        <td>{{ $item->level }}</td>
                        <td>{{ Helper::get_session($item->session_id) }}</td>
                        <td>₦{{ number_format($item->amount) }}</td>
                        <!-- <td>{{ ucwords($item->paid)}} {{ $item->res == null? '' : '/'.$item->res}}</td> -->
                        <td>{{ date('d/m/Y', strtotime($item->updated_at)) }}</td>
                        <td>
                          @if($item->receipt !== null)
                          <img src="/uploads/images/receipts/{{$item->receipt}}" alt="" style="width:100px;">
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="{{$item->rid}}" data-img="/uploads/images/receipts/{{$item->receipt}}" data-name="{{ $item->first_name }} {{$item->last_name}}" data-status="{{$item->paid}}">
                            View
                          </button>
                          @endif
                        </td>
                        @php
                        $total+=$item->amount;
                        @endphp
                      </tr>
                      @endforeach
                      <tr>
                        <td>Total: </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>&#x20A6;{{number_format($total,2,".",",")}}</td>
                        <td></td>
                      </tr>

                    </tbody>

                  </table>
                </div>
              </div>
              <!-- row end -->
            </div>
          </div>

          @else

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- <div class="x_panel"> -->
              <!-- <div class="x_title"> -->

              <h4 class="text-primary"><br><br> Total Students that has Paid Acceptance Fees : {{ count($acceptance) }}</h4>
              <div class="clearfix"></div>
              <!--<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-top: 15px">+ Add Courses</button>-->
              <!-- </div> -->
              <div class="row">

                <table id="datatable-buttons" class="table table-striped table-bordered">
                  <thead>
                    <tr>

                      <th>Full Name</th>
                      <th>Registration Number</th>
                      <th>Amount</th>
                      <th>Paid Via</th>
                      <th>Date Paid</th>
                      <th>Receipt</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @php
                  $tot=0;
                  @endphp
                  <tbody>
                    @foreach ($acceptance as $student)
                    <tr>

                      <td>{{$student->first_name}} {{$student->last_name}} </td>
                      <td>{{$student->registration_number}}</td>
                      <td>{{$student->paid_via == null ? 'N'.number_format($student->amount) : 'N'.number_format($student->amount)}}</td>
                      <td>{{$student->paid_via == null ? 'Web Portal': $student->paid_via }}</td>
                      <td>{{$student->paid_via == null ? $student->created_at : $student->date}}</td>
                      <td><img src="/uploads/images/receipts/{{$student->receipt}}" alt="" style="width:100px;"></td>
                      <td>

                        @if($student->paid_via !== null)
                        <a target="_blank" class="btn btn-primary btn-md" href="/uploads/images/receipts/{{$student->receipt}}">View Receipt</a>
                        @endif
                      </td>
                      @php
                      $tot += $student->amount;
                      @endphp
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="6">Total: </td>
                      <td>&#x20A6;{{number_format($tot,2,".",",")}}</td>
                    </tr>

                  </tbody>

                </table>
              </div>
              <!-- </div> -->
              <!-- row end -->
            </div>
          </div>
          @endif

      
          <!-- /page content -->
        </div>
        <div class="card-action">
          <a href="{{ url()->previous() }}" class="btn btn-info">Return Back</a>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="/admin/approve_school_fees" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View receipt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" alt="" id="the_receipt" class="img-fluid">
        <input type="hidden" class="form-control" name="invoice_id" id="invoice_id" value="">
        <textarea name="disapprove" id="ddiiss" class="form-control" placeholder="Reason for disapproval" cols="30" rows="10" style="display: none;"></textarea>
        @csrf
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="status_sh">Approve</button>
        <button type="button" class="btn btn-danger" id="status_dis">Disapprove</button>
        <button type="submit" class="btn btn-info" id="submit" style="display: none;">Submit</button>
      </div>
    </form>
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
<script src="{{ URL::asset('assets/js/sweetalert.min.js')}}"></script>

<script>
  $('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('id')
    var the_image = button.data('img')
    var name = button.data('name')
    var status = button.data('status')
    var modal = $(this)
    $('#invoice_id').val(recipient)
    $('#the_receipt').attr("src", the_image);
    $('#exampleModalLabel').html('View ' + name + "'s receipt")
    if (status == 'paid') {
      $('#status_sh').slideUp()
      $('#status_dis').slideUp()
      $('#submit').slideUp();
    }else{
      $('#status_sh').slideDown()
      $('#status_dis').slideDown()
    }
  })

  $('#status_dis').click(function(){
    $('#ddiiss').slideDown();
    $('#submit').slideDown();
    $('#status_sh').slideUp()
    $('#status_dis').slideUp()
  })

  $(document).ready(function() {
    $('.toggle-sidebar').click();
    $("#datatable-buttons").DataTable({
      "pageLength": 20,
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
      responsive: true,
      "columns": [
        {"width": "5%"},
        null,
        null,
        {"width": "1%"},
        null,
        null,
        null,
        null,
        null,
        null,
        null,
      ]
    });
    //datatables code
    // var handleDataTableButtons = function() {
    //   if ($("#datatable-buttons").length) {

    //   }
    // };

    // TableManageButtons = function() {
    //   "use strict";
    //   return {
    //     init: function() {
    //       handleDataTableButtons();
    //     }
    //   };
    // }();

    // TableManageButtons.init();

  });
</script>
<!-- /validator -->
<script>
  $(document).ready(function() {
    $('.select2').select2({
      dropdownParent: $(".bd-example-modal-lg"),
      placeholder: "Select Courses",
      allowClear: true
    });
  });
</script>
@endsection
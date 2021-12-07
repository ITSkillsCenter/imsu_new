@extends('layouts.master',['title'=>'Receivable | List'])


@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'Revenue | List','Title'=>'Revenue'])

  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Filter By:</h4>
        </div>
        <div class="card-body">
          <form action="/admin/view_payment_details" method="POST">
            @csrf
            <div class="row">


              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('Revenue Heads') }}</label>
                  <select class="form-control" name="revenue_heads">
                    <option value="all">{{ __('All') }}</option>
                    @if(count($fee_list) > 0)
                    @foreach($fee_list as $f)
                    <option value="{{$f->id}}">{{$f->fee_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('Session') }}</label>
                  <select class="form-control" name="session">
                    <option value="all">{{ __('All') }}</option>
                    @if(count($sessions) > 0)
                    @foreach($sessions as $f)
                    <option value="{{$f->id}}">{{$f->title}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>


              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('Department') }}</label>
                  <select class="form-control" name="department">
                    <option value="all">{{ __('All') }}</option>
                    @if(count($departments) > 0)
                    @foreach($departments as $f)
                    <option value="{{$f->id}}">{{$f->name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>


              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('Matric No') }}</label>
                  <input type="text" class="form-control" name="matno" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('Start Date') }}</label>
                  <input type="date" class="form-control" name="start_date" />
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('End Date') }}</label>
                  <input type="date" class="form-control" name="end_date" />
                </div>
              </div>



              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('Student Name') }}</label>
                  <input type="text" class="form-control" name="student_name" />
                </div>
              </div>

              <div div class="col-md-3">
                <div class="form-group">
                  <label style="width: 100%;">{{ __('.') }}</label>
                  <br>
                  <button name="filter" type="submit" class="btn btn-md btn-primary"><i class="fa fa-check"></i> Search </button>
                </div>

              </div>



              <div class="col-md-12">

              </div>


            </div>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="card-title">Revenue | List</div>
        </div>

        <div class="card-body">

          @if(Request::routeIs('verify.receivable'))
          <div class="col-lg-12">
            <a href="/admin/receivable-all" class="btn btn-primary">Back</a>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                  <h4 class="text-primary">Total {{ count($school_fees) }}</h4>
                  <div class="clearfix"></div>
                  <!--<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-top: 15px">+ Add Courses</button>-->
                </div>
                @include('homepage.flash_message')
                <div class="row table-responsive">
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Mat Number</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Level</th>
                        <th>Session</th>
                        <th>Fee Name</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Date</th>
                        <th>Receipt</th>
                        <!-- <th>Manage</th> -->
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
                        <td>{{ $item->fee_name }}</td>
                        <td>₦{{ number_format($item->amount) }}</td>
                        <td>{{ ucwords($item->paid) }}</td>
                        <td>{{ date('d/m/Y', strtotime($item->updated_at)) }}</td>
                        <td>
                          @if($item->receipt !== null)
                          <!-- <img src="/uploads/images/receipts/{{$item->receipt}}" alt="" style="width:100px;"> -->
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
                        <td>&#x20A6;{{number_format($total,2,".",",")}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                    </tbody>

                  </table>
                </div>
              </div>
              <!-- row end -->
            </div>
          </div>
          @endif

          <!-- for all receivable-->

          @if(Request::routeIs('all.receivable'))
          <div class="col-lg-12">
            <a href="/admin/verify-receivable" class="btn btn-primary">Verify Payment</a>
          </div>
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
                  <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered w-auto">
                      <thead>
                        <tr>
                          <th>Mat Number</th>
                          <th>Full Name</th>
                          <th>Department</th>
                          <th>Level</th>
                          <th>Session</th>
                          <th>Fee Name</th>
                          <th>Amount</th>
                          <th>Discount (%)</th>
                          <th>Status/Reason</th>
                          <th>Date</th>
                          <th>Receipt</th>
                          <!-- <th>Manage</th> -->
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
                          <td>{{ $item->fee_name }}</td>
                          <td>₦{{ number_format($item->amount) }}</td>
                          <td>{{ $item->discount }}</td>
                          <td>{{ ucwords($item->paid)}} {{ $item->res == null? '' : '/'.$item->res}}</td>
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
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>

                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
              <!-- row end -->
            </div>
          </div>


          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- <div class="x_panel"> -->
              <!-- <div class="x_title"> -->

              <h4 class="text-primary"><br><br> Total Students that has Paid Acceptance Fees : {{ count($acceptance_fees) }}</h4>
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
                      <!-- <th>Due</th> -->
                      <!-- <th>Manage</th> -->
                    </tr>
                  </thead>
                  @php
                  $tot=0;
                  @endphp
                  <tbody>
                    @foreach ($acceptance_fees as $student)
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
                      <!-- <td>{{ $item->due_date }}</td> -->
                      @php
                      $tot += $student->amount;
                      @endphp
                      <!-- <td>
                    @permission('receivableInvoice-read')
                    <a href="{{ route('receivable.show',$item->id) }}" class="btn btn-info"> <i class="fas fa-print"></i> Invoice</a>
                    @endpermission
                    @permission('receivableReceipt-edit')
                    <a href="{{ route('ledger.create',['receivable_id'=>$item->id,'student_id'=>$item->student_id ]) }}" class="btn btn-danger">
                      <i class="fas fa-money"></i> Receipt</a>
                    @endpermission
                  </td> -->
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
          <a href="{{url('admin/home')}}" class="btn btn-info">Return Back</a>
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
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" id="printer" class="btn btn-warning btn-sm" data-print="" onclick="PrintImage(); return false;">PRINT</a>
          <button type="submit" class="btn btn-primary btn-sm" id="status_sh">Approve</button>
          <button type="button" class="btn btn-danger btn-sm" id="status_dis">Disapprove</button>
          <button type="submit" class="btn btn-info btn-sm" id="submit" style="display: none;">Submit</button>
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
  function ImagetoPrint(source) {
    return "<html><head><scri" + "pt>function step1(){\n" +
      "setTimeout('step2()', 10);}\n" +
      "function step2(){window.print();window.close()}\n" +
      "</scri" + "pt></head><body onload='step1()'>\n" +
      "<img src='" + source + "' /></body></html>";
  }

  function PrintImage() {
    var Pagelink = "about:blank";
    var pwa = window.open(Pagelink, "_new");
    pwa.document.open();
    pwa.document.write(ImagetoPrint($('#printer').attr("data-print")));
    // pwa.document.write(ImagetoPrint('https://en.wikipedia.org/wiki/Image#/media/File:Image_created_with_a_mobile_phone.png'));
    pwa.document.close();
  }

  $('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('id')
    var the_image = button.data('img')

    var name = button.data('name')
    var status = button.data('status')
    var modal = $(this)
    $('#invoice_id').val(recipient)
    $('#the_receipt').attr("src", the_image);
    $('#printer').attr("data-print", the_image);
    $('#exampleModalLabel').html('View ' + name + "'s receipt")
    if (status == 'paid') {
      $('#status_sh').slideUp()
      $('#status_dis').slideUp()
      $('#submit').slideUp();
    } else {
      $('#status_sh').slideDown()
      $('#status_dis').slideDown()
    }
  })

  $('#status_dis').click(function() {
    $('#ddiiss').slideDown();
    $('#submit').slideDown();
    $('#status_sh').slideUp()
    $('#status_dis').slideUp()
  })

  $(document).ready(function() {
    $('.toggle-sidebar').click();
    $("#datatable-buttons").DataTable({
      "scrollX": true,
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
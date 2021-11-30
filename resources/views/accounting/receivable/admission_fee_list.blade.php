@extends('layouts.master',['title'=>'Admission Fee | List'])


@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'Admission Fee | List'])

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Filter By:</h4>
        </div>
        <div class="card-body">
          <form action="/admin/view_admission_payment_details" method="POST">
            @csrf
            <div class="row">


              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('State') }}</label>
                  <select class="form-control" id="state" name="state">
                    <option value="all">{{ __('All') }}</option>
                    @if(count($states) > 0)
                    @foreach($states as $state)
                    <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('LGA') }}</label>
                  <select class="form-control" id="lga" name="lga">
                    <option value="all">{{ __('All') }}</option>
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
                    <option value="{{$f->name}}">{{$f->name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>


              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('Jamb Registration Number') }}</label>
                  <input type="text" class="form-control" name="application_number" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>{{ __('Student Name') }}</label>
                  <input type="text" class="form-control" name="name" />
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
          <div class="card-title">Admission Fee | List</div>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                @if(msg !== null)
                  <h4 class="text-primary">Total Applicant that has Paid Admission Fee : {{ count($applicants) }}</h4>
                @else
                <h4 class="text-primary">Search result : {{ count($applicants) }}</h4>
                @endif
                  <div class="clearfix"></div>
                  <!--<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-top: 15px">+ Add Courses</button>-->
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    @if(msg !== null)
                      <h4>{{$msg}}</h4>
                    @endif
                  </div>
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Registration Number</th>
                        <th>Amount</th>
                        <th>Paid Via</th>
                        <th>Date Paid</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    @php
                    $sn=1;
                    $tot = 0;
                    @endphp
                    <tbody>
                      @foreach ($applicants as $student)
                      <tr>
                        <td>{{$sn++}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->application_number}}</td>
                        <td>{{'N'.number_format($student->amount)}}</td>
                        <td>{{'Web Portal'}}</td>
                        <td>{{$student->created_at}}</td>
                        <td><a href="/admin/view-applicant/{{$student->application_number}}" class="btn btn-primary">See more</a></td>
                        @php
                        $tot += $student->amount;
                        @endphp
                      </tr>
                      @endforeach

                      <tr>
                        <td>Total: </td>
                        <td></td>
                        <td></td>
                        <td>&#x20A6;{{number_format($tot,2,".",",")}}</td>
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

        </div>
        <!-- <div class="card-action">
          <a href="{{url('admin/home')}}" class="btn btn-info">Return Back</a>
        </div> -->
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

        @csrf
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="status_sh">Approve</button>
      </div>
    </form>
  </div>
</div>

@endsection



@section('extrascript')
<!-- <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script> -->
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
    }
  })

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#state').change(function() {
    let state_id = $(this).find(":selected").data('id')
    $('#lga')
      .find('option')
      .remove()
      .end()
      .append('<option value="">Select LGA</option>')
      .val('');
    $.post('/get_lgas', {
      state_id
    }).done(function(response) {
      response.body.map((item) => {
        $('#lga').append(`<option value='${item.name}'>${item.name}</option>`)
      })
    });
  })

  $(document).ready(function() {
    $("#datatable-buttons").DataTable({
      paginate: true,
      responsive: true,
      dom: "Bfrtip",
      ordering: false,
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
    //datatables code

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
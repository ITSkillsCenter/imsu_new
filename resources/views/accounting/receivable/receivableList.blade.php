@extends('layouts.master',['title'=>'Receivable | List'])

@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'Revenue | List','Title'=>'Revenue'])

  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title">Revenue | List</div>
        </div>

        <div class="card-body">

          
          <div class="col-lg-12">
            <a href="{{url('admin/home')}}" class="btn btn-primary">Back</a>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                </div>
                
                <div class="row table-responsive">
                  <table id="datatable-buttons" class="col-lg-12 table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Fee Name</th>
                        <th>Amount</th>
                        <th>RRR</th>
                        <th>Reference</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data->transaction as $single)
                      <tr>
                        <td>{{$single->fname}}</td>
                        <td>{{$single->service_name}}</td>
                        <td>{{$single->amount}}</td>
                        <td>{{$single->rrr}}</td>
                        <td>{{$single->transaction_reference}}</td>
                      </tr>
                      @endforeach
                     
                    </tbody>

                  </table>
                </div>
              </div>
              <!-- row end -->
            </div>
          </div>
         

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
      // "scrollX": true,
      "pageLength": 20,
      // responsive: true,
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
      // responsive: true,
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  //  fetch('http://www.omdbapi.com/?s=Batman&page=2&apikey=c506f4df').then(data => data.json()).then(data => console.log(data))

  $(document).ready(function() {
    $('.select2').select2({
      dropdownParent: $(".bd-example-modal-lg"),
      placeholder: "Select Courses",
      allowClear: true
    });
  });
</script>
@endsection
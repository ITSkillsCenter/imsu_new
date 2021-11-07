@extends('layouts.master')

@section('title', 'Students Result')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/switchery.min.css')}}" rel="stylesheet">
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
              <form action="{{route('result.list')}}" method="post">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="row">
                           <div class="col-md-3">
                                 <div class="item form-group">
                                    <label class="control-label " for="department">Semester <span class="required">*</span>
                                    </label> 
                              <select class="form-control  semester has-feedback-left" name="semester" id="department" required>
                                  <option selected disabled> --Select Semester--</option>
                                  @foreach($semesters as $semester)
                                  <option value="{{$semester->semester}}">{{$semester->semester}}</option>
                                  @endforeach
                                </select>
                                    <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                                    <span class="text-danger">{{ $errors->first('semester') }}</span>
      
                                 </div>
                              </div>

                        <div class="col-md-3">
                           <div class="item form-group">
                              <label class="control-label " for="department">Department <span class="required">*</span>
                              </label> 
                        <select class="form-control department  has-feedback-left" name="department_id" id="department_id" required>
                            <option disabled selected> --Select Department--</option>
                            @foreach($departments as $department)
                            <option value="{{$department->department}}">{{$department->department}}</option>
                            @endforeach
                          </select>
                              <i class="fa fa-home form-control-feedback left" aria-hidden="true"></i>
                              <span class="text-danger">{{ $errors->first('department_id') }}</span>

                           </div>
                        </div>

                        <div class="col-md-2">
                           <div style="margin-top:25px;"><input type="checkbox" id="allcheck" class="js-switch" value="1" name="vclist">Vc's List</div>
                           
                        </div>
                        <div class="col-md-2">
                           <div style="margin-top:25px;"><input type="checkbox" id="allcheck" class="js-switch" value="1" name="deanlist">Dean's List</div>
                           
                        </div>
                        

                        <div class="col-md-2">
                           <div class="item form-group"></div>
                          <button type="submit" style="margin-top: 16px;" class="btn btn-success btn-md btn-md">Get Students</button>
                        </div>
                     </div>
                  </form>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table id="datatable-buttons" class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>Id No</th>
                                       <th>Name</th>
                                       <th>CGPA</th>
                                       <th>Earned Credit</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($results as $r)
                                    <tr>
                                    <td>{{$r->student_id}}</td>
                                    <td>{{$r->name}}</td>
                                    <td>{{$r->cgpa}}</td>
                                    <td>{{$r->credit}}</td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>


                     </div>
                    
                  </div>
                  <!-- row end -->



               </div>
            </div>
         </div>
            <!-- /page content -->
            @endsection
            @section('extrascript')
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
            <script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/switchery.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
            <script src="{{ URL::asset('assets/js/daterangepicker.js')}}"></script>
            <!-- validator -->
            <script>
            $(document).ready(function() {
             
               // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
               $('form')
               .on('blur', 'input[required], input.optional, select.required', validator.checkField)
               .on('change', 'select.required', validator.checkField)
               .on('keypress', 'input[required][pattern]', validator.keypress);

               $('form').submit(function(e) {
                  e.preventDefault();
                  var submit = true;

                  // evaluate the form using generic validaing
                  if (!validator.checkAll($(this))) {
                     submit = false;
                  }

                  if (submit)
                  this.submit();

                  return false;
               });

               <!-- /validator -->
               $(".department").select2({
                  placeholder: "Pick a department",
                  allowClear: true
               });
               $(".course").select2({
                  placeholder: "Pick a course",
                  allowClear: true
               });
               $(".semester").select2({
                  placeholder: "Pick a semester",
                  allowClear: true
               });
               $(".session").select2({
                  placeholder: "Pick a session",
                  allowClear: true
               });


               //make all checkbox checked
               $('.allCheck').on('change',function() {
                  $('.tb-switch').trigger('click');
               });
               //experimental code



            });

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
            @endsection

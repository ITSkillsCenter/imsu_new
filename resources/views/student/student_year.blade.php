@extends('layouts.master')


@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'View Student By Year','Title'=>'Student'])
  <div class="row">
      <div style="padding-left: 20px;">
          <a style="float: right;" href="{{ url()->previous() }}"><h3>Go Back</h3></a>
        </div>
    <div class="col-md-12">

    @if($students && count($students) > 0)
      @if($dept) 
      <h3>{{"Students found in " . $dept }}</h3>
      @endif
      <div class="card-body">
              <div class="col-md-12">
                @include('homepage.flash_message')
              </div>
              <table id="datatable-students" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Identification</th>
                    <th>Faculty</th>
                    <th>Department</th>
                    <th>Year of Admission</th>
                    <th>State of Origin</th>
                    <th>LGA</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($students)>0)
                    @foreach($students as $student)
                    @php if($dept && strtolower($dept) != strtolower($student['dept'])) continue
                    @endphp
                      <tr>
                        <td>{{$student['first_name']}} {{$student['last_name']}} </td>
                        <td>RegNo: {{$student['registration_number']}} <br> MatNo: {{$student['matric_number']}}</td>
                        <td>{{$student['faculty']}}</td>
                        <td>{{$student['dept']}}</td>
                        <td>{{$student['Batch']}}</td>
                        <td>{{$student['state_of_origin']}}</td>
                        <td>{{$student['lga']}}</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>

    @else


      <!-- <div class="card">
        <div class="card-header">
          <h3 style="float: left;" class="text-primary">Search Individual Student:</h3>
          <a style="float: right;" href="{{ url()->previous() }}"><h3>Go Back</h3></a>
        </div>
        <div class="card-body">
          <form class="" method="POST" action="{{ route('studentinfo.student_year') }}">
            @csrf
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label for="Registration_Number">Enter Desired Registration Number: <span class="text-danger">*</span></label>
              <input type="text" id="Registration_Number" class="form-control has-feedback-left" name="registration_number" placeholder="e.g.1101031" required />
              <span id="Registration_Number" class="text-danger">{{ $errors->first('Registration_Number') }}</span>

              <button type="submit" style="margin-top: 5px" class="btn btn-md btn-primary pull-right"><i class="fa fa-check"></i> Search </button>
            </div>
          </form>
        </div>
      </div> -->

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Search Students Year or Department:</h4>
        </div>
        <div class="card-body">
          <form class="" method="POST" action="{{route('studentinfo.student_year') }}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <select name="year" class="form-control" required>
                  <option value="">--Select Admission Year--</option>
                  <option value="2014">2014</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                </select>
              </div>
              <div class="col-md-6">
                <select name="dept" class="form-control">
                  <option value="">--Select Department--</option>
                  @foreach($departments as $department)
                  <option value="{{$department->name}}">{{$department->name}}</option>
                  @endforeach
                </select>
                <span id="dept" class="text-danger">{{ $errors->first('dept') }}</span>
              </div>
              
              <div class="col-md-12">
                <button type="submit" style="margin-top: 5px" class="btn btn-md btn-primary pull-right"><i class="fa fa-check"></i> Search </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    @endif

    </div>
  </div>


</div>
@endsection


@section('extrascript')
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
       if ($("#datatable-students").length) {
         $("#datatable-students").DataTable({
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
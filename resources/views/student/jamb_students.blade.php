@extends('layouts.master')


@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'View Applicants By Year','Title'=>'Applicants'])
  <div class="row">
  @if($applicants)
      <div style="padding-left: 20px;">
          <a style="float: right;" href="{{ url()->previous() }}"><h3>Go Back</h3></a>
        </div>
    @endif
    <div class="col-md-12">

    @if($applicants)
      @if($type) 
      <h3>{{ ucwords($type) . " Applicants found in " . $year }}</h3>
      @endif
      <div class="card-body">
              <div class="col-md-12">
                @include('homepage.flash_message')
              </div>
              <table id="datatable-applicants" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Application Number</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>State of Origin</th>
                    <th>LGA</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($applicants)>0)
                    @foreach($applicants as $student)
                    @php if($dept && strtolower($dept) != strtolower($student['dept'])) continue
                    @endphp
                      <tr>
                        <td>{{$student->first_name == null? $student->full_name: $student->first_name.' '.$student->last_name }}</td>
                        <td>{{$student->application_number}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone_number}}</td>
                        <td>{{$student->date_of_birth}}</td>
                        <td>{{$student->state}}</td>
                        <td>{{$student->lga}}</td>
                        <td>
                          <a class="btn btn-primary" href="/admin/view-applicant/{{$student->application_number}}">View</a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>

    @else

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Search Applicants By Year:</h4>
        </div>
        <div class="card-body">
          <form class="" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <select name="year" class="form-control" required>
                  <option value="">--Select Year--</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                </select>
              </div>
              <div class="col-md-6">
                <select name="type" class="form-control" required>
                  <option value="">--Select Type--</option>
                  <option value="jamb">Jamb</option>
                  <option value="DE">Direct Entry</option>
                  <option value="jupeb">Jupeb</option>
                  <option value="icep">ICEP</option>
                  <option value="pg">Post-Graduate</option>
                </select>
                <!-- <span id="dept" class="text-danger">{{ $errors->first('dept') }}</span> -->
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
       if ($("#datatable-applicants").length) {
         $("#datatable-applicants").DataTable({
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
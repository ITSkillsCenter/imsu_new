@extends('layouts.master')

@section('title', 'Evaluation Report')
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
                    <h2>Evaluated Faculties</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {!! \Session::get('msg') !!}
                        </div>
                    @endif
                    @php
                        $total_questions = App\TE_Question::all()->count();
                    @endphp
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Faculty Name</th>
                          <th>Evaluated Courses</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($faculties as $faculty)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faculty->name }}</td>
                                <td>
                                  @php
                                      $courses = DB::table('t_e__mains')->select('course_id')
                                      ->where('semester_id',$semester_id)
                                      ->where('faculty_id',$faculty->id)
                                      ->distinct('course_id')
                                      ->get();
                                      $total_percentage = 0;
                                  @endphp
                                 
                                  @foreach ($courses as $course)
                                      @php
                                          $this_course = App\Course::select('course_code')->where('id',$course->course_id)->first();
                                          // $total_evaluations = App\TE_Main::where('course_id',$course->course_id)
                                          // ->where('faculty_id',$faculty->id)
                                          // ->where('semester_id',$semester_id)
                                          // ->count();
                                          //return $total_evaluations;
                                          $evaluation_ids = App\TE_Main::select('id')
                                                                  ->where('course_id',$course->course_id)
                                                                  ->where('faculty_id',$faculty->id)
                                                                  ->where('semester_id',$semester_id)
                                                                  ->get();
                                          $total_evaluations = $evaluation_ids->count();
                                          $evaluation_ids = $evaluation_ids->pluck('id');
                                          //return $evaluation_ids;
                                          $total = 0;
                                          foreach($evaluation_ids as $ev_id){
                                              $marks = App\TE_Marks::where('evaluation_id',$ev_id)->sum('scale');
                                              $total = $total+$marks;
                                          }
                                          //return $total;
                                          $highest_mark = $total_questions*5;
                                          //return $total_questions;
                                          $average_marks = $total/$total_evaluations;
                                          //return $total_marks;

                                          $percentage = round(($average_marks*100)/$highest_mark);
                                          // average percentage count
                                          $total_percentage = $total_percentage+$percentage;
                                      @endphp
                                      <a href="{{ route('teacher-evaluation-report.report',['sem'=>$semester_id,'fac'=>$faculty->id, 'crs'=>$course->course_id]) }}"> {{ $this_course->course_code }} - {{ number_format($percentage,2).'%' }}</a>
                                      <br>
                                  @endforeach
                                  <br>
                                  @if (count($courses)>0)
                                  {{ "Average Percentage:".' '. number_format($total_percentage/count($courses),2).'%' }}
                                  @endif
                                </td>
                              </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
        </div>
        <!-- /page content -->
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

   });
   </script>
   <!-- /validator -->
@endsection

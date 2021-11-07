@extends('layouts.master')

@section('title', 'Evaluation Report')

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
                    <h2>Evaluation Report</h2>
                    <br>
                    <h5 class="text-center"><b>Calculation Method:</b> (Average Marks/Highest Marks)*100%</h5>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if (Session::has('msg'))
                        <div class="alert alert-success">
                            {!! \Session::get('msg') !!}
                        </div>
                    @endif
                    @php
                        $faculty = App\Faculty::find($faculty_id);
                        $course = App\Course::find($course_id);
                        // dd($course_title);
                    @endphp
                    <h4><b>Faculty Name: </b> {{ $faculty->name }}</h4>
                    <h4><b>Evaluated Course: </b>{{ $course->course_code }}</h4>
                    <h4><b>Evaluated Course Title: </b>{{ $course->course_name }}</h4>
                    <br>
                    <br>
                    <br>
                    <h5><b>Total Evaluation Conducted:</b> {{ $total_evaluations }}</h5>
                    <h5><b>Total Evaluation Marks:</b> {{ $total }}</h5>
                    <h5><b>Total Evaluation Average (Total/Number of Evaluations):</b> {{ $average_marks }}</h5>
                    <h2><b>Percentage:</b> {{ $percentage.'%' }} on a scale of : {{ $highest_mark }} - which is Total Number of Questions * 5</h2>
                    <br>
                    <br>
                    <h2 class="text-center"><u>Per Category Average</u></h2>
                    <table class="table table-striped">
                      <thead>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Percentage</th>
                      </thead>
                      <tbody>
                        @foreach ($categories as $category)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $category->category_name }}</td>
                              {{-- category questions count and calculation --}}
                              @php
                                  $total_qs = App\TE_Question::where('question_category',$category->id)->count();
                                  $category_average = ($categories_total[$loop->index]/$total_evaluations)*100;
                                  $category_percentage = round($category_average / ($total_qs*5));
                              @endphp
                              <td>{{ $category_percentage.'%' }}</td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <h2 class="text-center"><u>Per Question Average</u></h2>
                    <br>
                    <br>
                    <table class="table table-striped">
                      <thead>
                        <th>#</th>
                        <th>Question Title</th>
                        <th>Percentage</th>
                      </thead>
                      <tbody>
                        @foreach ($questions as $question)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $question->question_title }}</td>
                              {{-- category questions count and calculation --}}
                              @php
                                  $question_average = ($question_total[$loop->index]/$total_evaluations)*100;
                                  $question_percentage = round($question_average / 5);
                              @endphp
                              <td>{{ $question_percentage.'%' }}</td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <h2 class="text-center"><u>Remarks</u></h2>
                    <br>
                    <br>
                    <table class="table table-striped">
                      <thead>
                        <th>#</th>
                        <th>Comments</th>
                      </thead>
                      <tbody>
                        @foreach ($evaluation_ids as $ev_id)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          @php
                              $remarks = \App\TE_Main::select('remarks')->where('id',$ev_id)->first()
                          @endphp
                          <td>{{ $remarks->remarks }}</td>
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

<script src="{{ URL::asset('assets/js/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script>
@endsection

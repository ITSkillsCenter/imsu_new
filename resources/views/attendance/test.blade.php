@extends('layouts.master')

@section('title', 'Attendance')
@section('extrastyle')


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
                        <h2>Attendance<small> Attendance Report .</small></h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                        <div class="row">

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="item form-group">
                                            <h3 class="control-label " for="department">Name: {{$name}}
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="item form-group">
                                         <h3 class="control-label" for="levelTerm">Student ID : {{$id}}
                                         </h3>
                                     </div>
                                 </div>

                             </div>
                             <div class="row">

                                <div class="col-md-5">
                                    <div class="item form-group">
                                        <h3 class="control-label" for="subject_id">Subject :
                                        @php
                                           $subject = DB::table('courses')->select('course_code','course_name')
                                                ->where('id',$subject_id)
                                                ->first();
                                        @endphp
                                            {{$subject->course_code}}-{{$subject->course_name}}
                                        
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <h3 class="control-label" for="subject_id">Date :From {{date("d-M-Y",strtotime($dateJunk_from))}} TO {{date("d-M-Y",strtotime($dateJunk_to))}}
                                        </h3>
                                    
                                </div>
                            
                            </div>
                        <br>
                        <div style="overflow-x:auto;">
                        <table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th>Date</th> 
            @foreach($students as $student)
        <th>{{$student->date}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Present</th> 
            @foreach($students as $student)
        <th>{{$student->present? 'Yes':'NO'}}</th>
            @endforeach
        </tr>
    </tbody>
</table>
</div>
                </div>

            </div>
        </div>

    </div>
    <!-- row end -->
    <div class="clearfix"></div>

</div>
</div>
<!-- /page content -->

    

 @endsection
   

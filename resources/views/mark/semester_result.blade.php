@extends('layouts.master')

@section('title', 'Single-Student|Marks')
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
                    <h2>Marks<small>Single student all marks information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_panel">
                    <form class="form-horizontal form-label-left" novalidate method="POST" action="{{route('mark.semester')}}">
                    {{@csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Please Enter Roll: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="file" type="text" class="form-control col-md-7 col-xs-12"  name="student_id" value="{{old('student_id')}}" placeholder="ex: 1101031" required="required">
                            <span class="text-danger">{{ $errors->first('student_id') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level">Level Term: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control col-md-3" name="level" id="level" required="required">
                            <option selected>-- Select One--</option>
                            <option  value="l1t1">Level-1 Term-1</option>
                            <option  value="l1t2">Level-1 Term-2</option>
                            <option  value="l2t1">Level-2 Term-1</option>    
                            <option  value="l2t2">Level-2 Term-2</option>     
                            <option  value="l3t1">Level-3 Term-1</option>     
                            <option  value="l3t2">Level-3 Term-2</option>     
                            <option  value="l4t1">Level-4 Term-1</option>     
                            <option  value="l4t2">Level-4 Term-2</option>     
                          </select>
                          
                            <span class="text-danger">{{ $errors->first('level') }}</span>
                        </div>
                        </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Find</i></button>
                        </div>
                      </div>
                      
                    </form>

                    <div class="clearfix"></div>
                  </div>
                 
                  @if(count($marks)>0)
                  <div class="x_content">
           <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Course No</th>
              <th>Course Title</th>
              <th>Credit</th>
              <th>Grade</th>
            </tr>
          </thead>

          <tbody>
            <?php $res = 0; $l1t1_creditsum = 0;?>
           @foreach($marks as $mark)
           
            <tr>
              <td width="100px;">{{$mark->course_code}}</td>
              <td>{{$mark->course_name}}</td>
              <td>{{number_format((float)$credit = $mark->course_credit, 2, '.', '')}}</td>
              <td><b style="margin-left:15px;">{{trim($mark->grade_letter)}}</b></td>
              <?php $point = $mark->grade_point ?>
              <?php $res+= $credit*$point ?>
              <?php $l1t1_creditsum=$l1t1_creditsum+$credit;?>
            </tr>
            
            @endforeach
            <tr>
              <td colspan="3">Grade Point Average (GPA) for this semester :</td>
              <td><b> {{number_format((float)$l1t1_gpa=$res/$l1t1_creditsum, 2, '.', '')}}</b></td>
            </tr>
          </tbody>
        </table>
                  </div>
            
                 @endif
              
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
        </div>
        <!-- /page content -->
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

   <!-- /validator -->
@endsection

@extends('layouts.master')

@section('title', 'Transcript')
@section('extrastyle')
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/switchery.min.css')}}" rel="stylesheet">
<style>

</style>
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
                    <h2>Transcript<small> Transcript  basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_panel">
                    <form class="form-horizontal form-label-left" novalidate method="POST" action="{{route('transcript.view')}}">
                    {{@csrf_field()}}

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_id">Please Enter Student Roll <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="student_id" type="text" class="form-control col-md-7 col-xs-12"  name="student_id"  placeholder="e.g 1101031" required="required">
                            <span class="text-danger">{{ $errors->first('student_id') }}</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="serial_no">Serial No: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="serial_no" type="text" class="form-control col-md-7 col-xs-12"  name="serial_no"  placeholder="e.g 1101031" required="required" >
                            <span class="text-danger">{{ $errors->first('serial_no') }}</span>
                        </div>
                      </div>
                      
                     
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_id">Duration of the Programme<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <select class="form-control col-md-7 col-xs-12" name="duration_program">
                            
                            <option selected value="4 years">4 years</option>
                            <option value="2 years">2 years</option>
                          </select>
                            
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_id">Exam held in: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="student_id" type="date" class="form-control col-md-7 col-xs-12"  name="complete_degree">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_id">Result Published on: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                        <input id="student_id" type="date"  class="form-control col-md-7 col-xs-12"  name="result_publish">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_id">Major(only for BBA):
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="student_id" type="text" class="form-control col-md-7 col-xs-12"  name="major"  placeholder="Accounting"  type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_id">Generate Provisional Certificate: <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input  type="checkbox" class="js-switch" name="ispvc" value="1" /> 
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Generate Transcript or Provisional</i></button>
                        </div>
                      </div>
                      
                    </form>

                    <div class="clearfix"></div>
                  </div>
               
                </div>
              <!-- row end -->
              <div class="clearfix"></div>
                
          </div>
        </div>
        <!-- /page content -->
@endsection
@section('extrascript')
<script src="{{ URL::asset('assets/js/switchery.min.js')}}"></script>


@endsection

@extends('layouts.master')

@section('title', 'Archive')

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
                    <h2>Archive<small> Archive basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" novalidate method="post" action="{{URL::route('archive.store')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label" for="student_id"> Student ID <span class="required">*</span>
                              </label>
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-info blue"></i></span>
                              <input id="student_id" type="text" class="form-control"  name="student_id" value="{{old('student_id')}}" placeholder="Enter a Student ID" required="required">
                              </div>
                              <span class="text-danger">{{ $errors->first('student_id') }}</span>

                            </div>
                       </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label" for="transcript">Upload Transcript
                              </label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope blue"></i></span>
                                <input type="file" id="transcript" name="transcript"  class="form-control">
                              </div>
                              <span class="text-danger">{{ $errors->first('transcript') }}</span>

                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label" for="pvc">Upload PVC
                              </label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope blue"></i></span>
                                <input type="file" id="pvc" name="pvc" placeholder="example@baiust.com"  class="form-control">
                              </div>
                              <span class="text-danger">{{ $errors->first('pvc') }}</span>

                            </div>
                          </div>

                          
                        </div>
                        <div class="row">
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label" for="status">Status
                              </label>
                              <div class="input-group">
                                <select name="status" id="" class="form-control">
                                  <option value="0">Not withdraw</option>
                                  <option value="1">Withdraw</option>
                                </select>
                              </div>
                              <span class="text-danger">{{ $errors->first('status') }}</span>

                            </div>
                          </div>

                          <div class="col">
                            <div class="form-group">
                              <label class="control-label" for="remarks">Remarks
                              </label>
                              <div class="input-group">
                                <textarea name="remarks" class="form-control"></textarea>
                              </div>
                              <span class="text-danger">{{ $errors->first('remarks') }}</span>

                            </div>
                          </div>
                         
                        </div>


                       
                        <div class="item form-group">
                              <button type="submit" class="btn btn-primary btn-attend"><i class="fa fa-plus"></i> Save </button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <!-- row end -->
              <div class="clearfix"></div>

          </div>
        </div>
        <!-- /page content -->
@endsection

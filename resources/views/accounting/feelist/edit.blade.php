@extends('layouts.master')

@section('title', 'FeeList| Edit')

@section('content')

<!-- page content -->
<div class="col-lg-12" role="main">
  <div class="">

    <div class="clearfix"></div>
    <!-- row start -->
    <div class="row">
      
      <div class="col-md-12 col-sm-12 col-xs-12">

        

        <div class="x_panel">
          <div class="x_title">
            <a href="/admin/feelist" class="btn btn-primary">Back</a>
            <div class="col-md-12">
            @include('homepage.flash_message')
            </div>
            <h2>FeeList<small> FeeLists basic information.</small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" action="{{route('feelist.update',$fl->id)}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_name">Fee Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="fee_name" type="text" class="form-control col-md-12 col-xs-12" name="fee_name" value="{{ $fl->fee_name }}" placeholder="Admission Fee" required="required">
                  <input class="form-control col-md-12 col-xs-12" name="pms_id" value="{{ $fl->pms_id }}" required="required" type="hidden">
                  <span class="text-danger">{{ $errors->first('fee_name') }}</span>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fee_amount">Fee Amount <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="fee_amount" class="form-control col-md-12 col-xs-12" name="amount" value="{{ $fl->amount }}" placeholder="39500" required="required">
                  <span class="text-danger">{{ $errors->first('fee_amount') }}</span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Is Applicable to ?
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-12 col-xs-12" name="is_applicable_to" required>
                    <option value="">--Is applicable to--</option>
                    <option value="returning" {{$fl->is_applicable_to == 'returning' ? 'selected' : ''}}>Returning Students</option>
                    <option value="new" {{$fl->is_applicable_to == 'new' ? 'selected' : ''}}>New Students</option>
                    <option value="all" {{$fl->is_applicable_to == 'all' ? 'selected' : ''}}>All Students</option>
                  </select>
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Faculty
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-12 col-xs-12" id="faculty_nm" name="faculty_id" required>
                    <option disabled selected>--Select one--</option>
                    <option value="all" {{$fl->faculty_id == 'all' ? 'selected' : ''}}>All Faculties</option>
                    @foreach($faculties as $faculty)
                    <option value="{{$faculty->id}}" {{$fl->faculty_id == $faculty->id ? 'selected' : ''}}>{{$faculty->name}}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">{{ $errors->first('faculty') }}</span>
                </div>
              </div>

              <div class="item form-group" style="display: none;" id="department_container">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-12 col-xs-12" id="department_nm" name="department_id">
                    <option value="{{$fl->department_id}}">{{$fl->department_id}}</option>
                  </select>
                  <span class="text-danger">{{ $errors->first('faculty') }}</span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Is this Fee School fees?
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-12 col-xs-12" name="is_schoolfees" required>
                    <option disabled selected>--Select one--</option>
                    <option value="yes" {{$fl->is_schoolfees == 'yes' ? 'selected' : ''}}>Yes</option>
                    <option value="no" {{$fl->is_schoolfees == 'no' ? 'selected' : ''}}>No</option>

                  </select>
                  <span class="text-danger">{{ $errors->first('semester') }}</span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Fee Type
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-12 col-xs-12" name="fee_type" required>
                    <option disabled>--Select one--</option>
                    @foreach($feetypes as $key=>$value)
                    <option value="{{$key}}" {{$fl->fee_type == $key ? 'selected' : ''}}>{{$value}}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">{{ $errors->first('fee_type') }}</span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Status
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-12 col-xs-12" name="status" required>
                    <option value="1" {{$fl->status == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$fl->status == 0 ? 'selected' : ''}}>Not Active</option>
                  </select>
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Invoice Creation ?
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control col-md-12 col-xs-12" name="invoice_creation" required>
                    <option value="">--select none--</option>
                    <option value="auto" {{$fl->invoice_creation == 'auto' ? 'selected' : ''}}>Auto-generate</option>
                    <option value="new" {{$fl->invoice_creation == 'new' ? 'selected' : ''}}>Manual</option>
                  </select>
                  <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="send" type="submit" class="btn btn-lg btn-success"><i class="fa fa-check"> Save</i></button>
                </div>
              </div>

            </form>
          </div>
        </div>
        <!-- row end -->
        <div class="clearfix"></div>

      </div>
    </div>
    <!-- /page content -->
    @endsection
    @section('extrascript')
    <script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#faculty_nm').change(function() {
        let faculty_id = $(this).find(":selected").val()
        if (faculty_id !== 'all') {
          $('#department_container').slideDown()
          $('#department_nm').find('option').remove().end().append('<option value="">Select department</option><option value="all">All</option>').val('');
          $.post('/get_departments', {
            faculty_id
          }).done(function(response) {
            response.body.map((item) => {
              $('#department_nm').append(`<option value='${item.id}'>${item.name}</option>`)
            })
          });
        } else {
          $('#department_nm').find('option').remove().end().append('<option value="">Select department</option>').val('')
          $('#department_container').slideUp()
        }

      })
    </script>
    @endsection
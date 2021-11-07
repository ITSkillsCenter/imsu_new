@extends('layouts.master')

@section('title', 'Admit Card')

@section('extrastyle')
<link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/select2.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/sweetalert.css')}}" rel="stylesheet">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('admin_student/')}}/plugins/select2/select2.min.css">
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
                    <h2>Admit card<small> Admit card  basic information.</small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_panel">
                    <form class="form-horizontal form-label-left" novalidate method="POST" action="{{route('admit.download')}}">
                    {{@csrf_field()}}
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="session">Session : <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input id="session" type="text" class="form-control col-md-7 col-xs-12"  name="session"  placeholder="Spring-2019" required="required">
                            <span class="text-danger">{{ $errors->first('session') }}</span>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="department">Department<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <select class="form-control col-md-7 col-xs-12" name="department" id="department">
                            <option>----Select One---</option>
                            <option value="CSE">Department of Computer Science & Engineering</option>
                            <option value="EEE">Department of Electrical & Electronic Engineering</option>
                            <option value="CE">Department of Cvil Engineering</option>
                            <option value="DBA">Department of Business Administration</option>
                            <option value="ENG">Department of English</option>
                            <option value="LLB">Department of Law</option>
                          </select>
                            <span class="text-danger">{{ $errors->first('department') }}</span>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level_term">Semester <span class="required">*</span>
                              </label>
                            <div class="col-md-6 col-sm-6">
                              {!!Form::select('level_term', $semesters, null, ['placeholder' => 'Pick a Semester','class'=>'form-control col-md-7 col-xs-12', 'id'=>'level_term','required'=>'required'])!!}
                             
                              <span class="text-danger">{{ $errors->first('level_term') }}</span>
                            </div>
                      </div>
                      
            <div class=" item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Courses:</label>
                  <div class="col-md-6 col-sm-6">
               <select name="course_code[]"  class="form-control select2 subject" multiple="multiple" id="course">
                
                 
                
                </select>
                </div>
            </div>
            
          
                      

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success"><i class="fa fa-check"> Find Admit Card</i></button>
                          <a href="{{ route('admit.view') }}" class="btn btn-info"><i class="fa fa-refresh fa-spin"> </i> Refresh</a>
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
<!-- Select2 -->
<script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/icheck.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
<!-- validator -->
<script>
  $(document).ready(function() {
    $('#level_term').on('change',function (){
                var dept= $('#department').val();
                var level= $('#level_term').val();
                //alert(level);
               if(!dept){
                new PNotify({
                    title: 'Validation Error!',
                    text: 'Please Pic A Department!',
                    type: 'error',
                    styling: 'bootstrap3'
                });
            }
            else {
                    //for subjects
                    $.ajax({
                        url:'/admin/admit-card/'+dept+'/'+level,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                           // alert(data);
                            console.log(data);
                            var res='';
                           //$('#student_id').empty();
                            $('#course').append('<option  value="">Pic a Student</option>');
                            $.each(data, function(key, value) {
                                // $('#student_id').append('<option  value="'+value.Registration_Number+'">'+value.Full_Name+'['+value.Registration_Number+']</option>');
                                res +=
                                '<option value="'+value.course_code+'">'+value.course_code+'['+value.course_name+']</option>';
                            });
                            $('#course').html(res);
                           

                        },
                        error: function(data){
                            console.log(data);
                            var respone = JSON.parse(data.responseText);
                            $.each(respone.message, function( key, value ) {
                                new PNotify({
                                    title: 'Error!',
                                    text: value,
                                    type: 'error',
                                    styling: 'bootstrap3'
                                });
                            });
                        }
                    });
                }
    });
  });
  </script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
   $(".subject").select2({
                placeholder: "Select Subject",
                allowClear: true
            });
</script>

   
@endsection

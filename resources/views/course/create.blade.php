@extends('layouts.master',['title'=>'Course'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Course','Title'=>'Course'])
      
     <div class="row">
     <div class="col-lg-12">@include('homepage.flash_message')</div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Course  basic information.</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <form class="form-horizontal form-label-left" novalidate method="post" action="/admin/course/store">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          
                           <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_code">Course Code <span class="required">*</span>
                             </label>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                               <input id="course_code" type="text" class="form-control col-md-12 col-sm-12 col-xs-12"  name="course_code" value="{{old('course_code')}}" placeholder="e.g CSE-101" >
                                 <span class="text-danger">{{ $errors->first('course_code') }}</span>
                             </div>
                           </div>
     
                           <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_name">Course Name <span class="required">*</span>
                             </label>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                               <input id="course_name" type="text" class="form-control col-md-12 col-sm-12 col-xs-12"  name="course_name" value="{{old('course_name')}}" placeholder="e.g Computer Programming" required="required" type="text">
                                 <span class="text-danger">{{ $errors->first('course_name') }}</span>
                             </div>
                           </div>
                           {{-- course type --}}
                           <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_name">Course Type <span class="required">*</span>
                             </label>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                               <select name="type" class="form-control">
                                 @if($general)
                                 <option value="general">General</option>
                                 @else
                                 <option value="compulsory">Compulsory</option>
                                 <option value="optional">Optional</option>
                                 <!-- <option value="general">General</option> -->
                                 @endif
                               </select>
                               <span class="text-danger">{{ $errors->first('course_name') }}</span>
                             </div>
                           </div>
                           {{-- ends --}}
                           <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="credit">Credit<span class="required">*</span>
                             </label>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                               <input type="text" id="credit" class="form-control col-md-12 col-sm-12 col-xs-12" name="unit" value="{{old('credit')}}" placeholder="3"  required="required">
                                 <span class="text-danger">{{ $errors->first('unit') }}</span>
                             </div>
                           </div>
                           @if($general == null)
                           <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Department
                             </label>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                               <select class="form-control col-md-12 col-sm-12 col-xs-12" name="dept_id" required="required">
                                 <option disabled selected>--Select one--</option>
                                 @foreach($departments as $department)
                                 <option value="{{$department->id}}">{{$department->name}}</option>
                                 @endforeach
                               </select>
                                 <span class="text-danger">{{ $errors->first('Program') }}</span>
                             </div>
                           </div>
                           @endif

                           <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Program
                             </label>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                               <select class="form-control col-md-12 col-sm-12 col-xs-12" id="crid" name="program" required="required">
                                 <option value="">--Select one--</option>
                                 @foreach($programs as $program)
                                 <option value="{{$program->id}}">{{$program->name}}</option>
                                 @endforeach
                               </select>
                                 <span class="text-danger">{{ $errors->first('program') }}</span>
                             </div>
                           </div>

                           <div class="item form-group" id="level">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12">Level
                             </label>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                              <select name="level" class="form-control" required>
                                <option value="">Select Level</option>
                                <option value="100">100 Level</option>
                                <option value="200">200 Level</option>
                                <option value="300">300 Level</option>
                                <option value="400">400 Level</option>
                                <option value="500">500 Level</option>
                                <option value="600">600 Level</option>
                              </select>
                                 <span class="text-danger">{{ $errors->first('level') }}</span>
                             </div>
                           </div>

                           <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="croutine_id">Semester
                             </label>
                             <div class="col-md-12 col-sm-12 col-xs-12">
                              <select name="semester" class="form-control" required>
                                <option value="">Select Semester</option>
                                @foreach($semesters as $k=>$semester)
                                <option value="{{$k}}">{{$semester}}</option>
                                @endforeach
                              </select>
                                 <span class="text-danger">{{ $errors->first('semester') }}</span>
                             </div>
                           </div>
                           
                           <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-6 col-md-offset-3 btn-group">
                               <button id="send" type="submit" class="btn btn-success">Save Course</i></button>
                               &nbsp;
                               <a href="{{url()->previous()}}" class="btn btn-info">Return Back</i></a>
                             </div>
                           </div>
     
                         </form> 
                        
                            
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
   
 
</div>
@endsection


@section('extrascript')
<script src="{{ URL::asset('assets/js/validator.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.inputmask.bundle.min.js')}}"></script>
<script>
  $('#crid').change(function(){
        let c_id = $(this).find(":selected").val()
        if(c_id == 2){
          $('#level').slideUp()
        }else{
          $('#level').slideDown()
        } 
    })
</script>
@endsection

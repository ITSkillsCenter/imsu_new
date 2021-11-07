@extends('layouts.master')

@section('title', 'Online Class- Edit')
@section('extrastyle')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link href="{{ URL::asset('assets/css/green.css')}}" rel="stylesheet">
@endsection

@section('content')

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			    
			    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
				<div class="x_panel">
					<div class="x_title">
						<h2>Online Class edit<small class="text-danger"> * Feilds are required.</small></h2>
						<div class="clearfix"></div>
					</div>
					
					<div class="x_content">
						<form action="{{ route('online-class.update', $this_class) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                            <div class="form-row">
                                {{-- faculty --}}
                                <div class="form-group col-md-4">
                                    <label for="">Faculty: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $this_class->faculty->name }}" readonly>
                                    <input type="hidden" class="form-control" value="{{ $this_class->faculty_id }}" name="faculty_id" required>
                                </div>
                                
                                {{-- course --}}
                                <div class="form-group col-md-6">
                                    <label for="">Course: <span class="text-danger">*</span></label>
                                    <select name="course_id" class="form-control select2" required>
                                        @foreach ($courses as $item)
                                            <option value="{{ $item->id }}" @if($item->id == $this_class->course_id) selected @endif >{{ $item->course_code }} - {{ $item->course_name }} - {{ $item->Program }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                {{-- level-term --}}
                                <div class="form-group col-md-2">
                                    <label for="">Level-Term: <span class="text-danger">*</span></label>
                                    <select name="level_term" class="form-control" required>
                                        <option value="{{ $this_class->level_term }}">{{ $this_class->level_term }}</option>
                                        <option value="l1t1">l1t1</option>
                                        <option value="l1t2">l1t2</option>
                                        <option value="l2t1">l2t1</option>
                                        <option value="l2t2">l2t2</option>
                                        <option value="l3t1">l3t1</option>
                                        <option value="l3t2">l3t2</option>
                                        <option value="l4t1">l4t1</option>
                                        <option value="l4t2">l4t2</option>
                                    </select>
                                </div>
                                
                                {{-- department --}}
                                <div class="form-group col-md-4">
                                    <label for="">Department: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="dept_id" value="{{ $this_class->dept_id }}" readonly required>
                                </div>
                                
                                {{-- class_for --}}
                                <div class="form-group col-md-6">
                                    <label for="">Taking Class Of: <span class="text-danger">* (change the value if you are taking class of a different department)</span></label> <br>
                                    <select name="class_for" class="form-control">
                                        <option value="CSE" @if($this_class->class_for == 'CSE') selected @endif>CSE</option>
                                        <option value="EEE" @if($this_class->class_for == 'EEE') selected @endif>EEE</option>
                                        <option value="CE" @if($this_class->class_for == 'CE') selected @endif>CE</option>
                                        <option value="BBA" @if($this_class->class_for == 'BBA') selected @endif>BBA</option>
                                        <option value="English" @if($this_class->class_for == 'English') selected @endif>English</option>
                                        <option value="LLB" @if($this_class->class_for == 'LLB') selected @endif>LLB</option>
                                    </select>
                                </div>
                                
                                {{-- section --}}
                                <div class="form-group col-md-2">
                                    <label for="">Section: <span class="text-danger">*</span></label> <br>
                                    <select name="section" class="form-control" required>
                                        <option value="all" @if($this_class->section == "all") selected @endif >All</option>
                                        <option value="a" @if($this_class->section == "a") selected @endif>A</option>
                                        <option value="b" @if($this_class->section == "b") selected @endif>B</option>
                                    </select>
                                </div>
                                
                                {{-- Session --}}
                                <div class="form-group col-md-4">
                                    <label for="">Session: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="session" value="{{ $this_class->session }}" readonly required>
                                </div>
                                
                                {{-- date and time --}}
                                <div class="form-group col-md-4">
                                    <label for="">Date & Time: <span class="text-danger">*</span></label>
                                    <div class='input-group date' id='datetimepicker1'>
                                      <input type='text' class="form-control" name="date_time" value="{{ $this_class->date_time }}" required/>
                                      <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                      </span>
                                    </div>
                                </div>
                                
                                {{-- duration --}}
                                <div class="form-group col-md-4">
                                    <label for="">Duration:<span class="text-danger">*</span> (in hours)</label>
                                    <input type="text" class="form-control" name="duration" value={{ $this_class->duration }} required>
                                </div>
                                
                                {{-- class link --}}
                                <div class="form-group col-md-12">
                                    <label for="">Class-Link:  <span class="text-danger">*</span> (<a href="https://vsession.bdren.net.bd/login" target="_blank"><u> Generate Zoom Link</u></a> or
                                    <a href="https://meet.google.com/" target="_blank"><u>Generate Meet Link </u></a>)</label> <br>
                                    <span class="text-danger">After generating a class link, copy the invitation link here:</span>
                                    <input type='url' class="form-control" name="link" value="{{ $this_class->link }}" required/>
                                </div>
                                
                                {{-- meeting id --}}
                                <div class="form-group col-md-6">
                                    <label for="">Meeting-ID: (if-required)</label>
                                    <input type="text" name="meeting_id" class="form-control" value="{{ $this_class->meeting_id }}">
                                </div>
                                
                                {{-- meeting password --}}
                                <div class="form-group col-md-6">
                                    <label for="">Meeting Password: (if-required)</label>
                                    <input type="password" name="meeting_password" class="form-control" value="{{ $this_class->meeting_password }}">
                                </div>
                                
                                {{-- remarks --}}
                                <div class="form-group col-md-12">
                                    <label for="">Remarks: (if-required)</label>
                                    <textarea name="remarks" class="form-control">{{ $this_class->remarks }}</textarea>
                                </div>
                                
                                {{-- submit --}}
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success btn-md pull-right">submit</button>
                                </div>
                            </div>
                        </form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
@endsection

@section('extrascript')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(document).ready(function() {
    	$('.select2').select2({
    		placeholder: "Select a Course",
    		allowClear: true
    	});
    });
</script>
<script>
    $(document).ready(function() {
        $('#datetimepicker1').datetimepicker({
            format:'D MMMM YYYY LT',
        });
    });
</script>
@endsection



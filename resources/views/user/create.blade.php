@extends('layouts.master',['title'=>'Create User'])


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Create User','Title'=>'User'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create User</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('homepage.flash_message')
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <form class="form-horizontal form-label-left" method="post"
                                action="{{ URL::route('user.store') }}">
                                @csrf
                                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                <div class="row">

                          
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="control-label" for="firstname"> Title <span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                            <select name="title" class="form-control" id="">
                                                <option>Select Title</option>
                                                <option value="mr">Mr</option>
                                                <option value="mrs">Mrs</option>
                                                <option value="dr">Dr</option>
                                                <option value="prof">Prof</option>
                                            </select>
                                        </div>
                                          <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="control-label" for="firstname"> Name <span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                              {{-- <span class="input-group-addon"><i class="fa fa-info blue"></i></span> --}}
                                              <input id="name" type="text" class="form-control"  name="name" value="" placeholder="Enter a Name" required="required">
                                          </div>
                                          <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="control-label" for="email">Email
                                          </label>
                                          <div class="input-group">
                                            {{-- <span class="input-group-addon"><i class="fa fa-envelope blue"></i></span> --}}
                                            <input type="text" id="email" name="email" placeholder="example@baiust.com"  class="form-control">
                                          </div>
                                          <span class="text-danger">{{ $errors->first('email') }}</span>
            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="control-label" for="password">Password<span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                            {{-- <span class="input-group-addon"><i class="fa fa-key blue"></i></span> --}}
                                            <input id="name" class="form-control"  name="password" value="" min="6" type="password" required>
                                          </div>
                                          <span class="text-danger">{{ $errors->first('password') }}</span>
                                        </div>
                                     </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="control-label" for="confirmpassword">Confirm Password<span class="required">*</span>
                                          </label>
                                          <div class="input-group">
                                            {{-- <span class="input-group-addon"><i class="fa fa-key blue"></i></span> --}}
                                            <input type="password" class="form-control"  name="password_confirmation" value="" required="required">
                                          </div>
                                          <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        </div>
                                     </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="control-label" for="confirmpassword">Status<span class="required">*</span>
                                          </label>
                                          <select name="status" class="form-control">
                                              <option value="active">active</option>
                                              <option value="inactive">inactive</option>
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="col-md-4 form-group">
                                        <label>Roles:</label>
                                        <select class="form-control select2" name="role_id">
                                            <option value="0" selected disabled>Select a Role...</option>
                                            @foreach($roles as $item)
                                                <option value="{{ $item->id }}">{{ $item->display_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
    
                                    <div class="col-md-4 form-group">
                                        <label>If Faculty:</label>
                                        <select class="form-control" id="faculty" name="faculty_id">
                                            <option value="0" selected disabled>Select a faculty</option>
                                            @foreach($faculties as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>If Department:</label>
                                        <select class="form-control" id="departments" name="dept_id">
                                            <option value="0" selected disabled>Select a Department...</option>
                                            @foreach ($dept as $s)
                                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                   
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">Return Back</a>
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

 <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#state_of_origin').change(function(){
        let state_id = $(this).find(":selected").data('id')
        $('#lga')
            .find('option')
            .remove()
            .end()
            .append('<option value="">Select LGA</option>')
            .val('')
        ;
        $.post('/get_lgas',{state_id}).done(function(response){
            response.body.map((item)=>{
                $('#lga').append(`<option value='${item.name}'>${item.name}</option>`)
            })
        });
    })

    $('#faculty').change(function(){
        alert('asdf');
        let faculty_id = $(this).find(":selected").val()
        $('#departments').find('option').remove().end().append('<option value="">Select department</option>').val('')
        ;
        $.post('/get_departments',{faculty_id}).done(function(response){
            response.body.map((item)=>{
                $('#departments').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })

    $('#departments').change(function(){
        let dept_id = $(this).find(":selected").val()
        $('#department').find('option').remove().end().append('<option value="">Select department</option>').val('')
        $.post('/get_department_options',{dept_id}).done(function(response){
            response.body.map((item)=>{
                $('#department_options').append(`<option value='${item.id}'>${item.name}</option>`)
            })
        });
    })
</script>
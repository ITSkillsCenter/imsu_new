@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Department','Title'=>'Edit'])
      
     <div class="row">
        <div class="col-md-8 mx-auto">
            @include('homepage.flash_message')
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Departments - Edit</div>
                </div>
                <form method="POST" action="{{ route('departments.update',$department->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            {{-- <div class="form-group">
                                <label for="email2">Email Address</label>
                                <input type="email" class="form-control" id="email2" placeholder="Enter Email" name="email">
                                <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                             --}}
                                    <div class="form-group">
                                        <label>Name: </label>
                                        <input class="form-control" name="name" value="{{ $department->name }}"/>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Short Name: </label>
                                        <input class="form-control" name="short_name" value="{{ $department->short_name }}" required/>
                                        <span class="text-danger">{{ $errors->first('short_name') }}</span>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label>Faculty: </label>
                                        <select required name="faculty_id" class="form-control">
                                            @foreach($faculties as $f)
                                            <option value="{{$f->id}}" @if ($department->faculty_id==$f->id)
                                                selected
                                            @endif>{{$f->name}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Type: </label>
                                        <select name="type" class="form-control">
                                            <option value="eng" @if ($department->type=='eng')
                                                selected
                                            @endif>Engineering</option>
                                            <option value="non_eng" @if ($department->type=='non_eng')
                                                selected
                                            @endif>Non-Engineering</option>
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <button class="btn btn-success btn-md pull-right">submit</button>
                                    </div> --}}
                                
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success">Submit</button>
                    <a href="{{url('admin/departments')}}" class="btn btn-danger">Return</a>
                </div>
                </form>
            </div>
        </div>
    </div>
   
 
</div>
@endsection


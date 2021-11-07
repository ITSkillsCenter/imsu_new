@extends('layouts.master')


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Edit User','Title'=>'User'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit User</div>
                    </div>
                    <form class="form-horizontal form-label-left" novalidate method="post"
                        action="{{ URL::route('user.update', $user->id) }}">
                        @csrf
                        @method("PATCH")

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                              <label class="control-label" for="firstname"> Title <span class="required">*</span>
                                              </label>
                                              <div class="input-group">
                                                <select name="title" class="form-control" id="">
                                                    <option value="{{ $user->title }}">{{ $user->title }}</option>
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
                                                <label class="control-label" for="firstname"> Name <span
                                                        class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    {{-- <span class="input-group-addon"><i class="fa fa-info blue"></i></span> --}}
                                                    <input id="name" type="text" class="form-control" name="name"
                                                        value="{{ $user->name }}" required="required">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="email">Email: <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    {{-- <span class="input-group-addon"><i class="fa fa-envelope blue"></i></span> --}}
                                                    <input type="text" id="email" name="email" class="form-control"
                                                        value="{{ $user->email }}">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('email') }}</span>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="password">Password<span
                                                        class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    {{-- <span class="input-group-addon"><i class="fa fa-key blue"></i></span> --}}
                                                    <input id="name" class="form-control" name="password"
                                                        value="{{ $user->password_raw }}" type="password">
                                                </div>
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="confirmpassword">Status<span
                                                        class="required">*</span>
                                                </label>
                                                <select name="status" class="form-control">
                                                    <option value="active">active</option>
                                                    <option value="inactive">inactive</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>If Faculty:</label>
                                            <select class="form-control select2" name="teacher_id">
                                                <option value="0">Select a faculty member...</option>
                                                @foreach ($faculties as $item)
                                                    <option value="{{ $item->id }}" @if ($user->teacher_id == $item->id) selected @endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
@endsection

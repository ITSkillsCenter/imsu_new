@extends('layouts.master',['title'=>'Department List'])


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Departments','Title'=>'Departments'])
        <div class="row">
            <div class="col-md-12">
                @include('homepage.flash_message')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Departments</h4>
                    </div>
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            {{-- <h4 class="card-title">Create User</h4> --}}


                            @permission('department-create')
                                <button type="button" class="btn btn-primary ml-auto btn-sm" data-toggle="modal"
                                    data-target=".create-department-modal">+ Add New</button>
                                @endpermission
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-dept" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Department ID(db table)</th>
                                            <th>Department Name</th>
                                            <th>Department Short Name</th>
                                            <th>Department Type</th>
                                            <th>Department Faculty Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $dept)
                                            <tr>
                                                <td>{{ $dept->id }}</td>
                                                <td>{{ $dept->name }}</td>
                                                <td>{{ $dept->short_name }}</td>
                                                <td>{{ $dept->type }}</td>
                                                <td>{{ $dept->faculty->name }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        @permission('department-create')
                                                            <a href="/admin/course/programme/{{$dept->id}}" class="btn btn-sm btn-primary">View Programmes</a>
                                                            <a href="{{ route('departments.edit', $dept->id) }}"
                                                                class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>edit</a>
                                                            @endpermission

                                                            @permission('department-create')
                                                                <a href="{{ route('departments.destroy', $dept->id) }}"
                                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>delete</a>
                                                                @endpermission
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CREATE DEPARTMENT MODAL --}}


                    <!-- Modal -->
                    <div class="modal fade create-department-modal" id="exampleModalCenter" data-backdrop="static" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Department</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('departments.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">

                                                    <div class="form-group">
                                                        <label>Name: </label>
                                                        <input class="form-control" name="name" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Short Name: </label>
                                                        <input class="form-control" name="short_name" required />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Faculty: </label>
                                                        <select required name="faculty_id" class="form-control">
                                                            @foreach($faculties as $f)
                                                            <option value="{{$f->id}}">{{$f->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Type: </label>
                                                        <select name="type" class="form-control">
                                                            <option value="null" disabled selected>Please choose a value...</option>
                                                            <option value="eng">Engineering</option>
                                                            <option value="non_eng">Non-Engineering</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-action">
                                            <button class="btn btn-success">Submit</button>
                                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        {{-- CREATE DEPARTMENT MODAL --}}
                    </div>
                @endsection


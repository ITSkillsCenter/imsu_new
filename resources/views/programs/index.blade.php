@extends('layouts.master',['title'=>'Department List'])


@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Programs','Title'=>'Programs'])
    <div class="row">
        <div class="col-md-12">
            @include('homepage.flash_message')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Programs</h4>
                </div>
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        @permission('department-create')
                        <button type="button" class="btn btn-primary ml-auto btn-sm" data-toggle="modal" data-target=".create-department-modal">+ Add New</button>
                        @endpermission
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-dept" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID(db table)</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programs as $program)
                                <tr>
                                    <td>{{ $program->id }}</td>
                                    <td>{{ $program->name }}</td>
                                    <td>{{ $program->description }}</td>
                                    <td>{{ $program->start_date }}</td>
                                    <td>{{ $program->end_date }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @permission('department-create')
                                            <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>edit</a>
                                            @endpermission

                                            @permission('department-create')
                                            <a href="{{ route('programs.destroy', $program->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>delete</a>
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
    <div class="modal fade create-department-modal" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('programs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">

                                    <div class="form-group">
                                        <label>Name: </label>
                                        <input class="form-control" name="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Description: </label>
                                        <input class="form-control" name="description" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Admission Commence Date: </label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" />
                                    </div>
                                    <div class="form-group">
                                        <label>Admission End Date: </label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Notice (Will display after end date):</label>
                                        <textarea name="notice" class="form-control" id="" cols="30" rows="10"></textarea>
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
    <script>
        $('#start_date').change(function() {
            $('#end_date').attr('min', $(this).val());
        })
    </script>
    @endsection
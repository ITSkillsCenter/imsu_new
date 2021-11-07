@extends('layouts.master')


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'All Users','Title'=>'User'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
<h4 class="card-title">All User Information</h4>
</div> --}}
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            {{-- <h4 class="card-title">Create User</h4> --}}
                            <a href="{{ URL::Route('user.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Add User
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- <table id="basic-datatables" class="display table table-striped table-hover" > --}}
                            <table id="datatable-user" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Assign Role</th>
                                        @role('super-admin')
                                        <th>Password</th>
                                        <th>Action</th>
                                        @endrole

                                    </tr>
                                </thead>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach

                                        </td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#myModal-{{ $user->id }}">
                                                Assign
                                            </button>

                                            <!-- Modal for Role Edit-->
                                            <div class="modal fade" id="myModal-{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">{{ $user->name }}
                                                                Role edit</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('user.assign_roles', $user->id) }}"
                                                                method="post" role="form"
                                                                id="role-form-{{ $user->id }}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PATCH') }}
                                                                <div class="form-group">

                                                                    <select name="roles[]" class="form-control"
                                                                        multiple="multiple">
                                                                        @foreach ($allRoles as $role)
                                                                            <option value="{{ $role->id }}">
                                                                                {{ $role->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                </div>


                                                                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                onclick="$('#role-form-{{ $user->id }}').submit()">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @role('super-admin')
                                        <td>{{ $user->password_raw }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-warning btn-sm">edit</a>
                                                <button class="btn btn-danger btn-sm deleteForm"
                                                    data-id="{{ $user->id }}">delete</button>
                                            </div>
                                        </td>
                                        @endrole

                                    </tr>
                                @empty
                                    <td>no users</td>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('extrascript')

<script>
    // DATA TABLE
    $(document).ready(function() {
        $('#datatable-user').DataTable({});
    });


    //DELETE USER
    $('.deleteForm').click(function(e) {

        const dataId = $(this).data("id")

        $.confirm({
            title: `Delete user? ${dataId}`,
            type: 'red',
            content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
            autoClose: 'cancelAction|8000',
            buttons: {
                deleteUser: {
                    text: 'delete user',
                    btnClass: 'btn-red',
                    action: function() {
                        $.alert('Deleted the user!');
                    }
                },
                cancelAction: function() {
                    // $.alert('action is canceled');
                }
            }
        });

    });
</script>

@endsection



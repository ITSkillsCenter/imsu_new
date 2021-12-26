@extends('layouts.master')


@section('content')

    <div class="page-inner">
        @include('layouts.includes.crumbMenu',['pageTitle'=>'Maximum Credit Unit','Title'=>'Credit Unit'])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
<h4 class="card-title">All User Information</h4>
</div> --}}
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            {{-- <h4 class="card-title">Create User</h4> --}}
                            <a href="{{ route('max-course-credit-unit.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                Add Maximum Course Credit Unit
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- <table id="basic-datatables" class="display table table-striped table-hover" > --}}
                            <table id="datatable-user" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Faculty</th>
                                        <th>Department</th>
                                        <th>Program</th>
                                        <th>Level</th>
                                        <th>Semester</th>
                                        <th>Max Credit Unit</th>
                                        <th>Min Credit Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @forelse($courseCreditUnits as $courseCreditUnit)
                                    <tr>
                                        <td>{{ $courseCreditUnit->faculty->name }}</td>
                                        <td>{{ $courseCreditUnit->department->name }}</td>
                                        <td>{{ $courseCreditUnit->program->name }}</td>
                                        <td>{{ $courseCreditUnit->level }}</td>
                                        <td>{{ $courseCreditUnit->semester }}</td>
                                        <td>{{ $courseCreditUnit->max_credit_unit }}</td>
                                        <td>{{ $courseCreditUnit->min_credit_unit }}</td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="{{route('max-course-credit-unit.edit', base64_encode($courseCreditUnit->id))}}" class="btn btn-info btn-sm">
                                                Edit
                                            </a>

                                         
                                        </td>

                                        {{-- <td>
                                            <div class="btn-group">
                                                <a href="{{ route('user.edit', $courseCreditUnit->id) }}"
                                                    class="btn btn-warning btn-sm">edit</a>
                                                <button class="btn btn-danger btn-sm deleteForm"
                                                    data-id="{{ $courseCreditUnit->id }}">delete</button>
                                            </div>
                                        </td> --}}

                                    </tr>
                                @empty
                                    <td>no record</td>
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



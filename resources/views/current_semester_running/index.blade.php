@extends('layouts.master',['title'=>'Semester Details'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Semester Details','Title'=>'Semester'])
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Session List</h4>
            </div>
            <div class="card-header">
              <div class="d-flex align-items-center">
                @permission('semester-create')
                    <button type="button" class="btn btn-primary ml-auto btn-sm" data-toggle="modal" data-target=".create-semester-modal">+ Add New</button>
                    @endpermission
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if (Session::has('msg'))
                <div class="alert alert-success">
                    {!! \Session::get('msg') !!}
                </div>
            @endif
            <table id="datatable-semester" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Database ID</th>
                  <th>Semester Title</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sessions as $session)
                    <tr>
                      <td>{{ $session->id }}</td>
                      <td>{{ $session->title }}</td>
                      <td>{{ $session->from }}</td>
                      <td>{{ $session->to }}</td>
                      <td>
                        @if ($session->status == 'active')
                            <span class="text-success">active</span>
                        @else
                            <span class="text-danger">inactive</span>
                        @endif
                      </td>
                      <td>
                       <div class="btn-group">
                        @permission('events-read')
                        <a href="{{ route('semester-event.index', $session->id) }}" class="btn btn-info btn-sm"><i class="fa fa-cog"></i> manage-events</a>
                        @endpermission

                        @permission('semester-edit')
                        <a href="{{ route('current-semester-running.edit', $session->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> edit</a>
                        @endpermission

                        @permission('semester-delete')
                        <a href="{{ route('current-semester-running.destroy', $session->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
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

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Semester List</h4>
            </div>
            <div class="card-header">
              <div class="d-flex align-items-center">
                {{-- <h4 class="card-title">Create User</h4> --}}
             

                @permission('semester-create')
                    <button type="button" class="btn btn-primary ml-auto btn-sm" data-toggle="modal" data-target=".create-semester-modal">+ Add New</button>
                    @endpermission
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if (Session::has('msg'))
                <div class="alert alert-success">
                    {!! \Session::get('msg') !!}
                </div>
            @endif
            <table id="datatable-semester" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Database ID</th>
                  <th>Semester Title</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($semesters as $semester)
                    <tr>
                      <td>{{ $semester->id }}</td>
                      <td>{{ $semester->name }}</td>
                      <td>
                        @if ($semester->status == 'active')
                            <span class="text-success">active</span>
                        @else
                            <span class="text-danger">inactive</span>
                        @endif
                      </td>
                      <!-- <td>
                       <div class="btn-group">
                        @permission('events-read')
                        <a href="{{ route('semester-event.index', $semester->id) }}" class="btn btn-info btn-sm"><i class="fa fa-cog"></i> manage-events</a>
                        @endpermission

                        @permission('semester-edit')
                        <a href="{{ route('current-semester-running.edit', $semester->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> edit</a>
                        @endpermission

                        @permission('semester-delete')
                        <a href="{{ route('current-semester-running.destroy', $semester->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> delete</a>
                        @endpermission
                       </div>
                      </td> -->
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
<div class="modal fade create-semester-modal" id="exampleModalCenter" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Add Semester Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        <form method="POST" action="{{ route('current-semester-running.store') }}" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-lg-12">
             
              <div class="form-group">
                <label>Semester Title: </label>
                <input class="form-control" name="title" placeholder="Semester - Year" />
            </div>
            <div class="form-group datepicker">
                <label>Starts From: </label>
                <input type="date" class="form-control" name="from"/>
            </div>
            <div class="form-group">
                <label>Till: </label>
                <input type="date" class="form-control" name="to" />
            </div>
            <div class="form-group">
              <label>Status: </label>
              <select name="status" class="form-control">
                <option value="active">active</option>
                <option value="inactive">inactive</option>
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
</div>
 {{-- CREATE SYLLABUS MODAL --}}
</div>
@endsection

@section('extrascript')

<script>
// DATA TABLE
$(document).ready(function() {
			$('#datatable-semester').DataTable({

			});
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
            action: function () {
                $.alert('Deleted the user!');
            }
        },
        cancelAction: function () {
            // $.alert('action is canceled');
        }
    }
});


});

</script>

@endsection



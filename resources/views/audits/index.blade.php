@extends('layouts.master',['title'=>'Audit Details'])


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Audit Details','Title'=>'Audit'])
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Audit Details</h4>
            </div>
           
            <div class="card-body">
              <div class="table-responsive">
                @if (Session::has('msg'))
                <div class="alert alert-success">
                    {!! \Session::get('msg') !!}
                </div>
            @endif
            <table id="datatable-audit" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Model</th>
                    <th>Old</th>
                    <th>New</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($audits as $audit)
                      <tr>
                        <td>{{ $audit->name }}</td>
                        <td>{{ $audit->event }}</td>
                        <td>{{ $audit->auditable_type }}</td>
                        <td>{{ $audit->old_values }}</td>
                        <td>{{ $audit->new_values }}</td>
                      </tr>
                  @endforeach
                </tbody>
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
			$('#datatable-audit').DataTable({

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



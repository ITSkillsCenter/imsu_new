@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Scholarship Application','Title'=>'Scholarship Student Application'])
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            <div class="btn-group">
              <a class="btn btn-primary" href="javascript:history.go(-1)">Go back</a>
              <!-- <a class="btn btn-info btn-md" href="#" data-toggle="modal" data-target="#paused">View Paused Students</a> -->
              <!-- <a class="btn btn-secondary btn-md" href="/admin/approve/{{base64_encode($dept->id)}}/{{base64_encode($level)}}">Approve Students</a> -->
              <!-- <a class="btn btn-warning btn-md" href="/admin/studentinfo/scholarships/{{base64_encode($dept->id)}}/{{base64_encode($level)}}">Scholarship Applications</a> -->
            </div>
            </div>
            <div class="card-body">
              <table id="datatable-students" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Photo</th>
                    <th>Full Name</th>
                    <th>Matric Number</th>
                    <th>Faculty</th>
                    <th>Department</th>
                    <th>Level</th>
                    <th>State of Origin</th>
                    <th>LGA</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($scholarships)>0)
                    @foreach($scholarships as $student)
                      <tr>
                        <td>
                          <img src="{{asset('/').$student->Photo}}" alt="photo" class="" width="80px" height="70px">
                        </td>
                        <td>{{$student->first_name}} {{$student->last_name}} </td>
                        <td>{{$student->matric_number}}</td>
                        <td>{{Helper::get_faculty($student->faculty_id)->name}}</td>
                        <td>{{Helper::get_department($student->dept_id)->name}}</td>
                        <td>{{$student->level}} level</td>
                        <td>{{$student->state_of_origin}}</td>
                        <td>{{$student->lga}}</td>
                        <td><a class="btn btn-info btn-md" href="/admin/view-scholarship-application/{{base64_encode($student->id)}}">View</a></td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
 
</div>
@endsection

@section('extrascript')

<script>

$(document).ready(function() {
    $('#datatable-students').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
 
@endsection



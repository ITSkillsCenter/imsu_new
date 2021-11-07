@extends('layouts.master')


@section('content')

    <div class="page-inner">
    @php $title = "All Student in {$dept->name}" @endphp
     @include('layouts.includes.crumbMenu',['pageTitle'=>$title,'Title'=>'Student'])
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            <div class="btn-group">
              <a class="btn btn-primary" href="/admin/print_slip/{{ base64_encode($dept->id) }}/{{ base64_encode($level)}}">Print Registration Slip</a>
              <a class="btn btn-info btn-md" href="#" data-toggle="modal" data-target="#paused">View Paused Students</a>
              <a class="btn btn-secondary btn-md" href="/admin/approve/{{base64_encode($dept->id)}}/{{base64_encode($level)}}">Approve Students</a>
              <a class="btn btn-warning btn-md" href="/admin/studentinfo/scholarships/{{base64_encode($dept->id)}}/{{base64_encode($level)}}">Scholarship Applications</a>
            </div>
            </div>
            <div class="card-body">
              <div class="col-md-12">
                @include('homepage.flash_message')
              </div>
              <table id="datatable-students" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Photo</th>
                    <th>Full Name</th>
                    <th>Matric Number</th>
                    <th>Faculty</th>
                    <th>Department</th>
                    <th>Year of Admission</th>
                    <!-- <th>State of Origin</th>
                    <th>LGA</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($students)>0)
                    @foreach($students as $student)
                      <tr>
                        <td>
                          <img src="{{URL::asset("uploads/images/students/$student->Photo")}}" alt="photo" class="" style="width: 100%">
                        </td>
                        <td>{{$student->first_name}} {{$student->last_name}} </td>
                        <td>{{$student->matric_number}}</td>
                        <td>{{$faculty->name}}</td>
                        <td>{{$dept->name}}</td>
                        <td>{{$student->Batch}}</td>
                        <!-- <td>{{$student->state_of_origin}}</td>
                        <td>{{$student->lga}}</td> -->
                        <td>
                          @if($student->status==Null && $student->Email_Address!=Null)
                          <a class="btn btn-warning" href="/admin/studentinfo/verify/{{base64_encode($student->id)}}">Verify Email</a>
                          @endif
                           <a class="btn btn-primary" href="/admin/studentinfo/view/{{base64_encode($student->id)}}">Edit</a>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div id="paused" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Paused Students In this Semester</h4>
            </div>
            <div class="modal-body">
              <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Registration Number</th>
                    <th>Guardian Number</th>
                    <th>Student Mobile</th>
                    <th>Level Term</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($paused)>0)
                    @foreach($paused as $student)
                      <tr>
                        <td>{{$student->Full_Name}} </td>
                        <td>{{$student->Registration_Number}}</td>
                        <td>{{(int)$student->Guardian_Mobile_Number }}</td>
                        <td>{{(int)$student->Student_Mobile_Number}}</td>
                        <td>{{$student->Current_semester}}</td>
                        <td>{{$student->Remarks}}</td>
                        <td>
                          @php
                            $id = Crypt::encrypt($student->Registration_Number);
                          @endphp
                          <a title='View' class='btn btn-success btn-xs btnUpdate' href='{{URL::route('studentinfo.show',$id)}}'> <i class="fa fa-zoom-out icon-white"></i></a>
                          <a title='Update' class='btn btn-info btn-xs btnUpdate' id='{{$student->Registration_Number}}' href='{{URL::route('studentinfo.edit',$id)}}'> <i class="fa fa-check icon-white"></i></a>
                          <form class="deleteForm" method="POST" action="{{URL::route('studentinfo.destroy',$student->Registration_Number)}}">
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class='btn btn-danger btn-xs btnDelete' href=''> <i class="fa fa-trash icon-white"></i></a>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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



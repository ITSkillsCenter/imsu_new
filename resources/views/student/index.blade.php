@extends('layouts.master')


@section('content')

<div class="page-inner">
  @include('layouts.includes.crumbMenu',['pageTitle'=>'All Student','Title'=>'Student'])
  <div class="row">
    <div class="col-md-12">

    @if($students && count($students) > 0)

      <div class="card-body">
              <div class="col-md-12">
                @include('homepage.flash_message')
              </div>
              <table id="datatable-students" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Matric Number</th>
                    <th>Faculty</th>
                    <th>Department</th>
                    @if($join)
                    <td>Amount</td>
                    @endif
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($students)>0)
                    @foreach($students as $student)
                      <tr>
                        <td>{{$student->first_name}} {{$student->last_name}} </td>
                        <td>{{$student->matric_number}}</td>
                        <td>{{$join ? $student->faculty : $student->faculty->name}}</td>
                        <td>{{$join ? $student->dept : $student->department->name }}</td>
                        @if($join)
                        <td>N{{number_format($student->amount,2,'.',',')}}</td>
                        @endif
                        <td>{{$type}}</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>


    @else
      <div class="card">
        <div class="card-header">
          <a href="/admin/student_year"><h3 class="text-primary">View Students By Year</h3></a>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Search Students Department and Level-Term Wise :</h4>
        </div>
        <div class="card-body">
          <form class="" method="POST" action="{{route('students.level') }}">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <select name="dept" class="form-control" required>
                  <option value="">--Select Department--</option>
                  @foreach($departments as $department)
                  <option value="{{$department->id}}">{{$department->name}}</option>
                  @endforeach
                </select>
                <span id="dept" class="text-danger">{{ $errors->first('dept') }}</span>
              </div>
              <div class="col-md-6">
                <select name="level" class="form-control">
                  <option value="">--Select Level--</option>
                  <option value="100">100 Level</option>
                  <option value="200">200 Level</option>
                  <option value="300">300 Level</option>
                  <option value="400">400 Level</option>
                  <option value="500">500 Level</option>
                </select>
              </div>
              <div class="col-md-12">
                <button type="submit" style="margin-top: 5px" class="btn btn-md btn-primary pull-right"><i class="fa fa-check"></i> Search </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    @endif

    </div>
  </div>


</div>
@endsection

@section('extrascript')

<script>
  $(document).ready(function() {
    $('#datatable-students').DataTable({});
  });
</script>

@endsection
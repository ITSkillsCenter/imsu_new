@extends('layouts.master')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- {{-- <a href="{{ URL::to('/profile-update') }}" class="btn btn-md btn-outline-info"><i class="fa fa-refresh"></i> Update Profile</a> --}} -->
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profile Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">

    <!-- Row  box -->
    <div class="row col-md-12">
      <div class="col-md-12">

        <a class="btn btn-primary" href="javascript:history.go(-1)">Back</a>
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white">
            <h3 class="widget-user-username">{{strtoupper($student->Full_Name)}}</h3>
            <h3 class="widget-user-username">{{strtoupper($student->Registration_Number)}}</h3>
            <h5 class="widget-user-desc">Department of {{strtoupper($student->Program)}}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="/profile_images/{{$student->Photo}}" heigth="200px" width="200px" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">Payment Status</h5>
                  <span class="description-text badge badge-success">{{strtoupper($student->Payment_status)}}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header"></h5>
                  <br>
                  <!-- @if($student->Current_status=='current')
                  <span class="description-text">Level Term: {{strtoupper($student->Current_semester)}}</span>
                  @endif -->
                </div>
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">Current Status</h5>
                  <span class="description-text badge badge-success">{{strtoupper($student->Current_status)}}</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->

      </div>
    </div><!-- Row  box end with Academic Information -->
    <div class="row col-md-12">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header text-info ">Basic Information</h5>
          <div class="card-body">
            <table class="table table-stripe">

              <tbody>
                <tr>
                  <th>Name:</th>
                  <td> {{$student->first_name}} {{$student->last_name}}</td>
                </tr>
                <tr>
                  <th>Faculty:</th>
                  <td> {{Helper::get_faculty($student->faculty_id)->name}}</td>
                </tr>
                <tr>
                  <th>Department:</th>
                  <td>{{Helper::get_department($student->dept_id)->name}}</td>
                </tr>
                <tr>
                  <th>Level:</th>
                  <td>{{$student->level}} level</td>
                </tr>
                <tr>
                  <th>Blood Group:</th>
                  <td>{{$student->blood_group}}</td>
                </tr>
                <tr>
                  <th>Nationality:</th>
                  <td>{{$student->nationality}}</td>
                </tr>
                <tr>
                  <th>Date of Birth:</th>
                  <td>{{$student->date_of_birth}}</td>
                </tr>
                <tr>
                  <th>Mobile:</th>
                  <td>{{$student->Student_Mobile_Number}}</td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td>{{$student->Email_Address}}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{$student->gender}}</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Guardian Information</h5>
          <div class="card-body ">
            <table class="table">

              <tbody>
                <tr>
                  <th>Father's Name:</th>
                  <td> {{$student->fathers_name}}</td>
                </tr>
                <!-- <tr>
                  <th>Father's Profession:</th>
                  <td> {{$student->Fathers_Profession}}</td>
                </tr> -->
                <tr>
                  <th>Mother's Name:</th>
                  <td> {{$student->mothers_name}}</td>
                </tr>
                <!-- <tr>
                  <th>Mother's Profession:</th>
                  <td>{{$student->Mothers_Profession}}</td>
                </tr> -->
                <tr>
                  <th> Guardian:</th>
                  <td>{{$student->guardians_name}}</td>
                </tr>

                <tr>
                  <th> Guardian Mobile No:</th>
                  <td>{{$student->guardians_phone}}</td>
                </tr>
                <!-- <tr>
                  <th> Present Address:</th>
                  <td>{{$student->present_address}}</td>
                </tr> -->
                <tr>
                  <th> Permanent Address:</th>
                  <td>{{$student->Permanent_Address}}</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
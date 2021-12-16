@extends('admin_student.layout')
@section('title')
Student||Profile Settings
@endsection
@section('main')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <?php 
              $id = Session::get('student_id');
              $student = DB::table('student_infos')->where('Registration_Number',$id)->first();
              ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
          <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card">
              <h5 class="card-header text-secondary ">Update your Information</h5>
              <div class="card-body">
                  <form action="{{ route('student.password') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="for" value="photo">
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Change your photo:(150px x 150px)</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="Photo">
                        <img src="{{asset($student->Photo)}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <span class="text-danger">{{ $errors->first('Photo') }}</span>
                      </div>

                      <div class="form-group">
                          <button type="submit" class="btn btn-md btn-info"><i class="fa fa-refresh"></i> Update Photo</button>
                      </div> 
                  </form>
                      <form action="{{ route('student.password') }}" method="POST" >
                          {{ csrf_field() }}
                          <input type="hidden" name="for" value="pass"> 
                      <div class="form-group">
                          <label for="exampleFormControlFile1">Old Password</label>
                          <input type="password" class="form-control" id="exampleFormControlFile1" name="old_password">
                          <span class="text-danger">{{ $errors->first('old_password') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">New Password</label>
                            <input type="password" class="form-control" id="exampleFormControlFile1" name="new_password">
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-info"><i class="fa fa-refresh"></i> Update Password</button>
                        </div>
                    </form>
              </div>
          </div>
        </div>
      </div>
      

    </section>
@endsection
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="https://img.icons8.com/color/100/000000/university.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('login_pages/student_page/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('login_pages/student_page/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('login_pages/student_page/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('login_pages/student_page/css/style.css') }}">
     @toastr_css
    <title>IUMSS | Student Portal</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('login_pages/student_page/images/undraw_remotely_2j6y.svg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                        <img src="https://img.icons8.com/color/100/000000/university.png" style="margin: 0px 0px 10px 33%"/>
                            <div class="mb-4">
                                <h3 class="text-center">Sign In</h3>
                                <p class="mb-4 text-center">Integrated University Management Software Solution - Student Portal</p>
                            </div>
                            <form action="{{URL::to('student-login')}}" method="post">
                            @csrf
                                <div class="form-group first">
                                    <label for="username">Student ID:</label>
                                    <input type="text" class="form-control" name="student_id" id="username" value="">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <span class="ml-auto"><a href="#" class="forgot-pass text-danger" data-toggle="modal" data-target="#exampleModal">Forgot Password?</a></span>
                                </div>
                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('otp.send') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="">Student Mobile Number (The one in the IUMSS):</label>
                          <input type="text" name="phone_number" class="form-control" placeholder="01xxxxxxxxx" aria-describedby="helpId">
                        </div>
                        <div class="form-group col-md-12">
                          <button type="submit" class="btn btn-success btn-sm float-right">submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('login_pages/student_page/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login_pages/student_page/js/popper.min.js') }}"></script>
    <script src="{{ asset('login_pages/student_page/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login_pages/student_page/js/main.js') }}"></script>
    @toastr_js
    @toastr_render
</body>

</html>
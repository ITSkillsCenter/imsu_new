@extends('../layouts.app')


@section('content')
<div class="wrapper wrapper-login wrapper-login-full p-0">
    <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
        <p class="logo_bg">
            <img src="{{URL::asset('homepage/upload/logo.png')}}">
        </p>
    </div>
    <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
        <div class="container container-transparent animated fadeIn">

            @include('homepage.flash_message')
            <h3 class="text-center">Login to <strong>Admin Portal</strong></h3>
            <!-- {{-- <p class="text-center mb-4">Integrated  Management Software Solution</p> --}} -->
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group first">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="username" name="email" value="">
                </div>
                <div class="form-group last mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" value="" id="password" name="password">
                </div>
                <div class="d-flex mb-5 align-items-center">
                    <div class="btn-group col-md-12 col-lg-12">
                        <input type="submit" value="Log In" class="btn  btn-primary w-100 ">
                        &nbsp;
                        <a href="{{url('/')}}" class="btn  btn-info w-100">Go Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
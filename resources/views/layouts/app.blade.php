<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="shortcut icon" href="{{URL::asset('homepage/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::asset('homepage/favicon.ico')}}" type="image/x-icon">

	<!-- Fonts and icons -->
	<script src="{{URL::asset('admin_student/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{URL::asset('admin_student/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('admin_student/assets/css/atlantis.css')}}">
</head>
<body class="login">
    
	@yield('content')

	<script src="{{URL::asset('admin_student/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{URL::asset('admin_student/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{URL::asset('admin_student/assets/assets/js/core/popper.min.js')}}"></script>
	<script src="{{URL::asset('admin_student/assets/js/core/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('admin_student/assets/js/atlantis.min.js')}}"></script>
	
</body>

</html>
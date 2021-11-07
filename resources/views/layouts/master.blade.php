<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="shortcut icon" href="{{URL::asset('homepage/favicon.jpg')}}" type="image/x-icon">
    <link rel="icon" href="{{URL::asset('homepage/favicon.jpg')}}" type="image/x-icon">

    <!-- Fonts and icons -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>

        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['/admin_student/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ URL::asset('admin_student/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('admin_student/assets/css/atlantis.css') }}">

    {{-- Jquery alert css--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    @yield('extrastyle')
    
     <script src="{{ URL::asset('admin_student/assets/js/core/jquery.3.2.1.min.js') }}"></script>
     
</head>

<body>
    <div class="wrapper">

        {{-- MASTER HEADER --}}
        @include('layouts.includes.masterHeader')


        <!-- Sidebar -->
        @include('layouts.includes.masterSidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="container">

                @yield('crumbmenu')

                {{-- DASHBOARD CONTENT --}}
                @yield('content')

            </div>

            {{-- MASTER FOOTER --}}
            @include('layouts.includes.masterFooter')
        </div>



    </div>
   

    <script src="{{ URL::asset('admin_student/assets/js/core/popper.min.js') }}"></script>
    
    <script src="{{ URL::asset('admin_student/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>

    <script src="{{ URL::asset('admin_student/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}">
    </script>

    <!-- jQuery Scrollbar -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/moment/moment.min.js') }}"></script>


    <!-- Datatables -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Bootstrap Toggle -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>


    <!-- DateTimePicker -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}">
    </script>

    <!-- Bootstrap Wizard -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>

    <!-- jQuery Validation -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/select2/select2.full.min.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/owl-carousel/owl.carousel.min.js') }}"></script>

    <!-- Magnific Popup -->
    <script src="{{ URL::asset('admin_student/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js') }}">
    </script>

    <!-- Atlantis JS -->
    <script src="{{ URL::asset('admin_student/assets/js/atlantis.min.js') }}"></script>

    {{-- jqeury alert --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    {{-- Jquery print --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"
            integrity="sha512-Fd3EQng6gZYBGzHbKd52pV76dXZZravPY7lxfg01nPx5mdekqS8kX4o1NfTtWiHqQyKhEGaReSf4BrtfKc+D5w=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	@toastr_js
    @toastr_render
    
    @yield("extrascript")

    
    <!-- PNotify -->
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                new PNotify({
                title: '{{ Session::get('success')['title'] }}',
                text: '{{ Session::get('success')['body'] }}',
                type: 'success',
                styling: 'bootstrap3'
                });
            @endif
            @if (Session::has('error'))
                new PNotify({
                title: '{{ Session::get('error')['title'] }}',
                text: '{{ Session::get('error')['body'] }}',
                type: 'error',
                styling: 'bootstrap3'
                });
            @endif
            @if (Session::has('warning'))
                new PNotify({
                title: '{{ Session::get('warning')['title'] }}',
                text: '{{ Session::get('warning')['body'] }}',
                styling: 'bootstrap3'
                });
            @endif

        });
    </script>
    <!-- /PNotify -->
    {{-- <----------------------------> --}}
</body>

</html>

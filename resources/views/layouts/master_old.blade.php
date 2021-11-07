<!-- <!DOCTYPE html> -->
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
   <title> - @yield("title")</title>
    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/nprogress.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/pnotify.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/pnotify.buttons.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
		<link href="{{ URL::asset('assets/css/custom.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    @toastr_css
    @yield("extrastyle")
    <script>
      var hash = '{{session('')}}';
    </script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title nav-inverse" style="border: 0;">
              <a href="{{ route('admin.home') }}" class="site_title"><i class="fa fa-university"></i> <span>Jay College</span></a>
            </div>
            <div class="clearfix"></div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
              <div class="menu_section">
                <h3>Primary Menu</h3>
                <ul class="nav side-menu">
                  {{-- Settings --}}
                  @permission('settings_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        @permission('department-read')
                        <li><a href="{{ route('departments.index') }}">Departments</a></li>
                        @endpermission

                        @permission('semester-read')
                        <li><a href="{{ route('current-semester-running.index') }}">Semester Details</a></li>
                        @endpermission

                        @permission('eventsTypes-read')
                        <li><a href="{{ route('event-types.index') }}">Event Types</a></li>
                        @endpermission

                        @permission('audits-read')
                        <li><a href="{{ route('activity.audit') }}">Activity Audit</a></li>
                        @endpermission
                    </ul>
                  </li>
                  @endpermission
                  {{-- Students --}}
                  @permission('student_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-users"></i> Student Module <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('studentImportExport-create')
                      <li><a href="{{ route('student.exportform') }}">File Import Export Students</a></li>
                      <li><a href="{{ route('student.all_export') }}">ALL Student Export</a></li>
                      @endpermission

                      @permission('student-create')
                      <li><a href="{{ route('studentinfo.create') }}">New Admission</a></li>
                      @endpermission

                      {{-- @permission('student-read') --}}
                      <li><a href="{{ route('studentinfo.index') }}"> Student List</a></li>
                      <li><a href="{{ route('transfer.index') }}">Credit Transfer Student List</a></li>
                      {{-- @endpermission --}}
                    </ul>
                  </li>
                  @endpermission
                  {{-- Registrations --}}
                  @permission('registration-read')
                  <li><a><i style="font-size:25px;" class="fa fa-registered"></i> Registration Module<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{URL::route('registration.index')}}">All Registerd Students List</a>
                      </li>
                      <li><a href="{{URL::route('registration.notyet')}}">Not Registerd Students List</a>
                      </li>
                      <li><a href="{{URL::route('registration.course')}}">Course Wise Student List</a></li>
                      <li><a href="{{ route('clear.registration_clearance') }}">Total Dues  List</a>
                      </li>
                    </ul>
                  </li>
                  @endpermission
                
                  {{-- clearance module --}}
                  @permission('clearance_module-read')
                  <li><a><i style="font-size:25px;" class="fas fa-clipboard-check"></i> Clearnce Report Module <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('allclearance-read')
                      <li><a href="{{URL::route('clear_report.index')}}">All Clearance Report</a>
                      </li>
                      @endpermission

                      @permission('hostelclear-edit')
                      <li><a href="{{URL::route('cr_hall.hall')}}">Hall/ Hostel</a>
                      </li>
                      @endpermission

                      @permission('transportclear-edit')
                      <li><a href="{{URL::route('cr_transport.clearance')}}">Transportation</a>
                      </li>
                      @endpermission

                      @permission('canteenclear-edit')
                      <li><a href="{{URL::route('cr_canteen.clearance')}}">Canteen</a>
                      </li>
                      @endpermission

                      @permission('libraryclear-edit')
                      <li><a href="{{URL::route('cr_library.clearance')}}">Library</a>
                      </li>
                      @endpermission
                      @permission('treasurerclear-edit')
                      <li><a href="{{URL::route('cr_treasurer.clearance')}}">Treasurer Branch</a>
                      </li>
                      @endpermission
                     
                    </ul>
                  </li>
                  @endpermission
                  {{-- ends --}}
                  
                  {{-- Attendance Module --}}
                  @permission('attendance_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-check-square-o" aria-hidden="true"></i> Attendance Module <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('attendance-create')
                      <li><a href="{{route('attendance.list')}}"> Attendance Take</a></li>
                      @endpermission

                      @permission('attendance-create')
                      <li><a href="{{route('attendance.index')}}">Daily Attendance List</a></li>
                      <li><a href="{{route('attendance.report')}}">Attendance Report</a></li> 
                      @endpermission
                    </ul>
                  </li>
                  @endpermission
                  {{-- ends --}}

                  {{-- course and syllabus module --}}
                  @permission('course_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-book"></i> Courses Module <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        
                      @permission('courseSyllabus-read')
                      <li><a href="{{ route('course.syllabus') }}">Syllabus</a></li>
                      @endpermission
                      
                      @permission('course-create')
                        <li><a href="{{route('course.create')}}">Add New Course </a></li>
                      @endpermission

                      @permission('course-read')
                        <li><a href="{{route('course.index')}}">View All Course </a></li>
                      @endpermission
                    </ul> 
                  </li>
                  @endpermission
                  {{-- ends --}}
                  
                  {{-- Faculty Information  --}}
                  @permission('faculty_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-user"></i> Faculty Module <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('faculty-read')
                      <li><a href="{{route('faculty.index')}}">View All Faculty </a></li>
                      @endpermission
                    </ul>
                  </li>
                  @endpermission
                  {{-- ends --}}
                  
                  <!--online class module starts-->
                  @permission('online_class_module-read')
                  <li><a><i style="font-size:25px;" class="fas fa-chalkboard-teacher"></i> Online Class Module <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @role(['hod','faculty'])
                          <li><a href="{{ route('online-class.create') }}">Create Class </a></li>
                          <li><a href="{{ route('online-class.index') }}">My Classes</a></li>
                      @endrole
                      @role(['super-admin','registrar','assistant_registrar', 'treasurer'])
                        <li><a href="{{ route('online_class.all') }}">Check & Report</a></li>
                      @endrole
                    </ul>
                  </li>
                  @endpermission
                  <!--online class module ends-->
                  
                  {{-- Faculty Evaluation --}}
                  @permission('evaluation_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-users"></i> Evaluation Module<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('not_evaluated-read')
                      <li><a href="{{ route('teacher-not-evaluation-report.index') }}">Not Evaluated List</a></li>
                      @endpermission
                      @permission('evaluation-read')
                      <li><a href="{{ route('teacher-evaluation-report.index') }}">Evaluation Report</a></li>
                      @endpermission
                      @permission('evaluationQuestion-read')
                      <li><a href="{{ route('teacher-evaluation-qc.index') }}">Question & Categories</a></li>
                      @endpermission
                    </ul>
                  </li>
                  @endpermission
                  {{-- ends --}}
                  
                  {{-- Marks Module --}}
                  @permission('marks_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-book"></i> Marks Module<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                      @permission('mark-create')
                      <li><a href="{{route('mark.create')}}">Add New Marks</a></li>
                      @endpermission

                      @permission('mark-read')
                      <li><a href="{{route('mark.index')}}">View All Fail Marks</a></li>
                      @endpermission

                      @permission('mark-read')
                      <li><a href="{{route('mark.sheet')}}">Individual Student Marks </a></li>
                      @endpermission

                      @permission('mark-create')
                      <li><a href="{{route('mark.semester')}}">Individual Semester Result </a></li>
                      <li><a href="{{route('mark.upload')}}">Upload Marks </a></li>
                      @endpermission
                    </ul>
                  </li>
                  @endpermission
                  {{-- ends --}}

                  {{-- Academic Reports --}}
                  @permission('academic_reports_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-file-pdf-o"></i> Academic Reports<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('transcript-read')
                      <li><a href="{{route('transcript.show')}}">Academic Transcript </a></li>
                      <li><a href="{{route('transfer.transcript')}}">Credit Transfer Transcript</a></li>
                      <li><a href="{{route('waived.index')}}">Student's Waived Courses</a></li>
                      @endpermission
                      <li><a href="{{route('result.index')}}">Student's CGPA </a></li>
                      @permission('transcript-read')
                      <li><a href="{{route('admit.view')}}">Admit Card </a></li>
                      @endpermission
                    </ul>
                  </li>
                  @endpermission
                  {{-- ends --}}

                  {{-- Academic Archive --}}
                  @permission('academic_archives_module-read')
                  <li><a><i style="font-size:25px;" class="fa fa-file-pdf-o"></i> Academic Archives<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      @permission('archives-read')
                      <li><a href="{{route('archive.index')}}">All Transcript and PVC </a></li>
                      @endpermission 
                    </ul>
                  </li>
                  @endpermission
                  {{-- ends --}}

                  {{-- Accounts Module --}}
                  @permission('accountModule-read')
                  <li><a><i style="font-size:25px;" class="fa fa-money"></i> Accounting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">  
                       @permission('receivable-read') 
                       <li><a  href="{{ route('account.create_invoice') }}"> <i class="fa fa-money"></i> Create Invoice </a></li>
                       <li><a  href="{{ route('account.receivable') }}"> <i class="fa fa-money"></i> Receivable </a></li>
                       <li><a  href="{{ route('all.receivable') }}"> <i class="fa fa-money"></i>All Receivable </a></li>
                       @endpermission
                       @permission('ledger-read')
                       <li><a  href="{{ route('ledger.index') }}"> <i class="fa fa-money"></i>Student Ledger </a></li>
                       @endpermission
                       @permission('accountReport-read')
                       <li><a><i class="fa fa-file-pdf-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('ledger.index2')}}">Balance Sheet </a></li>
                        </ul>
                       </li>
                       @endpermission
                       @permission('accountSetup-create')
                        <li><a><i class="fa fa-money"></i> Basic Setup <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="{{route('chart_account.index')}}">Account Info<small>(Chart  Account)</small> </a></li>
                              <li><a href="{{route('feelist.index')}}">FeeList<small>(Fee stucture)</small> </a></li>
                              <li><a href="{{route('fee.index')}}">Fee<small>(Ledger account)</small> </a></li>
                            </ul>
                        </li>
                      @endpermission
                    </ul>
                  </li>
                  @endpermission
                  {{-- User Action --}}
                  @role('super-admin')
                  <li><a><i style="font-size:25px;" class="fa fa-users"></i> Users Module<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('user.index')}}">Users </a></li>
                        <li><a href="{{route('role.index')}}">Roles </a></li>
                        <li><a href="{{route('permission.index')}}">Permissions </a></li>
                    </ul>
                  </li>
                  @endrole   
                </ul>
              </div>
              <div class="menu_section">
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i style="color:#f7c115;" class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                  
                <li class="">
                  <a href="javascript:;" style="color:#f7c115!important;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/images/users/user.png" alt="logo" >{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu">
                    <li>
                      <a href="{{ route('user.settings') }}"><i class="fa fa-cog"></i> Settings</a>
                    </li>
                    <li>
                      <a class="fullScreen">
                        <i class="fa fa-fullscreen"></i> Full Screen
                      </a>
                    </li>
                    

                    <li>
                      <a href=""><i class="glyphicon  glyphicon-eye-close"></i> Lock Screen</a>
                    </li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="fa fa-off"></i> Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                    </li>
                  </ul>
                </li>
                <li style="float:left;"><h1 id="clock" style="color:#f7c115; "></h1></li>
                <li class="">
                    <a href="#" style="color:#f7c115!important; font-size:25px; margin-top:5px;"  data-toggle="dropdown">
                          
                      <span class="fa fa-bell"></span>
                      @if(auth()->user()->unreadNotifications->count())
                      <span class="badge badge-light">{{ auth()->user()->unreadNotifications->count() }}</span>
                      @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                        <a href="{{ route('mark.read') }}" style="background-color:#fff; color:green;" >
                                <i class="fa fa-eye-close"></i> Mark all as Read
                              </a>
                        </li>
                      @foreach (auth()->user()->unreadNotifications as $notification )
                      
                          <a href="#" style="background-color:red; color:#fff;">
                              {{ $notification->data['data'] }}
                            </a>
                      <hr>
                      @endforeach

                      @foreach (auth()->user()->readNotifications as $notification )
                      
                          <a href="#" style="background-color:green; color:#fff">
                              {{ $notification->data['data'] }}
                            </a>
                      <hr>
                      @endforeach
                      
                    </ul>
                  </li>
                
              </ul>
            </nav>
        </div>
      </div>
      <!-- /top navigation -->
      
    </div>
  <!--Child Page Content Start  -->

  @yield('content')

  <!--Child Page Content End  -->

{{-- @include('layouts.footer') --}}

<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('assets/js/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ URL::asset('assets/js/nprogress.js')}}"></script>

<script src="{{ URL::asset('assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script src="{{ URL::asset('assets/js/pnotify.js')}}"></script>
<script src="{{ URL::asset('assets/js/pnotify.buttons.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@toastr_js
@toastr_render
@yield("extrascript")
<!-- Custom Theme Scripts -->
<script src="{{ URL::asset('assets/js/custom.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/app.js')}}"></script>



</body>
</html>
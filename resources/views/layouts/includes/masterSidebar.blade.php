<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/admin_student/assets/img/avatar.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">  
                                @if (auth()->user()->hasRole('lecturer'))
                                    Lecturer
                                @else
                                    Administrator
                                @endif
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/general-settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('admin/home') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/admin/home">
                                    <span class="sub-item">Dashboard</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


                {{-- Student Module --}}
                @permission('student_module-read')
                <li class="nav-item {{ request()->is(['admin/generte-matric-num','admin/matric-number','admin/export', 'admin/studentinfo-all-info', 'admin/studentinfo/create', 'admin/studentinfo', 'admin/transfer', 'admin/students-dept-level', 'admin/approve/']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#student">
                        <i class="fas fa-users"></i>
                        <p>Manage Student</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="student">
                        <ul class="nav nav-collapse">

                            @permission('studentImportExport-create')
                            <li>
                                <a href="{{ route('student.exportform') }}">
                                    <span class="sub-item">Import Students (CSV)</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('student.importjamb') }}">
                                    <span class="sub-item">Import Jamb Students (CSV)</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('student.viewjamb') }}">
                                    <span class="sub-item">View Applicants</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('student.matricno') }}">
                                    <span class="sub-item">Generate Matric No</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/approve_acceptance/waiting">
                                    <span class="sub-item">Manage Acceptance Fee</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/id-management">
                                    <span class="sub-item">ID card management</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/exam-attendance">
                                    <span class="sub-item">Exam Attendance</span>
                                </a>
                            </li>
                            @endpermission

                            @permission('semester-read')
                            <li>
                                <a href="{{ route('current-semester-running.index') }}">
                                    <span class="sub-item">Semester Details</span>
                                </a>
                            </li>
                            @endpermission

                            @permission('student-create')
                            <!-- <li><a href="/admin/approve_acceptance/waiting">
                                    <span class="sub-item">Manage Acceptance Fee</span>
                                </a></li> -->
                            <li>
                                <a href="{{ route('studentinfo.create') }}">
                                    <span class="sub-item">New Admission</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('student.manage_admission') }}">
                                    <span class="sub-item">Manage Admission</span>
                                </a>
                            </li>
                            @endpermission



                            @permission('student-read')
                            <li><a href="/admin/student_year">
                                    <span class="sub-item">Export Students</span></a></li>

                            <li><a href="{{ route('student.matricno') }}">
                                    <span class="sub-item">Generate Matric No</span></a></li>
                            <li><a href="{{ route('studentinfo.index') }}"><span class="sub-item">Student List</span>
                                </a></li>
                            @endpermission

                            @permission('mark-read')
                            <li><a href="{{ route('studentinfo.scholarship') }}"><span class="sub-item">Scholarship Applications</span>
                                </a></li>
                            <li><a href="{{ route('transfer.index') }}"><span class="sub-item">Credit Transfer
                                        Student List</span></a></li>
                            @endpermission

                        </ul>
                    </div>
                </li>
                @endpermission

                {{-- User Module --}}
                @role('super-admin')
                <li {{-- class="nav-item {{ request()->is(['user','admin/role','admin/permission']) ? 'active' : '' }}"> --}}
                    class="nav-item {{ request()->is(['user', 'admin/role', 'admin/permission', 'user/create']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#user">
                        <i class="fas fa-user"></i>
                        <p>Manage Users</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav nav-collapse">
                            <li><a href="{{ route('user.index') }}">
                                    <span class="sub-item">Users</span>
                                </a></li>
                            <li>
                                <a href="{{ route('role.index') }}">
                                    <span class="sub-item">Roles</span></a>
                            </li>
                            <li>
                                <a href="{{ route('permission.index') }}">
                                    <span class="sub-item">Permissions</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endrole
                {{-- end --}}

                {{-- Program Module --}}
                @permission('program-read')
                <li class="nav-item {{ request()->is(['admin/program', 'admin/program/create']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#program">
                        <i class="fas fa-building"></i>
                        <p>Manage Program</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="program">
                        <ul class="nav nav-collapse">
                            @permission('program-read')
                            <li><a href="{{ route('programs.index') }}">
                                    <span class="sub-item">View Programs</span>
                                </a>
                            </li>
                            @endpermission
                        </ul>
                    </div>
                </li>
                @endpermission

                @permission('lecturer_module-read')
                <li class="nav-item {{ request()->is(['admin/lecturer']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#lecturer">
                        <i class="fas fa-building"></i>
                        <p>Manage Lecturer</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="lecturer">
                        <ul class="nav nav-collapse">
                            @permission('lecturer-read')
                            <li><a href="{{route('lecturer.list')}}">
                                    <span class="sub-item">View lecturer</span>
                                </a>
                            </li>

                            <li><a href="{{route('staff.idcard')}}">
                                    <span class="sub-item">Generate ID Card</span>
                                </a>
                            </li>
                            @endpermission

                           

                            <!-- {{-- @permission('lecturerAssignedCourses-read')
                            <li><a href="{{ route('lecturerAssignedCourses.list') }}">
                                    <span class="sub-item">My Courses</span>
                                </a>
                            </li>
                            @endpermission --}} -->

                            
                        </ul>
                    </div>
                </li>
                @endpermission


                {{-- New modules --}}

                @role('super-admin')
                <li class="nav-item {{ request()->is(['admin/max-course-credit-unit', 'admin/max-course-credit-unit/create',]) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#manage-courses">
                        <i class="fas fa-building"></i>
                        <p>Academics</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="manage-courses">
                        <ul class="nav nav-collapse">
                          
                            <li><a href="{{ route('max-course-credit-unit.list') }}">
                                    <span class="sub-item">Max. Course Credit Unit</span>
                                </a>
                            </li>
                    
                        </ul>
                    </div>
                </li>
                @endrole


                @role('lecturer')
                <li class="nav-item {{ request()->is(['admin/program', 'admin/program/create']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#manage-student">
                        <i class="fas fa-building"></i>
                        <p>Manage Students</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="manage-student">
                        <ul class="nav nav-collapse">
                          
                            {{-- <li><a href="javascript:void()">
                                    <span class="sub-item">My Courses</span>
                                </a>
                            </li> --}}
                            
                        </ul>
                    </div>
                </li>
                @endrole

                @role('lecturer')
                <li class="nav-item {{ request()->is(['admin/program', 'admin/program/create']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#assessment">
                        <i class="fas fa-building"></i>
                        <p>Assessments</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="assessment">
                        <ul class="nav nav-collapse">
                          
                            {{-- <li><a href="javascript:void()">
                                    <span class="sub-item">My Courses</span>
                                </a>
                            </li> --}}
                            
                        </ul>
                    </div>
                </li>
                @endrole

                @role('lecturer')
                <li class="nav-item {{ request()->is(['admin/program', 'admin/program/create']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#massages">
                        <i class="fas fa-building"></i>
                        <p>Manage massages</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="massages">
                        <ul class="nav nav-collapse">
                          
                            {{-- <li><a href="javascript:void()">
                                    <span class="sub-item">My Courses</span>
                                </a>
                            </li> --}}
                            
                        </ul>
                    </div>
                </li>
                @endrole

                @role('lecturer')
                <li class="nav-item {{ request()->is(['admin/program', 'admin/program/create']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#publication">
                        <i class="fas fa-building"></i>
                        <p>Publication </p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="publication">
                        <ul class="nav nav-collapse">
                          
                            {{-- <li><a href="javascript:void()">
                                    <span class="sub-item">My Courses</span>
                                </a>
                            </li> --}}
                            
                        </ul>
                    </div>
                </li>
                @endrole
                


                {{-- end --}}

                {{-- Faculty Module --}}
                @permission('faculty_module-read')
                <li {{-- class="nav-item {{ request()->is(['user','admin/role','admin/permission']) ? 'active' : '' }}"> --}}
                    class="nav-item {{ request()->is(['admin/faculty', 'admin/faculty/create']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#faculty">
                        <i class="fas fa-building"></i>
                        <p>Manage Faculties</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="faculty">
                        <ul class="nav nav-collapse">
                            @permission('faculty-read')
                            <li><a href="{{ route('faculty.index') }}">
                                    <span class="sub-item">View Faculties</span>
                                </a>
                            </li>
                            @endpermission

                            @permission('department-read')
                            <li>
                                <a href="{{ route('departments.index') }}"><span class="sub-item">View Departments</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('department-read')
                            <li>
                                <a href="{{ route('programs.index') }}"><span class="sub-item">View Programs</span>
                                </a>
                            </li>
                            @endpermission
                        </ul>
                    </div>
                </li>
                @endpermission
                {{-- end --}}




                {{-- Course Module --}}
                @permission('course_module-read')
                <li class="nav-item {{ request()->is(['admin/syllabus', '/admin/course/borrowed', 'admin/course/create', 'admin/course/index', 'admin/course', 'admin/course/carry-over']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#course">
                        <i class="fas fa-book"></i>
                        <p>Manage Courses</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="course">
                        <ul class="nav nav-collapse">
                            @permission('courseSyllabus-read')
                            <li><a href="{{ route('course.syllabus') }}">
                                    <span class="sub-item">Syllabus</span>
                                </a>
                            </li>
                            @endpermission


                            @permission('course-create')
                            <li>
                                <a href="{{ route('course.create') }}">
                                    <span class="sub-item">Add New Course</span></a>
                            </li>
                            @endpermission

                            @permission('course-read')
                            <li>
                                <a href="{{ route('course.index') }}">
                                    <span class="sub-item">View All Courses</span></a>
                            </li>

                            <li>
                                <a href="{{ route('course.carryover') }}">
                                    <span class="sub-item">Manage Carry over</span></a>
                            </li>
                            @endpermission

                            @permission('course-create')
                            <li>
                                <a href="/admin/course/borrowed">
                                    <span class="sub-item">Manage Borrowed Course</span></a>
                            </li>
                            @endpermission
                        </ul>
                    </div>
                </li>
                
                @endpermission

                @permission('posts-read')
                <li class="nav-item {{ request()->is(['admin/article/create', 'admin/article', 'admin/category']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#posts">
                        <i class="fas fa-newspaper"></i>
                        <p>Manage Posts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="posts">
                        <ul class="nav nav-collapse">


                            <li><a href="{{ route('admin-articles') }}">
                                    <span class="sub-item">All Posts</span>
                                </a></li>

                            @permission('posts-create')
                            <li>
                                <a href="{{ route('create-article') }}">
                                    <span class="sub-item">Add Posts</span></a>
                            </li>
                            @endpermission
                            <li>
                                <a href="{{ route('categories') }}">
                                    <span class="sub-item">Category</span></a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endpermission


                @permission('receivable-read')
                <li class="nav-item  {{ request()->is(['admin/receivable','admin/receivable-all','admin/ledger','admin/ledger/create']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#submenu">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Accounts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">

                            @permission('receivable-read')
                            <!-- <li><a href="{{ route('account.receivable') }}"><span
                                            class="sub-item">Receivable</span></a></li> -->
                            <li><a href="{{ route('all.receivable') }}"><span class="sub-item">Revenue</span></a></li>
                            <li>
                                <a href="/admin/approve_acceptance/waiting">
                                    <span class="sub-item">Manage Acceptance Fee</span>
                                </a>
                            </li>
                            @endpermission

                            <!-- @permission('ledger-read')
                                    <li><a href="{{ route('ledger.index') }}"><span class="sub-item">Student Ledger
                                            </span></a></li>
                                    @endpermission
                                    @permission('accountReport-read')
                                        <li>
                                            <a data-toggle="collapse" href="#subnav1"><span class="sub-item">Reports</span><span
                                                    class="caret"></span>
                                            </a>
                                            <div class="collapse" id="subnav1">
                                                <ul class="nav nav-collapse subnav">
                                                    <li>
                                                        <a href="{{ route('ledger.index2') }}">Balance
                                                            Sheet</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endpermission -->


                            @permission('accountSetup-create')
                            <li>
                                <a data-toggle="collapse" href="#subnav2"><span class="sub-item">Basic Setup</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <!-- <li>
                                                            <a href="{{ route('chart_account.index') }}"> <span class="sub-item">Account
                                                                    Info<small>(Chart Account)</small></span></a>
                                                        </li> -->

                                        <li>
                                            <a href="{{ route('feelist.index') }}"><span class="sub-item">FeeList<small>(Fee stucture)</small></span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('fee.index') }}"><span class="sub-item">Fee<small>(Ledger
                                                        account)</small></span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('account.create_invoice') }}"><span class="sub-item">Create Invoice</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            @endpermission
                        </ul>
                    </div>
                </li>
                @endpermission

                {{-- Accounts Module  End --}}


                {{-- Settings --}}
                @permission('settings_module-read')
                <li class="nav-item {{ request()->is(['admin/departments', 'admin/event-types', 'admin/all-activities', 'admin/current-semester-running', 'admin/settings']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#setting">
                        <i class="fas fa-cog"></i>
                        <p>Setting</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="setting">
                        <ul class="nav nav-collapse">



                            @permission('semester-read')
                            <li>
                                <a href="{{ route('current-semester-running.index') }}"><span class="sub-item">Semester Details</span>
                                </a>
                            </li>
                            @endpermission

                            @permission('eventsTypes-read')
                            <li>
                                <a href="{{ route('event-types.index') }}"><span class="sub-item">Event Types</span>
                                </a>
                            </li>
                            @endpermission

                            @permission('audits-read')
                            <li>
                                <a href="{{ route('activity.audit') }}">
                                    <span class="sub-item">Activity Audit</span>
                                </a>
                            </li>
                            @endpermission

                        </ul>
                    </div>
                </li>
                @endpermission


            </ul>
        </div>
    </div>
</div>
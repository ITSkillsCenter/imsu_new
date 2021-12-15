<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/profile_images/{{session()->get('student')->Photo}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ session()->get('student')->first_name }} {{ session()->get('student')->last_name }}
                            <span class="user-level">Matric No: <br>{{ session()->get('student')->matric_number }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="/student-profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-off"></i> Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="/student-home">
                        <i class="fas fa-home"></i>
                        <p>Student Dashboard</p>
                    </a>
                </li>

                
                <!-- <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-book"></i>
                        <p>All Courses</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Avatars</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/buttons.html">
                                    <span class="sub-item">Buttons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/gridsystem.html">
                                    <span class="sub-item">Grid System</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/panels.html">
                                    <span class="sub-item">Panels</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/notifications.html">
                                    <span class="sub-item">Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/sweetalert.html">
                                    <span class="sub-item">Sweet Alert</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/lists.html">
                                    <span class="sub-item">Lists</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/owl-carousel.html">
                                    <span class="sub-item">Owl Carousel</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/magnific-popup.html">
                                    <span class="sub-item">Magnific Popup</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/font-awesome-icons.html">
                                    <span class="sub-item">Font Awesome Icons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/simple-line-icons.html">
                                    <span class="sub-item">Simple Line Icons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/flaticons.html">
                                    <span class="sub-item">Flaticons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/typography.html">
                                    <span class="sub-item">Typography</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-clipboard-check"></i>
                        <p>New Registrations</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="sidebar-style-1.html">
                                    <span class="sub-item">Sidebar Style 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="overlay-sidebar.html">
                                    <span class="sub-item">Overlay Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="compact-sidebar.html">
                                    <span class="sub-item">Compact Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="static-sidebar.html">
                                    <span class="sub-item">Static Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="icon-menu.html">
                                    <span class="sub-item">Icon Menu</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Course Registrations</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/course-registration">
                                    <span class="sub-item">View Registration</span>
                                </a>
                            </li>
                            <li>
                                <a href="/new-registration">
                                    <span class="sub-item">New Registration</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li> -->

                <li class="nav-item">
                    <a href="/student-payment">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Payments</p>
                    </a>
                </li>

                <li class="nav-item {{ request()->is(['course-registration', 'select-registration']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#coursereg" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Course Registration</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="coursereg">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/course-registration">
                                    <span class="sub-item">Course Registration</span>
                                </a>
                            </li>
                            <li>
                                <a href="/select-registration">
                                    <span class="sub-item">View Registration</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="/admin/home">
                                    <span class="sub-item">Dashboard</span>
                                </a>
                            </li> -->

                        </ul>
                    </div>
                </li>

                <!-- <li class="nav-item">
                    <a href="/course-registration">
                        <i class="fas fa-pen-square"></i>
                        <p>Course Registration</p>
                    </a>
                    
                </li> -->

                @php 
                    $ct = Helper::check_payment(Session::get('student_id'));
                @endphp
                @if($ct < 1)
                <li class="nav-item">
                    <a href="/generate-exam-pass">
                        <i class="fas fa-book"></i>
                        <p>Generate Exam Pass</p>
                    </a>
                    
                </li>
                @endif
                
                <!-- <li class="nav-item">
                    <a data-toggle="collapse" href="#maps">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Maps</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="maps">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="maps/googlemaps.html">
                                    <span class="sub-item">Google Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/fullscreenmaps.html">
                                    <span class="sub-item">Full Screen Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/jqvmap.html">
                                    <span class="sub-item">JQVMap</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('.nav-item a[href="'+ url +'"]').parent().addClass('active');
        $('.nav-item a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
    });
</script> 
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/uploads/postgraduate/{{session()->get('verified_applicant')->passport}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                           
                            <span class="user-level">
                                @if(request()->is(['pg-applicant-home'])) 
                                Application Number
                                @else
                                Jamb Reg No: 
                                @endif
                                <br>{{ session()->get('verified_applicant')->application_number }}
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <!-- <li>
                                <a href="/student-profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
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
                    <a href="{{request()->is(['pg-applicant-home']) ? '/pg-applicant-home' : '/applicant-home'}}">
                        <i class="fas fa-home"></i>
                        <p>Applicant Dashboard</p>
                    </a>
                </li>
                
                <!-- <li class="nav-item">
                    <a href="/student-payment">
                        <i class="fas fa-money-check-alt"></i>
                        <p>Payments</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/course-registration">
                        <i class="fas fa-pen-square"></i>
                        <p>Course Registration</p>
                    </a>
                    
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
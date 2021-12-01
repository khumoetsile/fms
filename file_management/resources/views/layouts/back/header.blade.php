<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <div class="logo">
                    <!-- Logo icon -->
                    <b class="logo-icon">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('back/dist/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{ asset('back/dist/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="{{ asset('back/dist/images/logo-text.png') }}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text 
                        <img src="{{ asset('back/dist/images/logo-light-text.png') }}" class="light-logo" alt="homepage" />
                        -->
                    </span>
                </div>
                <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
        </a>
		</div>
		<!-- ============================================================== -->
		<!-- End Logo -->
		<!-- ============================================================== -->
		<div class="navbar-collapse collapse" id="navbarSupportedContent">
			<!-- ============================================================== -->
			<!-- toggle and nav items -->
			<!-- ============================================================== -->
			<ul class="navbar-nav float-left mr-auto">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="font-22 mdi mdi-email-outline"></i>

                            </a>
                            
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== 
                        <li class="nav-item dropdown border-right">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline font-22"></i>
                                <span class="badge badge-pill badge-info noti">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <ul class="list-style-none">
                                    <li>
                                        <div class="drop-title bg-primary text-white">
                                            <h4 class="m-b-0 m-t-5">4 New</h4>
                                            <span class="font-light">Notifications</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-center notifications">
                                            
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-danger btn-circle">
                                                    <i class="fa fa-link"></i>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Luanch Admin</h5>
                                                    <span class="mail-desc">Just see the my new admin!</span>
                                                    <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-success btn-circle">
                                                    <i class="ti-calendar"></i>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Event today</h5>
                                                    <span class="mail-desc">Just a reminder that you have event</span>
                                                    <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-info btn-circle">
                                                    <i class="ti-settings"></i>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Settings</h5>
                                                    <span class="mail-desc">You can customize this template as you want</span>
                                                    <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                           
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-primary btn-circle">
                                                    <i class="ti-user"></i>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">Pavan kumar</h5>
                                                    <span class="mail-desc">Just see the my admin!</span>
                                                    <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center m-b-5 text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>-->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('uploads/images/'.Auth::user()->profile_pic) }}" alt="user" class="rounded-circle" height="40" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">Welcome! {{ Auth::user()->fname }}{{" "}}{{ Auth::user()->lname }}<i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="{{ asset('uploads/images/'.Auth::user()->profile_pic) }}" alt="user" class="rounded-circle" height="65" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ Auth::user()->fname }}{{" "}}{{ Auth::user()->lname }}</h4>
                                        <p class=" m-b-0"><span>Acc No : </span>{{ Auth::user()->accounts_number }}</p>
                                        <p class=" m-b-0"><span>Cnic : </span>{{ Auth::user()->username }}</p>
                                        <p class=" m-b-0"><span>Email : </span>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="profile-dis scrollable">
                                            <div class="dropdown-divider"></div>
                                                @if(Auth::user()->hasRole('SuperAdmin|Admin'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @elseif(Auth::user()->hasRole('Management'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @elseif(Auth::user()->hasRole('Accounts'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @elseif(Auth::user()->hasRole('Assisstant'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @elseif(Auth::user()->hasRole('SalesMarketing'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @elseif(Auth::user()->hasRole('FrontDesk'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @elseif(Auth::user()->hasRole('DataEntry'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @elseif(Auth::user()->hasRole('Dealer'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @elseif(Auth::user()->hasRole('Member'))
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                                @endif
                                                <a class="dropdown-item" href="javascript:void(0)">
                                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                        <div class="dropdown-divider"></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <!-- ============================================================== -->
                                            <!-- User profile and search -->
                                            <!-- ============================================================== -->
                                    </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->




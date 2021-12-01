<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block"><span class="__cf_email__" data-cfemail="afc6c1c9c0efd6c0daddcbc0c2cec6c181ccc0c2">[email&#160;protected]</span></span></a>
                    <span class="mx-md-2 d-inline-block"></span>
                    <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">+92 (333) 0000000</span></a>
                    <div class="float-right">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    @if(Auth::user()->hasRole('SuperAdmin|SuperUser'))
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Dashboard</a>
                                        @elseif(Auth::user()->hasRole('RMU'))
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Dashboard</a>
                                        @endif
                                    @else
                                        <div class="float-right">
                                            <a href="{{ route('login') }}" class=""><i class="mdi mdi-account-check"></i></span> <span class="d-none d-md-inline-block">Login</span></a>
                                                <span class="mx-md-2 d-inline-block"></span>
                                            <a href="{{ route('register') }}" class=""><i class="mdi mdi-account-check"></i></span> <span class="d-none d-md-inline-block">Register</span></a>
                                        </div>
                                @endauth
                            </div>
                        @endif
                    </div>
                
            </div>
        </div>
    </div>
</div>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->

<header class="site-navbar js-sticky-header site-navbar-target" role="banner">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="site-logo">
                <a href="{{ url('/') }}" class="text-black"><span class="text-primary"><img src="{{ asset('dist/images/logo.png') }}" alt="homepage" class="light-logo" /></a>
            </div>
        <div class="col-12">
            <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                    <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                </ul>
            </nav>
        </div>
        <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
        </div>
    </div>
</header>


<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dist/images/favicon.png') }}">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{ asset('front/fonts/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/submit.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/fonts/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <link href="{{ asset('front/css/aos.css') }}" rel="stylesheet">

    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<!-- ============================================================== -->
<!-- End head -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('layouts/header_front')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        @yield('content')



        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('layouts/footer_front')                            <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Footer / All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('front/js/aos.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<script src="{{ asset('dist/js/pages/samplepages/jquery.PrintArea.js') }}"></script>
<!-- ============================================================== -->
<!-- End footer / All Jquery -->
<!-- ============================================================== -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

@yield('script')
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/nice-admin/html/ltr/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2019 08:54:05 GMT -->
</html>

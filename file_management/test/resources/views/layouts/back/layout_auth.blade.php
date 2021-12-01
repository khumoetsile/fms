<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('back/dist/images/favicon.png') }}">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{ asset('back/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('back/css/submit.css') }}" rel="stylesheet">
    <link href="{{ asset('back/dist/libs/morris.js/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('back/dist/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/dist/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Form Wizard CSS -->
    <link href="{{ asset('back/dist/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('back/dist/libs/jquery-steps/steps.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('back/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/dist/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('back/dist/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
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

        @include('layouts/back/footer')    

        <!-- ============================================================== -->
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
<script src="{{ asset('back/dist/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('back/js/app.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('back/dist/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('back/dist/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- apps -->
<script src="{{ asset('back/js/submit.js') }}"></script>
<script src="{{ asset('back/dist/js/app.min.js') }}"></script>
<script src="{{ asset('back/dist/js/app.init.js') }}"></script>
<script src="{{ asset('back/dist/js/app-style-switcher.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('back/dist/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('back/dist/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('back/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('back/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('back/dist/js/custom.js') }}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{ asset('back/dist/libs/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('back/dist/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
<!--c3 charts -->
<script src="{{ asset('back/dist/extra-libs/c3/d3.min.js') }}"></script>
<script src="{{ asset('back/dist/extra-libs/c3/c3.min.js') }}"></script>
<!-- chartjs -->
<script src="{{ asset('back/dist/libs/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('back/dist/libs/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('back/dist/libs/morris.js/morris.min.js') }}"></script>

<script src="{{ asset('back/dist/js/pages/dashboards/dashboard2.js') }}"></script>
<script src="{{ asset('back/dist/js/pages/samplepages/jquery.PrintArea.js') }}"></script>

<script src="{{ asset('back/dist/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('back/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

<script src="{{ asset('back/dist/libs/jquery-validation/dist/jquery.validate.min.js') }} "></script>
<script src="{{ asset('back/dist/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js') }} "></script>
<script src="{{ asset('back/dist/js/pages/forms/mask/mask.init.js') }}"></script>

<script src="{{ asset('back/dist/libs/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('back/dist/libs/sweetalert2/sweet-alert.init.js') }}"></script>

<script src="{{ asset('back/dist/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('back/dist/libs/magnific-popup/meg.init.js') }}"></script>


<script src="{{ asset('back/dist/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

<script src="{{ asset('back/dist/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('back/dist/extra-libs/jquery.repeater/repeater-init.js') }}"></script>
<script src="{{ asset('back/dist/extra-libs/jquery.repeater/dff.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<!-- ============================================================== -->
<!-- End footer / All Jquery -->
<!-- ============================================================== -->
@yield('script')
</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/nice-admin/html/ltr/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2019 08:54:05 GMT -->
</html>

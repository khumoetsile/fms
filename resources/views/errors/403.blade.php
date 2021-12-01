@extends('layouts.layout')

@section('title')
Unauthorized
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if(session('gmsg'))
                                <div class="alert alert-success">
                                    {{ session('gmsg') }}
                                </div>
                                @elseif(session('bmsg'))
                                <div class="alert alert-danger">
                                    {{ session('bmsg') }}
                                </div>
                                @elseif(session('dmsg'))
                                <div class="alert alert-warning">
                                    {{ session('dmsg') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="error-title" style="font-size:210px;font-weight:900;text-shadow:4px 4px 0 #fff,6px 6px 0 #343a40;line-height:210px">403</h1>
                            <h1 class="text-uppercase error-subtitle">FORBIDDON ERROR!</h1>
                            <h1 class="text-muted m-t-30 m-b-30">YOU DON'T HAVE PERMISSION TO ACCESS ON THIS SECTION.</h1>
                            <a href="#" onClick="javascript:history.go(-1)" class="btn btn-lg btn-info btn-rounded waves-effect waves-light m-b-40">Go Back</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
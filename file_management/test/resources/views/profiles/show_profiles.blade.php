@extends('layouts.layout')

@section('title')
Show Profile
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
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
                        <h4 class="card-title">Show Profile</h4>
                        <hr>
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
                                @elseif(session('imsg'))
                                <div class="alert alert-info alert-dismissible fade show">
                                    {{ session('imsg') }}
                                </div>
                                @endif
                            </div>
                        </div>
                            @csrf
                            <div class="table-responsive">
                                <table id="zero_config" class="table nowrap table-striped table-bordered table-sm m-b-0">
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Profile Logo</th>
                                            <td>
                                                @if($profile->profile_image)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/'.$profile->profile_image) }}">
                                                        <img src="{{ asset('uploads/'.$profile->profile_image) }}" style="width:125px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Profile Reg Date</th>
                                            <td>{{ date('d-m-Y', strtotime($profile->profile_reg_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Code</th>
                                            <td>{{ $profile->profile_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Name</th>
                                            <td>{{ $profile->profile_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Slogan</th>
                                            <td>{{ $profile->profile_slogan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Address1</th>
                                            <td>{{ $profile->profile_address1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Address2</th>
                                            <td>{{ $profile->profile_address2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Address3</th>
                                            <td>{{ $profile->profile_address3 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country Name</th>
                                            <td>{{ $country->country_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>State Name</th>
                                            <td>{{ $state->state_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>City Name</th>
                                            <td>{{ $city->city_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Area Name</th>
                                            <td>{{ $profile->area_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Zip Name</th>
                                            <td>{{ $profile->zip_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Phone</th>
                                            <td>{{ $profile->profile_phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Phone2</th>
                                            <td>{{ $profile->profile_phone2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Mobile</th>
                                            <td>{{ $profile->profile_mobile }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Mobile2</th>
                                            <td>{{ $profile->profile_mobile2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Email</th>
                                            <td>{{ $profile->profile_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Profile Status</th>
                                            <td>
                                                @if($profile->profile_status == 1)
                                                {{ 'Active' }}
                                                @elseif($profile->profile_status == 0)
                                                {{ 'Disabled' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $profile->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ $profile->updated_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('profiles.edit', $profile->profile_id) }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Edit Profile</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('profiles.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

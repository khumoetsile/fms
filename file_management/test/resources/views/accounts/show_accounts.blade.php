@extends('layouts.layout')

@section('title')
Show Account
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Account</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Account</li>
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
                        <h4 class="card-title">Show Account</h4>
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
                                            <th>Company Logo</th>
                                            <th>Profile Pic</th>
                                            <th>Cnic Pic A</th>
                                            <th>Cnic Pic B</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                @if($account->company_logo)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/images/'.$account->company_logo) }}">
                                                        <img src="{{ asset('uploads/images/'.$account->company_logo) }}" style="width:125px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($account->profile_pic)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/images/'.$account->profile_pic) }}">
                                                        <img src="{{ asset('uploads/images/'.$account->profile_pic) }}" style="width:100px; height: 110px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($account->cnic_pic_a)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/images/'.$account->cnic_pic_a) }}">
                                                        <img src="{{ asset('uploads/images/'.$account->cnic_pic_a) }}" style="width:150px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($account->cnic_pic_b)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/images/'.$account->cnic_pic_b) }}">
                                                        <img src="{{ asset('uploads/images/'.$account->cnic_pic_b) }}" style="width:150px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Account Type</th>
                                            <th>Payment Term</th>
                                            <th>Station</th>
                                            <th>Account Number</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                @if($account->accounts_type == 1)
                                                {{ 'Company' }}
                                                @elseif($account->accounts_type == 0)
                                                {{ 'Individual' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($account->payment_term == 1)
                                                {{ 'Credit' }}
                                                @elseif($account->payment_term == 0)
                                                {{ 'Cash' }}
                                                @endif
                                            </td>
                                            <td>{{ $account->station_code }}</td>
                                            <td>{{ $account->accounts_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Accounts Holder's CNIC</th>
                                            <th>User Name</th>
                                            <th>Account Holder's Name</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $account->accounts_company }}</td>
                                            <td>{{ $account->accounts_cnic }}</td>
                                            <td>{{ $account->accounts_username  }}</td>
                                            <td>{{ $account->accounts_fname }}{{' '}}{{ $account->accounts_lname }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address 1</th>
                                            <th>Address 2</th>
                                            <th>Address 3</th>
                                            <th>Zip Code</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $account->accounts_address1 }}</td>
                                            <td>{{ $account->accounts_address2 }}</td>
                                            <td>{{ $account->accounts_address3  }}</td>
                                            <td>{{ $account->zip_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>City Name</th>
                                            <th>State Name</th>
                                            <th>Country Name</th>
                                            <th>NTN Number</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $account->city_name }}</td>
                                            <td>{{ $account->state_name }}</td>
                                            <td>{{ $account->country_name  }}</td>
                                            <td>{{ $account->ntn_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Mobile Number</th>
                                            <th>Account Status</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $account->accounts_email }}</td>
                                            <td>{{ $account->accounts_phone }}</td>
                                            <td>{{ $account->accounts_mobile  }}</td>
                                            <td>
                                                @if($account->accounts_status == 1)
                                                {{ 'Active' }}
                                                @elseif($account->accounts_status == 0)
                                                {{ 'Deactive' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Activated By</th>
                                            <th>Verified By</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $account->activated_by }}</td>
                                            <td>{{ $account->verified_by }}</td>
                                            <td>{{ $account->created_by  }}</td>
                                            <td>{{ $account->updated_by }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Verify Status</th>
                                            <th>Profile Status</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $account->created_at }}</td>
                                            <td>{{ $account->updated_at }}</td>
                                            <td>
                                                @if($account->verify_status == 1)
                                                {{ 'Verified' }}
                                                @elseif($account->verify_status == 0)
                                                {{ 'None Verified' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($account->profile_status == 1)
                                                {{ 'Completed' }}
                                                @elseif($account->profile_status == 0)
                                                {{ 'None Completed' }}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <hr>
                        <div class="row">
                            @can('Admin-list')
                                @if($account->accounts_status == 0)
                                    <div class="col-lg-4 col-md-4">
                                        <a href="{{ route('accounts.edit', $account->id) }}" type="button" class="btn btn-block btn-sm btn-success btn-single-submit" role="button">Verify & Activate Account</a>
                                    </div>
                                @endif
                            @endcan
                            @can('SuperAdmin-list')
                                @if($account->accounts_status == 1)
                                    <div class="col-lg-4 col-md-4">
                                        <a href="{{ route('accounts.edit', $account->id) }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Edit Account</a>
                                    </div>
                                @endif
                            @endcan
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('accounts.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

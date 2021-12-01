@extends('layouts.layout')

@section('title')
Show Company
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Company</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Company</li>
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
                        <h4 class="card-title">Show Company</h4>
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
                                            <td>
                                                @if($company->company_image)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/'.$company->company_image) }}">
                                                        <img src="{{ asset('uploads/'.$company->company_image) }}" style="width:125px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Company Code</th>
                                            <td>{{ $company->company_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Name</th>
                                            <td>{{ $company->company_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Slogan</th>
                                            <td>{{ $company->company_slogan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Address</th>
                                            <td>{{ $company->company_address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Area Name</th>
                                            <td>{{ $company->area_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Zip Name</th>
                                            <td>{{ $company->zip_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>City Name</th>
                                            <td>{{ $city->city_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>State Name</th>
                                            <td>{{ $state->state_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Country Name</th>
                                            <td>{{ $country->country_name }}</td>
                                        </tr>                                        
                                        <tr>
                                            <th>Company Phone</th>
                                            <td>{{ $company->company_phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Phone 2</th>
                                            <td>{{ $company->company_phone2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Mobile</th>
                                            <td>{{ $company->company_mobile }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Mobile 2</th>
                                            <td>{{ $company->company_fax }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Email</th>
                                            <td>{{ $company->company_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Website</th>
                                            <td>{{ $company->company_web }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Status</th>
                                            <td>
                                                @if($company->company_status == 1)
                                                {{ 'Active' }}
                                                @elseif($company->company_status == 0)
                                                {{ 'Disabled' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $company->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>{{ $company->created_by }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ $company->updated_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated by</th>
                                            <td>{{ $company->updated_by }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('companies.edit', $company->company_id) }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Edit Company</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('dashboard') }}" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

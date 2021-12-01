@extends('layouts.layout')

@section('title')
Show Contact
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Contact</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                        <h4 class="card-title">Show Contact</h4>
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
                                            <th>Contact Logo</th>
                                            <td>
                                                @if($contact->contact_image)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/'.$contact->contact_image) }}">
                                                        <img src="{{ asset('uploads/'.$contact->contact_image) }}" style="width:125px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Contact Reg Date</th>
                                            <td>{{ date('d-m-Y', strtotime($contact->contact_reg_date)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Code</th>
                                            <td>{{ $contact->contact_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Name</th>
                                            <td>{{ $contact->contact_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Slogan</th>
                                            <td>{{ $contact->contact_slogan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Address1</th>
                                            <td>{{ $contact->contact_address1 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Address2</th>
                                            <td>{{ $contact->contact_address2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Address3</th>
                                            <td>{{ $contact->contact_address3 }}</td>
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
                                            <td>{{ $contact->area_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Zip Name</th>
                                            <td>{{ $contact->zip_code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Phone</th>
                                            <td>{{ $contact->contact_phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Phone2</th>
                                            <td>{{ $contact->contact_phone2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Mobile</th>
                                            <td>{{ $contact->contact_mobile }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Mobile2</th>
                                            <td>{{ $contact->contact_mobile2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Email</th>
                                            <td>{{ $contact->contact_email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Status</th>
                                            <td>
                                                @if($contact->contact_status == 1)
                                                {{ 'Active' }}
                                                @elseif($contact->contact_status == 0)
                                                {{ 'Disabled' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created At</th>
                                            <td>{{ $contact->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated At</th>
                                            <td>{{ $contact->updated_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        @can('Admin-list')
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('contacts.edit', $contact->id) }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Edit Contact</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('contacts.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@extends('layouts.layout')

@section('title')
Upload Contacts by CSV
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Upload Contacts by CSV</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('contacts.index') }}">Contacts</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Upload Contacts by CSV</li>
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
        <!-- Form -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload Contacts by CSV</h4>
                    <hr>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <a href="{{ route('contacts.download_csv') }}" type="button" class="btn btn-block btn-sm btn-success btn-single-submit" role="button">Download Sample Contacts</a>
                            </div>
                        </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            @if(session('gmsg'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('gmsg') }}
                            </div>
                            @elseif(session('bmsg'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session('bmsg') }}
                            </div>
                            @elseif(session('dmsg'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                {{ session('dmsg') }}
                            </div>
                            @elseif(session('imsg'))
                            <div class="alert alert-info alert-dismissible fade show">
                                {{ session('imsg') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="panel-body">
                       <form class="form-single-submit" action="{{ route('contacts.upload_process') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="csv">CSV File</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control" id="csv" name="csv">
                                @if($errors->has('csv'))
                                <strong class="text-danger">{{ $errors->first('csv') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_contact" id="submit_contact" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('contacts.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary" type="submit">Back to Details</a>
                            </div>
                        </div>
                    </form>
                       <hr>
                       <h4 class="page-title">Example CSV</h4>
                       <div class="table-responsive">
                        <table class="table nowrap table-striped table-bordered table-sm m-b-0">
                            <thead>
                                <tr>
                                    <th>contact_reg_date</th>
                                    <th>contact_code</th>
                                    <th>contact_name</th>
                                    <th>contact_slogan</th>
                                    <th>contact_address1</th>
                                    <th>contact_address2</th>
                                    <th>contact_address3</th>
                                    <th>country_name</th>
                                    <th>state_name</th>
                                    <th>city_name</th>
                                    <th>area_name</th>
                                    <th>zip_code</th>
                                    <th>contact_phone</th>
                                    <th>contact_phone2</th>
                                    <th>contact_mobile</th>
                                    <th>contact_mobile2</th>
                                    <th>contact_email</th>
                                    <th>contact_status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->contact_reg_date }}</td>
                                    <td>{{ $contact->contact_code }}</td>
                                    <td>{{ $contact->contact_name }}</td>
                                    <td>{{ $contact->contact_slogan }}</td>
                                    <td>{{ $contact->contact_address1 }}</td>
                                    <td>{{ $contact->contact_address2 }}</td>
                                    <td>{{ $contact->contact_address3 }}</td>
                                    <td>{{ $contact->country_name }}</td>
                                    <td>{{ $contact->state_name }}</td>
                                    <td>{{ $contact->city_name }}</td>
                                    <td>{{ $contact->area_name }}</td>
                                    <td>{{ $contact->zip_code }}</td>
                                    <td>{{ $contact->contact_phone }}</td>
                                    <td>{{ $contact->contact_phone2 }}</td>
                                    <td>{{ $contact->contact_mobile }}</td>
                                    <td>{{ $contact->contact_mobile2 }}</td>
                                    <td>{{ $contact->contact_email }}</td>
                                   <td>
                                        @if($contact->contact_status == 1)
                                        {{ 'Active' }}
                                        @elseif($contact->contact_status == 0)
                                        {{ 'Disabled' }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Form -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    @endsection

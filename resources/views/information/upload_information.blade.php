@extends('layouts.layout')

@section('title')
Upload Information by CSV
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Upload Information by CSV</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('information.index') }}">Information</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Upload Information by CSV</li>
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
                    <h4 class="card-title">Upload Information by CSV</h4>
                    <hr>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <a href="{{ route('information.download_csv') }}" type="button" class="btn btn-block btn-sm btn-success btn-single-submit" role="button">Download Sample Information</a>
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
                       <form class="form-single-submit" action="{{ route('information.upload_process') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="csv">CSV File</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control form-control-sm @error('csv') is-invalid @enderror" id="csv" name="csv" required>
                                @if($errors->has('csv'))
                                <strong class="text-danger">{{ $errors->first('csv') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_information" id="submit_information" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('information.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary" type="submit">Back to Details</a>
                            </div>
                        </div>
                    </form>
                       <hr>
                       <h4 class="page-title">Example CSV</h4>
                       <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm m-b-0">
                            <thead>
                                <tr>
                                   <th>information_code</th>
                                   <th>information_name</th>
                                   <th>information_status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($information as $information)
                                <tr>
                                   <td>{{ $information->information_code }}</td>
                                   <td>{{ $information->information_name }}</td>
                                   <td>
                                        @if($information->information_status == 1)
                                        {{ 'Active' }}
                                        @elseif($information->information_status == 0)
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

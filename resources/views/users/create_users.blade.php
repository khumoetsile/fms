@extends('layouts.layout')

@section('title')
Add User
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add User</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('users.index') }}">My Users</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add my Users</li>
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
                    <hr>
                    @if(session('msg'))
                    <div class="alert alert-danger">{{ session('msg') }}</div>
                    @endif

                    <form class="form-single-submit" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="username">Username<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username" placeholder="Enter username ..." required>
                                @if($errors->has('username'))
                                <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                @endif
                                <small id="presentusr" style="color:red;"></small>
                                <small id="absentusr" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="email">User's Email<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="email" maxlength="254" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Enter email address..." required>
                                @if($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="fname">First Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('fname') is-invalid @enderror" value="{{ old('fname') }}" id="fname" name="fname" placeholder="Enter First name..." required>
                                @if($errors->has('fname'))
                                <strong class="text-danger">{{ $errors->first('fname') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="lname">Last Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('lname') is-invalid @enderror" value="{{ old('lname') }}" id="lname" name="lname" placeholder="Enter Last name..." required>
                                @if($errors->has('lname'))
                                <strong class="text-danger">{{ $errors->first('lname') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                    <label for="gender">Sex<span style="color:red"> *</span></label>
                                        </div>
                                <div class="col-md-4 mb-3">
                                    <select name="gender" value="{{ old('gender') }}" class="form-control" id="gender" required>
                                        <option value="">Select Gender</option>
                                        @foreach ($genders as $gender)
                                        <option value="{{ $gender->gender_name }}">{{ $gender->gender_name }}</option>
                                        @endforeach
                                        @if($errors->has('gender'))
                                        <strong class="text-danger">{{ $errors->first('gender') }}</strong>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label for="password">Passwords<span style="color:red"> *</span></label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="password" minlength="8" maxlength="254" class="form-control form-control-sm @error('password') is-invalid @enderror" value="" id="password" name="password" placeholder="password" required>
                                    @if($errors->has('password'))
                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    @endif
                                </div>
                            </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="confirm-password">Retype Password<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="password" minlength="8" maxlength="254" class="form-control form-control-sm @error('confirm-password') is-invalid @enderror" value="" id="confirm-password" name="confirm-password" placeholder="Retype password" required>
                                @if($errors->has('confirm-password'))
                                <strong class="text-danger">{{ $errors->first('confirm-password') }}</strong>
                                @endif
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_no">Contact No.<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('contact_no') is-invalid @enderror" value="{{ old('contact_no') }}" id="contact_no" name="contact_no" placeholder="Enter Contact No..." required>
                                @if($errors->has('contact_no'))
                                <strong class="text-danger">{{ $errors->first('contact_no') }}</strong>
                                @endif
                            </div>
                        </div>
                        <!--
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_pic">Profile Picture<span style="color:red"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" minlength="8" maxlength="254" class="form-control form-control-sm @error('profile_pic') is-invalid @enderror" value="" id="profile_pic" name="profile_pic" >
                                @if($errors->has('profile_pic'))
                                <strong class="text-danger">{{ $errors->first('profile_pic') }}</strong>
                                @endif
                            </div>
                        </div>
                        -->
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="office_name">Station<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="office_name" value="{{ old('office_name') }}" class="form-control" id="office_name" required>
                                    <option value="">Select Sation</option>
                                    @foreach ($offices as $office)
                                    <option value="{{ $office->office_name }}">{{ $office->office_name }}</option>
                                    @endforeach
                                    @if($errors->has('office_name'))
                                    <strong class="text-danger">{{ $errors->first('office_name') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                    <label for="section_name">Section<span style="color:red"> *</span></label>
                                        </div>
                                <div class="col-md-4 mb-3">
                                    <select name="section_name" value="{{ old('section_name') }}" class="form-control" id="section_name" required>
                                        <option value="">Select Section</option>
                                        @foreach ($sections as $section)
                                        <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                                        @endforeach
                                        @if($errors->has('section_name'))
                                        <strong class="text-danger">{{ $errors->first('section_name') }}</strong>
                                        @endif
                                    </select>
                                </div>
                            </div>
                             <div class="form-row">
                            <div class="col-md-2">
                                    <label for="roles">Designation<span style="color:red"> *</span></label>
                                        </div>
                                <div class="col-md-4 mb-3">
                                    <select name="roles" value="{{ old('roles') }}" class="form-control" id="roles" required>
                                        <option value="">Select Designation</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                        @if($errors->has('roles'))
                                        <strong class="text-danger">{{ $errors->first('roles') }}</strong>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="user_status">User Status<span style="color:red"> *</span></label>
                            </div>
                        <div class="col-md-4 mb-3">
                                <select name="user_status" class="form-control form-control-sm @error('user_status') is-invalid @enderror" id="user_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                @if($errors->has('user_status'))
                                    <strong class="text-danger">{{ $errors->first('user_status') }}</strong>
                                @endif
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <input type="hidden" name="submit_stations" id="submit_stations" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                           
                        </div>
                    </form>
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

    @section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    </script>
    @endsection

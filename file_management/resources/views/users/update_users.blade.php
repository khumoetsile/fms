@extends('layouts.layout')

@section('title')
Edit or Activate User
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit or Activate User</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('users.index') }}">User</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit or Activate User</li>
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
                    <h4 class="card-title">Edit or Activate User</h4>
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
                    <form class="form-single-submit" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="username">username<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control form-control-sm @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username }}" required>
                                @if($errors->has('username'))
                                <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="email">Email Address<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required>
                                @if($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="fname">First Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control form-control-sm @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{ $user->fname }}" required>
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
                                <input type="text" class="form-control form-control-sm @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{ $user->lname }}" required>
                                @if($errors->has('lname'))
                                <strong class="text-danger">{{ $errors->first('lname') }}</strong>
                                @endif
                            </div>
                        </div>
                        <!--
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_pic">Profile Picture <span style="color:red"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control form-control-sm @error('profile_pic') is-invalid @enderror" value="{{ old('profile_pic') }}" id="profile_pic" name="profile_pic" value="{{ old('profile_pic') }}" >
                                @if($errors->has('profile_pic'))
                                <strong class="text-danger">{{ $errors->first('profile_pic') }}</strong>
                                @endif
                                <small id="profile_pic" style="color:gray;">User Profile Picture Height 240 x Width 200</small>
                            </div>
                        </div>
                    -->
                    <div class="form-row">
                            <div class="col-md-2">
                                <label for="gender">Sex<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        @foreach($genders as $gender)
                                        <option value="{{ $gender->gender_name }}"@if($gender->gender_name == $user->gender){{ 'selected' }}@endif>{{ $gender->gender_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="password_option">Password Option<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="password_option" class="form-control form-control-sm @error('username') is-invalid @enderror" id="password_option" required>
                                    <option value="">Select Password Option</option>
                                    <option value="1">Change Password</option>
                                    <option value="0">Dont Change Password</option>
                                    @if($errors->has('password_option'))
                                    <strong class="text-danger">{{ $errors->first('password_option') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="password">New Password<span style="color:red"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" autocomplete="password" autofocus disabled>
                                @if($errors->has('password'))
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="password-confirm">Confirm Password<span style="color:red"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" disabled>
                                @if($errors->has('password-confirm'))
                                <strong class="text-danger">{{ $errors->first('password-confirm') }}</strong>
                                @endif
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_no">Contact No<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control form-control-sm @error('contact_no') is-invalid @enderror" id="contact_no" name="contact_no" value="{{ $user->contact_no }}" required>
                                @if($errors->has('contact_no'))
                                <strong class="text-danger">{{ $errors->first('contact_no') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="office_name">Station<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="office_name" name="office_name" required>
                                        <option value="">Select Station</option>
                                        @foreach($offices as $office)
                                        <option value="{{ $office->office_name }}"@if($office->office_name == $user->office_name){{ 'selected' }}@endif>{{ $office->office_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="section">Section<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="section" name="section_name" required>
                                        <option value="">Select Section</option>
                                        @foreach($sections as $section)
                                        <option value="{{ $section->section_name }}"@if($section->section_name == $user->section_name){{ 'selected' }}@endif>{{ $section->section_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="roles">Designation<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                {!! Form::select('roles[]', $roles, $userRoles, array('class' => 'form-control form-control-sm')) !!}
                                <small id="accounts_number" style="color:red;"> Must Select Customer Role for Agents & Clients </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="user_status">Account Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="user_status" class="form-control form-control-sm @error('user_status') is-invalid @enderror" id="user_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1"@if($user->user_status == 1){{ 'selected' }}@endif>Active</option>
                                    <option value="0"@if($user->user_status == 0){{ 'selected' }}@endif>Deavtive</option>
                                    @if($errors->has('user_status'))
                                    <strong class="text-danger">{{ $errors->first('user_status') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <small id="usercompany" style="color:red;">All Sterik Fields are required.</small>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_type" id="submit_type" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('users.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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

    $('#station_codess').change(function(){
    var station_code = $(this).val();
    var id_lenght= station_code.toString().length;
    if(id_lenght){
    $.ajax({
    type: "POST",
    url: "",
    data: {'station_code':station_code},
    dataType: 'json',
    success : function(data) {
    if(data.station_code)
         {
            $('#station_name').val(data.station_name);
         }else{
            $('#station_name').val();
        }
    },
    error: function(response) {
        alert(response.responseJSON.message);
                }
            });
        }
    });


    $('#payment_term').change(function(){
    var payment_term = $(this).val();
    var id_lenght= payment_term.toString().length;
    if(id_lenght){
    $.ajax({
    type: "POST",
    url: "",
    data: {'payment_term':payment_term},
    dataType: 'json',
    success : function(data) {
        alert(data.payment_term);
    if(data.payment_term)
         {
            $('#accounts_number').val(data.accountserial_code);
         }else{
            $('#accounts_number').val();
        }
    },
    error: function(response) {
        alert(response.responseJSON.message);
                }
            });
        }
    });



    $('#account_type').change(function(){
        var val = $(this).val();
        if(val == '1')
        {
            $('#usercompany').prop('disabled',false);
            $('#usercompany').prop('required',true);
            $('#usercompany').val('');
        }else{
            $('#usercompany').prop('disabled',true);
            $('#usercompany').prop('required',false);
            $('#usercompany').val('');
        }
    });

    $('#password_option').change(function(){
        var val = $(this).val();
        if(val == '1')
        {
            $('#password').prop('disabled',false);
            $('#password').prop('required',true);
            $('#password').val('');
            $('#password-confirm').prop('disabled',false);
            $('#password-confirm').prop('required',true);
            $('#password-confirm').val('');
        }else{
            $('#password').prop('disabled',true);
            $('#password').prop('required',false);
            $('#password-confirm').prop('disabled',true);
            $('#password-confirm').prop('required',false);
        }
    });
    </script>
    @endsection
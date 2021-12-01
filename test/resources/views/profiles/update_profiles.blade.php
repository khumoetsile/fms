@extends('layouts.layout')

@section('title')
Edit Profile
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Profile</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('profiles.index') }}">Profile</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
                    <h4 class="card-title">Edit Profile</h4>
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
                    @if(session('gmsg'))
                    <div class="alert alert-success">{{ session('gmsg') }}</div>
                    @elseif(session('bmsg'))
                    <div class="alert alert-danger">{{ session('bmsg') }}</div>
                    @endif

                    <form class="form-single-submit" action="{{ route('profiles.update', $profile->profile_id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_reg_date">Profile Reg Date<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="date" class="form-control" id="profile_reg_date" name="profile_reg_date" value="{{ $profile->profile_reg_date }}" required>
                                @if($errors->has('profile_reg_date'))
                                <strong class="text-danger">{{ $errors->first('profile_reg_date') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_code">Profile Code<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="profile_code" name="profile_code" value="{{ $profile->profile_code }}" required>
                                @if($errors->has('profile_code'))
                                <strong class="text-danger">{{ $errors->first('profile_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_name">Profile Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="profile_name" name="profile_name" value="{{ $profile->profile_name }}" required>
                                @if($errors->has('profile_name'))
                                <strong class="text-danger">{{ $errors->first('profile_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_slogan">Profile Slogan <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="profile_slogan" name="profile_slogan" value="{{ $profile->profile_slogan }}">
                                @if($errors->has('profile_slogan'))
                                <strong class="text-danger">{{ $errors->first('profile_slogan') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_address1">Profile Address1 <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="profile_address1" name="profile_address1" value="{{ $profile->profile_address1 }}" required>
                                @if($errors->has('profile_address1'))
                                <strong class="text-danger">{{ $errors->first('profile_address1') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_address2">Profile Address2 <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="profile_address2" name="profile_address2" value="{{ $profile->profile_address2 }}">
                                @if($errors->has('profile_address2'))
                                <strong class="text-danger">{{ $errors->first('profile_address2') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_address3">Profile Address3 <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="profile_address3" name="profile_address3" value="{{ $profile->profile_address3 }}">
                                @if($errors->has('profile_address3'))
                                <strong class="text-danger">{{ $errors->first('profile_address3') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="country_id">Country Name <span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="country_id" name="country_id" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->country_id }}"@if($country->country_id == $profile->country_id){{ 'selected' }}@endif>{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="state_id">State Name <span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="state_id" name="state_id" required>
                                        <option value="">Select State</option>
                                        @foreach($states as $state)
                                        <option value="{{ $state->state_id }}"@if($state->state_id == $profile->state_id){{ 'selected' }}@endif>{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="city_id">City Name <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select class="custom-select form-control" id="city_id" name="city_id" required>
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->city_id }}"@if($city->city_id == $profile->city_id){{ 'selected' }}@endif>{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="area_name">Area Name <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input maxlength="10" type="text" class="form-control" id="area_name" name="area_name" value="{{ $profile->area_name }}">
                                @if($errors->has('area_name'))
                                <strong class="text-danger">{{ $errors->first('area_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="zip_code">Zip Code <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input maxlength="10" type="text" class="form-control" id="zip_code" name="zip_code" value="{{ $profile->zip_code }}">
                                @if($errors->has('zip_code'))
                                <strong class="text-danger">{{ $errors->first('zip_code') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_phone">Profile Phone <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input maxlength="10" type="text" class="form-control" id="profile_phone" name="profile_phone" value="{{ $profile->profile_phone }}">
                                @if($errors->has('profile_phone'))
                                <strong class="text-danger">{{ $errors->first('profile_phone') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_phone2">Profile Phone 2 <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input maxlength="10" type="text" class="form-control" id="profile_phone2" name="profile_phone2" value="{{ $profile->profile_phone2 }}">
                                @if($errors->has('profile_phone2'))
                                <strong class="text-danger">{{ $errors->first('profile_phone2') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_mobile">Profile Mobile <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input maxlength="11" type="text" class="form-control" id="profile_mobile" name="profile_mobile" value="{{ $profile->profile_mobile }}" required>
                                @if($errors->has('profile_mobile'))
                                <strong class="text-danger">{{ $errors->first('profile_mobile') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_mobile2">Profile Mobile2 <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input maxlength="11" type="text" class="form-control" id="profile_mobile2" name="profile_mobile2" value="{{ $profile->profile_mobile2 }}">
                                @if($errors->has('profile_mobile2'))
                                <strong class="text-danger">{{ $errors->first('profile_mobile2') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_email">Profile Email <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="profile_email" name="profile_email" value="{{ $profile->profile_email }}">
                                @if($errors->has('profile_email'))
                                <strong class="text-danger">{{ $errors->first('profile_email') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_image">Profile Image <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control" id="profile_image" name="profile_image" value="{{ $profile->profile_image }}">
                                @if($errors->has('profile_image'))
                                <strong class="text-danger">{{ $errors->first('profile_image') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_status">Profile Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="profile_status" class="form-control" id="profile_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1"@if($profile->profile_status == 1){{ 'selected' }}@endif>Active</option>
                                    <option value="0"@if($profile->profile_status == 0){{ 'selected' }}@endif>Disabled</option>
                                    @if($errors->has('profile_status'))
                                    <strong class="text-danger">{{ $errors->first('profile_status') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_profile" id="submit_profile" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('profiles.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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

        $('#country_id').change(function(){
            var country_id = $(this).val();
             $.ajax({
            type: "POST",
            url: "{{route('get.states')}}",
            data: {'country_id':country_id},
            dataType: 'json',
            success : function(data) {
                if(data){
                $("#state_id").empty();
                $.each(data,function(key,value){
                    $("#state_id").append('<option value="'+value+'">'+value+'</option>');
                });
           
            }else{
               $("#state_id").empty();
            }
            },
            error: function(response) {
                alert(response.responseJSON.message);
                }
            });
        });

        $('#state_id').change(function(){
            var state_id = $(this).val();
            $.ajax({
            type: "POST",
            url: "{{route('get.cities')}}",
            data: {'state_id':state_id},
            dataType: 'json',
            success : function(data) {
                if(data){
                $("#city_id").empty();
                $.each(data,function(key,value){

                    $("#city_id").append('<option value="'+value+'">'+value+'</option>');
                });
           
            }else{
               $("#city_id").empty();
            }
            },
            error: function(response) {
                alert(response.responseJSON.message);
                }
            });
        });
        
        $('#profile_code').keyup(function(){
        var profile_code = $(this).val();
        var id_lenght= profile_code.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.profiles')}}",
        data: {'profile_code':profile_code},
        dataType: 'json',
        success : function(data) {
        if(data.profile_code)
             {
                 $('#presentreg').html('Opss.!..Profile Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Profile Code is Available.');
                $('#presentreg').html('');
            }
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
    });
    }
    });

    $('#profile_name').keyup(function(){
        var profile_name = $(this).val();
        var id_lenght= profile_name.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('get.profiles')}}",
        data: {'profile_name':profile_name},
        dataType: 'json',
        success : function(data) {
        if(data.profile_name)
             {
                 $('#presentreg').html('Opss.!..Profile Name Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Profile Name is Available.');
                $('#presentreg').html('');
            }
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
    });
    }
    });
    </script>
    @endsection
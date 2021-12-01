@extends('layouts.layout')

@section('title')
Add Profile
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Profile</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">Add Profile</li>
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
                    <h4 class="card-title">Add Profile</h4>
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

                    <form class="form-single-submit" action="{{ route('profiles.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="accounts_address1">Address Line 1<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  class="form-control form-control-sm @error('accounts_address1') is-invalid @enderror" value="{{ old('accounts_address1') }}" id="accounts_address1" name="accounts_address1" value="{{ old('accounts_address1') }}" placeholder="Address Line 1" required>
                                @if($errors->has('accounts_address1'))
                                <strong class="text-danger">{{ $errors->first('accounts_address1') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="accounts_address2">Address Line 2<span style="color:red"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  class="form-control form-control-sm @error('accounts_address2') is-invalid @enderror" value="{{ old('accounts_address2') }}" id="accounts_address2" name="accounts_address2" value="{{ old('accounts_address2') }}" placeholder="Address Line 2" >
                                @if($errors->has('accounts_address2'))
                                <strong class="text-danger">{{ $errors->first('accounts_address2') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="accounts_address3">Address Line 3<span style="color:red"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  class="form-control form-control-sm @error('accounts_address3') is-invalid @enderror" value="{{ old('accounts_address3') }}" id="accounts_address3" name="accounts_address3" value="{{ old('accounts_address3') }}" placeholder="Address Line 3" >
                                @if($errors->has('accounts_address3'))
                                <strong class="text-danger">{{ $errors->first('accounts_address3') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="city_name">City Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  class="form-control form-control-sm @error('city_name') is-invalid @enderror" value="{{ old('city_name') }}" id="city_name" name="city_name" value="{{ old('city_name') }}" placeholder="City Name" required>
                                @if($errors->has('city_name'))
                                <strong class="text-danger">{{ $errors->first('city_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="zip_code">Zip Code<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  class="form-control form-control-sm @error('zip_code') is-invalid @enderror" value="{{ old('zip_code') }}" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" placeholder="Zip Code" required>
                                @if($errors->has('zip_code'))
                                <strong class="text-danger">{{ $errors->first('zip_code') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="state_name">State Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  class="form-control form-control-sm @error('state_name') is-invalid @enderror" value="{{ old('state_name') }}" id="state_name" name="state_name" value="{{ old('state_name') }}" placeholder="State Name" required>
                                @if($errors->has('state_name'))
                                <strong class="text-danger">{{ $errors->first('state_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="country_name">Country Name  <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="country_name" value="{{ old('country_name') }}" class="form-control form-control-sm @error('country_name') is-invalid @enderror" id="country_name" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->country_name }}">{{ $country->country_name }}</option>
                                    @endforeach
                                    @if($errors->has('country_name'))
                                    <strong class="text-danger">{{ $errors->first('country_name') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="ntn_number">NTN Number<span style="color:red"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  maxlength="13" pattern="\d{9-11}" class="form-control form-control-sm @error('ntn_number') is-invalid @enderror" value="{{ old('ntn_number') }}" id="ntn_number" name="ntn_number" value="{{ old('ntn_number') }}" placeholder="NTN Number">
                                @if($errors->has('ntn_number'))
                                <strong class="text-danger">{{ $errors->first('ntn_number') }}</strong>
                                @endif
                                <small id="ntn_number" style="color:gray;">Numbers Only Like 1234567-0</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="profile_pic">Profile Picture <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control form-control-sm @error('profile_pic') is-invalid @enderror" value="{{ old('profile_pic') }}" id="profile_pic" name="profile_pic" value="{{ old('profile_pic') }}" required>
                                @if($errors->has('profile_pic'))
                                <strong class="text-danger">{{ $errors->first('profile_pic') }}</strong>
                                @endif
                                <small id="profile_pic" style="color:gray;">User Profile Picture Height 240 x Width 200</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_logo">Company logo <span style="color:red"> </span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control form-control-sm @error('company_logo') is-invalid @enderror" value="{{ old('company_logo') }}" id="company_logo" name="company_logo" value="{{ old('company_logo') }}" >
                                @if($errors->has('company_logo'))
                                <strong class="text-danger">{{ $errors->first('company_logo') }}</strong>
                                @endif
                                <small id="company_logo" style="color:gray;">Logo Will be shown on VUPCMS Height 70 x Width 170</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="cnic_pic_a">CNIC Front Side<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control form-control-sm @error('cnic_pic_a') is-invalid @enderror" value="{{ old('cnic_pic_a') }}" id="cnic_pic_a" name="cnic_pic_a" value="{{ old('cnic_pic_a') }}" required>
                                @if($errors->has('cnic_pic_a'))
                                <strong class="text-danger">{{ $errors->first('cnic_pic_a') }}</strong>
                                @endif
                                <small id="cnic_pic_a" style="color:gray;">User Profile Picture Height 240 x Width 200</small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="cnic_pic_b">CNIC Back Side <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control form-control-sm @error('cnic_pic_b') is-invalid @enderror" value="{{ old('cnic_pic_b') }}" id="cnic_pic_b" name="cnic_pic_b" value="{{ old('cnic_pic_b') }}" required>
                                @if($errors->has('cnic_pic_b'))
                                <strong class="text-danger">{{ $errors->first('cnic_pic_b') }}</strong>
                                @endif
                                <small id="cnic_pic_b" style="color:gray;">User Profile Picture Height 240 x Width 200</small>
                            </div>
                        </div>
                        <hr>
                        <small id="usercompany" style="color:red;">All Sterik Fields are required.</small>
                        <div class="form-row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="submit_profiles" id="submit_profiles" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details & Request Activation</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('profiles.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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

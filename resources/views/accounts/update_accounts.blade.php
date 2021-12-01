@extends('layouts.layout')

@section('title')
Edit Account
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Account</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('accounts.index') }}">Account</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
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
                    <h4 class="card-title">Edit Account</h4>
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

                    <form class="form-single-submit" action="{{ route('accounts.update', $account->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="accounts_type">Account Type<span style="color:red"> *</span></label>
                                <select name="accounts_type" class="form-control form-control-sm @error('accounts_type') is-invalid @enderror" id="accounts_type" required>
                                    <option value="">Select Account Type</option>
                                    <option value="1"@if($account->accounts_type == 1){{ 'selected' }}@endif>COMPANY</option>
                                    <option value="0"@if($account->accounts_type == 0){{ 'selected' }}@endif>INDIVIDUAL</option>
                                    @if($errors->has('accounts_type'))
                                    <strong class="text-danger">{{ $errors->first('accounts_type') }}</strong>
                                    @endif
                                </select>
                            </div>
                            @if($account->station_code != null)
                            <div class="col-md-3 mb-3">
                                <label for="station_code">Station Code<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('station_code') is-invalid @enderror" id="station_code" name="station_code" value="{{ $account->station_code }}" readonly>
                                @if($errors->has('station_code'))
                                    <strong class="text-danger">{{ $errors->first('station_code') }}</strong>
                                @endif
                            </div>
                            @elseif($account->station_code == null)
                            <div class="col-md-3 mb-3">
                                <label for="station_code">Station Code <span style="color:red"> *</span></label>
                                <select name="station_code" class="form-control form-control-sm" id="station_code" required>
                                    <option value="">Select Station</option>
                                    @foreach ($stations as $station)
                                    <option value="{{ $station->station_code }}">{{ $station->station_code }}</option>
                                    @endforeach
                                    @if($errors->has('station_code'))
                                    <strong class="text-danger">{{ $errors->first('station_code') }}</strong>
                                    @endif
                                </select>
                            </div>
                            @endif
                            @if($account->station_name != null)
                            <div class="col-md-3 mb-3">
                                <label for="station_name">Station Name<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('station_name') is-invalid @enderror" id="station_name" name="station_name" value="{{ $account->station_name }}" readonly>
                                @if($errors->has('station_name'))
                                    <strong class="text-danger">{{ $errors->first('station_name') }}</strong>
                                @endif
                            </div>
                            @elseif($account->station_name == null)
                            <div class="col-md-3 mb-3">
                                <label for="station_name">Station Name<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('station_name') is-invalid @enderror" id="station_name" name="station_name" value="" readonly>
                                @if($errors->has('station_name'))
                                    <strong class="text-danger">{{ $errors->first('station_name') }}</strong>
                                @endif
                            </div>
                            @endif
                            @if($account->station_name != null)
                            <div class="col-md-3 mb-3">
                                <label for="payment_term">Payment Term<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('payment_term') is-invalid @enderror" id="payment_term" name="payment_term" value="@if($account->payment_term == 1){{'Credit'}}@elseif($account->payment_term == 0){{'Cash'}}@endif" readonly>
                                @if($errors->has('payment_term'))
                                    <strong class="text-danger">{{ $errors->first('payment_term') }}</strong>
                                @endif
                            </div>
                            @elseif($account->station_name == null)
                            <div class="col-md-3 mb-3">
                                <label for="payment_term">Payment Term<span style="color:red"> *</span></label>
                                <select name="payment_term" class="form-control form-control-sm @error('payment_term') is-invalid @enderror" id="payment_term" required>
                                    <option value="">Payment Term</option>
                                    <option value="1"@if($account->payment_term == 1){{ 'selected' }}@endif>Credit</option>
                                    <option value="0"@if($account->payment_term == 0){{ 'selected' }}@endif>Cash</option>
                                    @if($errors->has('payment_term'))
                                    <strong class="text-danger">{{ $errors->first('payment_term') }}</strong>
                                    @endif
                                </select>
                            </div>
                            @endif
                        </div>
                        <div class="form-row">
                            @if($account->accounts_number != null)
                            <div class="col-md-3 mb-3">
                                <label for="accounts_number">Account Number<span style="color:red"> *</span></label>
                                <input type="text" maxlength="10" pattern="\d{4-10}" class="form-control form-control-sm @error('accounts_number') is-invalid @enderror" id="accounts_number" name="accounts_number" value="{{ $account->accounts_number }}" readonly>
                                @if($errors->has('accounts_number'))
                                    <strong class="text-danger">{{ $errors->first('accounts_number') }}</strong>
                                @endif
                            <small id="accounts_number" style="color:gray;"> 4 - 10  Numbers Only Accepted </small>
                            </div>
                            @elseif($account->accounts_number == null)
                            <div class="col-md-3 mb-3">
                                <label for="accounts_number">Account Number<span style="color:red"> *</span></label>
                                <input type="text" maxlength="10" pattern="\d{4-10}" class="form-control form-control-sm @error('accounts_number') is-invalid @enderror" id="accounts_number" name="accounts_number" readonly>
                                @if($errors->has('accounts_number'))
                                    <strong class="text-danger">{{ $errors->first('accounts_number') }}</strong>
                                @endif
                            <small id="accounts_number" style="color:gray;"> 4 - 10  Numbers Only Accepted </small>
                            </div>
                            @endif
                            <div class="col-md-3 mb-3">
                                <label for="accounts_company">Company Name<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_company') is-invalid @enderror" id="accounts_company" name="accounts_company" value="{{ $account->accounts_company }}">
                                @if($errors->has('accounts_company'))
                                <strong class="text-danger">{{ $errors->first('accounts_company') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="accounts_cnic">Accounts Cnic<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_cnic') is-invalid @enderror" id="accounts_cnic" name="accounts_cnic" value="{{ $account->accounts_cnic }}" required>
                                @if($errors->has('accounts_cnic'))
                                <strong class="text-danger">{{ $errors->first('accounts_cnic') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="accounts_fname">First Name<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_fname') is-invalid @enderror" id="accounts_fname" name="accounts_fname" value="{{ $account->accounts_fname }}" required>
                                @if($errors->has('accounts_fname'))
                                <strong class="text-danger">{{ $errors->first('accounts_fname') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="accounts_lname">Last Name<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_lname') is-invalid @enderror" id="accounts_lname" name="accounts_lname" value="{{ $account->accounts_lname }}" required>
                                @if($errors->has('accounts_lname'))
                                <strong class="text-danger">{{ $errors->first('accounts_lname') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="accounts_email">Email Address<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_email') is-invalid @enderror" id="accounts_email" name="accounts_email" value="{{ $account->accounts_email }}" required>
                                @if($errors->has('accounts_email'))
                                <strong class="text-danger">{{ $errors->first('accounts_email') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="accounts_username">User Name<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_username') is-invalid @enderror" id="accounts_username" name="accounts_username" value="{{ $account->accounts_username }}" required>
                                @if($errors->has('accounts_username'))
                                <strong class="text-danger">{{ $errors->first('accounts_username') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="accounts_address1">Address Line 1<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_address1') is-invalid @enderror" id="accounts_address1" name="accounts_address1" value="{{ $account->accounts_address1 }}" required>
                                @if($errors->has('accounts_address1'))
                                <strong class="text-danger">{{ $errors->first('accounts_address1') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="accounts_address2">Address Line 2<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_address2') is-invalid @enderror" id="accounts_address2" name="accounts_address2" value="{{ $account->accounts_address2 }}" >
                                @if($errors->has('accounts_address2'))
                                <strong class="text-danger">{{ $errors->first('accounts_address2') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="accounts_address3">Address Line 3<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_address3') is-invalid @enderror" id="accounts_address3" name="accounts_address3" value="{{ $account->accounts_address3 }}" >
                                @if($errors->has('accounts_address3'))
                                <strong class="text-danger">{{ $errors->first('accounts_address3') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="city_name">City Name<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('city_name') is-invalid @enderror" id="city_name" name="city_name" value="{{ $account->city_name }}" required>
                                @if($errors->has('city_name'))
                                <strong class="text-danger">{{ $errors->first('city_name') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip_code">Zip Code<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{ $account->zip_code }}" required>
                                @if($errors->has('zip_code'))
                                <strong class="text-danger">{{ $errors->first('zip_code') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="state_name">Zip Code<span style="color:red"> *</span></label>
                                <input type="text" class="form-control form-control-sm @error('state_name') is-invalid @enderror" id="state_name" name="state_name" value="{{ $account->state_name }}" required>
                                @if($errors->has('state_name'))
                                <strong class="text-danger">{{ $errors->first('state_name') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="country_name">Country Name <span style="color:red"> *</span></label>
                                <select class="form-control form-control-sm @error('country_name') is-invalid @enderror" id="country_name" name="country_name" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->country_name }}"@if($country->country_name == $account->country_name){{ 'selected' }}@endif>{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="accounts_phone">Accounts Phone<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_phone') is-invalid @enderror" id="accounts_phone" name="accounts_phone" value="{{ $account->accounts_phone }}" >
                                @if($errors->has('accounts_phone'))
                                <strong class="text-danger">{{ $errors->first('accounts_phone') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="accounts_mobile">Accounts Mobile<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('accounts_mobile') is-invalid @enderror" id="accounts_mobile" name="accounts_mobile" value="{{ $account->accounts_mobile }}" >
                                @if($errors->has('accounts_mobile'))
                                <strong class="text-danger">{{ $errors->first('accounts_mobile') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="ntn_number">NTN Number<span style="color:red"> </span></label>
                                <input type="text" class="form-control form-control-sm @error('ntn_number') is-invalid @enderror" id="ntn_number" name="ntn_number" value="{{ $account->ntn_number }}" >
                                @if($errors->has('ntn_number'))
                                <strong class="text-danger">{{ $errors->first('ntn_number') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="password_option">Password Option<span style="color:red"> *</span></label>
                                <select name="password_option" class="form-control form-control-sm @error('password_option') is-invalid @enderror" id="password_option" required>
                                    <option value="">Select Password Option</option>
                                    <option value="1">Change Password</option>
                                    <option value="0">Dont Change Password</option>
                                    @if($errors->has('password_option'))
                                    <strong class="text-danger">{{ $errors->first('password_option') }}</strong>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="password">New Password<span style="color:red"> </span></label>
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" autocomplete="password" autofocus disabled>
                                @if($errors->has('password'))
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="password-confirm">Confirm Password<span style="color:red"> </span></label>
                                <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" disabled>
                                @if($errors->has('password-confirm'))
                                <strong class="text-danger">{{ $errors->first('password-confirm') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="accounts_status">Account Status<span style="color:red"> *</span></label>
                                <select name="accounts_status" class="form-control form-control-sm @error('accounts_status') is-invalid @enderror" id="accounts_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1"@if($account->accounts_status == 1){{ 'selected' }}@endif>Active</option>
                                    <option value="0"@if($account->accounts_status == 0){{ 'selected' }}@endif>Deactivate</option>
                                    @if($errors->has('accounts_status'))
                                    <strong class="text-danger">{{ $errors->first('accounts_status') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_account" id="submit_account" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('accounts.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
        $('#account_code').keyup(function(){
        var account_code = $(this).val();
        var id_lenght= account_code.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.accounts')}}",
        data: {'account_code':account_code},
        dataType: 'json',
        success : function(data) {
        if(data.account_code)
             {
                 $('#presentreg').html('Opss.!..Account Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Account Code is Available.');
                $('#presentreg').html('');
            }
        },
        error: function(response) {
            alert(response.responseJSON.message);
                }
            });
        }
    });

    $('#station_code').change(function(){
    var station_code = $(this).val();
    var id_lenght= station_code.toString().length;
    if(id_lenght){
    $.ajax({
    type: "POST",
    url: "{{route('get.stations')}}",
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
    url: "{{route('get.accountserials')}}",
    data: {'payment_term':payment_term},
    dataType: 'json',
    success : function(data) {
    if(data)
         {
            $('#accounts_number').val(data);
         }
    },
    error: function(response) {
        alert(response.responseJSON.message);
                }
            });
        }
    });



    $('#accounts_type').change(function(){
        var val = $(this).val();
        if(val == '1')
        {
            $('#accounts_company').prop('disabled',false);
            $('#accounts_company').prop('required',true);
            $('#accounts_company').val('');
        }else{
            $('#accounts_company').prop('disabled',true);
            $('#accounts_company').prop('required',false);
            $('#accounts_company').val('');
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

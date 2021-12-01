@extends('layouts.layout_login')

@section('content')
<div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(dist/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="action-form col-5" style="background-color: rgba(0,0,0,0.5);">
                <div>
                    <div class="logo m-l-5 align-items-center">
                        <!--<span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>-->
                        <h3 class="text-white m-l-5 align-items-center font-medium m-b-20">Cheena Mobile Directory</h3>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row ">
                                    <label for="accounts_fname" class="text-white col-4 col-form-label text-sm-center">{{ __('First Name') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="accounts_fname" type="text"  class="form-control form-control-sm @error('accounts_fname') is-invalid @enderror" name="accounts_fname" value="{{ old('accounts_fname') }}" placeholder="" required autocomplete="accounts_fname" autofocus>

                                        @error('accounts_fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="accounts_lname" class="text-white col-4 col-form-label text-sm-center">{{ __('Last Name') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="accounts_lname" type="text"  class="form-control form-control-sm @error('accounts_lname') is-invalid @enderror" name="accounts_lname" value="{{ old('accounts_lname') }}" placeholder="" required autocomplete="accounts_lname" autofocus>

                                        @error('accounts_lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="accounts_cnic" class="text-white col-4 col-form-label text-sm-center">{{ __('CNIC No.') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="accounts_cnic" type="text" maxlength="13" pattern="\d{13}" class="form-control form-control-sm @error('accounts_cnic') is-invalid @enderror" name="accounts_cnic" value="{{ old('accounts_cnic') }}" placeholder="Numbers Only Like 3810123456789" required autocomplete="accounts_cnic" autofocus>

                                        @error('accounts_cnic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="accounts_username" class="text-white col-4 col-form-label text-sm-center">{{ __('Username.') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="accounts_username" type="text" minlength="8" maxlength="13" class="form-control form-control-sm @error('accounts_username') is-invalid @enderror" name="accounts_username" value="{{ old('accounts_username') }}" placeholder="your username" required autocomplete="accounts_username" autofocus>

                                        @error('accounts_username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="accounts_phone" class="text-white col-4 col-form-label text-sm-center">{{ __('Phone No.') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="accounts_phone" type="text" minlength="9" maxlength="12" pattern="\d{9-12}" class="form-control form-control-sm @error('accounts_phone') is-invalid @enderror" name="accounts_phone" value="{{ old('accounts_phone') }}" placeholder="Numbers Only Like 0511234567" required autocomplete="accounts_phone" autofocus>

                                        @error('accounts_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="accounts_mobile" class="text-white col-4 col-form-label text-sm-center">{{ __('Mobile No.') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="accounts_mobile" type="text" minlength="11" maxlength="11" pattern="\d{11}" class="form-control form-control-sm @error('accounts_mobile') is-invalid @enderror" name="accounts_mobile" value="{{ old('accounts_mobile') }}" placeholder="11 Digits Only Like 03211234567" required autocomplete="accounts_mobile" autofocus>

                                        @error('accounts_mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="accounts_email" class="text-white col-4 col-form-label text-sm-center">{{ __('Acc Email') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="accounts_email" type="email" class="form-control form-control-sm @error('accounts_email') is-invalid @enderror" name="accounts_email" value="{{ old('accounts_email') }}" placeholder="Must Be Correct Email Address" required autocomplete="accounts_email" autofocus>
                                        @error('accounts_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="password" class="text-white col-4 col-form-label text-sm-center">{{ __('Password') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="password" type="password" minlength="8" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Minimum Required 8 Charactors" required autocomplete="password" autofocus>

                                        @error('accounts_username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="password-confirm" class="text-white col-4 col-form-label text-sm-center">{{ __('Re-type') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">

                                        <input id="password-confirm" type="password" minlength="8" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="Confirm Password (Matched)">

                                        @error('accounts_username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label for="accounts_agreement" class="text-white col-4 col-form-label text-sm-center">{{ __('Agreement') }}<span style="color:red"> *</span></label>

                                    <div class="col-1 ">

                                        <input id="accounts_agreement" type="checkbox" class="form-control form-control-sm @error('accounts_agreement') is-invalid @enderror" name="accounts_agreement" value="1" placeholder="Must Be Correct accounts_email Address" required autocomplete="accounts_agreement" required>
                                        @error('accounts_agreement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                        <small for="shipment_apx_terms text-white" style="color:white;">Agreed to Cheena Mobile Directory Terms & Conditions.</small>
                                </div>

                               <!-- <div class="form-group row">
                                    <label for="accounts_agreement" class="text-white col-4 col-form-label text-sm-center">{{ __('Terms & Cond.') }}<span style="color:red"> *</span></label>

                                    <div class="col-8 ">
                                        <select name="accounts_agreement" class="form-control form-control-sm" id="accounts_agreement" required>
                                            <option value="">Select Terms & Conditions</option>
                                            <option value="1">I am Agreed to APX Terms & Condistions</option>
                                        </select>
                                    </div>
                                        @error('accounts_agreement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>-->
                                <div class="form-group row">
                                    <input id="created_by" type="hidden" class="form-control form-control-sm @error('created_by') is-invalid @enderror" name="created_by" value="{{ ('Web Registration') }}" >
                              
                                    <input id="accounts_status" type="hidden" class="form-control form-control-sm @error('accounts_status') is-invalid @enderror" name="accounts_status" value="{{ ('0') }}" >
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-sm btn-info " type="submit ">SIGN UP</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center"  style="color:white;">
                                        Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5 "><b>Sign In</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
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

$('#accounts_type').change(function(){
        var val = $(this).val();
        if(val === '1')
        {
            $('#accounts_company').prop('required',true);
            $('#accounts_company').val('');
            document.getElementById("company").style.visibility="visible";
        }else{
            $('#accounts_company').prop('required',false);
            $('#accounts_company').val('APX Logistics');
            document.getElementById("company").style.visibility="hidden";
        }
    });
</script>
@endsection
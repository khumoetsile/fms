@extends('layouts.layout')

@section('title')
Add Company
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Company</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('companies.index') }}">Company</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Company</li>
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
                    <h4 class="card-title">Add Company</h4>
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

                    <form class="form-single-submit" action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_reg_date">Company Reg Date <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="date" class="form-control" id="company_reg_date" name="company_reg_date" value="{{ old('company_reg_date') }}" placeholder="Enter Company Reg Date..."required>
                                @if($errors->has('company_reg_date'))
                                <strong class="text-danger">{{ $errors->first('company_reg_date') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_code">Company Code<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" value="{{ old('company_code') }}" id="company_code" name="company_code" placeholder="Enter Company code..." required>
                                @if($errors->has('company_code'))
                                <strong class="text-danger">{{ $errors->first('company_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_name">Company Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" value="{{ old('company_name') }}" id="company_name" name="company_name" placeholder="Enter Company name..." required>
                                @if($errors->has('company_name'))
                                <strong class="text-danger">{{ $errors->first('company_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_slogan">Company Slogan <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" id="company_slogan" name="company_slogan" value="{{ old('company_slogan') }}" placeholder="Enter Company Slogan...">
                                @if($errors->has('company_slogan'))
                                <strong class="text-danger">{{ $errors->first('company_slogan') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_address">Company Address <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea class="form-control" rows="4" id="company_address" name="company_address" value="{{ old('company_address') }}" placeholder="Enter Company Address..." required></textarea>
                                @if($errors->has('company_address'))
                                <strong class="text-danger">{{ $errors->first('company_address') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="area_name">Area Name <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text"  class="form-control" id="area_name" name="area_name" value="{{ old('area_name') }}" placeholder="Enter Area Name...">
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
                                <input type="number" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" placeholder="Enter Zip Code...">
                                @if($errors->has('zip_code'))
                                <strong class="text-danger">{{ $errors->first('zip_code') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="country_id">Country Name  <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="country_id" value="{{ old('country_id') }}" class="form-control" id="country_id" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                    @if($errors->has('country_id'))
                                    <strong class="text-danger">{{ $errors->first('country_id') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="state_id">State Name  <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="state_id" value="{{ old('state_id') }}" class="form-control" id="state_id" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="city_id">City Name  <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="city_id" value="{{ old('city_id') }}" class="form-control" id="city_id" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_phone">Company Phone <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="10" class="form-control" id="company_phone" name="company_phone" value="{{ old('company_phone') }}" placeholder="Enter Company Phone...">
                                @if($errors->has('company_phone'))
                                <strong class="text-danger">{{ $errors->first('company_phone') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_phone2">Company Phone 2 <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="10" class="form-control" id="company_phone2" name="company_phone2" value="{{ old('company_phone2') }}" placeholder="Enter Company Phone 2...">
                                @if($errors->has('company_phone2'))
                                <strong class="text-danger">{{ $errors->first('company_phone2') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_mobile">Company Mobile <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="11" class="form-control" id="company_mobile" value="{{ old('company_mobile') }}" name="company_mobile" placeholder="Enter Company Mobile..." required>
                                @if($errors->has('company_mobile'))
                                <strong class="text-danger">{{ $errors->first('company_mobile') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_fax">Company Mobile 2 <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="11" class="form-control" id="company_fax" name="company_fax" value="{{ old('company_fax') }}" placeholder="Enter Company Mobile 2...">
                                @if($errors->has('company_fax'))
                                <strong class="text-danger">{{ $errors->first('company_fax') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_email">Company Email  <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="email" class="form-control" id="company_email" name="company_email" value="{{ old('company_email') }}" placeholder="Enter Company Email...">
                                @if($errors->has('company_email'))
                                <strong class="text-danger">{{ $errors->first('company_email') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_web">Company Website  <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" id="company_web" name="company_web" value="{{ old('company_web') }}" placeholder="Enter Company Website...">
                                @if($errors->has('company_web'))
                                <strong class="text-danger">{{ $errors->first('company_web') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_image">Company logo <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control" id="company_image" name="company_image" value="{{ old('company_image') }}" placeholder="Enter Company logo...">
                                @if($errors->has('company_image'))
                                <strong class="text-danger">{{ $errors->first('company_image') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="company_status">Company Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="company_status" class="form-control" id="company_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                                @if($errors->has('company_status'))
                                    <strong class="text-danger">{{ $errors->first('company_status') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_companies" id="submit_companies" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('companies.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
                    $("#state_id").append('<option value="'+key+'">'+value+'</option>');
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

                    $("#city_id").append('<option value="'+key+'">'+value+'</option>');
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

        $('#company_code').keyup(function(){
        var company_code = $(this).val();
        var id_lenght= company_code.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.companies')}}",
        data: {'company_code':company_code},
        dataType: 'json',
        success : function(data) {
        if(data.company_code)
             {
                 $('#presentreg').html('Opss.!..Company Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Company Code is Available.');
                $('#presentreg').html('');
            }
        },
        error: function(response) {
            alert(response.responseJSON.message);
                }
            });
        }
    });

    $('#company_name').keyup(function(){
        var company_name = $(this).val();
        var id_lenght= company_name.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('get.companies')}}",
        data: {'company_name':company_name},
        dataType: 'json',
        success : function(data) {
        if(data.company_name)
             {
                 $('#presentreg').html('Opss.!..Company Name Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Company Name is Available.');
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

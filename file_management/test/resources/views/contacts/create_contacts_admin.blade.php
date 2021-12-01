@extends('layouts.layout')

@section('title')
Add Contact
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Contact</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('contacts.index') }}">Contact</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Contact</li>
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
                    <h4 class="card-title">Add Contact</h4>
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

                    <form class="form-single-submit" action="{{ route('contacts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_reg_date">Contact Reg Date <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="date" class="form-control" id="contact_reg_date" name="contact_reg_date" value="{{ old('contact_reg_date') }}" placeholder="Enter Contact Reg Date..."required>
                                @if($errors->has('contact_reg_date'))
                                <strong class="text-danger">{{ $errors->first('contact_reg_date') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_code">Contact Code<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" value="{{	$member }}" id="contact_code" name="contact_code" placeholder="Enter Contact code..." required readonly>
                                @if($errors->has('contact_code'))
                                <strong class="text-danger">{{ $errors->first('contact_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_name">Contact Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" value="{{ old('contact_name') }}" id="contact_name" name="contact_name" placeholder="Enter Contact name..." required>
                                @if($errors->has('contact_name'))
                                <strong class="text-danger">{{ $errors->first('contact_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_slogan">Contact Slogan <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_slogan" name="contact_slogan" value="{{ old('contact_slogan') }}" placeholder="Enter Contact Slogan...">
                                @if($errors->has('contact_slogan'))
                                <strong class="text-danger">{{ $errors->first('contact_slogan') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_address1">Contact Address1 <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_address1" name="contact_address1" value="{{ old('contact_address1') }}" placeholder="Enter Contact Address1..." required>
                                @if($errors->has('contact_address1'))
                                <strong class="text-danger">{{ $errors->first('contact_address1') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_address2">Contact Address2 <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_address2" name="contact_address2" value="{{ old('contact_address2') }}" placeholder="Enter Contact Address2...">
                                @if($errors->has('contact_address2'))
                                <strong class="text-danger">{{ $errors->first('contact_address2') }}</strong>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="country_name">Country Name  <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="country_name" value="{{ old('country_name') }}" class="form-control" id="country_name" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                    @if($errors->has('country_name'))
                                    <strong class="text-danger">{{ $errors->first('country_name') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="state_name">State Name  <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="state_name" value="{{ old('state_name') }}" class="form-control" id="state_name" required>
                                    
                                </select>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="col-md-2">
                                <label for="city_name">City Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" value="{{ old('city_name') }}" id="city_name" name="city_name" placeholder="Enter City name..." required>
                                @if($errors->has('city_name'))
                                <strong class="text-danger">{{ $errors->first('city_name') }}</strong>
                                @endif
                            </div>
                        </div>
                      <!--
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="city_name">City Name  <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="city_name" value="{{ old('city_name') }}" class="form-control" id="city_name">
                                </select>
                            </div>
                        </div>
                       -->
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_mobile">Contact Mobile <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" maxlength="11" class="form-control" id="contact_mobile" value="{{ old('contact_mobile') }}" name="contact_mobile" placeholder="Enter Contact Mobile..." required>
                                @if($errors->has('contact_mobile'))
                                <strong class="text-danger">{{ $errors->first('contact_mobile') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_email">Contact Email  <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ old('contact_email') }}" placeholder="Enter Contact Email...">
                                @if($errors->has('contact_email'))
                                <strong class="text-danger">{{ $errors->first('contact_email') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_image">Contact logo <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control" id="contact_image" name="contact_image" value="{{ old('contact_image') }}" placeholder="Enter Contact logo...">
                                @if($errors->has('contact_image'))
                                <strong class="text-danger">{{ $errors->first('contact_image') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_status">Contact Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="contact_status" class="form-control" id="contact_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                                @if($errors->has('contact_status'))
                                    <strong class="text-danger">{{ $errors->first('contact_status') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_contacts" id="submit_contacts" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('contacts.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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

        $('#country_name').change(function(){
            var id = $(this).val();
             $.ajax({
            type: "POST",
            url: "{{route('get.states')}}",
            data: {'id':id},
            dataType: 'json',
            success : function(data) {
                if(data){
                $("#state_name").empty();
                $.each(data,function(key,value){
                    $("#state_name").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state_name").empty();
            }
            },
            error: function(response) {
                alert(response.responseJSON.message);
                }
            });
        });

        $('#contact_code').keyup(function(){
        var contact_code = $(this).val();
        var id_lenght= contact_code.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.contacts')}}",
        data: {'contact_code':contact_code},
        dataType: 'json',
        success : function(data) {
        if(data.contact_code)
             {
                 $('#presentreg').html('Opss.!..Contact Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Contact Code is Available.');
                $('#presentreg').html('');
            }
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
    });
    }
    });

    $('#contact_name').keyup(function(){
        var contact_name = $(this).val();
        var id_lenght= contact_name.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('get.contacts')}}",
        data: {'contact_name':contact_name},
        dataType: 'json',
        success : function(data) {
        if(data.contact_name)
             {
                 $('#presentreg').html('Opss.!..Contact Name Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Contact Name is Available.');
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

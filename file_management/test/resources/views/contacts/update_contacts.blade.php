@extends('layouts.layout_front')

@section('title')
Edit Contact
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Contact</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">Edit Contact</li>
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
                    <h4 class="card-title">Edit Contact</h4>
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

                    <form class="form-single-submit" action="{{ route('contacts.update', $contact->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_reg_date">Contact Reg Date<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="date" class="form-control" id="contact_reg_date" name="contact_reg_date" value="{{ $contact->contact_reg_date }}" required>
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
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_code" name="contact_code" value="{{ $contact->contact_code }}" required>
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
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_name" name="contact_name" value="{{ $contact->contact_name }}" required>
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
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_slogan" name="contact_slogan" value="{{ $contact->contact_slogan }}">
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
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_address1" name="contact_address1" value="{{ $contact->contact_address1 }}" required>
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
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_address2" name="contact_address2" value="{{ $contact->contact_address2 }}">
                                @if($errors->has('contact_address2'))
                                <strong class="text-danger">{{ $errors->first('contact_address2') }}</strong>
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
                                        <option value="{{ $country->country_id }}"@if($country->country_id == $contact->country_id){{ 'selected' }}@endif>{{ $country->country_name }}</option>
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
                                        <option value="{{ $state->state_id }}"@if($state->state_id == $contact->state_id){{ 'selected' }}@endif>{{ $state->state_name }}</option>
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
                                    <option value="{{ $city->city_id }}"@if($city->city_id == $contact->city_id){{ 'selected' }}@endif>{{ $city->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_mobile">Contact Mobile <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input maxlength="11" type="text" class="form-control" id="contact_mobile" name="contact_mobile" value="{{ $contact->contact_mobile }}" required>
                                @if($errors->has('contact_mobile'))
                                <strong class="text-danger">{{ $errors->first('contact_mobile') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_email">Contact Email <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" style="text-transform:uppercase" class="form-control" id="contact_email" name="contact_email" value="{{ $contact->contact_email }}">
                                @if($errors->has('contact_email'))
                                <strong class="text-danger">{{ $errors->first('contact_email') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="contact_image">Contact Image <span style="color:red"></span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="file" class="form-control" id="contact_image" name="contact_image" value="{{ $contact->contact_image }}">
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
                                    <option value="1"@if($contact->contact_status == 1){{ 'selected' }}@endif>Active</option>
                                    <option value="0"@if($contact->contact_status == 0){{ 'selected' }}@endif>Disabled</option>
                                    @if($errors->has('contact_status'))
                                    <strong class="text-danger">{{ $errors->first('contact_status') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_contact" id="submit_contact" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('contacts.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
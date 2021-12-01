@extends('layouts.layout')

@section('title')
Edit City
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit City</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('cities.index') }}">City</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit City</li>
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
                    <h4 class="card-title">Edit City</h4>
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

                    <form class="form-single-submit" action="{{ route('cities.update', $city->city_id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="country_id">Country Name <span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="country_id" name="country_id" required>
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->country_id }}"@if($country->country_id == $city->country_id){{ 'selected' }}@endif>{{ $country->country_name }}</option>
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
                                        <option value="{{ $state->state_id }}"@if($state->state_id == $city->state_id){{ 'selected' }}@endif>{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="city_name">City Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" id="city_name" name="city_name" value="{{ $city->city_name }}" required>
                                @if($errors->has('city_name'))
                                <strong class="text-danger">{{ $errors->first('city_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="city_status">City Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="city_status" class="form-control" id="city_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1"@if($city->city_status == 1){{ 'selected' }}@endif>Active</option>
                                    <option value="0"@if($city->city_status == 0){{ 'selected' }}@endif>Disabled</option>
                                    @if($errors->has('city_status'))
                                    <strong class="text-danger">{{ $errors->first('city_status') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_city" id="submit_city" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('cities.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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

        $('#city_name').keyup(function(){
        var city_name = $(this).val();
        var id_lenght= city_name.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.cities')}}",
        data: {'city_name':city_name},
        dataType: 'json',
        success : function(data) {
        if(data.city_name)
             {
                 $('#presentreg').html('Opss.!..City Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..City Code is Available.');
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
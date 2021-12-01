@extends('layouts.layout')

@section('title')
Add Office
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Office</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('offices.index') }}">Office</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Office</li>
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
                    <h4 class="card-title">Add Office</h4>
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

                    <form class="form-single-submit" action="{{ route('offices.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="office_code">Office Code<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('office_code') is-invalid @enderror" value="{{ old('office_code') }}" id="office_code" name="office_code" placeholder="Enter Office code..." required>
                                @if($errors->has('office_code'))
                                <strong class="text-danger">{{ $errors->first('office_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="office_name">Office Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('office_name') is-invalid @enderror" value="{{ old('office_name') }}" id="office_name" name="office_name" placeholder="Enter Office name..." required>
                                @if($errors->has('office_name'))
                                <strong class="text-danger">{{ $errors->first('office_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="building_name">Building<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                 <select name="building_name" value="{{ old('building_name') }}" class="form-control" id="building_name" required>
                                    <option value="">Select Building</option>
                                    @foreach ($buildings as $building)
                                    <option value="{{ $building->building_name }}">{{ $building->building_name }}</option>
                                    @endforeach
                                    @if($errors->has('building_name'))
                                    <strong class="text-danger">{{ $errors->first('building_name') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="office_status">Office Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="office_status" class="form-control form-control-sm @error('office_status') is-invalid @enderror" id="office_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                                @if($errors->has('office_status'))
                                    <strong class="text-danger">{{ $errors->first('office_status') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_offices" id="submit_offices" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('offices.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
        $('#office_code').keyup(function(){
        var office_code = $(this).val();
        var id_lenght= office_code.toString().length;
        $.ajax({
        type: "POST",
        url: "{{route('check.offices')}}",
        data: {'office_code':office_code},
        dataType: 'json',
        success : function(data) {
        if(data.office_code)
             {
                 $('#presentreg').html('Opss.!..Office Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Office Code is Available.');
                $('#presentreg').html('');
            }
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
    });
    });
    </script>
    @endsection

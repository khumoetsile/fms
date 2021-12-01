@extends('layouts.layout')

@section('title')
Edit Master
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Master</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('masters.index') }}">Master</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Master</li>
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
                    <h4 class="card-title">Edit Master</h4>
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

                    <form class="form-single-submit" action="{{ route('masters.update', $master->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="master_code">Master Code<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('master_code') is-invalid @enderror" id="master_code" name="master_code" value="{{ $master->master_code }}" required>
                                @if($errors->has('master_code'))
                                <strong class="text-danger">{{ $errors->first('master_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="master_name">Master Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('master_name') is-invalid @enderror" id="master_name" name="master_name" value="{{ $master->master_name }}" required>
                                @if($errors->has('master_name'))
                                <strong class="text-danger">{{ $errors->first('master_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="master_status">Master Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="master_status" class="form-control form-control-sm @error('master_status') is-invalid @enderror" id="master_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1"@if($master->master_status == 1){{ 'selected' }}@endif>Active</option>
                                    <option value="0"@if($master->master_status == 0){{ 'selected' }}@endif>Disabled</option>
                                    @if($errors->has('master_status'))
                                    <strong class="text-danger">{{ $errors->first('master_status') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_master" id="submit_master" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('masters.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
        $('#master_code').keyup(function(){
        var master_code = $(this).val();
        var id_lenght= master_code.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.masters')}}",
        data: {'master_code':master_code},
        dataType: 'json',
        success : function(data) {
        if(data.master_code)
             {
                 $('#presentreg').html('Opss.!..Master Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Master Code is Available.');
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

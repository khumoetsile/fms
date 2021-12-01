@extends('layouts.layout')

@section('title')
Edit DocumentType
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit DocumentType</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('documenttypes.index') }}">DocumentType</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit DocumentType</li>
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
                    <h4 class="card-title">Edit DocumentType</h4>
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

                    <form class="form-single-submit" action="{{ route('documenttypes.update', $documenttype->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="documenttype_code">DocumentType Code<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" maxlength="254" class="form-control form-control-sm @error('documenttype_code') is-invalid @enderror" id="documenttype_code" name="documenttype_code" value="{{ $documenttype->documenttype_code }}" required>
                                @if($errors->has('documenttype_code'))
                                <strong class="text-danger">{{ $errors->first('documenttype_code') }}</strong>
                                @endif
                                <small id="presentreg" style="color:red;"></small>
                                <small id="absentreg" style="color:green;"></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="documenttype_name">DocumentType Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" style="text-transform:uppercase" maxlength="254" class="form-control form-control-sm @error('documenttype_name') is-invalid @enderror" id="documenttype_name" name="documenttype_name" value="{{ $documenttype->documenttype_name }}" required>
                                @if($errors->has('documenttype_name'))
                                <strong class="text-danger">{{ $errors->first('documenttype_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="documenttype_status">DocumentType Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="documenttype_status" class="form-control form-control-sm @error('documenttype_status') is-invalid @enderror" id="documenttype_status" required>
                                    <option value="">Select Status</option>
                                    <option value="1"@if($documenttype->documenttype_status == 1){{ 'selected' }}@endif>Active</option>
                                    <option value="0"@if($documenttype->documenttype_status == 0){{ 'selected' }}@endif>Disabled</option>
                                    @if($errors->has('documenttype_status'))
                                    <strong class="text-danger">{{ $errors->first('documenttype_status') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_documenttype" id="submit_documenttype" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('documenttypes.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
        $('#documenttype_code').keyup(function(){
        var documenttype_code = $(this).val();
        var id_lenght= documenttype_code.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.documenttypes')}}",
        data: {'documenttype_code':documenttype_code},
        dataType: 'json',
        success : function(data) {
        if(data.documenttype_code)
             {
                 $('#presentreg').html('Opss.!..DocumentType Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..DocumentType Code is Available.');
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

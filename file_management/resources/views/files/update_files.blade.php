@extends('layouts.layout')

@section('title')
Edit File
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit File</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('files.index') }}">File</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit File</li>
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
                    <h4 class="card-title">Edit File</h4>
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

                    <form class="form-single-submit" action="{{ route('files.update', $file->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="reference_no">Tracking No<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                   <input type="text" maxlength="254" class="form-control form-control-sm @error('reference_no') is-invalid @enderror" id="reference_no" name="reference_no" value="{{ $file->reference_no }}" readonly>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="category">Document Type<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                   <input type="text" maxlength="254" class="form-control form-control-sm @error('category') is-invalid @enderror" id="category" name="category" value="{{ $file->category }}" readonly>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="file_description">Details<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                   <input type="text" maxlength="254" class="form-control form-control-sm @error('file_description') is-invalid @enderror" id="file_description" name="file_description" value="{{ $file->file_description }}" readonly>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="from">From<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('from') is-invalid @enderror" id="from" name="from" value="{{ $file->from }}" readonly>
                                @if($errors->has('from'))
                                <strong class="text-danger">{{ $errors->first('from') }}</strong>
                                @endif
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="reciever">Route To<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="reciever" value="{{ old('reciever') }}" class="form-control" id="reciever" required>
                                     <option value="">Recieving Office</option>
                                    @foreach ($offices as $office)
                                    <option value="{{ $office->office_name }}">{{ $office->office_name }}</option>
                                    @endforeach
                                    @if($errors->has('reciever'))
                                    <strong class="text-danger">{{ $errors->first('reciever') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="personnel">Personnel<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="personnel" name="personnel" required>
                                    </select>
                                </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="route_purpose">Route Purpose <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('route_purpose') is-invalid @enderror" id="route_purpose" name="route_purpose" value="{{ $file->route_purpose }}" required>
                                @if($errors->has('route_purpose'))
                                <strong class="text-danger">{{ $errors->first('route_purpose') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_file" id="submit_file" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('files.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
         $('#reciever').change(function(){
        var office_name = $(this).val();
        $.ajax({
        type: "POST",
        url: "{{route('get.office_users')}}",
        data: {'office_name':office_name},
        dataType: 'json',
        success : function(data) {
                $("#personnel").empty();
                $.each(data,function(key,value){
                    $("#personnel").append('<option value="'+value+'">'+value+'</option>');
                });
                },
        error: function(response) {
            alert(response.responseJSON.message);
        }
    });
    });
    </script>
    @endsection

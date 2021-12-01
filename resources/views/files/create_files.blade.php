@extends('layouts.layout')

@section('title')
Add File
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add File</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">Add File</li>
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
                    <h4 class="card-title">Add File</h4>
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

                    <form class="form-single-submit" action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="file_name">File Name <span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('file_name') is-invalid @enderror" id="file_name" name="file_name">
                                @if($errors->has('file_name'))
                                <strong class="text-danger">{{ $errors->first('file_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="reference_no">Reference No.<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('reference_no') is-invalid @enderror" value="{{ $reference_no }}" id="reference_no" name="reference_no">
                                @if($errors->has('reference_no'))
                                <strong class="text-danger">{{ $errors->first('reference_no') }}</strong>
                                @endif
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-3">
                                <label for="volume_no">Volume No.<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('volume_no') is-invalid @enderror" id="volume_no" name="volume_no">
                                @if($errors->has('volume_no'))
                                <strong class="text-danger">{{ $errors->first('volume_no') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="master_name">Master List<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="master_name" value="{{ old('master_name') }}" class="form-control" id="master_name" required>
                                    <option value="">Select Master</option>
                                    @foreach ($masters as $master)
                                    <option value="{{ $master->master_name }}">{{ $master->master_name }}</option>
                                    @endforeach
                                    @if($errors->has('master_name'))
                                    <strong class="text-danger">{{ $errors->first('master_name') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="category">File Type<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="category" value="{{ old('category') }}" class="form-control" id="category" required>
                                    <option value="">Select File Type</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                    @endforeach
                                    @if($errors->has('category'))
                                    <strong class="text-danger">{{ $errors->first('category') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-3">
                                <label for="classification">Classification<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="classification" value="{{ old('classification') }}" class="form-control" id="classification" required>
                                    <option value="">Select Classification</option>
                                    @foreach ($classifications as $classification)
                                    <option value="{{ $classification->classification_name }}">{{ $classification->classification_name }}</option>
                                    @endforeach
                                    @if($errors->has('classification'))
                                    <strong class="text-danger">{{ $errors->first('classification') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="file_description">Description<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea rows="4", cols="54" class="form-control form-control-sm @error('file_description') is-invalid @enderror" value="{{ old('file_description') }}" id="file_description" name="file_description" placeholder="Enter Description..." required></textarea>
                                @if($errors->has('file_description'))
                                <strong class="text-danger">{{ $errors->first('file_description') }}</strong>
                                @endif
                            </div>
                        </div>
                        <!--
                         <div class="form-row">
                            <div class="col-md-3">
                                <label for="purpose">Purpose<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea rows="4", cols="54" class="form-control form-control-sm @error('purpose') is-invalid @enderror" value="{{ old('purpose') }}" id="purpose" name="purpose" placeholder="Enter Purpose..." required></textarea>
                                @if($errors->has('purpose'))
                                <strong class="text-danger">{{ $errors->first('purpose') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="reciever">To<span style="color:red"> *</span></label>
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
                            <div class="col-md-3">
                                <label for="personnel">Personnel<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="personnel" value="{{ old('personnel') }}" class="form-control" id="personnel" required>
                                    @if($errors->has('personnel'))
                                    <strong class="text-danger">{{ $errors->first('personnel') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                    -->
                        <hr>
                        <div class="form-row">
                            
                            <div class="col-md-2">
                                <input type="hidden" name="submit_files" id="submit_files" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('files.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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

@extends('layouts.layout')

@section('title')
Release Document
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Release Document</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">Release Document</li>
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

                    <form class="form-single-submit" action="{{ route('release.release_update', $file->id) }}" method="get" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                        	<input type="hidden" value="{{ $file->reference_no}}" name="refs_no" id="submit_file" value="1">
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
                                <label for="from">Document Origin From<span style="color:red"> *</span></label>
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
                                <label for="action_taken">Action Taken<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                 <textarea rows="4", cols="54" class="form-control form-control-sm @error('action_taken') is-invalid @enderror" value="{{ old('action_taken') }}" id="action_taken" name="action_taken" placeholder="Enter Action Taken..." required></textarea>
                                </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="keep_copy">Document Copy<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="keep_copy" class="form-control" id="keep_copy" required>
                                    <option value="">-- Select --</option>
                                    <option value="1"@if($file->keep_copy == 0){{ 'selected' }}@endif>No, I don't have a copy.</option>
                                    <option value="0"@if($file->keep_copy == 1){{ 'selected' }}@endif>Yes, I have a copy</option>
                                    @if($errors->has('keep_copy'))
                                    <strong class="text-danger">{{ $errors->first('keep_copy') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="release_to">Release To<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                   <input type="text" maxlength="254" class="form-control form-control-sm @error('release_to') is-invalid @enderror" id="release_to" Placeholder="Full Name" name="release_to" value="{{ $file->release_to }}">
                                </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="log_book_no">Log Book Number<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                   <input type="text" maxlength="254" class="form-control form-control-sm @error('log_book_no') is-invalid @enderror" id="log_book_no" name="log_book_no" value="{{ $file->log_book_no }}">
                                </div>
                        </div>
                        <div class="form-row">
                        	<small><font color="blue">Neccesary Actions are already taken with this document. This will be released to the person without a DTS Account.</font></small>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_file" id="submit_file" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Forward</button>
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

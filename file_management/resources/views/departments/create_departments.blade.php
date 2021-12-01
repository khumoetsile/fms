@extends('layouts.layout')

@section('title')
Add Department
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Add Department</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('departments.index') }}">Department</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Department</li>
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
                    <h4 class="card-title">Add Department</h4>
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

                    <form class="form-single-submit" action="{{ route('departments.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="department_name">Department Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('department_name') is-invalid @enderror" value="{{ old('department_name') }}" id="department_name" name="department_name" placeholder="Enter Department name..." required>
                                @if($errors->has('department_name'))
                                <strong class="text-danger">{{ $errors->first('department_name') }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="section_name">Section<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                 <select name="section_name" value="{{ old('section_name') }}" class="form-control" id="section_name" required>
                                    <option value="">Select Section</option>
                                    @foreach ($sections as $section)
                                    <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                                    @endforeach
                                    @if($errors->has('section_name'))
                                    <strong class="text-danger">{{ $errors->first('section_name') }}</strong>
                                    @endif
                                </select>
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
                                <label for="office_name">Office<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                 <select name="office_name" value="{{ old('office_name') }}" class="form-control" id="office_name" required>
                                    <option value="">Select Office</option>
                                    @foreach ($offices as $office)
                                    <option value="{{ $office->office_name }}">{{ $office->office_name }}</option>
                                    @endforeach
                                    @if($errors->has('section_name'))
                                    <strong class="text-danger">{{ $errors->first('office_name') }}</strong>
                                    @endif
                                </select>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="col-md-2">
                                <label for="registered_date">Registeration Date<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="date" maxlength="254" class="form-control form-control-sm @error('registered_date') is-invalid @enderror" value="{{ old('registered_date') }}" id="registered_date" name="registered_date" placeholder="Enter Registeration date..." required>
                                @if($errors->has('registered_date'))
                                <strong class="text-danger">{{ $errors->first('registered_date') }}</strong>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_departments" id="submit_departments" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('departments.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
        $('#department_code').keyup(function(){
        var department_code = $(this).val();
        var id_lenght= department_code.toString().length;
        if(id_lenght>3){
        $.ajax({
        type: "POST",
        url: "{{route('check.departments')}}",
        data: {'department_code':department_code},
        dataType: 'json',
        success : function(data) {
        if(data.department_code)
             {
                 $('#presentreg').html('Opss.!..Department Code Already Exist');
                 $('#absentreg').html('');
             }else{

                $('#absentreg').html('Congrats!..Department Code is Available.');
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

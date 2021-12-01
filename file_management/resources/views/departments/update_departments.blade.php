@extends('layouts.layout')

@section('title')
Edit Department
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Department</h4>
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
                            <li class="breadcrumb-item active" aria-current="page">Edit Department</li>
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
                    <h4 class="card-title">Edit Department</h4>
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

                    <form class="form-single-submit" action="{{ route('departments.update', $department->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="department_name">Department Name<span style="color:red"> *</span></label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" maxlength="254" class="form-control form-control-sm @error('department_name') is-invalid @enderror" id="department_name" name="department_name" value="{{ $department->department_name }}" required>
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
                                    <select class="custom-select form-control" id="section_name" name="section_name" required>
                                        <option value="">Select Section</option>
                                        @foreach($sections as $section)
                                        <option value="{{ $section->section_name }}"@if($section->section_name == $department->section_name){{ 'selected' }}@endif>{{ $section->section_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="building_name">Building<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="building_name" name="building_name" required>
                                        <option value="">Select Building</option>
                                        @foreach($buildings as $building)
                                        <option value="{{ $building->building_name }}"@if($building->building_name == $department->building_name){{ 'selected' }}@endif>{{ $building->building_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-2">
                                <label for="office_name">Office<span style="color:red"> *</span></label>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <select class="custom-select form-control" id="office_name" name="office_name" required>
                                        <option value="">Select Office</option>
                                        @foreach($offices as $office)
                                        <option value="{{ $office->office_name }}"@if($office->office_name == $department->office_name){{ 'selected' }}@endif>{{ $office->office_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="submit_department" id="submit_department" value="1">
                                <button type="submit" class="btn btn-block btn-sm btn-info btn-single-submit" >Submit Details</button>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('departments.index') }}" onclick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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

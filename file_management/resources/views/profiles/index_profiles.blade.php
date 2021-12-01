@extends('layouts.layout')

@section('title')
Profiles List
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profiles</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profiles</li>
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
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profiles</h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('profiles.create') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Add Profile</a>
                            </div>
                            <!--
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('profiles.upload_page') }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Upload Profiles</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="#" id="profiles_export" type="button" class="btn btn-block btn-sm btn-success btn-single-submit" role="button">Export Profiles</a>
                            </div>
                            -->
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('profiles.show_deleted') }}" type="button" class="btn btn-block btn-sm btn-danger btn-single-submit" role="button">Deleted Profiles</a>
                            </div>
                        </div>
                        <hr>
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
                        <form id="bulk_delete" action="" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table id="zero_config" class="table nowrap table-striped table-bordered table-sm m-b-0">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="check_all" name=""></th>
                                            <th>S.No</th>
                                            <th>Profile Logo</th>
                                            <th>Profile Reg Date</th>
                                            <th>Profile Code</th>
                                            <th>Profile Name</th>
                                            <th>Profile Slogan</th>
                                            <th>Profile Address1</th>
                                            <th>Profile Address2</th>
                                            <th>Profile Address3</th>
                                            <th>Country Name</th>
                                            <th>State Name</th>
                                            <th>City Name</th>
                                            <th>Area Name</th>
                                            <th>Zip Code</th>
                                            <th>Profile Phone</th>
                                            <th>Profile Phone2</th>
                                            <th>Profile Mobile</th>
                                            <th>Profile Mobile2</th>
                                            <th>Profile Email</th>
                                            <th>Profile status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach($profiles as $profile)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $profile->profile_id }}"></td>
                                            <td>{{ $sno }}</td>
                                            <td>
                                                @if($profile->profile_image)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/'.$profile->profile_image) }}">
                                                        <img src="{{ asset('uploads/'.$profile->profile_image) }}" style="width:125px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($profile->profile_reg_date)) }}</td>
                                            <td>{{ $profile->profile_code }}</td>
                                            <td>{{ $profile->profile_name }}</td>
                                            <td>{{ $profile->profile_slogan }}</td>
                                            <td>{{ $profile->profile_address1 }}</td>
                                            <td>{{ $profile->profile_address2 }}</td>
                                            <td>{{ $profile->profile_address3 }}</td>
                                            <td>{{ $profile->country_name }}</td>
                                            <td>{{ $profile->state_name }}</td>
                                            <td>{{ $profile->city_name }}</td>
                                            <td>{{ $profile->area_name }}</td>
                                            <td>{{ $profile->zip_code }}</td>
                                            <td>{{ $profile->profile_phone }}</td>
                                            <td>{{ $profile->profile_phone2 }}</td>
                                            <td>{{ $profile->profile_mobile }}</td>
                                            <td>{{ $profile->profile_mobile2 }}</td>
                                            <td>{{ $profile->profile_email }}</td>
                                            <td>
                                                @if($profile->profile_status == 1)
                                                {{ 'Active' }}
                                                @elseif($profile->profile_status == 0)
                                                {{ 'Disabled' }}
                                                @endif
                                            </td>
                                            <td>{{ $profile->created_at }}</td>
                                            <td>{{ $profile->updated_at }}</td>

                                            <td>

                                                <a href="{{ route('profiles.show', $profile->profile_id) }}" type="button" class="btn btn-sm btn-info btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i> View</a>

                                                <a href="{{ route('profiles.edit', $profile->profile_id) }}" type="button" class="btn btn-sm btn-warning btn-single-submit" role="button"><i class="fas fa-edit"></i> Edit</a>

                                                <a href="" id="{{ $profile->profile_id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>S.No</th>
                                            <th>Profile Logo</th>
                                            <th>Profile Reg Date</th>
                                            <th>Profile Code</th>
                                            <th>Profile Name</th>
                                            <th>Profile Slogan</th>
                                            <th>Profile Address1</th>
                                            <th>Profile Address2</th>
                                            <th>Profile Address3</th>
                                            <th>Country Name</th>
                                            <th>State Name</th>
                                            <th>City Name</th>
                                            <th>Area Name</th>
                                            <th>Zip Code</th>
                                            <th>Profile Phone</th>
                                            <th>Profile Phone2</th>
                                            <th>Profile Mobile</th>
                                            <th>Profile Mobile2</th>
                                            <th>Profile Email</th>
                                            <th>Profile status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="submit" name="" value="Delete Selected" class="btn-single-submit btn btn-sm btn-danger">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script type="text/javascript">
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

       $('#check_all').change(function(){
        $('.checkItems').prop('checked',$(this).prop('checked'));
    });

    $(document).on('click', '.sa-params', function(e){

        var profile_Id = $(this).attr('id');
        e.preventDefault();

        swal({
            title: 'Are you sure?',
            text: "It will be deleted!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                $.ajax({
                    url: 'profiles/'+profile_Id,
                    type: 'DELETE',
                    data: '',
                    dataType: 'json'
                })
                .done(function(response){
                    swal('Deleted!', response.message);
                            // $(this).closest('tr').hide();
                            location.reload();
                        })
                .fail(function(){
                    swal('Oops...', 'Something went wrong  !', 'error');
                });
            });
          },
          allowOutsideClick: false
      });

    });

    $("#bulk_delete").submit(function(e){
        e.preventDefault();

        var ids = [];

        $('#zero_config input[type=checkbox]').each(function(){
            if($(this).prop('checked')){
                ids.push($(this).val());
            }
        });

        if(($.inArray('on',ids)) > -1)
        {
            ids.shift();
        }
        swal({
            title: 'Are you sure?',
            text: "It will be deleted!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                $.ajax({
                    url: 'profiles_bulk_delete',
                    type: 'POST',
                    data: {ids:ids},
                    dataType: 'json'
                })
                .done(function(response){
                    swal('Deleted!', response.message);
                            // $(this).closest('tr').hide();
                            location.reload();
                        })
                .fail(function(){
                    swal('Oops...', 'Something went wrong  !', 'error');
                });
            });
          },
          allowOutsideClick: false
      });
    });


</script>

@endsection

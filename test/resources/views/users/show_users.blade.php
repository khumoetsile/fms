@extends('layouts.layout')

@section('title')
Show User
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">User</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                        <h4 class="card-title">Show User</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                @if(session('gmsg'))
                                <div class="alert alert-success">
                                    {{ session('gmsg') }}
                                </div>
                                @elseif(session('bmsg'))
                                <div class="alert alert-danger">
                                    {{ session('bmsg') }}
                                </div>
                                @elseif(session('dmsg'))
                                <div class="alert alert-warning">
                                    {{ session('dmsg') }}
                                </div>
                                @endif
                            </div>
                        </div>
                            @csrf
                            <div class="table-responsive">
                                <table id="zero_config" class="table nowrap table-striped table-bordered table-sm m-b-0">
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Account Number</th>
                                            <td>{{ $user->accounts_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>User Email </th>
                                            <td>{{ $user->email  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>{{ $user->username }}</td>
                                        </tr>
                                        <tr>
                                            <th>User Role</th>
                                            <td>{{ $user->roles[0]->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Full Name</th>
                                            <td>{{ $user->fname }}{{ ' ' }}{{ $user->lname }}</td>
                                        </tr>
                                        <tr>
                                            <th>Company Name</th>
                                            <td>{{ $user->usercompany }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if($user->user_status == 1)
                                                {{ 'Active' }}
                                                @elseif($user->user_status == 0)
                                                {{ 'Deactive' }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created at</th>
                                            <td>{{ $user->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Created by</th>
                                            <td>{{ $user->created_by }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated at</th>
                                            <td>{{ $user->updated_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>{{ $user->updated_by }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <hr>
                        <div class="row">
                            @can('Admin-list')
                                    <div class="col-lg-4 col-md-4">
                                        <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Edit User</a>
                                    </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('users.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                            </div>
                            @endcan
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

        var productId = $(this).attr('id');
        e.preventDefault();

        swal({
            title: 'Are you sure?',
            text: "It will be deleted permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                $.ajax({
                    url: 'country/'+productId,
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
            text: "It will be deleted permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                $.ajax({
                    url: 'country_bulk_delete',
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

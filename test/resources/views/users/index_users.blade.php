@extends('layouts.layout')

@section('title')
User List
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Users</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                        
                    <h4 class="card-title">Users</h4>

                        <hr>
                        <div class="row">
                            @can('Customer-list')
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('users.add_users') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Add User</a>
                            </div>
                            @endcan
                            @can('Admin-list')
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('users.create') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Add Manager</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('users.show_deleted') }}" type="button" class="btn btn-block btn-sm btn-danger btn-single-submit" role="button">Deleted Users</a>
                            </div>
                            @endcan
                            @can('Manager-list')<h4 class="col-lg-2 col-md-2">Customers</h4>@endcan
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
                                            <th>S.No</th>
                                            <th>Account Num</th>
                                            <th>User Email</th>
                                            <th>User Role</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Company Name</th>
                                            <th>User Status</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach ($users as $key => $user)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td>{{ $sno }}</td>
                                            <td>{{ $user->accounts_number }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles[0]->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->fname }}</td>
                                            <td>{{ $user->lname }}</td>
                                            <td>{{ $user->usercompany }}</td>
                                            <td>
                                                @if($user->user_status == 1)
                                                {{ 'Active' }}
                                                @elseif($user->user_status == 0)
                                                {{ 'Deactive' }}
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->created_by }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>{{ $user->updated_by }}</td>
                                            <td>
                                                @can('Admin-list')
                                                @if($user->user_status == 1)
                                                <a href="{{ route('users.show', $user->id) }}" type="button" class="btn btn-sm btn-info btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                @endif
                                                <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn-sm btn-warning btn-single-submit" role="button"><i class="fas fa-edit"></i> Edit</a>
                                                @endcan
                                                @can('Admin-list')
                                                <a href="" id="{{ $user->id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete</a>
                                                @endcan

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Account Num</th>
                                            <th>User Email</th>
                                            <th>User Role</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Company Name</th>
                                            <th>User Status</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
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

        var user_Id = $(this).attr('id');
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
                    url: 'users/'+user_Id,
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

</script>

@endsection

@extends('layouts.layout')

@section('title')
Deleted User
@endsection


@section('content')
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Deleted Users</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('users.index') }}">Users</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Deleted Users</li>
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
                        <h4 class="card-title">Deleted Users</h4>
                        <hr>
                        <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a href="{{ route('users.restore_bulk') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Restore All</a>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <a href="{{ route('users.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
                        </div>
                        </div>
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
                        <form id="bulk_delete" action="" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table id="zero_config" class="table nowrap table-striped table-bordered table-sm m-b-0">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="check_all" ></th>
                                            <th>S.No</th>
                                            <th>Account Num</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>User Cnic</th>
                                            <th>User Phone</th>
                                            <th>User Mobile</th>
                                            <th>User Email</th>
                                            <th>User Status</th>
                                            <th>Deleted At</th>
                                            <th>Deleted By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach($users as $user)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $user->id }}"></td>
                                            <td>{{ $sno }}</td>
                                            <td>{{ $user->accounts_number }}</td>
                                            <td>{{ $user->fname }}</td>
                                            <td>{{ $user->lname }}</td>
                                            <td>{{ $user->userphone }}</td>
                                            <td>{{ $user->usermobile }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->user_status == 1)
                                                {{ 'Active' }}
                                                @elseif($user->user_status == 0)
                                                {{ 'Deactive' }}
                                                @endif
                                            </td>
                                            <td>{{ $user->deleted_at }}</td>
                                            <td>{{ $user->deleted_by }}</td>
                                            <td>

                                                <a href="{{ url('users_restore/'.$user->id) }}" type="button" class="btn btn-sm btn-success btn-single-submit" role="button"><i class="fa fa-check"></i> Restore</a>

                                                <a href="" id="{{ $user->id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete Permanent</a>
                                                

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>S.No</th>
                                            <th>Account Num</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>User Cnic</th>
                                            <th>User Phone</th>
                                            <th>User Mobile</th>
                                            <th>User Email</th>
                                            <th>User Status</th>
                                            <th>Deleted At</th>
                                            <th>Deleted By</th>
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

        var user_id = $(this).attr('id');
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
                    url: 'users_permDelete/'+user_id,
                    type: 'post',
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

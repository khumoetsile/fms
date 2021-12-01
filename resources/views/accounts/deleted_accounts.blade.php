@extends('layouts.layout')

@section('title')
Deleted Accounts
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
                <h4 class="page-title">Deleted Accounts</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('accounts.index') }}">Accounts</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Deleted Accounts</li>
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
                        <h4 class="card-title">Deleted Accounts</h4>
                        <hr>
                        <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a href="{{ route('accounts.restore_bulk') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Restore All</a>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <a href="{{ route('accounts.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
                                            <th><input type="checkbox" id="check_all" ></th>
                                            <th>S.No</th>
                                            <th>Account Type</th>
                                            <th>Payment Term</th>
                                            <th>Station Code</th>
                                            <th>Account No</th>
                                            <th>Company Name</th>
                                            <th>Account CNIC</th>
                                            <th>Person Name</th>
                                            <th>Person Email</th>
                                            <th>Person Phone</th>
                                            <th>Person Mobile</th>
                                            <th>Account Status</th>
                                            <th>Deleted At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach($accounts as $account)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $account->id }}"></td>
                                            <td>{{ $sno }}</td>
                                            <td>
                                                @if($account->accounts_type == 1)
                                                {{ 'Company' }}
                                                @elseif($account->accounts_type == 0)
                                                {{ 'Individual' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($account->payment_term == 1)
                                                {{ 'Credit' }}
                                                @elseif($account->payment_term == 0)
                                                {{ 'Cash' }}
                                                @endif
                                            </td>
                                            <td>{{ $account->station_code }}</td>
                                            <td>{{ $account->accounts_number }}</td>
                                            <td>{{ $account->accounts_company }}</td>
                                            <td>{{ $account->accounts_cnic }}</td>
                                            <td>{{ $account->accounts_fname }}{{ " " }}{{ $account->accounts_lname }}</td>
                                            <td>{{ $account->accounts_email }}</td>
                                            <td>{{ $account->accounts_phone }}</td>
                                            <td>{{ $account->accounts_mobile }}</td>
                                            <td>
                                                @if($account->accounts_status == 1)
                                                {{ 'Active' }}
                                                @elseif($account->accounts_status == 0)
                                                {{ 'Deactive' }}
                                                @endif
                                            </td>
                                            <td>{{ $account->deleted_at }}</td>
                                            <td>

                                                <a href="{{ url('accounts_restore/'.$account->id) }}" type="button" class="btn btn-sm btn-success btn-single-submit" role="button"><i class="fa fa-check"></i> Restore</a>

                                                <a href="" id="{{ $account->id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete Permanent</a>
                                                

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>S.No</th>
                                            <th>Account Type</th>
                                            <th>Payment Term</th>
                                            <th>Station Code</th>
                                            <th>Account No</th>
                                            <th>Company Name</th>
                                            <th>Account CNIC</th>
                                            <th>Person Name</th>
                                            <th>Person Email</th>
                                            <th>Person Phone</th>
                                            <th>Person Mobile</th>
                                            <th>Account Status</th>
                                            <th>Deleted At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <input type="submit" name="" value="Delete Selected" class="btn btn-sm btn-danger">
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

        var id = $(this).attr('id');
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
                    url: 'accounts_permDelete/'+id,
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
                    url: 'accounts_bulk_permDelete',
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

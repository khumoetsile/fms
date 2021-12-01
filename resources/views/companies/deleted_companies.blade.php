@extends('layouts.layout')

@section('title')
Deleted Companies
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
                <h4 class="page-title">Deleted Companies</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('companies.index') }}">Companies</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Deleted Companies</li>
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
                        <h4 class="card-title">Deleted Companies</h4>
                        <hr>
                        <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <a href="{{ route('companies.restore_bulk') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Restore All</a>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <a href="{{ route('companies.index') }}" onClick="javascript:history.go(-1)" class="btn btn-block btn-sm btn-secondary " type="submit">Back to Details</a>
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
                                            <th>Company Logo</th>
                                            <th>Company Reg Date</th>
                                            <th>Company Code</th>
                                            <th>Company Name</th>
                                            <th>Company Slogan</th>
                                            <th>Company Address</th>
                                            <th>Area Name</th>
                                            <th>Zip Code</th>
                                            <th>City Name</th>
                                            <th>State Name</th>
                                            <th>Country Name</th>
                                            <th>Company Phone</th>
                                            <th>Company Phone2</th>
                                            <th>Company Mobile</th>
                                            <th>Company Mobile2</th>
                                            <th>Company Email</th>
                                            <th>Company Website</th>
                                            <th>Company status</th>
                                            <th>Deleted At</th>
                                            <th>Deleted By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach($companies as $company)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $company->company_id }}"></td>
                                            <td>{{ $sno }}</td>
                                            <td>
                                                @if($company->company_image)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/'.$company->company_image) }}">
                                                        <img src="{{ asset('uploads/'.$company->company_image) }}" style="width:125px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                            <td>{{ $company->company_reg_date }}</td>
                                            <td>{{ $company->company_code }}</td>
                                            <td>{{ $company->company_name }}</td>
                                            <td>{{ $company->company_slogan }}</td>
                                            <td>{{ $company->company_address1 }}</td>
                                            <td>{{ $company->company_address2 }}</td>
                                            <td>{{ $company->company_address3 }}</td>
                                            <td>{{ $company->country_name }}</td>
                                            <td>{{ $company->state_name }}</td>
                                            <td>{{ $company->city_name }}</td>
                                            <td>{{ $company->area_name }}</td>
                                            <td>{{ $company->zip_code }}</td>
                                            <td>{{ $company->company_phone }}</td>
                                            <td>{{ $company->company_phone2 }}</td>
                                            <td>{{ $company->company_mobile }}</td>
                                            <td>{{ $company->company_fax }}</td>
                                            <td>{{ $company->company_email }}</td>
                                            <td>
                                                @if($company->company_status == 1)
                                                {{ 'Active' }}
                                                @elseif($company->company_status == 0)
                                                {{ 'Disabled' }}
                                                @endif
                                            </td>
                                            <td>{{ $company->deleted_at }}</td>
                                            <td>{{ $company->deleted_by }}</td>
                                            <td>

                                                <a href="{{ url('companies_restore/'.$company->company_id) }}" type="button" class="btn btn-sm btn-success btn-single-submit" role="button"><i class="fa fa-check"></i> Restore</a>

                                                <a href="" id="{{ $company->company_id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete Permanent</a>
                                                

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>S.No</th>
                                            <th>Company Logo</th>
                                            <th>Company Reg Date</th>
                                            <th>Company Code</th>
                                            <th>Company Name</th>
                                            <th>Company Slogan</th>
                                            <th>Company Address</th>
                                            <th>Area Name</th>
                                            <th>Zip Code</th>
                                            <th>City Name</th>
                                            <th>State Name</th>
                                            <th>Country Name</th>
                                            <th>Company Phone</th>
                                            <th>Company Phone2</th>
                                            <th>Company Mobile</th>
                                            <th>Company Mobile2</th>
                                            <th>Company Email</th>
                                            <th>Company Website</th>
                                            <th>Company status</th>
                                            <th>Deleted At</th>
                                            <th>Deleted By</th>
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

        var company_id = $(this).attr('id');
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
                    url: 'companies_permDelete/'+company_id,
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
                    url: 'companies_bulk_permDelete',
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

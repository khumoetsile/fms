@extends('layouts.layout')

@section('title')
Contacts List
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Contacts</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contacts</li>
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
                        <h4 class="card-title">Contacts</h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('contacts.create') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Add Contact</a>
                            </div>
                            @can('Admin-list')
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('contacts.upload_page') }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Upload Contacts</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="#" id="contacts_export" type="button" class="btn btn-block btn-sm btn-success btn-single-submit" role="button">Export Contacts</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('contacts.show_deleted') }}" type="button" class="btn btn-block btn-sm btn-danger btn-single-submit" role="button">Deleted Contacts</a>
                            </div>
                            @endcan
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
                                            <th>Contact Logo</th>
                                            <th>Contact Reg Date</th>
                                            <th>Contact Code</th>
                                            <th>Contact Name</th>
                                            <th>Work</th>
                                            <th>Contact Address1</th>
                                            <th>Contact Address2</th>
                                            <th>Country Name</th>
                                            <th>State Name</th>
                                            <th>City Name</th>
                                            <th>Contact Mobile</th>
                                            <th>Contact Email</th>
                                            <th>Contact status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach($contacts as $contact)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $contact->id }}"></td>
                                            <td>{{ $sno }}</td>
                                            <td>
                                                @if($contact->contact_image)
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('uploads/'.$contact->contact_image) }}">
                                                        <img src="{{ asset('uploads/'.$contact->contact_image) }}" style="width:125px; height: 100px;">
                                                    </a>
                                                </div>
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($contact->contact_reg_date)) }}</td>
                                            <td>{{ $contact->contact_code }}</td>
                                            <td>{{ $contact->contact_name }}</td>
                                            <td>{{ $contact->contact_slogan }}</td>
                                            <td>{{ $contact->contact_address1 }}</td>
                                            <td>{{ $contact->contact_address2 }}</td>
                                            <td>{{ $contact->country_name }}</td>
                                            <td>{{ $contact->state_name }}</td>
                                            <td>{{ $contact->city_name }}</td>
                                            <td>{{ $contact->contact_mobile }}</td>
                                            <td>{{ $contact->contact_email }}</td>
                                            <td>
                                                @if($contact->contact_status == 1)
                                                {{ 'Active' }}
                                                @elseif($contact->contact_status == 0)
                                                {{ 'Disabled' }}
                                                @endif
                                            </td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>{{ $contact->updated_at }}</td>

                                            <td>

                                                <a href="{{ route('contacts.show', $contact->id) }}" type="button" class="btn btn-sm btn-info btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                 @can('Admin-list')
                                                <a href="{{ route('contacts.edit', $contact->id) }}" type="button" class="btn btn-sm btn-warning btn-single-submit" role="button"><i class="fas fa-edit"></i> Edit</a>

                                                <a href="" id="{{ $contact->id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete</a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>S.No</th>
                                            <th>Contact Logo</th>
                                            <th>Contact Reg Date</th>
                                            <th>Contact Code</th>
                                            <th>Contact Name</th>
                                            <th>Work</th>
                                            <th>Contact Address1</th>
                                            <th>Contact Address2</th>
                                            <th>Country Name</th>
                                            <th>State Name</th>
                                            <th>City Name</th>
                                            <th>Contact Mobile</th>
                                            <th>Contact Email</th>
                                            <th>Contact status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                @can('Admin-list')
                                <input type="submit" name="" value="Delete Selected" class="btn-single-submit btn btn-sm btn-danger">
                                @endcan
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

    $(document).on('click', '#contacts_export', function(e){
        var country_Id = $(this).attr('id');
        e.preventDefault();
        swal({
            title: 'Are you sure?',
            text: "It Export Below Data in Excel Format",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#ff9f1f',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Export it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {
                $.ajax({
                    url: "",
                    type: 'GET',
                    data: '',
                    dataType: ''
                })
                .done(function(response){
                    swal('Exported!', response.message);
                            // $(this).closest('tr').hide();
                           window.location = "{{ route('contacts.export_csv') }}";
                        })
                .fail(function(){
                    swal('Oops...', 'Something went wrong  !', 'error');
                });
            });
          },
          allowOutsideClick: false
      });

    });

    $(document).on('click', '.sa-params', function(e){

        var id = $(this).attr('id');
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
                    url: 'contacts/'+id,
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
                    url: 'contacts_bulk_delete',
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

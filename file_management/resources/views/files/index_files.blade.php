@extends('layouts.layout')

@section('title')
Files List
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Files</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Files</li>
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
                        <h4 class="card-title">Files</h4>
                        @can('SuperUser-create')
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('files.create') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Add File</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('files.upload_page') }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Upload Files</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="#" id="files_export" type="button" class="btn btn-block btn-sm btn-success btn-single-submit" role="button">Export Files</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('files.show_deleted') }}" type="button" class="btn btn-block btn-sm btn-danger btn-single-submit" role="button">Deleted Files</a>
                            </div>
                        </div>
                        <hr>
                        @endcan
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
                                            @can('SuperUser-edit')
                                            <th><input type="checkbox" id="check_all" name=""></th>
                                            @endcan
                                            <th>S.No</th>
                                            <th>From</th>
                                            <th>Office</th>
                                            <th>Document Type</th>
                                            <th>Details</th>
                                            <th>Purpose</th>
                                            <th>To</th>
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
                                        @foreach($files as $file)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            @can('SuperUser-edit')
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $file->id }}"></td>
                                            @endcan
                                            <td>{{ $sno }}</td>
                                            <td>{{ $file->from }}</td>
                                            <td>{{ $file->office_name }}</td>
                                            <td>{{ $file->category }}</td>
                                            <td>{{ $file->file_description }}</td>
                                            <td>{{ $file->purpose }}</td>
                                            <td>{{ $file->reciever }}</td>
                                            <td>{{ $file->created_at }}</td>
                                            <td>{{ $file->created_by }}</td>
                                            <td>{{ $file->updated_at }}</td>
                                            <td>{{ $file->updated_by }}</td>
                                           
                                            <td>
                                            <!--
                                                <a href="{{ route('files.show', $file->id) }}" type="button" class="btn btn-sm btn-info btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            -->
                                                @can('SuperUser-edit')
                                                <a href="{{ route('files.edit', $file->id) }}" type="button" class="btn btn-sm btn-warning btn-single-submit" role="button"><i class="fas fa-edit"></i> Edit</a>

                                                <a href="" id="{{ $file->id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete</a>
                                                @endcan
                                                @can('ActionOfficer-edit')
                                               
                                                @if($file->requestedFile == 0 && $file->aprovedReq == 0 && Auth::user()->hasRole('ActionOfficer'))
                                               <a href="" id="{{ $file->id }}" type="button" class="btn btn-sm btn-primary btn-single-submit aprove" role="button"><i class="fa fa-eye"></i> Request</a>
                                                @elseif($file->requestedFile == 1 && $file->aprovedReq == 0 && Auth::user()->hasRole('ActionOfficer'))
                                                <a href="#" type="button" class="btn btn-sm btn-warning btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i>Pending Aproval</a>
                                                @elseif($file->requestedFile == 1 && $file->aprovedReq == 1 && Auth::user()->hasRole('ActionOfficer'))
                                                <a href="#" type="button" class="btn btn-sm btn-success btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i> Aproved</a>
                                                @endif
                                                @endcan
                                            </td>
                                           
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            @can('SuperUser-edit')
                                            <th></th>
                                            @endcan
                                            <th>S.No</th>
                                            <th>From</th>
                                            <th>Office</th>
                                            <th>Document Type</th>
                                            <th>Details</th>
                                            <th>Purpose</th>
                                            <th>To</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                @can('SuperUser-edit')
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

    $(document).on('click', '#files_export', function(e){
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
                           window.location = "{{ route('files.export_csv') }}";
                        })
                .fail(function(){
                    swal('Oops...', 'Something went wrong  !', 'error');
                });
            });
          },
          allowOutsideClick: false
      });

    });

    $(document).on('click', '.aprove', function(e){

        var id = $(this).attr('id');
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: "{{route('files.rqaprove')}}",
        data: {'id':id},
        dataType: 'json',
        success : function(data) {
        if(data)
             {
                location.reload();
             }else{
               alert('Some thing went wrong!')
            }
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
    });

    });
    $(document).on('click', '.sa-params', function(e){

        var id = $(this).attr('id');
        alert(id);
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
                    url: 'files/'+id,
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
                    url: 'files_bulk_delete',
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

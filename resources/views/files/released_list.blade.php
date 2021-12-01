@extends('layouts.layout')

@section('title')
Released Documents
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Released Documents</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Released Documents</li>
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
                                            <th>Tracking</th>
                                            <th>DocType & Details</th>
                                            <th>FWD From</th>
                                            <th>Accepted</th>
                                            <th>Action Needed</th>
                                            <th>Reason for Defer</th>
                                            
                                            <!--
                                                <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            -->
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
                                            <td><small><font>{{ $sno }}</font></small></td>
                                            <td><small><font>{{ $file->reference_no }}</font></small></td>
                                            <td><small><font><p>{{ $file->category }}</p>
                                                <p>{{$file->file_description}}</p>
                                                <p>From:{{$file->from}}</p>
                                            </font>
                                            </small>
                                            </td>
                                            <td>
                                                <small>
                                                    <font>
                                                <p>{{ $file->reciever }}</p>
                                                <p>By:{{$file->from}}</p>
                                            </font>
                                            </small>
                                            </td>
                                            <td>
                                                <small>
                                                    <font>
                                                <p>{{ $file->reciever }}</p>
                                                <p>By:{{$file->from}}</p>
                                            </font>
                                            </small>
                                            </td>
                                            <td><small><font><p>{{ $file->purpose }}</p></font></small>
                                                @if($file->route_purpose)
                                                <small>
                                                    <font color="blue">FWD Remarks:{{ $file->route_purpose }}</font>
                                                </small>
                                                @endif
                                            </td>
                                             <td>
                                                <small>
                                                    <font>
                                                <p>{{ $file->deferred_reason }}</p>
                                                <p>By:{{$file->deferred_date}}</p>
                                            </font>
                                            </small>
                                            </td>
                                            <!--
                                                <td>{{ $file->created_by }}</td>
                                            <td>{{ $file->updated_at }}</td>
                                            <td>{{ $file->updated_by }}</td>
                                            -->
                                            <td>
                                                <a href="{{ route('fwd.files', $file->id) }}" type="button" class="btn btn-sm btn-primary btn-single-submit" role="button"><i class="fa   fa-share-square"></i>Fwd</a>
                                                <a href="{{ route('keep.files', $file->id) }}" type="button" class="btn btn-sm btn-success btn-single-submit" role="button"><i class="fa   fa-folder-open" aria-hidden="true"></i>Keep</a>
                                                <a href="{{ route('release.files', $file->id) }}" type="button" class="btn btn-sm btn-warning btn-single-submit" role="button"><i class="glyphicon glyphicon-send" ></i>Send</a>
                                                <a href="{{ route('cancelled.files', $file->id) }}" type="button" class="btn btn-sm btn-danger btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i>Cancelled</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Tracking</th>
                                            <th>DocType & Details</th>
                                            <th>FWD From</th>
                                            <th>Accepted</th>
                                            <th>Action Needed</th>
                                            <th>Reason for Defer</th>
                                            <!--
                                                <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            -->
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

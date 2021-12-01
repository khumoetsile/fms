@extends('layouts.layout')
@section('title')
Messages List
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Messages</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Messages</li>
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
                        <h4 class="card-title">Messages</h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('messages.create') }}" type="button" class="btn btn-block btn-sm btn-info" role="button">Add Message</a>
                            </div>
                        <!--
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('messages.upload_page') }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Upload Messages</a>
                            </div>
                        -->
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('messages.bulk_send') }}" type="button" class="btn btn-block btn-sm btn-warning btn-single-submit" role="button">Bulk Messages</a>
                            </div>

                            <div class="col-lg-2 col-md-2">
                                <a href="#" id="messages_export" type="button" class="btn btn-block btn-sm btn-success btn-single-submit" role="button">Export Messages</a>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <a href="{{ route('messages.show_deleted') }}" type="button" class="btn btn-block btn-sm btn-danger btn-single-submit" role="button">Deleted Messages</a>
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
                        <form id="bulk_delete" class="bulk_send" action="" method="post">
                            @csrf
                            <div class="table-responsive">
                                <table id="zero_config" class="table nowrap table-striped table-bordered table-sm m-b-0">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="check_all" name=""></th>
                                            <th>S.No</th>
                                            <th>Message Subject</th>
                                            <th>Message Number</th>
                                            <th>Message Body</th>
                                            <th>Message Status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $sno = 0;
                                        @endphp
                                        @foreach($messages as $message)
                                        @php
                                        $sno++;
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox" name="delete[]" class="checkItems" value="{{ $message->message_id }}"></td>
                                            <td>{{ $sno }}</td>
                                            <td>{{ $message->message_subject }}</td>
                                            <td>{{ $message->message_number }}</td>
                                            <td>{{ $message->message_body }}</td>
                                            <td>
                                                @if($message->message_status == 1)
                                                {{ 'Sent' }}
                                                @elseif($message->message_status == 0)
                                                {{ 'Draft' }}
                                                @endif
                                            </td>
                                            <td>{{ $message->created_at }}</td>
                                            <td>{{ $message->updated_at }}</td>

                                            <td>
                                                @if($message->message_status == 0)
                                                <a href="{{ route('messages.show', $message->message_id) }}" type="button" class="btn btn-sm btn-info btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i> Send SMS </a>
                                                @endif

                                                @if($message->message_status == 1)
                                                <a href="{{ route('messages.show', $message->message_id) }}" type="button" class="btn btn-sm btn-success btn-single-submit" role="button"><i class="fa fa-eye" aria-hidden="true"></i> Resend </a>
                                                @endif

                                                <a href="{{ route('messages.edit', $message->message_id) }}" type="button" class="btn btn-sm btn-warning btn-single-submit" role="button"><i class="fas fa-edit"></i> Edit</a>

                                                <a href="" id="{{ $message->message_id }}" type="button" class="btn btn-sm btn-danger btn-single-submit sa-params" role="button"><i class="far fa-trash-alt"></i> Delete</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>S.No</th>
                                            <th>Message Subject</th>
                                            <th>Message Number</th>
                                            <th>Message Body</th>
                                            <th>Message Status</th>
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

        var message_Id = $(this).attr('id');
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
                    url: 'messages/'+message_Id,
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
                    url: 'messages_bulk_delete',
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

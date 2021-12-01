@extends('layouts.layout')

@section('title')
Request List
@endsection

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Request</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Request</li>
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
                        <h4 class="card-title">Request File</h4>
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
                                                @can('SuperUser-edit')
                                                <a href="" id="{{ $file->id }}" type="button" class="btn btn-sm btn-primary btn-single-submit aprove" role="button"><i class="fa fa-eye"></i> Aprove</a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
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

    $(document).on('click', '.aprove', function(e){

        var id = $(this).attr('id');
        e.preventDefault();
        $.ajax({
        type: "POST",
        url: "{{route('files.mark_aprove')}}",
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
   
</script>

@endsection

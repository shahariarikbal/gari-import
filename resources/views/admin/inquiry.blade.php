@extends('layouts.app-admin')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/add-pages') }}">CMS</a>
                </li>
                <li class="breadcrumb-item active">Stock inquiry</li>
            </ol>
            <div id="gallery1"></div>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Stock inquiry Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Port</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($inquiryShow))
                                @foreach($inquiryShow as $key => $inquiry)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @if($inquiry->port === 1)
                                                <span class="badge badge-primary">Chittagong</span>
                                            @else
                                                <span class="badge badge-primary">Mongla</span>
                                            @endif
                                        </td>
                                        <td>{{ $inquiry->name }}</td>
                                        <td>{{ $inquiry->email }}</td>
                                        <td>{{ $inquiry->phone }}</td>
                                        <td>{!! substr($inquiry->message, 0, 50) !!} ...</td>
                                        <td>
                                            <a href="{{ url('/inquiry-data-view/'.$inquiry->id) }}" class="btn btn-sm btn-info">
                                                <i class="fa fa-eye"></i>
                                            </a>

{{--                                            <a href="javascript:void(0)" onclick="inquiryDelete({{ $inquiry->id }})" class="btn btn-sm btn-danger">--}}
{{--                                                <i class="fa fa-trash"></i>--}}
{{--                                            </a>--}}
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" onclick="deleteInquiry({{ $inquiry->id }})" data-target="#inquiryDeleteModal" title="Delete">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="modal fade" id="inquiryDeleteModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this Inquiry?</h4>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ url('/inquiry/delete') }}">
                        @csrf
                        <input type="hidden" name="id" id="delete_id">
                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-sm btn-danger" type="submit" title="Delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script>
        function deleteInquiry(id) {
            $('#delete_id').val(id);
            $('#inquiryDeleteModal').modal('show');
        }
    </script>
@endsection

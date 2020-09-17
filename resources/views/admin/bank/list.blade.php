@extends('layouts.app-admin')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/add-pages') }}">CMS</a>
                </li>
                <li class="breadcrumb-item active">Bank List</li>
            </ol>
            <div id="gallery1"></div>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Banks Table
                    <a href="{{ url('/add-new-bank') }}" class="btn btn-sm btn-success float-right">Add New Bank</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Account No</th>
                                <th>Account Name</th>
                                <th>Swift</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($showBank as $key => $bank)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $bank->name }}</td>
                                    <td>{{ $bank->branch }}</td>
                                    <td>{{ $bank->account_no }}</td>
                                    <td>{{ $bank->account_name }}</td>
                                    <td>{{ $bank->swift }}</td>
                                    <td>
                                        @if($bank->status === 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/bank-info-edit/'.$bank->id) }}" class="btn btn-sm btn-success" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @if($bank->status === 1)
                                        <a href="{{ url('/bank-info-active/'.$bank->id) }}" class="btn btn-sm btn-primary" title="Click to Inactive">
                                            <i class="fa fa-thumbs-up"></i>
                                        </a>
                                        @else
                                        <a href="{{ url('/bank-info-inactive/'.$bank->id) }}" class="btn btn-sm btn-warning" title="Click to Active">
                                            <i class="fa fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" onclick="deleteBankModal({{$bank->id}})" data-target="#faqDeleteModal" title="Delete">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="bankDeleteModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this Bank?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST" action="{{ url('/delete-bank-list') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" id="delete_id">
                                                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                                                    <button class="btn btn-sm btn-danger" type="submit" title="Delete">Delete</button>
                                                </form>
{{--                                                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>--}}
{{--                                                <a href="{{ url('/delete-bank-list/'.$bank->id) }}" class="btn btn-sm btn-danger" title="Delete">--}}
{{--                                                    Delete--}}
{{--                                                </a>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('page_js')
    <script>
        function deleteBankModal(id) {
            $('#delete_id').val(id);
            $('#bankDeleteModal').modal('show');
        }
    </script>
@endsection

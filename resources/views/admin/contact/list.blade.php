@extends('layouts.app-admin')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/add-pages') }}">CMS</a>  <span style="font-weight: bold; margin-left: 5px;">>></span>
                </li>
                <li class="breadcrumb-item active" style="margin-left: 10px;">Contact Query list</li>
            </ol>
            <div id="gallery1"></div>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Contact Query list
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($showQuery as $key => $query)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $query->name }}</td>
                                    <td>{{ $query->email }}</td>
                                    <td>{{ $query->phone }}</td>
                                    <td>{{ $query->subject }}</td>
                                    <td>{!! substr($query->message, 0, 40) !!}....</td>
                                    <td>
                                        <a href="{{ url('/admin/quiry-data-view/'.$query->id) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" onclick="deleteQuiry({{ $query->id }})" data-target="#quiryDeleteModal" title="Delete">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="modal fade" id="quiryDeleteModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this Quiry?</h4>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ url('/admin/delete-query') }}">
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
        function deleteQuiry(id) {
            $('#delete_id').val(id);
            $('#quiryDeleteModal').modal('show');
        }
    </script>
@endsection

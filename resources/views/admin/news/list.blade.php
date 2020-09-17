@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="{{ url('/add-pages') }}">CMS</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li class="breadcrumb-item active" style="margin-left: 10px;">News List</li>
        </ol>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
                <div class="card-header">
                    <a href="{{ url('/admin/create-news') }}" class="btn btn-sm btn-success float-right">Add new News</a>
                </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($showNews as $key=> $news)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $news->title }}</td>
                            <td>{!! strip_tags(substr($news->description, 0, 70)) !!}</td>
                            <td>
                                @if($news->status === 1)
                                    <span class="badge badge-primary">Published</span>
                                @else
                                    <span class="badge badge-warning">Unpublished</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/news-edit/'.$news->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if($news->status === 1)
                                    <a href="{{ url('/news-published/'.$news->id) }}" class="btn btn-sm btn-success" title="Unpublished">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                @else
                                    <a href="{{ url('/news-unpublished/'.$news->id) }}" class="btn btn-sm btn-info" title="published">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                @endif
                                <button class="btn btn-sm btn-danger" data-toggle="modal" onclick="deleteNews({{ $news->id }})" data-target="#newsDeleteModal" title="Delete">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!--Delete modal-->
                        <div class="modal fade" id="newsDeleteModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this news?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ url('/news-delete') }}">
                                            @csrf
                                            <input type="hidden" name="id" id="delete_id">
                                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-sm btn-danger" type="submit" title="Delete">Delete</button>
                                        </form>
{{--                                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>--}}
{{--                                        <a href="{{ url('/news-delete/'.$news->id) }}" class="btn btn-sm btn-primary">--}}
{{--                                            Delete--}}
{{--                                        </a>--}}
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
@endsection

@section('page_js')
    <script>
        function deleteNews(id) {
            $('#delete_id').val(id);
            $('#newsDeleteModal').modal('show');
        }
    </script>
@endsection

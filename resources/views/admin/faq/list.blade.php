@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="{{ url('/add-pages') }}">CMS</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li class="breadcrumb-item active" style="margin-left: 10px;">Faq List</li>
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
                    <a href="{{ url('/admin/create-faq') }}" class="btn btn-sm btn-success float-right">Add new Faq</a>
                </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>SL</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($showFaq as $key=> $faq)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $faq->question }}</td>
                            <td>{!! substr($faq->answer, 0, 50) !!} ...</td>
                            <td>
                                @if($faq->status === 1)
                                    <span class="badge badge-primary">Published</span>
                                @else
                                    <span class="badge badge-warning">Unpublished</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/faq-edit/'.$faq->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if($faq->status === 1)
                                    <a href="{{ url('/faq-published/'.$faq->id) }}" class="btn btn-sm btn-success" title="Unpublished">
                                        <i class="fa fa-thumbs-up"></i>
                                    </a>
                                @else
                                    <a href="{{ url('/faq-unpublished/'.$faq->id) }}" class="btn btn-sm btn-info" title="published">
                                        <i class="fa fa-thumbs-down"></i>
                                    </a>
                                @endif
                                <button class="btn btn-sm btn-danger" onclick="deleteFaq({{$faq->id}})" data-toggle="modal" data-target="#faqDeleteModal" title="Delete">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <!--Delete modal-->
                        <div class="modal fade" id="faqDeleteModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this FAQ?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ url('/faq-delete') }}">
                                            @csrf
                                            <input type="hidden" name="id" id="delete_id">
                                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                                            <button class="btn btn-sm btn-danger" type="submit" title="Delete">Delete</button>
                                        </form>
{{--                                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>--}}
{{--                                        <a href="{{ url('/faq-delete/'.$faq->id) }}" class="btn btn-sm btn-primary">--}}
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
        function deleteFaq(id) {
            $('#delete_id').val(id);
            $('#faqDeleteModal').modal('show');
        }
    </script>
@endsection

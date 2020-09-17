@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">CMS</li>
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
{{--            <div class="card-header">--}}
{{--                <a href="{{ url('/new-page-create') }}" class="btn btn-sm btn-success float-right">Add new Page</a>--}}
{{--            </div>--}}
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>SL</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if($page->count() > 0)
                    <tbody>
                        @foreach($page as $key => $data)
                            <tr class="text-left">
                                <td class="text-center">{{ $key+1 }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    @if($data->status === 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td width="25%">
                                    <a href="{{ url('/page-edit/'.$data->id) }}" class="btn btn-sm btn-info" title="Page Setting"><i class="fa fa-edit"></i></a>
                                    @if($data->id === 3)
                                        <a href="{{ url('/admin/vehicle-list') }}" class="btn btn-sm btn-warning" title="Setting"><i class="fa fa-cog"></i></a>
                                    @elseif($data->id === 4)
                                        <a href="{{ url('/admin/stock-list') }}" class="btn btn-sm btn-warning" title="Setting"><i class="fa fa-cog"></i></a>
                                    @elseif($data->id === 6)
                                        <a href="{{ url('/admin/bank-list') }}" class="btn btn-sm btn-warning" title="Setting"><i class="fa fa-cog"></i></a>
                                    @elseif($data->id === 11)
                                        <a href="{{ url('/admin/news-list') }}" class="btn btn-sm btn-warning" title="Setting"><i class="fa fa-cog"></i></a>
                                    @elseif($data->id === 12)
                                        <a href="{{ url('/admin/faq-list') }}" class="btn btn-sm btn-warning" title="Setting"><i class="fa fa-cog"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                        <tbody>
                            <tr>
                                <td colspan="4" class="alert alert-info" role="alert">
                                    <span>No Data found</span>
                                </td>
                            </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection

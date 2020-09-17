@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ url('/add-pages') }}">CMS</a></li>
            <li class="breadcrumb-item active">Create New Page</li>
        </ol>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 sadow">
                    <div class="card">
                        <div class="card-header">Create New page</div>
                        <div class="card-body">
                            <form action="{{ url('/store-new-page') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Page name">
                                    <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Page title">
                                    <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" placeholder="Page meta keyword">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta description</label>
                                    <textarea class="form-control" rows="3" name="meta_description" placeholder="meta description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
@endsection

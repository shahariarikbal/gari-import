@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="{{ url('/add-pages') }}">CMS</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li><a href="{{ url('/admin/news-list') }}">News List</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li class="breadcrumb-item active" style="margin-left: 10px;">Edit</li>
        </ol>

        <div class="col-md-12" style="padding: 20px;">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="background-color: #e9ecef">
                    <div class="card-body">
                        <form style="margin-top: 10px;" action="{{ url('/update-news/'.$news->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $news->title }}">
                                <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="editor">{{ $news->description }}</textarea>
                                <span style="color: red"> {{ $errors->has('description') ? $errors->first('description') : ' ' }}</span>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col">
                                    <a href="{{ url('/admin/news-list') }}" class="btn btn-sm btn-danger">Back</a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-sm btn-success float-right">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script type="text/javascript">
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection

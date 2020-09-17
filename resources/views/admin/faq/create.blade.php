@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="{{ url('/add-pages') }}">CMS</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li><a href="{{ url('/admin/news-list') }}">Faq List</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li class="breadcrumb-item active" style="margin-left: 10px;">Faq Create</li>
        </ol>

        <div class="col-md-12" style="padding: 20px;">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="background-color: #e9ecef">
                    <div class="card-body">
                        <form style="margin-top: 10px;" action="{{ url('/store-faq') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Question</label>
                                <input type="text" class="form-control" name="question" value="{{ old('question') }}">
                                <span style="color: red"> {{ $errors->has('question') ? $errors->first('question') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Answer</label>
                                <textarea class="form-control" name="answer" id="editor">{{Request::old('answer')}}</textarea>
                                <span style="color: red"> {{ $errors->has('answer') ? $errors->first('answer') : ' ' }}</span>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col">
                                    <a href="{{ url('/admin/faq-list') }}" class="btn btn-sm btn-danger">Back</a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-sm btn-success float-right">Submit</button>
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

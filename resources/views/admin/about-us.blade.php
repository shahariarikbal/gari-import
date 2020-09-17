@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">About Us</li>
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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="{{ url('/about-us-store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header bg-primary"><h1>About Us</h1></div>
                                    <input type="hidden" name="id" value="{{ $aboutShow->id }}">
                                    <textarea class="form-control" name="body" id="editor">{{ $aboutShow->body }}</textarea>
                                    <span style="color: red; margin-left: 60px;"> {{ $errors->has('body') ? $errors->first('body') : ' ' }}</span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
@endsection

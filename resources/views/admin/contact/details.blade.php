@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="{{ url('/add-pages') }}">CMS</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li><a href="{{ url('/admin/contact-query') }}">Contact query</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li class="breadcrumb-item active" style="margin-left: 10px;">Contact query details</li>
        </ol>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-md-8 sadow" style="padding: 20px; margin-bottom: 20px;">
                    <div class="card">
                        <div class="card-header">Contact query details</div>
                        <div class="card-body">
                            <h4>{{ $showQueryDetails->name }}</h4>
                            <p>{{ $showQueryDetails->phone }}</p>
                            <p>{{ $showQueryDetails->email }}</p>
                            <p>{{ $showQueryDetails->subject }}</p>
                            <span>{!! $showQueryDetails->message !!}</span>

                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
@endsection

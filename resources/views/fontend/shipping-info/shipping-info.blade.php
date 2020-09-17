@extends('layouts.app-web')

@section('content')
    <div class="page-header--section" style="margin-top: 50px;">
        <div class="container">
            <div class="title section--title">
                <h1 class="h1">Shipping Info</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <p>{!! $importRegulation->body ? $importRegulation->body : "<span class='alert alert-warning'>No Import Regulation</span>" !!}</p>
    </div>
@endsection

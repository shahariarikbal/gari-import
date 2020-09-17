@extends('layouts.app-web')

@section('content')
    <div class="page-header--section" style="margin-top: 50px;">
        <div class="container">
            <div class="title section--title">
                <h1 class="h1">Terms and Condition</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <p>{!! $termsCondition->body !!}</p>
    </div>
@endsection

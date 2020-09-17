@extends('layouts.app-web')

@section('content')
    <div class="page-header--section" style="margin-top: 50px;">
        <div class="container">
            <div class="title section--title">
                <h1 class="h1">NEWS</h1>
            </div>
        </div>
    </div>
    <div class="blog--section pd--30-0-40">
        <div class="container">
            <div class="blog--content col-md-12 pbottom--60">
                <div class="col-xs-12 col-xxs-12">
                    <div class="post--item">
                        <div class="title">
                            <h2 class="h4"><p>{{ $news->title }}</p></h2>
                        </div>
                        <div class="content">
                            <p>{!! $news->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

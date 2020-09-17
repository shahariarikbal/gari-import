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
                <div class="row MasonryRow">
                    @foreach($newsShow as $news)
                    <div class="col-xs-6 col-xxs-12">
                        <div class="post--item">
                            <div class="title">
                                <h2 class="h4"><a href="{{ url('/news-details/'.$news->id) }}">{{ $news->title }}</a></h2>
                            </div>
                            <div class="content">
                                <p>{!! strip_tags(substr($news->description, 0, 250)) !!} ....</p>
                            </div>
                            <div class="action"> <a href="{{ url('/news-details/'.$news->id) }}" class="active">Continue Reading...</a> </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $newsShow->links() }}
            </div>
        </div>
    </div>
@endsection

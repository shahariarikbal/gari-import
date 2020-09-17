@extends('layouts.app-web')

@section('content')
    <div class="page-header--section" style="margin-top: 50px;">
        <div class="container">
            <div class="title section--title">
                <h1 class="h1">FAQ</h1>
            </div>
        </div>
    </div>
    <div class="container">
            @foreach($faqShow as $faq)
                @if($faqShow->count() > 0)
                <div class="col-md-12 bank-shadow" style="border: 1px solid lightgray; margin-bottom: 20px;">
                    <div class="row" style="border-bottom: 2px solid #c4302b">
                        <div class="col-sm-1 col-xs-2 width-4" style="background-color: #c4302b; height: 50px;"></div>
                        <div class="col-sm-11 col-xs-10">
                            <h4 class="step-title">{{ $faq->question ? $faq->question : '' }}</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>
                            {!! $faq->answer ? $faq->answer : '' !!}
                        </p>
                    </div>
                </div>
                @else
                    <div class="alert alert-warning"><h2 class="text-center">No FAQ Found</h2></div>
                @endif
            @endforeach
        <div class="col-md-12" style="margin-bottom: 30px;">
            <span style="text-align: center">{{ $faqShow->links() }}</span>
        </div>
    </div>
@endsection

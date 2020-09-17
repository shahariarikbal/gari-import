@extends('layouts.app-web')

@section('content')
<div class="carousel slide carousel-fade" data-ride="carousel" id="carousel-example-generic">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @if(!empty($cmsPageSettings))
        @foreach($cmsPageSettings as $slider)
        @if($slider['value'])
        @foreach(json_decode($slider['value']) as $k => $picture)
        <li data-target="#carousel-example-generic" data-slide-to="{{ $k++ }}" class=""></li>
        @endforeach
        @endif
        @endforeach
        @endif
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        {{-- <div class="item active" style="height:75vh;background: url(https://c4.wallpaperflare.com/wallpaper/40/1019/593/mercedes-benz-dark-amg-sun-wallpaper-preview.jpg) no-repeat center center;background-size: cover;"></div>--}}
        @if(!empty($cmsPageSettings))
        @foreach($cmsPageSettings as $slider)
        @if($slider['value'])
        @foreach(json_decode($slider['value']) as $key => $picture)
        <div class="item {{ $key == 0 ? 'active' : '' }}" style="height:550px;background: url({{ asset('/images/'.$picture) }}) no-repeat;background-size:100% 100%"></div>
        @endforeach
        @endif
        @endforeach
        @endif
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
    <div class="checker--section">
        <div class="container">
            <div class="checker--form">
                @foreach($cmsPageCarLogos as $carLogo)
                <div class="testimonial--brands owl-carousel" data-owl-items="6" data-owl-margin="30" data-owl-responsive='{"0":{"items": "4"}, "768":{"items": "4"}, "992":{"items": "6"}}'>
                    <?php foreach (json_decode($carLogo['value']) as $carLogoPicture) { ?>
                        <div class="item">
                            <img src="{{ asset('/images/'.$carLogoPicture) }}" />
                        </div>
                    <?php } ?>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



<div class="pricing--section pd--40-0-40 bg--overlay-95" data-bg-img="{{ asset('/fontend/assets/') }}/img/pricing-{{ asset('/fontend/assets/') }}/img/bg.jpg">
    <div class="container">
        <div class="section--title">
            @if(isset(getCmsPageData('first_heading')->value))
            <h2 class="h2">{{ getCmsPageData('first_heading')->value }}</h2>
            @endif
            @if(isset($firstHeadingDetails->value))
            <span>{{ $firstHeadingDetails->value }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-md-4 mb-20">
                <div class="pricing--item">
                    <div>
                        @if(isset(getCmsPageData('service_box_icon_1')->value))
                        <img src="{{ asset('/images/'.getCmsPageData('service_box_icon_1')->value) }}" width="100%">
                        @else
                        @endif
                    </div>
                    <div class="action"> <a href="{{ route('web.verifyAuctionSheet') }}" class="btn btn-default">{{ isset(getCmsPageData('service_box_button_1')->value) ? getCmsPageData('service_box_button_1')->value : '' }}</a> </div>
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <div class="pricing--item pricing--items">
                    <div>
                        @if(isset(getCmsPageData('service_box_icon_2')->value))
                        <img src="{{ asset('/images/'.getCmsPageData('service_box_icon_2')->value) }}" width="100%">
                        @else
                        @endif
                    </div>
                    <div class="action"> <a href="#" class="btn btn-default">{{ isset(getCmsPageData('service_box_button_2')->value) ? getCmsPageData('service_box_button_2')->value : '' }}</a> </div>
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <div class="pricing--item pricing--items">
                    <div>
                        @if(isset(getCmsPageData('service_box_icon_3')->value))
                        <img src="{{ asset('/images/'.getCmsPageData('service_box_icon_3')->value) }}" width="100%">
                        @else
                        @endif
                    </div>
                    <div class="action"> <a href="#" class="btn btn-default">{{ isset(getCmsPageData('service_box_button_3')->value) ? getCmsPageData('service_box_button_3')->value : '' }}</a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="faq--section pd--40-0-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pbottom--60">
                <div class="faq--content">
                    <div class="section--title section--title-left">
                        <h2 class="h2">{{ isset(getCmsPageData('description_content_title')->value) ? getCmsPageData('description_content_title')->value : '' }}</h2>
                    </div>
                    <div class="body">
                        <p>
                            {!! isset(getCmsPageData('description_content')->value) ? getCmsPageData('description_content')->value : '' !!}
                        </p>
                    </div>
                    <div class="col-md-12 img-text">
                        <div class="row">
                            {{-- <div class="question col-md-3 question-img">--}}
                            {{-- --}}
                            {{-- </div>--}}
                            <div class="col-md-12">
                                <h3 class="responsive">Have any question ?</h3>
                                <h4><i class="fa fa-envelope"></i> {{ isset(getCmsPageData('support_email')->value) ? getCmsPageData('support_email')->value : '' }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pbottom--60">
                <img src="{{ asset('/fontend/assets/') }}/img/car.png" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

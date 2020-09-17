@extends('layouts.app-web')

@section('content')
<div class="container stock-list-form">
    <div class="row">
        <div class="col-md-12">
            <h1>Stock Details</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="searchForm" action="{{ route('search')}}" class="form-horizontal">
                <div class="form-group form-group-lg">
                    <div class="col-sm-12">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" name="search" placeholder="Search.." aria-describedby="basic-addon1">
                            <span onclick="document.getElementById('searchForm').submit();" class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mb-20">
        <div class="col-md-5 col-lg-5">
            <section id="gallery" class="simplegallery">

                <div class="content">
                    <div class="mag">
                        @if((sizeof($stock->images) > 0) && file_exists('stockimg/'.$stock->images[0]->image))
                        <img data-toggle="magnify" class="img-responsive" src="{{ asset('/stockimg/'.$stock->images[0]->image) }}" id="img" alt="">
                        @endif
                    </div>
                </div>

                <div class="thumbnail kbm-margin-b-25 kbm-margin-t-15 print-hide">
                    @if(sizeof($stock->images) > 0)
                        @foreach($stock->images as $key => $stockImg)
                            @if($stockImg->image && file_exists('stockimg/'.$stockImg->image))
                                <div class="thumb">
                                    <script>
                                        let img{{$key}} = "{{ asset('/stockimg/'.$stockImg->image) }}";
                                    </script>
                                    <img alt="" class="{{ $key == 0 ? 'active':'' }} img-responsive" src="{{ asset('/stockimg/'.$stockImg->image) }}" onclick="changeimg(img{{$key}} ,this);">
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </section>

            @if(sizeof($stock->images) > 0)
                <a href="{{ url('vehicles-image-download/'.$stock->stocks_id) }}" target="_blank"> <i class="fa fa-file-zip-o"></i> Download pictures in a single zip file</a>
            @endif
        </div>
        <div class="col-md-7 col-lg-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="vehicle-name">
                        <div>
                            <h1>
                                {{ $stock->year ? $stock->year : '' }}
                                {{ $stock->make ? $stock->make : '' }}
                                {{ $stock->model ? $stock->model : '' }}
                                {{ $stock->chasis_code ? $stock->chasis_code : '' }}
                            </h1>
                        </div>
                        <div>
                            @if($stock->status === 1)
                            <span class="available badge bdge-success" style="background-color: red">Upcoming</span>
                            @elseif($stock->status === 2)
                            <span class="available badge bdge-success" style="background-color: green">Available</span>
                            @else
                            <span class="available badge bdge-success" style="background-color:  #cccccc">Sold Out</span>
                            @endif
                        </div>
                    </div>
                    <div class="vehicle-price">
                        <div>
                            <strong>Vehicle Price : {{ number_format($stock->price, 2) ? number_format($stock->price, 2) : '00.00' }} BDT</strong>
                        </div>
                        <div style="display: none">
                            <ul>
                                <li>
                                    <strong>FOB :</strong>
                                    <span>{{ $stock->fob ? $stock->fob : '' }} BDT</span>
                                </li>
                                <li>
                                    <strong>C&F :</strong>
                                    <span>{{ $stock->cnf ? $stock->cnf : '' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="vehicle-view" style="display: none">
                        <p><i class="fa fa-info-circle" aria-hidden="true"></i> 107 people already viewed this vehicle</p>
                    </div>
                    <div class="vehicle-action-btn">
                        <div style="display: none">
                            <a href="#" class="btn btn-primary btn-sm">Get a price Quote now</a>
                            <a href="#" class="btn btn-warning btn-sm">favourites <i class="fa fa-heart" aria-hidden="true"></i></a>
                            <a href="#" class="btn btn-success btn-sm">Print <i class="fa fa-print" aria-hidden="true"></i></a>
                        </div>
                        <div>
{{--                            <span class="facebook badge">Facebook</span>--}}
                            <div class="fb-share-button" data-href="{{ url('/vehicles/'. makeHyphenUrl($stock->make).'-'.makeHyphenUrl($stock->model).'/'.$stock->stocks_id) }}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
{{--                            <div class="fb-share-button" data-href="http://gari-import.ideahouseit.com/vehicles/toyota-prius/002" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>--}}
                            <span id="fb-root"></span>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=345256289472249&autoLogAppEvents=1" nonce="FAhiPE9J"></script>
                            <span class="whatsapp badge"><a href="whatsapp://send?text=http://www.gari-import.com.bd" data-action="share/whatsapp/share">Whatsapp</a></span>
                        </div>
                    </div>
                    <div class="vehicle-specification">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Specifications for {{ $stock->year ? $stock->year : '' }} {{ $stock->make ? $stock->make : '' }} {{ $stock->model ? $stock->model : '' }} {{ $stock->chasis_code ? $stock->chasis_code : '' }}
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <span>Stock ID</span>
                                                <span class="color-blue">{{ $stock->stocks_id ? $stock->stocks_id : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Maker</span>
                                                <span class="color-blue">{{ $stock->make ? $stock->make : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Model</span>
                                                <span class="color-blue">{{ $stock->model ? $stock->model : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Grade</span>
                                                <span class="color-blue">{{ $stock->grade ? $stock->grade : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Chassis Code</span>
                                                <span class="color-blue">{{ $stock->chasis_code ? $stock->chasis_code : '' }}</span>
                                            </li>

                                            <li class="list-group-item">
                                                <span>Year</span>
                                                <span class="color-blue">{{ $stock->year ? $stock->year : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Color</span>
                                                <span class="color-blue">{{ $stock->color ? $stock->color : '' }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <span>Engine CC</span>
                                                <span class="color-blue">{{ $stock->engine_cc ? $stock->engine_cc : '' }}CC</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Fuel</span>
                                                <span class="color-blue">{{ $stock->fuel ? $stock->fuel : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Mileage</span>
                                                <span class="color-blue">{{ $stock->mileage ? $stock->mileage : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Auction Point</span>
                                                <span class="color-blue">{{ $stock->fob ? $stock->fob : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Transmission</span>
                                                <span class="color-blue">{{ $stock->transmission ? $stock->transmission : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Seats</span>
                                                <span class="color-blue">{{ $stock->seat ? $stock->seat : '' }}</span>
                                            </li>
                                            <li class="list-group-item">
                                                <span>Door</span>
                                                <span class="color-blue">{{ $stock->door ? $stock->door : '' }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vehicle-specification">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Desctiption</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! $stock->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="display: none" class="vehicle-features">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Standard Features of 2016 Toyota Fielder Hybrid</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-4 no-padding">
                                        <span class="active">AIRCON</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span class="active">POWER STEERING</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span class="active">POWER WINDOW</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>SUN ROOF</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>ALLOY WHEELS</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span class="active">ABS</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span class="active">AIRBAGS</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>4WD</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>POWER MIRROR</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>TV</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>cd</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>NAVIGATION</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>REVERSE SENSOR</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>FOG LAMP</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>RETRACTABLE</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>PUSH START</span>
                                    </div>
                                    <div class="col-xs-4 no-padding">
                                        <span>LEATHER SEAT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if($stock->status != 3)
    <div class="row mb-20">
        <div class="col-md-5 col-sm-4">
            <div class="company-info">
                <div class="compnay-logo">
                    <img src="{{ asset('/images/'.$settings->logo) }}" class="logo" alt="Gari-import Logo">
                </div>
                <div class="company-phone">
                    <div><i class="fa fa-volume-control-phone" aria-hidden="true"></i> <strong>Phone</strong></div>
                    <div><span>{{ $settings->hotline_number }}</span></div>
                </div>
                <div class="company-email">
                    <div><i class="fa fa-envelope" aria-hidden="true"></i> <strong>Email</strong></div>
                    <div><a href="#">{{ isset($settings) && $settings->email ? $settings->email:'--' }}</a></div>
                </div>
                <div class="company-address">
                    <div><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Address</strong></div>
                    <p>{!! $settings->contact_info !!}</p>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-8">
            <div class="panel panel-default price-quote">
                <div class="panel-heading">GET MORE INFORMATION</div>
                <div class="panel-body">
                    <div class="forming-tab">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <form action="{{ url('/stock-inquiry') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="inquiry_id" value="{{ $stock->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" readonly id="country" name="country" value="Bangladesh" placeholder="Bangladesh">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control @error('port') is-invalid @enderror" name="port">
                                                    <option selected>Select port...</option>
                                                    <option value="1">Port of Chittagong</option>
                                                    <option value="2">Port of Mongla</option>
                                                </select>
                                            </div>
                                            @error('port')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name">
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address">
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Mobile Number">
                                            </div>
                                            @error('phone')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" id="message" placeholder="Type your message here" rows="3"></textarea>
                                            </div>
                                            @error('message')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('style')

<style>
    .mag {
        width: 100%;
        margin: 0 auto;
        float: none;
    }

    .mag img {
        max-width: 100%;
    }

    .magnify {
        position: relative;
        cursor: none
    }

    .magnify-large {
        position: absolute;
        display: none;
        width: 200px;
        height: 125px;

        -webkit-box-shadow: 0 0 0 1px #0090d0, 0 0 7px 7px rgba(0, 0, 0, 0.25), inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
        -moz-box-shadow: 0 0 0 1px #0090d0, 0 0 7px 7px rgba(0, 0, 0, 0.25), inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
        box-shadow: 0 0 0 1px #0090d0, 0 0 7px 7px rgba(0, 0, 0, 0.25), inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
    }

    .simplegallery {
        margin: 0 auto;
        width: 100%;
        height: auto;
        overflow: hidden;
    }

    .simplegallery .content {
        background: #fff;
        position: relative;
        width: 100%;
        height: auto;
        overflow: hidden;
    }

    .simplegallery .content img {
        width: 100%;
        border: 1px solid #0000001c;
        /* min-height: 40vh; */
        vertical-align: middle;
        padding: 1rem;
    }

    div.clear {
        clear: both;
    }

    .simplegallery .thumbnail {
        margin-top: 10px;
        display: block;
        padding: 0px;
        margin-bottom: 0px;
        line-height: 1.42857143;
        border-radius: 0px;
        border: 0px solid #ddd;
        -webkit-transition: border .2s ease-in-out;
        -o-transition: border .2s ease-in-out;
        transition: border .2s ease-in-out;
        background-color: #fff;
    }

    .simplegallery .thumbnail .thumb {
        margin-left: 3px !important;
    }

    .simplegallery .thumbnail .thumb {
        display: inline-block;
        cursor: pointer;
        margin-left: 6px !important;
    }

    .simplegallery .thumbnail .thumb img {
        width: 123px;
    }

    .simplegallery .thumbnail .thumb img {
        border: 1px solid #0000001c;
        padding: 5px;
        width: 82px;
    }

    .kb-download-link {
        padding: 10px 0px 0px 6px;
    }

    .kb-download-link a {
        color: #8ec74a;
    }
</style>
@endsection

@section('page_js')
<script>
    function changeimg(url, e) {
        document.getElementById("img").src = url;
        $('.magnify-large').css('background', 'url(' + url + ')');
        console.log(url);
        let nodes = document.getElementById("thumb_img");
        let img_child = nodes.children;
        for (i = 0; i < img_child.length; i++) {
            img_child[i].classList.remove('active')
        }
        e.classList.add('active');

    }


</script>

@endsection

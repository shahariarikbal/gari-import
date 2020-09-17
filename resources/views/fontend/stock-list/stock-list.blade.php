@extends('layouts.app-web')

@section('content')
<div class="container stock-list-form">
    <div class="row">
        <div class="col-md-12">
            <h1>Stock List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <form id="searchForm" action="{{ route('search')}}" class="form-horizontal">
                <div class="form-group form-group-lg">
                    <label class="col-sm-4 control-label">Total Cars : {{ count($stocks) }}</label>
                    <div class="col-sm-8">
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
<div class="container-fluid">
    <div class="row table-responsive-media">
        <div class="col-md-12">
            <div class="table-responsive hidden-xs hidden-sm">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-center text-uppercase">Picture</th>
                            <th class="text-center text-uppercase">Stock ID</th>
                            <th class="text-center text-uppercase">Make <br /> Model</th>
                            <th class="text-center text-uppercase">Grade</th>
                            <th class="text-center text-uppercase">Chasis Code</th>
                            <th class="text-center text-uppercase">Year</th>
                            <th class="text-center text-uppercase">Color</th>
                            <th class="text-center text-uppercase">Engine CC</th>
                            <th class="text-center text-uppercase">FUEL</th>
                            <th class="text-center text-uppercase">Mileage</th>
                            <th class="text-center text-uppercase">Auction Point</th>
                            <th class="text-center text-uppercase">Price</th>
                            <th class="text-center text-uppercase">Inquiry</th>
                        </tr>
                    </thead>
                    @if(!empty($stocks))
                    @foreach($stocks as $key => $stockList)
                    <tbody class="text-center">
                        <tr>
                            <td height="100" width="100" style="vertical-align:middle;">
                                @if((sizeof($stockList->images) > 0) && file_exists('stockimg/'.$stockList->images[0]->image))
                                <a href="{{ url('/vehicles/'. makeHyphenUrl($stockList->make).'-'.makeHyphenUrl($stockList->model).'/'.$stockList->stocks_id) }}" target="_blank">
                                    <img src="{{ asset('/stockimg/'.$stockList->images[0]->image) }}" />
                                </a>
                                @else
                                <a href="{{ url('/vehicles/'. makeHyphenUrl($stockList->make).'-'.makeHyphenUrl($stockList->model).'/'.$stockList->stocks_id) }}" target="_blank">
                                    <img src="{{ asset('images/default_car.jpg') }}" alt=" car">
                                </a>
                                @endif
                            </td>
                            <td style="vertical-align:middle;"><a href="{{ url('/vehicles/'. makeHyphenUrl($stockList->make).'-'.makeHyphenUrl($stockList->model).'/'.$stockList->stocks_id) }}" target="_blank">
                                    {{ $stockList->stocks_id }}</a>
                            </td>
                            <td style="vertical-align:middle;">{{ $stockList->make }} <br>{{ $stockList->model }}</td>
                            <td style="vertical-align:middle;">{{ $stockList->grade }}</td>
                            <td style="vertical-align:middle;">{{ $stockList->chasis_code }}</td>
                            <td style="vertical-align:middle;">{{ $stockList->year }}</td>
                            <td style="vertical-align:middle; text-transform: capitalize">{{ $stockList->color }}</td>
                            <td style="vertical-align:middle; text-transform: capitalize">{{ $stockList->engine_cc }}</td>
                            <td style="vertical-align:middle; text-transform: capitalize">{{ $stockList->fuel }}</td>
                            <td style="vertical-align:middle; text-transform: capitalize">{{ $stockList->mileage }}</td>
                            <td style="vertical-align:middle; text-transform: capitalize">{{ $stockList->fob }}</td>
                            <td style="vertical-align:middle;">
                                <span style="vertical-align:middle;">{{ $stockList->price ? $stockList->price : 'N/A' }} BDT</span>
                            </td>
                            <td width="8%" style="vertical-align:middle;">
                                @if($stockList->status === 1)
                                <a href="#" class="badge custom-button-available" style="padding: 8px; background-color: red ">Upcoming</a>
                                @elseif($stockList->status === 2)
                                <a href="#" class="badge custom-button-available" style="padding: 8px; background-color: #0f8541 ">Available</a>
                                @else
                                <a href="#" class="badge custom-button-stock" style="padding: 8px; background-color: darkgray; margin-top: 15px;">Sold Out</a>
                                @endif

                                @if($stockList->status != 3)
                                <br />
                                <a class="badge custom-button-inquiry showInquiryModal" onclick="getInquiry({{ $stockList->id }})" style="padding: 8px; margin-top: 15px; background-color: #8ec74a ">Inquiry</a>
                                @endif
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                    @endforeach
                    @endif
                </table>
                @if(!empty($stocks))
                {{ $stocks->links() }}
                @endif
            </div>
            <div class="mobile-view hidden-xl hidden-lg hidden-md">
                @if(!empty($stocks))
                @foreach($stocks as $key => $stockList)
                <div class="vehicle-details">
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <div class="single-car-image">
                                @if((sizeof($stockList->images) > 0) && file_exists('stockimg/'.$stockList->images[0]->image))
                                <a href="{{ url('/vehicles/'. makeHyphenUrl($stockList->make).'-'.makeHyphenUrl($stockList->model).'/'.$stockList->stocks_id) }}" target="_blank">
                                    <img class="img-responsive" src="{{ asset('/stockimg/'.$stockList->images[0]->image) }}" alt="{{ $stockList->model }}">
                                </a>
                                @else
                                <a href="{{ url('/vehicles/'. makeHyphenUrl($stockList->make).'-'.makeHyphenUrl($stockList->model).'/'.$stockList->stocks_id) }}" target="_blank">
                                    <img class="img-responsive" src="{{ asset('images/default_car.jpg') }}">
                                </a>
                                @endif
                                <div class="availiable-btn">
                                    @if($stockList->status === 1)
                                    <a href="#" class="badge custom-button-available" style="padding: 8px; background-color: red ">Upcoming</a>
                                    @elseif($stockList->status === 2)
                                    <a href="#" class="badge custom-button-available" style="padding: 8px; background-color: #0f8541 ">Available</a>
                                    @else
                                    <a href="#" class="badge custom-button-stock" style="padding: 8px; background-color: darkgray; margin-top: 15px;">Sold Out</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-8">
                            <div class="car-name mb-5">
                                <a href="{{ url('/vehicles/'. makeHyphenUrl($stockList->make).'-'.makeHyphenUrl($stockList->model).'/'.$stockList->stocks_id) }}" target="_blank">{{ $stockList->make }}</a>
                            </div>
                            <div class="skypeId mb-10">
                                <strong>Stock ID :</strong><a href="{{ url('/vehicles/'. makeHyphenUrl($stockList->make).'-'.makeHyphenUrl($stockList->model).'/'.$stockList->stocks_id) }}" target="_blank">{{ $stockList->stocks_id }}</a>
                            </div>
                            <div class="row vehicle-info">
                                <div class="col-sm-4 mb-5">
                                    <div class="vehicle-grade">
                                        <span>{{ $stockList->model }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <div class="vehicle-sub-model">
                                        <span>{{ $stockList->grade }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <div class="vehicle-year-m">
                                        <span>{{ $stockList->year }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <div class="vehicle-color">
                                        <span>{{ $stockList->chasis_code }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <div class="vehicle-engine">
                                        <span>{{ $stockList->engine_cc }} CC</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-5">
                                    <div class="vehicle-mileage">
                                        <span>{{ $stockList->mileage }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="vehicle-cart">
                                <div>
                                    <span>Price: {{ $stockList->price }}</span>
                                </div>

                                <div>
                                    <a href="#"><i class="fa fa-shopping-cart fa-lg"></i></a>
                                    <a href="#"><i class="fa fa-star-o fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($stockList->status != 3)
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" onclick="getInquiry({{ $stockList->id }})" class="btn btn-block btn-primary"><i class="fa fa-envelope"></i> Inquiry</button>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <!-- <div class="col-md-12" style="border-bottom: 1px solid lightgray; margin-top: 15px;"></div> -->
        <div class="modal fade" id="inquiryModal" tabindex="-1" role="dialog" aria-labelledby="inquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="inquiryModalLabel">Stock Inquiry</h3>
                        <button type="button" class="close" style="margin-top: -30px;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="image-wrap">
                                    <img id="incImage" src="{{ asset('images/default_car.jpg') }}" class="img-thumbnail img-fluid">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h4 id="make" style="margin-top: 0"></h4>
                                <table class="table">
                                    <tr>
                                        <th style="font-size: 11px">CHASSIS CODE:</th>
                                        <td id="chasis_code" style="font-size: 11px"></td>

                                        <th style="font-size: 11px">COLOR:</th>
                                        <td id="color" style="font-size: 11px"></td>
                                    </tr>
                                    <tr>
                                        <th style="font-size: 11px">ENGINE CC:</th>
                                        <td id="engine_cc" style="font-size: 11px"></td>

                                        <th style="font-size: 11px">YEAR:</th>
                                        <td id="year" style="font-size: 11px">2017 / 8</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <h5 style="margin-top: 0">PRICE: &nbsp; <span id="price"></span></h5>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px">
                                <div class="panel panel-default price-quote">
                                    <div class="panel-heading">GET MORE INFORMATION</div>
                                    <div class="panel-body">
                                        <div class="forming-tab">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="home">
                                                    <form action="{{ url('/stock-inquiry') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="inquiry_id" id="id">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('/plugin/') }}/images-grid.css">
@endsection


@section('page_js')
<script>
    function getInquiry(stockId) {
        $.ajax({
            type: 'GET',
            url: "{{ url('inquiry-data-show') }}/" + stockId,
            dataType: 'json',
            success: function(data) {
                // console.log(data.stock_data.id)
                if (data.status === 200) {
                    $('#inquiryModal').modal('show');
                    $('#id').val(data.stock_data.id);
                    $("#make").text(data.stock_data.make);
                    $("#chasis_code").text(data.stock_data.chasis_code);
                    $("#color").text(data.stock_data.color);
                    $("#engine_cc").text(data.stock_data.engine_cc);
                    $("#year").text(data.stock_data.year);
                    $("#price").text(data.stock_data.price);
                    $("#incImage").attr("src", data.stock_data.image);
                }

            },
            error: function() {
                console.log(data);
            }
        });
    }
</script>
@endsection
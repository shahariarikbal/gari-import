@extends('layouts.app-web')

@section('content')
<div class="container-fluid">
    <h2 class="text-center" style="padding:1.5rem 0; color:#c4302b;">Stock List</h2>
    <div class="row">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form id="searchForm" action="{{ route('search')}}" class="form-horizontal">
                    <div class="form-group form-group-lg">
                        <label class="col-sm-4 control-label">Total Cars : {{ count($stocksSearch) }}</label>
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
    <div class="row" style="margin:30px 0">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Picture</th>
                            <th class="text-center">Stock ID</th>
                            <th class="text-center">Make</th>
                            <th class="text-center">Model</th>
                            <th class="text-center">Grade</th>
                            <th class="text-center">Chasis Code</th>
                            <th class="text-center">Year</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Engine CC</th>
                            <th class="text-center">FUEL</th>
                            <th class="text-center">Mileage</th>
                            <th class="text-center">FOB</th>
                            <th class="text-center">CNF</th>
                            <th class="text-center">Inquiry</th>
                        </tr>
                    </thead>
                    @foreach($stocksSearch as $key => $stockList)
                    <tbody class="text-center">
                    <tr>
                        <td height="100" width="100" style="vertical-align:middle;">
                            @if((sizeof($stockList->images) > 0) && file_exists('stockimg/'.$stockList->images[0]->image))
                                <a href="{{ url('/vehicles/'. makeHyphenUrl($stockList->make).'-'.makeHyphenUrl($stockList->model).'/'.$stockList->stocks_id) }}" target="_blank">
                                    <img src="{{ asset('/stockimg/'.$stockList->images[0]->image) }}"/>
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
                        <td style="vertical-align:middle;">{{ $stockList->color }}</td>
                        <td style="vertical-align:middle;">{{ $stockList->engine_cc }}</td>
                        <td style="vertical-align:middle;">{{ $stockList->fuel }}</td>
                        <td style="vertical-align:middle;">{{ $stockList->mileage }}</td>
                        <td style="vertical-align:middle;">{{ $stockList->cnf }}</td>
                        <td style="vertical-align:middle;">
                            <span style="vertical-align:middle;">{{ $stockList->price ? $stockList->price : 'N/A' }}</span>
                        </td>
                        <td width="8%" style="vertical-align:middle;">
                            @if($stockList->status === 1)
                                <a href="#" class="badge custom-button-available" style="padding: 8px; background-color: red ">Upcoming</a>
                            @elseif($stockList->status === 2)
                                <a href="#" class="badge custom-button-available" style="padding: 8px; background-color: #0f8541 ">Available</a>
                            @else
                                <a href="#" class="badge custom-button-stock" style="padding: 8px; background-color: darkgray; margin-top: 15px;">Out of Stock</a>
                            @endif
                            <br/>
                            <a class="badge custom-button-inquiry showInquiryModal" onclick="getInquiry({{ $stockList->id }})" style="padding: 8px; margin-top: 15px; background-color: #8ec74a ">Inquiry</a>
                        </td>
                        <td></td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- <div class="col-md-12" style="border-bottom: 1px solid lightgray; margin-top: 15px;"></div> -->
    </div>
</div>
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('/plugin/') }}/images-grid.css">
<style>
    body {
        font-family: Arial;
    }

    * {
        box-sizing: border-box;
    }

    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        border-radius: 8px 0px 0px 8px;
        /*background: #f1f1f1;*/
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example button:hover {
        background: #0b7dda;
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
@endsection
@section('page_js')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="{{ asset('/plugin/') }}/images-grid.js"></script>

<script>
        @foreach($stocks as $key => $stockData)
    var images{{ $stockData->id }} = [
            @foreach($stockData['images'] as $picture)
                "{{ asset('/stockimg/'.$picture->image) }}",
            @endforeach
        ];
    $(function() {
        $(".gallery{{ $stockData->id }}").imagesGrid({
            images: images{{ $stockData->id }}
        });
    });
    @endforeach
</script>
@endsection

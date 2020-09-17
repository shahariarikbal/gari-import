@extends('layouts.app-web')

@section('content')
    <div class="order-page">
        <div class="container-fluid">
            <div class="row mb-20" style="margin-top: 20px;">
                <div class="col-md-12 mb-10">
                    <ul class="order-number">
                        <li><span class="text-success">ORDER</span></li>
                        <li>{{ $chassisData['reportData'][0]['chassis'] }}</li>
                        <li>
                            <a href="{{ route('web.pdfview', ['url_id'=>$chassisData['url_id']]) }}" target="_blank"><img src="{{ asset('images/order/pdf.png') }}" alt="pdf"></a>
{{--                            <a href="#"><img src="{{ asset('images/order/_prn.png') }}" alt="prn"></a>--}}
                        </li>
                    </ul>
                </div>
            </div>
            {{-- @php
                    dd($chassisData['reportData']);
                @endphp--}}
            @foreach($chassisData['reportData'] as $rk =>$mainReport)
                <div class="row mb-20">
                    <div class="col-md-12">
                        <table class="true-report-table" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <tr>
                                <td class="top-image">
                                    <img src="{{ asset('images/order/tr_top.gif') }}" alt="true-image">
                                </td>
                            </tr>
                            <tr>
                                <td class="table-info">
                                    <table cellpadding="0" cellspacing="0" class="data-table">
                                        <tbody>
                                        @if($chassisData['reportData'][$rk]['chassis'])
                                            <tr>
                                                <td></td>
                                                <td class="title-text">{{ $chassisData['reportData'][$rk]['chassis'] }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td><br></td>
                                                <td><br></td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['auction'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Auction</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['auction'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['auction_date'])
                                            <tr class="bg-white">
                                                <td>
                                                    <nobr>Auction Date</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['auction_date'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['lot_number'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Lot number</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['lot_number'] }}</td>
                                            </tr>
                                        @endif

                                        @if($chassisData['reportData'][$rk]['chassis_ID'])
                                            <tr class="bg-white">
                                                <td>
                                                    <nobr>Chassis ID</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['chassis_ID'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['vendor'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Brand</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['vendor'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['model'])
                                            <tr class="bg-white">
                                                <td>
                                                    <nobr>Model</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['model'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['mileage'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Mileage</nobr>
                                                </td>
                                                <td><span class="text-orange">{{ $chassisData['reportData'][$rk]['mileage'] }}</span></td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['engine_CC'])
                                            <tr class="bg-white">
                                                <td>
                                                    <nobr>Engine CC</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['engine_CC'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['year'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Year</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['year'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['grade'])
                                            <tr class="bg-white">
                                                <td>
                                                    <nobr>Grade</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['grade'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['equipment'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Equipment</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['equipment'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['transmission'])
                                            <tr class="bg-white">
                                                <td>
                                                    <nobr>Transmission</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['transmission'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['start_price'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Start price</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['start_price'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['finish_price'])
                                            <tr class="bg-white">
                                                <td>
                                                    <nobr>Finish price</nobr>
                                                </td>
                                                <td><span class="text-green">{{ $chassisData['reportData'][$rk]['finish_price'] }}</span></td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['color'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Color</nobr>
                                                </td>
                                                <td>{{ $chassisData['reportData'][$rk]['color'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['condition'])
                                            <tr class="bg-white">
                                                <td>
                                                    <nobr>Condition</nobr>
                                                </td>
                                                <td><span class="text-orange">{{ $chassisData['reportData'][$rk]['condition'] }}</span></td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['status'])
                                            <tr class="bg-gray">
                                                <td>
                                                    <nobr>Status</nobr>
                                                </td>
                                                <td><span class="text-green">{{ $chassisData['reportData'][$rk]['status'] }}</span></td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="bottom-image">
                                    <img src="{{ asset('images/order/tr_bot.gif') }}">
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        @if(isset($chassisData['reportData'][$rk]['img0']))
                            <span class="graphImage">
                    <a href="{{ $chassisData['reportData'][$rk]['img0'] }}" target="_blank">
                        <img src="{{ $chassisData['reportData'][$rk]['img0'] }}" alt="report">
                    </a>
                </span>
                        @endif



                        @if(isset($chassisData['reportData'][$rk]['img1']))

                            <a class="car-images" href="{{ $chassisData['reportData'][$rk]['img1'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img1'] }}" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img2']))

                            <a class="car-images" href="{{ $chassisData['reportData'][$rk]['img2'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img2'] }}" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img3']))

                            <a class="car-images" href="{{ $chassisData['reportData'][$rk]['img3'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img3'] }}" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img4']))

                            <a class="car-images" href="{{ $chassisData['reportData'][$rk]['img4'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img4'] }}" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img5']))

                            <a class="car-images" href="{{ $chassisData['reportData'][$rk]['img5'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img5'] }}" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img6']))

                            <a class="car-images" href="{{ $chassisData['reportData'][$rk]['img6'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img6'] }}" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12 action-explanation">
                    <span><u>Auction list explanation</u></span>
                    <ul>
                        <li>A1 Small Scratch</li>
                        <li>A2 Scratch</li>
                        <li>A3 Big Scratch</li>
                        <li>E1 Few Dimples</li>
                        <li>E2 Several Dimples</li>
                        <li>E3 Many Dimples</li>
                        <li>U1 Small Dent</li>
                        <li>U2 Dent</li>
                        <li>U3 Big Dent</li>
                        <li>W1 Repair Mark/Wave (hardly detectable)</li>
                        <li>W2 Repair Mark/Wave</li>
                        <li>W3 Obvious Repair Mark/Wave (needs to be repainted)</li>
                        <li>S1 Rust</li>
                        <li>S2 Heavy Rust</li>
                        <li>C1 Corrosion</li>
                        <li>C2 Heavy Corrosion</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel=stylesheet type="text/css">
@endsection

@section('page_js')
@endsection

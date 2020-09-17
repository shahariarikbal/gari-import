@extends('layouts.app-web')

@section('content')
<div class="order-page">
    <div class="container-fluid">
        <div class="row mb-20">
            <div class="col-md-12 mb-10">
                <div class="btn-groups order-btn-groups">
                    <a class="btn btn-primary btn-sm mb-5" href="#" role="button">Start</a>
                    <a class="btn btn-success btn-sm mb-5" href="#" role="button">Saved</a>
                    <a class="btn btn-warning btn-sm mb-5" href="#" role="button">Sample</a>
                    <a class="btn btn-info btn-sm mb-5" href="#" role="button">Manual</a>
                    <a class="btn btn-danger btn-sm mb-5" href="#" role="button">Report+</a>
                </div>
            </div>
            <div class="col-md-12 mb-10">
                <ul class="order-number">
                    <li><span class="text-success">ORDER</span></li>
                    <li>NZE141-3021542</li>
                    <li>
                        <a href="#"><img src="{{ asset('images/order/pdf.png') }}" alt="pdf"></a>
                        <a href="#"><img src="{{ asset('images/order/_prn.png') }}" alt="prn"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mb-20">
            <div class="col-md-5 col-lg-3 mb-10 w-35">
                <div class="order-table">
                    <img src="{{ asset('images/order/tr_top.gif') }}" class="img-responsive" alt="true-image">
                    <table class="table">
                        <tr>
                            <td></td>
                            <td class="orders_id">NZE141-3021542</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Auction</nobr>
                            </td>
                            <td>ARAI Bayside</td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Auction date</nobr>
                            </td>
                            <td>2017-12-15</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Lot number</nobr>
                            </td>
                            <td>7723</td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Chassis ID</nobr>
                            </td>
                            <td>NZE141</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Brand</nobr>
                            </td>
                            <td>TOYOTA</td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Model</nobr>
                            </td>
                            <td>COROLLA AXIO</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Mileage</nobr>
                            </td>
                            <td><span style="color:#a93f15">20 000 km</span></td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Engine CC</nobr>
                            </td>
                            <td>1500</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Year</nobr>
                            </td>
                            <td>2012</td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Grade</nobr>
                            </td>
                            <td>X</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Inspection</nobr>
                            </td>
                            <td>2019.05</td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Equipment</nobr>
                            </td>
                            <td>AC</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Transmission</nobr>
                            </td>
                            <td>FAT</td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Start price</nobr>
                            </td>
                            <td>0</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Finish price</nobr>
                            </td>
                            <td><span style="color:#73aa00">753000 JPY</span></td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Color</nobr>
                            </td>
                            <td>SILVER</td>
                        </tr>
                        <tr class="active">
                            <td>
                                <nobr>Condition</nobr>
                            </td>
                            <td><span style="color:#a93f15">3.5</span></td>
                        </tr>
                        <tr>
                            <td>
                                <nobr>Status</nobr>
                            </td>
                            <td><span style="color:#73aa00">sold</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-4 col-md-7 w-65 mb-10">
                <img src="{{ asset('images/order/report.jpg') }}" class="img-resposnive" alt="report">
            </div>
            <div class="col-lg-5 col-md-12 w-100 mb-10">
                <div class="car-images">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6 col-xs-6 mb-10">
                            <a href="#"><img src="https://8.ajes.com/imgs/e1f9PbrR4rJDRgFGsBbDfLC2lgpDM4JieSMCjcmLjPEnmowUrQwHKfKGHWdxqGaQ5w3wJLWxeqVXUFyg7zdLOPv8WtRq7M9YRrY7O97O02M1IIe5dJpkUmButrtz9T8Dn" class="img-resposnive img-thumbnail" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@endsection

@section('page_js')
@endsection

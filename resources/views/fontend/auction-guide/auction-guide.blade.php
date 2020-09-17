@extends('layouts.app-web')

@section('content')
<div class="page-header--section" style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title section--title">
                    <h1 class="h1">Auction sheet Guide</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="background-color: #c4302b; font-size: 20px; padding: 10px;">
            <p style="color: white; border-left: 3px solid #ffffff">&nbsp;WHAT IS ONLINE AUTO AUCTION?</p>
        </div>
        <div class="col-md-12" style="margin-bottom: 20px;">
            <div class="row">
                <div class="col-md-12" style="border: 1px solid #cccccc">
                    <div class="row">
                        <div class="col-md-12">
                            <p style="margin-top: 10px;">
                                Not a long time back, people looking for used cars from auctions had to visit the auction sites physically,
                                wait for the category of their choice, bid manually and repeat the process until they land up with a car.
                                But now, due to the presence of online industry, the importers don’t have to go through this process physically as
                                they can access the auctions online through services providers.
                                <br />
                                Online auctions save you from a lot of complications and troubles,
                                as understanding the auction procedures is not an easy task. Firstly,
                                there are a lot of auction houses in Japan, and the auctions are categorized on regional and other basis,
                                with specific times scheduled for each. A person cannot be practically present at all auction sites and can miss out on ideal cars.
                                <br />
                                Through online auction services, you can be assured that none of the cars that falls into your
                                desired category is not completely missed out, whereas the personnel responsible for bidding on your
                                behalf are well trained specifically for this job so you can get the best used car based on your criteria.
                                Moreover, the bidding management system developed by ‘Auction House Japan’ ensures that the process is flawless and convenient for you.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <h4 style="border-left: 3px solid #c4302b; color:#c4302b;margin:15px 0;">&nbsp;UNDERSTANDING THE AUCTION SHEET</h4>
                            <span>
                                Not a long time back, people looking for used cars from auctions had to visit the auction sites physically,
                                wait for the category of their choice, bid manually and repeat the process until they land up with a car.
                                But now, due to the presence of online industry, the importers don’t have to go through this process physically as
                                they can access the auctions online through services providers.
                            </span>
                        </div>
                        <div class="col-md-5">
                            <img src="{{ asset('/fontend/assets/img/auction_sheet_guide.jpg') }}" class="img-responsive" alt="auction_sheet_guide" style="width:100%; margin:10px 0;" />
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="padding: 10px; background-color: #d1d1d1">&nbsp;AUCTION GRADE</h4>
                        </div>
                    </div>
                    <div class="row action-grade">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b">S</b></td>
                                        <td>New</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b">5</b></td>
                                        <td>Same as New</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b">4.5</b></td>
                                        <td>Excellent grade with almost no issue</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b">4</b></td>
                                        <td>Great grade with minor issues only</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b">3.5</b></td>
                                        <td>Good grade with some issues that may need repair</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b">3</b></td>
                                        <td>Average grade with issues to fix</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b">2</b></td>
                                        <td>Bad grade</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b">1</b></td>
                                        <td>Engine swap or has been under water</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b; font-size: 24px;">*</b></td>
                                        <td>Non running car, needs a forklift to be moved. But also mentioned for any motorbike or machinery</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 15px; color: #0b0b0b">R or O</b></td>
                                        <td>Accident history repaired. Repaired parts are mostly informed on auction sheet</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 15px; color: #0b0b0b">RA</b></td>
                                        <td>Minor accident repaired (core support or back panel only)</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 15px; color: #0b0b0b">RB</b></td>
                                        <td>Heavy repair (till inner panel or floor)</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 15px; color: #0b0b0b">RC</b></td>
                                        <td>Pillar or frame has been changed/repaired</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 15px; color: #0b0b0b">R2</b></td>
                                        <td>Accident history and mostly rust or corrosion issue</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="padding: 10px; background-color: #d1d1d1">&nbsp;INSIDE GRADE</h4>
                        </div>
                    </div>
                    <div class="row action-grade">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 25px; color: #0b0b0b; font-weight: 500">A</b></td>
                                        <td>Excellent interior condition</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 25px; color: #0b0b0b; font-weight: 500">B</b></td>
                                        <td>Good or average condition with imperfections</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 25px; color: #0b0b0b; font-weight: 500">C</b></td>
                                        <td>Good condition with some imperfections</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 25px; color: #0b0b0b; font-weight: 500">D</b></td>
                                        <td>Bad interior condition</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="padding: 10px; background-color: #d1d1d1">&nbsp;DETAILED BODY CONDITION</h4>
                        </div>
                    </div>
                    <div class="row action-grade">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 25px; color: #0b0b0b; font-weight: 500">1</b></td>
                                        <td>Minor, almost not noticeable (eg A1, U1)</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 25px; color: #0b0b0b; font-weight: 500">2</b></td>
                                        <td>Small but noticeable (eg A2, U2)</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 25px; color: #0b0b0b; font-weight: 500">3</b></td>
                                        <td>Average or big (eg A3, U3)</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 25px; color: #0b0b0b; font-weight: 500">4</b></td>
                                        <td>Big (Japanese kanji for "big")</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="padding: 10px; background-color: #d1d1d1">&nbsp;VEHICLE OPTIONS</h4>
                        </div>
                    </div>
                    <div class="row action-grade">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b; font-weight: 500">SR</b></td>
                                        <td>Sunroof</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b; font-weight: 500">AW</b></td>
                                        <td>Alloy Wheel</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b; font-weight: 500">PS</b></td>
                                        <td>Power Steering</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 20px; color: #0b0b0b; font-weight: 500">PW</b></td>
                                        <td>Power Window</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 0px; color: #0b0b0b; font-weight: 500">カワor革</b></td>
                                        <td>Leather Seats</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 0px; color: #0b0b0b; font-weight: 500">TV</b></td>
                                        <td>TV</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 0px; color: #0b0b0b; font-weight: 500">ナビ</b></td>
                                        <td>Navigation System</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" style="background-color: #ff8f00; height: 50px;"><b style="margin-left: 0px; color: #0b0b0b; font-weight: 500">エアB </b></td>
                                        <td>Airbag</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="padding: 10px; background-color: #d1d1d1">&nbsp;TRANSMISSION</h4>
                        </div>
                    </div>
                    <div class="row action-grade">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 0px; color: #0b0b0b; font-weight: 500">Menual</b></td>
                                        <td>F5, F6, MT, 5MT, 6MT</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <tr>
                                        <td width="15%" style="background-color: #d3d3d3; height: 50px;"><b style="margin-left: 10px; color: #0b0b0b; font-weight: 500">Auto</b></td>
                                        <td>AT, FA, FAT, CVT</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 30px;">
                        <div class="col-md-12">
                            <h4 style="border-left: 3px solid #c4302b; color:#c4302b;margin:15px 0;">&nbsp;TYPES OF AUCTION SHEET</h4>
                            <p>Below are examples of the auction sheets used by the main auction houses with the key areas translated into English.</p>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <tr>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/haa-kobe-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">HAA KOBE</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/caa-kobe-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">CAA KOBE</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/ju-aichi-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">JU AICHI AUCTION</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/ju-gifu-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">JU GIFU</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/uss-auction-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">USS AUCTION</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/zip-auction-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">ZIP AUCTION</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/laa-auction-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">LAA AUCTION</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/ju-aichi-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">RYUTSU AUCTION</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/ju-auction-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">JU AUCTION</p>
                                        </td>
                                        <td>
                                            <img src="{{ asset('/fontend/auction-img/arai-auction-image.jpg') }}" style="height: 300px; width: 200px; margin-top: 10px;" />
                                            <p style="margin-left: 30px; font-size: 18px; margin-top: 20px; color: #0b0b0b">ARAI AUTO AUCTION</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 30px;">
                            <p style="font-size: 30px;color: #c4302b;margin: 3rem 0;text-align: center;font-weight: bold;">&nbsp;BIDDING RESULTS</p>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tr style="background-color: #c4302b;">
                                        <td>
                                            <p style="font-size: 18px; color: white; margin-left: 20px;">BIDDING OUTCOMES</p>
                                        </td>
                                        <td>
                                            <p style="font-size: 18px; color: white; text-align: center">STATUS</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="m-l-20">You purchase a car matching your budget or close to it.</span></td>
                                        <td class="txt-align">
                                            <p class="p-bold p-color">BOUGHT</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="m-l-20">Car purchased by someone before you in the auction.</span></td>
                                        <td class="txt-align">
                                            <p class="p-bold p-color">SOLD</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="m-l-20">The bids do not reach the reserve price set by sellers.</span></td>
                                        <td class="txt-align">
                                            <p class="p-bold p-color">PASSED</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="m-l-20">A passed vehicle sold after negotiation on price.</span></td>
                                        <td class="txt-align">
                                            <p class="p-bold p-color"> IN NESOLDGOTIATION</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="m-l-20">A vehicle removed from auction by the seller during the process.</span></td>
                                        <td class="txt-align">
                                            <p class="p-bold p-color">REMOVED</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 30px;">
            <span>
                <b style="color: #0b0b0b;">Disclaimer:</b><br />
                Auction House Japan only facilitates its customers in getting used cars from auction houses in Japan.
                We do not hold auctions on our own and/or anyone’s behalf.
                Every auction House listed on our website is a separate entity of its own.
            </span>
        </div>
    </div>
</div>
@endsection
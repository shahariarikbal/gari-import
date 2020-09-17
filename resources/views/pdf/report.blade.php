<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report - {{ $chassisData['reportData'][0]['chassis'] }}</title>
{{--    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel=stylesheet type="text/css">
    <style>
        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 0cm 0cm;
        }


        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 0.5cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        header {
            position: fixed;
            top: 30px;
            /*left: 80px;*/
            right: 0cm;
            margin-left: 0.5cm;
        }

        footer {
            position: absolute;
            bottom: 0;
        }

    </style>
</head>
<body>

<header>
    <div class="col-md-12">
        <table style="width:700px;" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td style="width: 105px;">
                    <img src="{{ asset('/fontend/jdcenter.jpg') }}" style="height: 80px; width: 80px;" class="logo" alt="Gari-import Logo">
                </td>
                <td style="width: 100px; height: 100px;">
                    <a href="{{ route('web.chassisReport', ['url_id'=>$chassisData['url_id']]) }}" target="_blank">
                        {!!DNS2D::getBarcodeHTML(route('web.chassisReport', ['url_id'=>$chassisData['url_id']]), 'QRCODE', 2,2)!!}
                    </a>
                </td>
                <td style="width: 400px;">
                    <small>use QR code to VERIFY paper</small><br/>
                    <a href="{{ route('web.chassisReport', ['url_id'=>$chassisData['url_id']]) }}" target="_blank">
                        http://gari-import.com.bd/report/{{ $chassisData['url_id'] }}
                    </a><br/>
                    <img src="{{ asset('/fontend/true-report.png') }}" style="height: 55px;" class="logo" alt="Gari-import Logo">
                </td>
                <td style="width: 100px;">
                    <span style="margin-left: 20px;">Powered by</span><br/>
                    <img src="{{ asset('/images/'.$settings->logo) }}" style="margin-right: 70px; border: 0px solid #000000; width: 160px;" class="logo" alt="Gari-import Logo">
                </td>
            </tr>
        </table>
    </div>
</header>


<main>
    <div class="order-page">
        <div class="container-fluid">
            @foreach($chassisData['reportData'] as $rk =>$mainReport)
                <div class="row mb-20" style="margin-top: 20px!important; margin-right: 30px;">
                    <div class="col-md-12">
                        <table style="margin:10px 18px 0px 0px;width:365px;" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <tr>
                                <td style="font-size: 0px; height: 89px;">
                                    <img src="{{ asset('images/order/tr_top.gif') }}" style="height: 89px; width: 365px;" alt="true-image">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0px 0px 0px 19px; background:url(https://jpcenter.ru/images/true_report/tr_cen.gif) repeat-y">
                                    <table cellpadding="0" cellspacing="0" style="width:320px; margin:-6px 0px 5px 0px;">
                                        <tbody>
                                        @if($chassisData['reportData'][$rk]['chassis'])
                                            <tr>
                                                <td></td>
                                                <td style="font-size:20px; font-family: Oswald, Tahoma;">{{ $chassisData['reportData'][$rk]['chassis'] }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td><br></td>
                                                <td><br></td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['auction'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Auction</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['auction'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['auction_date'])
                                            <tr class="bg-white">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Auction Date</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['auction_date'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['lot_number'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Lot number</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['lot_number'] }}</td>
                                            </tr>
                                        @endif

                                        @if($chassisData['reportData'][$rk]['chassis_ID'])
                                            <tr class="bg-white">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Chassis ID</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['chassis_ID'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['vendor'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Brand</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['vendor'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['model'])
                                            <tr class="bg-white">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Model</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['model'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['mileage'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Mileage</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;"><span style="color:#a93f15;">{{ $chassisData['reportData'][$rk]['mileage'] }}</span></td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['engine_CC'])
                                            <tr class="bg-white">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Engine CC</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['engine_CC'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['year'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Year</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['year'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['grade'])
                                            <tr class="bg-white">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Grade</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['grade'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['equipment'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Equipment</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['equipment'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['transmission'])
                                            <tr class="bg-white">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Transmission</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['transmission'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['start_price'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Start price</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['start_price'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['finish_price'])
                                            <tr class="bg-white">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Finish price</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;"><span style="color:#73aa00;">{{ $chassisData['reportData'][$rk]['finish_price'] }}</span></td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['color'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Color</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">{{ $chassisData['reportData'][$rk]['color'] }}</td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['condition'])
                                            <tr class="bg-white">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Condition</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;"><span class="text-orange">{{ $chassisData['reportData'][$rk]['condition'] }}</span></td>
                                            </tr>
                                        @endif
                                        @if($chassisData['reportData'][$rk]['status'])
                                            <tr style="background:#f0f0f0;">
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;">
                                                    <nobr>Status</nobr>
                                                </td>
                                                <td style="border-bottom: 0px solid #999;font-weight: bold; color: #000000; font-family:Oswald, Tahoma;font-size: 16px;padding: 0px 2px 0px 7px;color: #000;"><span style="color:#73aa00;">{{ $chassisData['reportData'][$rk]['status'] }}</span></td>
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

                        <footer>
                            <div class="row" style="margin-top: 30px;">
                                <div class="col-md-6 action-explanation" style="float: left; margin-right: 50px;">
                                    <span style="font-size: 14px; margin-bottom: 10px;"><u>Auction list explanation</u></span>
                                    <ul style="margin: 10px 0px 0px 0px; padding: 0px; font-size: 12px; list-style-type: none">
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
                                <div class="col-md-6 action-explanation">
                                    <ul style="margin: 25px 0 0 0; padding: 0px; font-size: 12px; list-style-type: none;">
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
                        </footer>

                        @if(isset($chassisData['reportData'][$rk]['img0']))
                            <span style="display: block; margin-bottom: 10px;">
                                <a href="{{ $chassisData['reportData'][$rk]['img0'] }}" target="_blank">
                                    <img src="{{ $chassisData['reportData'][$rk]['img0'] }}" style="height:500px;max-width:500px; margin-bottom: 15px; margin-top: 50px;" alt="report">
                                </a>
                            </span>
                            <br>
                        @endif

                        @if(isset($chassisData['reportData'][$rk]['img1']))
                            <a style="font-size:0px;float:left;border:1px solid #0a51a1;margin:0px 18px 6px 0px;" href="{{ $chassisData['reportData'][$rk]['img1'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img1'] }}" style="width: 153px;" alt="{{ $chassisData['url_id'] }}">
                            </a>
                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img2']))

                            <a style="font-size:0px;float:left;border:1px solid #0a51a1;margin:0px 18px 6px 0px;" href="{{ $chassisData['reportData'][$rk]['img2'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img2'] }}" style="width: 153px;" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img3']))

                            <a style="font-size:0px;float:left;border:1px solid #0a51a1;margin:0px 18px 6px 0px;" href="{{ $chassisData['reportData'][$rk]['img3'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img3'] }}" style="width: 153px;" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img4']))

                            <a style="font-size:0px;float:left;border:1px solid #0a51a1;margin:0px 18px 6px 0px;" href="{{ $chassisData['reportData'][$rk]['img4'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img4'] }}" style="width: 153px;" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img5']))

                            <a style="font-size:0px;float:left;border:1px solid #0a51a1;margin:0px 18px 6px 0px;" href="{{ $chassisData['reportData'][$rk]['img5'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img5'] }}" style="width: 153px;" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        @if(isset($chassisData['reportData'][$rk]['img6']))

                            <a style="font-size:0px;float:left;border:1px solid #0a51a1;margin:0px 18px 6px 0px;" href="{{ $chassisData['reportData'][$rk]['img6'] }}">
                                <img src="{{ $chassisData['reportData'][$rk]['img6'] }}" style="width: 153px;" alt="{{ $chassisData['url_id'] }}">
                            </a>

                        @endif
                        <div style="clear: both; margin-bottom: 100px;"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>


</body>
</html>


@extends('layouts.app-web')

@section('content')
    <div class="page-header--section" style="margin-top: 50px;">
        <div class="container">
            <div class="title section--title">
                <h1 class="h1">Verify Auction Sheet</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 bank-shadow" style="border: 1px solid #cccccc; margin-bottom: 40px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="padding: 20px;">
                            @if(empty($chassisData))
                            <div class="title" style="padding-bottom: 20px">
                                <p><strong>Get the original Auction Sheet Verification by GARI-IMPORT.com.bd to buy the Japanese car with complete peace of mind ! </strong></p>
                                <p>This report is an exact briefing of scratches, repairs, dents, paint or repair marks, replaced parts, mileage, airbags, rust, and corrosion assessment, interior/exterior condition and accident history ever happened before importing the car in Bangladesh. Now you can verify more than 12 years old auction sheets.</p>
                                <p><strong>Just Enter the chassis number of your car to get original auction sheet </strong> only at BDT 900 Taka</p>
                            </div>
                            @endif
                            <form id=formID action="{{ route('web.chassis-check') }}">
                                <div class="row">
                                    <div class="col-sm-10 col-xs-7">
                                        <label class="sr-only" for="">Chassis ID-Number or VIN</label>
                                        <input type="text" class="form-control" name="chassis" placeholder="Chassis ID-Number or VIN">
                                    </div>

                                    <div class="col-sm-2 col-xs-5">
                                        <button type="submit" class="btn btn-primary btn-block">Find</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card" style="padding-top: 0!important;">
                            @if(isset($chassisData))
                                <script>
                                    var ff=document.forms["formID"];
                                    ff["chassis"].value="{{$chassisData['chassis']==''?'NZE141-6048723':$chassisData['chassis']}}";
                                    ff["max_date"].value="{{ $chassisData['date'] }}";
                                    ff["year"].value="{{ $chassisData['year'] }}";
                                    function filter_update(n) {
                                        var l = document.querySelectorAll(".car_selector_all");
                                        for(var i=0;i<l.length;i++){l[i].style.display="";}
                                        for(var i=0;i<l.length;i++){
                                            var k=0,class_arr=l[i].className.split(" ");
                                            for(c in class_arr) {
                                                if (class_arr[c]=="car_selector_all") {continue;}
                                                if(class_arr[c]==n){k=1;}
                                            }
                                            if (k==0) {l[i].style.display="none";}
                                        }
                                    }
                                </script>

                                <div class=output>
                                    @php
                                        if ($chassisData['key'] == 'dsIPw5vx59cyHwkHWR7'){
                                            $arr = r_get($chassisData['code'], 'NZE141-6048723', '', '', 'dsIPw5vx59cyHwkHWR7');
                                            echo r_show($arr).r_info($arr);
                                            die();
                                        }

                                        $arr = r_get($chassisData['code'], $chassisData['chassis'], $chassisData['year'], $chassisData['date'], $chassisData['key']);
                                        echo r_info($arr);

                                        if ($chassisData['key'] == '') {
                                            r_list($arr, $chassisData['chassis'], $chassisData['year'], $chassisData['date']);
                                        } else {
                                            r_show($arr);
                                        }
                                    @endphp
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

        @if(empty($chassisData))
        <div class="row mb-20">
            <div class="col-md-1"></div>

            <div class="col-md-10 bank-shadow" style="border: 1px solid #cccccc;">
                <div class="card payment-card text-center">
                    <!-- <h1>payment methods</h1> -->
                    <ul>
                        <li><a href="#" target="_blank"><img src=" {{ asset('images/payment-card/payment.png') }}" alt=""></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-1"></div>
        </div>
        @endif
    </div>

    <div class="modal fade userInfoModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                        <div class="form-group">
                            <label class="sr-only" for="name">Your Name</label>
                            <input type="text" class="form-control" value="{{ old('customer_name') }}" name="customer_name" id="customer_name" required placeholder="Your Name">
                            @error('customer_name')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="email">Email Address</label>
                            <input type="text" class="form-control" value="{{ old('customer_email') }}" name="customer_email" id="customer_email" required placeholder="Email Address">
                            @error('customer_email')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="mobile">Mobile Number</label>
                            <input type="text" class="form-control" value="{{ old('customer_mobile') }}" name="customer_mobile" id="customer_mobile" required placeholder="Mobile Number">
                            @error('customer_mobile')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <input type="hidden" name="chassis_url" id="chassis_url">
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script>
        $(".getChassisUrl").click(function () {
            let chassisUrl = $(this).attr("data-url");
            $("#chassis_url").val(chassisUrl)
            /*var obj = {};
            obj.cus_name = $('#customer_name').val();
            obj.cus_phone = $('#mobile').val();
            obj.cus_email = $('#email').val();
            obj.cus_addr1 = $('#address').val();
            obj.amount = 1000;

            $('#sslczPayBtn').prop('postdata', obj);

            (function (window, document) {
                var loader = function () {
                    var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                    // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                    script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                    tag.parentNode.insertBefore(script, tag);
                };

                window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
            })(window, document);

*/

        });

    </script>
@endsection

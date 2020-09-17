@extends('layouts.app-web')

@section('content')
<div class="page-header--section" style="margin-top: 50px;">
    <div class="container">
        <div class="title section--title">
            <h1 class="h1">Payment Success</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="thank-you-pop bank-shadow">
                <h1><i class="fa fa-check-circle-o"></i></h1>
                <h1>Thank You!</h1>
                <p>Dear sir, Your online payment has been successfully submitted.</p>
                {{--@if(session('reportOrderId'))
                    <h3 class="cupon-pop">Your Id: <span>{{ session('reportOrderId') }}</span></h3>
                @endif--}}
            </div>
        </div>
    </div>
</div>
@section('style')
<style>
    /*--thank you pop starts here--*/
    .thank-you-pop {
        width: 100%;
        padding: 20px;
        text-align: center;
        margin-bottom: 30px;
    }

    .thank-you-pop h1 {
        font-size: 42px;
        margin-bottom: 25px;
        color: #5C5C5C;
    }

    .thank-you-pop i {
        color: #41ab34;
        font-size: 60px;
    }

    .thank-you-pop p {
        font-size: 20px;
        margin-bottom: 27px;
        color: #5C5C5C;
    }

    .thank-you-pop h3.cupon-pop {
        font-size: 25px;
        margin-bottom: 40px;
        color: #5C5C5C;
        display: inline-block;
        text-align: center;
        padding: 10px 20px;
        border: 2px dashed #5C5C5C;
        clear: both;
        font-weight: normal;
    }

    .thank-you-pop h3.cupon-pop span {
        color: #c4302b;
        font-weight: 600;
    }
</style>
@endsection
@endsection

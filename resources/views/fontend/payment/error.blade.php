@extends('layouts.app-web')

@section('content')
<div class="page-header--section" style="margin-top: 50px;">
    <div class="container">
        <div class="title section--title">
            <h1 class="h1">Payment Error</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="error-you-pop bank-shadow">
                <h1><i class="fa fa-exclamation-circle text-danger" aria-hidden="true"></i></h1>
                <h1>Error!</h1>
                <p> Dear sir, Something is wrong. Please try again later!.</p>
            </div>
        </div>
    </div>
</div>
@section('style')
<style>
    /*--error you pop starts here--*/
    .error-you-pop {
        width: 100%;
        padding: 20px;
        text-align: center;
        margin-bottom: 30px;
    }

    .error-you-pop h1 {
        font-size: 42px;
        margin-bottom: 25px;
        color: #a94442;
    }

    .error-you-pop i {
        color: #a94442;
        font-size: 60px;
    }

    .error-you-pop p {
        font-size: 20px;
        margin-bottom: 27px;
        color: #a94442;
    }

    .error-you-pop h3.cupon-pop {
        font-size: 25px;
        margin-bottom: 40px;
        color: #a94442;
        display: inline-block;
        text-align: center;
        padding: 10px 20px;
        border: 2px dashed #a94442;
        clear: both;
        font-weight: normal;
    }

    .error-you-pop h3.cupon-pop span {
        color: #c4302b;
        font-weight: 600;
    }
</style>
@endsection
@endsection
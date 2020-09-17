@extends('layouts.app-web')

@section('content')
<div class="page-header--section" style="margin-top: 50px;">
    <div class="container">
        <div class="title section--title">
            <h1 class="h1">How to Buy</h1>
        </div>
    </div>
</div>
<div class="container">
    <h3>Vehicle from Auction</h3>
    @foreach($vehicleFromAuction as $auction)
    <div class="col-md-12 bank-shadow" style="border: 1px solid lightgray; margin-bottom: 20px;">
        <div class="row" style="border-bottom: 2px solid #c4302b">
            <div class="col-md-1" style="background-color: #c4302b; height: 50px;">
                <h4 class="step">{{ substr($auction->step_name, 0, 7) ? substr($auction->step_name, 0, 7) : '01' }}</h4>
            </div>
            <div class="col-md-11">
                <h4 class="step-title">{{ $auction->step_title ? $auction->step_title : '' }}</h4>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                {!! $auction->step_details ? $auction->step_details : '' !!}
            </p>
        </div>
    </div>
    @endforeach
</div>
<div style="padding-top: 20px;"></div>
<div class="container" style="margin-bottom: 50px;">
    <h3>Vehicle from Stock</h3>
    @foreach($vehicleFromStock as $vehicle)
    <div class="col-md-12 bank-shadow" style="border: 1px solid lightgray; margin-bottom: 20px;">
        <div class="row" style="border-bottom: 2px solid #c4302b">
            <div class="col-md-1" style="background-color: #c4302b; height: 50px;">
                <h4 class="step">
                    {{ substr($vehicle->step_name, 0, 7) ? substr($vehicle->step_name, 0, 7) : '01' }}
                </h4>
            </div>
            <div class="col-md-11">
                <h4 class="step-title">{{ $vehicle->step_title ? $vehicle->step_title : '' }}</h4>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                {!! $vehicle->step_details ? $vehicle->step_details : '' !!}
            </p>
        </div>
    </div>
    @endforeach
</div>
@endsection
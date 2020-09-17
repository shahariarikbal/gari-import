@extends('layouts.app-web')

@section('content')
<div class="container-fluid">
    <div class="row" style="margin:30px 0">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('/stockimg/'.$stock->images[0]->image) }}" style="height: 300px; width: 450px;"/>
                    <div class="col-md-12">
                        <table>
                            <tr>
                                @foreach($stock->images as $stockImg)
                                    <td>
                                        <img src="{{ asset('/stockimg/'.$stockImg->image) }}" style="height: 100px; width: 100px; margin-left: 10px; border: 1px solid lightgray"/>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1>{{ $stock->year }} {{ $stock->make }}</h1> <br/>
                    <b>FOB : {{ $stock->fob }} BDT</b><br/>
                    <b>CnF : {{ $stock->cnf }}</b>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header" style="height: 50px; background-color: #0090d0">
                                <h3 style="color: white; text-align: center; margin-top: 10px;">Specifications for {{ $stock->make }}</h3>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Stock Id</td>
                                    <td>{{ $stock->stocks_id }}</td>
                                    <td>Grade</td>
                                    <td>{{ $stock->grade }}</td>
                                </tr>
                                <tr>
                                    <td>Chasis Code</td>
                                    <td>{{ $stock->chasis_code }}</td>
                                    <td>Color</td>
                                    <td>{{ $stock->color }}</td>
                                </tr>

                                <tr>
                                    <td>Engine CC</td>
                                    <td>{{ $stock->engine_cc }}</td>
                                    <td>Mileage</td>
                                    <td>{{ $stock->mileage }}</td>
                                </tr>
                                <tr>
                                    <td>Fuel</td>
                                    <td>{{ $stock->fuel }}</td>
                                    <td>Transmission</td>
                                    <td>{{ $stock->transmission }}</td>
                                </tr>
                                <tr>
                                    <td>Seat</td>
                                    <td>{{ $stock->seat }}</td>
                                    <td>Door</td>
                                    <td>{{ $stock->door }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12" style="border: 1px solid lightgray">
                            {!! $stock->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="{{ asset('/plugin/') }}/images-grid.js"></script>
@endsection

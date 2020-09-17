@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/add-pages') }}">CMS</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/admin/stock-list') }}">Stock List</a>
            </li>
            <li class="breadcrumb-item active">
                Stock list Create
            </li>
        </ol>
        @if($message = Session::get('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10" style="background-color: #e9ecef">
                    <div class="card-body">
                        <form style="margin-top: 10px;" action="{{ url('/store-stock-list') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label>Stock ID</label>
                                    <input type="text" class="form-control" name="stocks_id" value="{{ old('stocks_id') }}" id="stocks_id" placeholder="Stock id">
                                    @error('stocks_id')
                                    <strong class="text-danger">{{ $message }}</strong>>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Images</label>
                                    <input type="file" name="image[]" class="form-control" multiple accept="image/*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Make</label>
                                    <input type="text" class="form-control" value="{{ old('make') }}" name="make" id="makeData" placeholder="Make">
                                </div>
                                <div class="col">
                                    <label>Model</label>
                                    <input type="text" class="form-control" value="{{ old('model') }}" name="model" id="modelData" placeholder="Model">
                                </div>
                                <div class="col">
                                    <label>Grade</label>
                                    <input type="text" name="grade" id="grade" value="{{ old('grade') }}" class="form-control" placeholder="Grade">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Chassis Code</label>
                                    <input type="text" class="form-control uppercase" value="{{ old('chasis_code') }}" name="chasis_code" id="chasis_code" placeholder="Chassis Code">
                                </div>
                                <div class="col">
                                    <label>Year</label>
                                    <input type="number" name="year" id="year" value="{{ old('year') }}" class="form-control" placeholder="Year">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Seat</label>
                                    <input type="number" class="form-control" name="seat" value="{{ old('seat') }}" id="seat" placeholder="Seat">
                                </div>
                                <div class="col">
                                    <label>Door</label>
                                    <input type="text" name="door" id="door" value="{{ old('door') }}" class="form-control" placeholder="Door">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Color</label>
                                    <input type="text" class="form-control" value="{{ old('color') }}" name="color" id="colorData" placeholder="Color">
                                </div>
                                <div class="col">
                                    <label>Engine cc</label>
                                    <input type="number" name="engine_cc" id="engine_cc"  value="{{ old('engine_cc') }}" class="form-control" placeholder="Engine cc">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Mileage</label>
                                    <input type="number" class="form-control" name="mileage" value="{{ old('mileage') }}" id="mileage" placeholder="Mileage">
                                </div>
                                <div class="col">
                                    <label>Fuel</label>
                                    <input type="text" name="fuel" id="fuelData" value="{{ old('fuel') }}" class="form-control" placeholder="Fuel">
                                </div>
                                <div class="col">
                                    <label>Transmission</label>
                                    <input type="text" name="transmission" value="{{ old('transmission') }}" id="transmissionData" class="form-control" placeholder="Transmission">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Price</label>
                                    <input type="text" name="price" id="price" value="{{ old('price') }}"  class="form-control" placeholder="Price">
                                </div>

                                <div class="col">
                                    <label>Auction point</label>
                                    <input type="text" name="fob" id="fob" value="{{ old('fob') }}"  class="form-control" placeholder="Auction point">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Descriptions</label>
                                    <textarea class="form-control" name="description" id="editor" placeholder="Description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option selected disabled>Select status ...</option>
                                        <option value="1">Upcoming</option>
                                        <option value="2">Available</option>
                                        <option value="3">Sold Out</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col">
                                    <a href="{{ url('/admin/stock-list') }}" class="btn btn-sm btn-danger">Back</a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-sm btn-success float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .uppercase{
            text-transform: uppercase;
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('page_js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            var availableMakeData = [
                @foreach($showStockList as $stocks)
                    "{{ $stocks->make }}",
                @endforeach
            ];
            $( "#makeData" ).autocomplete({
                source: availableMakeData
            });

            var availableModeleData = [
                @foreach($showStockList as $stocks)
                    "{{ $stocks->model }}",
                @endforeach
            ];
            $( "#modelData" ).autocomplete({
                source: availableModeleData
            });

            var availableColorData = [
                @foreach($showStockList as $stocks)
                    "{{ $stocks->color }}",
                @endforeach
            ];
            $( "#colorData" ).autocomplete({
                source: availableColorData
            });

            var availableFuelData = [
                @foreach($showStockList as $stocks)
                    "{{ $stocks->fuel }}",
                @endforeach
            ];
            $( "#fuelData" ).autocomplete({
                source: availableFuelData
            });

            var availableTransmissionlData = [
                @foreach($showStockList as $stocks)
                    "{{ $stocks->transmission }}",
                @endforeach
            ];
            $( "#transmissionData" ).autocomplete({
                source: availableTransmissionlData
            });
        } );
    </script>

@endsection

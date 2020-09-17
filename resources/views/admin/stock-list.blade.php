@extends('layouts.app-admin')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/add-pages') }}">CMS</a>
                </li>
                <li class="breadcrumb-item active">Stock List</li>
            </ol>
            <div id="gallery1"></div>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Stock List Table
                    <a href="{{ url('/add-new') }}" class="btn btn-sm btn-success float-right">Add New Stock</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-7" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="text-center">Picture</th>
                                <th class="text-center">Stock ID</th>
                                <th class="text-center">Make</th>
                                <th class="text-center">Model</th>
                                <th class="text-center">Grade</th>
                                <th class="text-center">Chasis Code</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Color</th>
                                <th class="text-center">Engine CC</th>
                                <th class="text-center">Fuel</th>
                                <th class="text-center">Mileage</th>
                                <th class="text-center">Auction Point</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($showStockList as $key => $stockList)
                                <tr>
                                    <td style="vertical-align:middle;">
                                        @if((sizeof($stockList->images) > 0) && file_exists('stockimg/'.$stockList->images[0]->image))
                                            <a href="#" target="_blank">
                                                <img class="img-responsive" src="{{ asset('/stockimg/'.$stockList->images[0]->image) }}" height="100" width="100" alt="{{ $stockList->model }}">
                                            </a>
                                        @else
                                            <a href="#">
                                                <img class="img-responsive" src="{{ asset('images/default_car.jpg') }}" height="100" width="100">
                                            </a>
                                        @endif
                                    </td>
                                    <td style="vertical-align:middle; width: 9%">
                                        <span style="vertical-align:middle;">{{ $stockList->stocks_id }}</span>
                                    </td>
                                    <td style="vertical-align:middle;">{{ $stockList->make }}</td>
                                    <td style="vertical-align:middle;">{{ $stockList->model }}</td>
                                    <td style="vertical-align:middle;">{{ $stockList->grade }}</td>
                                    <td style="vertical-align:middle;">{{ $stockList->chasis_code }}</td>
                                    <td style="vertical-align:middle;">{{ $stockList->year }}</td>
                                    <td style="vertical-align:middle;">{{ $stockList->color }}</td>
                                    <td style="vertical-align:middle;">{{ $stockList->mileage }}</td>
                                    <td style="vertical-align:middle;">{{ $stockList->fuel }}</td>
                                    <td style="vertical-align:middle;">{{ $stockList->mileage }}</td>
                                    <td style="vertical-align:middle;">
                                        {{ $stockList->fob }}
                                    </td>
                                    <td style="vertical-align:middle;">
                                        {{ $stockList->price }}
                                    </td>
                                    <td style="vertical-align:middle;">
                                        @if($stockList->status === 1)
                                            <span style="font-weight: bold" class="badge badge-danger">Upcoming</span>
                                        @elseif($stockList->status === 2)
                                            <span style="font-weight: bold" class="badge badge-success">Available</span>
                                        @else
                                            <span style="font-weight: bold" class="badge badge-secondary">Sold Out</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/stock-list/edit/'.$stockList->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-danger" onclick="deleteModal({{$stockList->id}})" title="Delete">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="stockDeleteModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this Stock?</h4>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ url('/delete-stock-list') }}">
                        @csrf
                        <input type="hidden" name="id" id="delete_id">
                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-sm btn-danger" type="submit" title="Delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('style')--}}
{{--    <link rel="stylesheet" href="{{ asset('/admin/') }}/tablednd.css" type="text/css"/>--}}
{{--    <link rel="stylesheet" href="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.css" type="text/css"/>--}}
{{--@endsection--}}

@section('page_js')
    <script>
    function deleteModal(id) {
        $('#delete_id').val(id);
        $('#stockDeleteModal').modal('show');
    }
    </script>

    {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> --}}
    <script src="{{ asset('/plugin/') }}/images-grid.js"></script>

    <script>
        @foreach($showStockList as $key => $stockData)
        var images{{ $stockData->id }} = [
            @foreach($stockData['images'] as $picture)
            "{{ asset('/stockimg/'.$picture->image) }}",
            @endforeach
        ];
        $(function() {
            $(".gallery{{ $stockData->id }}").imagesGrid({
                images: images{{ $stockData->id }}
            });
        });
        @endforeach
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/plugin/') }}/images-grid.css">
@endsection

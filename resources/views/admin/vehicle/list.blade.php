@extends('layouts.app-admin')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('/add-pages') }}">CMS</a>  <span style="font-weight: bold; margin-left: 5px;">>></span>
                </li>
                <li class="breadcrumb-item active" style="margin-left: 10px;">How to Buy Steps</li>
            </ol>
            <div id="gallery1"></div>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    How to Buy Steps for Stock
                    <a href="{{ url('/add-new-vehicle') }}" class="btn btn-sm btn-success float-right">Add New Step</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-7" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Section</th>
                                <th>Step Name</th>
                                <th>Step Title</th>
                                <th>Step Details</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="tablecontents">
                            @foreach($vehicleForStockShow as $key => $vehicle)
                                <tr class="row1" data-id="{{ $vehicle->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        @if($vehicle->page_type === 1)
                                            <span>Vehicle form Stock</span>
                                        @else
                                            <span>Vehicle form Auction</span>
                                        @endif
                                    </td>
                                    <td>{{ $vehicle->step_name }}</td>
                                    <td>{{ $vehicle->step_title }}</td>
                                    <td>{!! substr($vehicle->step_details, 0, 50) !!}....</td>
                                    <td>
                                        <a href="{{ url('/how-to-buy-edit/'.$vehicle->id) }}" class="btn btn-sm btn-success" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="vehicleDelete({{ $vehicle->id }})" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    How to Buy Steps Auction
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Section</th>
                                <th>Step Name</th>
                                <th>Step Title</th>
                                <th>Step Details</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="tablecontents2">
                            @foreach($vehicleForAuctionShow as $key => $vehicleForAuction)
                                <tr class="row2" data-id="{{ $vehicleForAuction->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        @if($vehicleForAuction->page_type === 1)
                                            <span>Vehicle form Stock</span>
                                        @else
                                            <span>Vehicle form Auction</span>
                                        @endif
                                    </td>
                                    <td>{{ $vehicleForAuction->step_name }}</td>
                                    <td>{{ $vehicleForAuction->step_title }}</td>
                                    <td>{!! substr($vehicleForAuction->step_details, 0, 50) !!}....</td>
                                    <td>
                                        <a href="{{ url('/how-to-buy-edit/'.$vehicleForAuction->id) }}" class="btn btn-sm btn-success" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" onclick="vehicleDelete({{ $vehicle->id }})" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="modal fade" id="vehicleModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this step?</h4>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                    <a id="deleteUrl" href="" class="btn btn-sm btn-danger" title="Delete">
                        Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function () {

            $( "#tablecontents" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                $('tr.row1').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1,
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('vehicle/sortable') }}",
                    data: {
                        _token: '{{csrf_token()}}',
                        type:1,
                        order:order,
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });

            }
        });

        $(function () {

            $( "#tablecontents2" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                $('tr.row2').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1,
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('vehicle/sortable') }}",
                    data: {
                        _token: '{{csrf_token()}}',
                        type:2,
                        order:order,
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });

            }
        });


        function vehicleDelete(id) {
            let deleteUrl = "{{ url('how-to-buy-delete') }}/"+id;
            $("#deleteUrl").attr("href", deleteUrl);
            $('#vehicleModal').modal('show');
        }
    </script>
@endsection

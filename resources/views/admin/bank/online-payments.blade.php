@extends('layouts.app-admin')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/add-pages') }}">CMS</a>
                </li>
                <li class="breadcrumb-item active">Online payment's List</li>
            </ol>
            <div id="gallery1"></div>
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Online payment's Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>amount</th>
                                <th>Address</th>
                                <th>Transaction id</th>
                                <th>Currency</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($onlinePayments as $key => $onlinePayment)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $onlinePayment->name }}</td>
                                    <td>{{ $onlinePayment->email }}</td>
                                    <td>{{ $onlinePayment->mobile }}</td>
                                    <td>{{ $onlinePayment->amount }}</td>
                                    <td>{!! substr($onlinePayment->address, 0, 50) !!}</td>
                                    <td>{{ $onlinePayment->transaction_id }}</td>
                                    <td>{{ $onlinePayment->currency }}</td>
                                    <td>
                                        @if($onlinePayment->payment_type === 'online')
                                            <span class="badge badge-success">Online</span>
                                        @else
                                            <span class="badge badge-info">Chassis</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-primary">{{ $onlinePayment->status }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" onclick="deletePayment({{ $onlinePayment->id }})" data-target="#paymentDeleteModal" title="Delete">
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
        <!-- /.container-fluid -->
    </div>

    <div class="modal fade" id="paymentDeleteModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this Online payment?</h4>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ url('/online-payment/delete') }}">
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

@section('page_js')
    <script>
        function deletePayment(id) {
            $('#delete_id').val(id);
            $('#inquiryDeleteModal').modal('show');
        }
    </script>
@endsection


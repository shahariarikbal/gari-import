@extends('layouts.app-admin')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/add-pages') }}">CMS</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/stock-inquiry') }}">Stock Inquiry</a>
                </li>
                <li class="breadcrumb-item active">Stock inquiry Details</li>
            </ol>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    {{ $stockInquiryDetails->stock->make }} {{ $stockInquiryDetails->stock->model }}
                                </td>
                                <td>
                                    @if((sizeof($stockInquiryDetails->stockImages) > 0) && file_exists('stockimg/'.$stockInquiryDetails->stockImages[0]->image))
                                        <img class="img-responsive" src="{{ asset('/stockimg/'.$stockInquiryDetails->stockImages[0]->image) }}" height="100" width="200" alt="{{ $stockInquiryDetails->model }}">
                                    @else
                                        <img class="img-responsive" src="{{ asset('images/default_car.jpg') }}" height="100" width="200">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Port Name</td>
                                <td>
                                    @if($stockInquiryDetails->port === 1)
                                        <span class="badge badge-primary">Chittagong</span>
                                    @else
                                        <span class="badge badge-primary">Mongla</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td>
                                    {{ $stockInquiryDetails->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>User Email</td>
                                <td>
                                    {{ $stockInquiryDetails->email }}
                                </td>
                            </tr>
                            <tr>
                                <td>User Phone</td>
                                <td>
                                    {{ $stockInquiryDetails->phone }}
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Message</td>
                                <td>
                                    {!! $stockInquiryDetails->message !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@extends('layouts.app-web')

@section('content')
    <div class="page-header--section" style="margin-top: 50px;">
        <div class="container">
            <div class="title section--title">
                <h1 class="h1">Our Banks</h1>
            </div>
        </div>
    </div>
    <div class="container">
        @if($bankDataShow->count() > 0)
        @foreach($bankDataShow as $bankData)
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 bank-shadow" style="border: 1px solid #cccccc; margin-bottom: 40px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <h3>Bank Details</h3>
                            <table class="table table-bordered" style="margin-bottom: 20px;">
                                <tr>
                                    <td width="40%">Bank Name</td>
                                    <td>{{ $bankData->name }}</td>
                                </tr>
                                <tr>
                                    <td>Account Name</td>
                                    <td>{{ $bankData->account_name }}</td>
                                </tr>
                                <tr>
                                    <td>Account Number</td>
                                    <td>{{ $bankData->account_no }}</td>
                                </tr>
                                <tr>
                                    <td>Branch</td>
                                    <td>{{ $bankData->branch }}</td>
                                </tr>
                                <tr>
                                    <td>Routing Number</td>
                                    <td>{{ $bankData->routing }}</td>
                                </tr>
                                <tr>
                                    <td>Swift Code</td>
                                    <td>{{ $bankData->swift }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        @endforeach
        @else
            <div class="col-md-12 alert alert-warning">
                <p class="text-center" style="font-size: 18px; font-weight: 500">No Data Found</p>
            </div>
        @endif
    </div>
@endsection

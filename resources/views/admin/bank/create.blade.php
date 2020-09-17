@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/add-pages') }}">CMS</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/admin/bank-list') }}">Bank List</a>
            </li>
            <li class="breadcrumb-item active">
                New Bank Details
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
{{--                        <div class="col-md-12 bg-success" style="height: 70px; border-radius: 5px 5px 0px 0px">--}}
{{--                            <h2 style="text-align: center; color: white; padding-top: 15px;">New Bank Details</h2>--}}
{{--                        </div>--}}
                        <form style="margin-top: 10px;" action="{{ url('/store-bank-list') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Account Name</label>
                                <input type="text" class="form-control" name="account_name" value="{{ old('account_name') }}">
                                <span style="color: red"> {{ $errors->has('account_name') ? $errors->first('account_name') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Account Number</label>
                                <input type="text" class="form-control" name="account_no" value="{{ old('account_no') }}">
                                <span style="color: red"> {{ $errors->has('account_no') ? $errors->first('account_no') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <input type="text" class="form-control" name="branch" value="{{ old('branch') }}">
                                <span style="color: red"> {{ $errors->has('branch') ? $errors->first('branch') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Routing Number</label>
                                <input type="text" class="form-control" name="routing" value="{{ old('routing') }}">
                                <span style="color: red"> {{ $errors->has('routing') ? $errors->first('routing') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Swift Code</label>
                                <input type="text" class="form-control" name="swift" value="{{ old('swift') }}">
                                <span style="color: red"> {{ $errors->has('swift') ? $errors->first('swift') : ' ' }}</span>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col">
                                    <a href="{{ url('/admin/bank-list') }}" class="btn btn-sm btn-danger">Back</a>
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

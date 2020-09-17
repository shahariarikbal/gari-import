@extends('layouts.app-web')

@section('content')
<div class="page-header--section" style="margin-top: 50px;">
    <div class="container">
        <div class="title section--title">
            <h1 class="h1">Online Payments</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row mb-10">
                <div class="col-sm-12 bank-shadow" style="border: 1px solid #cccccc;">
                    <div class="card" style="padding: 30px 0 0 0;">
                        <form action="{{ url('/pay') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="sr-only" for="name">Your Name</label>
                                <input type="text" class="form-control" value="{{ old('customer_name') }}" name="customer_name" id="customer_name" required placeholder="Your Name">
                                @error('customer_name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="email">Email Address</label>
                                <input type="text" class="form-control" value="{{ old('customer_email') }}" name="customer_email" id="customer_email" required placeholder="Email Address">
                                @error('customer_email')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" value="{{ old('customer_mobile') }}" name="customer_mobile" id="customer_mobile" required placeholder="Mobile Number">
                                @error('customer_mobile')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="amount">Amount (BDT)</label>
                                <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" id="amount" placeholder="Amount (BDT)" required>
                                @error('amount')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="amount">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Write your purpose of payment" required></textarea>
                                @error('description')
                                <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary text-uppercase">pay now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-sm-12 bank-shadow" style="border: 1px solid #cccccc;">
                    <div class="card payment-card text-center">
                        <!-- <h1>payment methods</h1> -->
                        <ul>
                            <li><a href="#" target="_blank"><img src=" {{ asset('images/payment-card/payment.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

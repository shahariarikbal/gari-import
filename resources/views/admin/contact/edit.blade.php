@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="{{ url('/add-pages') }}">CMS</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li class="breadcrumb-item active" style="margin-left: 10px;">Contact Page Settings</li>
        </ol>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-md-8 sadow" style="padding: 20px; margin-bottom: 20px;">
                    <div class="card">
                        <div class="card-header">Contact page settings</div>
                        <div class="card-body">
                            <form action="{{ url('/contact-info-update/'.$contact->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" rows="3" placeholder="Address">{!! $contact->address ? $contact->address : '' !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{!! $contact->phone ? $contact->phone : '' !!}" placeholder="phone number">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" name="email" class="form-control" value="{!! $contact->email ? $contact->email : '' !!}" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" name="web_site" class="form-control" value="{!! $contact->web_site ? $contact->web_site : '' !!}" placeholder="Website address">
                                </div>

                                <div class="form-group">
                                    <label>Map Url</label>
                                    <input type="text" name="map" class="form-control" value="{!! $contact->map ? $contact->map : '' !!}" placeholder="Map Url">
                                </div>

                                <div class="form-group">
                                    <div class="btn-group">
                                        <button type="submit" name="btn" class="btn btn-md btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
@endsection

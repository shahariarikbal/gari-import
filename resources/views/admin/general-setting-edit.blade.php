@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ url('/add-pages') }}">CMS</a>
            </li>
            <li class="breadcrumb-item">General Settings Edit</li>
        </ol>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">General Settings Edit</div>
            <div class="card-body">
                <form action="{{ url('/update-general-settings/'.$general->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Logo <span style="color: red">[ 940x160 Pixel ]</span></label><br/>
                        <input type="file" name="logo" id="logo" accept="image/png"><br/>
                        <img src="{{ asset('images/'.$general->logo) }}" height="50" width="100"/>
                    </div>
                    <div class="form-group">
                        <label>Favicon <span style="color: red">[ 16x16 Pixel ]</span></label><br/>
                        <input type="file" name="favicon" id="favicon" accept="image/png"><br/>
                        <img src="{{ asset('images/'.$general->favicon) }}" height="30" width="30"/>
                    </div>
                    <div class="form-group">
                        <label for="hotline_number">Support Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $general->email ? $general->email : '' }}" id="email">
                    </div>
                    <div class="form-group">
                        <label for="hotline_number">Hotline Number</label>
                        <input type="text" name="hotline_number" class="form-control" value="{{ $general->hotline_number ? $general->hotline_number : '' }}" id="hotline_number">
                    </div>

                    <div class="form-group">
                        <label for="instagram_link">Instagram link</label>
                        <input type="text" name="instagram_link" class="form-control" value="{{ $general->instagram_link ? $general->instagram_link : '' }}" id="instagram_link">
                    </div>
                    <div class="form-group">
                        <label for="facebook_link">Facebook link</label>
                        <input type="text" name="facebook_link" class="form-control" value="{{ $general->facebook_link ? $general->facebook_link : '' }}" id="facebook_link">
                    </div>
                    <div class="form-group">
                        <label for="twitter_link">Twitter link</label>
                        <input type="text" name="twitter_link" class="form-control" value="{{ $general->twitter_link ? $general->twitter_link : '' }}" id="twitter_link">
                    </div>
                    <div class="form-group">
                        <label for="pinterest_link">Pinterest link</label>
                        <input type="text" name="pinterest_link" class="form-control" value="{{ $general->pinterest_link ? $general->pinterest_link : '' }}" id="pinterest_link">
                    </div>

                    <div class="form-group">
                        <label for="footer_text">Footer text</label>
                        <textarea class="form-control" name="footer_text" rows="5">{{ $general->footer_text }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="contact_info">Contact info</label>
                        <textarea class="form-control" id="editor" name="contact_info" rows="5">{{ $general->contact_info }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

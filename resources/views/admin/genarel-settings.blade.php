@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">General Settings</li>
        </ol>
        <table class="table table-bordered">
            <tr>
                <td>SL</td>
                <td>Logo</td>
                <td>Favicon</td>
                <td>Hotline Number</td>
                <td>Action</td>
            </tr>
            @foreach($generals as $key => $data)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>
                    <img src="{{ asset('images/'.$data->logo) }}" height="50" width="100"/>
                </td>
                <td>
                    <img src="{{ asset('images/'.$data->favicon) }}" height="30" width="30"/>
                </td>
                <td>{{ $data->hotline_number }}</td>
                <td>
                    <a href="{{ url('/edit-general-settings/'.$data->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection

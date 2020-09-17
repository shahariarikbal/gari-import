@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/admin/vehicle-list') }}">How To Buy Steps</a> <span style="font-weight: bold; margin-left: 5px;">>></span>
            </li>
            <li class="breadcrumb-item active" style="margin-left: 10px;">
                How to Buy Step Update
            </li>
        </ol>
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                        <form style="margin-top: 10px;" name="editHowToBuy" action="{{ url('/update-vehicle-list/'.$vehicle->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Page type</label>
                                <select class="form-control" name="page_type">
                                    <option disabled selected>Select a page type</option>
                                    <option value="1">Vehicle Form Stock</option>
                                    <option value="2">Vehicle Form Auction</option>
                                </select>
                                <span style="color: red"> {{ $errors->has('page_type') ? $errors->first('page_type') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Step Name</label>
                                <input type="text" value="{{ $vehicle->step_name }}" class="form-control" name="step_name">
                                <span style="color: red"> {{ $errors->has('step_name') ? $errors->first('step_name') : ' ' }}</span>
                            </div>
                            <div class="form-group">
                                <label>Step Title</label>
                                <input type="text" class="form-control" value="{{ $vehicle->step_title }}" name="step_title">
                                <span style="color: red"> {{ $errors->has('step_title') ? $errors->first('step_title') : ' ' }}</span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Details</label>
                                    <textarea class="form-control" name="step_details" id="editor">{{ $vehicle->step_details }}</textarea>
                                    <span style="color: red"> {{ $errors->has('step_details') ? $errors->first('step_details') : ' ' }}</span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px;">
                                <div class="col">
                                    <a href="{{ url('/admin/vehicle-list') }}" class="btn btn-sm btn-danger">Back</a>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-sm btn-success float-right">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <script>
            document.forms['editHowToBuy'].elements['page_type'].value="{{ $vehicle->page_type }}";
        </script>
    </div>
@endsection

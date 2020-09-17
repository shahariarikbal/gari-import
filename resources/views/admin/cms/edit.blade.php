@extends('layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li><a href="{{ url('/add-pages') }}">CMS</a> <span style="font-weight: bold; margin-left: 5px;">>></span></li>
            <li class="breadcrumb-item active" style="margin-left: 10px;">{{ $cmspage->name }} Page Settings</li>
        </ol>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">

                </div>

                <div class="col-md-8 sadow" style="padding: 20px; margin-bottom: 20px;">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">{{ $cmspage->name }} page settings</div>
                        <div class="card-body">
                            @if($cmspage->id === 1)
                                <form action="{{ url('/cms-page-settings') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">

                                    <div class="form-group">
                                        <label for="title">First Content Title</label>
                                        <input type="text" name="settings_key['first_heading']" value="{{ isset(getCmsPageData('first_heading')->value) ? getCmsPageData('first_heading')->value:'' }}" class="form-control" placeholder="First Content Title">
                                        <span style="color: red"> {{ $errors->has('value') ? $errors->first('value') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">First Content Description</label>
                                        <textarea class="form-control" rows="3" name="settings_key['first_heading_details']" placeholder="First Content Description">{{ isset(getCmsPageData('first_heading_details')->value) ? getCmsPageData('first_heading_details')->value:'' }}</textarea>
                                        <span style="color: red"> {{ $errors->has('title') ? $errors->first('title') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Service Box 1 Button</label>
                                        <input type="text" name="settings_key['service_box_button_1']" value="{{ isset(getCmsPageData('service_box_button_1')->value) ? getCmsPageData('service_box_button_1')->value:'' }}" class="form-control" placeholder="Service Box 1 button">
                                        <span style="color: red"> {{ $errors->has('value') ? $errors->first('value') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="icon_1">Service Box 1 Icon <span style="color: red">[ 900x506 Pixel ]</span></label>
                                        <input type="file" name="service_box_icon_1" class="form-control">
                                        <img src="{{ asset('/images/'.getCmsPageData('service_box_icon_1')->value) }}" height="70" width="70">
                                        <span style="color: red"> {{ $errors->has('icon_1') ? $errors->first('icon_1') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Service Box 2 Button</label>
                                        <input type="text" name="settings_key['service_box_button_2']" value="{{ isset(getCmsPageData('service_box_button_2')->value) ? getCmsPageData('service_box_button_2')->value:'' }}" class="form-control" placeholder="Service Box 2 button">
                                        <span style="color: red"> {{ $errors->has('value') ? $errors->first('value') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="icon_2">Service Box 2 Icon <span style="color: red">[ 900x506 Pixel ]</span></label>
                                        <input type="file" name="service_box_icon_2" class="form-control">
                                         <img src="{{ asset('/images/'.getCmsPageData('service_box_icon_2')->value) }}" height="70" width="70">
                                        <span style="color: red"> {{ $errors->has('icon_2') ? $errors->first('icon_2') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Service Box 3 Button</label>
                                        <input type="text" name="settings_key['service_box_button_3']" value="{{ isset(getCmsPageData('service_box_button_3')->value) ? getCmsPageData('service_box_button_3')->value:'' }}" class="form-control" placeholder="Service Box 3 button">
                                        <span style="color: red"> {{ $errors->has('value') ? $errors->first('value') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="icon_3">Service Box 3 Icon <span style="color: red">[ 900x506 Pixel ]</span></label>
                                        <input type="file" name="service_box_icon_3" class="form-control">
                                         <img src="{{ asset('/images/'.getCmsPageData('service_box_icon_3')->value) }}" height="70" width="70">
                                        <span style="color: red"> {{ $errors->has('service_box_icon_3') ? $errors->first('service_box_icon_3') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc_title">Description Content Title</label>
                                        <input type="text" name="settings_key['description_content_title']" value="{{ isset(getCmsPageData('description_content_title')->value) ? getCmsPageData('description_content_title')->value:'' }}" class="form-control" placeholder="Description title">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Description Content</label>
                                        <textarea class="form-control" rows="3" name="settings_key['description_content']" placeholder="Description Content">{{ isset(getCmsPageData('description_content')->value) ? getCmsPageData('description_content')->value:'' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Support Email</label>
                                        <input type="email" name="settings_key['support_email']" value="{{ isset(getCmsPageData('support_email')->value) ? getCmsPageData('support_email')->value:'' }}" class="form-control" placeholder="Support Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="slider_img">Slider <span style="color: red">[ 1920x600 Pixel ]</span></label>
                                        <input type="file" name="slider[]" class="form-control" multiple>
                                        @foreach($data as $slider)
                                            <div class="row">
                                                @if(!empty($slider['value']))
                                                    @foreach(json_decode($slider['value']) as $picture)
                                                        <div class="col-md-2 text-center">
                                                            <img class="img-fluid img-thumbnail" style="height: 100px" src="{{ asset('/images/'.$picture) }}">
                                                            <br>
                                                            <a href="javascript:void(0)" data-id="{{ $picture }}" onclick="deleteSliderModal(this)" class="btn mt-1 mb-2 btn-sm btn-info"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endforeach
                                        <div class="modal fade" id="sliderModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this Slider?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                                                        <a id="sliderImg" class="btn btn-sm btn-danger" type="submit" title="Delete">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span style="color: red"> {{ $errors->has('slider') ? $errors->first('slider') : ' ' }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="slider_img">Brand Logo <span style="color: red">[ 340x160 Pixel ]</span></label>
                                        <input type="file" name="brand_logo[]" class="form-control" multiple>
                                        @foreach($brandLogo as $logo)
                                            <div class="row">
                                                @if(!empty($slider['value']))
                                                    @foreach(json_decode($logo['value']) as $logImg)
                                                        <div class="col-md-2 text-center">
                                                            <img class="img-fluid img-thumbnail" style="height: 100px" src="{{ asset('/images/'.$logImg) }}">
                                                            <br>
                                                            <a href="javascript:void(0)" data-id="{{ $logImg }}" onclick="deleteBrandLogoModal(this)" class="btn mt-1 mb-2 btn-sm btn-info"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endforeach

                                        <div class="modal fade" id="brandLogoDeleteModal" style="margin-left: 804px; background-color: transparent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 style="text-align: center; font-weight: bold; color: #0b0b0b">Are you confirm to delete this Brand logo?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                                                        <a id="logoImg" class="btn btn-sm btn-danger" type="submit" title="Delete">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <span style="color: red"> {{ $errors->has('brand_logo') ? $errors->first('brand_logo') : ' ' }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 2)
                                <form action="{{ url('/about-us-store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header bg-primary"><h1>About Us</h1></div>
                                                <input type="hidden" name="id" value="{{ $aboutShow->id }}">
                                                <textarea class="form-control" name="body" id="editor">{{ $aboutShow->body }}</textarea>
                                                <span style="color: red; margin-left: 60px;"> {{ $errors->has('body') ? $errors->first('body') : ' ' }}</span>

                                                <div class="form-group">
                                                    <label for="email">SEO Title</label>
                                                    <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">SEO Keywords</label>
                                                    <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">SEO Description</label>
                                                    <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 3)
                                <form action="{{ url('/store-seo-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 4)
                                <form action="{{ url('/store-seo-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 6)
                                <form action="{{ url('/store-seo-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 7)
                                <form action="{{ url('/store-seo-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 8)
                                <form action="{{ url('/store-seo-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 9)
                                <form action="{{ url('/store-shipping-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header bg-primary"><h1 style="color: white; text-align: center">Shipping Info</h1></div>
                                                <input type="hidden" name="id" value="{{ $shippingInfo->id ? $shippingInfo->id : '' }}">
                                                <textarea class="form-control" name="body" id="editor">{{ $shippingInfo->body }}</textarea>
                                                <span style="color: red; margin-left: 60px;"> {{ $errors->has('body') ? $errors->first('body') : ' ' }}</span>

                                                <div class="form-group">
                                                    <label for="email">SEO Title</label>
                                                    <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">SEO Keywords</label>
                                                    <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">SEO Description</label>
                                                    <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 10)
                                <form action="{{ url('/store-import-regulation') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header bg-primary"><h1 style="color: white; text-align: center">Import Regulation</h1></div>
                                                <input type="hidden" name="id" value="{{ $importRegulation->id ? $importRegulation->id : '' }}">
                                                <textarea class="form-control" name="body" id="editor">{{ $importRegulation->body }}</textarea>
                                                <span style="color: red; margin-left: 60px;"> {{ $errors->has('body') ? $errors->first('body') : ' ' }}</span>

                                                <div class="form-group">
                                                    <label for="email">SEO Title</label>
                                                    <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">SEO Keywords</label>
                                                    <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">SEO Description</label>
                                                    <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 11)
                                <form action="{{ url('/store-seo-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 12)
                                <form action="{{ url('/store-seo-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                    </div>
                                </form>
                            @elseif($cmspage->id === 13)
                                <form action="{{ url('/store-seo-info') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="cms_page_id" value="{{ $cmspage->id ? $cmspage->id: '' }}">
                                    <div class="form-group">
                                        <label for="email">SEO Title</label>
                                        <input type="text" name="title" value="{{ $cmspage->title ? $cmspage->title: '' }}" class="form-control" placeholder="SEO Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Keywords</label>
                                        <input type="text" name="meta_keyword" value="{{ $cmspage->meta_keyword ? $cmspage->meta_keyword: '' }}" class="form-control" placeholder="SEO Keyword">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">SEO Description</label>
                                        <textarea type="text" name="meta_description" class="form-control" placeholder="SEO Description">{{ $cmspage->meta_description ? $cmspage->meta_description: '' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-block btn-success">Update</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script>
        function deleteBrandLogoModal(elem) {
            let img = $(elem).data("id");
            let deleteUrl = "{{ url('brand/delete') }}/"+img;
            $("#brandLogoDeleteModal").modal('show');
            $("#logoImg").attr("href", deleteUrl);
        }

        function deleteSliderModal(e) {
            let sliderImg = $(e).data("id");
            let deleteUrl = "{{ url('slider/delete') }}/"+sliderImg;
            $("#sliderModal").modal('show');
            $("#sliderImg").attr("href", deleteUrl);
        }
    </script>
@endsection

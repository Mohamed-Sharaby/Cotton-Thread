@extends('dashboard.layouts.layout')
@section('page-title')
    اضافة صور منتج
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.product-images.index')}}" class="breadcrumb-item">صور المنتجات</a>
                    <span class="breadcrumb-item active">@yield('page-title')</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- Content area -->
    <div class="content">
        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h3 class="panel-title">
                    اضافة صور للمنتج
                    <span class="badge badge-info">{{$product->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.products.store_image',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-group row">
                        <label for="image" class="col-form-label col-lg-2">{{__('Image')}}</label>
                        <div class="col-lg-4">
                            <input type="file" class="form-control {{$errors->has('image') ? ' is-invalid' : null}}"
                                   name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Add')}}</button>
                    </div>

                </form>

            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->

@endsection

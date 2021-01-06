@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل صورة منتج
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
                <h3 class="panel-title">تعديل صور منتج
                    <span class="badge badge-info">{{$productImage->product->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.product-images.update',$productImage->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="form-group row">
                        <label for="product_id" class="col-form-label col-lg-2 ">اسم المنتج</label>
                        <div class="col-lg-4">
                            <select name="product_id" id="product_id"
                                    class="form-control {{$errors->has('product_id') ? 'is-invalid' : null}}">
                                <option disabled selected>اختر  المنتج</option>
                                @foreach($products as $product)
                                    <option
                                        value="{{$product->id}}" {{$productImage->product_id == $product->id ? 'selected' : ''}}>{{$product->ar_name}}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-form-label col-lg-2 my-auto">{{__('Image')}}</label>
                        <div class="col-lg-4">
                            <input type="file" class="form-control {{$errors->has('image') ? ' is-invalid' : null}}"
                                   name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        @isset($productImage->image)
                            <div class="col-12 col-lg-6 my-auto">
                                @if($productImage->image)

                                    <a data-fancybox="gallery" href="{{$productImage->image}}">
                                        <img src="{{$productImage->image}}" width="100" height="100"
                                             class="img-thumbnail">
                                    </a>
                                @else لا يوجد صورة @endif
                            </div>
                        @endisset
                    </div>


                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-block">{{__('Edit')}}</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->
@endsection

@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل حجم منتج
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.product-sizes.index')}}" class="breadcrumb-item">أحجام المنتجات</a>
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
                <h3 class="panel-title">تعديل حجم منتج
                    <span class="badge badge-info">{{$productSize->product->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.product-sizes.update',$productSize->id)}}" method="post"
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
                                        value="{{$product->id}}" {{$productSize->product_id == $product->id ? 'selected' : ''}}>{{$product->ar_name}}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="size" class="col-form-label col-lg-2 text-lg-right">الحجم </label>
                        <div class="col-lg-4">
                            <input type="text" name="size" class="form-control {{$errors->has('size') ? 'is-invalid' : ''}}" value="{{$productSize->size}}">
                            @error('size')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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

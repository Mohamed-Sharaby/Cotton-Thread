@extends('dashboard.layouts.layout')
@section('page-title')
    اضافة كمية منتج
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.products.index')}}" class="breadcrumb-item">المنتجات</a>
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
                    اضافة كمية للمنتج
                    <span class="badge badge-info">{{$product->name}}</span>
                </h3>

            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.products.store_quantity',$product->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="size_id" class="col-form-label col-lg-2">حجم المنتج</label>
                        <div class="col-lg-4">
                            <select name="size_id" id="size_id"
                                    class="form-control {{$errors->has('size_id') ? 'is-invalid' : null}}">
                                <option disabled selected>اختر حجم المنتج</option>
                                @foreach($sizes as $size)
                                    <option
                                        value="{{$size->id}}" {{old('size_id') == $size->id ? 'selected' : ''}}>{{$size->size}}</option>
                                @endforeach
                            </select>
                            @error('size_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="color_id" class="col-form-label col-lg-2">لون المنتج</label>
                        <div class="col-lg-4">
                            <select name="color_id" id="color_id"
                                    class="form-control {{$errors->has('color_id') ? 'is-invalid' : null}}">
                                <option disabled selected>اختر لون المنتج</option>
                                @foreach($colors as $color)
                                    <option
                                        value="{{$color->id}}" {{old('color_id') == $color->id ? 'selected' : ''}}>{{$color->name}}</option>
                                @endforeach
                            </select>
                            @error('color_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-form-label col-lg-2"> الكمية</label>
                        <div class="col-lg-4">
                            <input type="number" name="quantity" required value="{{old('quantity')}}"
                                   oninvalid="this.setCustomValidity('الكمية مطلوبة')"
                                   onchange="this.setCustomValidity('')"
                                   class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}">
                            @error('quantity')
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

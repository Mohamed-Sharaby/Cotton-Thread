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
                    <a href="{{route('admin.product-quantities.index')}}" class="breadcrumb-item">كميات المنتجات</a>
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
                <h3 class="panel-title"> اضافة كمية منتج</h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.product-quantities.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="product_id" class="col-form-label col-lg-2 ">اسم المنتج</label>
                        <div class="col-lg-4">
                            <select name="product_id" id="product_id"
                                    class="form-control {{$errors->has('product_id') ? 'is-invalid' : null}}">
                                <option disabled selected>اختر  المنتج</option>
                                @foreach($products as $product)
                                    <option
                                        value="{{$product->id}}" {{old('product_id') == $product->id ? 'selected' : ''}}>{{$product->ar_name}}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="product_size_id" class="col-form-label col-lg-2 text-lg-right">حجم المنتج</label>
                        <div class="col-lg-4">
                            <select name="product_size_id" id="product_size_id"
                                    class="form-control {{$errors->has('product_size_id') ? 'is-invalid' : null}}">
{{--                                <option disabled selected>اختر حجم  المنتج</option>--}}
                            </select>
                            @error('product_size_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product_color_id" class="col-form-label col-lg-2">لون المنتج</label>
                        <div class="col-lg-4">
                            <select name="product_color_id" id="product_color_id"
                                    class="form-control {{$errors->has('product_color_id') ? 'is-invalid' : null}}">
{{--                                <option disabled selected>اختر لون  المنتج</option>--}}
                            </select>
                            @error('product_color_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="quantity" class="col-form-label col-lg-2 text-lg-right"> الكمية</label>
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
@section('my-js')
    <script>
        $(document).ready(function () {
            $('#product_id').on('change', function (e) {
                var product_id = $(this).val();
                if (product_id) {
                    $.ajax({
                        url: '/dashboard/getSizes/' + product_id,
                        method: 'GET',
                        type: 'json',
                        success: function (data) {
                            $('#product_size_id').empty();
                            $.each(data, function (key, value) {
                                $('#product_size_id').append('<option value="' + key + '" >' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#product_size_id').empty();
                }
            });
        });

        $(document).ready(function () {
            $('#product_id').on('change', function (e) {
                var product_id = $(this).val();
                if (product_id) {
                    $.ajax({
                        url: '/dashboard/getColors/' + product_id,
                        method: 'GET',
                        type: 'json',
                        success: function (data) {
                            $('#product_color_id').empty();
                            $.each(data, function (key, value) {
                                $('#product_color_id').append('<option value="' + key + '" >' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#product_color_id').empty();
                }
            });
        });
    </script>
@endsection

@extends('dashboard.layouts.layout')
@section('page-title')
اضافه حجم للمنتج
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
{{--                    <a href="{{route('admin.products.index')}}" class="breadcrumb-item">{{__('Products')}}</a>--}}
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
                اضافه حجم للمنتج
                </h3>
            </div>
            <hr>
            <div class="panel-body">
                <form action="{{route('admin.products.store_size',$product->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="size_id" class="control-label col-lg-2">{{__('Main Size')}}</label>
                        <div class="col-lg-10">
                            <select name="size_id" id="size_id">
                                <option disabled selected> اختر حجم</option>
                                @foreach(\App\Models\Size::all() as $size)
                                    <option value="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                            </select>
                            @error('size_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                    <button type="submit" class="btn btn-primary btn-block">{{__('Add')}}</button>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->

@endsection

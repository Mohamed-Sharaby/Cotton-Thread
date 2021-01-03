@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل منتج
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
                <h3 class="panel-title">تعديل منتج
                    <span class="badge badge-info">{{$product->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.products.update',$product->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="form-group row">
                        <label for="name" class="control-label col-lg-2">{{__('Name')}}</label>
                        <div class="col-lg-4">
                            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : null}}"
                                   placeholder="الاسم" value="{{$product->name}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="type" class="control-label col-lg-2 text-lg-right">النوع</label>
                        <div class="col-lg-4">
                            <input type="text" name="type" class="form-control {{$errors->has('type') ? 'is-invalid' : null}}"
                                   placeholder="الاسم" value="{{$product->type}}">
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="control-label col-lg-2">السعر</label>
                        <div class="col-lg-4">
                            <input type="number" name="price" class="form-control {{$errors->has('price') ? 'is-invalid' : null}}"
                                   placeholder="الاسم" value="{{$product->price}}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="warranty" class="control-label col-lg-2 text-lg-right">فترة الضمان</label>
                        <div class="col-lg-4">
                            <input type="number" name="warranty" class="form-control {{$errors->has('warranty') ? 'is-invalid' : null}}"
                                   placeholder="الاسم" value="{{$product->warranty}}">
                            @error('warranty')
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

                        @isset($product->image)
                            <div class="col-12 col-lg-6 my-auto">
                                @if($product->image)

                                    <a data-fancybox="gallery" href="{{getImgPath($product->image)}}">
                                        <img src="{{getImgPath($product->image)}}" width="100" height="100"
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

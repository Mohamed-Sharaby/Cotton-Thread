@extends('dashboard.layouts.layout')
@section('page-title')
    اضافة منتج
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
                <h3 class="panel-title"> اضافة منتج</h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="ar_name" class="col-form-label col-lg-2">الاسم بالعربية</label>
                        <div class="col-lg-4">
                            {!! Form::text('ar_name',null,[
                            'class' =>'form-control '.($errors->has('ar_name') ? ' is-invalid' : null),
                            'placeholder'=> 'الاسم بالعربية' ,
                            ]) !!}
                            @error('ar_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="en_name" class="col-form-label col-lg-2 text-lg-right">الاسم بالانجليزية</label>
                        <div class="col-lg-4">
                            {!! Form::text('en_name',null,[
                            'class' =>'form-control '.($errors->has('en_name') ? ' is-invalid' : null),
                            'placeholder'=> 'الاسم بالانجليزية' ,
                            ]) !!}
                            @error('en_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="price" class="col-form-label col-lg-2">السعر</label>
                        <div class="col-lg-4">
                            {!! Form::number('price',null,[
                            'class' =>'form-control '.($errors->has('price') ? ' is-invalid' : null),
                            'placeholder'=> 'السعر' ,
                            ]) !!}
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="discount" class="col-form-label col-lg-2 text-lg-right">الخصم </label>
                        <div class="col-lg-4">
                            {!! Form::text('discount',null,[
                            'class' =>'form-control '.($errors->has('discount') ? ' is-invalid' : null),
                            'placeholder'=> 'الخصم' ,
                            ]) !!}
                            @error('discount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subcategory_id" class="col-form-label col-lg-2 ">القسم الفرعى</label>
                        <div class="col-lg-4">
                            <select name="subcategory_id" id="subcategory_id"
                                    class="form-control {{$errors->has('subcategory_id') ? 'is-invalid' : null}}">
                                <option disabled selected>اختر القسم الفرعى</option>
                                @foreach($subCategories as $category)
                                    <option
                                        value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->ar_name}}</option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="is_new" class="col-form-label col-lg-2 text-lg-right">جديد </label>
                        <div class="col-lg-4">
                            <select name="is_new" id="is_new"
                                    class="form-control {{$errors->has('is_new') ? 'is-invalid' : null}}">
                                <option value="1" {{old('is_new') === 1 ? 'selected' : ''}}>نعم</option>
                                <option value="0" {{old('is_new') === 0 ? 'selected' : ''}}>لا</option>
                            </select>
                            @error('is_new')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ar_details" class="col-form-label col-lg-2 my-auto">الوصف بالعربية</label>
                        <div class="col-lg-10">
                            <textarea name="ar_details" id="ar_details" cols="30" rows="4"
                            class="form-control {{$errors->has('ar_details') ? 'is-invalid' : ''}}">{{old('ar_details')}}</textarea>
                            @error('ar_details')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="en_details" class="col-form-label col-lg-2 my-auto">الوصف بالانجليزية</label>
                        <div class="col-lg-10">
                            <textarea name="en_details" id="en_details" cols="30" rows="4"
                            class="form-control {{$errors->has('en_details') ? 'is-invalid' : ''}}">{{old('en_details')}}</textarea>
                            @error('en_details')
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

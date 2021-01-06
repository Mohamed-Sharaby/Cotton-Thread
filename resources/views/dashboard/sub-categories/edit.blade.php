@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل قسم فرعى
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.sub-categories.index')}}" class="breadcrumb-item">الاقسام الفرعية</a>
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
                <h3 class="panel-title">تعديل قسم فرعى
                    <span class="badge badge-info">{{$subCategory->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.sub-categories.update',$subCategory->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}


                    <div class="form-group row">
                        <label for="ar_name" class="control-label col-lg-2">{{__('Arabic Name')}}</label>
                        <div class="col-lg-4">
                            <input type="text" name="ar_name" value="{{$subCategory->ar_name}}" class="form-control {{$errors->has('ar_name') ? 'is-invalid' : null}}">
                            @error('ar_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="en_name" class="control-label col-lg-2 text-lg-right">{{__('English Name')}}</label>
                        <div class="col-lg-4">
                            <input type="text" name="en_name" value="{{$subCategory->en_name}}" class="form-control {{$errors->has('ar_name') ? 'is-invalid' : null}}">
                            @error('en_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-form-label col-lg-2 ">القسم الرئيسى</label>
                        <div class="col-lg-4">
                            <select name="category_id" id="category_id" class="form-control {{$errors->has('category_id') ? 'is-invalid' : null}}">
                                <option disabled selected>اختر القسم الرئيسى</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$subCategory->category_id == $category->id ? 'selected' : ''}}>{{$category->ar_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
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

                        @isset($subCategory->image)
                            <div class="col-12 col-lg-6 my-auto">
                                @if($subCategory->image)

                                    <a data-fancybox="gallery" href="{{$subCategory->image}}">
                                        <img src="{{$subCategory->image}}" width="100" height="100"
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

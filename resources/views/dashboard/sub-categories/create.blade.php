@extends('dashboard.layouts.layout')
@section('page-title')
   اضافة قسم فرعى
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
                <h3 class="panel-title">  اضافة قسم فرعى</h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.sub-categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="form-group row">
                    <label for="ar_name" class="col-form-label col-lg-2">{{__('Arabic Name')}}</label>
                    <div class="col-lg-4">
                        {!! Form::text('ar_name',null,[
                        'class' =>'form-control '.($errors->has('ar_name') ? ' is-invalid' : null),
                        'placeholder'=> __('Arabic Name') ,
                        ]) !!}
                        @error('ar_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <label for="en_name" class="col-form-label col-lg-2 text-lg-right">{{__('English Name')}}</label>
                    <div class="col-lg-4">
                        {!! Form::text('en_name',null,[
                        'class' =>'form-control '.($errors->has('en_name') ? ' is-invalid' : null),
                        'placeholder'=> __('English Name') ,
                        ]) !!}
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
                                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->ar_name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <label for="image" class="col-form-label col-lg-2 text-lg-right">{{__('Image')}}</label>
                    <div class="col-lg-4">
                        <input type="file" class="form-control {{$errors->has('image') ? ' is-invalid' : null}}" name="image">
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

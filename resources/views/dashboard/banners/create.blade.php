@extends('dashboard.layouts.layout')
@section('page-title')
    اضافة بانر
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.banners.index')}}" class="breadcrumb-item">البانرات</a>
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
                <h3 class="panel-title"> اضافة بانر</h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.banners.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="ar_details" class="control-label col-lg-2">التفاصيل بالعربية</label>
                        <div class="col-lg-10">
                        <textarea name="ar_details" id="ar_details" cols="30" rows="4"
                                  class="form-control {{$errors->has('ar_details') ? 'is-invalid' : null}}">{{old('ar_details')}}</textarea>
                            @error('ar_details')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="en_details" class="control-label col-lg-2">التفاصيل بالانجليزية</label>
                        <div class="col-lg-10">
                        <textarea name="en_details" id="en_details" cols="30" rows="4"
                                  class="form-control {{$errors->has('en_details') ? 'is-invalid' : null}}">{{old('en_details')}}</textarea>
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

@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل لون
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.colors.index')}}" class="breadcrumb-item">ألوان المنتجات</a>
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
                <h3 class="panel-title">تعديل لون
                    <span class="badge badge-info">{{$color->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.colors.update',$color->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="form-group row">
                        <label for="name" class="col-form-label col-lg-2 ">اسم اللون</label>
                        <div class="col-lg-4">
                            <input type="text" name="name" value="{{$color->name}}" placeholder="اسم اللون"
                                   class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="color" class="col-form-label col-lg-2 text-lg-right">اللون </label>
                        <div class="col-lg-1">
                            <input type="color" name="color" class="form-control {{$errors->has('color') ? 'is-invalid' : ''}}" value="{{$color->color}}">
                            @error('color')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-1" style="height: 40px;width: 40px;background-color: {{$color->color}}"></div>
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

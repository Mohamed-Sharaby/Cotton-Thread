@extends('dashboard.layouts.layout')
@section('page-title')
    اضافة كوبون
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.coupons.index')}}" class="breadcrumb-item">الكوبونات</a>
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
                <h3 class="panel-title"> اضافة كوبون </h3>
            </div>
            <hr>

            <div class="panel-body">

                <form action="{{route('admin.coupons.store')}}" method="post">
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
                        <label for="code" class="col-form-label col-lg-2 ">كود الكوبون </label>
                        <div class="col-lg-4">
                            {!! Form::text('code',null,[
                            'class' =>'form-control '.($errors->has('code') ? ' is-invalid' : null),
                            'placeholder'=> 'كود الكوبون ' ,
                            ]) !!}
                            @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="discount" class="col-form-label col-lg-2 text-lg-right">نسبة الخصم </label>
                        <div class="col-lg-4">
                            {!! Form::text('discount',null,[
                            'class' =>'form-control '.($errors->has('discount') ? ' is-invalid' : null),
                            'placeholder'=> 'نسبة الخصم ' ,
                            ]) !!}
                            @error('discount')
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


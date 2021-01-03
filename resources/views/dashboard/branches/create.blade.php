@extends('dashboard.layouts.layout')
@section('page-title')
    اضافة فرع
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a>
                    <a href="{{route('admin.branches.index')}}" class="breadcrumb-item">الفروع</a>
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
                <h3 class="panel-title">اضافة فرع</h3>
            </div>
            <hr>
            <div class="panel-body">
                <form action="{{route('admin.branches.store')}}" method="post">
                    @csrf

                <div class="form-group row">
                    <label for="name" class="col-form-label col-12 col-lg-2">الاسم</label>
                    <div class="col-12 col-lg-4">
                        {!! Form::text('name',null,[
                        'class' =>'form-control '.($errors->has('name') ? ' is-invalid' : null),
                        'placeholder'=> 'الاسم' ,
                        ]) !!}
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label for="phone" class="col-form-label col-12 col-lg-2 text-lg-right"> الجوال </label>
                    <div class="col-12 col-lg-4">
                        {!! Form::text('phone',null,[
                        'class' =>'form-control '.($errors->has('phone') ? ' is-invalid' : null),
                        'placeholder'=> 'الجوال' ,
                        ]) !!}
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn btn-primary btn-block">اضافة</button>
                </div>
                </form>
            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->

@endsection

@extends('dashboard.layouts.layout')
@section('page-title')
    اضافة حى
@endsection
@inject('model','App\Models\District')
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a>
                    <a href="{{route('admin.districts.index')}}" class="breadcrumb-item">الاحياء</a>
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
                <h3 class="panel-title">  اضافة حى</h3>
            </div>
            <hr>
            <div class="panel-body">
                <form action="{{route('admin.districts.store')}}" method="post">
                    @csrf
                <div class="form-group row">
                    <label for="ar_name" class="control-label col-lg-2">الاسم بالعربية </label>
                    <div class="col-lg-10">
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
                </div>
                <div class="form-group row">
                    <label for="en_name" class="control-label col-lg-2">الاسم بالانجليزية </label>
                    <div class="col-lg-10">
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
                    <label for="region_id" class="control-label col-lg-2">{{__('Region')}}</label>
                    <div class="col-lg-10">
                        <select name="region_id" id="region_id"
                                class="form-control {{$errors->has('region_id') ? ' is-invalid' : null}}">
                            <option selected disabled>{{__('Select Region')}}</option>
                            @foreach(\App\Models\Region::all() as $region)
                                <option value="{{$region->id}}">
                                    {{$region->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('region_id')
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



@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل منصب
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                       الرئيسية</a>
                    <a href="{{route('admin.roles.index')}}" class="breadcrumb-item">الصلاحيات والمناصب</a>
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
                <h3 class="panel-title">تعديل المنصب
                    <span class="badge badge-info">{{$role->name}}</span>
                </h3>
            </div>

            <div class="panel-body">
{{--                {!! Form::model($role,[--}}
{{--                'action' => ['Admin\RoleController@update',$role->id],--}}
{{--                'method'=>'put',--}}
{{--                'files' =>true--}}
{{--                ]) !!}--}}
                <form action="{{route('admin.roles.update',$role->id)}}" method="post">
                    @csrf
                    {{method_field('PUT')}}

                <div class="form-group row">
                    <label for="name" class="col-form-label col-lg-2">اسم المنصب</label>
                    <div class="col-lg-10">
                        <input type="text" name="name" class="form-control {{$errors->has('name') ? ' is-invalid' : null}}"
                               value="{{$role->name}}" placeholder="الاسم">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group ">
                    <h6 style="color: #181818;">
                       اختر الصلاحيات
                        @error('permission')
                        <div class="invalid-feedback mt-0" style="display: block;font-size: 20px;">
                            {{ $message }}
                        </div>
                        @enderror
                    </h6>
                    <div class="row mb-2">
                        <div class="col-12">
                            <input type="checkbox" id="select-all">
                            <label for="select-all">تحديد الكل</label>
                        </div>
                    </div>

                    <div class="row">
                            @foreach($permission as $value)
                            <div class="col-sm-3">
                                <label>
                                    {{ Form::checkbox('permission[]', $value->name, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->ar_name }}

                                </label>
                            </div>
                            @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-success btn-block">تعديل</button>
                </div>
                </form>
{{--                {!! Form::close() !!}--}}
            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->
@endsection

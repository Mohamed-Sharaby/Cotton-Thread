@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل مدير
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a>
                    <a href="{{route('admin.admins.index')}}" class="breadcrumb-item">المديرين</a>
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
                <h3 class="panel-title">تعديل المدير
                    <span class="badge badge-info">{{$admin->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">
{{--                {!! Form::model($admin,[--}}
{{--                'action' => ['Admin\AdminController@update',$admin->id],--}}
{{--                'method'=>'put',--}}
{{--                'files' =>true--}}
{{--                ]) !!}--}}
                <form action="{{route('admin.admins.update',$admin->id)}}" method="post">
                    @csrf
                    {{method_field('put')}}

                <div class="form-group row">
                    <label for="name" class="col-form-label col-12 col-lg-2">الاسم</label>
                    <div class="col-12 col-lg-4">
{{--                        {!! Form::text('name',null,[--}}
{{--                        'class' =>'form-control '.($errors->has('name') ? ' is-invalid' : null),--}}
{{--                        'placeholder'=> 'الاسم' ,--}}
{{--                        ]) !!}--}}
                        <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : null}}"
                               placeholder="الاسم" value="{{$admin->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label for="email" class="col-form-label col-12 col-lg-2  text-lg-right"> البريد الالكترونى</label>
                    <div class="col-12 col-lg-4">
{{--                        {!! Form::email('email',null,[--}}
{{--                        'class' =>'form-control '.($errors->has('email') ? ' is-invalid' : null),--}}
{{--                        'placeholder'=> 'البريد الالكترونى' ,--}}
{{--                        ]) !!}--}}
                        <input type="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : null}}"
                               placeholder="البريد الالكترونى" value="{{$admin->email}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-form-label col-12 col-lg-2"> كلمة المرور </label>
                    <div class="col-12 col-lg-4">
                        {!! Form::password('password',[
                        'class' =>'form-control '.($errors->has('password') ? ' is-invalid' : null),
                        'placeholder'=> 'كلمة المرور' ,
                        ]) !!}
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <label for="Password Confirmation"
                           class="col-form-label col-12 col-lg-2 text-lg-right">تأكيد كلمة المرور</label>
                    <div class="col-12 col-lg-4">
                        {!! Form::password('password_confirmation' ,[
                        'class' =>'form-control '.($errors->has('password_confirmation') ? ' is-invalid' : null),
                        'placeholder'=> 'تأكيد كلمة المرور' ,
                        ]) !!}
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-form-label col-12 col-lg-2 "> رقم الجوال </label>
                    <div class="col-12 col-lg-4">
                        <input type="text" name="phone" value="{{$admin->phone}}" class="form-control {{$errors->has('phone') ? 'is-invalid' : null}}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <label for="roles"
                           class="col-form-label col-12 col-lg-2 text-lg-right"> المنصب </label>
                    <div class="col-12 col-lg-4">
                        <select name="roles" class="form-control {{$errors->has('roles') ? ' is-invalid' : null}}" {{$admin->hasRole('Super Admin') ? 'disabled' : ''}}>
                            <option disabled selected>اختر المنصب</option>
                            @foreach($roles as $role)
                                <option
                                    value="{{$role->id}}" {{$role->id == $admin->hasRole($role->id) ? "selected" : ""}} {{$role->name == 'Super Admin' ? 'disabled' : ''}}>
                                    {{$role->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('roles')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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

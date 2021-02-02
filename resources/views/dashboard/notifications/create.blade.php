@extends('dashboard.layouts.layout')
@section('page-title')
    ارسال اشعار جديد
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.notifications.index')}}" class="breadcrumb-item">الاشعارات</a>
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
                <h3 class="panel-title"> ارسال اشعار</h3>
            </div>
            <hr>
            <div class="panel-body">
                @include('dashboard.layouts.status')

                <form action="{{route('admin.notifications.store')}}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="users" class="col-form-label col-12 col-lg-2">العملاء </label>
                        <div class="col-12 col-lg-10">
                            <select name="users[]" multiple id="users"
                                    oninvalid="this.setCustomValidity('{{__('users_required')}}')"
                                    onchange="this.setCustomValidity('')" title="اختر عميل واحد او اكثر"
                                    class="form-control js-example-basic-multiple select2 {{$errors->has('users') ? ' is-invalid' : null}}">
                                @foreach(\App\Models\User::whereIsBan(0)->get() as $user)
                                    <option
                                        value="{{$user->id}}" {{$user->id == old('users') ? "selected" : ""}}>
                                        {{$user->name}}
                                    </option>
                                @endforeach
                            </select>
                            <label id="service-error" class="error invalid-feedback" for="service"></label>
                            @error('users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="control-label col-lg-2">عنوان الاشعار</label>
                        <div class="col-lg-10">
                            {!! Form::text('title',null,['class' =>'form-control '.($errors->has('title') ? ' is-invalid' : null),
                            'placeholder'=> 'عنوان الاشعار  ',
                            ]) !!}
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="body" class="control-label col-lg-2">نص الاشعار</label>
                        <div class="col-lg-10">
                            <textarea name="body" id="body" cols="30" rows="5" placeholder="نص الاشعار"
                                      class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}">{{old('body')}}</textarea>
                            @error('body')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary btn-block">ارسال</button>
                    </div>

                </form>

            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->

@endsection

@section('my-js')
    <script>
        $(document).ready(function () {
            $('.select2').select2()
        })
    </script>
@endsection

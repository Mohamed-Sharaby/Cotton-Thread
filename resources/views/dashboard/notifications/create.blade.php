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

                    <div class="form-group row" id="client-input">
                        <label for="users" class="col-form-label col-12 col-lg-2">العملاء </label>
                        <div class="col-12 col-lg-10" >
                            {!! Form::select("user_id[]",users(),null,['class'=>'form-control col select2','multiple'=>'multiple','style'=>'width: 90%'])!!}
                            <button class="btn btn-info" type="button" onclick="selectAll('#client-input')">{{__("Select All")}}</button>
                            <label id="service-error" class="error invalid-feedback" for="service"></label>
                            @error('users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ar_name" class="control-label col-lg-2">عنوان الاشعار بالعربى</label>
                        <div class="col-lg-10">
                            {!! Form::text('ar_name',null,['class' =>'form-control '.($errors->has('ar_name') ? ' is-invalid' : null),
                            'placeholder'=> 'عنوان الاشعار  ',
                            ]) !!}
                            @error('ar_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="en_name" class="control-label col-lg-2">عنوان الاشعار بالانجليزى</label>
                        <div class="col-lg-10">
                            {!! Form::text('en_name',null,['class' =>'form-control '.($errors->has('en_name') ? ' is-invalid' : null),
                            'placeholder'=> 'عنوان الاشعار  ',
                            ]) !!}
                            @error('en_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ar_desc" class="control-label col-lg-2">نص الاشعار بالعربى</label>
                        <div class="col-lg-10">
                            <textarea name="ar_desc" id="ar_desc" cols="30" rows="5" placeholder="نص الاشعار بالعربى"
                                      class="form-control {{$errors->has('ar_desc') ? 'is-invalid' : ''}}">
                                {{old('ar_desc')}}
                            </textarea>
                            @error('ar_desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="en_desc" class="control-label col-lg-2">نص الاشعار بالانجليزى</label>
                        <div class="col-lg-10">
                            <textarea name="en_desc" id="en_desc" cols="30" rows="5" placeholder="نص الاشعار بالانجليزى"
                                      class="form-control {{$errors->has('en_desc') ? 'is-invalid' : ''}}">
                                {{old('en_desc')}}
                            </textarea>
                            @error('en_desc')
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
        function selectAll(el) {
            var select = $(el).find('select');
            var options = select.children().not('*[value=""]').map(function (k, v) {
                return v.value
            })
            select.val(options);
            select.trigger('change');
        }

    </script>
@endsection

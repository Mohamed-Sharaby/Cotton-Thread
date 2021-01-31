@extends('dashboard.layouts.layout')
@section('page-title')
    {{$page}}
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a>
                    <a href="{{route('admin.settings.index')}}" class="breadcrumb-item">الاعدادات</a>
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
            @include('dashboard.layouts.status')
            <div class="panel-body">

                <form action="{{route('admin.settings.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        @foreach($settings as $setting)
                            <div class="row  col-12 form-group">

                                <label for="{{$setting->title}}"
                                       class="col-form-label font-weight-bold col-lg-2">{{__($setting->title)}}
                                    {{$setting->name === 'delivery_cost_percentage' ? '( بالريال )': ''}}
                                    {{$setting->name === 'tax_percentage' ? '( % )': ''}}
                                </label>

                                @if($setting->type == 'text' && $setting->name == 'address')
                                    <div class="col-12 col-lg-10">
                                        <input type="tel" name="{{$setting->name}}" value="{{$setting->value}}"
                                               placeholder="العنوان " class="form-control">
                                        @error($setting->name)
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif

                                @if($setting->type == 'number' && $setting->name == 'phone')
                                    <div class="col-12 col-lg-10">
                                        <input type="tel" name="{{$setting->name}}" value="{{$setting->value}}"
                                               placeholder="رقم الهاتف" class="form-control">
                                        @error($setting->name)
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif

                                @if($setting->type == 'number' && $setting->name == 'mobile')
                                    <div class="col-12 col-lg-10">
                                        <input type="tel" name="{{$setting->name}}" value="{{$setting->value}}"
                                               placeholder="رقم الجوال" class="form-control">
                                        @error($setting->name)
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif

                                @if($setting->type == 'email')
                                    <div class="col-12 col-lg-10">
                                        <input type="email" name="{{$setting->name}}" value="{{$setting->value}}"
                                               placeholder="البريد الالكترونى" class="form-control">
                                        @error($setting->name)
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif
                                @if($setting->type == 'number' && $setting->name == 'whatsapp')
                                    <div class="col-12 col-lg-10">
                                        <input type="tel" name="{{$setting->name}}" value="{{$setting->value}}"
                                               placeholder="رقم الواتس آب " class="form-control">
                                        @error($setting->name)
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif


                                @if($setting->type == 'url')
                                    <div class="col-12 col-lg-10">
                                        <input type="url" name="{{$setting->name}}" value="{{$setting->value}}"
                                               placeholder="الرابط" class="form-control">
                                        @error($setting->name)
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif

                                @if($setting->type == 'long_text')
{{--                                    <div class="col-12 col-lg-10">--}}
{{--                        <textarea name="{{$setting->name}}" id="{{$setting->name}}" cols="30" rows="5"--}}
{{--                                  placeholder="محتوى من نحن" class="form-control">{{$setting->value}}</textarea>--}}
{{--                                        @error($setting->name)--}}
{{--                                        <div class="invalid-feedback">--}}
{{--                                            {{ $message }}--}}
{{--                                        </div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}

                                    <div class="col-12 col-lg-10">
                                        <label for="{{$setting->ar_value}}"
                                               class="col-form-label">المحتوى باللغة العربية</label>
                                        {!! Form::textarea($setting->name.'[]',$setting->ar_value,['class'=>'form-control','rows'=>4]) !!}

                                        <label for="{{$setting->en_value}}"
                                               class="col-form-label">المحتوى باللغة الانجليزية</label>
                                        {!! Form::textarea($setting->name.'[]',$setting->en_value,['class'=>'form-control','rows'=>4]) !!}
                                    </div>
                                @endif


                                {{--                                @if($setting->type == 'file' && $setting->name == 'who_we_are_image')--}}
                                {{--                                    <div class="col-12 col-lg-4">--}}
                                {{--                                        <input type="file" name="{{$setting->name}}" class="form-control">--}}
                                {{--                                        @error($setting->name)--}}
                                {{--                                        <div class="invalid-feedback">--}}
                                {{--                                            {{ $message }}--}}
                                {{--                                        </div>--}}
                                {{--                                        @enderror--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="col-12 col-lg-4">--}}
                                {{--                                        <a data-fancybox="gallery" href="{{getImgPath($setting->value)}}">--}}
                                {{--                                            <img src="{{getImgPath($setting->value)}}" width="70" height="70"--}}
                                {{--                                                 class="img-thumbnail">--}}
                                {{--                                        </a>--}}
                                {{--                                    </div>--}}
                                {{--                                @endif--}}

                                @if($setting->type == 'number' && $setting->name == 'tax_percentage')
                                    <div class="col-12 col-lg-10">
                                        <input type="text" name="{{$setting->name}}" value="{{$setting->value}}"
                                               placeholder="نسبة الضريبة" class="form-control">
                                        @error($setting->name)
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif

                                @if($setting->type == 'number' && $setting->name == 'delivery_cost_percentage')
                                    <div class="col-12 col-lg-10">
                                        <input type="text" name="{{$setting->name}}" value="{{$setting->value}}"
                                               placeholder="نسبة الضريبة" class="form-control">
                                        @error($setting->name)
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                @endif

                            </div>
                        @endforeach
                        <div class="form-group row col-12">
                            <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /form horizontal -->

    <!-- /content area -->
@endsection
@section('my-js')
    <script>
        CKEDITOR.replaceClass = 'editor';
    </script>
@endsection

@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل مكتبة الصور والفيديو
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.galleries.index')}}" class="breadcrumb-item">مكتبة الصور والفيديو</a>
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
                <h3 class="panel-title">تعديل المكتبة
                    <span class="badge badge-info">{{$gallery->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.galleries.update',$gallery->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="form-group row">
                        <label for="ar_name" class="col-form-label col-lg-2">الاسم بالعربية</label>
                        <div class="col-lg-4">
                            <input type="text" name="ar_name" value="{{$gallery->ar_name}}"
                                   class="form-control {{$errors->has('ar_name') ? 'is-invalid' : ''}}">
                            @error('ar_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <label for="en_name" class="col-form-label col-lg-2 text-lg-right">الاسم بالانجليزية</label>
                        <div class="col-lg-4">
                            <input type="text" name="en_name" value="{{$gallery->en_name}}"
                                   class="form-control {{$errors->has('en_name') ? 'is-invalid' : ''}}">
                            @error('en_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-form-label col-lg-2 ">النوع </label>
                        <div class="col-lg-4">
                            <select name="type" id="type"
                                    class="form-control {{$errors->has('type') ? 'is-invalid' : null}}">
                                <option value="image" {{$gallery->type === 'image' ? 'selected' : ''}}>صورة</option>
                                <option value="video" {{$gallery->type === 'video' ? 'selected' : ''}}>فيديو</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @if($gallery->type === 'image')
                        <div class="form-group row image">
                            <label for="image" class="col-form-label col-lg-2 my-auto">الصورة</label>
                            <div class="col-lg-10">
                                <input type="file" id="image"
                                       class="form-control {{$errors->has('image') ? ' is-invalid' : null}}"
                                       name="image">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            @isset($gallery->image)
                                <div class="col-12 col-lg-6 my-auto">
                                    @if($gallery->image)

                                        <a data-fancybox="gallery" href="{{getImgPath($gallery->image)}}">
                                            <img src="{{getImgPath($gallery->image)}}" width="100" height="100"
                                                 class="img-thumbnail">
                                        </a>
                                    @else لا يوجد صورة @endif
                                </div>
                            @endisset
                        </div>
                    @else
                        <div class="video ">
                            <div class="form-group row">
                                <label for="url" class="col-form-label col-lg-2 my-auto">رابط الفيديو</label>
                                <div class="col-lg-10">
                                    <input type="url" id="url" value="{{$gallery->url}}"
                                           oninvalid="this.setCustomValidity('رابط الفيديو مطلوب')"
                                           onchange="this.setCustomValidity('')"
                                           class="form-control {{$errors->has('url') ? ' is-invalid' : null}}"
                                           name="url">
                                    @error('url')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="ar_details" class="col-form-label col-lg-2 my-auto">الوصف بالعربية</label>
                        <div class="col-lg-10">
                            <textarea name="ar_details" id="ar_details" cols="30" rows="4"
                                      class="form-control {{$errors->has('ar_details') ? 'is-invalid' : ''}}">{{$gallery->ar_details}}</textarea>
                            @error('ar_details')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="en_details" class="col-form-label col-lg-2 my-auto">الوصف بالانجليزية</label>
                        <div class="col-lg-10">
                            <textarea name="en_details" id="en_details" cols="30" rows="4"
                                      class="form-control {{$errors->has('en_details') ? 'is-invalid' : ''}}">{{$gallery->en_details}}</textarea>
                            @error('en_details')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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

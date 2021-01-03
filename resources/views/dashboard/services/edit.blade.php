@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل خدمة
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.services.index')}}" class="breadcrumb-item">الخدمات</a>
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
                <h3 class="panel-title">تعديل خدمة
                    <span class="badge badge-info">{{$service->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.services.update',$service->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="form-group row">
                        <label for="name" class="control-label col-lg-2">{{__('Name')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : null}}"
                                   placeholder="الاسم" value="{{$service->name}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="control-label col-lg-2"> المحتوى</label>
                        <div class="col-lg-10">
                        <textarea name="content" id="content" cols="30" rows="5"
                                  class="form-control {{$errors->has('content') ? 'is-invalid' : null}}">{{$service->content}}</textarea>
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-form-label col-lg-2 my-auto">{{__('Image')}}</label>
                        <div class="col-lg-4">
                            <input type="file" class="form-control {{$errors->has('image') ? ' is-invalid' : null}}"
                                   name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        @isset($service->image)
                            <div class="col-12 col-lg-6 my-auto">
                                @if($service->image)

                                    <a data-fancybox="gallery" href="{{getImgPath($service->image)}}">
                                        <img src="{{getImgPath($service->image)}}" width="100" height="100"
                                             class="img-thumbnail">
                                    </a>
                                @else لا يوجد صورة @endif
                            </div>
                        @endisset
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

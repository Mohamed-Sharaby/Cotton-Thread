@extends('dashboard.layouts.layout')

@section('page-title')
    {{__('Edit Category')}}
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.categories.index')}}" class="breadcrumb-item">{{__('Categories')}}</a>
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
                <h3 class="panel-title">{{__('Edit Category')}}
                    <span class="badge badge-info">{{$category->name}}</span>
                </h3>
            </div>
            <hr>
            <div class="panel-body">

                <form action="{{route('admin.categories.update',$category->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}


                    <div class="form-group row">
                        <label for="ar_name" class="control-label col-lg-2">{{__('Arabic Name')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="ar_name" value="{{$category->ar_name}}" class="form-control {{$errors->has('ar_name') ? 'is-invalid' : null}}">
                            @error('ar_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="en_name" class="control-label col-lg-2">{{__('English Name')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="en_name" value="{{$category->en_name}}" class="form-control {{$errors->has('ar_name') ? 'is-invalid' : null}}">
                            @error('en_name')
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

                        @isset($category->image)
                            <div class="col-12 col-lg-6 my-auto">
                                @if($category->image)

                                    <a data-fancybox="gallery" href="{{$category->image}}">
                                        <img src="{{$category->image}}" width="100" height="100"
                                             class="img-thumbnail">
                                    </a>
                                @else ???? ???????? ???????? @endif
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

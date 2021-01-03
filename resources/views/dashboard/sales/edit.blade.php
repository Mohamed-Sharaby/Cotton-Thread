@extends('dashboard.layouts.layout')

@section('page-title')
    تعديل مبيعات الجملة
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.sales.index')}}" class="breadcrumb-item">مبيعات الجملة</a>
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
            <div class="panel-heading">
                <h3 class="panel-title">تعديل مبيعات الجملة
                </h3>
            </div>
            <hr>

            <div class="panel-body">

                <form action="{{route('admin.sales.update',$sale->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="form-group row">
                        <label for="phone" class="control-label col-lg-2">{{__('Phone')}}</label>
                        <div class="col-lg-10">
                            <input type="text" name="phone"
                                   class="form-control {{$errors->has('phone') ? 'is-invalid' : null}}"
                                   placeholder="الجوال" value="{{$sale->phone}}">
                            @error('phone')
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
                                  class="form-control {{$errors->has('content') ? 'is-invalid' : null}}">{{$sale->content}}</textarea>
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="images" class="col-form-label col-lg-2 ">{{__('Image')}}</label>
                        <div class="col-lg-4">
                            <input type="file" class="form-control {{$errors->has('images') ? ' is-invalid' : null}}"
                                   name="images[]" multiple="multiple">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 col-lg-6 ">
                            <p class="msg alert alert-success  text-center" style="display: none;margin-bottom: 10px;">
                                {{__('Image Deleted Successfully')}}
                            </p>
                            @if(!blank($sale->sale_images))
                                @foreach($sale->sale_images as $image)
                                    <div class="gallery{{$image->id}}">
                                        <br>
                                        <a data-fancybox="gallery" href="{{getImgPath($image->image)}}">
                                            <img src="{{getImgPath($image->image)}}" width="100" height="100"
                                                 class="img-thumbnail">
                                        </a>

                                        <a class="btn btn-danger del_sale_img btn-sm rounded-circle"
                                           data-id="{{$image->id}}">
                                            <i class="fa fa-trash text-white"></i></a>
                                    </div>
                                @endforeach
                            @else   {{__('No Image')}}  @endif
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
@section('my-js')
    <script>
        $(document).on('click', '.del_sale_img', function (e) {
            let confirmResult = confirm('{{__('Are you sure you want to delete this Photo ?')}}');
            if (confirmResult) {
                var id = $(this).data("id");
                $.ajax({
                    type: 'delete',
                    url: "/dashboard/sales/image/" + id,
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id,
                    },
                    success: function (data) {

                        $('.msg').css('display', 'block');
                        $('.gallery' + data.id).remove();
                    }
                });
            } else {
                e.preventDefault();
            }

        });
    </script>
@endsection

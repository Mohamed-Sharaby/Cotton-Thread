@extends('dashboard.layouts.layout')
@section('page-title')
    صور المنتجات
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <span class="breadcrumb-item active">@yield('page-title')</span>
                </div>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- Content area -->
    <div class="content">
        <!-- Basic initialization -->
        <div class="panel panel-flat">
            @include('dashboard.layouts.status')

            {{--            <div class="panel-body mb-2">--}}
            {{--                <a href="{{route('admin.product-images.create')}}" class="btn btn-primary mr-3"><i class="icon-add"--}}
            {{--                                                                                             style="margin-left: 10px;"></i>--}}
            {{--                    اضافة صور منتج</a>--}}
            {{--            </div>--}}
            <table class="table datatable-button-init-basic table-hover responsive table-responsive display nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المنتج</th>
                    <th>صور المنتج</th>
                    <th class="text-center">{{__('Operations')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $index => $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            @if(count($product->product_images) > 0)
                                @include('dashboard.product-images.images')
                            @else
                                لا يوجد
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="btn-group text-center">

                                <a href="{{url(route('admin.products.add_image',$product->id))}}"
                                   class="btn btn-primary btn-sm ml-2 rounded"><i
                                        class="fa fa-plus mr-2"></i>
                                    اضافة صور
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{--                @foreach($images as $index => $image)--}}
                {{--                    <tr>--}}
                {{--                        <td>{{$loop->iteration}}</td>--}}
                {{--                        <td>{{$image->product->name}}</td>--}}
                {{--                        <td>--}}
                {{--                            @if($image->image)--}}

                {{--                                <a data-fancybox="gallery" href="{{$image->image}}">--}}
                {{--                                    <img src="{{$image->image}}" width="70" height="70"--}}
                {{--                                         class="img-thumbnail" alt="cat_img">--}}
                {{--                                </a>--}}
                {{--                            @else {{__('No Image')}} @endif--}}
                {{--                        </td>--}}

                {{--                        <td class="text-center">--}}
                {{--                            <div class="btn-group text-center">--}}

                {{--                                <a href="{{url(route('admin.product-images.edit',$image->id))}}"--}}
                {{--                                   class="btn btn-primary btn-sm ml-2 rounded-circle"><i--}}
                {{--                                        class="fa fa-edit"></i></a>--}}


                {{--                                <form action="{{route('admin.product-images.destroy',$image->id)}}" method="post">--}}
                {{--                                    @csrf--}}
                {{--                                    {{method_field('delete')}}--}}
                {{--                                    <button class="btn btn-danger btn-sm ml-2 rounded-circle"><i--}}
                {{--                                            class="fa fa-trash"></i>--}}
                {{--                                    </button>--}}
                {{--                                </form>--}}

                {{--                            </div>--}}
                {{--                        </td>--}}
                {{--                    </tr>--}}
                {{--                @endforeach--}}
                </tbody>
            </table>
        </div>
        <!-- /basic initialization -->
    </div>
    <!-- /content area -->
@endsection

@section('my-js')
    <script async type="text/javascript"
            src="{{ asset('dashboard/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script async
            src="{{ asset('dashboard/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script async src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script async src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <!-- <script>

      $(document).ready(function() {
        ;
    } );
    </script> -->


    <script>
        $(document).on('click', '.del_image', function (e) {
            let confirmResult = confirm('{{'هل أنت متأكد من حذف هذه الصورة'}}');
            if (confirmResult) {
                var id = $(this).data("id");
                $.ajax({
                    type: 'delete',
                    url: "/dashboard/delete/image/" + id,
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id,
                    },
                    success: function (data) {

                        $('.msg').css('display', 'block');
                        $('.image' + data.id).remove();
                    }
                });
            } else {
                e.preventDefault();
            }

        });
    </script>

@endsection


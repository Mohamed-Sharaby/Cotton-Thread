@extends('dashboard.layouts.layout')
@section('page-title')
    تفاصيل المنتج
@endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        {{__('Main')}}</a>
                    <a href="{{route('admin.products.index')}}" class="breadcrumb-item">{{__('Products')}}</a>
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
            <div class="panel-body">

                <div class="card border-1 border-danger shadow-lg">
                    <div class="card-header bg-danger text-white header-elements-inline">
                        <h6 class="card-title"> تفاصيل المنتج
                            <span class="badge badge-info p-2">{{$product->name}}</span>
                        </h6>
                    </div>

                    <div class="card-header">
                        <a href="{{url(route('admin.products.quantities',$product->id))}}"
                           class="btn btn-primary btn-sm ml-2 ">
                        كميات المنتج
                        </a>

                        <a href="{{url(route('admin.products.add_image',$product->id))}}" target="_blank"
                           class="btn btn-primary btn-sm ml-2 "><i class="fa fa-plus"></i>
                        اضافة صور للمنتج
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table datatable-button-init-basic table-hover ">
                            <tr>
                                <th class="font-weight-bold">الاسم بالعربية</th>
                                <td>{{$product->ar_name}}</td>

                                <th class="font-weight-bold">الاسم بالانجليزية</th>
                                <td>{{$product->en_name}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">القسم الفرعى </th>
                                <td>{{$product->subcategory->name}}</td>

                                <th class="font-weight-bold">السعر</th>
                                <td>{{$product->price}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">الخصم</th>
                                <td>{{$product->discount}} %</td>

                                <th class="font-weight-bold">السعر بعد الخصم</th>
                                <td>{{$product->priceAfterDiscount}}</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">جديد</th>
                                <td>{{$product->is_new == 1 ? 'نعم' : 'لا'}}</td>

                                <th class="font-weight-bold">تاريخ اضافة المنتج</th>
                                <td>{{$product->created_at->format('Y.m.d') ?? __('Not Found')}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">الوصف بالعربية</th>
                                <td>{{$product->ar_details}}</td>

                                <th class="font-weight-bold">الوصف بالانجليزية</th>
                                <td>{{$product->en_details}}</td>
                            </tr>

                            <tr>
                                <th class="font-weight-bold">متوسط تقييمات المنتج</th>
                                <td>{{$product->avgRate}}</td>
                            </tr>


                            <tr>
                                <th class="font-weight-bold">  الصور التوضيحية  </th>
                                <td>
                                    @if($product->product_images)
                                        @foreach($product->product_images as $image)
                                            <a class="mr-2" data-fancybox="gallery" href="{{$image->image}}">
                                                <img src="{{$image->image}}" width="70" height="70"
                                                     class="img-thumbnail" alt="cat_img">
                                            </a>
                                        @endforeach
                                    @else
                                        لا يوجد
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- /basic initialization -->
    </div>
    <!-- /content area -->
@endsection

@section('my-js')

@endsection


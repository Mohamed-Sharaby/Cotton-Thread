@extends('dashboard.layouts.layout')
@section('page-title')
    الطلبات
@endsection
@section('content')
    <div class="page-header page-header-light ">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline ">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a>
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

            <table class="table datatable-button-init-basic table-hover responsive  table-responsive display nowrap text-center"
                   style="width:100%">
                <thead>

                <tr>
                    <th>م</th>
                    <th>رقم الطلب</th>
                    <th>اسم العميل</th>
                    <th>تاريخ الطلب</th>
                    <th>اجمالى تكلفة الطلب</th>
                    <th>حالة الطلب</th>
                    <th>التفاصيل</th>
                    <th class="text-center">العمليات</th>
                </tr>
                </thead>
                <tbody>

                @foreach($carts as $index => $cart)
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$cart->id}}</td>
                        <td>{{$cart->user->name}}</td>
                        <td>{{$cart->created_at->format('Y.m.d') ?? __('Not Found')}}</td>
                        <td>
                            @if($cart->coupon_id)
                                {{number_format(($cart->totalProductsPrice + $cart->totalProductsPrice * (getSetting('tax_percentage') / 100) ) - ($cart->totalProductsPrice * $cart->coupon->discount / 100),2)}}
                                ريال
                            @else
                                {{number_format(($cart->totalProductsPrice + $cart->totalProductsPrice * (getSetting('tax_percentage') / 100)),2) }}
                                ريال
                            @endif
                        </td>
                        <td>{{__($cart->status)}}</td>
                        <td>
                            <a href="{{url(route('admin.carts.show',$cart->id))}}"
                               class="btn btn-primary btn-sm ml-2 rounded-circle"><i
                                    class="fa fa-eye"></i></a>
                        </td>

                        <td class="text-center">
                            <div class="btn-group text-center">
{{--                                <a href="{{url(route('admin.carts.edit',$cart->id))}}"--}}
{{--                                   class="btn btn-primary btn-sm ml-2 rounded-circle"><i--}}
{{--                                        class="fa fa-edit"></i></a>--}}

{{--                                <form action="{{route('admin.carts.destroy',$cart->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    {{method_field('delete')}}--}}

{{--                                <button class="btn btn-danger btn-sm ml-2 rounded-circle">--}}
{{--                                    <i class="fa fa-trash"></i></button>--}}
{{--                                </form>--}}
                                <button data-url="{{route('admin.carts.destroy',$cart->id)}}"
                                        class="btn btn-danger rounded-circle btn-sm ml-2 delete" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /basic initialization -->
    </div>
    <!-- /content area -->



@endsection
@section('my-js')

<script async src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script async src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<!-- <script>

  $(document).ready(function() {
    ;
} );
</script> -->
@endsection

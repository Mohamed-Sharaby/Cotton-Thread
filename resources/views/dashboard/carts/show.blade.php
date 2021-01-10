@extends('dashboard.layouts.layout')
@section('page-title')
     تفاصيل الطلب رقم {{$cart->id}}
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex mr-auto">
                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a>
                    <a href="{{route('admin.carts.index')}}" class="breadcrumb-item">الطلبات</a>
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
                <div class="card border-1 border-danger shadow-lg">
                    <div class="card-header bg-danger text-white header-elements-inline">
                        <h6 class="card-title"> تفاصيل الطلب رقم {{$cart->id}}</h6>
                    </div>
                    @include('dashboard.carts.change-cart-status')
                    <div class="card-body">
                        @include('dashboard.carts.cart-user-details')
                    </div>
                </div>
                @include('dashboard.carts.items-details')
                <div class="card border-y-3 border-top-success border-bottom-success rounded-0 text-center">
                    <div class="card-header text-center">
                        <h6 class="card-title">بيانات الاجماليات</h6>
                    </div>
                    <div class="card-body">
                        <table class="table datatable-button-init-basic table-hover ">
                            <tr>
                                <th class="font-weight-bold">اجمالى سعر المنتجات</th>
{{--                                <td>{{$cart->cartItems()->sum('price')}} ريال</td>--}}
                                <td>{{$cart->totalProductsPrice}} ريال</td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">تكلفة التوصيل</th>
                                <td>
{{--                                    {{$cart->shipping_fees}} ريال--}}
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">كوبونات الخصم </th>
                                <td>
                                    @if($cart->coupon_id)
                                        <span class="badge badge-pill badge-info">{{$cart->coupon->discount . ' %'}}</span>
                                        {{ number_format($cart->totalProductsPrice * $cart->coupon->discount / 100,2) }}  ريال
                                    @else
                                        لا يوجد
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">الضريبة</th>
                                <td>
                                    <span class="badge badge-pill badge-info">{{getSetting('tax_percentage'). ' %'}}</span>
                                    {{--                                    {{$cart->totalProductsPrice * getSetting('tax_percentage') / 100}}ريال--}}
                                    {{number_format($cart->totalProductsPrice * (getSetting('tax_percentage') / 100),2).' '}}ريال
                                </td>
                            </tr>
                            <tr>
                                <th class="font-weight-bold">المجموع النهائى</th>
                                <td>
{{--                                    @if($cart->coupon_id)--}}
{{--                                        {{($cart->items()->sum('price') + $cart->shipping_fees + ($cart->total_products_price * $tax->value / 100)) - ($cart->items()->sum('price') * $cart->coupon->value / 100)}}--}}
{{--                                        ريال--}}
{{--                                    @else--}}
{{--                                        {{($cart->items()->sum('price') + $cart->shipping_fees + ($cart->total_products_price * $tax->value / 100)) }}--}}
{{--                                        ريال--}}
{{--                                    @endif--}}
                                    @if($cart->coupon_id)
                                        {{number_format(($cart->totalProductsPrice + $cart->totalProductsPrice * (getSetting('tax_percentage') / 100) ) - ($cart->totalProductsPrice * $cart->coupon->discount / 100),2)}}
                                        ريال
                                    @else
                                        {{number_format(($cart->totalProductsPrice + $cart->totalProductsPrice * (getSetting('tax_percentage') / 100)),2) }}
                                        ريال
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!----------------------------------/////////////////////////////////////////// Print bill /////////////////////////////////////////////////////////////////////// -------------------------------->

            </div>

        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->
@endsection


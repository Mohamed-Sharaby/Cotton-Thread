@extends('site.layout')
@section('title' , 'تفاصيل الطلب || خيط وقطن')
@section('styles')
    <style>
        .items_r .cart_item .remove_item1 {
            font-size: 20px;
            z-index: 9;
        }
        .remove_item1{
            color: #000000 !important;
            position: absolute;
            right: -20px;
            background-color: #fff !important;
            box-shadow: 0px 6px 12px 0px rgba(234,234,234,1);
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{route('website.users.profile')}}">حسابى</a></li>
            <li class="breadcrumb-item"><a href="{{route('website.orders.index')}}">طلباتى</a></li>
            <li class="breadcrumb-item active" aria-current="page">تفاصيل الطلب</li>
        </ol>
    </div>
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
    <section class="my_cart">
        <div class="container">
            <div class="booked">
                <div class="flex-r">
                    <h4>رقم الشحنة :</h4>
                    <h4>{{ $cart->id }}</h4>
                </div>
                <div class="flex-r">
                    <h4>تاريخ الشحنة :</h4>
                    <h4>{{ $cart->created_at->format('d/m/Y') }}</h4>
                </div>
                <div class="flex-r">
                    <h4>طريقة الدفع:</h4>
                    <h4>{{ __($cart->payment) }}</h4>
                </div>
                <div class="flex-r">
                    <h4>سعر الفاتورة:</h4>
                    <h4>
                        @if($cart->coupon_id)
                            {{number_format(($cart->totalProductsPrice + $cart->totalProductsPrice * (getSetting('tax_percentage') / 100) ) - ($cart->totalProductsPrice * $cart->coupon->discount / 100),2)}}
                            ريال
                        @else
                            {{number_format(($cart->totalProductsPrice + $cart->totalProductsPrice * (getSetting('tax_percentage') / 100)),2) }}
                            ريال
                        @endif
                    </h4>
                </div>
                <div class="flex-r">
                    <h4>تكلفة التوصيل:</h4>
                    <h4>{{getSetting('delivery_cost_percentage')}} ريال</h4>
                </div>
                <div class="flex-r">
                    <h4>الضريبة:</h4>
                    <h4>{{number_format($cart->totalProductsPrice * getSetting('tax_percentage') / 100,2)}} ريال</h4>
                </div>
                <div class="flex-r">
                    <h4>إجمالى الفاتورة:</h4>
                    <h4>
                        {{ number_format(($cart->totalProductsPrice + getSetting('delivery_cost_percentage') + ($cart->totalProductsPrice * getSetting('tax_percentage') / 100)) - ($cart->totalProductsPrice * ($cart->coupon ? $cart->coupon->discount : 0) /100),2)}}
                    </h4>
                </div>
            </div>
            <div class="order_status">
                <div class="flex-r">
                    <!----------------- NOTE :: add (this_status) class to order status ----------------->
                    <div class="{{ $cart->status == 'open' || $cart->status == 'confirmed' ? 'this_status' : '' }}">
                        <h4><i class="fas fa-check-circle"></i></h4>
                        <p>قيد التجهيز</p>
                    </div>
                    <div class="{{ $cart->status == 'finished' ? 'this_status' : '' }}">
                        <h4><i class="fas fa-check-circle"></i></h4>
                        <p>تم الشحن</p>
                    </div>
                    <div class="{{ $cart->status == 'finished ' ? 'this_status' : '' }}">
                        <h4><i class="fas fa-check-circle"></i></h4>
                        <p>تم التسليم</p>
                    </div>
                </div>
            </div>
            <p class="order_timing">
                الوقت المتوقع لوصول الشحنة ,   {{ optional($cart->delivered_at)->format('d/m/Y') }}
            </p>
            <div class="items_r">
                @foreach($cart->cartItems as $item)
                    <div class="flexx cart_item">
                        @if($cart->status == 'open')
                        <button class="nav-icon remove_item1"
                                data-url="{{route('website.orders.removeItem',$item->id)}}">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        @endif
                        <div class="item_dtls">
                            <a href="{{route('website.products.single',$item->productQuantity->product->id)}}"
                               class="i_img">
                                <img src="{{$item->productQuantity->product->image}}"
                                     onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy"
                                     decoding="async">
                            </a>
                            <div class="right_dtls">
                                <a href="{{route('website.products.single',$item->productQuantity->product->id)}}"
                                   class="item_nm">{{$item->productQuantity->product->name}}</a>
                                <span class="spanSec">{{$item->productQuantity->product->subcategory->name}}</span>
                                <div class="i_prices">
                                    @if($item->productQuantity->product->discount > 0)
                                    <p class="old_price"><span>{{$item->productQuantity->product->price}}</span><span> ر.س</span>
                                    </p>
                                    @endif
                                    <p class="new_price"><span
                                            class="current_price">{{$item->productQuantity->product->priceAfterDiscount}}</span><span> ر.س</span>
                                    </p>
{{--                                    <p class="hint">الشحن مجانا لفترة محدودة!</p>--}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <p> الكمية : <span class="quantity_in">{{$item->quantity}}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($cart->status == 'open')
                <form action="{{ route('website.orders.cancel', $cart->id) }}" method="post">@csrf
                    <button type="submit"  class="btn-hvr submit_cart">
                        إلغاء الطلب
                    </button>
                </form>
            @endif
{{--            <button type="button" data-toggle="modal" data-target="#returnsModal" class="btn-hvr submit_cart">--}}
{{--                إلغاء الطلب--}}
{{--            </button>--}}
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
    @include('site.modals.returns-modal')
@endsection
@section('scripts')
    <script src="{{asset('website/js/user/order.js')}}"></script>
@endsection

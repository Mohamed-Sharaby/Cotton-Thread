@extends('site.layout')
@section('title' , 'تم الطلب | خيط وقطن')
@section('styles')
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<section class="my_cart">
    <div class="container">
        <div class="thankss">
            <img src="{{asset('website/img/logo.png')}}">
            <p>شكرا لطلبك من متجرنا</p>
        </div>
        <div class="ord_number">
            <b>الشحنة رقم 56743677 <span><i class="fas fa-check-circle"></i></span></b>
            <p>إجمالى الفاتورة : 4563322</p>
        </div>
        <div class="items_r">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls">
                            <a href="{{url('single-product')}}" class="i_img">
                                <img src="{{asset('website/img/asset6.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <span class="spanSec">حريمى</span>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                    <p class="hint">الشحن مجانا لفترة محدودة!</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p> الكمية : <span class="quantity_in">3</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls">
                            <a href="{{url('single-product')}}" class="i_img">
                                <img src="{{asset('website/img/asset14.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <span class="spanSec">حريمى</span>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                    <p class="hint">الشحن مجانا لفترة محدودة!</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p> الكمية : <span class="quantity_in">3</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls">
                            <a href="{{url('single-product')}}" class="i_img">
                                <img src="{{asset('website/img/asset2.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <span class="spanSec">حريمى</span>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                    <p class="hint">الشحن مجانا لفترة محدودة!</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p> الكمية : <span class="quantity_in">3</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tracking">
            <a href="{{url('single-order')}}"><i class="fas fa-truck"></i> تتبع الشحنة
                <span class="arw"><i class="fas fa-chevron-left"></i></span>
            </a>
        </div>
        <a href="{{url('/')}}" class="btn-hvr submit_cart">
            <span class="z-span">استكمال التسوق</span>
        </a>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection

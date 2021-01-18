@extends('site.layout')
@section('title' , 'المفضلة | خيط وقطن')
@section('styles')
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start breadcrumb |||||||||||||||||||||||||||| -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">المفضلة</li>
    </ol>
</div>
<!-- /////////////////////||||||||||||||||||||||||||||| End breadcrumb |||||||||||||||||||||||||||| -->
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<section class="my_cart">
    <div class="container">
        <div class="items_r">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls more_width">
                            <a href="{{url('single-product')}}" class="i_img">
                                <div class="abs_badg off_b">خصم 15%</div>
                                <img src="{{asset('website/img/asset6.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <div class="rate_in">
                                    <ul class="stars">
                                        <!-- add class (.yellowed) to the number of rates --->
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p class="rate_ratio">3.4</p>
                                </div>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                </div>
                                <div class="flexx"><span class="spanSec">حريمى</span></div>
                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls more_width">
                            <a href="{{url('single-product')}}" class="i_img">
                                <div class="abs_badg newest">جديد</div>
                                <img src="{{asset('website/img/asset6.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <div class="rate_in">
                                    <ul class="stars">
                                        <!-- add class (.yellowed) to the number of rates --->
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p class="rate_ratio">3.4</p>
                                </div>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                </div>
                                <div class="flexx"><span class="spanSec">حريمى</span></div>
                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls more_width">
                            <a href="{{url('single-product')}}" class="i_img">
                                <img src="{{asset('website/img/asset6.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <div class="rate_in">
                                    <ul class="stars">
                                        <!-- add class (.yellowed) to the number of rates --->
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p class="rate_ratio">3.4</p>
                                </div>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                </div>
                                <div class="flexx"><span class="spanSec">حريمى</span></div>
                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls more_width">
                            <a href="{{url('single-product')}}" class="i_img">
                                <img src="{{asset('website/img/asset6.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <div class="rate_in">
                                    <ul class="stars">
                                        <!-- add class (.yellowed) to the number of rates --->
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p class="rate_ratio">3.4</p>
                                </div>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                </div>
                                <div class="flexx"><span class="spanSec">حريمى</span></div>
                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('site.modals.addcard')
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection

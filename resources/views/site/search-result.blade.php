	@extends('site.layout')
	@section('title' , 'نتائج البحث | خيط وقطن')
	@section('styles')
	@endsection
	@section('content')
	<!-- /////////////////////||||||||||||||||||||||||||||| Start Breadcrumbs |||||||||||||||||||||||||||| -->
	<div class="container">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
	        <li class="breadcrumb-item active" aria-current="page">نتائج البحث</li>
	    </ol>
	</div>
	<!-- /////////////////////||||||||||||||||||||||||||||| End Breadcrumbs |||||||||||||||||||||||||||| -->
	<!-- /////////////////////||||||||||||||||||||||||||||| Start All Products |||||||||||||||||||||||||||| -->
	<section class="all-sections">
	    <div class="container">
	        <div class="row">
	            <div class="all_prods">
	                <div class="row">
	                    <div class="col-md-3 col-sm-4 col-xs-6">
	                        <div class="flex_prod">
	                            <!--- add (.i_liked) class if it is favourite -->
	                            <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
	                            <!-- -->
	                            <a href="{{url('single-product')}}" class="im_prod">
	                                <img src="{{asset('website/img/asset2.jpg')}}" alt="product name">
	                            </a>
	                            <div class="descrp_body">
	                                <div class="flexx">
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
	                                    <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
	                                        <i class="fas fa-cart-plus"></i>
	                                    </button>
	                                </div>
	                                <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
	                                <div class="price_inner">
	                                    <p class="price_p"><span>100</span> ريال سعودي </p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-sm-4 col-xs-6">
	                        <div class="flex_prod">
	                            <!--- add (.i_liked) class if it is favourite -->
	                            <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
	                            <!-- -->
	                            <a href="{{url('single-product')}}" class="im_prod">
	                                <img src="{{asset('website/img/asset12.jpg')}}" alt="product name">
	                            </a>
	                            <div class="descrp_body">
	                                <div class="flexx">
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
	                                    <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
	                                        <i class="fas fa-cart-plus"></i>
	                                    </button>
	                                </div>
	                                <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
	                                <div class="price_inner">
	                                    <p class="price_p"><span>100</span> ريال سعودي </p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-sm-4 col-xs-6">
	                        <div class="flex_prod">
	                            <!--- add (.i_liked) class if it is favourite -->
	                            <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
	                            <!-- -->
	                            <a href="{{url('single-product')}}" class="im_prod">
	                                <img src="{{asset('website/img/asset2.jpg')}}" alt="product name">
	                            </a>
	                            <div class="descrp_body">
	                                <div class="flexx">
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
	                                    <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
	                                        <i class="fas fa-cart-plus"></i>
	                                    </button>
	                                </div>
	                                <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
	                                <div class="price_inner">
	                                    <p class="price_p"><span>100</span> ريال سعودي </p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-sm-4 col-xs-6">
	                        <div class="flex_prod">
	                            <!--- add (.i_liked) class if it is favourite -->
	                            <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
	                            <!-- -->
	                            <a href="{{url('single-product')}}" class="im_prod">
	                                <img src="{{asset('website/img/asset16.jpg')}}" alt="product name">
	                            </a>
	                            <div class="descrp_body">
	                                <div class="flexx">
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
	                                    <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
	                                        <i class="fas fa-cart-plus"></i>
	                                    </button>
	                                </div>
	                                <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
	                                <div class="price_inner">
	                                    <p class="price_p"><span>100</span> ريال سعودي </p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-3 col-sm-4 col-xs-6">
	                        <div class="flex_prod">
	                            <!--- add (.i_liked) class if it is favourite -->
	                            <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
	                            <!-- -->
	                            <a href="{{url('single-product')}}" class="im_prod">
	                                <img src="{{asset('website/img/asset10.jpg')}}" alt="product name">
	                            </a>
	                            <div class="descrp_body">
	                                <div class="flexx">
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
	                                    <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
	                                        <i class="fas fa-cart-plus"></i>
	                                    </button>
	                                </div>
	                                <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
	                                <div class="price_inner">
	                                    <p class="price_p"><span>100</span> ريال سعودي </p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <a class="btn-hvr see_more" href="#">عرض المزيد</a>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- /////////////////////||||||||||||||||||||||||||||| End All Products |||||||||||||||||||||||||||| -->
	@endsection
	@section('scripts')
	@endsection

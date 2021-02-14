@extends('site.layout')
@section('title' , ' خيط وقطن'.' || '.$product->name)
@section('styles')

    <link rel="stylesheet" href="{{asset('website/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">

@endsection
@section('content')
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{url('/categories')}}">الأقسام</a></li>
            <li class="breadcrumb-item active" aria-current="page">تفاصيل المنتج</li>
        </ol>
    </div>
    <section class="single-product all-sections">
        <div class="container">
            <div class="row">
                <div class="pro-details">
                   @include('site.products.product_images_slider')
                    <div class="col-md-6 col-xs-12">
                        <div class="product-deitails">
                            <h1> {{$product->name}}</h1>
                            @if(auth()->check())
                                @if (checkFav($product->id))
                                    <button  onclick="addToFavourite({{$product->id}})" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                @else
                                    <button onclick="addToFavourite({{$product->id}})" class="likerr "><i
                                            class="fas fa-heart"></i>
                                    </button>
                                @endif
                            @else
                                <a href="/login" class="likerr"><i class="fas fa-heart"></i></a>
                            @endif
                            <div class="rate_in">
                                <ul class="stars">
                                    <!-- add class (.yellowed) to the number of rates --->
                                    @for($i=0; $i< $product->product_rate; $i++)
                                        <li class="yellowed"><i class="fas fa-star"></i></li>
                                    @endfor
                                    @for($i=0;$i<(5-$product->product_rate);$i++)
                                        <li><i class="fas fa-star"></i></li>
                                    @endfor
                                </ul>
                                <p class="rate_ratio">{{$product->product_rate}}</p>
                            </div>
                            <div class="price_inner">
                                @if($product->discount > 0)
                                <p class="price_p old_price"><span>{{$product->price}}</span> ريال  </p>
                                @endif
                                <p class="price_p new_price"><span>{{$product->priceAfterDiscount}}</span> ريال </p>
                            </div>
                            <div class="remaining-quantity">
                                الكمية المتوفرة: <span> متبقى {{$product->quantity}}</span>
                            </div>
                            <p>{{$product->details}}</p>
                           @include('site.products.single-product_cart_form')
                        </div>
                    </div>
                </div>
                <div class="styled_tabs">
                    @include('dashboard.layouts.status')
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#product-deitails-k">تفاصيل المنتج </a></li>
                        <li><a data-toggle="tab" href="#product-rating-k">التقييمات</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="product-deitails-k" class="tab-pane fade in active">
                            <h2>التفاصيل</h2>
                            <p>
                                {{$product->details}}
                            </p>
                        </div>
                        <div id="product-rating-k" class="tab-pane fade">
                            @include('site.products.product-rates')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h2 class="pro-tit">منتجات ذات صلة</h2>
                    @include('site.products.similiar-products')
                </div>
            </div>
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
{{--    <script src="{{asset('website/js/user/cart.js')}}"></script>--}}
    <script src="{{asset('website/js/user/single-product.js')}}"></script>
    <script src="{{asset('website/js/swiper-bundle.min.js')}}"></script>
    <script>
        var swiper = new Swiper('.row .wrapper-k .swiper-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 0
                },
                767: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                991: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

    </script>
    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
            freeMode: true,
            loopedSlides: 5,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            loop: true,
            loopedSlides: 5,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs,
            },
        });

    </script>
@endsection

@extends('site.layouts.app')
@section('title' , 'الرئيسية | خيط وقطن')
@section('styles')
    <link rel="stylesheet" href="{{asset('website/css/swiper-bundle.min.css')}}">

@endsection
@section('content')
    <router-view></router-view>
    <!---//////////// Start Header //////////////////------------>
    {{--@include('site.home.slider')--}}
    <!---//////////// End header //////////////////------------>
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Categories Section |||||||||||||||||||||||||||| -->
    {{--@include('site.home.categories')--}}
    <!-- /////////////////////||||||||||||||||||||||||||||| End Categories Section |||||||||||||||||||||||||||| -->
    <!-- /////////////////////||||||||||||||||||||||||||||| Start New Products Section |||||||||||||||||||||||||||| -->
    {{--@include('site.home.new-products')--}}
    <!-- /////////////////////||||||||||||||||||||||||||||| End New Products Section |||||||||||||||||||||||||||| -->
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Offer Banner Section |||||||||||||||||||||||||||| -->
    {{--@include('site.home.offers-banners')--}}
    <!-- /////////////////////||||||||||||||||||||||||||||| End Offer Banner Section |||||||||||||||||||||||||||| -->
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Offers Section |||||||||||||||||||||||||||| -->
    {{--@include('site.home.products-offer')--}}
    <!-- /////////////////////||||||||||||||||||||||||||||| End Offers Section |||||||||||||||||||||||||||| -->
    {{--@include('site.modals.add-to-card')--}}
@endsection
@section('scripts')
    <script src="{{asset('website/js/swiper-bundle.min.js')}}"></script>
    <script>
        var swiper = new Swiper('.my-header .swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            keyboard: {
                enabled: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

@endsection

@extends('site.layout')
@section('title' , 'الرئيسية || خيط وقطن')
@section('styles')
    <link rel="stylesheet" href="{{asset('website/css/swiper-bundle.min.css')}}">

@endsection
@section('content')
    <!---//////////// Start Header //////////////////------------>
    <!--
<header class="my-header">
    <img src="{{asset('website/img/banner2.jpg')}}">
    <div class="container head-txt">
        <h2 class="wow animate__animated animate__fadeInDownBig">كل ما تحتاجه وأكثر</h2>
        <h3 class="wow animate__animated animate__fadeInRightBig"> عروض وخصومات هائلة على الملابس </h3>
        <p>هذا النص هو مثال لنص يمكن أن يستبدل</p>
        <a href="{{url('categories')}}" class="btn-hvr">تسوق الان </a>
    </div>
</header>
-->

    <header class="my-header">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($banners as $banner)
                <div class="swiper-slide"><img src="{{$banner->image}}"></div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </header>
    <!---//////////// End header //////////////////------------>
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Categories Section |||||||||||||||||||||||||||| -->
    @include('site.categories-section')
    <!-- /////////////////////||||||||||||||||||||||||||||| End Categories Section |||||||||||||||||||||||||||| -->
    <!-- /////////////////////||||||||||||||||||||||||||||| Start New Products Section |||||||||||||||||||||||||||| -->
    @include('site.new-products-section')
    <!-- /////////////////////||||||||||||||||||||||||||||| End New Products Section |||||||||||||||||||||||||||| -->
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Offer Banner Section |||||||||||||||||||||||||||| -->
    <section class="ofr_banner">
        <div class="box_out">
            <div class="box_in">
                <div class="flx_txt">
                    <p class="lg_txt">كل ما تحتاجه وأكثر</p>
                    <p class="smaller_txt">عروض وخصومات هائلة</p>
                    <a class="btn-hvr" href="{{url('offers')}}">تسوق الان</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Offer Banner Section |||||||||||||||||||||||||||| -->
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Offers Section |||||||||||||||||||||||||||| -->
    @include('site.offers-section')
    <!-- /////////////////////||||||||||||||||||||||||||||| End Offers Section |||||||||||||||||||||||||||| -->
{{--    @include('site.modals.add_to_cart')--}}
@endsection
@section('scripts')
    <script src="{{asset('website/js/swiper-bundle.min.js')}}"></script>
    <script>
        @if(session()->has('success'))
        toastr.success(" {{ session('success') }} ")
        @endif
    </script>
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

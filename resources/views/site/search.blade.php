@extends('site.layout')
@section('title')
    خيط وقطن ||    نتائج البحث
@endsection
@section('styles')
@endsection
@section('content')
    <!-- /////////////////////||||||||||||||||||||||||||||| Start large breadcrumbs |||||||||||||||||||||||||||| -->
    <div class="lg_brdc">
        <div class="container">
            <div class="bread_inn">
                <h1>المنتجات</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{route('website.categories.index')}}">الأقسام</a></li>
                    <li class="breadcrumb-item active" aria-current="page">المنتجات</li>
                </ol>
                <div class="styled_tabs">
                    <ul class="nav nav-tabs">
                        @isset($categories)
                            @foreach($categories as $category)
                                <li><a href="{{route('website.categories.subCategories',$category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /////////////////////||||||||||||||||||||||||||||| End large breadcrumbs |||||||||||||||||||||||||||| -->
    <!-- /////////////////////||||||||||||||||||||||||||||| Start All Products |||||||||||||||||||||||||||| -->
    <section class="all-sections">
        <div class="container">
            <!------------- NOTE -----///////////// --------->
            <!----add class(.open) to (customizer) filter in this page only ----->
            <div class="products_row open">
                <div class="row">
                    @include('site.products.filter-sidebar')
                    <div class="col-md-9 col-xs-12 filter-content">
                        <div class="products_inn">
                            <div class="all_prods">
                                @isset($products)
                                    <div class="row">
                                        @foreach($products as $product)
                                            @include('site.products.product-component',['product'=>$product])
                                            @include('site.modals.add_to_cart')
                                        @endforeach
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <div class="col-12 text-center">--}}
{{--                                            {!! $products->links() !!}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End All Products |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            if ($(window).width() < 992) {
                $(".products_row").toggleClass('open');
            }
        });
    </script>
@endsection

@extends('site.layout')
@section('title' , 'المنتجات | خيط وقطن')
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
                        @foreach($categories as $category)
                            <li><a href="{{route('website.categories.subCategories',$category->id)}}">{{$category->name}}</a></li>
                        @endforeach
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
                            <div class="basic_f hidden-xs">الترتيب حسب :</div>
                            <div class="styled_tabs">
                                <ul class="nav nav-tabs">
                                    <li><a href="#">الأكثر مشاهدة </a></li>
                                    <li class="active"><a href="#">الأعلى تقييما</a></li>
                                    <li><a href="{{url('new-products')}}">المنتجات الجديدة</a></li>
                                    <li><a href="#">من الأقل إلى الأكثر</a></li>
                                    <li><a href="#">من الأكثر إلى الأقل</a></li>
                                </ul>
                            </div>
                            <div class="all_prods">
                                <div class="row">
                                    @foreach($products as $product)
                                        @include('site.products.product-component',['product'=>$product])
                                    @endforeach
                                </div>
                               <div class="row">
                                   <div class="col-12 text-center">
                                       {!! $products->links() !!}
                                   </div>
                               </div>
{{--                                <a class="btn-hvr see_more" href="#">عرض المزيد</a>--}}
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

@extends('site.layout')
@section('title' , 'المنتجات الجديدة | خيط وقطن')
@section('styles')
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start large breadcrumbs |||||||||||||||||||||||||||| -->
<div class="lg_brdc">
    <div class="container">
        <div class="bread_inn">
            <h1>المنتجات الجديدة</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المنتجات الجديدة</li>
            </ol>
        </div>
    </div>
</div>
<!-- /////////////////////||||||||||||||||||||||||||||| End large breadcrumbs |||||||||||||||||||||||||||| -->
<!-- /////////////////////||||||||||||||||||||||||||||| Start All Products |||||||||||||||||||||||||||| -->
<section class="all-sections">
    <div class="container">
        <div class="products_row">
            <div class="row">
                @include('site.products.filter-sidebar')
                <div class="col-md-9 col-xs-12">
                    <div class="products_inn">
                        <div class="all_prods">
                            <div class="row">
                                @foreach($products as $product)
                                    @include('site.products.product-component',['product'=>$product])
                                @endforeach
                            </div>
                            <a class="btn-hvr see_more" href="#">عرض المزيد</a>
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
@endsection

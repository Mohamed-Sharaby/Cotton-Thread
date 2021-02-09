@extends('site.layout')
@section('title' , 'العروض || خيط وقطن')
@section('styles')
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start large breadcrumbs |||||||||||||||||||||||||||| -->
<div class="lg_brdc">
    <div class="container">
        <div class="bread_inn">
            <h1>العروض</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">العروض</li>
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
                                @foreach($productOffers as $product)
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="flex_prod">
                                        <!--- add (.i_liked) class if it is favourite -->
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
                                    <!-- -->
                                        <div class="abs_badg off_b">خصم {{$product->discount}}%</div>
                                        <a href="{{route('website.products.single',$product->id)}}" class="im_prod">
                                            <img src="{{$product->image}}" alt="product_img">
                                        </a>
                                        <div class="descrp_body">
                                            <div class="flexx">
                                                <div class="rate_in">
                                                    <ul class="stars">
                                                        <!-- add class (.yellowed) to the number of rates --->
                                                        @for($i=0; $i< $product->avg_rate; $i++)
                                                            <li class="yellowed"><i class="fas fa-star"></i></li>
                                                        @endfor
                                                        @for($i=0;$i<(5-$product->avg_rate);$i++)
                                                            <li><i class="fas fa-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                    <p class="rate_ratio">{{$product->avg_rate}}</p>
                                                </div>
                                                <button type="button" class="to_card addCart"
                                                        data-auth="{{ auth()->check() }}"
                                                        data-id="{{$product->id}}" data-toggle="modal" >
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                            <a href="{{route('website.products.index',$product->subcategory->id)}}" class="name_sec">{{$product->subcategory->name}}</a>
                                            <a href="{{route('website.products.single',$product->id)}}" class="name_prod">{{$product->name}}</a>
                                            <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                            <div class="price_inner">
                                                @if($product->discount > 0)
                                                <p class="price_p old_price"><span>{{$product->price}}</span> ريال  </p>
                                                @endif
                                                <p class="price_p new_price"><span>{{$product->priceAfterDiscount}}</span> ريال </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @include('site.modals.add_to_cart')
                            <div class="row">
                                <div class="col-12 text-center">
                                    {!! $productOffers->links() !!}
                                </div>
                            </div>
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

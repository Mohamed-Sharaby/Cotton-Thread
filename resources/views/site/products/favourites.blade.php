@extends('site.layout')
@section('title' , 'المفضلة || خيط وقطن')
@section('styles')
    <style>
        .remove_item1{
            color: #000000 !important;
            position: absolute;
            right: -20px;
            background-color: #fff !important;
            box-shadow: 0px 6px 12px 0px rgba(234,234,234,1);
        }
        .items_r .row{
            display: flex;
            flex-wrap: wrap;
        }
    </style>
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
                    @foreach($favourites as $favourite)
                        <div class="col-md-6 col-xs-12 pro">
                            <div class="flexx cart_item">
                                <button class="nav-icon remove_item1"
                                        data-url="{{route('website.favourites.destroy',$favourite->id)}}">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <div class="item_dtls more_width">
                                    <a href="{{route('website.products.single',$favourite->product->id)}}"
                                       class="i_img">
                                        <img src="{{$favourite->product->image}}"
                                             onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy"
                                             decoding="async">
                                    </a>
                                    <div class="right_dtls">
                                        <a href="{{route('website.products.single',$favourite->product->id)}}"
                                           class="item_nm">{{$favourite->product->name}}</a>
                                        <div class="rate_in">
                                            <ul class="stars">
                                                <!-- add class (.yellowed) to the number of rates --->
                                                @for($i=0; $i< $favourite->product->product_rate; $i++)
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                @endfor
                                                @for($i=0;$i<(5-$favourite->product->product_rate);$i++)
                                                    <li><i class="fas fa-star"></i></li>
                                                @endfor
                                            </ul>
                                            <p class="rate_ratio">{{$favourite->product->product_rate}}</p>
                                        </div>
                                        <div class="i_prices">
                                            @if($favourite->product->discount > 0)
                                            <p class="old_price">
                                                <span>{{$favourite->product->price}}</span><span> ر.س</span></p>
                                            @endif
                                            <p class="new_price"><span
                                                    class="current_price">{{$favourite->product->priceAfterDiscount}}</span><span> ر.س</span>
                                            </p>
                                        </div>
                                        <div class="flexx"><span
                                                class="spanSec">{{$favourite->product->subcategory->name}}</span>
                                        </div>

                                        <button type="button" class="to_card addCart"
                                                data-id="{{$favourite->product->id}}" data-toggle="modal" >
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
{{--    @include('site.modals.addcard')--}}
    @include('site.modals.add_to_cart')
    <!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
    <script src="{{asset('website/js/user/product.js')}}"></script>
@endsection

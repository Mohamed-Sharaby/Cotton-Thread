<div class="col-xs-12 wrapper-k">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($similar_products as $pro)
                <div class="swiper-slide">
                    <div class="flex_prod">
                        <!--- add (.i_liked) class if it is favourite -->
                        @if(auth()->check())
                            @if (checkFav($pro->id))
                                <button  onclick="addToFavourite({{$pro->id}})" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                            @else
                                <button onclick="addToFavourite({{$pro->id}})" class="likerr "><i
                                        class="fas fa-heart"></i>
                                </button>
                            @endif
                        @else
                            <a href="/login" class="likerr"><i class="fas fa-heart"></i></a>
                        @endif

                        <a href="{{route('website.products.single',$pro->id)}}" class="im_prod">
                            <img src="{{$pro->image}}" alt="product name">
                        </a>
                        <div class="descrp_body">
                            <div class="flexx">
                                <div class="rate_in">
                                    <ul class="stars">
                                        <!-- add class (.yellowed) to the number of rates --->
                                        @for($i=0; $i< $pro->avg_rate; $i++)
                                            <li class="yellowed"><i class="fas fa-star"></i></li>
                                        @endfor
                                        @for($i=0;$i<(5-$pro->avg_rate);$i++)
                                            <li><i class="fas fa-star"></i></li>
                                        @endfor
                                    </ul>
                                    <p class="rate_ratio">{{$pro->avg_rate}}</p>
                                </div>
{{--                                <button type="button" class="to_card addCart" data-toggle="modal"--}}
{{--                                        data-id="{{$pro->id}}">--}}
{{--                                    <i class="fas fa-cart-plus"></i>--}}
{{--                                </button>--}}
                            </div>
                            <a href="{{url('categories')}}"
                               class="name_sec">{{$pro->subcategory->name}}</a>
                            <a href="{{route('website.products.single',$pro->id)}}"
                               class="name_prod">{{$pro->name}}</a>
                            <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                            <div class="price_inner">
                                @if($pro->discount > 0)
                                <p class="price_p old_price"><span>{{$pro->price}}</span> ريال
                                </p>
                                @endif
                                <p class="price_p new_price">
                                    <span>{{$pro->priceAfterDiscount}}</span> ريال </p>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>
{{--    @include('site.modals.add_to_cart')--}}
</div>

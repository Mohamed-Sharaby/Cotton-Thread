<section class="all-sections">
    <div class="container">
        <div class="head-title">
            <h2>العروض والخصومات</h2>
            <p>يوجد أكثر من {{$categoriesCount}} قسم للملابس الجاهزة</p>
        </div>
        <div class="flex_row">
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
                                        @for($i=0; $i< $product->product_rate; $i++)
                                            <li class="yellowed"><i class="fas fa-star"></i></li>
                                        @endfor
                                        @for($i=0;$i<(5-$product->product_rate);$i++)
                                            <li><i class="fas fa-star"></i></li>
                                        @endfor
                                    </ul>
                                    <p class="rate_ratio">{{$product->product_rate}}</p>
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
        </div>
        <a class="btn-hvr see_more" href="{{route('website.offers')}}">عرض المزيد</a>
    </div>
</section>

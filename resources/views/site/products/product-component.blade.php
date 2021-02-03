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

        <a href="{{route('website.products.single',$product->id)}}" class="im_prod">
            <img src="{{$product->image}}" alt="product name">
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
            <a href="{{route('website.products.single',$product->id)}}" class="name_prod">{{$product->name}}   </a>
            <div class="price_inner">
                <p class="price_p"><span>{{$product->priceAfterDiscount}}</span> ريال  </p>
            </div>
        </div>
    </div>
</div>

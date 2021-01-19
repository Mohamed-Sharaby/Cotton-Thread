<div class="col-md-3 col-sm-4 col-xs-6">
    <div class="flex_prod">
        <!--- add (.i_liked) class if it is favourite -->
        <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
        <!-- -->
        <a href="{{route('website.products.single',$product->id)}}" class="im_prod">
            <img src="{{$product->image}}" alt="product name">
        </a>
        <div class="descrp_body">
            <div class="flexx">
                <div class="rate_in">
                    <ul class="stars">
                        <!-- add class (.yellowed) to the number of rates --->
                        <li class="yellowed"><i class="fas fa-star"></i></li>
                        <li class="yellowed"><i class="fas fa-star"></i></li>
                        <li class="yellowed"><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                        <li><i class="fas fa-star"></i></li>
                    </ul>
                    <p class="rate_ratio">{{$product->avg_rate}}</p>
                </div>
                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                    <i class="fas fa-cart-plus"></i>
                </button>
            </div>
            <a href="{{route('website.products.single',$product->id)}}" class="name_prod">{{$product->name}}   </a>
            <div class="price_inner">
                <p class="price_p"><span>{{$product->priceAfterDiscount}}</span> ريال سعودي </p>
            </div>
        </div>
    </div>
</div>

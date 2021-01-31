<div class="flexx cart_item">
    <button class="nav-icon remove_item" data-id="{{ $item->id }}">
        <i class="far fa-trash-alt"></i>
    </button>
    <div class="item_dtls">
        <a href="{{route('website.products.single',$item->productQuantity->product->id)}}"
           class="i_img">
            <img src="{{$item->productQuantity->product->image}}"
                 onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy"
                 decoding="async">
            <div class="abs_badg off_b">
                خصم {{$item->productQuantity->product->discount}}%
            </div>
        </a>
        <div class="right_dtls">
            <a href="{{url('single-product')}}"
               class="item_nm">{{$item->productQuantity->product->name}}</a>
            <span
                class="spanSec">{{$item->productQuantity->product->subcategory->name}}</span>
            <div class="i_prices">
                <p class="old_price">
                    <span>{{$item->productQuantity->product->price}}</span><span> ر.س</span>
                </p>
                <p class="new_price"><span
                        class="current_price">{{$item->productQuantity->product->priceAfterDiscount}}</span><span> ر.س</span>
                </p>
{{--                <p class="hint">الشحن مجانا لفترة محدودة!</p>--}}
            </div>
        </div>
    </div>
    <div>
        <div class="number-input">
            <button type="button" onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus">
                <i class="fas fa-plus"></i>
            </button>

            <input class="quantity" name="quantity[]" min="1" max="{{$item->productQuantity->quantity}}" value="{{$item->quantity}}" type="number"
                   data-product="{{$item->productQuantity->id }}" data-item="{{$item->id}}"
                   data-cart="{{$item->cart_id}}" id="qyt_change">

            <button type="button" onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus">
                <i class="fas fa-minus"></i>
            </button>
        </div>
        <div class="left_price">
            <span class="updatePrice"></span><span> {{' '}}ر.س</span>
        </div>
    </div>
</div>

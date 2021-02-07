<form method="POST" id="cartForm">
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <div class="cart_blocks">
        <div class="cont_block">
            <label class="lbl_block">الألوان المتاحة</label>
            <div class="custom_radio clr_radio">
                @foreach($product->product_colors as $color)
                    <div class="rad_n">
                        <input type="radio" class="pro_color" id="color-{{$color->id}}" name="color" value="{{$color->id}}" data-product="{{$product->id}}"/>
                        <label for="color-{{$color->id}}"
                               style="background-color: {{$color->color}};"></label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="cont_block">
            <label class="lbl_block">المقاسات المتاحة</label>
            <div class="custom_radio txt_radio">
                {{--                                            @foreach($product->product_sizes as $size)--}}
                {{--                                                <div class="rad_n">--}}
                {{--                                                    <input type="radio" id="size-{{$size->id}}" name="size" value="{{$size->id}}"/>--}}
                {{--                                                    <label for="size-{{$size->id}}">{{$size->size}}</label>--}}
                {{--                                                </div>--}}
                {{--                                            @endforeach--}}
            </div>
        </div>
        <div class="cont_block">
            <label class="lbl_block">الكمية</label>
            <div class="number-input">
                <div onclick="this.parentNode.querySelector('.quantity').stepUp()"
                     class="plus"><i class="fas fa-plus"></i></div>
                <input class="quantity" min="1"  name="quantity" value="2" type="number" >
                <div onclick="this.parentNode.querySelector('.quantity').stepDown()"
                     class="minus"><i class="fas fa-minus"></i></div>
            </div>
            @if(auth()->check())
                <button type="submit" class="btn-hvr"  >
                    اضافة للسلة <span><i class="fas fa-cart-plus"></i></span>
                </button>
            @else
                <a class="btn-hvr" href="{{url('/login')}}">
                    اضافة للسلة <span><i class="fas fa-cart-plus"></i></span>
                </a>
            @endif
        </div>
    </div>
</form>

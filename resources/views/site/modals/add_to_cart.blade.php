<!------------ add card Modal ------------>
<div class="modal custom_modal fade" id="AddToCartModal" tabindex="-1"
     role="dialog" aria-labelledby="addCardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content addcartmodal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal_inner">
                <form method="post" id="cartForm">

                    <input type="hidden" name="product_id" id="proId">
                    <div class="cart_blocks">
                        <div class="cont_block">
                            <label class="lbl_block">الألوان المتاحة</label>
                            <div class="custom_radio clr_radio">
                                {{--                                @foreach($product->product_colors as $color)--}}
                                {{--                                <div class="rad_n">--}}
                                {{--                                    <input type="radio" id="color-{{$color->id}}" name="color" value="{{$color->id}}"/>--}}
                                {{--                                    <label for="color-{{$color->id}}" style="background-color: {{$color->color}};"></label>--}}
                                {{--                                </div>--}}
                                {{--                                @endforeach--}}
                            </div>
                        </div>
                        <div class="cont_block">
                            <label class="lbl_block">المقاسات المتاحة</label>
                            <div class="custom_radio txt_radio">
                                {{--                                @foreach($product->product_sizes as $size)--}}
                                {{--                                <div class="rad_n">--}}
                                {{--                                    <input type="radio" id="size-{{$size->id}}" name="size" value="{{$size->id}}" />--}}
                                {{--                                    <label for="size-{{$size->id}}">{{$size->size}}</label>--}}
                                {{--                                </div>--}}
                                {{--                                @endforeach--}}
                            </div>
                        </div>
                        <div class="cont_block">
                            <label class="lbl_block">الكمية</label>
                            <div class="number-input">
                                <div onclick="this.parentNode.querySelector('.quantity').stepUp()"
                                     class="plus"><i class="fas fa-plus"></i></div>
                                <input class="quantity" min="1" name="quantity" value="1" type="number">
                                <div onclick="this.parentNode.querySelector('.quantity').stepDown()"
                                     class="minus"><i class="fas fa-minus"></i></div>
                            </div>
                        </div>
                    </div>
                    @if(auth()->check())
                        <button class="btn-hvr" type="submit">
                            اضافة للسلة <span><i class="fas fa-cart-plus"></i></span>
                        </button>
                    @else
                        <a class="btn-hvr" href="{{url('/login')}}">
                            اضافة للسلة <span><i class="fas fa-cart-plus"></i></span>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<!------------ End Sign In Modal ------------>

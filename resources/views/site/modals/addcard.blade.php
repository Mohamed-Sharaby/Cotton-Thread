<!------------ add card Modal ------------>
<div class="modal custom_modal fade" id="addCardModal" tabindex="-1" role="dialog" aria-labelledby="addCardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content addcartmodal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal_inner">
                <form action="{{url('/')}}">
                    <div class="cart_blocks">
                        <div class="cont_block">
                            <label class="lbl_block">الألوان المتاحة</label>
                            <div class="custom_radio clr_radio">
                                <div class="rad_n">
                                    <input type="radio" id="color1" name="color" />
                                    <label for="color1" style="background-color: #B84064;"></label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="color2" name="color" />
                                    <label for="color2" style="background-color: #70BFC6;"></label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="color3" name="color" />
                                    <label for="color3" style="background-color: #323361;"></label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="color4" name="color" />
                                    <label for="color4" style="background-color: #BBCADC;"></label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="color5" name="color" />
                                    <label for="color5" style="background-color: #EA9C51;"></label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="color6" name="color" checked />
                                    <label for="color6" style="background-color: #ffffff;"></label>
                                </div>
                            </div>
                        </div>
                        <div class="cont_block">
                            <label class="lbl_block">المقاسات المتاحة</label>
                            <div class="custom_radio txt_radio">
                                <div class="rad_n">
                                    <input type="radio" id="small" name="size" />
                                    <label for="small">s</label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="medium" name="size" checked />
                                    <label for="medium">m</label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="large" name="size" />
                                    <label for="large">l</label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="xlarge" name="size" />
                                    <label for="xlarge">xl</label>
                                </div>
                                <div class="rad_n">
                                    <input type="radio" id="2xlarge" name="size" />
                                    <label for="2xlarge">2xl</label>
                                </div>
                            </div>
                        </div>
                        <div class="cont_block">
                            <label class="lbl_block">الكمية</label>
                            <div class="number-input">
                                <div onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus"> <i class="fas fa-plus"></i> </div>
                                <input class="quantity" min="0" name="quantity" value="0" type="number">
                                <div onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus"> <i class="fas fa-minus"></i> </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn-hvr" type="submit">
                        اضافة للسلة <span><i class="fas fa-cart-plus"></i></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!------------ End Sign In Modal ------------>

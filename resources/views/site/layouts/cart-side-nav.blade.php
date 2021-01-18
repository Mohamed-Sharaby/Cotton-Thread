<!-- /////////////////////||||||||||| Start Nav Cart |||||||||||||||||||| -->
<li>
    <a href="javascript:void(0)" class="menu-toggle">
                                <span class="nav-icon"> <i class="fas fa-shopping-bag"></i>
                                    <span class="badge">3</span>
                                </span>
    </a>
    <div class="side-menu notifi-menu">
        <button type="button" class="nav-icon close-menu"><i class="fas fa-times"></i></button>
        <div class="fixed-li">
            <a href="{{url('cart')}}" class="btn-hvr"><span class="z-span">عرض السلة</span></a>
        </div>
        <ul>
            <li>
                <div class="flexx cart_item">
                    <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                    <span class="bell">
                                                <img src="{{asset('website/img/asset8.jpg')}}">
                                            </span>
                    <div class="notify">
                        <h4>مجموعة الصابون الطبيعى</h4>
                        <h5 class="sec_name">خيط وقطن</h5>
                        <div class="theQnt"> الكمية :
                            <div class="number-input">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus"> <i class="fas fa-plus"></i> </button>
                                <input class="quantity" min="1" max="30" value="1" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus"> <i class="fas fa-minus">
                                    </i> </button>
                            </div>
                        </div>
                        <p class="old_price">300 ريال </p>
                        <p class="i_price">140 ريال </p>
                        <p class="hint">الشحن مجانا لفترة محدودة</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flexx cart_item">
                    <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                    <span class="bell">
                                                <img src="{{asset('website/img/asset2.jpg')}}">
                                            </span>
                    <div class="notify">
                        <h4>مجموعة الصابون الطبيعى</h4>
                        <h5 class="sec_name">خيط وقطن</h5>
                        <div class="theQnt"> الكمية :
                            <div class="number-input">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus"> <i class="fas fa-plus"></i> </button>
                                <input class="quantity" min="1" max="30" value="1" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus"> <i class="fas fa-minus">
                                    </i> </button>
                            </div>
                        </div>
                        <p class="old_price">300 ريال </p>
                        <p class="i_price">140 ريال </p>
                        <p class="hint">الشحن مجانا لفترة محدودة</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flexx cart_item">
                    <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                    <span class="bell">
                                                <img src="{{asset('website/img/asset16.jpg')}}">
                                            </span>
                    <div class="notify">
                        <h4>مجموعة الصابون الطبيعى</h4>
                        <h5 class="sec_name">خيط وقطن</h5>
                        <div class="theQnt"> الكمية :
                            <div class="number-input">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus"> <i class="fas fa-plus"></i> </button>
                                <input class="quantity" min="1" max="30" value="1" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus"> <i class="fas fa-minus">
                                    </i> </button>
                            </div>
                        </div>
                        <p class="old_price">300 ريال </p>
                        <p class="i_price">140 ريال </p>
                        <p class="hint">الشحن مجانا لفترة محدودة</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flexx cart_item">
                    <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                    <span class="bell">
                                                <img src="{{asset('website/img/asset6.jpg')}}">
                                            </span>
                    <div class="notify">
                        <h4>مجموعة الصابون الطبيعى</h4>
                        <h5 class="sec_name">خيط وقطن</h5>
                        <div class="theQnt"> الكمية :
                            <div class="number-input">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus"> <i class="fas fa-plus"></i> </button>
                                <input class="quantity" min="1" max="30" value="1" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus"> <i class="fas fa-minus">
                                    </i> </button>
                            </div>
                        </div>
                        <p class="old_price">300 ريال </p>
                        <p class="i_price">140 ريال </p>
                        <p class="hint">الشحن مجانا لفترة محدودة</p>
                    </div>
                </div>
            </li>
            <div class="lock">
                <img src="{{asset('website/img/lock.png')}}">
                <p>
                    من فضلك قم بتسجيل الدخول لكى يتم عملية الشراء والدفع وأكثر
                </p>
                <a href="{{url('register')}}" class="btn-hvr">
                    تسجيل جديد
                </a>
            </div>
        </ul>
    </div>
</li>
<!-- /////////////////////||||||||||| End Nav Cart |||||||||||||||||||| -->
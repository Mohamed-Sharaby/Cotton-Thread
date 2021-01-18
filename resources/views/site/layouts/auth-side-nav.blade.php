<!-- /////////////////////||||||||||| Start Sign up/In Links  |||||||||||||||||||| -->
<li>
    <a href="javascript:void(0)" class="menu-toggle">
        <span class="nav-icon"><i class="fas fa-user-plus"></i></span>
    </a>
    <div class="side-menu flexx pro-menu">
        <div>
            <button type="button" class="nav-icon close-menu"><i class="fas fa-times"></i></button>
            <img src="{{asset('website/img/logo.png')}}">
            <h3 class="welcomee">أهلا بك ...</h3>
            <p>كل ما تحتاجه ستجده فى متجرنا</p>
            <a href="{{url('categories')}}" class="pink_a">تسوق الان</a>
            <div class="log_anchors">
                <router-link to="/sign-in" class="btn-hvr">
                    تسجيل دخول
                </router-link>
                <a href="{{url('register')}}" class="btn-hvr">
                    تسجيل جديد
                    </a>
            </div>
        </div>
    </div>
</li>
<!-- /////////////////////||||||||||| End Sign up/In Links  |||||||||||||||||||| -->
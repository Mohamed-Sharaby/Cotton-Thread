<!-- /////////////////////|||||| Start Navbar |||||||||||||||||||||||||||| -->
<div class="navbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-7">
                <div class="nav-right">
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <a href="{{url('/')}}" class="logo-nav">
                        <img src="{{asset('website/img/logo.png')}}">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-sm-8 col-xs-0">
                <div class="navy">
                    <ul class="nav cf" id="ul1">
                        <li><a href="{{url('/')}}" class="{{ Request::is('/') ? 'active' : '' }}">الرئيسية</a></li>
                        <li><a href="{{url('categories')}}" class="{{ Request::is('categories') ? 'active' : '' }}">الأقسام</a></li>
                        <li><a href="{{url('new-products')}}" class="{{ Request::is('new-products') ? 'active' : '' }}">المنتجات الجديدة</a></li>
                        <li><a href="{{url('offers')}}" class="{{ Request::is('offers') ? 'active' : '' }}">العروض</a></li>
                        <li><a href="{{url('about')}}" class="{{ Request::is('about') ? 'active' : '' }}">من نحن</a></li>
                    <!--                            <li><a href="{{url('multimedia')}}" class="{{ Request::is('multimedia') ? 'active' : '' }}">مكتبة الصور والفيديوهات</a></li>-->
                        <li><a href="{{url('contact')}}" class="{{ Request::is('contact') ? 'active' : '' }}">اتصل بنا</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-2 col-xs-5">
                <ul class="nav-tools">
                    <!-- /////////////////////||||||||||| Start Searchbar |||||||||||||||||||| -->
                    <li>
                        <form action="{{url('search-result')}}" method="GET" class="search-form" role="search">
                            <div class="form-group" id="search">
                                <input type="text" class="form-control" placeholder="بحث">
                                <button type="submit" class="form-control form-control-submit">بحث</button>
                                <span class="nav-icon"> <i class="fas fa-search"></i></span>
                            </div>
                        </form>
                    </li>
                    <!-- /////////////////////||||||||||| End Searchbar |||||||||||||||||||| -->
                    <!----------------********************** show this if user logged in ***************------------------------------>
                    <!-- /////////////////////||||||||||| Start Nav Profile  |||||||||||||||||||| -->
{{--                @include('site.layouts.profile-side-nav')--}}
                <!-- /////////////////////||||||||||| End Nav Profile  |||||||||||||||||||| -->
                    <!----------------********************** show this if user NOT logged in ***************------------------------------>
                    <!-- /////////////////////||||||||||| Start Sign up/In Links  |||||||||||||||||||| -->
                                    @include('site.layouts.auth-side-nav')
                <!-- /////////////////////||||||||||| End Sign up/In Links  |||||||||||||||||||| -->
                    <!-- /////////////////////||||||||||| Start favourite |||||||||||||||||||| -->
                    <li>
                        <a href="{{url('favourite')}}">
                            <span class="nav-icon"><i class="far fa-heart"></i></span>
                        </a>
                    </li>
                    <!-- /////////////////////||||||||||| End favourite |||||||||||||||||||| -->
                    <!-- /////////////////////||||||||||| Start Nav Cart |||||||||||||||||||| -->
                @include('site.layouts.cart-side-nav')
                <!-- /////////////////////||||||||||| End Nav Cart |||||||||||||||||||| -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////|||||| End Navbar |||||||||||||||||||||||||||| -->
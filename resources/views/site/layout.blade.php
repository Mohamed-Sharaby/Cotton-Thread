<!DOCTYPE html>
<html>
<head>
    <!-- /////////////////////|||||||Start Layout |||||||||||||||||||| -->
    <meta charset="UTF-8" lang="ar">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="true">
    <meta name="HandheldFriendly" content="true">
    <link rel="dns-prefetch" href="//www.instagram.com">
    <link rel="dns-prefetch" href="//www.linkedin.com">
    <link rel="dns-prefetch" href="//www.facebook.com">
    <link rel="dns-prefetch" href="//www.twitter.com">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="subject" content="خيط القطن">
    <meta name="copyright" content="خيط القطن">
    <meta name="language" content="ar">
    <meta name="robots" content="index,follow">
    <meta name="topic" content="ملابس صنعت بجودة خاصة">
    <meta name="Classification" content="ملابس صنعت بجودة خاصة">
    <meta name="designer" content="بانوراما القصيم">
    <meta name="owner" content="خيط القطن">
    <meta name="category" content="خيط القطن">
    <meta name="author" content="خيط القطن">
    <meta name="keywords" content="خيط القطن السعودي, ملابس السعودية, خيط القطن, خيط القطن">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="خيط القطن تقدم أفضل أنواع الملابس">
    <!------ start generated favicon ---->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('website/img/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('website/img/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('website/img/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('website/img/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('website/img/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('website/img/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('website/img/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('website/img/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('website/img/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('website/img/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('website/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('website/img/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('website/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('website/img/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#784E29">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#784E29">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!------ End generated favicon ----->
    <link rel="preload" href="{{asset('website/css/bootstrap.min.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/css/animate.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/css/fontawesome.min.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/fontawesome.min.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/css/button.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/button.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/css/main.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/main.css')}}">
    </noscript>
    @yield('styles')
    <link rel="preload" href="{{asset('website/scss/cart.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/scss/cart.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/scss/first.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/scss/first.css')}}">
    </noscript>
    <!-- /////////////////////|||||||End Layout |||||||||||||||||||| -->
</head>
<body>
<div class="body-overlay"></div>
<!-- Start Loading-Page -->
<div class="loader">
    <div class="load_out">
        <div class="load_inn">
        </div>
    </div>
</div>
<!-- End Loading-Page -->
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
                        <li><a href="{{url('categories')}}" class="{{ Request::is('categories') ? 'active' : '' }}">الأقسام</a>
                        </li>
                        <li><a href="{{url('new-products')}}" class="{{ Request::is('new-products') ? 'active' : '' }}">المنتجات
                                الجديدة</a></li>
                        <li><a href="{{url('offers')}}" class="{{ Request::is('offers') ? 'active' : '' }}">العروض</a>
                        </li>
                        <li><a href="{{url('about')}}" class="{{ Request::is('about') ? 'active' : '' }}">من نحن</a>
                        </li>
                    <!--                            <li><a href="{{url('multimedia')}}" class="{{ Request::is('multimedia') ? 'active' : '' }}">مكتبة الصور والفيديوهات</a></li>-->
                        <li><a href="{{url('contact')}}" class="{{ Request::is('contact') ? 'active' : '' }}">اتصل
                                بنا</a></li>
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
                    @if (auth()->check())
                        <li>
                            <a href="javascript:void(0)" class="menu-toggle">
                                <span class="nav-icon"><i class="far fa-user"></i></span>
                            </a>
                            <div class="side-menu flexx pro-menu">
                                <div>
                                    <button type="button" class="nav-icon close-menu"><i class="fas fa-times"></i>
                                    </button>
                                    @if (auth()->user()->image)
                                        <img src="{{asset('website/img/user.png')}}" class="rads_im">
                                    @else
                                        <img src="{{auth()->user()->image}}" class="rads_im">
                                    @endif
                                    <h4> {{ auth()->user()->name }}</h4>
                                    <p>{{ auth()->user()->email }}</p>
                                    <ul>
                                        <li>
                                            <a href="{{route('website.users.profile')}}">
                                                الحساب الشخصى
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('profile-orders')}}">
                                                طلباتى
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('profile-wallet')}}">
                                                المحفظة
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('website.users.addresses.index')}}">
                                                عنوانى
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('profile-notifications')}}">
                                                الإشعارات
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('/')}}">
                                                تسجيل الخروج
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- /////////////////////||||||||||| End Nav Profile  |||||||||||||||||||| -->
                        <!----------------********************** show this if user NOT logged in ***************------------------------------>
                        <!-- /////////////////////||||||||||| Start Sign up/In Links  |||||||||||||||||||| -->
                    @else
                        <li>
                            <a href="javascript:void(0)" class="menu-toggle">
                                <span class="nav-icon"><i class="fas fa-user-plus"></i></span>
                            </a>
                            <div class="side-menu flexx pro-menu">
                                <div>
                                    <button type="button" class="nav-icon close-menu"><i class="fas fa-times"></i>
                                    </button>
                                    <img src="{{asset('website/img/logo.png')}}">
                                    <h3 class="welcomee">أهلا بك ...</h3>
                                    <p>كل ما تحتاجه ستجده فى متجرنا</p>
                                    <a href="{{url('categories')}}" class="pink_a">تسوق الان</a>
                                    <div class="log_anchors">
                                        <a href="{{route('login')}}" class="btn-hvr">
                                            تسجيل دخول
                                        </a>
                                        <a href="{{route('register')}}" class="btn-hvr">
                                            تسجيل جديد
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                @endif
                <!-- /////////////////////||||||||||| End Sign up/In Links  |||||||||||||||||||| -->
                    <!-- /////////////////////||||||||||| Start favourite |||||||||||||||||||| -->
                    <li>
                        <a href="{{url('favourite')}}">
                            <span class="nav-icon"><i class="far fa-heart"></i></span>
                        </a>
                    </li>
                    <!-- /////////////////////||||||||||| End favourite |||||||||||||||||||| -->
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
                                        <button class="nav-icon remove_item"><i class="far fa-trash-alt"></i></button>
                                        <span class="bell">
                                                <img src="{{asset('website/img/asset8.jpg')}}">
                                            </span>
                                        <div class="notify">
                                            <h4>مجموعة الصابون الطبيعى</h4>
                                            <h5 class="sec_name">خيط وقطن</h5>
                                            <div class="theQnt"> الكمية :
                                                <div class="number-input">
                                                    <button type="button"
                                                            onclick="this.parentNode.querySelector('.quantity').stepUp()"
                                                            class="plus"><i class="fas fa-plus"></i></button>
                                                    <input class="quantity" min="1" max="30" value="1" type="number">
                                                    <button type="button"
                                                            onclick="this.parentNode.querySelector('.quantity').stepDown()"
                                                            class="minus"><i class="fas fa-minus">
                                                        </i></button>
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
                                        <button class="nav-icon remove_item"><i class="far fa-trash-alt"></i></button>
                                        <span class="bell">
                                                <img src="{{asset('website/img/asset2.jpg')}}">
                                            </span>
                                        <div class="notify">
                                            <h4>مجموعة الصابون الطبيعى</h4>
                                            <h5 class="sec_name">خيط وقطن</h5>
                                            <div class="theQnt"> الكمية :
                                                <div class="number-input">
                                                    <button type="button"
                                                            onclick="this.parentNode.querySelector('.quantity').stepUp()"
                                                            class="plus"><i class="fas fa-plus"></i></button>
                                                    <input class="quantity" min="1" max="30" value="1" type="number">
                                                    <button type="button"
                                                            onclick="this.parentNode.querySelector('.quantity').stepDown()"
                                                            class="minus"><i class="fas fa-minus">
                                                        </i></button>
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
                                        <button class="nav-icon remove_item"><i class="far fa-trash-alt"></i></button>
                                        <span class="bell">
                                                <img src="{{asset('website/img/asset16.jpg')}}">
                                            </span>
                                        <div class="notify">
                                            <h4>مجموعة الصابون الطبيعى</h4>
                                            <h5 class="sec_name">خيط وقطن</h5>
                                            <div class="theQnt"> الكمية :
                                                <div class="number-input">
                                                    <button type="button"
                                                            onclick="this.parentNode.querySelector('.quantity').stepUp()"
                                                            class="plus"><i class="fas fa-plus"></i></button>
                                                    <input class="quantity" min="1" max="30" value="1" type="number">
                                                    <button type="button"
                                                            onclick="this.parentNode.querySelector('.quantity').stepDown()"
                                                            class="minus"><i class="fas fa-minus">
                                                        </i></button>
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
                                        <button class="nav-icon remove_item"><i class="far fa-trash-alt"></i></button>
                                        <span class="bell">
                                                <img src="{{asset('website/img/asset6.jpg')}}">
                                            </span>
                                        <div class="notify">
                                            <h4>مجموعة الصابون الطبيعى</h4>
                                            <h5 class="sec_name">خيط وقطن</h5>
                                            <div class="theQnt"> الكمية :
                                                <div class="number-input">
                                                    <button type="button"
                                                            onclick="this.parentNode.querySelector('.quantity').stepUp()"
                                                            class="plus"><i class="fas fa-plus"></i></button>
                                                    <input class="quantity" min="1" max="30" value="1" type="number">
                                                    <button type="button"
                                                            onclick="this.parentNode.querySelector('.quantity').stepDown()"
                                                            class="minus"><i class="fas fa-minus">
                                                        </i></button>
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
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /////////////////////|||||| End Navbar |||||||||||||||||||||||||||| -->
<!---////////////  //////////////////------------>
<!---////////////  //////////////////------------>
@yield('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Footer |||||||||||||||||||||||||||| -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="{{url('/')}}" class="foot-logo">
                    <!--------- if arabic use this img ---------->
                    <img src="{{asset('website/img/logo-ar-wh.png')}}">
                    <!--------- if english use this img ---------->
                <!-- <img src="{{asset('website/img/logo-en-wh.png')}}"> -->
                </a>
                <p>
                    هذا النص هو مثال لنص يمكن ان يستبدل من مولد النص العربى
                    هذا النص هو مثال لنص يمكن ان يستبدل من مولد النص العربى
                    هذا النص هو مثال لنص يمكن ان يستبدل من مولد النص العربى
                    هذا النص هو مثال لنص يمكن ان يستبدل من مولد النص العربى
                    هذا النص هو مثال لنص يمكن ان يستبدل من مولد النص العربى
                    هذا النص هو مثال لنص يمكن ان يستبدل من مولد النص العربى
                </p>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="foot1">
                    <h3 class="f-title">أشهر الأقسام</h3>
                    <ul>
                        @foreach(\App\Models\SubCategory::active()->get() as $subCategory)
                            <li>
                                <a href="{{route('website.products.index',['id' => $subCategory->id])}}">{{$subCategory->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="foot1">
                    <h3 class="f-title">خدمة العملاء</h3>
                    <ul>
                        @foreach(\App\Models\Setting::whereType('long_text')->where('name','!=','key_words')->get() as $page)
                            <li><a href="{{url('pages/'.$page->id)}}">{{__($page->title)}} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <ul class="social">
            @foreach(\App\Models\Setting::whereType('url')->get() as $link)
                @if($link->name == 'facebook')

                    <li><a href="{{$link->value}}" target="_blank" class="icon-f"><i
                                class="fab fa-facebook"></i></a></li>
                @endif
                @if($link->name == 'google')
                    <li><a href="{{$link->value}}" target="_blank" class="icon-g"><i
                                class="fab fa-google-plus-g"></i></a></li>
                @endif
                @if($link->name == 'twitter')
                    <li><a href="{{$link->value}}" target="_blank" class="icon-tw"><i
                                class="fab fa-twitter"></i></a></li>
                @endif
                @if($link->name == 'instagram')
                    <li><a href="{{$link->value}}" target="_blank" class="icon-ig"><i
                                class="fab fa-instagram"></i></a></li>
                @endif
            @endforeach
        </ul>
        <div class="copyright">
            &copy;
            جميع الحقوق محفوظة لدى شركة<a href="http://panorama-q.com/">بانوراما القصيم</a> <span
                id="currentYear"></span>
        </div>
    </div>
</footer>
<!--Scroll Button-->
<div id="scroll-top">
    <i class="fa fa-angle-up"></i>
    <p>إلى الأعلى</p>
</div>
<!-- /////////////////////||||||||||||||||||||||||||||| End Footer |||||||||||||||||||||||||||| -->
<!-- /////////////////////||||||||||||||||||||||||||||| Start Script |||||||||||||||||||||||||||| -->
<script src="{{asset('website/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/fontawesome.min.js')}}"></script>
<script src="{{asset('website/js/wow.min.js')}}"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    toastr.options = {
        "preventDuplicates": true,
        "closeButton": true,
        "positionClass": "toast-top-right",
        "timeOut": "6000",
        "newestOnTop": false,
    }
</script>
<script>
    $(function () {
        new WOW().init();
    });
</script>
<script src="{{asset('website/js/main.js')}}"></script>
<script>
    $('ul.nav-tools .dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
</script>
<script>
    $(document).ready(function () {
        $('.sm-remove').click(function () {
            $(this).closest('.one-cart').parent("li").remove();
        });
    });
</script>
<!---- search form -->
<script>
    $(document).ready(function () {
        $('#search').on("click", (function (e) {
            $(".search-form .form-group").addClass("sb-search-open");
            e.stopPropagation()
        }));
        $(document).on("click", function (e) {
            if ($(e.target).is("#search") === false && $(".search-form .form-control").val().length == 0) {
                $(".search-form .form-group").removeClass("sb-search-open");
            }
        });
        $(".form-control-submit").click(function (e) {
            $(".search-form .form-control").each(function () {
                if ($(".search-form .form-control").val().length == 0) {
                    e.preventDefault();
                    $(this).css('border', '2px solid #EA9C51');
                }
            })
        })
    })
</script>
<!---- side menu --->
<script>
    $(".menu-toggle").click(function () {
        $(this).next(".side-menu").toggleClass("show-menu");
    });
    $(".close-menu").click(function () {
        $(this).parents(".side-menu").toggleClass("show-menu");
    });
</script>
<!---- remove cart item --->
<script>
    $(".remove_item").click(function () {
        $(this).parent(".cart_item").fadeOut(300);
        $(this).parent(".cart_item").parents(".col-md-6.col-xs-12").fadeOut(300);
    });
</script>
@yield('scripts')
<!-- /////////////////////||||||||||||||||||||||||||||| End Script |||||||||||||||||||||||||||| -->
</body>
</html>

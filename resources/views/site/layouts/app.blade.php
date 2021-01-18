<!DOCTYPE html>
<html>
<head>
    <!-- /////////////////////|||||||Start Layout |||||||||||||||||||| -->
    <meta charset="UTF-8" lang="ar">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="true">
    <meta name="HandheldFriendly" content="true">
    <link rel="dns-prefetch" href="//www.instagram.com">
    <link rel="dns-prefetch" href="//www.linkedin.com">
    <link rel="dns-prefetch" href="//www.facebook.com">
    <link rel="dns-prefetch" href="//www.twitter.com">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="user-id" content="{{auth('web')->user()}}">
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
    <!------ End generated favicon ----->
    <link rel="preload" href="{{asset('website/css/bootstrap.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/css/animate.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/css/fontawesome.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/fontawesome.min.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/css/button.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/button.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/css/main.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/css/main.css')}}">
    </noscript>
    @yield('styles')
    <link rel="preload" href="{{asset('website/scss/cart.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/scss/cart.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('website/scss/first.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{asset('website/scss/first.css')}}">
    </noscript>
    <!-- /////////////////////|||||||End Layout |||||||||||||||||||| -->
</head>
<body>
<div id="app">
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
@include('site.layouts.navbar')
<!-- /////////////////////|||||| End Navbar |||||||||||||||||||||||||||| -->
    <!---////////////  //////////////////------------>
    <!---////////////  //////////////////------------>
@yield('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Footer |||||||||||||||||||||||||||| -->
@include('site.layouts.footer')
<!-- /////////////////////||||||||||||||||||||||||||||| End Footer |||||||||||||||||||||||||||| -->
</div>

<!-- /////////////////////||||||||||||||||||||||||||||| Start Script |||||||||||||||||||||||||||| -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('website/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/fontawesome.min.js')}}"></script>
<script src="{{asset('website/js/wow.min.js')}}"></script>
<script>
    $(function() {
        new WOW().init();
    });
</script>
<script src="{{asset('website/js/main.js')}}"></script>
<script>
    $('ul.nav-tools .dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
</script>
<script>
    $(document).ready(function() {
        $('.sm-remove').click(function() {
            $(this).closest('.one-cart').parent("li").remove();
        });
    });
</script>
<!---- search form -->
<script>
    $(document).ready(function() {
        $('#search').on("click", (function(e) {
            $(".search-form .form-group").addClass("sb-search-open");
            e.stopPropagation()
        }));
        $(document).on("click", function(e) {
            if ($(e.target).is("#search") === false && $(".search-form .form-control").val().length == 0) {
                $(".search-form .form-group").removeClass("sb-search-open");
            }
        });
        $(".form-control-submit").click(function(e) {
            $(".search-form .form-control").each(function() {
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
    $(".menu-toggle").click(function() {
        $(this).next(".side-menu").toggleClass("show-menu");
    });
    $(".close-menu").click(function() {
        $(this).parents(".side-menu").toggleClass("show-menu");
    });
</script>
<!---- remove cart item --->
<script>
    $(".remove_item").click(function() {
        $(this).parent(".cart_item").fadeOut(300);
    });
</script>
@yield('scripts')
<!-- /////////////////////||||||||||||||||||||||||||||| End Script |||||||||||||||||||||||||||| -->
</body>
</html>

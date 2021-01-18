@extends('site.layout')
@section('title' , 'المنتجات الجديدة | خيط وقطن')
@section('styles')
@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start large breadcrumbs |||||||||||||||||||||||||||| -->
<div class="lg_brdc">
    <div class="container">
        <div class="bread_inn">
            <h1>المنتجات الجديدة</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المنتجات الجديدة</li>
            </ol>
        </div>
    </div>
</div>
<!-- /////////////////////||||||||||||||||||||||||||||| End large breadcrumbs |||||||||||||||||||||||||||| -->
<!-- /////////////////////||||||||||||||||||||||||||||| Start All Products |||||||||||||||||||||||||||| -->
<section class="all-sections">
    <div class="container">
        <div class="products_row">
            <div class="row">
                <div class="col-md-3 col-xs-0 customizer">
                    <a class="customizer-toggle" href="javascript:void(0)">
                        <span class="display-close"><i class="fas fa-cog "></i></span>
                        <div class="display_open"><i class="fas fa-times "></i><span>إخفاء الفلتر</span></div>
                    </a>
                    <div class="customescroll">
                        <div class="cart_blocks">
                            <div class="cont_block">
                                <h4 class="filt_title">الأقسام</h4>
                                <div class="the_checks">
                                    <label class="custom_check">اكسسوارات
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">اكسسوارات
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">شنط
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">أحذية
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">اكسسوارات
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">شنط
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">أحذية
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">اكسسوارات
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">شنط
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">أحذية
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="cont_block">
                                <h4 class="filt_title">الألوان</h4>
                                <div class="the_checks">
                                    <label class="custom_check custom_color">ازرق
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark" style="background-color: #3A73BE;"></span>
                                        <span class="overlays"></span>
                                    </label>
                                    <label class="custom_check custom_color">اسود
                                        <input type="checkbox">
                                        <span class="checkmark" style="background-color: #000;"></span>
                                        <span class="overlays"></span>
                                    </label>
                                    <label class="custom_check custom_color">فوشيا
                                        <input type="checkbox">
                                        <span class="checkmark" style="background-color: #E8598C;"></span>
                                        <span class="overlays"></span>
                                    </label>
                                    <label class="custom_check custom_color">لبنى
                                        <input type="checkbox">
                                        <span class="checkmark" style="background-color: #53A6E2;"></span>
                                        <span class="overlays"></span>
                                    </label>
                                    <label class="custom_check custom_color">اخضر
                                        <input type="checkbox">
                                        <span class="checkmark" style="background-color: #81D742;"></span>
                                        <span class="overlays"></span>
                                    </label>
                                    <label class="custom_check custom_color">رصاصى غامق
                                        <input type="checkbox">
                                        <span class="checkmark" style="background-color: #474747;"></span>
                                        <span class="overlays"></span>
                                    </label>
                                    <label class="custom_check custom_color">هافان
                                        <input type="checkbox">
                                        <span class="checkmark" style="background-color: #995C12;"></span>
                                        <span class="overlays"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="cont_block">
                                <h4 class="filt_title">المقاس</h4>
                                <div class="the_checks">
                                    <label class="custom_check">X-Small
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">Small
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">Medium
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">Large
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">XLarge
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">2XLarge
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">3XLarge
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="cont_block">
                                <h4 class="filt_title">السعر</h4>
                                <div class="the_checks not_flx">
                                    <label class="custom_check">0-100 ريال سعودى
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">0-100 ريال سعودى
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">0-100 ريال سعودى
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">0-100 ريال سعودى
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="custom_check">0-100 ريال سعودى
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="products_inn">
                        <div class="all_prods">
                            <div class="row">
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="flex_prod">
                                        <!--- add (.i_liked) class if it is favourite -->
                                        <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                        <!-- -->
                                        <div class="abs_badg newest">جديد</div>
                                        <a href="{{url('single-product')}}" class="im_prod">
                                            <img src="{{asset('website/img/asset7.jpg')}}" alt="product name">
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
                                                    <p class="rate_ratio">3.4</p>
                                                </div>
                                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                            <a href="{{url('categories')}}" class="name_sec">رجالى</a>
                                            <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                            <div class="price_inner">
                                                <p class="price_p"><span>100</span> ريال سعودي </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="flex_prod">
                                        <!--- add (.i_liked) class if it is favourite -->
                                        <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                        <!-- -->
                                        <div class="abs_badg newest">جديد</div>
                                        <a href="{{url('single-product')}}" class="im_prod">
                                            <img src="{{asset('website/img/asset7.jpg')}}" alt="product name">
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
                                                    <p class="rate_ratio">3.4</p>
                                                </div>
                                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                            <a href="{{url('categories')}}" class="name_sec">رجالى</a>
                                            <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                            <div class="price_inner">
                                                <p class="price_p"><span>100</span> ريال سعودي </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="flex_prod">
                                        <!--- add (.i_liked) class if it is favourite -->
                                        <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                        <!-- -->
                                        <div class="abs_badg newest">جديد</div>
                                        <a href="{{url('single-product')}}" class="im_prod">
                                            <img src="{{asset('website/img/asset7.jpg')}}" alt="product name">
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
                                                    <p class="rate_ratio">3.4</p>
                                                </div>
                                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                            <a href="{{url('categories')}}" class="name_sec">رجالى</a>
                                            <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                            <div class="price_inner">
                                                <p class="price_p"><span>100</span> ريال سعودي </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="flex_prod">
                                        <!--- add (.i_liked) class if it is favourite -->
                                        <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                        <!-- -->
                                        <div class="abs_badg newest">جديد</div>
                                        <a href="{{url('single-product')}}" class="im_prod">
                                            <img src="{{asset('website/img/asset7.jpg')}}" alt="product name">
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
                                                    <p class="rate_ratio">3.4</p>
                                                </div>
                                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                            <a href="{{url('categories')}}" class="name_sec">رجالى</a>
                                            <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                            <div class="price_inner">
                                                <p class="price_p"><span>100</span> ريال سعودي </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="flex_prod">
                                        <!--- add (.i_liked) class if it is favourite -->
                                        <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                        <!-- -->
                                        <div class="abs_badg newest">جديد</div>
                                        <a href="{{url('single-product')}}" class="im_prod">
                                            <img src="{{asset('website/img/asset7.jpg')}}" alt="product name">
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
                                                    <p class="rate_ratio">3.4</p>
                                                </div>
                                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                            <a href="{{url('categories')}}" class="name_sec">رجالى</a>
                                            <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                            <div class="price_inner">
                                                <p class="price_p"><span>100</span> ريال سعودي </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="flex_prod">
                                        <!--- add (.i_liked) class if it is favourite -->
                                        <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                        <!-- -->
                                        <div class="abs_badg newest">جديد</div>
                                        <a href="{{url('single-product')}}" class="im_prod">
                                            <img src="{{asset('website/img/asset7.jpg')}}" alt="product name">
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
                                                    <p class="rate_ratio">3.4</p>
                                                </div>
                                                <button type="button" class="to_card" data-toggle="modal" data-target="#addCardModal">
                                                    <i class="fas fa-cart-plus"></i>
                                                </button>
                                            </div>
                                            <a href="{{url('categories')}}" class="name_sec">رجالى</a>
                                            <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                            <div class="price_inner">
                                                <p class="price_p"><span>100</span> ريال سعودي </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn-hvr see_more" href="#">عرض المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End All Products |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
@endsection

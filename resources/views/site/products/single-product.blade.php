@extends('site.layout')
@section('title' , 'تفاصيل المنتج | خيط وقطن')
@section('styles')

    <link rel="stylesheet" href="{{asset('website/css/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('website/css/k-style.css')}}">

@endsection
@section('content')
<!-- /////////////////////||||||||||||||||||||||||||||| Start Section |||||||||||||||||||||||||||| -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item"><a href="{{url('/categories')}}">الأقسام</a></li>
        <li class="breadcrumb-item active" aria-current="page">تفاصيل المنتج</li>
    </ol>
</div>
<section class="single-product all-sections">
    <div class="container">
        <div class="row">
            <div class="pro-details">
                <div class="col-md-6 col-xs-12">

                    <div class="img-pro-slider">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset10.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset2.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset6.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset7.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset8.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset9.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset12.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset13.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset14.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset16.jpg')}})"></div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                               <div class="swiper-slide" style="background-image:url({{asset('website/img/asset10.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset2.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset6.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset7.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset8.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset9.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset12.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset13.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset14.jpg')}})"></div>
                                <div class="swiper-slide" style="background-image:url({{asset('website/img/asset16.jpg')}})"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="product-deitails">
                        <h1> {{$product->name}}</h1>
                        <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                        <div class="rate_in">
                            <ul class="stars">
                                <!-- add class (.yellowed) to the number of rates --->
                                <li class="yellowed"><i class="fas fa-star"></i></li>
                                <li class="yellowed"><i class="fas fa-star"></i></li>
                                <li class="yellowed"><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                                <li><i class="fas fa-star"></i></li>
                            </ul>
                            <p class="rate_ratio">{{$product->avg_rate}}</p>
                        </div>
                        <div class="price_inner">
                            <p class="price_p old_price"><span>{{$product->price}}</span> ريال سعودي </p>
                            <p class="price_p new_price"><span>{{$product->priceAfterDiscount}}</span> ريال </p>
                        </div>
                        <div class="remaining-quantity">
                            الكمية المتوفرة: <span> متبقى {{$product->quantity}}</span>
                        </div>
                        <p>{{$product->details}}</p>
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
                                    <a class="btn-hvr" href="{{url('/cart')}}">
                                        اضافة للسلة <span><i class="fas fa-cart-plus"></i></span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="styled_tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#product-deitails-k">تفاصيل المنتج </a></li>
                    <li><a data-toggle="tab" href="#product-rating-k">التقييمات</a></li>
                </ul>
                <div class="tab-content">
                    <div id="product-deitails-k" class="tab-pane fade in active">
                        <h2>التفاصيل</h2>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                            ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                        </p>
                    </div>
                    <div id="product-rating-k" class="tab-pane fade">
                        <div class="pro-rating">
                            <div class="col-md-6 col-xs-12">
                                <div class="user-rating">
                                    <div class="rate_in">
                                        <p class="rate_ratio">4.9</p>
                                        <ul class="stars">
                                            <!-- add class (.yellowed) to the number of rates --->
                                            <li class="yellowed"><i class="fas fa-star"></i></li>
                                            <li class="yellowed"><i class="fas fa-star"></i></li>
                                            <li class="yellowed"><i class="fas fa-star"></i></li>
                                            <li class="yellowed"><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul>
                                        <span>التقييم الكلى</span>
                                    </div>
                                    <div class="user-rating-details-wrap">
                                        <h3>التقييم الكلى</h3>
                                        <div class="user-rating-details">
                                            <span>الخامة</span>
                                            <div class="v-rating">
                                                <span style="width:50%"></span>
                                            </div>
                                        </div>
                                        <div class="user-rating-details">
                                            <span>الجودة</span>
                                            <div class="v-rating">
                                                <span style="width:75%"></span>
                                            </div>
                                        </div>
                                        <div class="user-rating-details">
                                            <span>التوصيل</span>
                                            <div class="v-rating">
                                                <span style="width:25%"></span>
                                            </div>
                                        </div>
                                        <div class="user-rating-details">
                                            <span>السعر</span>
                                            <div class="v-rating">
                                                <span style="width:100%"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-comment">
                                        <h2>التقييمات ( 20 )</h2>
                                        <div class="user-comment-content">
                                            <div class="user-data">
                                                <img src="{{asset('website/img/user.png')}}">
                                                <h3>ايمان احمد نبيل</h3>
                                                <span>27 Jun 2020 , 4:30 pm</span>
                                            </div>
                                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                                            <div class="rate_in">
                                                <p class="rate_ratio">4.7 <span>جيد جدأ</span></p>
                                                <ul class="stars">
                                                    <!-- add class (.yellowed) to the number of rates --->
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="user-comment-content">
                                            <div class="user-data">
                                                <img src="{{asset('website/img/user.png')}}">
                                                <h3>ياسمين خالد وليد</h3>
                                                <span>25 Jun 2020 , 8:30 pm</span>
                                            </div>
                                            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                                            <div class="rate_in">
                                                <p class="rate_ratio">4.7 <span>جيد جدأ</span></p>
                                                <ul class="stars">
                                                    <!-- add class (.yellowed) to the number of rates --->
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                    <li class="yellowed"><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="your-rating">
                                    <form>
                                        <h3>إضافة تقييمك</h3>
                                        <div class="form__group field">
                                            <input type="text" class="form__field" placeholder="الاسم" id='name' required />
                                            <label for="name" class="form__label">الاسم</label>
                                        </div>
                                        <div class="form__group field">
                                            <input type="email" class="form__field" placeholder="البريد الالكترونى" name="email" id='mail' required />
                                            <label for="mail" class="form__label">البريد الإلكترونى</label>
                                        </div>
                                        <div class="rating-pro">
                                            <span>السعر</span>
                                            <div class="rate_in">
                                                <ul class="stars">
                                                    <!-- add class (.yellowed) to the number of rates --->
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="rating-pro">
                                            <span>التوصيل</span>
                                            <div class="rate_in">
                                                <ul class="stars">
                                                    <!-- add class (.yellowed) to the number of rates --->
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="rating-pro">
                                            <span>الخامة</span>
                                            <div class="rate_in">
                                                <ul class="stars">
                                                    <!-- add class (.yellowed) to the number of rates --->
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="rating-pro">
                                            <span>الجودة</span>
                                            <div class="rate_in">
                                                <ul class="stars">
                                                    <!-- add class (.yellowed) to the number of rates --->
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <textarea placeholder="إضافة تعليق" required name="content"></textarea>
                                        <button type="submit" class="btn-hvr">إضافة</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h2 class="pro-tit">منتجات ذات صلة</h2>
                <div class="col-xs-12 wrapper-k">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="flex_prod">
                                    <!--- add (.i_liked) class if it is favourite -->
                                    <button type="button" class="likerr"><i class="fas fa-heart"></i></button>
                                    <!-- -->

                                    <a href="{{url('single-product')}}" class="im_prod">
                                        <img src="{{asset('website/img/asset9.jpg')}}" alt="product name">
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
                                        <a href="{{url('categories')}}" class="name_sec">أطفال</a>
                                        <a href="{{url('single-product')}}" class="name_prod">معطف من الصوف الإيطالى</a>
                                        <!--------- if there is old price and new price use class (.old_price) to first and (.new_price) to the second please -->
                                        <div class="price_inner">
                                            <p class="price_p old_price"><span>400</span> ريال سعودي </p>
                                            <p class="price_p new_price"><span>100</span> ريال </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /////////////////////||||||||||||||||||||||||||||| End Section |||||||||||||||||||||||||||| -->
@endsection
@section('scripts')
<script src="{{asset('website/js/swiper-bundle.min.js')}}"></script>
<script>
    var swiper = new Swiper('.row .wrapper-k .swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 0
            },
            767: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            991: {
                slidesPerView: 4,
                spaceBetween: 40
            }
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

</script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 4,
        loop: true,
        freeMode: true,
        loopedSlides: 5,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        loop: true,
        loopedSlides: 5,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs,
        },
    });

</script>
@endsection

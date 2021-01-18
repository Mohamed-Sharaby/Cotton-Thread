<template>
    <!-- /////////////////////||||||||||||||||||||||||||||| Start Categories Section |||||||||||||||||||||||||||| -->
    <section class="all-sections">
        <div class="container">
            <div class="head-title">
                <h2>الأقسام</h2>
                <p>يوجد أكثر من 20 قسم للملابس الجاهزة</p>
            </div>
            <div class="styled_tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#for-women">حريمى </a></li>
                    <li><a data-toggle="tab" href="#for-men">رجالى</a></li>
                    <li><a data-toggle="tab" href="#for-kids">أطفال</a></li>
                    <li><a data-toggle="tab" href="#for-shoes">أحذية</a></li>
                    <li><a data-toggle="tab" href="#for-bags">شنط</a></li>
                </ul>
                <div class="tab-content">
                    <div id="for-women" class="tab-pane fade in active">
                        <div class="theProds">
                            <div class="flex_row">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="flex_prod">
                                            <!--- add (.i_liked) class if it is favourite -->
                                            <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                            <!-- -->
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset2.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
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
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset12.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
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
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset2.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
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
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset16.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
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
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset10.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
                                                <div class="price_inner">
                                                    <p class="price_p"><span>100</span> ريال سعودي </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn-hvr see_more" href="#">عرض المزيد</a>
                        </div>
                    </div>
                    <div id="for-men" class="tab-pane fade">
                        <div class="theProds">
                            <div class="flex_row">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="flex_prod">
                                            <!--- add (.i_liked) class if it is favourite -->
                                            <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                            <!-- -->
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset2.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
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
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset12.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
                                                <div class="price_inner">
                                                    <p class="price_p"><span>100</span> ريال سعودي </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn-hvr see_more" href="#">عرض المزيد</a>
                        </div>
                    </div>
                    <div id="for-kids" class="tab-pane fade">
                        <div class="theProds">
                            <div class="flex_row">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="flex_prod">
                                            <!--- add (.i_liked) class if it is favourite -->
                                            <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                            <!-- -->
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset2.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
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
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset12.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
                                                <div class="price_inner">
                                                    <p class="price_p"><span>100</span> ريال سعودي </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn-hvr see_more" href="#">عرض المزيد</a>
                        </div>
                    </div>
                    <div id="for-shoes" class="tab-pane fade">
                        <div class="theProds">
                            <div class="flex_row">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="flex_prod">
                                            <!--- add (.i_liked) class if it is favourite -->
                                            <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                            <!-- -->
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset2.jpg`" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
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
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset12.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
                                                <div class="price_inner">
                                                    <p class="price_p"><span>100</span> ريال سعودي </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn-hvr see_more" href="#">عرض المزيد</a>
                        </div>
                    </div>
                    <div id="for-bags" class="tab-pane fade">
                        <div class="theProds">
                            <div class="flex_row">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <div class="flex_prod">
                                            <!--- add (.i_liked) class if it is favourite -->
                                            <button type="button" class="likerr i_liked"><i class="fas fa-heart"></i></button>
                                            <!-- -->
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset2.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
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
                                            <a href="#" class="im_prod">
                                                <img :src="`website/img/asset12.jpg`|baseUrl" alt="product name">
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
                                                <a href="#" class="name_prod">معطف من الصوف الإيطالى</a>
                                                <div class="price_inner">
                                                    <p class="price_p"><span>100</span> ريال سعودي </p>
                                                </div>
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
    </section>
    <!-- /////////////////////||||||||||||||||||||||||||||| End Categories Section |||||||||||||||||||||||||||| -->

</template>

<script>
    export default {
        name: "Categories"
    }
</script>

<style scoped>

</style>
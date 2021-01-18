@extends('site.layout')
@section('title' , 'خيط القطن || سلة المشتريات')
@section('styles')
<link rel="stylesheet" href="{{asset('website/css/select2.min.css')}}">
@endsection
@section('content')
<!-- /////////////////////||||||||||| bread crumbs |||||||||||||||||||| -->
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
        <li class="breadcrumb-item active" aria-current="page">السلة</li>
    </ol>
</div>
<!-- /////// ||||||||||||||||||||end breadcrumbs|||||||||||||||||||| ///////// -->
<!-- /////////////////////||||||||||| start cart |||||||||||||||||||| -->
<section class="my_cart">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <div class="items_r">
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls">
                            <a href="{{url('single-product')}}" class="i_img">
                                <img src="{{asset('website/img/asset8.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                                <div class="abs_badg off_b">خصم 15%</div>
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <span class="spanSec">خيط القطن</span>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                    <p class="hint">الشحن مجانا لفترة محدودة!</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="number-input">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus"> <i class="fas fa-plus"></i> </button>
                                <input class="quantity" min="1" max="30" value="1" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus"> <i class="fas fa-minus">
                                    </i> </button>
                            </div>
                            <div class="left_price">
                                <span class="updatePrice"></span><span>ر.س</span>
                            </div>
                        </div>
                    </div>
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls">
                            <a href="{{url('single-product')}}" class="i_img">
                                <img src="{{asset('website/img/asset14.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                                <div class="abs_badg off_b">خصم 15%</div>
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <span class="spanSec">خيط القطن</span>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                    <p class="hint">الشحن مجانا لفترة محدودة!</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="number-input">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus"> <i class="fas fa-plus"></i> </button>
                                <input class="quantity" min="1" max="30" value="3" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus"> <i class="fas fa-minus">
                                    </i> </button>
                            </div>
                            <div class="left_price">
                                <span class="updatePrice"></span><span>ر.س</span>
                            </div>
                        </div>
                    </div>
                    <div class="flexx cart_item">
                        <button class="nav-icon remove_item"> <i class="far fa-trash-alt"></i> </button>
                        <div class="item_dtls">
                            <a href="{{url('single-product')}}" class="i_img">
                                <img src="{{asset('website/img/asset12.jpg')}}" onerror="this.src='{{asset('website/img/logo.png')}}'" loading="lazy" decoding="async">
                                <div class="abs_badg off_b">خصم 15%</div>
                            </a>
                            <div class="right_dtls">
                                <a href="{{url('single-product')}}" class="item_nm">مجموعة الصابون الطبيعى</a>
                                <span class="spanSec">خيط القطن</span>
                                <div class="i_prices">
                                    <p class="old_price"><span>300</span><span> ر.س</span></p>
                                    <p class="new_price"><span class="current_price">100</span><span> ر.س</span></p>
                                    <p class="hint">الشحن مجانا لفترة محدودة!</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="number-input">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepUp()" class="plus"> <i class="fas fa-plus"></i> </button>
                                <input class="quantity" min="1" max="30" value="12" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('.quantity').stepDown()" class="minus"> <i class="fas fa-minus">
                                    </i> </button>
                            </div>
                            <div class="left_price">
                                <span class="updatePrice"></span><span>ر.س</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="left-calc">
                    <h3>ملخص السلة</h3>
                    <!---- start copoun --->
                    <div class="copounbar">
                        <p class="paycolor"><i class="fas fa-percentage"></i> هل لديك كوبون خصم؟ <b>ادخل الكود هنا</b></p>
                        <form action="#" class="coupon-form">
                            <input type="text" name="code" placeholder="الكود">
                            <button type="submit" class="btn-hvr" type="submit">
                                تحقق
                            </button>
                        </form>
                        <span class="coupon-result">هذا الكود غير صحيح</span>
                    </div>
                    <!---- End copoun --->
                    <p class="left-card">
                        <span class="rigt-span ">المجموع:</span>
                        <span class="left-span"><span id="totalss">0 </span>ر.س</span>
                    </p>
                    <p class="left-card discount">
                        <span class="rigt-span"> الخصم :<span class="coupon-perc">10</span>%</span>
                        <span class="left-span red"><span class="discount-value"> </span> ر.س</span>
                    </p>
                    <p class="left-card discount">
                        <span class="rigt-span"> الضريبة :</span>
                        <input type="hidden" name="taxes_fees" class="hidden_taxes">
                        <span class="rigt-span"><span id="taxes" class="taxes"> </span>ر.س</span>
                    </p>
                    <p class="left-card">
                        <span class="rigt-span">المجموع الإجمالى: </span>
                        <span class="left-span"> <span id="all-totalss">0</span>
                            ر.س</span>
                    </p>
                    <!--- start choose address --->
                    <div class="sha7n_adrs">
                        <select class="js-select2 form-control" title="عنوان الشحن">
                            <option selected disabled>عنوان الشحن </option>
                            <option>قصيم </option>
                            <option>بريدة </option>
                        </select>
                        <a href="{{url('profile-add-address')}}" class="to_new_adrs">
                            <i class="fas fa-plus"></i>إضافة عنوان اخر
                        </a>
                    </div>
                    <!--- end choose address --->
                    <a href="{{url('payment')}}" class="btn-hvr submit_cart" type="submit">
                        تكملة الدفع
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /////////////////////|||||||||||End cart |||||||||||||||||||| -->
@endsection
@section('scripts')
<!---- select2 init --->
<script src="{{asset('website/js/select2.full.js')}}"></script>
<script>
    $(document).ready(function() {
        $(".js-select2").select2();
        $('select:not(.normal)').each(function() {
            $(this).select2({
                dropdownParent: $(this).parent()
            });
        });
    });
</script>
<!-- plus & minus -->
<script>
    function calcTotalFromTaxes(total) {
        var total = total - (total * (100 / (100 + 15)));
        return parseFloat(total);
    }
    $(window).load(function() {
        $(".quantity").trigger('change');
    });
    $(document).ready(function() {
        $(".number-input button").on('click', function() {
            $(this).siblings('.quantity').trigger('change');
        })
        $(".quantity").each(function() {
            $(this).on('change', function() {
                var quantity = Number($(this).val());
                var unitPrice = Number($(this).parents(".cart_item").find(".current_price").text());
                var singleTotal = quantity * unitPrice;
                $(this).parents(".cart_item").find(".updatePrice").html(singleTotal.toFixed(2));
                var beforeDiscountPrice = 0;
                $(".updatePrice").each(function() {
                    beforeDiscountPrice = Number($(this).text()) + beforeDiscountPrice;
                });
                $("#totalss").html(beforeDiscountPrice.toFixed(2));
                // var discount = Number($(".discount-value").text());
                /// discount
                let discount = parseFloat($('.coupon-perc').text());
                let discount_val = beforeDiscountPrice * discount / 100;
                $('.discount-value').text(discount_val);
                var taxesTotal = calcTotalFromTaxes(beforeDiscountPrice).toFixed(2);
                var shipping_fees = Number($('#shipping_fees').text());
                var finalTotal = (Number(beforeDiscountPrice) + Number(taxesTotal) + Number(shipping_fees)) - discount_val;
                $("#all-totalss").html(finalTotal.toFixed(2));
                $("#taxes").html(taxesTotal);
                $(".hidden_taxes").val(taxesTotal);
            });
        });
    });
</script>
@endsection

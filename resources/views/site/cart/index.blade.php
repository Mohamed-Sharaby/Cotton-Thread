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
                        @if($cart)
                            @foreach($cart->cartItems as $item)
                                @include('site.cart.cart_item_component')
                            @endforeach
                        @else
                            <p class="alert alert-danger">لا يوجد</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <div class="left-calc">
                        <h3>ملخص السلة</h3>
                        <!---- start copoun --->
                        <div class="copounbar">
                            <p class="paycolor">
                                <i class="fas fa-percentage"></i> هل لديك كوبون خصم؟
                                <b>ادخل الكود هنا</b>
                            </p>
                            <form action="#" class="coupon-form">
                                <input type="hidden" class="couponId"
                                       value="{{$cart->coupon_id ? $cart->coupon_id : ''}}">
                                <input type="text" name="code" placeholder="الكود"
                                       @guest disabled title={{__('Login First')}} @endguest >
                                <button type="submit" {{$cart->coupon_id ? 'disabled' : ''}} class="btn-hvr">
                                    تحقق
                                </button>
                            </form>
                            <span class="coupon-result hidden">هذا الكود غير صحيح</span>
                        </div>
                        <!---- End copoun --->
                        <p class="left-card">
                            <span class="rigt-span ">المجموع:</span>
                            <span class="left-span"><span id="totalss">0 </span>ر.س</span>
                        </p>
                        <p class="left-card discount">
                            <span class="rigt-span"> الخصم :<span class="coupon-perc">
                                    {{$cart->coupon_id ? $cart->coupon->discount.' %' : ''}}
                                </span>
                            </span>
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
                        @if(count($cart->cartItems) > 0)
                            <a href="{{route('website.carts.payOff')}}" id="pay_off" class="btn-hvr submit_cart" type="submit">
                                تكملة الدفع
                            </a>
                        @endif
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
    <script src="{{asset('website/js/user/cart.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".js-select2").select2();
            $('select:not(.normal)').each(function () {
                $(this).select2({
                    dropdownParent: $(this).parent()
                });
            });
        });
    </script>
    <!-- plus & minus -->
    <script>
        function calcTotalFromTaxes(total) {
            var total = ((total * parseFloat("{{ getSetting('tax_percentage') }}")) / 100);
            return parseFloat(total);
        }

        $(window).load(function () {
            $(".quantity").trigger('change');
        });
        $(document).ready(function () {
            $(".number-input button").on('click', function () {

                let qty = $(this).closest('.number-input').find('.quantity');
                let quantity = qty.val();
                let product_quantity_id = qty.data('product');
                let cart = qty.data('cart');
                let item = qty.data('item');
                $('.discount-value').empty();
                let data = {quantity, product_quantity_id, item, cart};
                updateCart(data);

                $(this).siblings('.quantity').trigger('change');
            })
            $(".quantity").each(function () {
                $(this).on('change', function () {
                    var quantity = Number($(this).val());
                    var unitPrice = Number($(this).parents(".cart_item").find(".current_price").text());
                    var singleTotal = quantity * unitPrice;
                    $(this).parents(".cart_item").find(".updatePrice").html(singleTotal.toFixed(2));
                    var beforeDiscountPrice = 0;
                    $(".updatePrice").each(function () {
                        beforeDiscountPrice = Number($(this).text()) + beforeDiscountPrice;
                    });
                    $("#totalss").html(beforeDiscountPrice.toFixed(2) + ' ');

                    /// discount
                    let discount = parseFloat($('.coupon-perc').text());
                    let discount_val = beforeDiscountPrice * discount / 100;
                    if (discount_val) {
                        $('.discount-value').text(discount_val.toFixed(2));
                    }
                    var taxesTotal = calcTotalFromTaxes(beforeDiscountPrice).toFixed(2);
                    var shipping_fees = Number($('#shipping_fees').text());
                    if (discount_val) {
                        var finalTotal = (Number(beforeDiscountPrice) + Number(taxesTotal) + Number(shipping_fees)) - discount_val;
                    } else {
                        finalTotal = (Number(beforeDiscountPrice) + Number(taxesTotal) + Number(shipping_fees));
                    }

                    $("#all-totalss").html(finalTotal.toFixed(2));
                    $("#taxes").html(taxesTotal + ' ');
                    $(".hidden_taxes").val(taxesTotal);
                });
            });
        });

    </script>
@endsection

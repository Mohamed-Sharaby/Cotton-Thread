// get sizes and colors in addToCartModal
$(document).on('click', '.addCart', function () {
    let product_id = $(this).data('id');
    let modal = $('#AddToCartModal');

    $.ajax({
        url: "/products/single/" + product_id + '/colors',
        success(response) {
            $('.number-input .quantity').val(1);
            $('#proId').val(response.id);
            modal.find('div.clr_radio').empty();
            response.colors.forEach(color => {
                modal.find('div.clr_radio').append(`
<div class="rad_in">
<input type="radio" id="color-${color.id}" name="color" value="${color.id}">
<label class="" for="color-${color.id}" style="background-color: ${color.color};
            width: 44px!important;
            height: 44px!important;
            text-align: center!important;
            line-height: 44px!important;
            display: inline-block!important;
            cursor: pointer!important;
            border-radius: 5px!important;
            position: relative!important;
            box-shadow: 0px 6px 3px 0px rgb(199 197 199 / .3) !important;
            transition: all .3s ease-in-out!important;
            border: 1px solid rgb(199 197 199 / .3)!important;"></label></div>`);
            });

            modal.find('.txt_radio').empty();
            response.sizes.forEach(size => {
                modal.find('.txt_radio').append(`
<div class="rad_in">
<input type="radio" id="size-${size.id}" name="size" value="${size.id}">
<label class="" for="size-${size.id}" style="width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    font-size: 17px;
    display: inline-block;
    border: 1px solid #efefed;
    cursor: pointer;
    border-radius: 50%;
    color: #9c9c9c;
    font-weight: 100;
    text-transform: uppercase;">${size.size}</label></div>`);
            });
        },
        error(error) {
            console.log('error get product', error)
        }
    })
    modal.modal('show')
})

//////////////////////////////////////////////////////////////////////////////////////////////////////////
// add item to cart
var cartForm = $("#cartForm");
cartForm.submit(function (e) {
    e.preventDefault();
    // console.log(e.target)
    var formData = cartForm.serialize();
    let cart_count = parseInt($('.cart-count').text());
    let cartSideMenu = $('#cartSideMenu').find('ul');

    $.ajax({
        url: '/cart/add',
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data.status === false) {
                toastr.error(data.msg)
            }
            if (data.status === true) {
                toastr.success("تم الاضافة الى السلة بنجاح")
                $('.cart-count').removeClass('hidden')
                $('.cart-count').text(++cart_count)
                $('#AddToCartModal').modal('hide');

                //console.log(data.cart_id);
                let itemComponent = '<li><div class="flexx cart_item">' +
                    '<button class="nav-icon remove_item1" data-url="">' +
                    '<i class="far fa-trash-alt"></i></button><span class="bell">' +
                    '<img src="'+data.data.product_image+'"></span>' +
                    '<div class="notify"><h4>'+data.data.product_name+'</h4>' +
                    '<h5 class="sec_name">'+data.data.sub_category+'</h5>' +
                    '<div class="theQnt"> الكمية :<div class="number-input">' +
                    '<button type="button" onclick="this.parentNode.querySelector(\'.quantity\').stepUp()" class="plus">' +
                    '<i class="fas fa-plus"></i></button> ' +
                    '<input class="quantity" min="1" name="quantity"  data-product="'+data.data.product_quantity+'"' +
                    'data-item="'+data.data.product_id+'" data-cart="'+data.cart_id+'" value="'+data.data.quantity+'" type="number">' +
                    '<button type="button" onclick="this.parentNode.querySelector(\'.quantity\').stepDown()" class="minus">' +
                    '<i class="fas fa-minus"></i></button></div></div><p class="old_price">'+data.data.price+'</p>' +
                    '<p class="i_price">'+data.data.price_after_discount+'</p></div></div></li>';
                cartSideMenu.append(itemComponent);
            }
        },
        error: function (data) {
            $.each(data.responseJSON.errors, function (index, value) {
                toastr.error(value)
            });
        }
    });
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////
// update cart
function updateCart(data) {
    $.ajax({
        url: '/cart/update',
        type: 'POST',
        data: data,
        success: function (data) {
            if ($.isEmptyObject(data.error)) {
                console.log('success')
                $('.discount-value').text(data.discount);

            } else {
                toastr.error(data.error);
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
// apply coupon to cart
var couponForm = $(".coupon-form");
couponForm.submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: '/cart/coupon',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            console.log('coupon', data)
            if (data.status === 'exists') {
                toastr.error(data.msg);
            }
            if (data.status === 'no_products') {
                toastr.error(data.msg);
            } else {
                if (data.status === false) {
                    $('.coupon-result').removeClass('hidden')
                } else {
                    toastr.success(data.msg);
                    $('.coupon-result').addClass('hidden')

                    let total = parseFloat($('#totalss').text());
                    // let couponExist = $('.couponId').val(data.coupon_id);
                    // if (couponExist) {
                    //     $('input[name="code"]').attr('disabled', 'disabled');
                    // }
                    $('.coupon-perc').text((data.perc + '%'));
                    $('.discount-value').text((data.value));
                    let total_after_discount = total - data.value;
                    let finalTotal = total_after_discount + parseFloat($('#taxes').text());
                    $("#all-totalss").html((finalTotal).toFixed(2));

                    $('input[name=code]').val('')
                }
            }

        }, error: function (data) {
            console.log('Error:', data);
        }
    });
})

//////////////////////////////////////////////////////////////////////////////////////////////////////////
// remove item from cart
$(".remove_item").each(function () {
    $(this).click(function () {

        let cart_count = parseInt($('.cart-count').text())
        let id = $(this).data('id');
        $.ajax({
            url: '/cart/remove/' + id,
            type: 'post',
            success(response) {
                $('.cart-count').text(--cart_count)
            },
            error(error) {
                console.log('error remove', error)
            }
        })

        $(this).parents(".flexx.cart_item").remove();
        $(this).parents(".cart_item").find(".updatePrice").text(0);
        var quantity = Number($(this).val());
        var unitPrice = Number($(this).parents(".cart_item").find(".current_price").text());
        var singleTotal = quantity * unitPrice;
        $(this).parents(".cart_item").find(".updatePrice").html(singleTotal.toFixed(2));
        var beforeDiscountPrice = 0;
        $(".updatePrice").each(function () {
            beforeDiscountPrice = Number($(this).text()) + beforeDiscountPrice;
        });
        $("#totalss").html(beforeDiscountPrice.toFixed(2));

        /// discount
        let discount = parseFloat($('.coupon-perc').text());
        if (discount) {
            let discount_val = beforeDiscountPrice * discount / 100;
            if (discount_val) {
                $('.discount-value').text(discount_val);
            }
        } else discount_val = 0;

        var taxesTotal = calcTotalFromTaxes(beforeDiscountPrice).toFixed(2);
        //var shipping_fees = Number($('#shipping_fees').text());
        var finalTotal = (Number(beforeDiscountPrice) + Number(taxesTotal)) - discount_val;
        $("#all-totalss").html(finalTotal.toFixed(2));
        $("#taxes").html(taxesTotal);
        $(".hidden_taxes").val(taxesTotal);

        let items_count = $(".items_r").children().length;
        if (items_count == 0) {
            $('a#pay_off').removeAttr('href');
        }
    })
})

//////////////////////////////////////////////////////////////////////////////////////////////////////////
// submit payOff
var payOffForm = $("#payOffForm");
payOffForm.submit(function (e) {
    e.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: "/cart/pay-off",
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            console.log('res', data)

            if ($.isEmptyObject(data.error)) {
                toastr.success(" تم تأكيد الطلب بنجاح");
                // window.location.href = '/orders/' + data.id + '?success=1';
                window.location.href = '/orders/' + data.id;
            } else {
                toastr.error(data.error);
            }
        }, error: function (data) {
            console.log('Error:', data);
        }
    });
})

//////////////////////////////////////////////////////////////////////////////////////////////////////////
// upload image when payment type is bank_transaction
$(document).on('click', 'input[name=payment]', function () {
    let type = $(this).val();
    if (type === 'bank_transaction') $('.bank-transaction').removeClass('hidden')
    else $('.bank-transaction').addClass('hidden')
})

///////////////////////////////////////////////////////////
// cartSideMenu.append(' <li>' +
//     ' <div class="flexx cart_item">' +
//     ' <button class="nav-icon remove_item1"' +
//     ' data-url="{{route(\'website.orders.removeItem\',$item->id)}}">' +
//     ' <i class="far fa-trash-alt"></i>' +
//     ' </button>' +
//     ' <span class="bell">' +
//     ' <img src="{{$item->productQuantity->product->image}}">' +
//     ' </span>' +
//     '<div class="notify">' +
//     ' <h4>{{$item->productQuantity->product->name ?? \'\'}}</h4>' +
//     '  <h5 class="sec_name">{{$item->productQuantity->product->subcategory->name ?? \'\'}}</h5>' +
//     ' <div class="theQnt"> الكمية :' +
//     '  <div class="number-input">' +
//     ' <button type="button"' +
//     '  onclick="this.parentNode.querySelector(\'.quantity\').stepUp()"' +
//     '  class="plus"><i class="fas fa-plus"></i>' +
//     '  </button>' +
//     ' <input class="quantity" min="1" name="quantity"' +
//     '  data-product="{{$item->productQuantity->id }}"' +
//     ' data-item="{{$item->id}}"' +
//     ' data-cart="{{$item->cart_id}}"' +
//     ' value="{{$item->quantity}}" type="number">' +
//     '  <button type="button"' +
//     ' onclick="this.parentNode.querySelector(\'.quantity\').stepDown()"' +
//     '  class="minus"><i class="fas fa-minus">' +
//     ' </i></button>' +
//     '</div>' +
//     ' </div>' +
//     '  @if($item->productQuantity->product->discount > 0)' +
//     '  <p class="old_price">{{$item->productQuantity->product->price ?? \'لا يوجد\'}}' +
//     '                                                            ريال </p>' +
//     ' @endif' +
//     '<p class="i_price">{{$item->productQuantity->product->priceAfterDiscount ?? \'لا يوجد\'}}' +
//     '                                                            ريال </p>' +
//     '{{--   <p class="hint">الشحن مجانا لفترة محدودة</p>--}}' +
//     '  </div>' +
//     ' </div>' +
//     '</li>');

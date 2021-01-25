// add item to cart
var cartForm = $("#cartForm");
cartForm.submit(function (e) {
    e.preventDefault();

    var formData = cartForm.serialize();
    let cart_count = parseInt($('.cart-count').text())
    $.ajax({
        url: '/cart/add',
        type: 'POST',
        data: formData,
        success: function (data) {
            if (data.status === false) {
                toastr.error(data.msg)
            } else {
                toastr.success("{{__('Added To Your Cart')}}")
                $('.cart-count').removeClass('hidden')
                $('.cart-count').text(++cart_count)
            }

        },
        error: function (data) {
            $.each(data.responseJSON.errors, function (index, value) {
                toastr.error(value)
            });
        }
    });
});


// update cart
function updateCart(data) {
    $.ajax({
        url: '/cart/add',
        type: 'POST',
        data: data,
        success: function(data) {
            if ($.isEmptyObject(data.error)) {
                console.log('success')
                $('.discount-value').text(data.discount);

            } else {
                toastr.error(data.error);
            }
        },
        error: function(data) {
            console.log('Error:', data);
        }
    });
}



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
            if (data.status === false) {
                $('.coupon-result').removeClass('hidden')
            } else {
                toastr.success(data.msg);
                $('.coupon-result').addClass('hidden')

                let total = parseFloat($('#totalss').text());
                $('.coupon-perc').text((data.perc + '%'));
                $('.discount-value').text((data.value));
                let total_after_discount = total - data.value;
                let finalTotal = total_after_discount + parseFloat($('#taxes').text());
                $("#all-totalss").html((finalTotal).toFixed(2));

                $('input[name=code]').val('')
            }
        }, error: function (data) {
            console.log('Error:', data);
        }
    });
})

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
        let discount_val = beforeDiscountPrice * discount / 100;
        if (discount_val) {
            $('.discount-value').text(discount_val);
        }

        var taxesTotal = calcTotalFromTaxes(beforeDiscountPrice).toFixed(2);
        var shipping_fees = Number($('#shipping_fees').text());
        var finalTotal = (Number(beforeDiscountPrice) + Number(taxesTotal) + Number(shipping_fees)) - discount_val;
        $("#all-totalss").html(finalTotal.toFixed(2));
        $("#taxes").html(taxesTotal);
        $(".hidden_taxes").val(taxesTotal);
    })
})


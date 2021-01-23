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
            if (data.status === false){
                toastr.error(data.msg)
            }else{
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

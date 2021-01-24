// remove order from user cart
$(".remove_order").on('click',  function (event) {
    let cur = $(this);
    let url = $(this).attr('data-url');

    swal({
        title: "تأكيد الحذف",
        text: "هل أنت متاكد من حذف هذا الطلب ؟",
        icon: "warning",
        buttons: ["الغاء", "موافق"],
        dangerMode: true,

    }).then(function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: url,
                type: "delete",
                success: function (data) {
                    swal("تم الحذف بنجاح", "تم الحذف بنجاح", 'success', {buttons: "موافق"});
                    cur.parents('tr').fadeOut(700);
                    cur.parents('tr').remove(700);
                },
                error: function (error) {
                    console.log('there is an error ', error)
                }
            });
        } else {
            swal("تم الالغاء", "تم إلغاء الحذف", 'error', {buttons: "موافق"});
        }
    });
});

// remove item from order
$(".remove_item1").on('click',  function (event) {
    let cur = $(this);
    let url = $(this).attr('data-url');

    swal({
        title: "تأكيد الحذف",
        text: "هل أنت متاكد من حذف هذا المنتج ؟",
        icon: "warning",
        buttons: ["الغاء", "موافق"],
        dangerMode: true,

    }).then(function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: url,
                type: "post",
                success: function (data) {
                    swal("تم الحذف بنجاح", "تم الحذف بنجاح", 'success', {buttons: "موافق"});
                    cur.parents('div.cart_item').fadeOut(700);
                    cur.parents('div.cart_item').remove(700);
                },
                error: function (error) {
                    console.log('there is an error ', error)
                }
            });
        } else {
            swal("تم الالغاء", "تم إلغاء الحذف", 'error', {buttons: "موافق"});
        }
    });
});

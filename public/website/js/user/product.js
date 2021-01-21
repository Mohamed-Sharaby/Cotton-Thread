/// remove product from favourite

$(".remove_item1").on('click',  function (event) {
    let cur = $(this);
    let url = $(this).attr('data-url');

     swal({
        title: "تأكيد الحذف",
        text: "هل أنت متاكد من حذف هذا المنتج من المفضلة ؟",
        icon: "warning",
        buttons: ["الغاء", "موافق"],
        dangerMode: true,

    }).then(function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                url: url,
                type: "get",
                success: function (data) {
                    swal("تم الحذف بنجاح", "تم الحذف بنجاح", 'success', {buttons: "موافق"});
                    cur.parents('div.pro').fadeOut(700);
                    cur.parents('div.pro').remove(700);
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

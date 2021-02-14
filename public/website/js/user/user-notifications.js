
$(".rmv_all").click(function () {
    $(this).parents(".notification_wrapper").find(".notification").fadeOut(500);
    $(this).fadeOut(500);
});



$(".delete-notification").click(function (e) {
    //$(this).closest(".notifi1").fadeOut(500);
    e.preventDefault();
    let current = $(this);
    let id = current.data('id');
    $.ajax({
        url: "/user/notification-destroy/"+id,
        type: 'delete',
        success(response) {
            current.parents(".notifi1").fadeOut();
            toastr.success("تم الحذف بنجاح");
        },
        error(error) {
            toastr.error(error);
        }
    })
});


$(".delete-all-notifications").click(function (e) {
    e.preventDefault();
    let current = $(this);
    $.ajax({
        url: "/user/all-notifications-destroy",
        type: 'delete',
        success(response) {
            current.parents(".notifi1").fadeOut();
            toastr.success("تم الحذف بنجاح");
        },
        error(error) {
            toastr.error(error);
        }
    })
});



$(".read-now").attr('title', 'تحديد كمقروء').click(function () {
    $(this).closest(".notifi1").toggleClass("not-read", 700)
    $(this).toggleClass('check-read');
    var title = 'تحديد كمقروء';
    if ($(this).hasClass('check-read')) {
        title = 'تحديد كغير مقروء';
    }
    $(this).attr('title', title);
});

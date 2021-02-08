$(document).ready(function () {
    $('#city_id').on('click', function (e) {
        var city_id = $(this).val();
        if (city_id) {
            $.ajax({
                url: '/user/regions/' + city_id,
                method: 'GET',
                type: 'json',
                success: function (data) {
                    $('#region_id').empty();
                    $('#district_id').empty();
                    $('#region_id').append('<option  disabled selected>اختر المنطقة</option>');
                    $.each(data, function (key, value) {
                        $('#region_id').append('<option value="' + key + '" >' + value + '</option>');
                    });
                }
            });
        } else {
            $('#region_id').empty();
        }
    });
    //////////
    $('#region_id').on('click', function (e) {
        var region_id = $(this).val();
        if (region_id) {
            $.ajax({
                url: '/user/districts/' + region_id,
                method: 'GET',
                type: 'json',
                success: function (data) {
                    $('#district_id').empty();
                    $.each(data, function (key, value) {
                        $('#district_id').append('<option value="' + key + '" >' + value + '</option>');
                    });
                }
            });
        } else {
            $('#district_id').empty();
        }
    });
    ////////////////////////////////////////

    // Delete Address
    $("button#delete_address").on('click',  function (event) {

        let cur = $(this);
        let url = $(this).attr('data-url');

        swal({
            title: "تأكيد الحذف",
            text: "هل أنت متاكد من حذف هذا البيان ؟",
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
                        cur.parents('div.addr').fadeOut(700);
                        cur.parents('div.addr').remove(700);
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


});

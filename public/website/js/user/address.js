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
    ////////////////
});

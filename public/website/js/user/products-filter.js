
var filterForm = $("#filter_form");
filterForm.submit(function (e) {
    e.preventDefault();

    var formData = filterForm.serialize();

    $.ajax({
        url: '/products/filter',
        type: 'get',
        data: formData,
        success: function (data) {
            if (data.status === false) {
                toastr.error(data.msg)
            } else {

            }
        },
        error: function (data) {
            $.each(data.responseJSON.errors, function (index, value) {
                toastr.error(value)
            });
        }
    });
});

var loginForm = $("#loginForm");
loginForm.submit(function(e) {
    e.preventDefault();
    var formData = loginForm.serialize();
    $.ajax({
        url: 'login',
        headers: {'XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        data: formData,
        success: function(data) {
            //console.log('res', data)
            if (data.value === false) {
                toastr.error(data.msg)
            } else {
                window.location.href = '/';
            }
        },
        error: function(data) {
            $.each(data.responseJSON.errors, function(index, value) {
                toastr.error(value)
            });
        }
    });
});

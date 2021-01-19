var registerForm = $("#registerForm");
registerForm.submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '/register',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            //console.log('res', data)
            if (data.value === false) {
                toastr.error(data.msg);
            } else {
               // window.location.href = data.intended;
                window.location.href ='/';
            }
        },
        error: function(data) {
            $.each(data.responseJSON.errors, function(index, value) {
                toastr.error(value)
            });
        }
    });
});

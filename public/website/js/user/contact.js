$('#send_message_btn').on('click', function (e) {

    e.preventDefault();
    var formData = new FormData($('#send_message_form')[0]);

    $.ajax({
        type: 'POST',
        url: "/contact",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            if (data.status === true) {
                $('.msg').removeAttr('style');
                $('.error').css('display', 'none');
                $('#send_message_form')[0].reset();
            } else {
                let errors = $('.error').addClass('alert alert-danger');
                errors.empty()
                errors.append(data.errors)
            }
        },
        error(error) {
            console.log('error', error);
        }

    });
});

$(document).ready(function () {
    $('#forgot_password_form').submit(function (e) {
        e.preventDefault();
        var reminder_email = $.trim($('#reminder-email').val());
        // regular expressions
        var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (reminder_email.length == 0) {
            alert('Email cannot be empty!');
        }
        else if (!reminder_email.match(email_regex)) {
            alert('Not valid email')
        }
        else {
            var form_data = $('#forgot_password_form').serialize();
            $.ajax({
                url: 'users/forgot_password/email_verify',
                type: 'post',
                dataType: 'json',
                data: form_data,
                success: function (response) {
                    //  var response=JSON.parse(response);
                    console.log(response);
                    if (response.message == true) {
                        $('.strong-message').text('Success!');
                        $('.message').text('Please check your email id.');
                        $('.toast-message').remove('alert-danger');
                        $('.toast-message').remove('alert-info');
                        $('.toast-message').addClass('alert-success');
                        $('.toast-message').removeClass('hidden');

                    }
                    else if (response.message == false) {
                        $('.strong-message').text('Warning!');
                        $('.message').text('This email id doesn\'t exist. Please chose right one.');
                        $('.toast-message').removeClass('alert-success');
                        $('.toast-message').addClass('alert-danger');
                        $('.toast-message').removeClass('hidden');
                    }
                    else if (response.message == 'email not send') {
                        $('.strong-message').text('Fail!');
                        $('.message').text('Email not send. Please try again');
                        $('.toast-message').removeClass('alert-success');
                        $('.toast-message').removeClass('alert-danger');
                        $('.toast-message').addClass('alert-info');
                        $('.toast-message').removeClass('hidden');
                    }
                }
            });
        }

    });
})
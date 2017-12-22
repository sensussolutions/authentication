$(document).ready(function () {
    $('#forgot_password_form').submit(function (e) {
        e.preventDefault();
        var reminder_email = $.trim($('#reminder-email').val());
        console.log(reminder_email);
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
            console.log('in test');
             $('.submit-button').attr('disabled',true);
             $('#reminder-email').attr('disabled',true);
            $.ajax({
                url: 'users/request_sender/forgot_password',
                type: 'post',
                dataType: 'json',
                data: form_data,
                success: function (response) {
                    console.log(response);
                    $('.submit-button').removeAttr('disabled');
                    $('#reminder-email').removeAttr('disabled');
                    if(response.status == 200){
                        $('.strong-message').text('Success!');
                        $('.message').text('Please check your email id.');
                        $('.toast-message').removeClass('alert-danger');
                        $('.toast-message').removeClass('alert-info');
                        $('.toast-message').addClass('alert-success');
                        $('.toast-message').removeClass('hidden');
                    }
                    if(response.status == 501){
                        $('.strong-message').text('Fail!');
                        $('.message').text('Email not send. Please try again');
                        $('.toast-message').removeClass('alert-success');
                        $('.toast-message').removeClass('alert-danger');
                        $('.toast-message').addClass('alert-info');
                        $('.toast-message').removeClass('hidden');
                    }

                    else if (response.status == 401) {
                        $('.strong-message').text('Warning!');
                        $('.message').text('This email id doesn\'t exist. Please chose right one.');
                        $('.toast-message').removeClass('alert-success');
                        $('.toast-message').addClass('alert-danger');
                        $('.toast-message').removeClass('hidden');
                    }
                }
            });
        }

    });
})
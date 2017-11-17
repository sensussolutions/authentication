$(document).ready(function () {

    $('#reset_password_form').submit(function (e) {
        e.preventDefault();
        var register_password = $.trim($('#register-password').val());
        var register_password2 = $('#register-password2').val();
        // regular expressions
        var pass_regex = (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/);

        if (register_password.length == 0) {
            alert('Password cannot be empty')
        }
       /* else if (!register_password.match(pass_regex) || register_password.length < 6) {
            alert('one capital, one lower, 1 digit and minimum 6 character required in password!');
        }
        else if (register_password != register_password2) {
            alert('confirm password does not match!');
        }*/
        else {
            var form_data = $('#reset_password_form').serialize();
            $.ajax({
                url: 'users/reset_password/update_password',
                type: 'post',
                dataType: 'json',
                data: form_data,
                success: function (response) {
                    //  var response=JSON.parse(response);
                    console.log(response);
                    if (response.message == true) {
                            $('.strong-message').text('Success!');
                            $('.message').text('Password has been changed.');
                            $('.toast-message').remove('alert-danger');
                            $('.toast-message').addClass('alert-success');
                            $('.toast-message').removeClass('hidden');
                            setTimeout(function () {
                                location.href = 'http://localhost/OnlineReporting/';
                            },5000)
                           // location.href = 'http://localhost/OnlineReporting/';


                    }
                    else if (response.message == false) {
                        $('.strong-message').text('Error!');
                        $('.message').text('Please try again.');
                        $('.toast-message').removeClass('alert-success');
                        $('.toast-message').addClass('alert-danger');
                        $('.toast-message').removeClass('hidden');
                    }

                }
            });
        }
    });
})
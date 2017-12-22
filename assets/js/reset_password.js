$(document).ready(function () {

    $('#reset_password_form').submit(function (e) {
        e.preventDefault();
        var register_password = $.trim($('#register-password').val());
        var register_password2 = $('#register-password2').val();
        var login_page = document.getElementById("my_url").value;
        // regular expressions
        var pass_regex = (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/);

        if (register_password.length === 0) {
            alert('Password cannot be empty')
        }
        else if (!register_password.match(pass_regex) || register_password.length < 6) {
            alert('one capital, one lower, 1 digit and minimum 6 character required in password!');
        }
        else if (register_password != register_password2) {
            alert('confirm password does not match!');
        }
        else {
            var form_data = $('#reset_password_form').serialize();
            $('.submit-button').attr('disabled',true);
            $.ajax({
                url: 'users/request_sender/password_update',
                type: 'post',
                dataType: 'json',
                data: form_data,
                success: function (response) {
                    //  var response=JSON.parse(response);
                    console.log(response);
                    $('.submit-button').removeAttr('disabled');
                    if (response.status == 200) {
                        $('.strong-message').text('Success!');
                        $('.message').text('Password has been changed.');
                        $('.toast-message').remove('alert-danger');
                        $('.toast-message').addClass('alert-success');
                        $('.toast-message').removeClass('hidden');
                        console.log(login_page);
                        setTimeout(function () {
                            location.href = login_page;
                        },5000);
                    }
                    else if (response.status == 401) {
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
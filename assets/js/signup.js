$(document).ready(function () {
    $('#registration_form').submit(function (e) {
        e.preventDefault();
        var register_username = $.trim($('#register-username').val());
        var register_email = $.trim($('#register-email').val());
        var register_password = $.trim($('#register-password').val());
        var register_password2 = $('#register-password2').val();
        // regular expressions
        var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        var pass_regex = (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/);

        if (register_username.length == 0) {
            alert('user name cannot be empty!');
        }

        else if (register_email.length == 0) {
            alert('Email cannot be empty!');
        }
        else if (!register_email.match(email_regex)) {
            alert('Not valid email')
        }
        else if (register_password.length == 0) {
            alert('Password cannot be empty')
        }
        else if (!register_password.match(pass_regex) || register_password.length < 6) {
            alert('one capital, one lower, 1 digit and minimum 6 character required in password!');
        }
        else if (register_password != register_password2) {
            alert('confirm password does not match!');
        }
        else {
            var form_data = $('#registration_form').serialize();
            $('.submit-button').attr('disabled',true);
            $('#register-username').attr('disabled',true);
            $('#register-email').attr('disabled',true);
            $('#register-password').attr('disabled',true);
            $('#register-password2').attr('disabled',true);
            $.ajax({
                url: 'users/request_sender/register',
                type: 'post',
                dataType: 'json',
                data: form_data,
                beforeSend:function () {

                    /* $('.content').css("backgroundColor","#0b0b0b");
                     $('.loader').css("display","block");
                     $('.main-content').css("opacity","0.1");*/
                },
                complete:function () {
                    // $('.content').css("backgroundColor","#0b0b0b");
                    // $('.loader').css("display","none");
                    // $('.main-content').css("opacity","0.9");
                },
                success: function (response) {
                    /*   $('.content').css("backgroundColor","#f5f5f5");
                     $('.loader').css("display","none");
                     $('.main-content').css("opacity","0.9");*/
                    //  console.log(response);
                    $('.submit-button').removeAttr('disabled');
                    $('#register-username').removeAttr('disabled');
                    $('#register-email').removeAttr('disabled');
                    $('#register-password').removeAttr('disabled');
                    $('#register-password2').removeAttr('disabled');
                    if (response.status == 201) {
                        $('.strong-message').text('Success!');
                        $('.message').text('Please verify your email id.');
                        $('.toast-message').removeClass('alert-danger');
                        $('.toast-message').removeClass('alert-info');
                        $('.toast-message').addClass('alert-success');
                        $('.toast-message').removeClass('hidden');
                    }
                    else if (response.status == 401) {
                        $('.strong-message').text('Warning!');
                        $('.message').text('This email id already exist. Please chose different one.');
                        $('.toast-message').removeClass('alert-success');
                        $('.toast-message').removeClass('alert-info');
                        $('.toast-message').addClass('alert-danger');
                        $('.toast-message').removeClass('hidden');
                    }
                    else if (response.status == 501) {
                        $('.strong-message').text('Fail!');
                        $('.message').text('Network error. Please try again');
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
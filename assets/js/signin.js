$(document).ready(function () {
    $('#signin_form').submit(function (e) {
        e.preventDefault();
        var email = $.trim($('#login-username').val());
        var password = $.trim($('#login-password').val());
        console.log(email);
        console.log(password);
        if ( email.length == 0){
           alert('email required!');
        }
        else if (password.length == 0){
            alert('password required!');
        }
        else{
           var form_data =  $('#signin_form').serialize();
            $.ajax({
                url:'sign_in/request_handler',
                type:'post',
                dataType:'json',
                  data:form_data,
                success:function (response) {
                    console.log(response);
                 //   var response=JSON.parse(response);
                    if (response.exist == true){
                     if (response.active == true){
                           location.href = 'dashboard';
                     }
                     else{
                         $('.message').text("Please activate you account first!");
                         $('div').removeClass('hidden');
                     }

                     }
                     else if (response.exist == false){
                        $('.message').text("user name and password does not exist!");
                        $('div').removeClass('hidden');
                     }

                }
            });
        }
    });

});


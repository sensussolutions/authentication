<?php

class Globals
{
    public function user_variables(){
        return $url = array('api'=>'http://localhost/authentication/','login'=>'sign_in/login',
            'register'=>'users/sign_up/register_new_user','account activation'=>'users/account_activation/activate_account',
            'forgot password'=>'users/forgot_password/email_verify','password reset'=>'users/reset_password/key_exist',
            'password update'=>'users/reset_password/password_update');
    }

}
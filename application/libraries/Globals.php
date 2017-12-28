<?php

class Globals
{
    public function user_variables(){
        $url = array('api'=>'http://sensussolutions.com.pk/apps/authenticate/users/Request_handler/','login'=>'login','register'=>'register',
            'account activation'=>'account_activation','forgot password'=>'forgot_password','password_reset_key_verify'=>'password_reset',
            'password update'=>'password_update','license_id'=>'1');

        $auth_url = array('api'=>'http://sensussolutions.com.pk/apps/authenticate/','login'=>'sign_in/login',
            'register'=>'users/sign_up/register','forgot password'=>'users/forgot_password/email_verify',
            'account_activation_link'=>'users/Request_sender/account_activate/?verify=','account activation'=>'users/account_activation/activate_account',
            'password reset'=>'users/reset_password/key_exist','forgot_password_link'=>'users/Request_sender/password_reset?verify=',
            'password update'=>'users/reset_password/password_update');

        $page_name = array('sign_in'=>'users/sign-in','forgot_password'=>'users/forgot-password','sign_up'=>'users/sign-up',
            'password_reset'=>'users/password-reset','error_page'=>'users/error-404');
            
        $page_title = array('sign_in'=>'Sign In','sign_up'=>'New User','forgot_password'=>'Forgot Password',
            'password_reset'=>'Password Reset','error_title'=>'Page Not Found');

        $api_variable = array('email','password','license_id','user_name','activation_key','reminder_email');

        return array($url,$auth_url,$page_name,$page_title,$api_variable);
    }

}
<?php
class Request_handler extends CI_Controller
{
    public  $url = null;
    public $variables = null;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('apimanager');
        $this->variables = $this->globals->user_variables();
        $this->url = $this->variables['api'];
    }
 public function login(){
        if (!isset($_REQUEST['email']) || !isset($_REQUEST['password'])|| !isset($_REQUEST['application_id']) || !isset($_REQUEST['company_id'])){
                echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        else {
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $application_id = $_REQUEST['application_id'];
                $company_id = $_REQUEST['company_id'];
                $user_info = array('email'=>$email,'password'=>$password,'application_id'=>$application_id,'company_id'=>$company_id);
                $user_info = json_encode($user_info);
                $url = $this->url.$this->variables['login'];
                echo auth_request($url,$user_info);
        }
 }
 public function register(){
     if (!isset($_REQUEST['user_name']) || !isset($_REQUEST['email']) || !isset($_REQUEST['password'])|| !isset($_REQUEST['application_id']) || !isset($_REQUEST['company_id'])){
         echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
     }
     else {
         $user_name = $_REQUEST['user_name'];
         $email = $_REQUEST['email'];
         $password = $_REQUEST['password'];
         $application_id = $_REQUEST['application_id'];
         $company_id = $_REQUEST['company_id'];
         $user_info = array('user_name'=>$user_name,'email'=>$email,'password'=>$password,'application_id'=>$application_id,'company_id'=>$company_id);
         $user_info = json_encode($user_info);
         $url = $this->url.$this->variables['register'];
         echo auth_request($url,$user_info);
     }
 }
    public function account_activation(){
        if (!isset($_REQUEST['activation_key'])){
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        else {
            $activation_key = $_REQUEST['activation_key'];
            $user_info = array('activation_key'=>$activation_key);
            $user_info = json_encode($user_info);
            $url = $this->url.$this->variables['account activation'];
            echo auth_request($url,$user_info);
        }
    }
    public function forgot_password(){
        if (!isset($_REQUEST['reminder_email'])){
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        $email = $_REQUEST['reminder_email'];
        $user_info =array('reminder_email'=>$email);
        $user_info = json_encode($user_info);
        $url =  $url = $this->url.$this->variables['forgot password'];;
        auth_request($url,$user_info);
    }
    public function password_reset(){
        if (!isset($_REQUEST['activation_key'])){
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        $activation_key = $_REQUEST['activation_key'];
        $user_info =array('activation_key'=>$activation_key);
        $user_info = json_encode($user_info);
        $url =  $url = $this->url.$this->variables['password reset'];
        auth_request($url,$user_info);
    }
    public function password_update(){
        if (!isset($_REQUEST['activation_key'])|| !isset($_REQUEST['password'])){
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        $activation_key = $_REQUEST['activation_key'];
        $password = $_REQUEST['password'];
        $user_info =array('activation_key'=>$activation_key,'password'=>$password);
        $user_info = json_encode($user_info);
        $url =  $url = $this->url.$this->variables['password update'];
        auth_request($url,$user_info);
    }


}
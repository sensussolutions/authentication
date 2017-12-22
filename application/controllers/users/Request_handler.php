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
        $this->variables = $this->variables[1];
        $this->url = $this->variables['api'];

    }
    public function login(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ) {

          if (isset($_GET['email']) && isset($_GET['password']) && isset($_GET['application_id']) && isset($_GET['company_id'])) {
              $email = $_GET['email'];
              $password = $_GET['password'];
              $application_id = $_GET['application_id'];
              $company_id = $_GET['company_id'];
              $user_info = array('email' => $email, 'password' => $password, 'application_id' => $application_id, 'company_id' => $company_id);
              $user_info = json_encode($user_info);
              $url = $this->url . $this->variables['login'];
              echo auth_request($url, $user_info);
              exit();
          }
          else if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['application_id']) && isset($_POST['company_id'])){
              $email = $_POST['email'];
              $password = $_POST['password'];
              $application_id = $_POST['application_id'];
              $company_id = $_POST['company_id'];
              $user_info = array('email' => $email, 'password' => $password, 'application_id' => $application_id, 'company_id' => $company_id);
              $user_info = json_encode($user_info);
              $url = $this->url . $this->variables['login'];
              echo auth_request($url, $user_info);
              exit();
          }
          else{
              echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
              exit();
          }
      }
        else {
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
            exit();

        }
 }
    public function register(){
     if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ) {
         if (isset($_GET['user_name'])) {
             $user_name = $_GET['user_name'];
             $email = $_GET['email'];
             $password = $_GET['password'];
             $application_id = $_GET['application_id'];
             $company_id = $_GET['company_id'];
             $user_info = array('user_name' => $user_name, 'email' => $email, 'password' => $password, 'application_id' => $application_id, 'company_id' => $company_id);
             $user_info = json_encode($user_info);
             $url = $this->url . $this->variables['register'];
             echo auth_request($url, $user_info);
             exit();
         } else {
             echo json_encode(array('status' => 400, 'message' => 'Bad request.'));
             exit();
         }
     }
         else if (isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['application_id']) && isset($_POST['company_id'])) {
               $user_name = $_POST['user_name'];
               $email = $_POST['email'];
               $password = $_POST['password'];
               $application_id = $_POST['application_id'];
               $company_id = $_POST['company_id'];
               $user_info = array('user_name'=>$user_name,'email'=>$email,'password'=>$password,'application_id'=>$application_id,'company_id'=>$company_id);
               $user_info = json_encode($user_info);
               $url = $this->url.$this->variables['register'];
               echo auth_request($url,$user_info);
               die();
           }

    /* }
     else {
         echo"in upar else";
         echo json_encode(array('status' => 400, 'message' => 'Bad request.'));
         die();
     }*/
 }
    public function account_activation(){
        if (!isset($_GET['activation_key'])){
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        else {
            $activation_key = $_GET['activation_key'];
            $user_info = array('activation_key'=>$activation_key);
            $user_info = json_encode($user_info);
            $url = $this->url.$this->variables['account activation'];
            echo auth_request($url,$user_info);
        }
    }
    public function forgot_password(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ) {
            if (isset($_GET['reminder_email'])) {
               $email = $_GET['reminder_email'];
                $user_info = array('reminder_email' => $email);
                $user_info = json_encode($user_info);
                $url = $url = $this->url . $this->variables['forgot password'];;
                auth_request($url, $user_info);
                exit();

            } else if (isset($_POST['reminder_email'])) {
                $email = $_POST['reminder_email'];
                $user_info = array('reminder_email' => $email);
                $user_info = json_encode($user_info);
                $url = $url = $this->url . $this->variables['forgot password'];;
                auth_request($url, $user_info);
                exit();
            }
            else{
                echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
                exit();
            }
        }
        else{
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
            exit();
        }

    }
    
    public function password_reset(){
        if (!isset($_GET['activation_key'])){
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        else{
            $activation_key = $_GET['activation_key'];
            $user_info =array('activation_key'=>$activation_key);
            $user_info = json_encode($user_info);
            $url =  $url = $this->url.$this->variables['password reset'];
            auth_request($url,$user_info);
        }
    }
    
    public function password_update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ) {
        if (isset($_GET['activation_key'])&& isset($_GET['password'])){
            $activation_key = $_GET['activation_key'];
            $password = $_GET['password'];
            $user_info =array('activation_key'=>$activation_key,'password'=>$password);
            $user_info = json_encode($user_info);
            $url =  $url = $this->url.$this->variables['password update'];
            auth_request($url,$user_info);
            exit();
        }
        else if(isset($_POST['activation_key'])&& isset($_POST['password'])){
            $activation_key = $_POST['activation_key'];
            $password = $_POST['password'];
            $user_info =array('activation_key'=>$activation_key,'password'=>$password);
            $user_info = json_encode($user_info);
            $url =  $url = $this->url.$this->variables['password update'];
            auth_request($url,$user_info);
            exit();
        }
        else{
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
            exit();
        }
        }
        else{
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
            exit();
        }


    }
}
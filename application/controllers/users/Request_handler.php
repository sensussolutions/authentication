<?php
require_once APPPATH . 'controllers/users/My_helper.php';
class Request_handler extends My_helper
{
    public  $url = null;
    public function __construct()
    {
        parent::__construct();
        $this->url = $this->variables_auth['api'];
    }
    public function login(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ) {

          if (isset($_GET[$this->api_variable[0]]) && isset($_GET[$this->api_variable[1]]) && isset($_GET[$this->api_variable[2]])) {
              $email = $_GET[$this->api_variable[0]];
              $password = $_GET[$this->api_variable[1]];
              $license_id = $_GET[$this->api_variable[2]];
              $user_info = array($this->api_variable[0] => $email, $this->api_variable[1] => $password,
                  $this->api_variable[2] => $license_id);
              $user_info = json_encode($user_info);
              $url = $this->url . $this->variables_auth['login'];
              echo auth_request($url, $user_info);
              exit();
          }
          else if(isset($_POST[$this->api_variable[0]]) && isset($_POST[$this->api_variable[1]]) && isset($_POST[$this->api_variable[2]]) && isset($_POST['company_id'])){
              $email = $_POST[$this->api_variable[0]];
              $password = $_POST[$this->api_variable[1]];
              $license_id = $_POST[$this->api_variable[2]];
              $user_info = array($this->api_variable[0] => $email, $this->api_variable[1] => $password,
                  $this->api_variable[2] => $license_id);
              $user_info = json_encode($user_info);
              $url = $this->url . $this->variables_auth['login'];
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
         if (isset($_GET[$this->api_variable[3]]) && isset($_GET[$this->api_variable[0]])
             && isset($_GET[$this->api_variable[1]]) && isset($_GET[$this->api_variable[2]])) {

             $user_name = $_GET[$this->api_variable[3]];
             $email = $_GET[$this->api_variable[0]];
             $password = $_GET[$this->api_variable[1]];
             $license_id = $_GET[$this->api_variable[2]];
             $user_info = array($this->api_variable[3] => $user_name,$this->api_variable[0]  => $email,
                 $this->api_variable[1] => $password, $this->api_variable[2] => $license_id);
             $user_info = json_encode($user_info);
             $url = $this->url . $this->variables_auth['register'];
             echo auth_request($url, $user_info);
             exit();
         } else {
             echo json_encode(array('status' => 400, 'message' => 'Bad request.'));
             exit();
         }
     }
         else if (isset($_POST[$this->api_variable[3]]) && isset($_POST[$this->api_variable[0]]) &&
             isset($_POST[$this->api_variable[1]]) && isset($_POST[$this->api_variable[2]])) {
               $user_name = $_POST[$this->api_variable[3]];
               $email = $_POST[$this->api_variable[0]];
               $password = $_POST[$this->api_variable[1]];
               $license_id = $_POST[$this->api_variable[2]];
               $user_info = array($this->api_variable[3] => $user_name,$this->api_variable[0]  => $email,
                 $this->api_variable[1] => $password, $this->api_variable[2] => $license_id);
               $user_info = json_encode($user_info);
               $url = $this->url.$this->variables_auth['register'];
               echo auth_request($url,$user_info);
               die();
           }
 }

    public function account_activation(){
        if (!isset($_GET[$this->api_variable[4]])){
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        else {
            $activation_key = $_GET[$this->api_variable[4]];
            $user_info = array($this->api_variable[4]=>$activation_key);
            $user_info = json_encode($user_info);
            $url = $this->url.$this->variables_auth['account activation'];
            echo auth_request($url,$user_info);
        }
    }

    public function forgot_password(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ) {
            if (isset($_GET[$this->api_variable[5]])) {
               $email = $_GET[$this->api_variable[5]];
                $user_info = array($this->api_variable[5] => $email);
                $user_info = json_encode($user_info);
                $url = $url = $this->url . $this->variables_auth['forgot password'];
                auth_request($url, $user_info);
                exit();

            } else if (isset($_POST[$this->api_variable[5]])) {
                $email = $_POST[$this->api_variable[5]];
                $user_info = array($this->api_variable[5] => $email);
                $user_info = json_encode($user_info);
                $url = $url = $this->url . $this->variables_auth['forgot password'];;
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
        if (!isset($_GET[$this->api_variable[4]])){
            echo  json_encode(array('status'=>400,'message'=>'Bad request.'));
        }
        else{
            $activation_key = $_GET[$this->api_variable[4]];
            $user_info =array($this->api_variable[4]=>$activation_key);
            $user_info = json_encode($user_info);
            $url =  $url = $this->url.$this->variables_auth['password reset'];
            auth_request($url,$user_info);
        }
    }
    
    public function password_update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ) {
        if (isset($_GET[$this->api_variable[4]])&& isset($_GET[$this->api_variable[1]])){
            $activation_key = $_GET[$this->api_variable[4]];
            $password = $_GET[$this->api_variable[1]];
            $user_info =array($this->api_variable[4]=>$activation_key,$this->api_variable[1]=>$password);
            $user_info = json_encode($user_info);
            $url =  $url = $this->url.$this->variables_auth['password update'];
            auth_request($url,$user_info);
            exit();
        }
        else if(isset($_POST[$this->api_variable[4]])&& isset($_POST[$this->api_variable[1]])){
            $activation_key = $_POST[$this->api_variable[4]];
            $password = $_POST[$this->api_variable[1]];
            $user_info =array($this->api_variable[4]=>$activation_key,$this->api_variable[1]=>$password);
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
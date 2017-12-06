<?php

class Sign_up extends CI_Controller
{
    public function __construct()
    {
      /*  parent::__construct();
        $this->load->model('Signup');
        $this->load->helper('sendemail');
        $this->load->helper('encryptpass');*/
    }
    public function index(){
        $page_info = array('page_name'=>'users/sign_up','page_title'=>'Register');
        $this->load->view('users/main',$page_info);
    }
    public function register_new_user(){
        $user_info = json_decode(file_get_contents('php://input'), true);
        $activation_key = generate_activation_key();
        $userInformation = array('user_name'=>$user_info['user_name'],
            'user_email'=>$user_info['email'],'activation_key'=>$activation_key,
            'user_password'=>convert_password($user_info['password']),'is_active'=>'0');

        $count= $this->Signup->email_exist($user_info['email']);
        if ($count == 0){

            $data = array('template'=>'signup','activation_key'=>$activation_key,'user_email'=>$user_info['email']);
            $is_send_ = send_email('users/email_body',$user_info['email'],$data);
            if ($is_send_ == true){

                $this->Signup->insert_new_user($userInformation);
                $message = array('status'=>201);
            }
            else{
                $message = array('status'=>501,'message'=>'email not send');
            }
        }
        else{
            $message = array('status'=>401,'message'=>'Unauthorized');
        }

        echo json_encode($message);
    }
}
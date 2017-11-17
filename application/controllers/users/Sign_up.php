<?php

class Sign_up extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Signup');
        $this->load->helper('sendemail');
        $this->load->helper('encryptpass');
    }
    public function index(){
        $page_info = array('page_name'=>'users/sign_up','page_title'=>'Register');
        $this->load->view('users/main',$page_info);
    }
    public function register_new_user(){
        $message = array('message'=>false);
        $activation_key = generate_activation_key();
        $userInformation = array('user_name'=>$this->input->post('register-username'),
            'user_email'=>$this->input->post('register-email'),'activation_key'=>$activation_key,
            'user_password'=>convert_password($this->input->post('register-password')),'is_active'=>'0');
        $count= $this->Signup->email_exist($this->input->post('register-email'));
        if ($count == 0){
            $data = array('template'=>'signup','activation_key'=>$activation_key,'user_email'=>$this->input->post('register-email'));
            $is_send_ = send_email('users/email_body',$this->input->post('register-email'),$data);
            if ($is_send_ == true){
                $this->Signup->insert_new_user($userInformation);
                $message = array('message'=>true);
                echo json_encode($message);
            }
            else{
                $message = array('message'=>'email not send');
                echo json_encode($message);
            }
        }
        else{
            echo json_encode($message);
        }

    }
}
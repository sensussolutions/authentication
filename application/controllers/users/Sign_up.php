<?php

require_once APPPATH . 'controllers/users/My_helper.php';

class Sign_up extends My_helper
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Signup');
        $this->load->helper('sendemail');
        $this->load->helper('encryptpass');
    }
    public function load_view(){
       $page_info = array('page_name' => $this->page_name['sign_up'], 'page_title' => $this->page_title['sign_up']);
        $this->load->view('users/main', $page_info);
    }
    public function register(){
        $user_info = json_decode(file_get_contents('php://input'), true);
        $activation_key = generate_activation_key();
        $userInformation = array('Name'=>$user_info['user_name'],
            'Email'=>$user_info['email'],'ActivationKey'=>$activation_key,
            'Password'=>convert_password($user_info['password']),'IsActive'=>'0');

        $count= $this->Signup->email_exist($user_info['email']);
        if ($count == 0){
            $this->variables = $this->variables[1];
            $data = array('template'=>'signup','activation_key'=>$activation_key,'user_email'=>$user_info['email'],
                'application_link'=>$this->variables['api'].$this->variables['account_activation_link']);
            $is_send_ = send_email('users/email-temp',$user_info['email'],$data);
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
<?php

class Forgot_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
        $this->load->model('Signup');
        $this->load->helper('sendemail');
        $this->load->helper('encryptpass');
    }
        public function index(){
            $page_info = array('page_name'=>'users/forgot_password','page_title'=>'Forgot Password');
            $this->load->view('users/main',$page_info);
        }

    public function email_verify(){
        $user_info = json_decode(file_get_contents('php://input'), true);
        $email = $user_info['reminder_email'];
        $activation_key =  generate_activation_key();
            $is_exist = $this->Signup->email_exist($email);
            if ($is_exist>0){
                $data = array('template'=>'forgot password','activation_key'=>$activation_key,'user_email'=>$email);
                $is_send_ = send_email('users/password_reset_body',$email,$data);
                if ($is_send_ == true){
                    $update_key = array('activation_key'=>$activation_key);
                    $is_update = $this->Signup->update_activation_key($email,$update_key);
                    if ($is_update>0){
                        $message = array('status'=>200,'message'=>'Email is exist');
                    }
                }
                else{
                    $message = array('status'=>501,'message'=>'Email not send');
                }
            }
            else{
                $message = array('status'=>401,'message'=>'Unauthorized');
            }
        echo json_encode($message);
    }



}
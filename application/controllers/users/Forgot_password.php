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
        $message = array('message'=>false);
        $activation_key =  generate_activation_key();
            $is_exist = $this->Signup->email_exist($this->input->post('reminder-email'));
            if ($is_exist>0){
                $data = array('template'=>'forgot password','activation_key'=>$activation_key,'user_email'=>$this->input->post('reminder-email'));
                $is_send_ = send_email('users/password_reset_body',$this->input->post('reminder-email'),$data);
                if ($is_send_ == true){
                    $update_key = array('activation_key'=>$activation_key);
                    $is_update = $this->Signup->update_activation_key($this->input->post('reminder-email'),$update_key);
                    if ($is_update>0){
                        $message = array('message'=>true);
                    }
                }
                else{
                    $message = array('message'=>'email not send');
                }
            }

        echo json_encode($message);
    }



}
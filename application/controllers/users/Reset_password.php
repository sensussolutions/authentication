<?php

class Reset_password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
        $this->load->model('Signup');
    }
    public function index(){
        $activation_key = $_GET['verify'];
        $key_value = array('activation_key'=>$activation_key);
        $this->session->set_userdata($key_value);
        $count = $this->Signup->key_exist($activation_key);
        if ($count>0){
            $page_info = array('page_name' => 'users/new_password', 'page_title' => 'Reset Password');
            $this->load->view('users/main', $page_info);
        }
        else{
           redirect('http://localhost/OnlineReporting/404_override');
        }

    }
    public  function update_password(){
        $this->load->helper('encryptpass');
        $activation_key = $this->session->userdata['activation_key'];
        $is_exist=$this->Signup->key_exist($activation_key);
        $message = array('message'=>false);
        if ($is_exist>0){
            //exist
            $new_password = array('activation_key'=>'0',
                'user_password'=>convert_password($this->input->post('register-password')));
            $is_create = $this->Signup->update_password($activation_key,$new_password);
            if ($is_create){
                $message = array('message'=>true);
            }
            else{
                $message = array('message'=>false);
            }
        }
        else{
            //not exist
            $message = array('message'=>false);
        }
        echo json_encode($message);
    }


}
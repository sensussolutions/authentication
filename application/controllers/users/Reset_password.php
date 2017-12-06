<?php

class Reset_password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
        $this->load->model('Signup');
    }
    public function key_exist(){
        $message = array('status'=>401,'message'=>'Unauthorized');
        $user_info = json_decode(file_get_contents('php://input'), true);
        $count = $this->Signup->key_exist($user_info['activation_key']);
        if ($count>0) {
          $message = array('status'=>200,'message'=>'key exist');
        }
        echo json_encode($message);
    }
    public  function password_update(){
        $user_info = json_decode(file_get_contents('php://input'), true);
        $this->load->helper('encryptpass');
        $activation_key = $user_info['activation_key'];
        $is_exist=$this->Signup->key_exist($activation_key);
        $message = array('status'=>401,'message'=>'Unauthorized');
        if ($is_exist>0) {
            //exist
            $new_password = array('activation_key' => '0',
                'user_password' => convert_password($user_info['password']));
            $is_create = $this->Signup->update_password($activation_key, $new_password);
            if ($is_create) {
                $message = array('status'=>200,'message'=>'Password changed');
            }
        }
        echo json_encode($message);
    }
}
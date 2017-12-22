<?php

require_once APPPATH . 'controllers/users/My_helper.php';

class Reset_password extends My_helper
{

    public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
    }
    public function load_view(){
        $page_info = array('page_name' => $this->page_name['password_reset'], 'page_title' => $this->page_title['password_reset']);
        $this->load->view('users/main', $page_info);
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
            $new_password = array('ActivationKey' => '0',
                'Password' => convert_password($user_info['password']));
            $is_create = $this->Signup->update_password($activation_key, $new_password);
            if ($is_create) {
                $message = array('status'=>200,'message'=>'Password changed');
            }
        }
        echo json_encode($message);
    }
}
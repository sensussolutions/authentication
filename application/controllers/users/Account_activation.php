<?php

class Account_activation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
        $this->load->model('Signup');
    }
    public function activate_account(){
        $activation_key = json_decode(file_get_contents('php://input'), true);
        $activation_key = $activation_key['activation_key'];
       $count=$this->Signup->active_user($activation_key);
        if ($count>0){
            $message = array('status'=>200,'message'=>'Activated');
           echo json_encode($message);
        }
        else{
            $message = array('status'=>400,'message'=>'Bad request');
            echo json_encode($message);
        }
    }
}
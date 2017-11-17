<?php

class Account_activation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
        $this->load->model('Signup');
    }
    public function index(){
        $activation_key = $_GET['verify'];
        $count=$this->Signup->active_user($activation_key);
        if ($count>0){
            redirect("http://localhost/OnlineReporting");
        }
        else{
            redirect('http://localhost/OnlineReporting/404_override');
        }
    }
}
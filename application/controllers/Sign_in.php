<?php

class Sign_in extends CI_Controller
{
    public function index()
    {
        $page_info = array('page_name' => 'users/sign_in', 'page_title' => 'Sign In');
        $this->load->view('users/main', $page_info);
        /*if ($this->session->has_userdata('is_login')) {
            header('Location: dashboard');

        } else {
            $page_info = array('page_name' => 'users/sign_in', 'page_title' => 'Sign In');
            $this->load->view('users/main', $page_info);
        }*/
    }
    public function login()
    {
        $user_info = json_decode(file_get_contents('php://input'), true);
        $this->load->model('Signin');
        $this->load->helper('encryptpass');
        $userInformation = $this->Signin->userAuth($user_info['email'], convert_password($user_info['password']));
        if ($userInformation['exist']){
            foreach ($userInformation['userInformation'] as $row){
                if ($row->is_active == '1'){
                    $userProfile = array('status'=>200,'id'=>$row->id);
                    echo  json_encode($userProfile);
                }
                else{
                    $userProfile = array('status'=>401,'message'=>'Unauthorized');
                    echo  json_encode($userProfile);
                }
            }
        }
        else{
            $userProfile = array('status'=>401,'message'=>'Unauthorized');
            echo  json_encode($userProfile);
        }

    }
}
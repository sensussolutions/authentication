<?php

class Sign_in extends CI_Controller
{
    public function index()
    {
        if ($this->session->has_userdata('is_login')) {
            header('Location: dashboard');

        } else {
            $page_info = array('page_name' => 'users/sign_in', 'page_title' => 'Sign In');
            $this->load->view('users/main', $page_info);
        }
    }
    public function user_auth()
    {
        $this->load->model('Signin');
        $this->load->helper('encryptpass');
        $userProfile = array('exist'=>false);

        $userInformation = $this->Signin->userAuth($this->input->post('login-username'), convert_password($this->input->post('login-password')));
        if ($userInformation['exist']){
            $userProfile = array('exist'=>true);
            foreach ($userInformation['userInformation'] as $row){
               // echo $row->is_active;
                if ($row->is_active == '1'){
                    $userProfile = array('exist'=>true,'active'=>true);
                    //create session here
                    $login_information = array('id'=>$row->id,'is_login'=>true);
                    $this->session->set_userdata($login_information);
                }
                else{
                    $userProfile = array('exist'=>true,'active'=>false);
                }
            }
        }
        echo  json_encode($userProfile);
    }

public function remove_session(){
    $this->session->unset_userdata('is_login');
    $this->session->sess_destroy();
    redirect('http://localhost/OnlineReporting');
}
public function request_handler(){
    $this->load->helper('encryptpass');
    $login_info = array('user_name'=>$this->input->post('login-username'),'login_pass'=>convert_password($this->input->post('login-password')));
   $login_info=json_encode($login_info);
  // api url
    $url = "http://localhost/ui/users/Received_request/verify_req";
    // create a new cURL resource
    $ch = curl_init($url);

    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $login_info);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $result = curl_exec($ch);
    //close cURL resource
    curl_close($ch);
  echo $result;


}
}
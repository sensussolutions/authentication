<?php
require_once APPPATH . 'controllers/users/My_helper.php';
class Sign_in extends My_helper
{
     public function __construct()
    {
        parent::__construct();
        //also called model and other thing here
    }
    public function load_view()
    {
        if ($this->session->has_userdata('is_login')) {
            header('Location: dashboard');

        } else {
            $page_info = array('page_name' => $this->page_name['sign_in'], 'page_title' => $this->page_title['sign_in']);
        $this->load->view('users/main', $page_info);
        }
    }
    public function login()
    {
        $user_info = json_decode(file_get_contents('php://input'), true);
        $this->load->model('Signin');
        $userInformation = $this->Signin->userAuth($user_info[$this->api_variable[0]], convert_password($user_info[$this->api_variable[1]]),
            $user_info[$this->api_variable[2]]);
        if ($userInformation['exist']){
            foreach ($userInformation['userInformation'] as $row){
                if ($row->IsActive == '1' && $row->Status == 'active'){
                    $userProfile = array('status'=>200,'id'=>$row->ID,'AppID'=>$row->AppID,'AppName'=>$row->AppName);
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
    public function remove_session(){
        echo "in remove session";
        $this->session->unset_userdata('is_login');
        $this->session->sess_destroy();
        $login  = base_url();
        redirect($login);
    }
}
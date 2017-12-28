<?php

require_once APPPATH . 'controllers/users/My_helper.php';
ini_set('allow_url_fopen',1);
class Request_sender extends My_helper
{

    public $url = null;
    public function __construct()
    {
        parent::__construct();
        $this->variables = $this->variables[0];
        $this->url = $this->variables['api'];
    }

    public function login()
    {
        echo $result = file_get_contents($this->url.$this->variables['login'].'?'.$this->api_variable[0].'='.$this->input->post('login-username').
            '&'.$this->api_variable[1].'='.$this->input->post('login-password').
            '&'.$this->api_variable[2].'='.$this->variables['license_id'],true);
    }

    public function register()
    {
        echo $result = file_get_contents($this->url.$this->variables['register'].'?'.$this->api_variable[3].'='.$this->input->post('register-username').
            '&'.$this->api_variable[0].'='.$this->input->post('register-email'). '&'.$this->api_variable[1].'='.$this->input->post('register-password').
            '&'.$this->api_variable[2].'='.$this->variables['license_id'],true);
    }

    public function account_activate()
    {
        $activation_key = $_GET['verify'];
        $is_active = file_get_contents($this->url.$this->variables['account activation'].'?'.$this->api_variable[4].'='
            .$activation_key,true);
        $is_active = json_decode($is_active);
        if ($is_active->status == 200) {
            redirect(base_url());
        } else {
            redirect('404_override');
        }
    }

    public function forgot_password()
    {
      
        echo  $is_exist = file_get_contents($this->url.$this->variables['forgot password'].'?'.$this->api_variable[5].'='
            .$this->input->post('reminder-email'),true);
    }

    public function password_reset()
    {
        $url = base_url();
        $activation_key = $_GET['verify'];
        $is_exist = file_get_contents($this->url.$this->variables['password_reset_key_verify'].'?'
            .$this->api_variable[4].'='.$activation_key,true);
        $is_exist = json_decode($is_exist);
        if ($is_exist->status == 200) {
            $activation = array($this->api_variable[4] => $activation_key);
            $this->session->set_userdata($activation);

            redirect('password-reset');
        } else {
           redirect('404_override');
        }
    }

    public function password_update()
    {
        echo $is_update = file_get_contents($this->url.$this->variables['password update'].'?'.$this->api_variable[4].'='
            . $this->session->userdata('activation_key').
            '&'.$this->api_variable[1].'='.$this->input->post('register-password'),true);
    }

}
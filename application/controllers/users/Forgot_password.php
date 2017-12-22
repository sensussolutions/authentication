<?php

require_once APPPATH . 'controllers/users/My_helper.php';

class Forgot_password extends My_helper
{

        public function load_view(){
           $page_info = array('page_name' => $this->page_name['forgot_password'], 'page_title' => $this->page_title['forgot_password']);
        $this->load->view('users/main', $page_info);
        }

    public function email_verify(){
        $user_info = json_decode(file_get_contents('php://input'), true);
        $email = $user_info['reminder_email'];
        $activation_key =  generate_activation_key();
        $is_exist = $this->Signup->email_exist($email);
            if ($is_exist>0){
                $this->variables = $this->variables[1];
                $data = array('template'=>'forgot password','activation_key'=>$activation_key,'user_email'=>$email,
                    'forgot_password_link'=>$this->variables['api'].$this->variables['forgot_password_link']);
                $is_send_ = send_email('users/password-reset-temp',$email,$data);
                if ($is_send_ == true){
                    $update_key = array('ActivationKey'=>$activation_key);
                    $is_update = $this->Signup->update_activation_key($email,$update_key);
                    if ($is_update>0){
                        $message = array('status'=>200,'message'=>'Email is exist');
                    }
                }
                else{
                    $message = array('status'=>501,'message'=>'Email not send');
                }
            }
            else{
                $message = array('status'=>401,'message'=>'Unauthorized');
            }
        echo json_encode($message);
    }

}
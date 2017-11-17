<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('send_email')) {
    function send_email($template,$email,$data)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'farhan.ghffar@gmail.com',
            'smtp_pass' => 'manitts@1',
            'mailtype' => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );
        $ci=& get_instance();
        $ci->load->library('email',$config);
        $ci->email->from('farhan.ghffar@gmail.com', 'Farhan Ghaffar');
        $ci->email->to($email);
        $ci->email->subject('Email Verification ');
       // $data = array('activation_key'=>'test','user_email'=>'farhan');
        if ($data['template'] == 'signup'){
            $body = $ci->load->view($template,$data,TRUE);
        }
        else{
            $body =  $ci->load->view($template,$data,TRUE); ;//$ci->load->view($template,$data,TRUE);
        }

        $ci->email->message($body);
        if (!$ci->email->send()) {
            show_error($ci->email->print_debugger());
        }
        else {
            return true;
        }
    }
}
    ?>
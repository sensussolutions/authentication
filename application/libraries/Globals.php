<?php

class Globals
{
    /*public $data = array();
    public function __construct($config = array())
    {
        foreach ($config as $key=>$value){
             $data[$key] = $value;
        }
        // Make instance of CodeIgniter to use its resources
        $CI = & get_instance();

// Load data into CodeIgniter
        $CI->load->vars($data);
    }*/
    public function user_variables(){
        return $data = array('api'=>'http://localhost/authentication/users/request_handler/');
    }

}
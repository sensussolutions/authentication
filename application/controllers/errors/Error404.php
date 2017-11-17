<?php

class Error404 extends CI_Controller
{
    public function index(){
        $page_info = array('page_name'=>'users/error_404','page_title'=>'404');
        $this->load->view('users/main',$page_info);


    }

}
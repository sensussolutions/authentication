<?php

class Dashboard extends CI_Controller
{
    public function index(){
        $page_info = array('page_name'=>'dashboard/base_pages','page_title'=>'OneUI - Admin Dashboard Template &amp; UI Framework');
        $this->load->view('dashboard/main',$page_info);
    }

}
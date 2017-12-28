<?php
require_once APPPATH . 'controllers/users/My_helper.php';
class Error404 extends My_helper
{
    public function index(){
        $page_info = array('page_name'=>$this->page_name['error_page'], 'page_title' => $this->page_title['error_title']);
        $this->load->view('users/main',$page_info);


    }

}
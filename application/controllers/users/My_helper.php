<?php

class My_helper extends CI_Controller
{
    public $page_name = null;
    public $page_title = null;
    public $variables = null;

    public function __construct()
    {
        parent::__construct();
        $this->variables = $this->globals->user_variables();
        $this->page_name = $this->variables[2];
        $this->page_title = $this->variables[3];

    }

}
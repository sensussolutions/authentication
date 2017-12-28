<?php

class My_helper extends CI_Controller
{
    public $page_name = null;
    public $page_title = null;
    public $variables = null;
    public $variables_auth = null;
    public $api_variable = null;

    public function __construct()
    {
        parent::__construct();
        $this->variables = $this->globals->user_variables();
        $this->variables_auth = $this->variables[1];
        $this->page_name = $this->variables[2];
        $this->page_title = $this->variables[3];
        $this->api_variable = $this->variables[4];

    }

}
<?php

class Received_request extends CI_Controller
{
    public function verify_req(){
        $data = json_decode(file_get_contents('php://input'), true);
        $userProfile = array('exist'=>true,'active'=>true);
        echo json_encode($userProfile);
    }

}
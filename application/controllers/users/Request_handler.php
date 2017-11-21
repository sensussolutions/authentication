<?php
class Request_handler extends CI_Controller
{
    public function manage_request(){
        $data = json_decode(file_get_contents('php://input'), true);
        $userProfile = array('exist'=>true,'active'=>true);
        echo json_encode($userProfile);

    }

}
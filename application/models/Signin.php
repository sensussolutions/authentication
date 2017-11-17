<?php

class Signin extends CI_Model
{
    public function userAuth($emailId,$password){
        $result = array('exist'=>false);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_email', $emailId);
        $this->db->where('user_password', $password);
        $query_result = $this->db->get();
        $count = $query_result->num_rows();
       if ($count>0){
           $userInformation=$query_result->result();
           $result = array('exist'=>true,'userInformation'=>$userInformation);
       }
        return $result;

    }
    public function getUserInformation($emailId, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_email', $emailId);
        $this->db->where('user_password', $password);
        $query_result = $this->db->get();
       return $result = $query_result->result();
    }
}
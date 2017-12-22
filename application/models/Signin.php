<?php

class Signin extends CI_Model
{
    public function userAuth($emailId,$password){
        $result = array('exist'=>false);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('Email', $emailId);
        $this->db->where('Password', $password);
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
        $this->db->where('Email', $emailId);
        $this->db->where('Password', $password);
        $query_result = $this->db->get();
       return $result = $query_result->result();
    }
}
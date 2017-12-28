<?php

class Signin extends CI_Model
{
    public function userAuth($emailId,$password,$licenseId){
        $result = array('exist'=>false);
        $this->db->select('license.CompanyID,license.AppID,license.MaxiLicense, license.UsedLicense,license.ExpiryDate,
         license.Status, users.ID, users.Name as UserName, users.IsActive,applications.Name as AppName');
        $this->db->from('users');
        $this->db->join('license','license.LicenseID=users.LicenseID');
        $this->db->join('applications','applications.AppID=license.AppID');
        $this->db->where('users.Email', $emailId);
        $this->db->where('users.Password', $password);
        $this->db->where('license.LicenseID', $licenseId);

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
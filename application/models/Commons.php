<?php


class Commons extends CI_Model
{
    public function license_exist($license_id){
        $this->db->select('*');
        $this->db->from('license');
        $this->db->where('LicenseID',$license_id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

}
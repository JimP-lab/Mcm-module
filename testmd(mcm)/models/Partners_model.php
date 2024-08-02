<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partners_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    public function get($id = '')
    {
        if ($id != '') {
            $this->db->where('ID', $id);
            return $this->db->get(db_prefix() . 'MCM_Verification')->row();
        }

        return $this->db->get(db_prefix() . 'MCM_Verification')->result_array();
    }

    public function add($data)
    {
        $data = [
        'MCMVendorID' => $data['MCMVendorID'],
        'DemandPartnerID' => $data['DemandPartnerID'],
        ];
        $this->db->insert(db_prefix() . 'MCM_Verification', $data);
        return $this->db->insert_id();
    
    }

    public function update($id, $data)
    {
        $this->db->where('GoogleAdManagerID', $id);
        return $this->db->update(db_prefix() . 'MCM_Vendor', $data);
    }

    public function delete($id)
    {    
        $this->db->delete('MCM_Verification', array('ID' => $id));
        return $this->db->delete('MCM_Verification', array('ID' => $id));
    }
    
    public function getAllPartners()
    {
        return $this->db->get(db_prefix() . 'MCM_Verification')->result_array();
    }
}

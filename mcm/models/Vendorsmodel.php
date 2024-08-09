<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendorsmodel extends App_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        if ($id != '') {
            $this->db->where('ID', $id);
            return $this->db->get(db_prefix() . 'MCM_Vendor')->row();
        }
        return $this->db->get(db_prefix() . 'MCM_Vendor')->result_array();
    }

    public function add($data)
    {
        $data = [
            'ID' => $data['ID'],
            'GoogleAdManagerID' => $data['GoogleAdManagerID'],
            'Name' => $data['Name'],
            'Email' => $data['Email'],
            'Website' => $data['Website'],
        ];
        $this->db->insert(db_prefix() . 'MCM_Vendor', $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    { 
        $this->db->where('id', '5');     
        $this->db->delete('MCM_Vendor', array('ID' => $id));
        return $this->db->delete(db_prefix() . 'MCM_Vendor');
    }

    // public function getAllVendors()
    // {
    //     return $this->db->get(db_prefix() . 'MCM_Vendor')->result_array();
    // }
}

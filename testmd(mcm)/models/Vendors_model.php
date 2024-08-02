<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendors_model extends App_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        if ($id) {
            $this->db->where('ID', $id);
            return $this->db->get(db_prefix() . 'mcm_vendor')->row();
        }
        return $this->db->get(db_prefix() . 'mcm_vendor')->result_array();
    }

    public function add($data)
    {
        $data = [
            'GoogleAdManagerID' => $data['GoogleAdManagerID'],
            'Name' => $data['Name'],
            'Email' => $data['Email'],
            'Website' => $data['Website'],
        ];
        $this->db->insert(db_prefix() . 'mcm_vendor', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('ID', $id);
        $this->db->update('mcm_vendor', array('ID' => $id));
        return $this->db->update(db_prefix() . 'mcm_vendor', $data);
    }

    
    public function delete($id)
    { 
        $this->db->where('ID', '5');     
        $this->db->delete('mcm_vendor', array('ID' => $id));
        return $this->db->delete('mcm_vendor', array('ID' => $id));
    }
    
    public function getAllVendors()
    {
        return $this->db->get(db_prefix() . 'mcm_vendor')->result_array();
    }
}
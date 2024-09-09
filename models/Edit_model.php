<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    // Method for getting the vendors by id
    public function get_records($id) {
        // Select the required columns
        $this->db->select('Name, Email, Website, GoogleAdManagerID, Date');
        $this->db->from('ads_MCMVendor');
        $this->db->where('id', $id);
        $query = $this->db->get();
    
        // Check if the query returned any results
        if ($query->num_rows() > 0) {
            // Get the row data as an associative array add + return multiple data or values add this 
            return $query->row_array();
        } else {
            return false;
        }
    }

    // Method for updating vendors by id and data 
    public function update_record($id, $data) {
        $this->db->where('id', $id);    
        return $this->db->update('ads_MCMVendor', $data); // 'vendors' is the name of the table
    }

    // Method for deleting vendors by id 
    public function delete_record($id) {
        $this->db->where('id', $id);
        return $this->db->delete('ads_MCMVendor'); 
    }
}
?>

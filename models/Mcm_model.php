<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mcm_model extends App_Model
{
     // Method for getting the vendors into db
    public function get_mcm_vendors(array $filters) : array
    {
        // Ensure you use $this->ads_MCMVendor
        $query = $this->db->select('*');
        $query = $this->db->from('ads_MCMVendor');

        // Apply filters if necessary  
        foreach ($filters as $key => $value) {
            $this->db->where($key, $value);
        }

        return $query->result();  // This was missing in one of the duplicated methods
    }


    // Method for inserting  the vendors into db 
    public function insert_mcm_vendor(array $data)
    {
        return $this->db->insert('ads_MCMVendor', $data);
    }

    // Method that gets vendors from the database and it appears them into the tables page
    public function get_all_vendors($data)
    { 
        $this->db->select('*');
        $this->db->from('ads_MCMVendor'); 
        $num_rows = $this->db->count_all_results('', false);
        $this->db->limit($data['limit'], $data['offset']);
        $data = $this->db->get()->result_array(); 
        return ['data' => $data, 'total' => $num_rows];
    }
    
    // Method for getting vendors by id 
    public function get_records($id) {
        $this->db->select('Name, Email, Website, GoogleAdManagerID, Date');
        $this->db->from('ads_MCMVendor');
        $this->db->where('id', $id);
        $query = $this->db->get();
    
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
            return $this->db->update('ads_MCMVendor', $data); 
        }
    
        // Method for deleting vendors by id 
        public function delete_record($id) {
            $this->db->where('id', $id);
            return $this->db->delete('ads_MCMVendor'); 
        }

    // Method for transfering the wesbites from the ads_vendordb into ads_sites db / gettibg the id from name
    public function get_site_name_by_id($Site_id)
    {
        $this->db->where('Site_id', $Site_id);
        $query = $this->db->get('sites');
        return $query->row()->Site_name;
    }

    // Method for getting the status from the database 
    public function get_status($id) {
        $this->db->select('Status');
        $this->db->from('ads_MCMVendor');  
        $this->db->where('id', $id);
        $query = $this->db->get();

      
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->Status;
        } else {
            return false;
        }
    }

    // Method for updating the status in the database and in the ui as well 
    public function update_status($id, $Status) {
        $data = array(
            'Status' => $Status
        );

        $this->db->where('id', $id);
        return $this->db->update('ads_MCMVendor', $data); 
    }

    // Method to get the status of a vendor by ID
    public function get_vendor_status($id)
    {
        $this->db->select('status');
        $this->db->from('ads_MCMVendor');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->status;  // Return the status
        } else {
            return null;  // Return null if no record is found
        }
    }
     // Get all sites all the sites from the database and return them in the ui as well 
     public function get_sites() {
        $this->db->select('site_id, site_name');
        $query = $this->db->get('tblads_MCMSites');
        return $query->result_array(); // Return the result as an array
    }

    // Method for getting the Updating the Websites in the database and in the ui as well 
    public function update_vendor_website($id, $Site_id) {
        $this->db->where('id', $id);
        return $this->db->update('ads_MCMVendor', ['Site_id' => $Site_id]);
    }


      // Method for getting the sites that the user has saved in the database and showing them into the ui 
      public function get_saved_sites($id) {
        $this->db->select('Site_id');
        $this->db->where('id', $id);
        $query = $this->db->get('ads_MCMVendor'); // Fetch the saved Site_id for the vendor
    
        $result = $query->row();
        return !empty($result->Site_id) ? explode(', ', $result->Site_id) : []; // Convert the comma-separated string to an array
    }


      // Get all sites all the partners from the database and return them into the ui 
      public function get_Partners() {
        $this->db->select('PartnerID, PartnerName'); 
        $this->db->from('tblads_demand_partners'); 
        return $this->db->get()->result_array(); // Return the result as an array  // fix the method getpartners return this db get() - result
        // and add from 
    }


    // Method for saving the selection of the user in partners dropdown and updating in database and in the ui  
    public function update_Partners_selection($id, $partner_ids_string) {
        // Prepare data to update the Partners column
        $data = [
            'Partner_id' => $partner_ids_string // Store as a comma-separated string
        ];

        $this->db->where('id', $id);
        return $this->db->update('ads_MCMVendor', $data);
    }

}
?>

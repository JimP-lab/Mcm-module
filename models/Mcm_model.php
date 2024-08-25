<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mcm_model extends App_Model
{
    private $mcm_vendor_tbl;
    private $sites_tbl;

    public function __construct()
    {
        parent::__construct();
        $this->mcm_vendor_tbl = db_prefix() . 'ads_MCMVendor';
        $this->sites_tbl = db_prefix() . 'ads_MCMSites'; 
        $this->load->database();
    }


     // Method for getting the vendors into db
    public function get_mcm_vendors(array $filters) : array
    {
        // Ensure you use $this->mcm_vendor_tbl
        $query = $this->db->select('*')->from($this->mcm_vendor_tbl);

        // Apply filters if necessary
        foreach ($filters as $key => $value) {
            $this->db->where($key, $value);
        }

        return $query->result();  // This was missing in one of the duplicated methods
    }


    // Method for inserting  the vendors into db 
    public function insert_mcm_vendor(array $data)
    {
        return $this->db->insert($this->mcm_vendor_tbl, $data) ? $this->db->insert_id() : false;
    }

    // Method that gets vendors from the database and it appears them into the tables page
    public function get_all_vendors($data)
    { 
        $this->db->select('*');
        $this->db->from($this->mcm_vendor_tbl); 
        $num_rows = $this->db->count_all_results('', false);
        $this->db->limit($data['limit'], $data['offset']);
        $data = $this->db->get()->result_array(); 
        return ['data' => $data, 'total' => $num_rows];
    }    

    // Method for transfering the wesbites from the ads_vendordb into ads_sites db / gettibg the id from name
    public function get_site_name_by_id($site_id)
    {
        $this->db->where('site_id', $site_id);
        $query = $this->db->get('sites');
        return $query->row()->site_name;
    }

    // Method for getting the status from the database 
    public function get_status($id) {
        $this->db->select('status');
        $this->db->from('ads_MCMVendor');  
        $this->db->where('id', $id);
        $query = $this->db->get();

      
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->status;
        } else {
            return false;
        }
    }

    // Method for updating the status in the database and in the ui as well 
    public function update_status($id, $status) {
        $data = array(
            'status' => $status
        );

        $this->db->where('id', $id);
        return $this->db->update('ads_MCMVendor', $data); 
    }

     // Method for getting the partners from the database 
     public function get_partners($id) {
        $this->db->select('DemandPartners');
        $this->db->from('ads_MCMVendor');  
        $this->db->where('id', $id);
        $query = $this->db->get();

      
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->DemandPartners;
        } else {
            return false;
        }
    }

       // Method for updating the DemandPartners in the database and in the ui as well 
       public function update_partners($id, $demandPartners) {
        $data = array(
            'DemandPartners' => $demandPartners
        );

        $this->db->where('id', $id);
        return $this->db->update('ads_MCMVendor', $data); 
    }


    // Method for getting the Websites from the database that exist in the Website column 
    public function get_all_websites() {
        $this->db->select('Website');
        $this->db->from('ads_MCMVendor');
        $this->db->where('Website IS NOT NULL');
        $this->db->where('Website !=', ''); // This excludes empty strings
        $query = $this->db->get();
    
        return $query->result();
    }


    // Method for getting the Updating the Websites in the database and in the ui as well 
    public function update_vendor_website($id, $site) {
        $this->db->where('id', $id);
        return $this->db->update('ads_MCMVendor', ['Website' => $site]);
    }

}



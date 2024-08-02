
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mcm extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mcmmodel');
        $this->load->model('Vendorsmodel');
        $this->load->model('Partnersmodel');
    }

    public function Create()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->Mcmmodel->add($data);
            redirect(admin_url('mcm/mcmCreateVendor'));
        }
        $this->load->view('Create');
    }

    public function mcmVendorCreate() {
        log_message('debug','hello world');
        $this->load->view('Vendors');
    }

    public function mcmCredentialsVendor() {
        log_message('debug','Processing vendors credentials');
        $GoogleAdManagerID = $this->input->post('GoogleAdManagerID');
        $Name = $this->input->post('Name');
        $Email = $this->input->post('Email');
        $Website = $this->input->post('Website');

        $data = [
            'GoogleAdManagerID' => $GoogleAdManagerID,
            'Name' => $Name,
            'Email' => $Email,
            'Website' => $Website,
        ];

        $insert_id = $this->Vendorsmodel->add($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Vendor was added.');
            redirect(admin_url('mcm/mcmTablesVendor/'));

        } else {
            $this->session->set_flashdata('error', 'Failed to add Vendor.');
            redirect(admin_url('mcm/mcmVendorCreate'));
        }
    }    

    public function mcmTablesVendor($id= '')
    {     
        $Vendors_data = $this->Vendorsmodel->get($id);
        if ($Vendors_data) {        
            $this->load->model('Vendorsmodel'); 
            $this->db->select('GoogleAdManagerID, Name, Email, Website');
            $this->db->from('MCM_Vendor');
            $query = $this->db->get();
            $all_Vendors_data = $query->result(); 
            $data['Vendors'] = [];
            foreach ($all_Vendors_data as $Vendors) {
                $data['Vendors'][] = [
                    'ID' => $Vendors['ID'],
                    'GoogleAdManagerID' => $Vendors->GoogleAdManagerID,
                    'Name' => $Vendors->Name,
                    'Email' => $Vendors->Email,
                    'Website' => $Vendors->Website,
                ];
            }
            log_message('debug', 'Loading table view');
            $this->load->view('Tables', $data);
        } else {
            $this->session->set_flashdata('error', 'Vendor not found.');
            redirect(admin_url('mcm/mcmVendorCreate'));
        }
    }
    
    public function mcmPartnerCreate() {
        log_message('debug','hello world');
        $this->load->view('Partners');
    }

    public function mcmCredentialsPartner() {
        log_message('debug','Processing vendors credentials');
        $MCMVendorID = $this->input->post('MCMVendorID');
        $DemandPartnerID = $this->input->post('DemandPartnerID');

        $data = [
            'MCMVendorID' => $MCMVendorID,
            'DemandPartnerID' => $DemandPartnerID,
        ];

        $insert_id = $this->Partnersmodel->add($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Partner was added.');
            redirect(admin_url('mcm/mcmListPartner'));

        } else {
            $this->session->set_flashdata('error', 'Failed to add Partner.');
            redirect(admin_url('mcm/mcmPartnerCreate'));
        }
    }    

    public function mcmListPartner($id='')
    {     
        $Partners_data = $this->Partnersmodel->get($id);
        if ($Partners_data) {
           
            $this->load->model('Partnersmodel'); 
            $this->db->select('MCMVendorID, DemandPartnerID,');
            $this->db->from('MCM_Verification');

            $query = $this->db->get();
            $all_Partners_data = $query->result(); 
            
            $data['Partners'] = [];
            foreach ($all_Partners_data as $Partners) {
                $data['Partners'][] = [
                    'MCMVendorID' => $Partners->MCMVendorID,
                    'DemandPartnerID' => $Partners->DemandPartnerID,
                ];
            }

            log_message('debug', 'Loading list view');
            $this->load->view('List', $data);
        } else {
            $this->session->set_flashdata('error', 'Partner not found.');
            redirect(admin_url('mcm/mcmPartnerCreate'));
        }
    }
    public function mcmDeleteVendors()
{
    // Check if a deletion request was submitted
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $id = $this->input->post('id');
        var_dump($id);
        die();
        if ($id) {
            $result = $this->Vendorsmodel->delete($id);
            if ($result) {
                $this->session->set_flashdata('success', 'Vendor deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete vendor.');
            }
        } else {
            $this->session->set_flashdata('error', 'No vendor ID provided for deletion.');
        }
        // Redirect to refresh the page after deletion attempt
        redirect(admin_url('mcm/mcmDeleteVendors'));
    }

    // Fetch all vendors to display in the table
    $data['Vendors'] = $this->Vendorsmodel->getAllVendors();
    
    // Load the view with the vendor data
    $this->load->view('Delete_Vendors', $data);
}
}

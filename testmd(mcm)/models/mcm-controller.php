// public function CredentialsVendor() {
    //     log_message('debug','Processing vendors credentials');
    //     $ID = $this->input->post('ID');
    //     $GoogleAdManagerID = $this->input->post('GoogleAdManagerID');
    //     $Name = $this->input->post('Name');
    //     $Email = $this->input->post('Email');
    //     $Website = $this->input->post('Website');

    //     $data = [
    //         'ID' => $ID,
    //         'GoogleAdManagerID' => $GoogleAdManagerID,
    //         'Name' => $Name,
    //         'Email' => $Email,
    //         'Website' => $Website,
    //     ];

    //     $insert_id = $this->Vendorsmodel->add($data);
    //     if ($insert_id) {
    //         $this->session->set_flashdata('success', 'Vendor was added.');
    //         redirect(admin_url('mcm/TablesVendor/'));

    //     } else {
    //         $this->session->set_flashdata('error', 'Failed to add Vendor.');
    //         redirect(admin_url('mcm/CreateVendor'));
    //     }
    // }    

    // public function TablesVendor($id= '')
    // {     
    //     $Vendors_data = $this->Vendorsmodel->get($id);
    //     if ($Vendors_data) {        
    //         $this->load->model('Vendorsmodel'); 
    //         $this->db->select('ID,GoogleAdManagerID, Name, Email, Website');
    //         $this->db->from('MCM_Vendor');

    //         $query = $this->db->get();
    //         $all_Vendors_data = $query->result(); 
            
    //         $data['Vendors'] = [];
    //         foreach ($all_Vendors_data as $Vendors) {

    //             $data['Vendors'][] = [
    //                 'ID' => $Vendors->ID,
    //                 'GoogleAdManagerID' => $Vendors->GoogleAdManagerID,
    //                 'Name' => $Vendors->Name,
    //                 'Email' => $Vendors->Email,
    //                 'Website' => $Vendors->Website,
    //             ];
    //         }

    //         log_message('debug', 'Loading vendors view');
    //         $this->load->view('Show_Vendors', $data);
    //     } else {
    //         $this->session->set_flashdata('error', 'Vendor not found.');
    //         redirect(admin_url('mcm/CreateVendor'));
    //     }
    // }  

    // public function EditVendor($id= '')
    // {
    //     // If no ID is provided, redirect to the vendor list
    //     if ($id= '') {
    //         $this->session->set_flashdata('error', 'No vendor ID provided for editing.');
    //         //redirect(admin_url('mcm/EditVendor')); // Assuming this is your vendor list page
    //     }
    
    //     if ($this->input->post()) {
    //         // Form submitted, process the update
    //         $data = [
    //             'ID' => $this->input->post('ID'),
    //             'GoogleAdManagerID' => $this->input->post('GoogleAdManagerID'),
    //             'Name' => $this->input->post('Name'),
    //             'Email' => $this->input->post('Email'),
    //             'Website' => $this->input->post('Website')
    //         ];
    
    //         $result = $this->Vendorsmodel->update($id, $data);
    
    //         if ($result) {
    //             $this->session->set_flashdata('success', 'Vendor updated successfully.');
    //             redirect(admin_url('mcm/EditVendor')); // Redirect to vendor list
    //         } else {
    //             $this->session->set_flashdata('error', 'Failed to update vendor.');
    //         }
    //     }
    
    //     // Fetch the vendor data
    //     $data['Vendors'] = $this->Vendorsmodel->get($id);
    
    //     if (!$data['Vendors']) {
    //         $this->session->set_flashdata('error', 'Vendor not found.');
    //         redirect(admin_url('mcm/CreateVendors'));
    //     }
    
    //     // Load the edit form view
    //     $this->load->view('Edit_Vendors', $data);
    // }


    
//     public function DeleteVendor()
//     {
//     // Check if a deletion request was submitted
//     if ($this->input->server('REQUEST_METHOD') == 'POST') {
//         $id = $this->input->post('ID');
//         if ($id) {
//             $result = $this->Vendorsmodel->delete($id);
//             if ($result) {
//                 $this->session->set_flashdata('Vendor deleted successfully');
//             } else {
//                 $this->session->set_flashdata('Failed to delete vendor');
//             }
//         } else {
//             $this->session->set_flashdata('No vendor provided');
//         }
//         // Redirect to refresh the page after deletion attempt
//         redirect(admin_url('mcm/DeleteVendor'));
//     }

//     // Fetch all vendors to display in the table
//     $data['Vendors'] = $this->Vendorsmodel->getAllVendors();
    
//     // Load the view with the vendor data
//     $this->load->view('Delete_Vendors', $data);
//     }

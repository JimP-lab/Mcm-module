
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mcm extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mcm_model');
        $this->load->library('form_validation');
        $this->load->model('Edit_model');
    }

    public function Create()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->Mcm_model->add($data);
            redirect(admin_url('mcm/mcmCreateVendor'));
        }
        $this->load->view('Create');
    }

    // Method for loading vendor
    public function mcm_vendor() {
        log_message('debug','hello world');
        $this->load->view('Vendors');
    }

    // Method for inserting vendor
    public function import_mcm_vendors() {
        log_message('debug', 'Processing MCM vendors import');
    
        // Retrieve data from POST request
        $postData = $this->input->post('data');
    
        // Check if 'data' key exists in the POST data and is an array
        if (is_array($postData) && !empty($postData)) {
            $successfulInserts = 0;
            $failedInserts = 0;

            // Iterate over each entry in the post data
            foreach ($postData as $vendorData) {
                // Use isset to check if the specific keys exist in the current vendor data
                $Date = isset($vendorData['0']) ? $vendorData['0'] : NULL;
                $Name = isset($vendorData['2']) ? $vendorData['2'] : NULL;
                $Website = isset($vendorData['3']) ? $vendorData['3'] : NULL;
                $GoogleAdManagerID = isset($vendorData['4']) ? $vendorData['4'] : NULL;
                $Email = isset($vendorData['5']) ? $vendorData['5'] : NULL;
    
                // Create data array for insertion
                $data = [
                    'Date' => $Date,
                    'Name' => $Name,
                    'Website' => $Website,
                    'GoogleAdManagerID' => $GoogleAdManagerID,
                    'Email' => $Email,
                ];
    
                // Call the model method to insert data
                $insert_id = $this->Mcm_model->insert_mcm_vendor($data);
                if ($insert_id) {
                    $successfulInserts++;
                } else {
                    $failedInserts++;
                }
            }
    
            // Construct the message based on the result
            if ($successfulInserts > 0) {
                $message = "$successfulInserts vendors were added.";
            }
            if ($failedInserts > 0) {
                $message .= ($successfulInserts > 0 ? " " : "") . "$failedInserts vendors weren't added.";
            }
        } else {
            $message = 'Invalid data format.';
        }
    
        // Log the result
        log_message('debug', $message);
        
        // Return or output the result message as needed
        echo $message;
    }

    // Method for getting vendor
    public function get_mcm_vendors()
    {
        $data = $this->input->get();
        $response = $this->Mcm_model->get_all_vendors($data);
        echo json_encode($response);
    }

    // Method for getting vendor from db by id / edit vendor/ 
    public function getData($id) { 
        // Fetch the record from the database based on the provided ID
        $data = $this->Edit_model->get_records($id);
        // Check if data is retrieved
        if ($data) {
            // Send the data to AJAX in JSON format
            echo json_encode($data);
        } else {
            // If no data is found, send an error message
            echo json_encode(['error' => 'Record not found.']);
        }
    }

    // // Method for updating vendor
    public function update() {
        // Get the input data from the AJAX request
        $id = $this->input->post('id');
        $data = array(
            'Name' => $this->input->post('Name'),
            'Email' => $this->input->post('Email'),
            'Website' => $this->input->post('Website'),
            'GoogleAdManagerID' => $this->input->post('GoogleAdManagerID'),
            'Date' => $this->input->post('Date')
        );
        
        // Perform the update in your database
        $success = $this->Edit_model->update_record($id, $data);
        
        if ($success) {
            echo json_encode(['success' => 'Vendor information updated successfully', 'data' => $data]);
        } else {
            echo json_encode(['error' => 'Failed to update vendor information.']);
        }
    }


    // Method for deleting vendor 
    public function delete($id) {
        // Validate the ID
        if (!$id) {
            echo json_encode(['error' => 'Invalid vendor ID']);
            return;
        }
    
        // Delete the record from the database
        $delete_status = $this->Edit_model->delete_record($id);
    
        if ($delete_status) {
            echo json_encode(['success' => 'Vendor deleted successfully']);
        } else {
            echo json_encode(['error' => 'Failed to delete vendor']);
        }
    }

    // Method for getting the status from the database 
    public function get_status()
    {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
    
            // Fetch the current status
            $current_status = $this->Mcm_model->get_status($id);
    
            if ($current_status !== false) {
                // Successfully retrieved the status
                echo json_encode([
                    'status' => $current_status,
                    'success' => 'Status retrieved successfully.'
                ]);
            } else {
                // Failed to retrieve the status
                echo json_encode(['error' => 'Failed to retrieve status.']);
            }
        }
    }

    // // Method for updating status in database and in the ui 
    public function update_status() {
        // Check if the request is an AJAX request
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id'); 
            $status = $this->input->post('status'); 
    
            // Update status in the database
            $update = $this->Mcm_model->update_status($id, $status);
    
            if ($update) {
                echo json_encode(['success' => 'Status updated successfully.']);
            } else {
                echo json_encode(['error' => 'Failed to update status.']);
            }
        } else {
            show_error('No direct script access allowed');
        }
    }


     // Method for getting the partners from the database 
     public function get_demand()
     {
         // Check if the request is an AJAX request
         if ($this->input->is_ajax_request()) {
             $id = $this->input->post('id');
     
             // Fetch the current status
             $current_DemandPartners  = $this->Mcm_model->get_partners($id);
     
             if ($current_DemandPartners !== false) {
                 // Successfully retrieved the status
                 echo json_encode([
                     'DemandPartners' => $current_DemandPartners,
                     'success' => 'DemandPartners retrieved successfully.'
                 ]);
             } else {
                 // Failed to retrieve the status
                 echo json_encode(['error' => 'Failed to retrieve DemandPartners.']);
             }
         }
     }


    // Method for getting the partners from the database 
    public function update_partners() {
        $id = $this->input->post('id');
        $demandPartners = $this->input->post('DemandPartners');
    
        // Perform the update in your database
        $success = $this->Mcm_model->update_partners($id, $demandPartners);
    
        if ($success) {
            echo json_encode(['success' => 'DemandPartners updated successfully']);
        } else {
            echo json_encode(['error' => 'Failed to update DemandPartners.']);
        }
    }


    // Method for getting the Websites from the database 
    public function get_websites() {

        $websites = $this->Mcm_model->get_all_websites();
    
        if ($websites) {
            echo json_encode(['websites' => $websites]);
        } else {
            echo json_encode(['error' => 'No websites found.']);
        }
    }

    // Method for getting the updating from the database and in the ui  
    public function update_website() {
        $id = $this->input->post('id');
        $site = $this->input->post('site');
        $update = $this->Mcm_model->update_vendor_website($id, $site);
    
        if ($update) {
            echo json_encode(['success' => 'Website updated succesfully']);
        } else {
            echo json_encode(['error' => 'Failed to update website.']);
        }
    }
}




    
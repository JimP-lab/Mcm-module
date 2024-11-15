<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mcm extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mcm_model');
        $this->load->library('form_validation');
    }

    // Method for loading vendor
    public function mcm_vendor() {
    $this->load->view('Vendors');
    }

    // Method for inserting vendor
    public function import_mcm_vendors() {
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
    
                // calls the method of the model to insert the data into the database
                $insert_id = $this->Mcm_model->insert_mcm_vendor($data);
                if ($insert_id) {
                    $successfulInserts++;
                } else {
                    $failedInserts++;
                }
            }
    
            // Print success or error message
            if ($successfulInserts > 0 && $failedInserts == 0) {
                echo "Vendors imported successfully.";
            } elseif ($failedInserts > 0) {
                echo "Error importing vendors.";
            }
        }
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
        $data = $this->Mcm_model->get_records($id);
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
        $success = $this->Mcm_model->update_record($id, $data);
        
        if ($success) {
            echo json_encode(['success' => 'Vendor information updated successfully', 'data' => $data]);
        } else {
            echo json_encode(['error' => 'Failed to update vendor information.']);
        }
    }


    // Method for deleting vendor 
    public function delete($id) {
        // Delete the record from the database
        $delete_status = $this->Mcm_model->delete_record($id);
    
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

     // Fetch site data and return as JSON
 public function get_sites_ajax() {
    $sites = $this->Mcm_model->get_sites();
    echo json_encode($sites); 
}


// Method for saving the sites into database and in the ui 
public function save_site_selection_to_db() {
    $site_ids = $this->input->post('site_ids');
    $id = $this->input->post('id'); // Get vendor ID from POST data

    // Convert site_ids to a comma-separated string
    $site_ids = implode(', ', $site_ids);

    // Update the Site_name column in the ads_MCMVendor table
    $this->db->where('id', $id);
    $this->db->update('ads_MCMVendor', array('Site_id' => $site_ids));

    echo json_encode(['status' => 'success']);
}


// Fetching all the  selected sites from the database into the ui  
public function get_saved_sites_for_vendor() {
    $id = $this->input->get('id'); // Get vendor ID from the AJAX request

     // Get all available sites
     $all_sites = $this->Mcm_model->get_sites();

    // Get the saved site IDs for this vendor
    $selected_sites = $this->Mcm_model->get_saved_sites($id);

    // Return the data as a JSON response
    echo json_encode([
    'all_sites' => $all_sites,
    'selected_sites' => $selected_sites // Array of selected site IDs
    
    ]);
}


// Fetch Partners data and return as JSON
public function get_Partners_ajax() {
    $Partners = $this->Mcm_model->get_Partners();
    echo json_encode($Partners); 
}


// Saving Partners inside database and ui  
public function save_partner() {
    $partner_ids = $this->input->post('partner_ids'); // Get partner IDs from POST data
    $id = $this->input->post('id'); // Get vendor ID from POST data

    // Convert partner_ids to a comma-separated string
    $partner_ids_string = implode(', ', $partner_ids);

    // Call the model to update the Partners selection in the database
    $this->Mcm_model->update_Partners_selection($id, $partner_ids_string);

    echo json_encode(['status' => 'success']);
}
}
?>

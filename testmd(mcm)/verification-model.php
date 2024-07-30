<?php
class Verification extends CI_Controller {
    public function index() {
        $data['verifications'] = $this->Verification_model->get_verifications();
        $this->load->view('List', $data);
    }

    public function add() {
        $data['mcm'] = $this->Vendorsmodel->get_vendors();
        $data['Partners'] = $this->Partnersmodel->get_demand_partners();
        // $this->load->view('add_verification', $data);
    }

    // public function add_action() {
    //     $mcmVendorID = $this->input->post('mcmvendorid');
    //     $demandPartnerID = $this->input->post('demandpartnerid');

    //     if ($this->Verification_model->check_unique($mcmVendorID, $demandPartnerID)) {
    //         $data = array(
    //             'MCMVendorID' => $mcmVendorID,
    //             'DemandPartnerID' => $demandPartnerID,
    //             // 'Date' => $this->input->post('date'),
    //             // 'Status' => $this->input->post('status')
    //         );

    //         $this->Verification_model->insert_verification($data);
    //         redirect('mcmverification');
    //     } else {
    //         // Handle error: Entry already exists
    //         $this->session->set_flashdata('error', 'This verification already exists.');
    //         redirect('mcmverification/add');
    //     }
    // }
    
}
?>

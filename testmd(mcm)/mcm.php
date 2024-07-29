<?php
class MCMVerification extends CI_Controller {
    public function index() {
        $data['verifications'] = $this->MCMVerification_model->get_verifications();
        $this->load->view('list_verifications', $data);
    }

    public function add() {
        $data['vendors'] = $this->Vendor_model->get_vendors();
        $data['demand_partners'] = $this->DemandPartner_model->get_demand_partners();
        $this->load->view('add_verification', $data);
    }

    public function add_action() {
        $mcmVendorID = $this->input->post('mcmvendorid');
        $demandPartnerID = $this->input->post('demandpartnerid');

        if ($this->MCMVerification_model->check_unique($mcmVendorID, $demandPartnerID)) {
            $data = array(
                'MCMVendorID' => $mcmVendorID,
                'DemandPartnerID' => $demandPartnerID,
                'Date' => $this->input->post('date'),
                'Status' => $this->input->post('status')
            );

            $this->MCMVerification_model->insert_verification($data);
            redirect('mcmverification');
        } else {
            // Handle error: Entry already exists
            $this->session->set_flashdata('error', 'This verification already exists.');
            redirect('mcmverification/add');
        }
    }

    public function view($id) {
        $data['verification'] = $this->MCMVerification_model->get_verification($id);
        $this->load->view('view_verification', $data);
    }

    public function delete($id) {
        $this->MCMVerification_model->delete_verification($id);
        redirect('mcmverification');
    }
}
?>
add this to controller file
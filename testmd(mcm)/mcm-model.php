<?php
class MCMVerification_model extends CI_Model {
    public function get_verifications() {
        $query = $this->db->get('tblads_MCMVerification');
        return $query->result_array();
    }

    public function check_unique($mcmVendorID, $demandPartnerID) {
        $this->db->where('MCMVendorID', $mcmVendorID);
        $this->db->where('DemandPartnerID', $demandPartnerID);
        $query = $this->db->get('tblads_MCMVerification');

        return $query->num_rows() == 0;
    }

    public function insert_verification($data) {
        return $this->db->insert('tblads_MCMVerification', $data);
    }

    public function get_verification($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('tblads_MCMVerification');
        return $query->row_array();
    }

    public function delete_verification($id) {
        $this->db->where('ID', $id);
        $this->db->delete('tblads_MCMVerification');
    }
}
?>
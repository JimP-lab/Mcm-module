<?php
class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert_user($user_data) {
        return $this->db->insert('users', $user_data);
    }

    public function verify_email($verification_code) {
        $this->db->where('verification_code', $verification_code);
        $this->db->where('is_verified', 0);
        $query = $this->db->get('users');

        if($query->num_rows() > 0) {
            $this->db->set('is_verified', 1);
            $this->db->where('verification_code', $verification_code);
            return $this->db->update('users');
        } else {
            return false;
        }
    }
}
?>

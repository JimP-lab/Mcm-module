<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mcmmodel extends App_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id != '') {
            $this->db->where('ID', $id);
            return $this->db->get(db_prefix() . 'mcm')->row();
        }

        return $this->db->get(db_prefix() . 'mcm')->result_array();
    }
}
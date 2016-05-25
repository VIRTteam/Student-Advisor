<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_clan($ime = FALSE)
    {
        if ($ime === FALSE)
        {
            $query = $this->db->get('clan');
            return $query->result_array();
        }

        $query = $this->db->get_where('clan', array('ime' => $ime));
        return $query->row_array();
    }
}
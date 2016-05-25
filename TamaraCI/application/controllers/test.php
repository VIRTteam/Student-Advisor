<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function index()
    {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM clan");

       
        $value = $query->num_rows();
        $data['br'] = $value;
        $this->load->view('testV', $data);
        
    }
}
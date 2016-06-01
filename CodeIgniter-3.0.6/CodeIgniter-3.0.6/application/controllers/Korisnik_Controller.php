<?php
/**
 * Created by PhpStorm.
 * User: Vlada
 * Date: 5/25/2016
 * Time: 6:49 PM
 */
class Korisnik_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('korisnik_model');
        $this->load->helper('url_helper');
    }
}
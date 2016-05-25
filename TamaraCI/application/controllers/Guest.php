<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller
{


    public function index()
    {
        $header_data['naslov']="clanRelja";
        $header_data['selectedText']="";
        $this->load->view('templates/header', $header_data);
        $this->load->view('templates/navbar_guest');
        $this->load->view("guest/clan_profil");
        $this->load->view('templates/footer');

    }
    public function clan_profil()
    {
        $header_data['naslov']="clanRelja";
        $header_data['selectedText']="";
        $this->load->view('templates/header', $header_data);
        $this->load->view('templates/navbar_guest');
        $this->load->view("guest/clan_profil");
        $this->load->view('templates/footer');
    }
    public function clan_opis($selectedText="")
    {
        $header_data['naslov']="clanRelja";
        $header_data['selectedText']="";
        $this->load->view('templates/header', $header_data);
        $this->load->view('templates/navbar_guest');
        $this->load->view("guest/clan_opis");
        $this->load->view('templates/footer');
    }
    public function get_clan_opis()
    {
        $this->load->view("guest/clan_opis");
    }
    public function get_clan_profil()
    {
        $this->load->view("guest/clan_profil");
    }
}
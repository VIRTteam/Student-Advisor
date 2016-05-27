<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guest_model');
    }

    public function index()
    {
        $data['clan'] = $this->Guest_model->get_clan();
        $data['polozio'] = $this->Guest_model->get_Polozio_clan($data['clan']['idClan']);
        $data['komentar'] = $this->Guest_model->get_Komentar_clan($data['clan']['idClan']);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_guest');
        $this->load->view("guest/clan_profil", $data);
        $this->load->view('templates/footer');

    }

    public function get_clan_opis($id=FALSE, $sta="oKorisniku")
    {
        $data['clan'] = $this->Guest_model->get_clan($id);
        $data['polozio'] = $this->Guest_model->get_Polozio_clan($id);
        $data['komentar'] = $this->Guest_model->get_Komentar_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("guest/clan_opis", $data);
    }
    public function get_clan_profil($id=FALSE)
    {
        $data['clan'] = $this->Guest_model->get_clan($id);
        $data['polozio'] = $this->Guest_model->get_Polozio_clan($id);
        $data['komentar'] = $this->Guest_model->get_Komentar_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("guest/clan_profil", $data);
    }
    public function get_clan_slika($id=FALSE)
    {
        $data['clan'] = $this->Guest_model->get_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("guest/clan_slika", $data);
    }
    public function get_podkomentar($id=1)
    {
        $data['komentarClan'] = $this->Guest_model->get_clan_komentar($id);
        $data['komentarKurs'] = $this->Guest_model->get_kurs_komentar($id);
        $data['podkomentar'] = $this->Guest_model->get_podkomentar($id);
        $this->load->view('guest/podkomentari', $data);
    }
    public function get_kurs_profil($id=FALSE)
    {
        $data['kurs'] = $this->Guest_model->get_kurs($id);
        $data['polozio'] = $this->Guest_model->get_Polozio_kurs($id);
        $data['komentar'] = $this->Guest_model->get_Komentar_kurs($id);
        $this->load->view("guest/kurs_profil", $data);
    }
    public function get_kurs_opis($id=FALSE)
    {
        $data['kurs'] = $this->Guest_model->get_kurs($id);
        $data['predavac'] = $this->Guest_model->get_kurs_predavac($id);
        $this->load->view("guest/kurs_opis", $data);
    }
    
}
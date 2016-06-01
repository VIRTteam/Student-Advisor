<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['clan'] = $this->User_model->get_clan();
        $data['polozio'] = $this->User_model->get_Polozio_clan($data['clan']['idClan']);
        $data['komentar'] = $this->User_model->get_Komentar_clan($data['clan']['idClan']);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_user', $data);
        $this->load->view("user/clan_profil", $data);
        $this->load->view('templates/footer');

    }

    public function get_clan_opis($id=FALSE, $sta="oKorisniku")
    {

        $data['clan'] = $this->User_model->get_clan($id);
        $data['polozio'] = $this->User_model->get_Polozio_clan($id);
        $data['komentar'] = $this->User_model->get_Komentar_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("user/clan_opis", $data);

    }
    public function get_clan_profil($id=FALSE)
    {
        $data['clan'] = $this->User_model->get_clan($id);
        $data['polozio'] = $this->User_model->get_Polozio_clan($id);
        $data['komentar'] = $this->User_model->get_Komentar_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("user/clan_profil", $data);
    }
    public function get_clan_slika($id=FALSE)
    {
        $data['clan'] = $this->User_model->get_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("user/clan_slika", $data);
    }
    public function get_clan_podkomentari()
    {
        $this->load->view('user/podkomentari');
    }

    public function get_clan_poruke($id=FALSE)
    {
        $data['clan'] = $this->User_model->get_clan($id);
        $data['polozio'] = $this->User_model->get_Polozio_clan($id);
        $data['komentar'] = $this->User_model->get_Komentar_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view('user/clan_poruke',$data);
    }
    /**
     * @param bool $id
     * @param bool $id_kurs

    public function get_kurs_profil($id=FALSE, $id_kurs=FALSE)
    {
        $data['clan'] = $this->User_model->get_clan($id);
        $data['kurs']=$this->User_model->get_kurs($id_kurs);
        $data['anoniman']=0;
        $this->load->view('user/kurs_profil');
    }

    */

}
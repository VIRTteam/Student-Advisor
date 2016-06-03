<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moderator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Moderator_model');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION["username"]))
            exit();
        $this->myID=$this->Moderator_model->get_clan_username($_SESSION["username"]);
        $this->load->helper('url');
    }
    
    
    public function get_mojprofil_profil_start()
    {
        $data['clan'] = $this->Moderator_model->get_clan($this->myID);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($this->myID);
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($this->myID, $this->myID);

        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_user',$data);
        $this->load->view("moderator/mojprofil_profil", $data);
        $this->load->view('templates/footer');
    }
    public function index()
    {

        $data['clan'] = $this->Moderator_model->get_clan();
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($data['clan']['idClan']);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($data['clan']['idClan']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_moderator');
        $this->load->view("moderator/mojprofil_profil", $data);
        $this->load->view('templates/footer');

    }

    public function get_clan_opis($id=FALSE, $sta="oKorisniku")
    {

        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("moderator/clan_opis", $data);

    }
    public function get_clan_profil($id=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($id, $this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("moderator/clan_profil", $data);
    }


    public function get_mojprofil_opis($id=FALSE, $sta="oKorisniku")
    {

        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view("moderator/mojprofil_opis", $data);

    }
    public function get_mojprofil_profil($id=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($id);

        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view("moderator/mojprofil_profil", $data);
    }

    public function get_clan_slika($id=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("moderator/clan_slika", $data);
    }
    public function get_clan_poruke($id=FALSE, $idSaKim=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['poslednjePoruke'] = $this->Moderator_model->get_Poslednje_Poruke($id);
        $data['poruke'] = $this->Moderator_model->get_Poruke($id, $idSaKim);

        $this->load->view('moderator/clan_poruke',$data);
    }

    public function get_kurs_profil($id=FALSE)
    {
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio1_kurs($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_kurs($id);


        $this->load->view("moderator/kurs_profil", $data);
    }

    public function get_kurs_opis($id=FALSE)
    {
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['predavac'] = $this->Moderator_model->get_kurs_predavac($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio1_kurs($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_kurs($id);

        $this->load->view("moderator/kurs_opis", $data);
    }

    public function get_kurs_komentarisi($id=FALSE)
    {
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_kurs($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_kurs($id);

        $this->load->view("moderator/kurs_komentar",$data);
    }
    public function get_predavac_profil($id=FALSE)
    {
        $data['predavac'] = $this->Moderator_model->get_predavac($id);
        $data['predaje'] = $this->Moderator_model->get_predaje_kurs($id);
        $data['komentar'] = $this->Moderator_model->get_komentar_predavac($id);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("moderator/predavac_profil", $data);
    }
    public function get_predavac_opis($id=FALSE)
    {
        $data['predavac'] = $this->Moderator_model->get_predavac($id);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("moderator/predavac_opis", $data);
    }
    public function get_podkomentar($id=1)
    {
        $data['komentarClan'] = $this->Moderator_model->get_clan_komentar($id);
        $data['komentarKurs'] = $this->Moderator_model->get_kurs_komentar($id);
        $data['komentarOcena'] = $this->Moderator_model->get_kurs_ocena($data['komentarClan']['idClan'],$data['komentarKurs']['idkurs']);
        $data['podkomentar'] = $this->Moderator_model->get_podkomentar($id);
        $this->load->view('moderator/podkomentari', $data);
    }
    public function get_podkomentar_bez_komentara($id=1)
    {
        $data['komentarClan'] = $this->Moderator_model->get_clan_komentar($id);
        $data['komentarKurs'] = $this->Moderator_model->get_kurs_komentar($id);
        $data['komentarOcena'] = $this->Moderator_model->get_kurs_ocena($data['komentarClan']['idClan'],$data['komentarKurs']['idkurs']);
        $data['podkomentar'] = $this->Moderator_model->get_podkomentar($id);
        $this->load->view('moderator/podkomentari', $data);
    }

    public function get_pretraga_clan($id=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_pretraga_clan($id);
        $this->load->view("moderator/pretraga_clan", $data);
    }
    public function get_pretraga_kurs($id=FALSE)
    {
        $data['kurs'] = $this->Moderator_model->get_pretraga_kurs($id);
        $this->load->view("moderator/pretraga_kurs", $data);
    }
    public function get_pretraga_predavac($id=FALSE)
    {
        $data['predavac'] = $this->Moderator_model->get_pretraga_predavac($id);
        $this->load->view("moderator/pretraga_predavac", $data);
    }

    /**
     * @param bool $id
     * @param bool $id_kurs

    public function get_kurs_profil($id=FALSE, $id_kurs=FALSE)
    {
    $data['clan'] = $this->Moderator_model->get_clan($id);
    $data['kurs']=$this->Moderator_model->get_kurs($id_kurs);
    $data['anoniman']=0;
    $this->load->view('Moderator/kurs_profil');
    }

     */

}
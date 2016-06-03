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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            session_commit();
        }
        if(!isset($_SESSION["username"])) {
            $data['naslov'] = 'registracija';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_guest');
            $this->load->view("guest/registracija", $data);
            $this->load->view('templates/footer');
<<<<<<< Updated upstream

        }
        else
        {
            $this->load->model('User_model');
            $id=$this->User_model->get_clan_username($_SESSION["username"]);
            $data['clan'] = $this->Guest_model->get_clan($id);
            $data['polozio'] = $this->User_model->get_Polozio_clan($id);
            $data['komentar'] = $this->User_model->get_Komentar_clan($id, $id);
            $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
            $data['banovanje']= $this->User_model->proveri_banovanje($data['clan']['idClan']);
            if($data['clan']['tip']=='c') {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_user', $data);
                $this->load->view("user/mojprofil_profil", $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar_moderator', $data);
                $this->load->view("moderator/mojprofil_profil", $data);
                $this->load->view('templates/footer');
            }
        }
=======

        }
        else
        {
            $this->load->model('User_model');
            $id=$this->User_model->get_clan_username($_SESSION["username"]);
            $data['clan'] = $this->User_model->get_clan($id);
            $data['polozio'] = $this->User_model->get_Polozio_clan($id);
            $data['komentar'] = $this->User_model->get_Komentar_clan($id, $id);

            $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_user', $data);
            $this->load->view("user/mojprofil_profil", $data);
            $this->load->view('templates/footer');

        }
>>>>>>> Stashed changes
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
    public function get_predavac_profil($id=FALSE)
    {
        $data['predavac'] = $this->Guest_model->get_predavac($id);
        $data['predaje'] = $this->Guest_model->get_predaje_kurs($id);
        $data['komentar'] = $this->Guest_model->get_komentar_predavac($id);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("guest/predavac_profil", $data);
    }
    public function get_predavac_opis($id=FALSE)
    {
        $data['predavac'] = $this->Guest_model->get_predavac($id);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("guest/predavac_opis", $data);
    }

    public function get_pretraga_clan($id=FALSE)
    {
        $data['clan'] = $this->Guest_model->get_pretraga_clan($id);
        $this->load->view("guest/pretraga_clan", $data);
    }
    public function get_pretraga_kurs($id=FALSE)
    {
        $data['kurs'] = $this->Guest_model->get_pretraga_kurs($id);
        $this->load->view("guest/pretraga_kurs", $data);
    }
    public function get_pretraga_predavac($id=FALSE)
    {
        $data['predavac'] = $this->Guest_model->get_pretraga_predavac($id);
        $this->load->view("guest/pretraga_predavac", $data);
    }


    public function provera_username(){
        $vr=$this->Guest_model->provera_username($_POST['username']);
        if(sizeof($vr)>0)
            echo 'postoji';
        else
            echo 'ne_postoji';
    }
    public function registracija_obrada(){
        $date['username']=$_POST['username'];
        $date['password']=$_POST['password'];
        $date['ime']=$_POST['ime'];
        $date['prezime']=$_POST['prezime'];
        $date['datumRodjenja']=$_POST['datum_rodjenja'];
        $date['godinaUpisa']=$_POST['godina_upisa'];
        $date['email']=$_POST['email'];
        $date['smer']=$_POST['smer'];
        $date['pol']=($_POST['pol']=='muski')?'m':'z';
        $this->Guest_model->registracija($date);
        $data['naslov']='login';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_guest');
        $this->load->view("guest/logovanje", $data);
        $this->load->view('templates/footer');
    }


    public  function logovanje()
    {
        $data['naslov']='Logovanje';
        $this->load->view("guest/login", $data);
    }
    public function provera_username_password(){
<<<<<<< Updated upstream
=======
        // echo $_POST['username'];
>>>>>>> Stashed changes
        $vr=$this->Guest_model->provera_username_password($_POST['username'], $_POST['password']);
        if(sizeof($vr)>0)
            echo 'postoji';
        else
            echo 'ne_postoji';
    }
    public  function logovanje_obrada()
    {
        $data['naslov']='Logovanje';
        $vr=$this->Guest_model->provera_username_password($_POST['username'], $_POST['password']);
<<<<<<< Updated upstream
        if(sizeof($vr)>0) {
            if (session_status() == PHP_SESSION_NONE)
                session_start();

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['pass'] = $_POST['password'];
            session_commit();

            $la = $this->Guest_model->get_clan_from_username($_SESSION['username']);
            $la2 = $this->Guest_model->get_clan_logovanje($la['idClan']);
            echo $la2;
        }
    }

    public function registracija(){
        if (session_status() == PHP_SESSION_NONE)
=======
        if(sizeof($vr)>0)
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['pass'] = $_POST['password'];
        }
        $la=$this->Guest_model->get_clan_from_username($_SESSION['username'] );
        echo $la['tip'];
    }

    public function registracija(){
        if (session_status() != PHP_SESSION_NONE)
>>>>>>> Stashed changes
            session_start();
        session_unset();
        session_commit();
        $data['naslov']='login';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_guest');
        $this->load->view("guest/registracija", $data);
        $this->load->view('templates/footer');
    }
}
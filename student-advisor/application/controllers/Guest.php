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



    public function get_podkomentar($id)
    {
        $data['postoji']='d';
        $data['komentar'] = $this->Guest_model->get_komentar($id);

        $data['komentarKurs'] = $this->Guest_model->get_kurs($data['komentar']['idKurs']);
        $data['komentarClan'] = $this->Guest_model->get_clan($data['komentar']['idClan']);
        $data['komentarOcena'] = $this->Guest_model->get_kurs_ocena($data['komentar']['idClan'], $data['komentar']['idKurs']);
        $data['tip']='k';
        $data['podkomentar'] = $this->Guest_model->get_podkomentar($id);
        $this->load->view('guest/podkomentari', $data);
    }
    public function get_podkomentar_bez_komentara($idKurs,$idClan)
    {
        $id=$this->Guest_model->find_komentar($idKurs, $idClan);
        $data['komentarKurs'] = $this->Guest_model->getx_kurs($idKurs);
        $data['komentarClan'] = $this->Guest_model->get_clan($idClan);
        $data['komentarOcena'] = $this->Guest_model->get_kurs_ocena($idClan, $idKurs);
        $data['tip']='o';
        if($id=='-1') {
            $data['postoji']='n';
            $data['komentar']['anonimno']='n';
        }
        else {
            $data['postoji']='d';
            $data['komentar'] = $this->Guest_model->get_komentar($id);
            $data['podkomentar'] = $this->Guest_model->get_podkomentar($id);

        }
        $this->load->view('guest/podkomentari', $data);
    }

    public function get_kurs_ocene($idKurs)
    {
        $data['kurs'] = $this->Guest_model->get_kurs($idKurs);
        $data['ocenio'] = $this->Guest_model->get_Ocenio_kurs($idKurs);
        $this->load->view('guest/kurs_ocene', $data);
    }

    public function get_kurs_profil($id=FALSE)
    {
        $data['kurs'] = $this->Guest_model->get_kurs($id);
        $data['polozio'] = $this->Guest_model->get_Polozio_kurs($id);
        $data['komentar'] = $this->Guest_model->get_Komentar_kurs($id);
        $data['ocenio'] = $this->Guest_model->get_Ocenio_kurs($id);
        $this->load->view("guest/kurs_profil", $data);
    }
    public function get_kurs_opis($id=FALSE)
    {
        $data['kurs'] = $this->Guest_model->get_kurs($id);
        $data['predavac'] = $this->Guest_model->get_kurs_predavac($id);
        $data['ocenio'] = $this->Guest_model->get_Ocenio_kurs($id);
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
        $data['username']=$_POST['username'];
        $data['password']=$_POST['password'];
        $data['ime']=$_POST['ime'];
        $data['prezime']=$_POST['prezime'];
        $data['datumRodjenja']=$_POST['datum_rodjenja'];
        $data['godinaUpisa']=$_POST['godina_upisa'];
        $data['email']=$_POST['email'];
        $data['smer']=$_POST['smer'];
        $data['pol']=($_POST['pol']=='muski')?'m':'z';
        $this->Guest_model->registracija($data);
        $data1['naslov']='log in';
        $this->load->view('templates/header', $data1);
        $this->load->view('templates/navbar_guest');
        $this->load->view("guest/login");
        $this->load->view('templates/footer');
    }


    public  function logovanje()
    {
        $data['naslov']='Logovanje';
        $this->load->view("guest/login", $data);
    }
    public  function povratak_sifre()
    {
        $data['naslov']='Povratak šifre';
        $this->load->view("guest/povratak_sifre", $data);
    }
    public function provera_username_password(){
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
    public function registrovanje(){
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        session_unset();
        session_commit();
        $data['naslov']='registracija';
        $this->load->view("guest/registracija", $data);
    }
    public function registracija()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        session_unset();
        session_commit();
        $data['naslov']='login';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_guest');
        $this->load->view("guest/registracija", $data);
        $this->load->view('templates/footer');
    }


    public function povratak_sifre_obradi()
    {
        $novaSifra=$this->Guest_model->povratak_sifre_obradi($_POST['username'], $_POST['email']);
        if($novaSifra!="0") {
            $name = "email poruka";
            $email_address = $_POST['email'];
            $message = $novaSifra;

            $to = 'pomoc@hotmail.com'; //$pred['email'];
            $email_subject = "Website Contact Form:  $name";
            $email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
            $headers = "From: noreply@studentadvisor.com\n";
            $headers .= "Reply-To: $email_address";
            //     mail($to,$email_subject,$email_body,$headers);
            $data['naslov']='Logovanje';
            $this->load->view("guest/login", $data);
        }
        else
            echo $novaSifra;
    }
}
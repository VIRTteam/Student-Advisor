<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_toggle extends CI_Controller
{
    private $myID;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model_toggle');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION["username"]))
            exit();
        $this->myID=$this->User_model_toggle->get_clan_username($_SESSION["username"]);
        $this->load->helper('url');
    }
    public function obradi_podrzavanje()
    {
        $pom['idClan']=$this->myID;
        $pom['idKom']=$_POST["idKom"];
        $pom['tip']=$_POST["tip"];
        $data=$this->User_model_toggle->obradi_podrzavanje($pom);
        echo reset($data['like']).' '.reset($data['unlike']);
    }
<<<<<<< Updated upstream
    public function obrisi_komentar()
    {
        $idKom=$_POST['idKom'];
        $this->User_model_toggle->obrisi_komentar($idKom);
    }
    public function obrisi_polozeni_ispit()
    {
        $idKom=$_POST['idKurs'];
        $idClan=$_POST['idClan'];
        $this->User_model_toggle->obrisi_polozeni_ispit($idKom, $idClan);
    }
    public function izmeni_komentar($idKom, $tekst)
    {
        $data['idKom']=$_POST["idKom"];
        $data['tekst']=$_POST["tekst"];
        $data['komentarIzmena']=$this->User_model_toggle->izmeni_komentar($data['idKom'],$data['tekst']);
    }
    public function dohvati_komentar()
    {
        $idKom=$_POST["idKom"];
        $data['komentarIzmena']=$this->User_model_toggle->dohvati_komentar($idKom);
        $this->load->view("templates/izmena_komentara", $data);
    }
    public function dohvati_unapredjivanje()
    {
        $idKom=$_POST["idClan"];
        $data['unapredjivanje']=$this->User_model_toggle->dohvati_unapredjivanje($idKom);
        $this->load->view("templates/unapredjivanjeModerator", $data);
    }
    public function izmeni_unapredjivanje()
    {
        $idClan=$_POST["idClan"];
        $tekst=$_POST["tekst"];
        $this->User_model_toggle->izmeni_unapredjivanje($idClan,$tekst, $this->myID);
    }

    public function dohvati_derangiranje()
    {
        $idKom=$_POST["idClan"];
        $data['derangiranje']=$this->User_model_toggle->dohvati_derangiranje($idKom);
        $this->load->view("templates/derangiranjeModerator", $data);
    }
    public function izmeni_derangiranje()
    {
        $idClan=$_POST["idClan"];
        $tekst=$_POST["tekst"];
        $this->User_model_toggle->izmeni_derangiranje($idClan,$tekst, $this->myID);
    }

    public function dohvati_banovanje()
    {
        $idKom=$_POST["idClan"];
        $data['banovanje']=$this->User_model_toggle->dohvati_banovanje($idKom);
        $this->load->view("templates/banovanje", $data);
    }
    public function izmeni_banovanje()
    {
        $idClan=$_POST["idClan"];
        $tekst=$_POST["tekst"];
        $message =$_POST['idClan'];
        echo "<script type='text/javascript'>alert('$message');</script>";
        $this->User_model_toggle->izmeni_banovanje($idClan,$tekst);
    }
=======
>>>>>>> Stashed changes
}

?>
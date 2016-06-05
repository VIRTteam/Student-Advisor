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
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($id, $this->myID);
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

        $data['clan'] = $this->Moderator_model->get_clan($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view("moderator/mojprofil_opis", $data);

    }
    public function get_mojprofil_profil($id=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($id, $this->myID);

        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view("moderator/mojprofil_profil", $data);
    }

    public function get_clan_slika($id=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("moderator/clan_slika", $data);
    }


    public function get_clan_poruke_posalji($idSaKim)
    {
        $data['tekst']= $_POST['tekst'];
        $this->Moderator_model->put_message($this->myID,$idSaKim,$data['tekst']);

        get_clan_poruke($idSaKim);

    }
    public function get_clan_poruke($idSaKim=FALSE)
    {

        $data['clan'] = $this->Moderator_model->get_clan_from_username($_SESSION['username'] );
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['saKim']=$this->Moderator_model->get_clan($idSaKim);
        $data['poslednjePoruke'] = $this->Moderator_model->get_Poslednje_Poruke($data['clan']['idClan']);
        $data['poruke'] = $this->Moderator_model->get_Poruke($data['clan']['idClan'], $idSaKim);

        $this->load->view('moderator/clan_poruke',$data);
    }
    public function get_kurs_profil($id=FALSE)
    {
        $data['myID']=$this->myID;
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_kurs($id);
        $data['ocenio'] = $this->Moderator_model->get_Ocenio_kurs($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_kurs($id,$this->myID);


        $this->load->view("moderator/kurs_profil", $data);
    }

    public function get_kurs_opis($id=FALSE)
    {
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['predavac'] = $this->Moderator_model->get_kurs_predavac($id);
        $data['ocenio'] = $this->Moderator_model->get_Ocenio_kurs($id);

        $this->load->view("moderator/kurs_opis", $data);
    }

    public function get_kurs_komentarisi($id=FALSE)
    {
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_kurs_zvezdice($id, $this->myID);
        $data['clan']=$this->Moderator_model->get_clan($this->myID);
        $this->load->view("moderator/kurs_komentar",$data);
    }
    public function get_predavac_profil($id=FALSE)
    {
        $data['myID']=$this->myID;
        $data['predavac'] = $this->Moderator_model->get_predavac($id);
        $data['predaje'] = $this->Moderator_model->get_predaje_kurs($id);
        $data['komentar'] = $this->Moderator_model->get_komentar_predavac($id,$this->myID);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("moderator/predavac_profil", $data);
    }
    public function get_predavac_opis($id=FALSE)
    {
        $data['predavac'] = $this->Moderator_model->get_predavac($id);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("moderator/predavac_opis", $data);
    }



    public function get_podkomentar($id)
    {
        $data['myID'] = $this->myID;
        $data['postoji']='d';
        $data['komentar'] = $this->Moderator_model->get_komentar($id, $this->myID);

        $data['komentarKurs'] = $this->Moderator_model->get_kurs($data['komentar']['idKurs']);
        $data['komentarClan'] = $this->Moderator_model->get_clan($data['komentar']['idClan']);
        $data['komentarOcena'] = $this->Moderator_model->get_kurs_ocena($data['komentar']['idClan'], $data['komentar']['idKurs']);

        $data['podkomentar'] = $this->Moderator_model->get_podkomentar($id);
        $this->load->view('moderator/podkomentari', $data);
    }
    public function get_podkomentar_bez_komentara($idKurs,$idClan)
    {
        $data['myID'] = $this->myID;
        $id=$this->Moderator_model->find_komentar($idKurs, $idClan);
        $data['komentarKurs'] = $this->Moderator_model->get_kurs($idKurs);
        $data['komentarClan'] = $this->Moderator_model->get_clan($idClan);
        $data['komentarOcena'] = $this->Moderator_model->get_kurs_ocena($idClan, $idKurs);
        if($id=='-1') {
            $data['postoji']='n';

        }
        else {
            $data['postoji']='d';
            $data['komentar'] = $this->Moderator_model->get_komentar($id, $this->myID);
            $data['podkomentar'] = $this->Moderator_model->get_podkomentar($id);

        }
        $this->load->view('moderator/podkomentari', $data);
    }

    public function dodaj_podkomentar()
    {
        $data['myID'] = $this->myID;
        $this->Moderator_model->dodaj_podkomentar($_POST['comment'], $_POST['idKom'],$this->myID);
        $data['postoji']='d';
        $data['komentar'] = $this->Moderator_model->get_komentar($_POST['idKom'], $this->myID);

        $data['komentarKurs'] = $this->Moderator_model->get_kurs($data['komentar']['idKurs']);
        $data['komentarClan'] = $this->Moderator_model->get_clan($data['komentar']['idClan']);
        $data['komentarOcena'] = $this->Moderator_model->get_kurs_ocena($data['komentar']['idClan'], $data['komentar']['idKurs']);

        $data['podkomentar'] = $this->Moderator_model->get_podkomentar($_POST['idKom']);
        $this->load->view('moderator/podkomentari', $data);
    }



    public function get_pretraga_clan($id=FALSE)
    {
        $data['myID']=$this->myID;
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

    //ISIVESA_BEGIN
    public function dohvati_novi_kurs()
    {
        $this->load->view("templates/unos_kursa");
    }

    public function put_novi_kurs()
    {
        $ime=$_POST['ime'];
        $opis=$_POST['opis'];
        $slika=$_POST['slika'];

        $this->Moderator_model->put_novi_kurs($ime,$opis,$slika);
    }
    public function dohvati_novi_predavac()
    {
        $this->load->view("templates/unos_predavaca");
    }
    public function put_novi_predavac()
    {
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $email=$_POST['email'];
        $katedra=$_POST['katedra'];
        $godinaZaposlenja=$_POST['godinaZaposlenja'];
        $opis=$_POST['opis'];
        $zvanje=$_POST['zvanje'];
        $slika=$_POST['slika'];

        $id=$this->Moderator_model->put_novi_predavac($ime,$prezime,$email,$katedra,$godinaZaposlenja,$opis,$zvanje,$slika);
        return $id;
    }

    public function dohvati_predaje_na()
    {
        $data['idPred']=$_POST['idPred'];
        $data['kursevi']=$this->Moderator_model->svi_kursevi();
        $this->load->view("templates/unos_kurseva_predavaca",$data);
    }

    public function put_predaje_na($kursevi, $idPred)
    {
//       $kursevi=$_GET['kursevi'];
//       $idPred=$_GET['idPred'];
       // $datumPoc=$_POST['datumPoc'];
        //$kursevi=explode("-",$kursevi);


//    foreach($kursevi->ni as $kurs) {
                $this->Moderator_model->put_predaje_na($kursevi, $idPred);//, $datumPoc);
//        }
        
    }
   
    public function dohvati_edit_predavac()
    {
        $idPred=$_POST['idPred'];
        $data['predavac']= $this->Moderator_model->get_predavac($idPred);
        
        $this->load->view("templates/izmena_predavaca",$data);
    }
    public function edit_predavac()
    {
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $email=$_POST['email'];
        $katedra=$_POST['katedra'];
        $godinaZaposlenja=$_POST['godinaZaposlenja'];
        $opis=$_POST['opis'];
        $zvanje=$_POST['zvanje'];
        $slika=$_POST['slika'];
        $idPred=$_POST['idPred'];
        
        $id=$this->Moderator_model->edit_predavac($ime,$prezime,$email,$katedra,$godinaZaposlenja,$opis,$zvanje,$slika,$idPred);
    }
    
    public function dohvati_edit_kurs($idKurs)
    {
       // $idKurs=$_POST['idkurs'];
        $data['kurs']= $this->Moderator_model->get_kurs($idKurs);

        $this->load->view("templates/izmena_kursa",$data);
    }
    
    public function edit_kurs()
    {
        $ime=$_POST['ime'];
        $opis=$_POST['opis'];
        $slika=$_POST['slika'];
        $idKurs= $_POST['idKurs'];
        
        $this->Moderator_model->edit_kurs($ime,$opis,$slika, $idKurs);
    }
    
    //ISIVESA_END


    //ISIVESA_END

    //tamara
    public function put_komentar($idKurs)
    {
        $comment=$_POST['comment'];
        $anonim= $_POST['anonim'];

        $this->Moderator_model->put_comment($this->myID , $idKurs , $comment, $anonim);
    }
}
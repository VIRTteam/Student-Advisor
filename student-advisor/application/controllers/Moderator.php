<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moderator extends CI_Controller
{
    private $myID;
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

    public function index()
    {
        $data['clan'] = $this->Moderator_model->get_clan($this->myID);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($this->myID);
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($this->myID, $this->myID);
        $data['banovanje']= $this->Moderator_model->proveri_banovanje($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_moderator',$data);
        $this->load->view("moderator/mojprofil_profil", $data);
        $this->load->view('templates/footer');
    }
    public function get_mojprofil_profil_start()
    {
        $data['clan'] = $this->Moderator_model->get_clan($this->myID);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($this->myID);
        $data['komentar'] = $this->Moderator_model->get_Komentar_clan($this->myID, $this->myID);
        $data['banovanje']= $this->Moderator_model->proveri_banovanje($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_moderator',$data);
        $this->load->view("moderator/mojprofil_profil", $data);
        $this->load->view('templates/footer');
    }

    public function get_clan_opis($id=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_clan($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("moderator/clan_opis", $data);

    }
    public function get_clan_profil($id=FALSE)
    {
        if($id==$this->myID)
        {
            $data['clan'] = $this->Moderator_model->get_clan($id);
            $data['polozio'] = $this->Moderator_model->get_Polozio_clan($id);
            $data['komentar'] = $this->Moderator_model->get_Komentar_clan($id, $this->myID);
            $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

            $this->load->view("moderator/mojprofil_profil", $data);
        }
        else {
            $data['clan'] = $this->Moderator_model->get_clan($id);
            $data['polozio'] = $this->Moderator_model->get_Polozio_clan($id);
            $data['komentar'] = $this->Moderator_model->get_Komentar_clan_neanonimno($id, $this->myID);
            $data['naslov'] = $data['clan']['ime'] . ' ' . $data['clan']['prezime'];
            $data['myID'] = $this->myID;
            $this->load->view("moderator/clan_profil", $data);
        }
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
        $data['clan'] = $this->Moderator_model->get_clan_from_username($_SESSION['username'] );
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['saKim']=$this->Moderator_model->get_clan($idSaKim);
        $data['poslednjePoruke'] = $this->Moderator_model->get_Poslednje_Poruke($data['clan']['idClan']);
        $data['poruke'] = $this->Moderator_model->get_Poruke($data['clan']['idClan'], $idSaKim);
        $this->load->view('moderator/clan_poruke',$data);
    }
    public function get_clan_poruke($idSaKim=FALSE)
    {
        $data['clan'] = $this->Moderator_model->get_clan_from_username($_SESSION['username'] );
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['poslednjePoruke'] = $this->Moderator_model->get_Poslednje_Poruke($data['clan']['idClan']);
        if($idSaKim==FALSE and count($data['poslednjePoruke'])>0)
            $idSaKim=$data['poslednjePoruke'][0]['idClan'];
        if($idSaKim!=FALSE)
            $data['saKim']=$this->Moderator_model->get_clan($idSaKim);
        else
            $data['saKim']=FALSE;
        $data['poruke'] = $this->Moderator_model->get_Poruke($data['clan']['idClan'], $idSaKim);
        $this->load->view('moderator/clan_poruke',$data);
    }
    public function get_kurs_profil($id)
    {
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_kurs($id);
        $data['ocenio'] = $this->Moderator_model->get_Ocenio_kurs($id);
        $data['komentar'] = $this->Moderator_model->get_Komentar_kurs($id,$this->myID);
        $data['sme_da_komentarise']=$this->Moderator_model->sme_da_komentarise($id,$this->myID);
        $data['myID']=$this->myID;

        $this->load->view("moderator/kurs_profil", $data);
    }

    public function get_kurs_opis($id=FALSE)
    {
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['predavac'] = $this->Moderator_model->get_kurs_predavac($id);
        $data['ocenio'] = $this->Moderator_model->get_Ocenio_kurs($id);
        $data['sme_da_komentarise']=$this->Moderator_model->sme_da_komentarise($id,$this->myID);
        $this->load->view("moderator/kurs_opis", $data);
    }

    public function get_kurs_komentarisi($id=FALSE)
    {
        $data['kurs'] = $this->Moderator_model->get_kurs($id);
        $data['polozio'] = $this->Moderator_model->get_Polozio_kurs_zvezdice($id, $this->myID);
        $data['clan']=$this->Moderator_model->get_clan($this->myID);
        $data['vec_je_komentarisao']=$this->Moderator_model->vec_je_komentarisao($id, $this->myID);
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
        $data['tip']='k';
        $data['podkomentar'] = $this->Moderator_model->get_podkomentar($id);
        $this->load->view('moderator/podkomentari', $data);
    }
    public function get_podkomentar_bez_komentara($idKurs,$idClan)
    {
        $data['myID'] = $this->myID;
        $data['tip']='o';
        $id=$this->Moderator_model->find_komentar($idKurs, $idClan);
        $data['komentarKurs'] = $this->Moderator_model->get_kurs($idKurs);
        $data['komentarClan'] = $this->Moderator_model->get_clan($idClan);
        $data['komentarOcena'] = $this->Moderator_model->get_kurs_ocena($idClan, $idKurs);
        if($id=='-1')
        {
            $data['postoji']='n';
        }
        else
        {
            $data['postoji']='d';
            $data['komentar'] = $this->Moderator_model->get_komentar($id, $this->myID);
            $data['podkomentar'] = $this->Moderator_model->get_podkomentar($id);
        }
        $this->load->view('moderator/podkomentari', $data);
    }

    public function dodaj_podkomentar()
    {
        $data['myID'] = $this->myID;
        $data['tip']='k';
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
        $data['kurs'] = $this->Moderator_model->get_pretraga_kurs($id,$this->myID);
        $this->load->view("moderator/pretraga_kurs", $data);
    }
    public function get_pretraga_predavac($id=FALSE)
    {
        $data['predavac'] = $this->Moderator_model->get_pretraga_predavac($id);
        $this->load->view("moderator/pretraga_predavac", $data);
    }


    public function proveri_banovanje(){
        $data= $this->Moderator_model->proveri_banovanje($this->myID);
        echo $data;
    }

    public function put_komentar($idKurs)
    {
        $comment=$_POST['comment'];
        $anonim= $_POST['anonim'];

        $this->Moderator_model->put_comment($this->myID , $idKurs , $comment, $anonim);
    }

    public function put_kurs_polozen()
    {
        $idKurs=$_POST["idKurs"];
        $ocena=$_POST["ocena"];
        $this->Moderator_model->put_polozen_kurs($idKurs,$ocena,$this->myID );
        $this->get_mojprofil_profil_start();
    }

    public function dohvati_unos_ocene()
    {
        $idKurs=$_POST['idKurs'];
        $data['predmet']=$this->Moderator_model->get_kurs($idKurs);
        $this->load->view("templates/unos_ocene", $data);
    }

    public function dohvati_izmenu_profila()
    {
        $data['clan']=$this->Moderator_model->get_clan($this->myID);
        $this->load->view("moderator/izmena_profila", $data);
    }
    public function put_izmena_profila()
    {
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $email=$_POST['email'];
        $pol=$_POST['pol'];
        $datumRodj=$_POST['datumRodj'];
        $smer=$_POST['smer'];
        $godUpis=$_POST['godUpis'];
        $opis=$_POST['opis'];
        $this->Moderator_model->put_izmena_profila($ime,$prezime,$email,$pol,$smer,$godUpis,$opis, $this->myID,$datumRodj);
        $data['clan'] = $this->Moderator_model->get_clan($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view("moderator/mojprofil_opis", $data);

    }

    public function provera_old_password(){
        $clan=$this->Moderator_model->get_clan($this->myID);
        if($_POST['old_pass']==$clan['password'])
            echo 'da';
        else
            echo 'ne';
    }
    public function dohvati_izmenu_sifre()
    {
        $data['clan']=$this->Moderator_model->get_clan($this->myID);
        $this->load->view("moderator/izmena_sifre", $data);
    }
    public function put_izmena_sifre()
    {
        $this->Moderator_model->put_izmena_sifre($_POST['new_pass'],$this->myID);
    }


    public function izmena_slike()
    {
        move_uploaded_file($_FILES['file']['tmp_name'],'./img/clan/clan'.$this->myID.'.jpg');
        $this->Moderator_model->set_clan_slika('d',$this->myID);
    }
    public function brisanje_slike()
    {
        unlink('./img/clan/clan'.$this->myID.'.jpg');
        $this->Moderator_model->set_clan_slika('n',$this->myID);
    }

    public function izmena_slike_predavac($idPred)
    {
        move_uploaded_file($_FILES['file']['tmp_name'],'./img/predavac/predavac'.$idPred.'.jpg');
        $this->Moderator_model->set_predavac_slika('d',$idPred);
    }
    public function brisanje_slike_predavac()
    {
        $idPred=$_POST['idPred'];
        unlink('./img/predavac/predavac'.$idPred.'.jpg');
        $this->Moderator_model->set_predavac_slika('n',$idPred);
    }

    public function izmena_slike_kurs($idKurs)
    {
        move_uploaded_file($_FILES['file']['tmp_name'],'./img/kurs/kurs'.$idKurs.'.jpg');
        $this->Moderator_model->set_kurs_slika('d', $idKurs);
    }
    public function brisanje_slike_kurs()
    {
        $idKurs=$_POST['idKurs'];
        unlink('./img/kurs/kurs'. $idKurs.'.jpg');
        $this->Moderator_model->set_kurs_slika('n',$idKurs);
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

        $this->Moderator_model->put_novi_kurs($ime,$opis);
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

        $id=$this->Moderator_model->put_novi_predavac($ime,$prezime,$email,$katedra,$godinaZaposlenja,$opis,$zvanje);
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
        $this->Moderator_model->put_predaje_na($kursevi, $idPred);
    }
   
    public function dohvati_edit_predavac()
    {
        $idPred=$_POST['idPred'];
        $data['predavac']= $this->Moderator_model->get_predavac($idPred);
        $data['tip']=$_POST['tip'];
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
        $idPred=$_POST['idPred'];
        $this->Moderator_model->edit_predavac($ime,$prezime,$email,$katedra,$godinaZaposlenja,$opis,$zvanje,$idPred);
        $data['predavac'] = $this->Moderator_model->get_predavac($idPred);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("moderator/predavac_opis", $data);
    }
    
    public function dohvati_edit_kurs($idKurs)
    {
        $data['kurs']= $this->Moderator_model->get_kurs($idKurs);
        $data['tip']=$_POST['tip'];
        $this->load->view("templates/izmena_kursa",$data);
    }
    
    public function edit_kurs()
    {
        $ime=$_POST['ime'];
        $opis=$_POST['opis'];
        $idKurs= $_POST['idKurs'];
        $this->Moderator_model->edit_kurs($ime,$opis, $idKurs);
        $data['kurs'] = $this->Moderator_model->get_kurs($idKurs);
        $data['predavac'] = $this->Moderator_model->get_kurs_predavac($idKurs);
        $data['ocenio'] = $this->Moderator_model->get_Ocenio_kurs($idKurs);
        $data['sme_da_komentarise']=$this->Moderator_model->sme_da_komentarise($idKurs,$this->myID);
        $this->load->view("moderator/kurs_opis", $data);
    }

    //ISIVESA_END
    public function get_unapredjivanje_derangiranje()
    {
        $data['unapredjivanje'] = $this->Moderator_model->get_unapredjivanje($this->myID);
        $data['derangiranje'] = $this->Moderator_model->get_derangiranje($this->myID);
        $data['naslov']='Unapredjivanje i derangiranje';
        $this->load->view("moderator/unapredjivanje_derangiranje", $data);
    }
    
    
    
}
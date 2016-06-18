<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    private $myID;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION["username"]))
            exit();
        $this->myID=$this->User_model->get_clan_username($_SESSION["username"]);
        $this->load->helper('url');
    }

    public function index()
    {
        $data['clan'] = $this->User_model->get_clan($this->myID);
        $data['polozio'] = $this->User_model->get_Polozio_clan($this->myID);
        $data['komentar'] = $this->User_model->get_Komentar_clan($this->myID, $this->myID);
        $data['banovanje']= $this->User_model->proveri_banovanje($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_user',$data);
        $this->load->view("user/mojprofil_profil", $data);
        $this->load->view('templates/footer');
    }
    public function get_mojprofil_profil_start()
    {
        $data['clan'] = $this->User_model->get_clan($this->myID);
        $data['polozio'] = $this->User_model->get_Polozio_clan($this->myID);
        $data['komentar'] = $this->User_model->get_Komentar_clan($this->myID, $this->myID);
        $data['banovanje']= $this->User_model->proveri_banovanje($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_user',$data);
        $this->load->view("user/mojprofil_profil", $data);
        $this->load->view('templates/footer');
    }



    public function get_clan_opis($id=FALSE)
    {

        $data['clan'] = $this->User_model->get_clan($id);
        $data['polozio'] = $this->User_model->get_Polozio_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("user/clan_opis", $data);

    }
    public function get_clan_profil($id=FALSE)
    {
        if($id==$this->myID)
        {
            $data['clan'] = $this->User_model->get_clan($id);
            $data['polozio'] = $this->User_model->get_Polozio_clan($id);
            $data['komentar'] = $this->User_model->get_Komentar_clan($id, $this->myID);

            $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

            $this->load->view("user/mojprofil_profil", $data);
        }
        else {
            $data['clan'] = $this->User_model->get_clan($id);
            $data['polozio'] = $this->User_model->get_Polozio_clan($id);
            $data['komentar'] = $this->User_model->get_Komentar_clan_neanonimno($id, $this->myID);
            $data['naslov'] = $data['clan']['ime'] . ' ' . $data['clan']['prezime'];
            $data['myID'] = $this->myID;
            $this->load->view("user/clan_profil", $data);
        }
    }


    public function get_mojprofil_opis($id=FALSE, $sta="oKorisniku")
    {

        $data['clan'] = $this->User_model->get_clan($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("user/mojprofil_opis", $data);
    }
    public function get_mojprofil_profil($id=FALSE)
    {
        $data['clan'] = $this->User_model->get_clan($id);
        $data['polozio'] = $this->User_model->get_Polozio_clan($id);
        $data['komentar'] = $this->User_model->get_Komentar_clan($id, $this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("user/mojprofil_profil", $data);
    }

    public function get_clan_slika($id=FALSE)
    {
        $data['clan'] = $this->User_model->get_clan($id);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $this->load->view("user/clan_slika", $data);
    }


    public function get_clan_poruke_posalji($idSaKim)
    {
        $data['tekst']= $_POST['tekst'];
        $this->User_model->put_message($this->myID,$idSaKim,$data['tekst']);
        $data['clan'] = $this->User_model->get_clan_from_username($_SESSION['username'] );
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['poslednjePoruke'] = $this->User_model->get_Poslednje_Poruke($data['clan']['idClan']);
        $data['saKim']=$this->User_model->get_clan($idSaKim);
        $data['poruke'] = $this->User_model->get_Poruke($data['clan']['idClan'], $idSaKim);
        $this->load->view('user/clan_poruke',$data);
    }


    public function get_clan_poruke($idSaKim=FALSE)
    {
        $data['clan'] = $this->User_model->get_clan_from_username($_SESSION['username'] );
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['poslednjePoruke'] = $this->User_model->get_Poslednje_Poruke($data['clan']['idClan']);
        if($idSaKim==FALSE and count($data['poslednjePoruke'])>0)
            $idSaKim=$data['poslednjePoruke'][0]['idClan'];
        if($idSaKim!=FALSE)
            $data['saKim']=$this->User_model->get_clan($idSaKim);
        else
            $data['saKim']='FALSE';
        $data['poruke'] = $this->User_model->get_Poruke($data['clan']['idClan'], $idSaKim);

        $this->load->view('user/clan_poruke',$data);
    }



    public function get_kurs_profil($id)
    {
        $data['kurs'] = $this->User_model->get_kurs($id);
        $data['polozio'] = $this->User_model->get_Polozio_kurs($id);
        $data['ocenio'] = $this->User_model->get_Ocenio_kurs($id);
        $data['komentar'] = $this->User_model->get_Komentar_kurs($id, $this->myID);
        $data['sme_da_komentarise']=$this->User_model->sme_da_komentarise($id,$this->myID);
        $data['myID']=$this->myID;
        
        $this->load->view("user/kurs_profil", $data);
    }

    public function get_kurs_opis($id=FALSE)
    {
        $data['kurs'] = $this->User_model->get_kurs($id);
        $data['predavac'] = $this->User_model->get_kurs_predavac($id);
        $data['ocenio'] = $this->User_model->get_Ocenio_kurs($id);
        $data['sme_da_komentarise']=$this->User_model->sme_da_komentarise($id,$this->myID);
        $this->load->view("user/kurs_opis", $data);
    }
    
    public function get_kurs_komentarisi($id=FALSE)
    {
        $data['kurs'] = $this->User_model->get_kurs($id);
        $data['polozio'] = $this->User_model->get_Polozio_kurs_zvezdice($id, $this->myID);
        $data['clan']=$this->User_model->get_clan($this->myID);
        $data['vec_je_komentarisao']=$this->User_model->vec_je_komentarisao($id, $this->myID);
        $this->load->view("user/kurs_komentar",$data);
    }
    public function get_predavac_profil($id=FALSE)
    {
        $data['myID']=$this->myID;
        $data['predavac'] = $this->User_model->get_predavac($id);
        $data['predaje'] = $this->User_model->get_predaje_kurs($id);
        $data['komentar'] = $this->User_model->get_komentar_predavac($id,$this->myID);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("user/predavac_profil", $data);
    }
    public function get_predavac_opis($id=FALSE)
    {
        $data['predavac'] = $this->User_model->get_predavac($id);
        $data['naslov']=$data['predavac']['ime'].' '.$data['predavac']['prezime'];
        $this->load->view("user/predavac_opis", $data);
    }


    public function get_podkomentar($id)
    {
        $data['myID'] = $this->myID;
        $data['postoji']='d';
        $data['komentar'] = $this->User_model->get_komentar($id, $this->myID);
        
        $data['komentarKurs'] = $this->User_model->get_kurs($data['komentar']['idKurs']);
        $data['komentarClan'] = $this->User_model->get_clan($data['komentar']['idClan']);
        $data['komentarOcena'] = $this->User_model->get_kurs_ocena($data['komentar']['idClan'], $data['komentar']['idKurs']);
        $data['tip']='k';
        $data['podkomentar'] = $this->User_model->get_podkomentar($id);
        $this->load->view('user/podkomentari', $data);
    }
    public function get_podkomentar_bez_komentara($idKurs,$idClan)
    {
        $data['myID'] = $this->myID;
        $id=$this->User_model->find_komentar($idKurs, $idClan);
        $data['komentarKurs'] = $this->User_model->get_kurs($idKurs);
        $data['komentarClan'] = $this->User_model->get_clan($idClan);
        $data['komentarOcena'] = $this->User_model->get_kurs_ocena($idClan, $idKurs);
        $data['tip']='o';
        if($id=='-1') {
            $data['postoji']='n';
            $data['komentar']['anonimno']='n';
        }
        else {
            $data['postoji']='d';
            $data['komentar'] = $this->User_model->get_komentar($id, $this->myID);
            $data['podkomentar'] = $this->User_model->get_podkomentar($id);

        }
        $this->load->view('user/podkomentari', $data);
    }

    public function get_kurs_ocene($idKurs)
    {
        $data['kurs'] = $this->User_model->get_kurs($idKurs);
        $data['ocenio'] = $this->User_model->get_Ocenio_kurs($idKurs);
        $this->load->view('user/kurs_ocene', $data);
    }

    public function dodaj_podkomentar()
    {//ovo nije ok
        $data['myID'] = $this->myID;
        $data['tip']='k';
        $this->User_model->dodaj_podkomentar($_POST['comment'], $_POST['idKom'],$this->myID);
        $data['postoji']='d';
        $data['komentar'] = $this->User_model->get_komentar($_POST['idKom'], $this->myID);

        $data['komentarKurs'] = $this->User_model->get_kurs($data['komentar']['idKurs']);
        $data['komentarClan'] = $this->User_model->get_clan($data['komentar']['idClan']);
        $data['komentarOcena'] = $this->User_model->get_kurs_ocena($data['komentar']['idClan'], $data['komentar']['idKurs']);

        $data['podkomentar'] = $this->User_model->get_podkomentar($_POST['idKom']);
        $this->load->view('user/podkomentari', $data);
    }
    
    


    public function get_pretraga_clan($id=FALSE)
    {
        $data['myID']=$this->myID;
        $data['clan'] = $this->User_model->get_pretraga_clan($id);
        $this->load->view("user/pretraga_clan", $data);
    }
    public function get_pretraga_kurs($id=FALSE)
    {
        $data['kurs'] = $this->User_model->get_pretraga_kurs($id,$this->myID);
        $this->load->view("user/pretraga_kurs", $data);
    }
    public function get_pretraga_predavac($id=FALSE)
    {
        $data['predavac'] = $this->User_model->get_pretraga_predavac($id);
        $this->load->view("user/pretraga_predavac", $data);
    }


    public function proveri_banovanje(){
        $data= $this->User_model->proveri_banovanje($this->myID);
        echo $data;
    }

    public function put_komentar($idKurs)
    {
        $comment=$_POST['comment'];
        $anonim= $_POST['anonim'];

        $this->User_model->put_comment($this->myID , $idKurs , $comment, $anonim);
    }

    public function put_kurs_polozen()
    {
        $idKurs=$_POST["idKurs"];
        $ocena=$_POST["ocena"];
        $this->User_model->put_polozen_kurs($idKurs,$ocena,$this->myID );
        $this->get_mojprofil_profil_start();
    }
    
    public function dohvati_unos_ocene()
    {
        $idKurs=$_POST['idKurs'];
        $data['predmet']=$this->User_model->get_kurs($idKurs);
        $this->load->view("templates/unos_ocene", $data);
    }

    public function dohvati_izmenu_profila()
    {
        $data['clan']=$this->User_model->get_clan($this->myID);
        $this->load->view("user/izmena_profila", $data);
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
        $this->User_model->put_izmena_profila($ime,$prezime,$email,$pol,$smer,$godUpis,$opis, $this->myID,$datumRodj);
        $data['clan'] = $this->User_model->get_clan($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];

        $this->load->view("user/mojprofil_opis", $data);

    }

    public function provera_old_password(){
        $clan=$this->User_model->get_clan($this->myID);
        if($_POST['old_pass']==$clan['password'])
            echo 'da';
        else
            echo 'ne';
    }
    public function dohvati_izmenu_sifre()
    {
        $data['clan']=$this->User_model->get_clan($this->myID);
        $this->load->view("user/izmena_sifre", $data);
    }
    public function put_izmena_sifre()
    {
        $this->User_model->put_izmena_sifre($_POST['new_pass'],$this->myID);
    }


    public function izmena_slike()
    {
       // unlink('./img/clan/clan'.$this->myID.'.jpg');
        move_uploaded_file($_FILES['file']['tmp_name'],'./img/clan/clan'.$this->myID.'.jpg');
        $this->User_model->set_clan_slika('d',$this->myID);
    }
    public function brisanje_slike()
    {
        unlink('./img/clan/clan'.$this->myID.'.jpg');
        $this->User_model->set_clan_slika('n',$this->myID);
    }
}
?>
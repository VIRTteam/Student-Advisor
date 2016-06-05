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
        $data['myID']=$this->myID;
    }

    public function index()
    {
        
        $data['clan'] = $this->User_model->get_clan($this->myID);
        $data['polozio'] = $this->User_model->get_Polozio_clan($this->myID);
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['komentar'] = $this->User_model->get_Komentar_clan($this->myID, $this->myID);
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



    public function get_clan_opis($id=FALSE, $sta="oKorisniku")
    {

        $data['clan'] = $this->User_model->get_clan($id);
        $data['polozio'] = $this->User_model->get_Polozio_clan($id);
        $data['komentar'] = $this->User_model->get_Komentar_clan($id, $this->myID);
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
            $data['komentar'] = $this->User_model->get_Komentar_clan($id, $this->myID);
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

		get_clan_poruke($idSaKim);

    }
    public function get_clan_poruke($idSaKim=FALSE)
    {

        $data['clan'] = $this->User_model->get_clan_from_username($_SESSION['username'] );
        $data['naslov']=$data['clan']['ime'].' '.$data['clan']['prezime'];
        $data['saKim']=$this->User_model->get_clan($idSaKim);
        $data['poslednjePoruke'] = $this->User_model->get_Poslednje_Poruke($data['clan']['idClan']);
        $data['poruke'] = $this->User_model->get_Poruke($data['clan']['idClan'], $idSaKim);

        $this->load->view('user/clan_poruke',$data);
    }

    public function get_kurs_profil($id)
    {
        $data['kurs'] = $this->User_model->get_kurs($id);
        $data['polozio'] = $this->User_model->get_Polozio_kurs($id);
        $data['ocenio'] = $this->User_model->get_Ocenio_kurs($id);
        $data['komentar'] = $this->User_model->get_Komentar_kurs($id, $this->myID);
        $data['myID']=$this->myID;
        
        $this->load->view("user/kurs_profil", $data);
    }

    public function get_kurs_opis($id=FALSE)
    {
        $data['kurs'] = $this->User_model->get_kurs($id);
        $data['predavac'] = $this->User_model->get_kurs_predavac($id);
        $data['ocenio'] = $this->User_model->get_Ocenio_kurs($id);

        $this->load->view("user/kurs_opis", $data);
    }
    
    public function get_kurs_komentarisi($id=FALSE)
    {
        $data['kurs'] = $this->User_model->get_kurs($id);
        $data['polozio'] = $this->User_model->get_Polozio_kurs_zvezdice($id, $this->myID);
        $data['clan']=$this->User_model->get_clan($this->myID);
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
    
    
    //tamara novo 3 fje
    public function get_podkomentar($id)
    {
        $data['myID'] = $this->myID;
        $data['postoji']='d';
        $data['komentar'] = $this->User_model->get_komentar($id, $this->myID);
        
        $data['komentarKurs'] = $this->User_model->get_kurs($data['komentar']['idKurs']);
        $data['komentarClan'] = $this->User_model->get_clan($data['komentar']['idClan']);
        $data['komentarOcena'] = $this->User_model->get_kurs_ocena($data['komentar']['idClan'], $data['komentar']['idKurs']);

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
        if($id=='-1') {
            $data['postoji']='n';

        }
        else {
            $data['postoji']='d';
            $data['komentar'] = $this->User_model->get_komentar($id, $this->myID);
            $data['podkomentar'] = $this->User_model->get_podkomentar($id);

        }
        $this->load->view('user/podkomentari', $data);
    }
    public function dodaj_podkomentar()
    {
        $data['myID'] = $this->myID;
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
        $data['kurs'] = $this->User_model->get_pretraga_kurs($id);
        $this->load->view("user/pretraga_kurs", $data);
    }
    public function get_pretraga_predavac($id=FALSE)
    {
        $data['predavac'] = $this->User_model->get_pretraga_predavac($id);
        $this->load->view("user/pretraga_predavac", $data);
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
    public function proveri_banovanje(){
        $data= $this->User_model->proveri_banovanje($this->myID);
        /*if( $data['razlog'])
            echo 'da';
        else
            echo 'ne';*/
        echo $data;
    }

//ISIVESA BEGIN
    public function put_komentar($idKurs)
    {
        $comment=$_POST['comment'];
        $anonim= $_POST['anonim'];

        $this->User_model->put_comment($this->myID , $idKurs , $comment, $anonim);
    }                                                                //vidi jel se koristi
    public function del_komentar($idkom)
    {
        $this->User_model->del_komentar($idkom);
        $this->get_mojprofil_profil_start();
    }                                                               //vidi jel se koristi

    public function put_kurs_polozen()
    {
        $idKurs=$_POST["idKurs"];
        $ocena=$_POST["ocena"];
        $this->User_model->put_polozen_kurs($idKurs,$ocena,$this->myID );
        $this->get_mojprofil_profil_start();
    }                                                                   //vidi jel se koristi

    public function del_kurs_polozen($idKurs)
    {
        $this->User_model->del_kurs_polozen($idKurs, $this->myID);
        $this->get_mojprofil_profil_start();
    }//vidi jel se koristi
    
    public function dohvati_unos_ocene()
    {
        $idKurs=$_POST['idKurs'];
        $data['predmet']=$this->User_model->get_kurs($idKurs);
        $this->load->view("templates/unos_ocene", $data);
    }
    
    //ISIVESA END
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model_toggle extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function index()
    {

    }
    public function get_clan_username($id)
    {
        $query = $this->db->get_where('clan', array('username' => $id));
        return $query->row_array()['idClan'];
    }
    public function obradi_podrzavanje($data)
    {
        $query=$this->db->query("SELECT * FROM podrzavanje WHERE idClan=? and idKom=?", array($data['idClan'], $data['idKom']));
        $provera=$query->result_array();
        if($data['tip']=='u')
            $this->db->query("DELETE FROM podrzavanje WHERE idClan=? and idKom=?", array($data['idClan'], $data['idKom']));
        else if(count($provera)>0)
            $this->db->query("UPDATE podrzavanje SET tip=? WHERE idClan=? and idKom=?",array($data['tip'],$data['idClan'],$data['idKom']));
        else
            $this->db->insert('podrzavanje', $data);

        $podaci['like2']=$this->db->query("SELECT count(*) FROM podrzavanje
                           WHERE idKom=? AND tip='p'",array($data['idKom']));
        $podaci['like']= $podaci['like2']->row_array();
        $podaci['unlike2']=$this->db->query("SELECT count(*) as minus FROM podrzavanje
                           WHERE idKom=? AND tip='n' ",array($data['idKom']));
        $podaci['unlike']= $podaci['unlike2']->row_array();
        $this->db->query("UPDATE komentar SET brPodrzavanja=?, brNepodrzavanja=? WHERE idKom=?",
            array(reset($podaci['like']),reset($podaci['unlike']),$data['idKom']));
        return $podaci;
    }




    //komentari
    public function obrisi_komentar($idKom)
    {
        $this->db->query("DELETE FROM podkomentar WHERE idKom=? ", array( $idKom));
        $this->db->query("DELETE FROM podrzavanje WHERE idKom=? ", array( $idKom));
        $this->db->query("DELETE FROM komentar WHERE idKom=? ", array( $idKom));
    }

    public function izmeni_komentar($idKom, $tekst)
    {
        $this->db->query("UPDATE komentar set tekst=? WHERE idKom=? ", array($tekst, $idKom));
    }
    public function dohvati_komentar($idKom)
    {
        $query=$this->db->query("SELECT * FROM komentar k inner JOIN kurs p on p.idkurs=k.idKurs and k.idKom=? ", array( $idKom));
        return $query->row_array();
    }
    public function obrisi_podkomentar($idPodKom)
    {
        $this->db->query("DELETE FROM podkomentar WHERE redniBroj=? ", array( $idPodKom));
    }


    //kursevi i predavaci
    public function obrisi_predaje($idKurs, $idPred)
    {
        $this->db->query("DELETE FROM predaje WHERE idKurs=? AND idPred=?", array( $idKurs, $idPred));
    }


    public function obrisi_kurs($idKurs)
    {

        $this->db->query("DELETE FROM polozio WHERE idKurs=? ", array( $idKurs));

        $query=$this->db->query("SELECT * FROM komentar WHERE idKurs=?", array($idKurs));

        $komentari=$query->result_array();



        foreach ($komentari as &$kom) {
        $this->db->query("DELETE FROM podrzavanje WHERE idKom=? ", array( $kom['idKom']));
        $this->db->query("DELETE FROM podkomentar WHERE idKom=? ", array( $kom['idKom']));
        }

        $this->db->query("DELETE FROM komentar WHERE idKurs=? ", array( $idKurs));
        $this->db->query("DELETE FROM kurs WHERE idkurs=? ", array( $idKurs));

    }
    
    public function obrisi_predavac($idKom)
    {
        $this->db->query("DELETE FROM predaje WHERE idPred=? ", array( $idKom));
        $this->db->query("DELETE FROM predavac WHERE idPred=? ", array( $idKom));//nije ok
    }
    public function obrisi_polozeni_ispit($idKurs, $idClan)
    {
        $this->db->query("DELETE FROM polozio WHERE idKurs=? AND idClan=?", array( $idKurs, $idClan));
    }



    // banovanje derangiranje, unapredjivanje
    public function dohvati_unapredjivanje($idClan)
    {
        $query=$this->db->query("SELECT k.*, u.tipUD FROM clan k LEFT OUTER JOIN unapredjivanje u on u.idClan=k.idClan WHERE k.idClan=? ",
            array( $idClan));

        return $query->row_array();
    }

    public function izmeni_unapredjivanje($idClan, $tekst, $myID)
    {
        $date['idClan']=$idClan;
        $date['opis']=$tekst;
        $la=$this->db->query("SELECT tip FROM clan where idClan=?",array( $myID));
        $tip=reset($la->row_array());
        if($tip=='m')
            $date['trebaSaglasnost']='d';
        else
            $date['trebaSaglasnost']='n';
        $date['tipUD']='u';
        $this->db->insert('unapredjivanje', $date);
    }
    public function dohvati_derangiranje($idClan)
    {
        $query=$this->db->query("SELECT k.*, u.tipUD FROM clan k LEFT OUTER JOIN unapredjivanje u on u.idClan=k.idClan WHERE k.idClan=? ",
            array( $idClan));

        return $query->row_array();
    }
    public function izmeni_derangiranje($idClan, $tekst, $myID)
    {
        $date['idClan']=$idClan;
        $date['opis']=$tekst;
        $la=$this->db->query("SELECT tip FROM clan where idClan=?",array( $myID));
        $tip=reset($la->row_array());
        if($tip=='m')
            $date['trebaSaglasnost']='d';
        else
            $date['trebaSaglasnost']='n';
        $date['tipUD']='u';
        $this->db->insert('unapredjivanje', $date);
    }


    public function dohvati_banovanje($idClan)
    {
        $query=$this->db->query("SELECT k.*, u.datumBanovanja FROM clan k LEFT OUTER JOIN banovanje u on u.idClan=k.idClan WHERE k.idClan=? ",
            array( $idClan));

        return $query->row_array();
    }
    public function izmeni_banovanje($idClan, $tekst)
    {

        $date['idClan']=$idClan;
        $date['razlog']=$tekst;
        date_default_timezone_set("Europe/Belgrade");
        $date['datumBanovanja']=date("Y-m-d h:i:s");
        $message = $date['idClan'];
        echo "<script type='text/javascript'>alert('$message');</script>";
        $this->db->insert('banovanje', $date);
    }


    public function set_star($id, $kol, $rb, $myID)
    {
        if($rb=='1')
            $this->db->query("UPDATE polozio set zanimljivost=? WHERE idClan=? and idKurs=?", array($kol,$myID,$id));
        else if($rb=='2')
            $this->db->query("UPDATE polozio set korisnost=? WHERE idClan=? and idKurs=?", array($kol,$myID,$id));
        else if($rb=='3')
            $this->db->query("UPDATE polozio set tezina=? WHERE idClan=? and idKurs=?", array($kol,$myID,$id));
        else
            $this->db->query("UPDATE polozio set preporuka=? WHERE idClan=? and idKurs=?", array($kol,$myID,$id));
    }
}
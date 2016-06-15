<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function index()
    {

    }
    public function get_clan_from_username($username)
    {
        $query = $this->db->get_where('clan', array('username' => $username));
        return $query->row_array();
    }

    public function get_clan($idClan = FALSE)
    {
        if ($idClan === FALSE)
        {
            $query = $this->db->get('clan');
            return $query->result_array()[0];
        }
        $query = $this->db->get_where('clan', array('idClan' => $idClan));
        return $query->row_array();
    }

    public function get_kurs($idKurs = FALSE)
    {
        if ($idKurs === FALSE)
        {
            $query = $this->db->get('kurs');
            return $query->result_array()[0];
        }
        $query = $this->db->get_where('kurs', array('idKurs' => $idKurs));
        return $query->row_array();
    }

    public function get_predavac($idPred = FALSE)
    {
        if ($idPred === FALSE)
        {
            $query = $this->db->get('predavac');
            return $query->result_array()[0];
        }
        $query = $this->db->get_where('predavac', array('idPred' => $idPred));
        return $query->row_array();
    }

    public function get_kurs_komentar($idKom)
    {
        $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs and p.idKom=?", array($idKom));
        return $query->row_array();
    }
    public function get_clan_komentar($idClan)
    {
        $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan and p.idKom=?", array($idClan));
        return $query->row_array();
    }

    public function get_kurs_predavac($idKurs)
    {
        $query = $this->db->query("select p.*, k.* FROM predavac p inner join predaje k on p.idPred = k.idPred and k.idKurs=? 
            ORDER BY p.zvanje DESC", array($idKurs));
        return $query->result_array();
    }

    public function get_podkomentar($idKom)
    {
        $query = $this->db->query("select p.*, k.* FROM podkomentar p inner join clan k on p.idClan = k.idClan and p.idKom=?
          ORDER BY p.redniBroj", array($idKom));
        return $query->result_array();
    }

    public function get_Komentar_clan($idClan = FALSE)
    {
        $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs and p.idClan=? and anonimno='0'
            ORDER BY p.datum DESC, p.idKom DESC", array($idClan));
        return $query->result_array();
    }

    public function get_Polozio_clan($idClan = FALSE)
    {
        $query = $this->db->query('select p.*, k.* FROM polozio p inner join kurs k on p.idKurs = k.idkurs AND p.idClan=?
            ORDER BY k.ime',array($idClan));
        return $query->result_array();
    }

    public function get_Komentar_kurs($idKurs = FALSE)
    {
        $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan and p.idKurs=?
          ORDER BY p.datum DESC, p.idKom DESC", array($idKurs));
        return $query->result_array();
    }
    public function get_Polozio_kurs($idKurs = FALSE)
    {
        $query = $this->db->query('select p.*, k.* FROM polozio p inner join clan k on p.idClan = k.idClan AND p.idKurs=?
            ORDER BY k.ime, k.prezime',array($idKurs));
        return $query->result_array();
    }

    public function  get_predaje_kurs($idPred)
    {
        $query = $this->db->query('select p.*, k.* FROM predaje p inner join kurs k on p.idKurs = k.idkurs AND p.idPred=?
             ORDER BY k.ime',array($idPred));
        return $query->result_array();
    }
    public function get_komentar_predavac($idPred)
    {
        $query = $this->db->query("select p.*, k.ime, c.slika FROM komentar p inner join kurs k inner join predaje pp inner join clan c 
            on c.idClan=p.idClan and p.idKurs = k.idkurs AND p.idKurs = pp.idKurs AND pp.idPred=?
            ORDER BY p.datum DESC, p.idKom DESC", array($idPred));
        return $query->result_array();
    }

    public function get_pretraga_clan($idClan ="")
    {
        $query = $this->db->query("SELECT * FROM clan where CONCAT(ime,' ',prezime) LIKE '%".$idClan."%' ORDER BY ime, prezime");
        return $query->result_array();
    }
    public function get_pretraga_kurs($idKurs ="")
    {
        $query = $this->db->query("SELECT * FROM kurs where ime LIKE '%".$idKurs."%' ORDER BY ime" );
        return $query->result_array();
    }
    public function get_pretraga_predavac($idPred ="")
    {
        $query = $this->db->query("SELECT * FROM predavac where CONCAT(ime,' ',prezime) LIKE '%".$idPred."%' ORDER BY ime, prezime");
        return $query->result_array();
    }

    public function get_kurs_ocena($idClana, $idKursa)
    {
        $query = $this->db->get_where('polozio', array('idClan' => $idClana),array('idKurs'=>$idKursa));
        return $query->row_array();
    }
    public function get_Ocenio_kurs($id)
    {
        $query = $this->db->query("select p.*, k.*
                                    FROM polozio p 
                                    inner join clan k                                   
                                    on p.idClan = k.idClan 
                                    AND (p.zanimljivost OR p.tezina OR p.preporuka OR p.korisnost)
                                    AND p.idKurs=?
                                    ORDER BY k.ime, k.prezime ",array($id));
        return $query->result_array();
    }

    public function find_komentar($idKurs, $idClan){
        $query=$this->db->query("select * FROM  komentar WHERE idKurs=? AND idClan=?", array($idKurs,$idClan));
        $provera=$query->result_array();
        if(count($provera)>0)
            return $provera[0]['idKom'];
        return '-1';
    }

    public function get_komentar($idKom)
    {
        $query = $this->db->query("select * FROM  komentar p where idKom=?", array($idKom));
        return $query->row_array();
    }


    public function provera_username($username){
        $query = $this->db->get_where('clan', array('username' => $username));
        return $query->result_array();
    }
    public function provera_username_password($username, $password){
        $query = $this->db->query("select * FROM clan where username=? and password=?", array($username,$password));
        return $query->result_array();
    }

    public function registracija($data){
        $query=$this->db->query("SELECT max(idClan) as br from Clan");
        if(count($query))
            $data['idClan']=1;
        else
            $data['idClan']=$query->row_array()['br']+1;
        $this->db->insert('clan', $data);
    }

    public function get_clan_logovanje($idClan)
    {
        $u=$this->db->query("select * from unapredjivanje where idClan=? and trebaSaglasnost='n'", array('idClan' => $idClan));
        $pr=$u->result_array();
        $un=count($pr);
        if($un>0)
        {
            $query=$this->db->query("select * from unapredjivanje u inner join clan c on u.idClan=c.idClan 
                where c.idClan=?", array('idClan'=>$idClan));
            $prva=$query->row_array();
            $this->db->query("DELETE FROM unapredjivanje WHERE idClan=? ", array( $idClan));
            if($prva['tipUD']=='u')
                if($prva['tip']=='c'){
                    $this->db->query("UPDATE clan SET tip='m' WHERE idClan=?",array( $idClan));
                    $prva['tip']='m';
                    $prva['promena']='Unapredjeni ste u moderatora.';
                }
                else{
                    $this->db->query("UPDATE clan SET tip='a' WHERE idClan=?",array( $idClan));
                    $prva['tip']='a';
                    $prva['promena']='Unapredjeni ste u administratora.';
                }
            else
                if($prva['tip']=='m'){
                    $this->db->query("UPDATE clan SET tip='c' WHERE idClan=?",array( $idClan));
                    $prva['tip']='c';
                    $prva['promena']='Derangirani ste u clana.';
                }
                else {
                    $this->db->query("UPDATE clan SET tip='m' WHERE idClan=?", array($idClan));
                    $prva['tip']='m';
                    $prva['promena']='Derangirani ste u moderatora.';

                }
            return $prva['promena'];
        }
        return "";
    }
    public function povratak_sifre_obradi($username, $email)
    {
        $query = $this->db->query("select * FROM clan where username=? and email=?", array($username,$email));
        $tek=$query->result_array();
        if(count($tek)>0)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $this->db->query("UPDATE clan SET password=? where username=? and email=?", array($randomString, $username,$email));
            return $randomString;
        }
        else
            return "0";
    }
}
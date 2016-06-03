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
    public function get_clan_from_username($id)
    {
        $query = $this->db->get_where('clan', array('username' => $id));
        return $query->row_array();
    }
    public function get_clan($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('clan');
            return $query->result_array()[0];
        }

        $query = $this->db->get_where('clan', array('idClan' => $id));
        return $query->row_array();
    }
    public function get_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('kurs');
            return $query->result_array()[0];
        }

        $query = $this->db->get_where('kurs', array('idKurs' => $id));
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
    public function get_kurs_komentar($id = 1)
    {
        $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs and p.idKom=?", array($id));
        return $query->row_array();
    }
    public function get_kurs_predavac($idKurs = 1)
    {
        $query = $this->db->query("select p.*, k.* FROM predavac p inner join predaje k on p.idPred = k.idPred and k.idKurs=? ORDER BY p.zvanje DESC", array($idKurs));
        return $query->result_array();
    }
    public function get_clan_komentar($id = 1)
    {
        $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan and p.idKom=?", array($id));
        return $query->row_array();
    }
    public function get_podkomentar($id = 1)
    {
        $query = $this->db->query("select p.*, k.* FROM podkomentar p inner join clan k on p.idClan = k.idClan and p.idKom=?", array($id));
        return $query->result_array();
    }
    public function get_Komentar_clan($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs");
            return $query->result_array();
        }

        $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs and p.idClan=?", array($id));
        return $query->result_array();
    }
    public function get_Polozio_clan($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM polozio p inner join kurs k on p.idKurs = k.idkurs");
            return $query->result_array();
        }

        $query = $this->db->query('select p.*, k.* FROM polozio p inner join kurs k on p.idKurs = k.idkurs AND p.idClan=?',array($id));
        return $query->result_array();
    }
    public function get_Komentar_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan");
            return $query->result_array();
        }

        $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan and p.idKurs=?", array($id));
        return $query->result_array();
    }
    public function get_Polozio_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM polozio p inner join clan k on p.idClan = k.idClan");
            return $query->result_array();
        }

        $query = $this->db->query('select p.*, k.* FROM polozio p inner join clan k on p.idClan = k.idClan AND p.idKurs=?',array($id));
        return $query->result_array();
    }
    public function  get_predaje_kurs($idPred=1)
    {
        $query = $this->db->query('select p.*, k.* FROM predaje p inner join kurs k on p.idKurs = k.idkurs AND p.idPred=?',array($idPred));
        return $query->result_array();
    }
    public function get_komentar_predavac($idPred = 1)
    {
        $query = $this->db->query("select p.*, k.ime, c.slika FROM komentar p inner join kurs k inner join predaje pp inner join clan c on c.idClan=p.idClan and p.idKurs = k.idkurs AND p.idKurs = pp.idKurs AND pp.idPred=?", array($idPred));
        return $query->result_array();
    }
    public function get_pretraga_clan($id ="")
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("SELECT * FROM clan ORDER BY ime, prezime");
            return $query->result_array();
        }
        $query = $this->db->query("SELECT * FROM clan where CONCAT(ime,' ',prezime) LIKE '%".$id."%' ORDER BY ime, prezime");
        return $query->result_array();
    }
    public function get_pretraga_kurs($id ="")
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("SELECT * FROM kurs ORDER BY ime" );
            return $query->result_array();
        }
        $query = $this->db->query("SELECT * FROM kurs where ime LIKE '%".$id."%' ORDER BY ime" );
        return $query->result_array();
    }
    public function get_pretraga_predavac($id ="")
    {
        if ($id =="")
        {
            $query = $this->db->query("SELECT * FROM predavac ORDER BY ime, prezime");
            return $query->result_array();
        }
        $query = $this->db->query("SELECT * FROM predavac where CONCAT(ime,' ',prezime) LIKE '%".$id."%' ORDER BY ime, prezime");
        return $query->result_array();
    }








    public function provera_username($username){
        $query = $this->db->get_where('clan', array('username' => $username));
        return $query->result_array();
    }
    public function provera_username_password($username, $password){
        $query = $this->db->query("select * FROM clan where username=? and password=?", array($username,$password));
        return $query->result_array();
    }
    public function registracija($date){
        $this->db->insert('clan', $date);
    }



    public function get_clan_logovanje($id)
    {
        $u=$this->db->query("select * from unapredjivanje where idClan=? and trebaSaglasnost='n'", array('idClan' => $id));
        $pr=$u->result_array();
        $un=count($pr);
        if($un>0)
        {
            $query=$this->db->query("select * from unapredjivanje u inner join clan c on u.idClan=c.idClan 
                where c.idClan=?", array('idClan'=>$id));
            $prva=$query->row_array();
            $this->db->query("DELETE FROM unapredjivanje WHERE idClan=? ", array( $id));
            if($prva['tipUD']=='u')
                if($prva['tip']=='c'){
                    $this->db->query("UPDATE clan SET tip='m' WHERE idClan=?",array( $id));
                    $prva['tip']='m';
                    $prva['promena']='Unapredjeni ste u moderatora.';
                }
                else{
                    $this->db->query("UPDATE clan SET tip='a' WHERE idClan=?",array( $id));
                    $prva['tip']='a';
                    $prva['promena']='Unapredjeni ste u administratora.';
                }
            else
                if($prva['tip']=='m'){
                    $this->db->query("UPDATE clan SET tip='c' WHERE idClan=?",array( $id));
                    $prva['tip']='c';
                    $prva['promena']='Derangirani ste u clana.';
                }
                else {
                    $this->db->query("UPDATE clan SET tip='m' WHERE idClan=?", array($id));
                    $prva['tip']='m';
                    $prva['promena']='Derangirani ste u moderatora.';

                }
            return $prva['promena'];
        }
        return "";
    }
}
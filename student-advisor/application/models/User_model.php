<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function index()
    {

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
    public function get_kurs_ocena($idClana = 1, $idKursa = 1)
    {
        $query = $this->db->get_where('polozio', array('idClan' => $idClana),array('idKurs'=>$idKursa));
        return $query->row_array();
    }

    public function get_Poslednje_Poruke($id = FALSE) //mozda radi
    {
        if ($id === FALSE) {
            return null;
        }
        $query = $this->db->query("SELECT  * FROM poruka where idPor IN 
                      (
                          SELECT idPor FROM poruka
                           WHERE (idPosiljalac='$id') OR (idPrimalac='$id') 
                           GROUP BY idPosiljalac,idPrimalac 
                           ORDER BY MAX(idPor) DESC
                       ) 
                       ORDER BY idPor DESC"
            );

        //$query = $this->db->query('select p.*, c.* FROM clan c inner join poruka p on p.idPrimalac = c.idClan AND p.idPosiljalac=?',array($id));
        return $query->result_array();
    }

    public function get_Poruke($id = FALSE, $idSaKim = FALSE)//ne radi
    {
        if ($id === FALSE || $idSaKim === FALSE)
        {
            $query = $this->db->get('poruka');
            return $query->result_array()[0];
        }
        
        $query= $this->db->query("
                          SELECT p.* FROM poruka p
                           WHERE ((p.idPosiljalac='$id') AND (idPrimalac='$idSaKim'))
                           OR 
                           ((p.idPosiljalac='$idSaKim') AND (p.idPrimalac='$id'))
                           GROUP BY idPosiljalac,idPrimalac 
                           ORDER BY MAX(p.idPor) DESC");
        //$query = $this->db->query('poruka', array('idPrimalac' => $id && 'idPosiljalac' => $idSaKim || 'idPrimalac' => $idSaKim && 'idPosiljalac' => $id)).orderBy(idPor);
       // $query = $this->db->query("select p.*,c1.*,c2.* FROM poruka p, clan c1, c2 where c1.idClan=? AND c2.idClan=? AND  "
        return $query->result_array();
    }

    public function get_Polozio1_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM polozio p inner join clan k on p.idClan = k.idClan");
            return $query->result_array();
        }

        $query = $this->db->query("select p.*, k.*, ko.*
                                    FROM `student-advisor-mysql`.polozio p 
                                    inner join `student-advisor-mysql`.clan k  
                                    
                                    on p.idClan = k.idClan 
                                    AND p.zanimljivost AND p.tezina AND p.preporuka AND p.korisnost
                                    AND p.idKurs=?
                                    left join `student-advisor-mysql`.komentar ko 
                                    on ko.idClan=p.idClan and ko.idKurs=p.idKurs
"
            ,array($id));
        return $query->result_array();
    }

    public function get_Komentar_clan($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM komentar p inner join kurs k on p.idKurs = k.idkurs");
            return $query->result_array();
        }

        $query = $this->db->query("select p.*, k.* , count(pk.redniBroj) as brPodkomentara
                                    FROM  `student-advisor-mysql`.komentar p
                                    inner join `student-advisor-mysql`.kurs k 
                                    on p.idKurs = k.idkurs and p.idClan=?
                                    left outer join `student-advisor-mysql`.podkomentar pk
                                    on p.idKom=pk.idKom
                                    group by p.idKom
                                    ", array($id));
        return $query->result_array();
    }
    public function get_Komentar_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM komentar p inner join clan k on p.idClan = k.idClan");
            return $query->result_array();
        }

        $query = $this->db->query("select p.*, k.* ,count(pk.redniBroj) as brPodkomentara
                                  FROM komentar p 
                                  inner join clan k 
                                  on p.idClan = k.idClan 
                                  and p.idKurs=?
                                  left outer join podkomentar pk
                                  on p.idKom=pk.idKom
                                  group by p.idKom", array($id));
        return $query->result_array();
    }

    public function get_komentar_predavac($idPred = 1)
    {
        $query = $this->db->query("SELECT p.*, k.ime, c.slika, count(pk.redniBroj) as brPodkomentara
                                    FROM komentar p 
                                    inner join kurs k 
                                    inner join predaje pp 
                                    on p.idKurs = k.idkurs 
                                    AND p.idKurs = pp.idKurs 
                                    AND pp.idPred=?
                                    inner join clan c
                                    on c.idClan=p.idClan
                                    left outer join podkomentar pk
                                    on p.idKom=pk.idKom
                                    group by p.idKom", array($idPred));
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
    /*public function get_kurs($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->query("select p.*, k.* FROM polozio p inner join kurs k on p.idKurs = k.idkurs");
            return $query->result_array();
        }

        $query = $this->db->query('select p.*, k.* FROM polozio p inner join kurs k on p.idKurs = k.idkurs AND p.idClan=?',array($id));
        return $query->result_array();
    }*/
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moderator_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function index()
    {

    }
 public function svi_predavaci()
    {
        $query=$this->db->query("SELECT * FROM predavac");
        return $query->result_array();
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
    public function get_clan_komentar($id, $myID)
    {
        $query = $this->db->query("select p.*, k.*, po.tip FROM komentar p inner join clan k left outer join podrzavanje po 
            on p.idClan = k.idClan and p.idKom=? and p.idClan=? and p.idKom=po.idKom", array($id, $myID));
        return $query->row_array();
    }

    public function get_kurs_predavac($idKurs)
    {
        $query = $this->db->query("select p.*, k.* FROM predavac p inner join predaje k on p.idPred = k.idPred and k.idKurs=? ORDER BY p.zvanje DESC", array($idKurs));
        return $query->result_array();
    }

    public function get_podkomentar($idKom)
    {
        $query = $this->db->query("select p.*, k.* FROM podkomentar p inner join clan k on p.idClan = k.idClan and p.idKom=?", array($idKom));
        return $query->result_array();
    }

    public function get_Komentar_clan($id,$myID)
    {

        $query = $this->db->query("select p.*, k.*, l.tip
                                    FROM  komentar p
                                    inner join kurs k 
                                    on p.idKurs = k.idkurs and p.idClan=?
                                    left outer join podrzavanje l
                                    on p.idKom=l.idKom and l.idClan=?
                                    ORDER BY p.datum DESC, p.idKom DESC", array($id,$myID));
        return $query->result_array();
    }
    public function get_Komentar_clan_neanonimno($id,$myID)
    {
        $query = $this->db->query("select p.*, k.*, l.tip
                                    FROM  komentar p
                                    inner join kurs k 
                                    on p.idKurs = k.idkurs and p.idClan=? and p.anonimno='0'
                                    left outer join podrzavanje l
                                    on p.idKom=l.idKom and l.idClan=?
                                    ORDER BY p.datum DESC, p.idKom DESC", array($id,$myID));
        return $query->result_array();
    }
    public function get_Polozio_clan($idClan = FALSE)
    {
        $query = $this->db->query('select p.*, k.* FROM polozio p inner join kurs k on p.idKurs = k.idkurs AND p.idClan=?
            ORDER BY k.ime',array($idClan));
        return $query->result_array();
    }

    public function get_Komentar_kurs($id, $myID)
    {
        $query = $this->db->query("select p.*, k.*, l.tip
                                    FROM  komentar p
                                    inner join clan k 
                                    on p.idClan = k.idClan and p.idKurs=?
                                    left outer join podrzavanje l
                                    on p.idKom=l.idKom and l.idClan=?
                                    ORDER BY p.datum DESC, p.idKom DESC", array($id,$myID));

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
    public function get_komentar_predavac($idPred, $myID)
    {
        $query = $this->db->query("SELECT p.*, k.ime, c.slika, l.tip
                        FROM `student-advisor-mysql`.komentar p 
                        inner join `student-advisor-mysql`.kurs k 
                        on p.idKurs = k.idkurs 
                        inner join `student-advisor-mysql`.predaje pp 
                        on p.idKurs = pp.idKurs and pp.idPred=?
                        inner join `student-advisor-mysql`.clan c
                        on c.idClan=p.idClan
                        left outer join `student-advisor-mysql`.podrzavanje l 
                        on p.idKom=l.idKom and l.idClan=?
                        ORDER BY p.datum DESC, p.idKom DESC", array($idPred,$myID));
        return $query->result_array();
    }
    public function get_pretraga_clan($idClan ="")
    {
        $query = $this->db->query("SELECT * FROM clan where CONCAT(ime,' ',prezime) LIKE '%".$idClan."%' ORDER BY ime, prezime");
        return $query->result_array();
    }
    public function get_pretraga_kurs($idKurs ="", $myID)
    {
        $query = $this->db->query("SELECT k.*, p.idClan FROM kurs k LEFT OUTER JOIN polozio p on k.idKurs=p.idKurs and p.idClan=".$myID."
                                    WHERE ime LIKE '%".$idKurs."%' ORDER BY ime" );
        return $query->result_array();
    }
    public function get_pretraga_predavac($idPred ="")
    {
        $query = $this->db->query("SELECT * FROM predavac where CONCAT(ime,' ',prezime) LIKE '%".$idPred."%' ORDER BY ime, prezime");
        return $query->result_array();
    }

    public function get_kurs_ocena($idClan, $idKurs)
    {
        $query = $this->db->query("SELECT * FROM polozio where idClan=? and idKurs=?", array($idClan, $idKurs));
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

    public function get_Polozio_kurs_zvezdice($idKurs, $myID)
    {
        $query = $this->db->query('select * FROM polozio where idClan = ? AND idKurs=?',array($myID, $idKurs));
        return $query->row_array();
    }


    public function get_Poslednje_Poruke($id = FALSE) //mozda radi
    {
        if ($id === FALSE) {
            return null;
        }//INNER JOIN `student-advisor-mysql`.clan c on c.idClan=idPosiljalac OR c.idClan=idPrimalac
        $query = $this->db->query("SELECT * FROM `student-advisor-mysql`.poruka por
                    INNER JOIN `student-advisor-mysql`.clan c on (c.idClan=idPosiljalac and c.idClan!='$id' and idPrimalac='$id') OR 
                        (c.idClan=idPrimalac and c.idClan!='$id' and idPosiljalac='$id')
                    where idPor IN 
                    (
                        SELECT MAX(p.idPor) FROM `student-advisor-mysql`.poruka p
                        WHERE ((p.idPosiljalac='$id' AND p.idPrimalac=por.idPrimalac) AND
                        NOT EXISTS (	SELECT k.idPor
                                        FROM `student-advisor-mysql`.poruka k
                                        WHERE k.idPrimalac=p.idPosiljalac AND k.idPosiljalac=p.idPrimalac
                                        AND k.idPor>p.idPor
                                    ))
                        OR ((p.idPrimalac='$id') AND por.idPosiljalac=p.idPosiljalac AND
                                NOT EXISTS 
                                    ( SELECT k.idPor
                                        FROM `student-advisor-mysql`.poruka k
                                        WHERE k.idPosiljalac=p.idPrimalac AND k.idPrimalac=p.idPosiljalac
                                        AND k.idPor>p.idPor
                                    )
                            )                      
                    )
                    ORDER BY datum DESC");
        return $query->result_array();
    }

    public function get_Poruke($id = FALSE, $idSaKim = FALSE)
    {
//        if ($id === FALSE || $idSaKim === FALSE)
//        {
//            $query = $this->db->get('poruka');
//            return $query->result_array()[0];
//        }
        $query= $this->db->query("SELECT p.*, c.* FROM `student-advisor-mysql`.poruka p
                                   INNER JOIN `student-advisor-mysql`.clan c on c.idClan=p.idPosiljalac
                           WHERE ((p.idPosiljalac='$id') AND (p.idPrimalac='$idSaKim'))
                           OR 
                           ((p.idPosiljalac='$idSaKim') AND (p.idPrimalac='$id'))
                           
                           ORDER BY p.idPor ASC");

        $this->db->query("UPDATE poruka SET procitana='d'
					WHERE idPrimalac=? AND idPosiljalac=? AND procitana='n'",array($id,$idSaKim));
        return $query->result_array();
    }

    public function find_komentar($idKurs, $idClan){
        $query=$this->db->query("select * FROM  komentar WHERE idKurs=? AND idClan=?", array($idKurs,$idClan));
        $provera=$query->result_array();
        if(count($provera)>0)
            return $provera[0]['idKom'];
        return '-1';
    }

    public function get_komentar($idKom, $myID)
    {
        $query = $this->db->query("select p.* ,l.tip
                                    FROM  `student-advisor-mysql`.komentar p
                                    left outer join `student-advisor-mysql`.podrzavanje l
                                    on p.idKom=l.idKom and l.idClan=? where
                                    p.idKom=?", array($myID,$idKom));
        return $query->row_array();
    }
    public function dodaj_podkomentar($comment, $idKom,$myID)
    {
        $query=$this->db->query("SELECT max(redniBroj) as br, count(*) as ukupno from Podkomentar where idKom=?",array($idKom));
        if(count($query)==0)
            $redniBroj=1;
        else
            $redniBroj=$query->row_array()['br']+1;
        date_default_timezone_set("Europe/Belgrade");
        $datum=date("Y-m-d");
        $this->db->query("INSERT INTO podkomentar(redniBroj,idKom,idClan,tekst, datum) VALUES('$redniBroj','$idKom','$myID','$comment','$datum')");
        $this->db->query("UPDATE komentar set brPodkomentara=? WHERE idKom=?", array($query->row_array()['br']+1,$idKom));
    }


    public function get_clan_username($id)
    {
        $query = $this->db->get_where('clan', array('username' => $id));
        return $query->row_array()['idClan'];
    }
    public function proveri_banovanje($idClan)
    {

        $query=$this->db->query("SELECT k.*, u.datumBanovanja, u.razlog FROM clan k LEFT OUTER JOIN banovanje u on u.idClan=k.idClan WHERE k.idClan=? ",
            array( $idClan));
        date_default_timezone_set("Europe/Belgrade");
        $sad=date("Y-m-d h:i:s");
        $red=$query->row_array();
        $poc=$red['datumBanovanja'];
        if(!$poc)
            return NAN;
        $tekT=strtotime('+1 day', strtotime($poc));
        if($tekT<strtotime($sad))
        {
            $this->db->query("DELETE FROM banovanje WHERE idClan=? ", array($idClan));
            return NAN;
        }
        return $red['razlog'];
    }

    public function sme_da_komentarise($idKurs,$idClan)
    {
        $query=$this->db->query("SELECT * FROM polozio WHERE idClan=? AND idKurs=?",array($idClan, $idKurs));
        if(count($query->result_array())>0)
            return 'd';
        return 'n';
    }
    public function vec_je_komentarisao($idKurs,$idClan)
    {
        $query=$this->db->query("SELECT * FROM komentar WHERE idClan=? AND idKurs=?",array($idClan, $idKurs));
        if(count($query->result_array())==0)
            return NULL;
        return $query->result_array()[0];
    }

    public function put_comment($idClan , $idKurs , $comment, $anonim="false")
    {
        $query = $this->db->query("select * from komentar where idKurs=? and idClan=?", array($idKurs, $idClan));
        date_default_timezone_set("Europe/Belgrade");
        $datum=date("Y-m-d");
        if ($anonim == 'false') {
            if (count($query->result_array()) > 0)
                $this->db->query("UPDATE komentar  set tekst=?, anonimno=0 where idKurs=? and idClan=?", array($comment, $idKurs, $idClan));
            else {
                $query1=$this->db->query("SELECT max(idKom) as br from Komentar");
                if(count($query1)==0)
                    $idKom=1;
                else
                    $idKom=$query1->row_array()['br']+1;
                $this->db->query("INSERT INTO komentar(idKom,idClan,idKurs,tekst,anonimno, datum) VALUES('$idKom','$idClan','$idKurs','$comment',0,'$datum')");
            }
        } else
            if (count($query->result_array()) > 0)
                $this->db->query("UPDATE komentar  set tekst=?, anonimno=1 where idKurs=? and idClan=?", array($comment, $idKurs, $idClan));
            else {
                $query1=$this->db->query("SELECT max(idKom) as br from Komentar");
                if(count($query1)==0)
                    $idKom=1;
                else
                    $idKom=$query1->row_array()['br']+1;
                $this->db->query("INSERT INTO komentar(idKom,idClan,idKurs,tekst,anonimno, datum) VALUES('$idKom','$idClan','$idKurs','$comment',1,'$datum')");
            }
    }

    public function put_message($id,$idSaKim,$tekst)
    {
        date_default_timezone_set("Europe/Belgrade");
        $datum=date("Y-m-d H:m:i");
        $query1=$this->db->query("SELECT max(idPor) as br from poruka where (idPosiljalac='$id' and idPrimalac='$idSaKim')
                or (idPosiljalac='$idSaKim' and idPrimalac='$id')");
        if(count($query1)==0)
            $idPor=1;
        else
            $idPor=$query1->row_array()['br']+1;
        $this->db->query("INSERT INTO poruka(idPor,idPosiljalac,idPrimalac,tekst, datum) values('$idPor','$id','$idSaKim','$tekst', '$datum')");
    }

    public function put_polozen_kurs($idKurs,$ocena, $id)
    {
        $this->db->query("INSERT INTO polozio(idClan,idKurs,ocena) values('$id','$idKurs','$ocena')");
        $query=$this->db->query("SELECT sum(ocena) as suma, count(*) as br FROM polozio WHERE idClan=?",array($id));
        $clanOcene=$query->row_array();
        if($clanOcene['br']==0)
            $this->db->query("UPDATE clan SET prosecnaOcena=? WHERE idClan=?", array(0,$id));
        else
            $this->db->query("UPDATE clan SET prosecnaOcena=? WHERE idClan=?", array($clanOcene['suma']/$clanOcene['br'],$id));
    }

    public function put_izmena_profila($ime,$prezime,$email,$pol,$smer,$godUpis,$opis, $idClan, $datumRodj)
    {
        $this->db->query("UPDATE clan SET ime='$ime', prezime='$prezime' , email='$email' , smer='$smer' , pol='$pol' ,opis='$opis',godinaUpisa='$godUpis' ,datumRodjenja='$datumRodj' WHERE idClan='$idClan' ");
    }
    public function put_izmena_sifre($pass, $idClan)
    {
        $this->db->query("UPDATE clan SET password='$pass' WHERE idClan='$idClan' ");
    }
    public function set_clan_slika($slika, $idClan)
    {
        $this->db->query("UPDATE clan SET slika='$slika' WHERE idClan='$idClan' ");
    }
    public function set_predavac_slika($slika, $idPred)
    {
        $this->db->query("UPDATE predavac SET slika='$slika' WHERE idPred='$idPred' ");
    }
    public function set_kurs_slika($slika, $idKurs)
    {
        $this->db->query("UPDATE kurs SET slika='$slika' WHERE idKurs='$idKurs' ");
    }

    //ISIVESA_BEGIN
    public function put_novi_predavac($ime,$prezime,$email,$katedra,$godinaZaposlenja,$opis,$zvanje)
    {
        $query=$this->db->query("SELECT max(idPred) as br from predavac");
        if(count($query)==0)
            $idPred=1;
        else
            $idPred=$query->row_array()['br']+1;
        $this->db->query("INSERT INTO predavac(idPred,ime,prezime,email,katedra,godinaZaposlenja,opis,zvanje) 
            VALUES('$idPred','$ime'
            ,'$prezime','$email','$katedra','$godinaZaposlenja','$opis','$zvanje')");
        $id = $this->db->query("SELECT MAX(idPred) FROM predavac");
        return $id;
    }

    public function put_novi_kurs($ime,$opis)
    {
        $query=$this->db->query("SELECT max(idKurs) as br from kurs");
        if(count($query)==0)
           $idKurs=1;
        else
            $idKurs=$query->row_array()['br']+1;

        $this->db->query("INSERT INTO kurs(idKurs,ime,opis) VALUES ('$idKurs','$ime','$opis')");
    }

    public function put_predaje_na($idKurs,$idPred)//,$datumPoc)
    {
        $this->db->query("INSERT INTO predaje(idKurs,idPred) VALUES ('$idKurs','$idPred')");//,'$datumPoc')");
    }
    public function svi_kursevi()
    {
        $query=$this->db->query("SELECT * FROM kurs");
        return $query->result_array();
    }

    public function edit_predavac($ime,$prezime,$email,$katedra,$godinaZaposlenja,$opis,$zvanje, $idPred)
    {
        $this->db->query("UPDATE predavac SET 
                          ime='$ime' , prezime='$prezime' 
                          ,email='$email' , katedra='$katedra' 
                          , godinaZaposlenja='$godinaZaposlenja' , opis='$opis' 
                          , zvanje='$zvanje'  WHERE idPred='$idPred'");

    }

    public function edit_kurs($ime,$opis,$idkurs)
    {
        $this->db->query("UPDATE kurs SET 
                          ime='$ime', opis='$opis' 
                           WHERE idkurs='$idkurs'");
    }

    public function get_unapredjivanje($myID)
    {
        $query=$this->db->query("SELECT c.*, u.opis FROM clan c INNER JOIN unapredjivanje u on u.idClan=c.idClan and u.trebaSaglasnost='d' and u.tipUD='u' and c.idClan!='$myID'");
        return $query->result_array();
    }
    public function get_derangiranje($myID)
    {
        $query=$this->db->query("SELECT c.*, u.opis FROM clan c INNER JOIN unapredjivanje u on u.idClan=c.idClan and u.trebaSaglasnost='d' and u.tipUD='d' and c.idClan!='$myID'");
        return $query->result_array();
    }
}
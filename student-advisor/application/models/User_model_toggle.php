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
}
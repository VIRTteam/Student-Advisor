<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model_obrada extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function index()
    {

    }
    public function obradi_podrzavanje($data)
    {
        $provera=$this->db->get_where('podrzavanje', array('idClan' => $data['idKom'], 'idClan'=>$data['idClan']));
        /*
        if(sizeof($provera)>0)
            $this->query("UPDATE podrzavanje SET tip=? WHERE idClan=? and idKom=?",array_column($tip,$idClan,$idKom));
        else
            $this->db->insert('clan', $date);
        $podaci['like']=$this->db->query("
                          SELECT count(*) FROM podrzavanje
                           WHERE idKom=? AND tip='p'",array_column($idKom));
        $podaci['unlike']=$this->db->query("
                          SELECT count(*) FROM podrzavanje
                           WHERE idKom=? AND tip='n'",array_column($idKom));
        var_dump($podaci);
        print_r($podaci);

        $this->query("UPDATE komentari SET brPodrzavanja=?, brNepodrzavanja=? WHERE idKom=?",
            array_column($podaci['like'],$podaci['unlike'],$idKom));*/
        return $provera;
    }
}
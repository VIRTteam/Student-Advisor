<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_obrada extends CI_Controller
{
    private $myID;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model_obrada');
        $this->load->model('User_model');
        session_start();
        if (!isset($_SESSION["username"]))
            exit();
        $this->myID = $this->User_model->get_clan_username($_SESSION["username"]);
    }

    public function obradi_podrzavanje($tip)
    {
        $pom['idClan']=$this->myID;
        $pom['idKom']=$_POST["idKom"];
        $pom['tip']=$tip;
        $data = $this->User_model_obrada->obradi_podrzavanje($pom);
        echo $data['like'].' '.$data['unlike'];
        echo "rrr ".$pom['idClan'];
    }
}

?>
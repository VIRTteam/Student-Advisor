<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_toggle extends CI_Controller
{
    private $myID;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model_toggle');
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(!isset($_SESSION["username"]))
            exit();
        $this->myID=$this->User_model_toggle->get_clan_username($_SESSION["username"]);
        $this->load->helper('url');
    }
    public function obradi_podrzavanje()
    {
        $pom['idClan']=$this->myID;
        $pom['idKom']=$_POST["idKom"];
        $pom['tip']=$_POST["tip"];
        $data=$this->User_model_toggle->obradi_podrzavanje($pom);
        echo reset($data['like']).' '.reset($data['unlike']);
    }
}

?>
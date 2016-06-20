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


    
    //komentari
    public function izmeni_komentar($idKom, $tekst)
    {
        $data['idKom']=$_POST["idKom"];
        $data['tekst']=$_POST["tekst"];
        $data['komentarIzmena']=$this->User_model_toggle->izmeni_komentar($data['idKom'],$data['tekst']);
    }
    public function dohvati_komentar()
    {
        $idKom=$_POST["idKom"];
        $data['komentarIzmena']=$this->User_model_toggle->dohvati_komentar($idKom);
        $this->load->view("templates/izmena_komentara", $data);
    }
    public function obrisi_komentar()
    {
        $idKom=$_POST['idKom'];
        $this->User_model_toggle->obrisi_komentar($idKom);
    }
    public function obrisi_podkomentar()
    {
        $idPodKom=$_POST['idPodKom'];
        $idKom=$_POST['idKom'];
        $this->User_model_toggle->obrisi_podkomentar($idPodKom, $idKom);
    }

    //kursevi i predavaci
    public function obrisi_predaje()
    {
        $idKurs=$_POST['idKurs'];
        $idPred=$_POST['idPred'];
        $this->User_model_toggle->obrisi_predaje($idKurs, $idPred);
    }
    public function obrisi_kurs()
    {
        $idKurs=$_POST['idKurs'];
        $this->User_model_toggle->obrisi_kurs($idKurs);
    }
    public function obrisi_predavac()
    {
        $idPred=$_POST['idPred'];
        $this->User_model_toggle->obrisi_predavac($idPred);
    }
    public function obrisi_polozeni_ispit()
    {
        $idKurs=$_POST['idKurs'];
        $idClan=$_POST['idClan'];
        $this->User_model_toggle->obrisi_polozeni_ispit($idKurs, $idClan);
    }
    
    //banovanje, derangiranje, unapredjivanje
    public function dohvati_unapredjivanje()
    {
        $data['clan']=$this->User_model_toggle->get_clan($this->myID);
        $idKom=$_POST["idClan"];
        $data['unapredjivanje']=$this->User_model_toggle->dohvati_unapredjivanje($idKom);
        $this->load->view("templates/unapredjivanjeModerator", $data);
    }
    public function izmeni_unapredjivanje()
    {
        $idClan=$_POST["idClan"];
        $tekst=$_POST["tekst"];
        $this->User_model_toggle->izmeni_unapredjivanje($idClan,$tekst, $this->myID);
    }

    public function dohvati_derangiranje()
    {
        $idKom=$_POST["idClan"];
        $data['derangiranje']=$this->User_model_toggle->dohvati_derangiranje($idKom);
        $data['clan']=$this->User_model_toggle->get_clan($this->myID);
        $this->load->view("templates/derangiranjeModerator", $data);
    }
    public function izmeni_derangiranje()
    {
        $idClan=$_POST["idClan"];
        $tekst=$_POST["tekst"];
        $this->User_model_toggle->izmeni_derangiranje($idClan,$tekst, $this->myID);
    }
    public function prihvati_UD()
    {
        $idClan=$_POST["idClan"];
        $this->User_model_toggle->prihvati_UD($idClan);
    }
    public function brisi_UD()
    {
        $idClan=$_POST["idClan"];
        $this->User_model_toggle->brisi_UD($idClan);
    }
    public function dohvati_banovanje()
    {
        $idKom=$_POST["idClan"];
        $data['banovanje']=$this->User_model_toggle->dohvati_banovanje($idKom);
        $this->load->view("templates/banovanje", $data);
    }
    public function izmeni_banovanje()
    {
        $idClan=$_POST["idClan"];
        $tekst=$_POST["tekst"];
        $message =$_POST['idClan'];
        echo "<script type='text/javascript'>alert('$message');</script>";
        $this->User_model_toggle->izmeni_banovanje($idClan,$tekst);
    }



    public function set_star()
    {
        $id = $_POST["id"];
        $kol = $_POST["kol"];
        $rb = $_POST["rb"];
        $this->User_model_toggle->set_star($id, $kol, $rb, $this->myID);
    }


    public function slanje_maila()
    {
        $data['idPred']=$_POST['idPred'];
        $this->load->view("templates/slanje_maila", $data);
    }
    public function posalji_mail()
    {
        $idPred = $_POST['idPred'];
        $pred=$this->User_model_toggle->get_predavac($idPred);
        $clan=$this->User_model_toggle->get_clan($this->myID);
        $name = "email poruka";
        $email_address = $clan['email'];
        $message = $_POST['message'];

        $to = 'vvesic@yahoo.com'; //$pred['email'];
        $email_subject = "Website Contact Form:  ".$name;
        $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: ".$name."\n\nEmail: ".$email_address."\n\nMessage:\n".$message;
        $headers = "From: noreply@studentadvisor.com\n";
        $headers .= "Reply-To: ".$email_address;

        $this->load->library('email');

        $config['protocol']    = 'smtp';

        $config['smtp_host']    = 'ssl://smtp.gmail.com';

        $config['smtp_port']    = '465';

        $config['smtp_timeout'] = '7';

        $config['smtp_user']    = 'sender_mailid@gmail.com';

        $config['smtp_pass']    = 'password';

        $config['charset']    = 'utf-8';

        $config['newline']    = "\r\n";

        $config['mailtype'] = 'text'; // or html

        $config['validation'] = TRUE; // bool whether to validate email or not

       // $this->email->initialize($this->config);

        $this->email->from( 'noreply@studentadvisor.com', 'VIRT Team');
        $this->email->to($to);

        $this->email->subject($email_subject."Reply-To: ".$email_address);
        $this->email->message($email_body);

        $this->email->send();

        echo $this->email->print_debugger();
        echo $message;
    }

//    public function mail($to,$email_subject,$email_body,$reply_address)
//    {
//        $this->email->from( 'noreply@studentadvisor.com', 'VIRT Team');
//        $this->email->to($to);
//
//        $this->email->subject($email_subject."Reply-To: ".$reply_address);
//        $this->email->message($email_body);
//
//        $this->email->send();
//    }

    public function slanje_maila_pomoc()
    {
        $this->load->view("templates/slanje_maila_pomoc");
    }
    public function posalji_mail_pomoc()
    {
        $clan=$this->User_model_toggle->get_clan($this->myID);
        $name = "email poruka";
        $email_address = $clan['email'];
        $message = $_POST['message'];

        $to = 'vvesic@yahoo.com'; //$pred['email'];
        $email_subject = "Website Contact Form:  ".$name;
        $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: ".$name."\n\nEmail: ".$email_address."\n\nMessage:\n".$message;
        $headers = "From: noreply@studentadvisor.com\n";
        $headers .= "Reply-To: ".$email_address;
        //     mail($to,$email_subject,$email_body,$headers);


        $this->load->library('email');
        $this->email->from( 'noreply@studentadvisor.com', 'VIRT Team');
        $this->email->to($to);

        $this->email->subject($email_subject."Reply-To: ".$email_address);
        $this->email->message($email_body);

        $this->email->send();



        echo $message;
    }
}

?>
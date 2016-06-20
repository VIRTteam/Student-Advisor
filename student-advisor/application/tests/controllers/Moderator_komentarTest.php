<?php

/**
 * Created by PhpStorm.
 * User: tamarasekularac
 * Date: 6/20/16
 * Time: 3:13 AM
 */
class Moderator_komentarTest extends TestCase
{
    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'vesic', 'password' => 'vesic1']);
    }

    public function test_put_komentar(){
        $this->request('POST', "Moderator/put_komentar/3", ['comment' =>'testiramo da li rade komentari', 'anonimno'=>'false']);
        $idKom = $this->request('POST', "User/get_kurs_profil/3");
        $this->assertContains('testiramo da li rade komentari', $idKom);

    }
    public function test_edit_komentar()
    {
        $output = $this->request('POST', "User_toggle/izmeni_komentar", ['idKom' => '1', 'tekst' => 'testiranje']);
        $idKom = $this->request('POST', "Moderator/get_kurs_profil/3");
        $this->assertContains("testiranje", $idKom);
    }
    public function test_delete_komentar()
    {
        $output = $this->request('POST', "User_toggle/obrisi_komentar", ['idKom' => '1']);
        $idKom = $this->request('POST', "Moderator/get_kurs_profil/3");
        $this->assertNotContains('id="testiranje'.$idKom.'"', $output);
    }
}

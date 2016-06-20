<?php

class User_komentarTest extends TestCase
{
    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'isi', 'password' => 'isi1']);
    }

    public function test_put_komentar(){
         $this->request('POST', "User/put_komentar/3", ['comment' =>'testiramo da li rade komentari', 'anonimno'=>'false']);
        $idKom = $this->request('POST', "User/get_kurs_profil/3");
        $this->assertContains('testiramo da li rade komentari', $idKom);

    }
    public function test_edit_komentar()
    {
        $output = $this->request('POST', "User_toggle/izmeni_komentar", ['idKom' => '1', 'tekst' => 'testiranje']);
        $idKom = $this->request('POST', "User/get_kurs_profil/3");
        $this->assertContains("testiranje", $idKom);
    }
    public function test_delete_komentar()
    {
        $output = $this->request('POST', "User_toggle/obrisi_komentar", ['idKom' => '1']);
        $idKom = $this->request('POST', "User/get_kurs_profil/3");
        $this->assertNotContains('id="testiranje'.$idKom.'"', $output);
    }
}

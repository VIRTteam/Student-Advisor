<?php

class User_podkomentarTest extends TestCase
{
    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'isi', 'password' => 'isi1']);
    }

    public function test_put_podkomentar(){
        $this->request('POST', "User/dodaj_podkomentar", ['comment' =>'testiramo da li rade podkomentari', 'idKom'=>'1']);
        $idKom = $this->request('POST', "User/get_podkomentar/1");
        $this->assertContains('testiramo da li rade podkomentari', $idKom);
    }
   
    public function test_delete_podkomentar()
    {
         $this->request('POST', "User_toggle/obrisi_podkomentar", ['idKom' => '1', 'idPodKom'=>'1']);
        $idKom = $this->request('POST', "User/get_komentar/1");
        $this->assertNotContains('id="testiramo da li rade podkomentari', $idKom);
    }
}

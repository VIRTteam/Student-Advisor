<?php

/**
 * Created by PhpStorm.
 * User: tamarasekularac
 * Date: 6/20/16
 * Time: 4:23 AM
 */
class Moderator_podkomentarTest extends TestCase
{
    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'vesic', 'password' => 'vesic1']);
    }

    public function test_put_podkomentar(){
        $this->request('POST', "Moderator/dodaj_podkomentar", ['comment' =>'testiramo da li rade podkomentari', 'idKom'=>'1']);
        $idKom = $this->request('POST', "Moderator/get_podkomentar/1");
        $this->assertContains('testiramo da li rade podkomentari', $idKom);
    }

    public function test_delete_podkomentar()
    {
        $output = $this->request('POST', "User_toggle/obrisi_podkomentar", ['idKom' => '1', 'idPodKom'=>'1']);
        $idKom = $this->request('POST', "Moderator/get_komentar/1");
        $this->assertNotContains('id="testiramo da li rade podkomentari', $idKom);
    }
}

<?php

/**
 * Created by PhpStorm.
 * User: tamarasekularac
 * Date: 6/18/16
 * Time: 11:20 PM
 */
class Moderator_predavac_obradaTest extends TestCase
{
    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'tasa', 'password' => 'tasa123']);
    }

    public function test_put_novi_predavac(){
        $output = $this->request('POST', "Moderator/put_novi_predavac", ['ime' =>'Sanja', 'prezime'=>'delcev', 'email'=>'sanjadelcev@gmail.com',
            'katedra'=>'RTI', 'godinaZaposlenja'=>'2015', 'opis'=>'','zvanje'=>'saradnik']);
        $this->assertContains("Sanja delcev",$output);
    }
    public function test_edit_predavac()
    {
        $output = $this->request('POST', "Moderator/edit_predavac", ['idPred' => '32', 'ime' => 'Sanja', 'prezime' => 'Delcev', 'email' => 'sanjadelcev@hotmail.com',
            'katedra' => 'RTI', 'godinaZaposlenja' => '2015', 'opis' => '', 'zvanje' => 'saradnik']);
        $this->assertContains("Sanja Delcev", $output);
    }
    public function test_delete_predavac()
    {
        $output = $this->request('POST', "User_toggle/obrisi_predavac", ['idPred' => '32']);
        $this->assertNotContains('id="pretraga32"', $output);
    }
}

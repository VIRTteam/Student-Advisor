<?php

/**
 * Created by PhpStorm.
 * User: tamarasekularac
 * Date: 6/18/16
 * Time: 10:48 PM
 */
class Moderator_kurs_obradaTest extends TestCase
{
    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'tasa', 'password' => 'tasa123']);
    }

    public function test_put_novi_kurs(){
        $output = $this->request('POST', "Moderator/put_novi_kurs", ['ime' =>'Verovatnoca istatistika', 'opis'=>'']);
        $this->assertContains("Verovatnoca istatistika",$output);
    }
    public function test_edit_kurs()
    {
        $output = $this->request('POST', "Moderator/edit_kurs", ['idKurs'=>'115','ime' =>'Verovatnoca i statistika', 'opis'=>'']);
        $this->assertContains("Verovatnoca i statistika", $output);
    }
    public function test_delete_kurs()
    {
        $output = $this->request('POST', "User_toggle/obrisi_kurs", ['idKurs' => '115']);
        $this->assertNotContains('id="pretraga115"', $output);
    }
}
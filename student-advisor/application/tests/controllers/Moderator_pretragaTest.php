<?php

/**
 * Created by PhpStorm.
 * User: tamarasekularac
 * Date: 6/18/16
 * Time: 10:44 PM
 */
class Moderator_pretragaTest extends TestCase
{
    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'tasa', 'password' => 'tasa123']);
    }

    public function test_pretraga_clan(){

        $output = $this->request('POST', "Moderator/get_pretraga_clan/Badi");
        $this->assertContains("Badi Bojovic",$output);

    }
    public function test_pretraga_predavac(){

        $output = $this->request('POST', "Moderator/get_pretraga_predavac/Cvetanovic");
        $this->assertContains("Milos Cvetanovic",$output);

    }
    public function test_pretraga_profesor(){

        $output = $this->request('POST', "Moderator/get_pretraga_kurs/Princi");
        $this->assertContains("Principi softverskog inženjerstva",$output);

    }
}

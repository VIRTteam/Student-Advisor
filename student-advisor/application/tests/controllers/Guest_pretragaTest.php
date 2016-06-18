<?php

/**
 * Created by PhpStorm.
 * User: tamarasekularac
 * Date: 6/18/16
 * Time: 10:46 PM
 */
class Guest_pretragaTest extends PHPUnit_Framework_TestCase
{
    public function test_pretraga_clan(){

        $output = $this->request('POST', "Guest/get_pretraga_clan/Badi");
        $this->assertContains("Badi Bojovic",$output);

    }
    public function test_pretraga_predavac(){

        $output = $this->request('POST', "Guest/get_pretraga_predavac/Cvetanovic");
        $this->assertContains("Milos Cvetanovic",$output);

    }
    public function test_pretraga_profesor(){

        $output = $this->request('POST', "Guest/get_pretraga_kurs/Princi");
        $this->assertContains("Principi softverskog inženjerstva",$output);

    }
}

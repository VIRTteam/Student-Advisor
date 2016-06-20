<?php

/**
 * Created by PhpStorm.
 * User: tamarasekularac
 * Date: 6/20/16
 * Time: 4:58 AM
 */
class Moderator_izmenaPodatakaTest extends TestCase
{
    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'vesic', 'password' => 'vesic1']);
    }
    public function test_izmenaPodataka(){
        $output=$this->request('POST', "Moderator/put_izmena_profila", ['ime' =>'Isidora', 'prezime'=>'Bojovic',
            'email'=>'isi@gmail.com', 'pol'=>'z','smer'=>'SI', 'godUpis'=>'2015', 'opis'=>'sreca, sreca, radost','datumRodj'=>'1994-04-06']);
        $this->assertContains('sreca, sreca, radost', $output);

    }
}

<?php

class RegistracijaTest extends TestCase
{
    public function test_registracija(){
        $output=$this->request('POST', "Guest/registracija_obrada", ['ime' =>'Mina', 'prezime'=>'Sekularac',
            'email'=>'mica@gmail.com', 'pol'=>'z','smer'=>'SI', 'godUpis'=>'2017', 'opis'=>'','datumRodj'=>'1998-06-16',
            'username'=>'minsi', 'password'=>'minsi1']);
        $this->assertContains('<h1>Ulogujte Se</h1>', $output);

    }
}

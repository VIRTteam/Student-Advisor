<?php

class LoginTest extends TestCase
{
    
    public function testFailedLogin(){
        
        $output = $this->request('POST', "Guest/provera_username_password", ['username' => 'isi', 'password' => 'isi']);
        //$this->assertContains("<h1>Uloguj Se</h1>",$output);
        $this->assertEquals("ne_postoji",$output,"");
    }

    public function testAcceptLogin(){

        $output = $this->request('POST', "Guest/provera_username_password", ['username' => 'isi', 'password' => 'isi1']);
        //$this->assertContains("<h1>Uloguj Se</h1>",$output);
        $this->assertEquals("postoji",$output,"");

        $output = $this->request('POST', "Guest/logovanje_obrada", ['username' => 'isi', 'password' => 'isi1']);

        $this->assertContains("<tittle>Isidora Bojovic</tittle>",$output);


    }
}
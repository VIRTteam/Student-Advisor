<?php

/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 18/06/2016
 * Time: 2:48 AM
 */
@session_start();
class User_messagesTest extends TestCase
{

    public function setUp()
    {
        $this->request('POST', "Guest/logovanje_obrada", ['username' => 'isi', 'password' => 'isi1']);
    }

    public function testget_clan_poruke_posalji(){

        $output = $this->request('POST', "User/get_clan_poruke_posalji/21", ['tekst' => 'Caoo ja sam vlada gde si sta radis']);
        $this->assertContains("Caoo ja sam vlada gde si sta radis",$output);

    }
    public function testget_clan_poruke(){

        $output = $this->request('POST', "User/get_clan_poruke/1");
        $this->assertContains('<h4 style="margin-top: 3px">Tamara Sekularac</h4>',$output);

    }
}

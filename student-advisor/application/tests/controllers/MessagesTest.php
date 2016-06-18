<?php

/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 18/06/2016
 * Time: 2:48 AM
 */
@session_start();
class MessagesTest extends TestCase
{

    public function setUp()
    {
        //$this->object = new \User();
        //$output = $this->request('POST', "Guest/logovanje_obrada", ['username' => 'isi', 'password' => 'isi1']);

        if (session_status() == PHP_SESSION_NONE)
            session_start();

        $_SESSION['username'] = "isi";
        $_SESSION['pass'] = "isi1";
        session_commit();
    }

    public function testget_clan_poruke_posalji(){




        $output = $this->request('POST', "User/get_clan_poruke_posalji/21", ['tekst' => 'Caoo ja sam vlada gde si sta radis']);
        $this->assertContains("Caoo ja sam vlada gde si sta radis",$output);

        $this->assertEquals("Caoo ja sam vlada gde si sta radis",$output,"");
    }
}

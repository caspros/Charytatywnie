<?php

class Logowanie2Test extends \PHPUnit\Framework\TestCase
{
    public function testEmail()
    {
        $logowanie = new \App\Models2\Logowanie2;
        $result = $logowanie->Email();
        $this->assertEquals($result,'admin@gmail.com');
    }

    public function testHaslo()
    {
        $logowanie = new \App\Models2\Logowanie2;
        $result = $logowanie->Haslo();
        $this->assertEquals($result,'admin');
    }

}
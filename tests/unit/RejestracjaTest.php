<?php

class RejestracjaTest extends \PHPUnit\Framework\TestCase
{
    public function testImie()
    {
    	$rejestracja = new \App\Models\Rejestracja;
    	$result = $rejestracja->Imie();
    	$this->assertEquals($result,'Admin');
    }

    public function testNazwisko()
    {
    	$rejestracja = new \App\Models\Rejestracja;
    	$result = $rejestracja->Nazwisko();
    	$this->assertEquals($result,'Adminowski');
    }

    public function testEmail()
    {
    	$rejestracja = new \App\Models\Rejestracja;
    	$result = $rejestracja->Email();
    	$this->assertEquals($result,'admin@gmail.com');
    }
   
    public function testRegulamin()
    {
        $rejestracja = new \App\Models\Rejestracja;
        $result = $rejestracja->Regulamin();
        $this->assertTrue(true);
    }
}
<?php

class Profil2Test extends \PHPUnit\Framework\TestCase
{
    public function testUlica()
    {
    	$profil2 = new \App\Models2\Profil2;
    	$result = $profil2->Ulica();
    	$this->assertEquals($result,'Piekielna');
    }

    public function testNumerDomu()
    {
    	$profil2 = new \App\Models2\Profil2;
    	$result = $profil2->NumerDomu();
    	$this->assertEquals($result,'666');
    }

    public function testNumerMieszkania()
    {
    	$profil2 = new \App\Models2\Profil2;
    	$result = $profil2->NumerMieszkania();
    	$this->assertEquals($result,'65');
    }
   
    public function testKodPocztowy()
    {
        $profil2 = new \App\Models2\Profil2;
        $result = $profil2->KodPocztowy();
        $this->assertEquals($result,'66-666');
    }

    public function testMiasto()
    {
        $profil2 = new \App\Models2\Profil2;
        $result = $profil2->Miasto();
         $this->assertEquals($result,'Piekło');
    }
}
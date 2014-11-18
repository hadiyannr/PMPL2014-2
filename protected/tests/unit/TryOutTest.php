<?php

class TryOutTest extends CDbTestCase
{
	//Positive Test Case
	public function testIsRegisteredTestUserRegistered(){
		$model = new Tryout();
		$model->id = 500;
		$this->assertEquals(
			500,
			$model->id
		);
		$pengguna = new Pengguna();
		$pengguna->id = 1000;
		$this->assertEquals(
			1000,
			$pengguna->id
		);
		$pengerjaanTryout = new Pengerjaantryout();
		$pengerjaanTryout->id = 10000;
		$pengerjaanTryout->idPengguna = $pengguna->id;
		$pengerjaanTryout->idTryout = $model->id;
		$this->assertEquals(
			10000,
			$pengerjaanTryout->id
		);
		$this->assertEquals(
			1000,
			$pengerjaanTryout->idPengguna
		);
		$this->assertEquals(
			500,
			$pengerjaanTryout->idTryout
		);
		$this->assertEquals(
			true,
			$model->isRegistered($pengguna->id)
		);
	}

	//Negative Test Case
	public function testIsRegisteredTestUserNotRegistered(){
		$model = new Tryout();
		$model->id = 500;
		$pengguna = new pengguna();
		$pengguna->id = 1000;
		$PengerjaanTryout = new Pengerjaantryout();
		$PengerjaanTryout->id = 10000;
		$PengerjaanTryout->idPengguna = 1001;
		$PengerjaanTryout->idTryout = $model->id;
		$this->assertEquals(
			false,
			$model->isRegistered($pengguna->id)
		);
	}

	//Positive Test Case
	public function testStatusTestAssertEquals(){
		
	}

	//Negative Test Case
	public function testStatusTestAssertNotEquals(){
		
	}

	//Negative Test Case
	public function testGetWaktuSelesaiSetWaktuMulaiNull(){
		
	}

	//Negative Test Case
	public function testGetWaktuSelesaiSetWaktuMulaiBefore1970(){
		
	}

	//Positive Test Case
	public function testGetWaktuSelesaiSetDurasiPostive(){
		
	}

	//Negative Test Case
	public function testGetWaktuSelesaiSetDurasiNull(){
		
	}

	//Negative Test Case
	public function testGetWaktuSelesaiSetDurasiZero(){
		
	}

	//Negative Test Case
	public function testGetWaktuSelesaiSetDurasiMinus(){
		
	}
}
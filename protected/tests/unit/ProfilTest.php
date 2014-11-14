<?php

class ProfilTest extends CDbTestCase
{
	public function testProfilJenisKelamin(){
		$model=new Profil();
		$expectedGender="Laki - Laki";
		$model->jenisKelamin=1;
		$this->assertEquals(
			$expectedGender,
			$model->getJenisKelamin()
		); 
	}

	public function testProfilJenisKelaminNotTrue(){
		$model=new Profil();
		$expectedGender="Laki - Laki";
		$model->jenisKelamin=0;
		$this->assertNotEquals(
			$expectedGender,
			$model->getJenisKelamin()
		); 
	}
}
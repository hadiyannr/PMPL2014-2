<?php

class ProfilTest extends CDbTestCase
{
	public function testProfilJenisKelamin(){
		$model=new Profile();
		$expectedGender="Laki - Laki";
		$model->jenisKelamin=1;
		$this->assertEquals(
			$expectedGender,
			$model->getGender()
		); 
	}

	public function testProfilJenisKelaminNotTrue(){
		$model=new Profile();
		$expectedGender="Laki - Laki";
		$model->jenisKelamin=0;
		$this->assertNotEquals(
			$expectedGender,
			$model->getGender()
		); 
	}
}
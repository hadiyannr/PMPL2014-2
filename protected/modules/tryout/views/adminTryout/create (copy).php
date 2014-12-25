<?php
/* @var $this AdminTryoutController */
/* @var $tryoutModel Tryout */

$this->breadcrumbs=array(
	'Tryout'=>array('index'),
	'Buat Uji Coba Kemampuan',
);

$this->menu=array(
	array('label'=>'Daftar Uji Coba', 'url'=>array('index')),	
);
?>

<h1>Buat Uji Coba Kemampuan</h1>

<?php $this->renderPartial('_form', array('tryoutModel'=>$tryoutModel)); ?>
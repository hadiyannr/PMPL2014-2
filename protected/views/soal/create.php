<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Soal'=>array('index'),
	'Buat',
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index')),	
);
?>

<h1>Buat Soal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
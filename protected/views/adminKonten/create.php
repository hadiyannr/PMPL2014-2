<?php
/* @var $this KontenController */
/* @var $model Konten */

$this->breadcrumbs=array(
	'Konten'=>array('index'),
	'Buat Konten',
);

$this->menu=array(
	array('label'=>'Daftar Konten', 'url'=>array('index')),
);
?>

<h1>Buat Konten</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
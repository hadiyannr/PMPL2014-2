<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	'Buat',
);

$this->menu=array(
	array('label'=>'Daftar Kategori', 'url'=>array('index')),	
);
?>

<h1>Buat Kategori</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
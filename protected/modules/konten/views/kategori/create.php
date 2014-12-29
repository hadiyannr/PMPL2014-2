<?php
/* @var $this KategoriController */
/* @var $model ContentCategory */

$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	'Buat',
);

$this->menu=array(
	array('label'=>'Daftar Kategori', 'url'=>array('index')),	
);
?>

<h1>Buat Kategori</h1>

<?php $this->renderPartial('_form', array('kategoriModel'=>$kategoriModel)); ?>
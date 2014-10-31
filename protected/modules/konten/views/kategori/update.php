<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Kategori', 'url'=>array('index')),
	array('label'=>'Buat Kategori', 'url'=>array('create')),
	array('label'=>'Lihat Kategori', 'url'=>array('view', 'id'=>$model->id)),	
);
?>

<h1>Update Kategori <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
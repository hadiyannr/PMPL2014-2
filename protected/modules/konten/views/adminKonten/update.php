<?php
/* @var $this KontenController */
/* @var $model Konten */

$this->breadcrumbs=array(
	'Konten'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Konten', 'url'=>array('index')),
	array('label'=>'Buat Konten', 'url'=>array('create')),
	array('label'=>'Lihat Konten', 'url'=>array('view', 'id'=>$model->id)),	
);
?>

<h1>Ubah Konten <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
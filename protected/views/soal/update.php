<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Soal'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index')),
	array('label'=>'Buat Soal', 'url'=>array('create')),
	array('label'=>'Lihat Soal', 'url'=>array('view', 'id'=>$model->id)),	
);
?>

<h1>Update Soal<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
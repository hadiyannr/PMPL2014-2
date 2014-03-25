<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Tryout'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Tryout', 'url'=>array('index')),
	array('label'=>'Buat Tryout', 'url'=>array('create')),
	array('label'=>'Lihat Tryout', 'url'=>array('view', 'id'=>$model->id)),	
);
?>

<h1>Ubah Tryout <?php echo $model->nama; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
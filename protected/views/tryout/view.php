<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Tryouts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tryout', 'url'=>array('index')),
	array('label'=>'Create Tryout', 'url'=>array('create')),
	array('label'=>'Update Tryout', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tryout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tryout', 'url'=>array('admin')),
);
?>

<h1>View Tryout #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'waktuMulai',
		'durasi',
	),
)); ?>

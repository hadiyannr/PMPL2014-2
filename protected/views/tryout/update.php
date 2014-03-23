<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Tryouts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tryout', 'url'=>array('index')),
	array('label'=>'Create Tryout', 'url'=>array('create')),
	array('label'=>'View Tryout', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tryout', 'url'=>array('admin')),
);
?>

<h1>Update Tryout <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
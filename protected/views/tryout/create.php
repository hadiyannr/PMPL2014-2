<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Tryouts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tryout', 'url'=>array('index')),
	array('label'=>'Manage Tryout', 'url'=>array('admin')),
);
?>

<h1>Create Tryout</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
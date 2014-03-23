<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Tryout'=>array('index'),
	'Buat',
);

$this->menu=array(
	array('label'=>'Daftar Tryout', 'url'=>array('index')),	
);
?>

<h1>Buat Tryout</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
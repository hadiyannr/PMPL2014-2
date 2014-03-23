<?php
/* @var $this TryoutController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tryouts',
);

$this->menu=array(
	array('label'=>'Create Tryout', 'url'=>array('create')),
	array('label'=>'Manage Tryout', 'url'=>array('admin')),
);
?>

<h1>Tryouts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

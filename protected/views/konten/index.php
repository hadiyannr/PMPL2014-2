<?php
/* @var $this KontenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kontens',
);

$this->menu=array(
	array('label'=>'Create Konten', 'url'=>array('create')),
	array('label'=>'Manage Konten', 'url'=>array('admin')),
);
?>

<h1>Kontens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

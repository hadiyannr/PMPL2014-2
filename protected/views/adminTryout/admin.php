<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Tryout',	
);

$this->menu=array(
	array('label'=>'Daftar Tryout', 'url'=>array('index')),
	array('label'=>'Buat Tryout', 'url'=>array('create')),
);

?>

<h1>Manajemen Tryout</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tryout-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'id',
                'nama',
                'tanggal',
		'waktuMulai',
		'durasi',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

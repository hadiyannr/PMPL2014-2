<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Soal',	
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index')),
	array('label'=>'Buat Soal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tryout-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manajemen Soal</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tryout-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(		
                'nomor',
		'pertanyaan',		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

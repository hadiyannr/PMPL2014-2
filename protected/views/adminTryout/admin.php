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
	'columns'=>array(
		'id',
                'nama',
                'tanggal',
		'waktuMulai',
		'durasi',
                array(
                        'name' => 'idAdmin0.username',
                        'header' =>'Last edited By',
                        'value' => $model->idAdmin0['username'],
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

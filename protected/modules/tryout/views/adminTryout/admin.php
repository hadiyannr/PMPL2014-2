<?php
/* @var $this TryoutController */
/* @var $tryoutModel Tryout */

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
	'dataProvider'=>$tryoutModel->search(),
    'ajaxUpdate'=>false,
	'columns'=>array(
		'id',
                'nama',
                'tanggal',
		'waktuMulai',
		'durasi',
                array(
                        'name' => 'idAdmin0.username',
                        'header' =>'Last edited By',
                        'value' => $tryoutModel->idAdmin0['username'],
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

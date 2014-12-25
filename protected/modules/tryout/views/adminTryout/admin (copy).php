<?php
/* @var $this TryoutController */
/* @var $tryoutModel Tryout */

$this->breadcrumbs=array(
	'Uji Coba Kemampuan',	
);

$this->menu=array(
	array('label'=>'Daftar Uji Coba', 'url'=>array('index')),
	array('label'=>'Buat Uji Coba Baru', 'url'=>array('create')),
);

?>

<h1>Manajemen Tryout</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tryout-grid',
	'dataProvider'=>$tryoutModel->search(),
    'ajaxUpdate'=>false,
    'summaryText' => 'Menampilkan {start} - {end} dari {count} daftar uji coba ',
	'columns'=>array(
		'id',
                'nama',
                'tanggal',
		'waktuMulai',
		'durasi',
                array(
                        'name' => 'idAdmin0.username',
                        'header' =>'Terakhir diedit oleh',
                        'value' => $tryoutModel->idAdmin0['username'],
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

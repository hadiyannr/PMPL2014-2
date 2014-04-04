<?php
/* @var $this KontenController */
/* @var $model Konten */

$this->breadcrumbs=array(
	'Konten',	
);

$this->menu=array(	
	array('label'=>'Buat Konten', 'url'=>array('create')),
);

?>

<h1>Manajemen Konten</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'konten-grid',
	'dataProvider'=>$model->search(),	
	'columns'=>array(
		'id',
		'kategori.nama',                
		'judul',
                array(
			'name' => 'isPublished',
			'header' => 'Status Publikasi',
			'value' => '(($data->isPublished == 1) ? "Terpublikasi" : "Draf")',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

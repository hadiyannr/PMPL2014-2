<?php
/* @var $this KontenController */
/* @var $contentModel Konten */

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
	'summaryText' => 'Menampilkan {start} - {end} dari {count} daftar konten ',
	'dataProvider'=>new CActiveDataProvider(Konten::model()),
    'ajaxUpdate'=>false,
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
                        'name' => 'idAdmin0.username',
                        'header' =>'Terakhir di edit oleh',                        
                        'value' => $contentModel->idAdmin0['username'],
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

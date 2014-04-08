<?php
/* @var $this KontenController */
/* @var $model Konten */

$this->breadcrumbs=array(
	'Konten'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar Konten', 'url'=>array('index')),
	array('label'=>'Buat Konten', 'url'=>array('create')),
	array('label'=>'Ubah Konten', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Konten', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Anda yakin akan menghapus item ini?')),	
);
?>

<h1>Lihat Konten #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kategori.nama',
		'judul',
		array(
			'name' => 'isPublished',
			'header' => 'Status Publikasi',
			'value' => (($model->isPublished == 1) ? "Terpublikasi" : "Draf"),
		),
                array(
                        'name' => 'Editor',
                        'header' =>'Last edited By',
                        'value' => $model->idAdmin0['username'],
                ),
	),
)); ?>

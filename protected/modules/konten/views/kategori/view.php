<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar Kategori', 'url'=>array('index')),
	array('label'=>'Buat Kategori', 'url'=>array('create')),
	array('label'=>'Ubah Kategori', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Kategori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>

<h1>View Kategori #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>

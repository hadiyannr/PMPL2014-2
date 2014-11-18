<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$kategoriModel->id,
);

$this->menu=array(
	array('label'=>'Daftar Kategori', 'url'=>array('index')),
	array('label'=>'Buat Kategori', 'url'=>array('create')),
	array('label'=>'Ubah Kategori', 'url'=>array('update', 'id'=>$kategoriModel->id)),
	array('label'=>'Hapus Kategori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$kategoriModel->id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>

<h1>View Kategori #<?php echo $kategoriModel->id; ?></h1>
<br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$kategoriModel,
	'attributes'=>array(
		'id',
		'nama',
	),
)); ?>

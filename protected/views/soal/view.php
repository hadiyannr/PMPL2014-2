<?php
/* @var $this TryoutController */
/* @var $model Tryout */

$this->breadcrumbs=array(
	'Soal'=>array('index'),
	$model->nomor,
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index')),
	array('label'=>'Buat Soal', 'url'=>array('create')),
	array('label'=>'Ubah Soal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Hapus Soal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Anda yakin akan menghapus tryout ini?')),	
);
?>

<h1>Lihat Soal</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nomor',
		'pertanyaan',
	),
)); 
    
    
?>

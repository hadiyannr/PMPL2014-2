<?php
/* @var $this KontenController */
/* @var $contentModel Konten */

$this->breadcrumbs=array(
	'Konten'=>array('index'),
	$contentModel->id=>array('view','id'=>$contentModel->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Konten', 'url'=>array('index')),
	array('label'=>'Buat Konten', 'url'=>array('create')),
	array('label'=>'Lihat Konten', 'url'=>array('view', 'id'=>$contentModel->id)),
);
?>

<h1>Ubah Konten <?php echo $contentModel->id; ?></h1>

<?php $this->renderPartial('_form', array('contentModel'=>$contentModel), false, true); ?>
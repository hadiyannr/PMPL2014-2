<?php
/* @var $this KategoriController */
/* @var $model ContentCategory */

$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	$kategoriModel->id=>array('view','id'=>$kategoriModel->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Kategori', 'url'=>array('index')),
	array('label'=>'Buat Kategori', 'url'=>array('create')),
	array('label'=>'Lihat Kategori', 'url'=>array('view', 'id'=>$kategoriModel->id)),	
);
?>

<h1>Update Kategori <?php echo $kategoriModel->id; ?></h1>

<?php $this->renderPartial('_form', array('kategoriModel'=>$kategoriModel)); ?>
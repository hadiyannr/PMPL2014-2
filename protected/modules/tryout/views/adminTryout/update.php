<?php
/* @var $this AdminTryoutController */
/* @var $tryoutModel Tryout */

$this->breadcrumbs=array(
	'Tryout'=>array('index'),
	$tryoutModel->id=>array('view','id'=>$tryoutModel->id),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Tryout', 'url'=>array('index')),
	array('label'=>'Buat Tryout', 'url'=>array('create')),
	array('label'=>'Lihat Tryout', 'url'=>array('view', 'id'=>$tryoutModel->id)),
);
?>

<h1>Ubah Tryout <?php echo $tryoutModel->nama; ?></h1>

<?php $this->renderPartial('_form', array('tryoutModel'=>$tryoutModel)); ?>
<?php
/* @var $this SoalController */
/* @var $model Soal */

$this->breadcrumbs=array(
        'Tryout'=>array('tryout/index'),
	'Soal'=>array('index?idtryout='.$model->idtryout),
	$model->nomor=>array('view','id'=>$model->nomor),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index?idtryout='.$model->idtryout)),
	array('label'=>'Buat Soal', 'url'=>array('create?idtryout='.$model->idtryout)),	
);
?>

<h1>Ubah Soal <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelOpsi'=>$modelOpsi)); ?>
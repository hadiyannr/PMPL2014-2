<?php
/* @var $this SoalController */
/* @var $questionModel Question */
/* @var $optionModelList Question */

$this->breadcrumbs=array(
        'Tryout'=>array('adminTryout/index'),
	'Soal'=>array('index?idtryout='.$questionModel->idtryout),
	$questionModel->nomor=>array('view','id'=>$questionModel->nomor),
	'Ubah',
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index?idtryout='.$questionModel->idtryout)),
	array('label'=>'Buat Soal', 'url'=>array('create?idtryout='.$questionModel->idtryout)),
);
?>

<h1>Ubah Soal <?php echo $questionModel->id; ?></h1>

<?php $this->renderPartial('_form', array('questionModel'=>$questionModel,'optionModelList'=>$optionModelList)); ?>
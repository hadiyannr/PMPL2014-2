<?php
/* @var $this SoalController */
/* @var $model Soal */

$this->breadcrumbs=array(
        'Tryout'=>array('tryout/index'),
	'Soal'=>array('index?idtryout='.$model->idtryout),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index?idtryout='.$model->idtryout)),	
);
?>

<h1>Buat Soal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
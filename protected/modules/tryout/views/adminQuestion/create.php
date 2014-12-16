<?php
/* @var $this AdminQuestionController */
/* @var $questionModel Question */
/* @var $optionModelList  */

$this->breadcrumbs=array(
        'Tryout'=>array('adminTryout/index'),
	'Soal'=>array('index?idtryout='.$questionModel->idtryout),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Soal', 'url'=>array('index?idtryout='.$questionModel->idtryout)),
);
?>

<h1>Buat Soal</h1>

<?php $this->renderPartial('_form', array('questionModel'=>$questionModel,'optionModelList'=>$optionModelList)); ?>
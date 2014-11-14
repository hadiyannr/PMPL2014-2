<?php
/**
 * Created by PhpStorm.
 * User: hanifnaufal
 * Date: 5/13/14
 * Time: 6:28 PM
 */
/* @var $this AdminSoalController */
/* @var $questionModel Soal */

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

<?php $this->renderPartial('_formStory', array('questionModel'=>$questionModel)); ?>
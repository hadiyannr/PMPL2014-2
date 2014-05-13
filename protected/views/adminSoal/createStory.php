<?php
/**
 * Created by PhpStorm.
 * User: hanifnaufal
 * Date: 5/13/14
 * Time: 6:28 PM
 */
/* @var $this AdminSoalController */
/* @var $model Soal */

$this->breadcrumbs=array(
    'Tryout'=>array('adminTryout/index'),
    'Soal'=>array('index?idtryout='.$model->idtryout),
    'Create',
);

$this->menu=array(
    array('label'=>'Daftar Soal', 'url'=>array('index?idtryout='.$model->idtryout)),
);
?>

    <h1>Buat Soal</h1>

<?php $this->renderPartial('_formStory', array('model'=>$model)); ?>
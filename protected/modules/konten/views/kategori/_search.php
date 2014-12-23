<?php
/* @var $this KategoriController */
/* @var $model KategoriKonten */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($kategoriModel,'id'); ?>
		<?php echo $form->textField($kategoriModel,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($kategoriModel,'nama'); ?>
		<?php echo $form->textField($kategoriModel,'nama',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
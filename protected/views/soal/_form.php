<?php
/* @var $this SoalController */
/* @var $model Soal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'soal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">		
		<?php echo $form->hiddenField($model,'idtryout'); ?>		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pertanyaan'); ?>
		<?php echo $form->textArea($model,'pertanyaan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pertanyaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomor'); ?>
		<?php echo $form->textField($model,'nomor'); ?>
		<?php echo $form->error($model,'nomor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
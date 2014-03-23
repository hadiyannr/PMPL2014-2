<?php
/* @var $this TryoutController */
/* @var $model Tryout */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tryout-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'waktuMulai'); ?>
		<?php echo $form->textField($model,'waktuMulai',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'waktuMulai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'durasi'); ?>
		<?php echo $form->textField($model,'durasi'); ?>
		<?php echo $form->error($model,'durasi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
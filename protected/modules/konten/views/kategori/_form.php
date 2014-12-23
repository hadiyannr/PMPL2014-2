<?php
/* @var $this KategoriController */
/* @var $model KategoriKonten */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategori-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Isian bertanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($kategoriModel); ?>

	<div class="row">
		<?php echo $form->labelEx($kategoriModel,'nama'); ?>
		<?php echo $form->textField($kategoriModel,'nama',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($kategoriModel,'nama'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($kategoriModel->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
/* @var $this KontenController */
/* @var $model Konten */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcategory'); ?>
		<?php echo $form->dropDownList($model,'idcategory',  Kategori::model()->getOptionList()); ?>
	</div>
	

	<div class="row">
		<?php echo $form->label($model,'judul'); ?>
		<?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>99)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isPublished'); ?>
		<?php echo $form->checkbox($model, 'isPublished'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
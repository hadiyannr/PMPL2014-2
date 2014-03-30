<?php
/* @var $this KontenController */
/* @var $model Konten */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'konten-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Isian bertanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idcategory'); ?>
		<?php echo $form->dropDownList($model,'idcategory',  Kategori::model()->getOptionList()); ?>
		<?php echo $form->error($model,'idcategory'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isi'); ?>
		<?php // echo $form->textArea($model,'isi',array('rows'=>6, 'cols'=>50)); ?>
                <?php 
                    $this->widget('application.extensions.tinymce.ETinyMce', 
                            array(
                                'model'=>$model,                                
                                'attribute'=>'isi',
                                'editorTemplate'=>'full',
                                'htmlOptions'=>array('rows'=>6,'cols'=>50,'class'=>'tinymce'),
                            ));
                ?>
		<?php echo $form->error($model,'isi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'judul'); ?>
		<?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>99)); ?>
		<?php echo $form->error($model,'judul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isPublished'); ?>
		<?php echo $form->checkbox($model, 'isPublished'); ?>
		<?php echo $form->error($model,'isPublished'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
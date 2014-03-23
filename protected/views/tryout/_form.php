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
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama'); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => CHtml::activeName($model, 'waktuMulai'),
                        'value' => $model->attributes['waktuMulai'],
                        'options'=>array(
                                'showAnim'=>'fold',
                                'dateFormat'=>'yy-mm-dd',
                        ),

                     ));
                ?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'waktuMulai'); ?>
		<?php 
                    $this->widget('application.extensions.timepicker.timepicker', array(                        
                        'model'=>$model,
                        'name'=>'waktuMulai',
                        'select'=> 'time',
                        'options' => array(
                            'showOn'=>'focus',
                            'timeFormat'=>'hh:mm',
                        ),
                    ));
                ?>
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
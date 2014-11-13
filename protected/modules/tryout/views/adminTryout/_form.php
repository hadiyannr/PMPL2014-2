<?php
/* @var $this AdminTryoutController */
/* @var $tryoutModel Tryout */
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

	<p class="note">Isian bertanda <span class="required">*</span> wajib diisi.</p>
	
        
        
        <div class="row">
		<?php echo $form->labelEx($tryoutModel,'nama'); ?>
		<?php echo $form->textField($tryoutModel,'nama'); ?>
		<?php echo $form->error($tryoutModel,'nama'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($tryoutModel,'tanggal'); ?>
		<?php 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => CHtml::activeName($tryoutModel, 'tanggal'),
                        'value' => $tryoutModel->attributes['tanggal'],
                        'htmlOptions'=>array('readonly'=>'readonly'),
                        'options'=>array(
                                'showAnim'=>'fold',
                                'dateFormat'=>'yy-mm-dd',
                        ),

                     ));
                ?>
		<?php echo $form->error($tryoutModel,'tanggal'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($tryoutModel,'waktuMulai'); ?>
		<?php 
                    $this->widget('tryout.extensions.timepicker.timepicker', array(
                        'model'=>$tryoutModel,
                        'name'=>'waktuMulai',
                        'select'=> 'time',
                        'options' => array(
                            'showOn'=>'focus',
                            'timeFormat'=>'hh:mm',
                        ),
                        'id'=>'timepicker',
                    ));
        ?>
		<?php echo $form->error($tryoutModel,'waktuMulai'); ?>
	</div>
    <script>$('#timepicker').prop('readonly', true);</script>
	<div class="row">
		<?php echo $form->labelEx($tryoutModel,'durasi'); ?>
		<?php echo $form->textField($tryoutModel,'durasi'); ?>
		<?php echo $form->error($tryoutModel,'durasi'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($tryoutModel->isNewRecord ? 'Buat' : 'Simpan'); ?>
                <?php echo CHtml::Button('Batal',array(
                          'submit'=>$this->createUrl('index'))); ?>                
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
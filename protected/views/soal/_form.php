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
		<?php // echo $form->textArea($model,'pertanyaan',array('rows'=>6, 'cols'=>50)); ?>
                <?php 
                    $this->widget('application.extensions.tinymce.ETinyMce', 
                            array(
                                'model'=>$model,                                
                                'attribute'=>'pertanyaan',
                                'editorTemplate'=>'full',
                                'htmlOptions'=>array('rows'=>6,'cols'=>50,'class'=>'tinymce'),
                            ));
                ?>
		<?php echo $form->error($model,'pertanyaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomor'); ?>
		<?php echo $form->textField($model,'nomor'); ?>
		<?php echo $form->error($model,'nomor'); ?>
	</div>

        
        <?php 
            if(isset($modelOpsi)){
            for($i = 0; $i < 5; $i++){ 
        ?>
        <div class="row">
            
		<?php 
                    $check = '';
                    if($modelOpsi[$i]->isJawaban == 1){$check = ' checked';};
                    $radio ='&nbsp;'
                        . '<input '
                        . 'type="radio" '
                        . 'name="Opsi[jawaban]" '
                        . 'value="'.$i.'"'
                        . ' required'
                        . $check
                        . '>'; 
                        echo $form->labelEx($modelOpsi[$i],'opsi ke '.($i + 1).$radio); ?>
		<?php echo $form->textArea($modelOpsi[$i],'['.$i.']pernyataan',array('rows'=>2, 'cols'=>40)); ?>                                                
		<?php echo $form->error($modelOpsi[$i],'['.$i.']pernyataan'); ?>
            
                <?php echo $form->hiddenField($modelOpsi[$i],'['.$i.']idsoal',array('value'=>0)); ?>
                <?php echo $form->hiddenField($modelOpsi[$i],'['.$i.']nomor',array('value'=>$i)); ?>                
	</div>
        <?php }}?>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
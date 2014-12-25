<?php
/* @var $this AdminQuestionController */
/* @var $questionModel Question */
/* @var $optionModelList  */
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

	<p class="note">Isian bertanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($questionModel); ?>

        <div class="row">
		<?php echo $form->hiddenField($questionModel,'idtryout'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($questionModel,'pertanyaan'); ?>
                <?php
                    $this->widget('tryout.extensions.tinymce.ETinyMce',
                            array(
                                'model'=>$questionModel,
                                'attribute'=>'pertanyaan',
                                'editorTemplate'=>'full',
                                'htmlOptions'=>array('rows'=>6,'cols'=>50,'class'=>'tinymce'),
                            ));
                ?>
		<?php echo $form->error($questionModel,'pertanyaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($questionModel,'nomor'); ?>
		<?php echo $form->textField($questionModel,'nomor',array('readOnly'=>   true)); ?>
    		<?php echo $form->error($questionModel,'nomor'); ?>
	</div>
        <?php

            for($i = 0; $i < 5; $i++){ 
        ?>
        <div class="row">
            
		<?php 
                $check = '';
                if($optionModelList[$i]->isJawaban == 1){$check = ' checked';};
                $radio ='&nbsp;'.'<input '.'type="radio" '.'name="Option[jawaban]" '.'value="'.$i.'"'.' required '.$check.'>';
                echo $form->labelEx($optionModelList[$i],'opsi ke '.($i + 1).$radio); ?>

                <?php
                $this->widget('tryout.extensions.tinymce.ETinyMce',
                    array(
                        'model'=>$optionModelList[$i],
                        'attribute'=>'['.$i.']pernyataan',
                        'htmlOptions'=>array('rows'=>1,'cols'=>40,'class'=>'tinymce'),
                        'plugins'=>array('tiny_mce_wiris'),
                        'options'=>array(
                            'theme'=>'advanced',
                            'theme_advanced_buttons3'=>'tiny_mce_wiris_formulaEditor,tiny_mce_wiris_CAS',
                        ),
                    ));
                ?>

<!--                --><?php //echo $form->textArea($modelOpsi[$i],'['.$i.']pernyataan',array('rows'=>2, 'cols'=>40,'required'=>'required')); ?>
                <?php echo $form->error($optionModelList[$i],'['.$i.']pernyataan'); ?>
                <?php echo $form->hiddenField($optionModelList[$i],'['.$i.']idsoal',array('value'=>0)); ?>
                <?php echo $form->hiddenField($optionModelList[$i],'['.$i.']nomor',array('value'=>$i)); ?>
	    </div>
        <?php }?>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($questionModel->isNewRecord ? 'Buat' : 'Simpan'); ?>
                <?php echo CHtml::Button('Batal',array(
                          'submit'=>$this->createUrl('adminQuestion/index',array('idtryout'=>$questionModel->idtryout)))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
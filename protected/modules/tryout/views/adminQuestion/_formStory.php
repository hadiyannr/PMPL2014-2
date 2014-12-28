<?php
/* @var $this AdminQuestionController */
/* @var $questionModel Question */
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
        <?php echo $form->textField($questionModel,'nomor',array('required'=>'required')); ?>
        <?php echo $form->error($questionModel,'nomor'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($questionModel->isNewRecord ? 'Buat' : 'Simpan'); ?>
        <?php echo CHtml::link('Batal',array(
                'index','idtryout'=>$questionModel->idtryout),
            array('class'=>'btn btn-danger')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
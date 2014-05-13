<?php
/* @var $this AdminSoalController */
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

    <p class="note">Isian bertanda <span class="required">*</span> wajib diisi.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->hiddenField($model,'idtryout'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'pertanyaan'); ?>
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
        <?php echo $form->textField($model,'nomor',array('required'=>'required')); ?>
        <?php echo $form->error($model,'nomor'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan'); ?>
        <?php echo CHtml::Button('Batal',array(
            'submit'=>$this->createUrl('adminSoal/index',array('idtryout'=>$model->idtryout)))); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
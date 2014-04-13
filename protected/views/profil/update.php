<div class="col-md-4">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'profil-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <!--<form class="form" role="form">-->    
    <div class="form-group">
        <label><?php echo $form->labelEx($model, 'nama'); ?></label>
        <?php echo $form->textField($model, 'nama', array('class' => 'form-control', 'placeholder' => 'Nama')); ?>
        <?php echo $form->error($model, 'nama'); ?>
    </div>
    <div class="form-group">
        <label><?php echo $form->labelEx($model, 'jenisKelamin'); ?></label><br>        
        <?php
            $accountStatus = array(1 => 'Laki - Laki', 0 => 'Perempuan');
            echo $form->radioButtonList($model, 'jenisKelamin', $accountStatus, array('separator' => '<br>'));
            echo $form->error($model, 'jenisKelamin');
        ?>        
    </div>

    <div class="form-group">       
        <label for="tanggal"><?php echo $form->labelEx($model, 'tanggalLahir'); ?></label><br>
        <?php 
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => CHtml::activeName($model, 'tanggalLahir'),
                'value' => $model->attributes['tanggalLahir'],
                'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd',
                ),

             ));
        ?>
    </div>
    
    <div class="form-group">
        <label><?php echo $form->labelEx($model, 'asalSma'); ?></label>
        <?php echo $form->textField($model, 'asalSma', array('class' => 'form-control', 'placeholder' => 'Asal Sma')); ?>
        <?php echo $form->error($model, 'asalSma'); ?>
    </div>
    
    <div class="form-group">
        <label>Jurusan yang diinginkan</label>
        <?php $this->renderPartial('targetJurusanOpt');?>
    </div>
    
    <div class="form-group">
        <img src="" width="100" height="50" alt="" class="img-rounded img-responsive" />
        <label>Foto</label>
        <?php echo $form->fileField($model, 'image');?>
        <?php echo $form->error($model, 'image'); ?>
    </div>
    
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan',array('class'=>'btn btn-primary')); ?>    
    <?php     
        echo CHtml::link('Batal',array('site/index'),array('class'=>'btn btn-danger')); 
    ?>    
    <!--</form>-->
<?php $this->endWidget(); ?>
</div>
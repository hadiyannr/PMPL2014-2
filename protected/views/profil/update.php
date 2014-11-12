<?php
/* @var $this ProfilController */
/* @var $model Profil */

$this->breadcrumbs = array(
    'Profil'=>array("index"),
    'Ubah Profil',
);
echo '<br>';
?>
<div class="title text-center">
    <h2>Ubah Profil</h2>
</div>
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
        <p>
            <?php
                $accountStatus = array(1 => 'Laki - Laki', 0 => 'Perempuan');
                echo $form->radioButtonList($model, 'jenisKelamin', $accountStatus, array('separator' => '&nbsp'));
                echo $form->error($model, 'jenisKelamin');
            ?> 
        </p>  
               
    </div>

    <div class="form-group">       
        <label for="tanggal"><?php echo $form->labelEx($model, 'tanggalLahir'); ?></label><br>
        <?php 
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name' => CHtml::activeName($model, 'tanggalLahir'),
                'value' => $model->attributes['tanggalLahir'],
                'htmlOptions'=>array('readonly'=>'readonly'),
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
        <?php $this->renderPartial('targetJurusanOpt',array('model'=>$model));?>
    </div>

    <div class="form-group">
        <img src="" width="100" height="50" alt="" class="img-rounded img-responsive" />
        <label>Foto</label>
        <img id="photo" src="<?php
            if($model->fotoUrl == null){
                echo Yii::app()->request->baseUrl.'/images/photo.png';
            }else{
                echo Yii::app()->request->baseUrl.'/images/profilPic/'.$model->fotoUrl;
            }
        ?>" alt="" class="img-rounded img-responsive" width="100px"/>
        <?php echo $form->fileField($model, 'image',array('id'=>'fileField'));?>
        <?php echo $form->error($model, 'image'); ?>
    </div>
    
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Buat' : 'Simpan',array('class'=>'btn btn-primary')); ?>    
    <?php     
        echo CHtml::link('Batal',array('site/index'),array('class'=>'btn btn-danger')); 
    ?>    
    <!--</form>-->
<?php $this->endWidget(); ?>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileField").change(function(){
        readURL(this);
    });
</script>
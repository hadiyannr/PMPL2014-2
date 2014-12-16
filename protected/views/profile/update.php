<?php
/* @var $this ProfileController */
/* @var $profilModel Profile */

$this->breadcrumbs = array(
    'Profil'=>array("index"),
    'Ubah Profil',
    );
echo '<br>';
?>
<div class="profil-box">
<div class="title text-center">
    <h2>Ubah Profil</h2>
</div>
    <div class="row">
        <div class="col-md-6">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'profil-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                ));
                ?>
                <!--<form class="form" role="form">-->    
                <div class="form-group">
                    <label><?php echo $form->labelEx($profilModel, 'nama'); ?></label>
                    <?php echo $form->textField($profilModel, 'nama', array('class' => 'form-control', 'placeholder' => 'Nama')); ?>
                    <?php echo $form->error($profilModel, 'nama'); ?>
                </div>
                <div class="form-group">
                    <label><?php echo $form->labelEx($profilModel, 'jenisKelamin'); ?></label><br>
                    <div class="form-jenis">
                        <?php
                        $accountStatus = array(1 => 'Laki - Laki', 0 => 'Perempuan');
                        echo $form->radioButtonList($profilModel, 'jenisKelamin', $accountStatus, array('separator' => '&nbsp'));
                        echo $form->error($profilModel, 'jenisKelamin');
                        ?> 
                    </div>  

                </div>

                <div class="form-group">       
                    <label for="tanggal"><?php echo $form->labelEx($profilModel, 'tanggalLahir'); ?></label><br>
                    <div class="form-profil">
                        <?php 
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'name' => CHtml::activeName($profilModel, 'tanggalLahir'),
                            'value' => $profilModel->attributes['tanggalLahir'],
                            'htmlOptions'=>array('readonly'=>'readonly'),
                            'options'=>array(
                                'showAnim'=>'fold',
                                'dateFormat'=>'yy-mm-dd',
                                ),

                            ));
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?php echo $form->labelEx($profilModel, 'asalSma'); ?></label>
                        <?php echo $form->textField($profilModel, 'asalSma', array('class' => 'form-control', 'placeholder' => 'Asal Sma')); ?>
                        <?php echo $form->error($profilModel, 'asalSma'); ?>
                    </div>

                    <div class="form-group">
                        <label>Jurusan yang diinginkan</label>
                        <div class="form-profil"><?php $this->renderPartial('targetJurusanOpt',array('model'=>$profilModel));?></div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group float-foto">
                        <img src="" width="100" height="50" alt="" class="img-rounded img-responsive" />
                        <img id="photo" src="<?php
                        if($profilModel->fotoUrl == null){
                            echo Yii::app()->request->baseUrl.'/images/photo.png';
                        }else{
                            echo Yii::app()->request->baseUrl.'/images/profilPic/'.$profilModel->fotoUrl;
                        }
                        ?>" alt="" class="img-rounded img-responsive" width="100px"/>
                        <?php echo $form->fileField($profilModel, 'image',array('id'=>'fileField'));?>
                        <?php echo $form->error($profilModel, 'image'); ?>
                    </div>
                </div>
            </div>

            <div class="btn-ubah-profil">
                <?php echo CHtml::submitButton($profilModel->isNewRecord ? 'Buat' : 'Simpan',array('class'=>'btn btn-primary')); ?>    
                <?php     
                echo CHtml::link('Batal',array('site/index'),array('class'=>'btn btn-danger')); 
                ?>    
                <!--</form>-->
                <?php $this->endWidget(); ?>    
            </div>
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
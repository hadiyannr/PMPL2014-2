<?php
/* @var $this AdminContentController */
/* @var $contentModel Konten */
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
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Isian bertanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($contentModel); ?>
    <div class="row">
        <?php echo $form->labelEx($contentModel,'judul'); ?>
        <?php echo $form->textField($contentModel,'judul',array('size'=>60,'maxlength'=>99)); ?>
        <?php echo $form->error($contentModel,'judul'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($contentModel,'idcategory'); ?>
		<?php echo $form->dropDownList($contentModel,'idcategory',  KategoriKonten::model()->getOptionList()); ?>
		<?php echo $form->error($contentModel,'idcategory'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($contentModel,'isi'); ?>
                <?php 
                    $this->widget('konten.extensions.tinymce.ETinyMce',
                            array(
                                'model'=>$contentModel,
                                'attribute'=>'isi',
                                'editorTemplate'=>'full',
                                'htmlOptions'=>array('rows'=>6,'cols'=>50,'class'=>'tinymce'),
                            ));
                ?>
		<?php echo $form->error($contentModel,'isi'); ?>
	</div>

    <div class="row">
        <img src="" width="100" height="50" alt="" class="img-rounded img-responsive" />
        <label>Foto</label>
        <img id="photo" src="<?php
        if($contentModel->imagepath == null){
            echo Yii::app()->request->baseUrl.'/images/park-chan-hee.png';
        }else{
            echo Yii::app()->request->baseUrl.'/images/ContentPic/'.$contentModel->imagepath;
        }
        ?>" alt="" class="img-rounded img-responsive" width="100px"/>
        <?php echo $form->fileField($contentModel, 'image',array('id'=>'fileField'));?>
        <?php echo $form->error($contentModel, 'image'); ?>
    </div>



	<div class="row">
		<?php echo $form->labelEx($contentModel,'isPublished'); ?>
		<?php echo $form->checkbox($contentModel, 'isPublished'); ?>
		<?php echo $form->error($contentModel,'isPublished'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($contentModel->isNewRecord ? 'Buat' : 'Simpan', array('class'=>'btn btn-primary')); ?>
                <?php echo CHtml::link('Batal',array(
                          'index'),
                          array('class'=>'btn btn-danger')); ?>
	</div>        
<?php $this->endWidget(); ?>

</div><!-- form -->

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
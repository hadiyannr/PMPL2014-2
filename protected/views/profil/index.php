<?php
/* @var $this ProfilController */
/* @var $model Profil */

$this->breadcrumbs = array(
    'Profil',
);
?>
<div class="row">
    <div class="col-sm-2 col-md-2">
        <img src="<?php
            if($model->fotoUrl == null){                
                echo Yii::app()->request->baseUrl.'/images/photo.png';
            }else{
                echo Yii::app()->request->baseUrl.'/images/profilPic/'.$model->fotoUrl;
            }
        ?>" alt="" class="img-rounded img-responsive" />
    </div>
    
    <div class="col-sm-4 col-md-4">
        <blockquote>            
            <h3><?php echo $model->nama;?></h3> 
        </blockquote>        
        <p><i class="glyphicon glyphicon-user"></i> <?php echo $model->getJenisKelamin();?></p>
        <p><i class="glyphicon glyphicon-gift"></i> <?php echo $model->tanggalLahir;?></p>
        <p><i class="glyphicon glyphicon-briefcase"></i> <?php echo $model->asalSma;?></p>
        <p><i class="glyphicon glyphicon-screenshot"></i> <?php echo $model->targetJurusan;?></p>
        <?php echo CHtml::link('Ubah',array('update'),array('class'=>'btn btn-primary'));?>
    </div>
    
</div>
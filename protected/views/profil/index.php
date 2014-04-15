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
        <p><i class="glyphicon glyphicon-user" rel="jenisKelamin" title="Jenis Kelamin"></i> <?php echo $model->getJenisKelamin();?></p>
        <p><i class="glyphicon glyphicon-gift" rel="tanggalLahir" title="Tanggal Lahir"></i> <?php echo $model->tanggalLahir;?></p>
        <p><i class="glyphicon glyphicon-briefcase" rel="asalSma" title="Asal Sma"></i> <?php echo $model->asalSma;?></p>
        <p><i class="glyphicon glyphicon-screenshot" rel="jurusan" title="Jurusan yang diinginkan"></i> <?php echo $model->targetJurusan;?></p>
        <?php echo CHtml::link('Ubah Profil',array('update'),array('class'=>'btn btn-primary'));?>
        <?php echo CHtml::link('Riwayat Tryout',array('pengerjaanTryout/history'),array('class'=>'btn btn-success'));?>
    </div>        
</div>
<script>
    $(document).ready(function(){
        $("[rel=jenisKelamin]").tooltip({ placement: 'left'});
        $("[rel=tanggalLahir]").tooltip({ placement: 'left'});
        $("[rel=asalSMA]").tooltip({ placement: 'left'});
        $("[rel=jurusan]").tooltip({ placement: 'left'});
    });
</script>
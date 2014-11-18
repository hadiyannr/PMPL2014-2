<?php
/* @var $this ProfilController */
/* @var $model Profil */

$this->breadcrumbs = array(
    'Profil',
    );
echo '<br>';
?>
<div class="profil-box">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-6">
                <img src="<?php
                if($profilModel->fotoUrl == null){                
                    echo Yii::app()->request->baseUrl.'/images/photo.png';
                }else{
                    echo Yii::app()->request->baseUrl.'/images/profilPic/'.$profilModel->fotoUrl;
                }
                ?>" alt="" class="img-responsive" />


            </div>
            <div class="col-sm-6">         
                <h3 class="nama"><?php echo $profilModel->nama;?></h3>        
                <div>
                    <label>Jenis Kelamin</label>
                    <p><?php echo $profilModel->getJenisKelamin();?></p>
                </div>
                <div>
                    <label>Tanggal Lahir</label>
                    <p><?php echo $profilModel->tanggalLahir;?></p>
                </div>
                <div>
                    <label>Asal SMA</label>
                    <p><?php echo $profilModel->asalSma;?></p>
                </div>
                <div>
                    <label>Target Jurusan</label>
                    <p><?php echo $profilModel->targetJurusan;?></p>
                </div>
            </div>
        </div>    

        <div class="col-md-6">         
            <div class="float-btn-profil">
                <div class="btn-profil"><?php if(Yii::app()->user->id == $profilModel->idPengguna)echo CHtml::link('Ubah Profil',array('update'),array('class'=>'btn btn-primary'));?></div>
                <div class="btn-profil"><?php if(Yii::app()->user->id == $profilModel->idPengguna)echo CHtml::link('Riwayat Tryout',array('pengerjaanTryout/history'),array('class'=>'btn btn-primary'));?></div>
                <div class="btn-profil"><?php if(Yii::app()->user->id == $profilModel->idPengguna)echo CHtml::link('Ubah Password',array('ubahPassword'),array('class'=>'btn btn-primary'));?></div>
            </div>
        </div>     
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
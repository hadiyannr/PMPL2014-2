<?php
/* @var $this KontenController */

$this->breadcrumbs=array(
	'Daftar Konten'=>array('daftar'),
        'Konten'
);
?>

<br>
<div class="col-md-7 column" style="border-right: 1px solid #eee;">
    <div class="text-center">
        <h1><?php echo $konten->judul;?></h1>
        <?php if(Yii::app()->user->isAdmin()){
            echo '('.CHtml::link('edit',array('adminKonten/update','id'=>$konten->id)).")";
        }?>
    </div>
    <?php echo $konten->isi;?>
</div>
<div class="pull-right">
    Share:
    <?php    
    $this->widget('application.extensions.social.SocialShareWidget', array(
        'url' => 'localhost/'.Yii::app()->request->url,                  //required
        'services' => array('facebook','google', 'twitter'),       //optional        
        'popup' => true,                               //optional
    ));
    ?>
</div>
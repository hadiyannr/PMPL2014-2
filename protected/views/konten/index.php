<?php
/* @var $this KontenController */
/* @var $konten Konten */

$this->breadcrumbs=array(
    $konten->kategori->nama => array('kategori','idcategory'=>$konten->idcategory),
    $konten->judul,
);
?>

<br>
<div class="col-md-10 column" style="border-right: 1px solid #eee; background-color: #bdc3c7;">
    <div class="col-md-12 column" style="border-right: 1px solid #eee; background-color: #ecf0f1; margin:5px;">
        <div class="text-center">
            <h1><?php echo $konten->judul;?></h1>
            <?php if(Yii::app()->user->isAdmin()){
                echo '('.CHtml::link('edit',array('adminKonten/update','id'=>$konten->id)).")";
            }?>
        </div>
        <?php echo $konten->isi;?>
    </div>
</div>
<div class="pull-right">
    Share:
    <?php
//    echo Yii::app()->params['site'].Yii::app()->request->url;
    $this->widget('application.extensions.social.SocialShareWidget', array(
        'url' => Yii::app()->params['site'].'/'.Yii::app()->request->url,                  //required
        'services' => array('facebook'),       //optional
        'popup' => true,                               //optional
    ));
    ?>
</div>
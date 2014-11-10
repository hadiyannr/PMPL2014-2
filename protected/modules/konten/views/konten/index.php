<?php
/* @var $this KontenController */
/* @var $konten Konten */

$this->breadcrumbs=array(
    $konten->kategori->nama => array('kategori','idcategory'=>$konten->idcategory),
    $konten->judul,
    );
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="isi-konten">
                <h1 class="judul-isi-konten"><?php echo $konten->judul;?></h1>
                <?php if(Yii::app()->user->isAdmin()){
                    echo '('.CHtml::link('edit',array('adminKonten/update','id'=>$konten->id)).")";
                }?>
                <?php echo $konten->isi;?>
            </div>
        </div>
        <div class="navigasi-konten">
            <a class="link-navigasi-konten pull-left" href="#">Judul Sebelumnya</a>
            <a class="link-navigasi-konten pull-right" href="#">Judul Selanjutnya</a>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- <div class="pull-right">
        Share:
        <?php
//    echo Yii::app()->params['site'].Yii::app()->request->url;
        $this->widget('konten.extensions.social.SocialShareWidget', array(
        'url' => Yii::app()->params['site'].'/'.Yii::app()->request->url,                  //required
        'services' => array('facebook'),       //optional
        'popup' => true,                               //optional
        ));
        ?>
    </div> -->
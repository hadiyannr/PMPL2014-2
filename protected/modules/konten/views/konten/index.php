<?php
/* @var $this KontenController */
/* @var $contentModel Konten */

$this->breadcrumbs=array(
    $contentModel->kategorikonten->nama => array('kategori','idcategory'=>$contentModel->idcategory),
    $contentModel->judul,
    );
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="isi-konten">
                <h1 class="judul-isi-konten"><?php echo $contentModel->judul;?></h1>
                <?php if(Yii::app()->user->isAdmin()){
                    echo '('.CHtml::link('edit',array('adminContent/update','id'=>$contentModel->id)).")";
                }?>
                <?php echo $contentModel->isi;?>
            </div>
        </div>
        <!--div class="navigasi-konten">
            <a class="link-navigasi-konten pull-left" href="#">Judul Sebelumnya</a>
            <a class="link-navigasi-konten pull-right" href="#">Judul Selanjutnya</a>
            <div class="clearfix"></div>
        </div-->
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
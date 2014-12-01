<?php
/* @var $this SiteController */
/* @var $kontenModel Kontens */
/* @var $randKonten Konten */
?>
<div class="carousel slide home-slider" id="carousel-748657">
    <ol class="carousel-indicators">
        <li class="active" data-slide-to="0" data-target="#carousel-748657">
        </li>
        <li data-slide-to="1" data-target="#carousel-748657">
        </li>
        <li data-slide-to="2" data-target="#carousel-748657">
        </li>
    </ol>
    <div class="carousel-inner">
        <div class="item active" >
            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/Perpusat.jpg">
            <div class="carousel-caption">
                    <h1>UI Bebas Uang Mangkal WOAKWOAK</h1>
                    <p>Khusus untuk Reguler melalui SIMAK, SBMPTN dan SNMPTN tahun 2014. Bebas Uang Pangkal dan dapat mengajukan skema Biaya Operasional Pendidikan (BOP) berkeadilan </p>
            </div>
        </div>
        <div class="item">
            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/01.jpg">
            <div class="carousel-caption">
                    <h1>UI Bebas Uang Pangkal</h1>
                    <p>Khusus untuk Reguler melalui SIMAK, SBMPTN dan SNMPTN tahun 2014. Bebas Uang Pangkal dan dapat mengajukan skema Biaya Operasional Pendidikan (BOP) berkeadilan </p>
            </div>
        </div>
        <div class="item">
            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/rektorat.jpg">
            <div class="carousel-caption">
                    <h1>UI Bebas Uang Pangkal</h1>
                    <p>Khusus untuk Reguler melalui SIMAK, SBMPTN dan SNMPTN tahun 2014. Bebas Uang Pangkal dan dapat mengajukan skema Biaya Operasional Pendidikan (BOP) berkeadilan </p>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-748657" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
    <a class="right carousel-control" href="#carousel-748657" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<div class="container-fluid bg-bright-yellow remove-left-padding">
    <div class="col-md-10 bg-white">
<!--        <div class="col-md-3">-->
<!--            <div class="content-display-box">-->
<!--                <div class="content-display">-->
<!--                    <figure class="content-display">-->
<!--                        <img src="--><?php //echo Yii::app()->request->baseUrl; ?><!--/images/park-chan-hee.png" alt="">-->
<!--                        <figcaption>-->
<!--                            <span>Tips masuk UI oleh mahasiswi cantik </span>-->
<!--                        </figcaption>-->
<!--                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, delectus, accusantium aliquam neque atque eos quam aperiam dolorum alias. Quidem ullam minus atque eos neque repudiandae, adipisci labore nobis corrupti.</p>-->
<!--                         <a class="btn bg-bright-yellow" href="">MORE</a>-->
<!--                    </figure>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <?php
            foreach ($kontenModel as $randKonten): ?>
                <div class="col-md-3">
                    <div class="content-display-box">
                        <div class="content-display">
                            <figure class="content-display">
                                <img src="<?php echo Yii::app()->request->baseUrl. "/images/ContentPic/". $randKonten->imagepath; ?>" alt="">
                                <figcaption>
                                    <span><?php echo $randKonten->judul;?></span>
                                </figcaption>
                                 <p>
                                 <?php
                                     $prev = strip_tags($randKonten->isi);
                                     echo substr($prev, 0, 200)."...";
                                 ?></p>
<!--                                 <a class="btn bg-bright-yellow" href="">MORE</a>-->
                                <?php
                                    echo CHtml::link('MORE',array('/konten/konten/index', 'id'=>$randKonten->id),array('class'=>'btn bg-bright-yellow btn-more-display'));
                                ?>
                            </figure>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>

    </div>
    <div class="col-md-2 home-more">
<!--        <p><a class="btn bg-black ft-bright-yellow" href="">MORE</a></p>-->
        <p>
            <?php
                echo CHtml::link('MORE',array('/konten/konten/kategori', 'idcategory'=>3),array('class'=>'btn bg-black ft-bright-yellow btn-more'));
            ?>
        </p>
    </div>
</div>

 

	<div class="row clearfix">


		<div class="col-md-8">


        </div>

<!--    <div class="row clearfix">-->
<!--        <div class="col-md-12" style="border: 1px solid #eee; margin-top: 25px;">-->
<!--            <div id="main-slider-space">-->
<!--                <div class="slider-wrapper">-->
<!--                    --><?php
//                    $counter=0;
//                    foreach ($kontenModel as $randKonten): ?>
<!--                        <div id="slide--><?php //echo $counter?><!--" class="main-slide">-->
<!--                            <div class="col-md-12 home-group2" style="">-->
<!--                                <h3>--><?php
//                                    echo CHtml::link(substr($randKonten->judul, 0, 27),array('konten/konten/index','id'=>$randKonten->id),array('style'=>"color: #ecf0f1"))?>
<!--                                </h3>-->
<!--                                <p style="color: #ecf0f1"> --><?php
//                                    $prev = strip_tags($randKonten->isi);
//                                    echo substr($prev, 0, 100);
//                                    ?>
<!--                                </p>-->
<!--                                <p class="more">-->
<!--                                    --><?php //echo CHtml::link("More details",array('konten/konten/index','id'=>$randKonten->id),array('style'=>"color: #ecf0f1"))?>
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        --><?php //$counter++;
//                    endforeach; ?>
<!--                </div>-->
<!--            </div>-->
<!--            <div id="main-slider-next" class="slider-buttons pull-right">-->
<!--                <button type="button" class="btn btn-default btn-lg">-->
<!--                    <span class="glyphicon glyphicon-arrow-right"></span>Next-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    
</div>

<script>
    $(document).ready(function() {
        $('.carousel').carousel({             
         	interval: 10000
        });
        $("[rel=tooltip-left]").tooltip({ placement: 'left'});
        $("[rel=tooltip-right]").tooltip({ placement: 'right'});
    });
</script>
<div class="carousel slide" id="carousel-748657" style="max-width: 100%">
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
            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/Perpusat.jpg" style="width: 100%; height:1000px">
            <div class="carousel-caption">
                    <h1>UI Bebas Uang Mangkal WOAKWOAK</h1>
                    <p>Khusus untuk Reguler melalui SIMAK, SBMPTN dan SNMPTN tahun 2014. Bebas Uang <br>Pangkal dan dapat mengajukan skema Biaya Operasional Pendidikan (BOP) berkeadilan </p>
            </div>
        </div>
        <div class="item">
            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/01.jpg" style="width: 100%; height:1000px">
            <div class="carousel-caption">
                    <h1>UI Bebas Uang Pangkal</h1>
                    <p>Khusus untuk Reguler melalui SIMAK, SBMPTN dan SNMPTN tahun 2014. Bebas Uang <br>Pangkal dan dapat mengajukan skema Biaya Operasional Pendidikan (BOP) berkeadilan </p>
            </div>
        </div>
        <div class="item">
            <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/rektorat.jpg" style="width: 100%; height:1000px">
            <div class="carousel-caption">
                    <h1>UI Bebas Uang Pangkal</h1>
                    <p>Khusus untuk Reguler melalui SIMAK, SBMPTN dan SNMPTN tahun 2014. Bebas Uang <br>Pangkal dan dapat mengajukan skema Biaya Operasional Pendidikan (BOP) berkeadilan </p>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-748657" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
    <a class="right carousel-control" href="#carousel-748657" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<div class="container-fluid bg-bright-yellow remove-left-padding">
    <div class="col-md-10 bg-white">
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, delectus, accusantium aliquam neque atque eos quam aperiam dolorum alias. Quidem ullam minus atque eos neque repudiandae, adipisci labore nobis corrupti.</p>
                         <a class="btn bg-bright-yellow" href="">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut accusantium odit nihil veritatis maxime, ad ducimus consectetur, placeat, expedita, ea rem! Rerum doloremque facere magni eum beatae error doloribus, nisi!</p>
                         <a class="btn bg-bright-yellow" href="">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia praesentium reprehenderit eius quaerat debitis laboriosam tenetur voluptate quia laborum ab nobis, dolor, voluptas maxime hic facere laudantium earum minus natus.</p>
                         <a class="btn bg-bright-yellow" href="">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content-display-box">
                <div class="content-display">
                    <figure class="content-display">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/park-chan-hee.png" alt="">
                        <figcaption>
                            <span>Tips masuk UI oleh mahasiswi cantik bangat banget banget banget</span>
                        </figcaption>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem placeat aspernatur sequi, deserunt voluptate nulla, optio voluptatem quisquam cumque nostrum. Laborum ut enim magnam itaque, ea mollitia, error quasi quas.</p>
                         <a class="btn bg-bright-yellow" href="">MORE</a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 home-more">
        <p><a class="btn bg-black ft-bright-yellow" href="">MORE</a></p>
    </div>
</div>

 
    <!--
	<div class="row clearfix">

        
		<div class="col-md-8">
			

        </div>

    <div class="row clearfix">
        <div class="col-md-12" style="border: 1px solid #eee; margin-top: 25px;">
            <div id="main-slider-space">
                <div class="slider-wrapper">
                    <?php
                    $counter=0;
                    foreach ($model as $randKonten): ?>
                        <div id="slide<?php echo $counter?>" class="main-slide">
                            <div class="col-md-12 home-group2" style="">
                                <h3><?php 
                                    echo CHtml::link(substr($randKonten->judul, 0, 27),array('konten/konten/index','id'=>$randKonten->id),array('style'=>"color: #ecf0f1"))?>
                                </h3>
                                <p style="color: #ecf0f1"> <?php
                                    $prev = strip_tags($randKonten->isi);
                                    echo substr($prev, 0, 100);
                                    ?>
                                </p>
                                <p class="more">
                                    <?php echo CHtml::link("More details",array('konten/konten/index','id'=>$randKonten->id),array('style'=>"color: #ecf0f1"))?>
                                </p>
                            </div>
                        </div>
                        <?php $counter++;
                    endforeach; ?>
                </div>
            </div>
            <div id="main-slider-next" class="slider-buttons pull-right">
                <button type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-arrow-right"></span>Next
                </button>
            </div>
        </div>
    </div>
    -->
    
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
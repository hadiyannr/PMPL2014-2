<div class="container">
	<div class="row clearfix">
        <div class="col-md-2 text-left">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fk.png" style="height: 65px" rel="tooltip-left" title="Fakultas Kedokteran"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fkg.png" style="height: 65px" rel="tooltip-left" title="Fakultas Kedokteran Gigi"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fmipa.png" style="height: 65px" rel="tooltip-left" title="Fakultas Matematika dan Ilmu Pengetahuan Alam"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-ft.png" style="height: 65px" rel="tooltip-left" title="Fakultas Teknik"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fh.png" style="height: 65px" rel="tooltip-left" title="Fakultas Hukum"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fe.png" style="height: 65px" rel="tooltip-left" title="Fakultas Ekonomi"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fib.png" style="height: 65px" rel="tooltip-left" title="Fakultas Ilmu Budaya"><br>
        </div>

		<div class="col-md-8">
			<div class="carousel slide" id="carousel-748657" style="width: 100%">
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
						<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/01.jpg" style="width: 100%;">
					</div>
					<div class="item">
						<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/02.jpg" style="width: 100%;">
					</div>
					<div class="item">
						<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/03.jpg" style="width: 100%;">
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-748657" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
				<a class="right carousel-control" href="#carousel-748657" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>

        </div>
        <div class="col-md-2 text-right">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-psikologi.png" style="height: 65px" rel="tooltip-right" title="Fakultas Psikologi"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fisip.png" style="height: 65px" rel="tooltip-right" title="Fakultas Ilmu Sosial dan Ilmu Politik"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fkm.png" style="height: 65px" rel="tooltip-right" title="Fakultas Kesehatan Masyarakat"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fasilkom.png" style="height: 65px" rel="tooltip-right" title="Fakultas Ilmu Komputer"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-fik.png" style="height: 65px" rel="tooltip-right" title="Fakultas Ilmu Keperawatan"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-farmasi.png" style="height: 65px" rel="tooltip-right" title="Fakultas Farmasi"><br>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/makara/makara-ui-vokasi.png" style="height: 65px" rel="tooltip-right" title="Fakultas Vokasi"><br>
        </div>
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
                                <h3><?php echo CHtml::link($randKonten->judul,array('konten/index','id'=>$randKonten->id),array('style'=>"color: #ecf0f1"))?></h3>
                                <p style="color: #ecf0f1"> <?php
                                    $prev = strip_tags($randKonten->isi);
                                    echo substr($prev, 0, 100);
                                    ?>
                                </p>
                                <p class="more">
                                    <?php echo CHtml::link("More details",array('konten/index','id'=>$randKonten->id),array('style'=>"color: #ecf0f1"))?>
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
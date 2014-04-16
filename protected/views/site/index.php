<div class="container">
	<div class="row clearfix">
		<!-- <div class="col-md-3 column"></div> -->
		<div class="col-md-8 column">
			<div class="carousel slide" id="carousel-748657" style="width: 700px">
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
						<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/01.jpg" style="width: 700px; height: 500px">
						<div class="carousel-caption">
							<h4>
								First Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/02.jpg" style="width: 700px; height: 500px">
						<div class="carousel-caption">
							<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/03.jpg" style="width: 700px; height: 500px">
						<div class="carousel-caption">
							<h4>
								Third Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-748657" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
				<a class="right carousel-control" href="#carousel-748657" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
			
			</div>
			<div class="col-md-4" style="border: 2px solid #eee; height: 450px; overflow:scroll;">
			<?php 
				foreach ($model1 as $randKonten): ?>
				<div class="col-md-12 home-group" style="background-color: #1abc9c; ">
					<h3><?php echo CHtml::link($randKonten->judul,array('index','id'=>$randKonten->id),array('style'=>"color: #ecf0f1"))?></h3>
					<p style="color: #ecf0f1"> <?php 
						$prev = strip_tags($randKonten->isi); 
						echo substr($prev, 0, 100);
						?>
					</p>
					<p class="more">
						<?php echo CHtml::link("More details",array('index','id'=>$randKonten->id),array('style'=>"color: #ecf0f1"))?>
					</p>
				</div>					
			<?php endforeach; ?>
			</div>
			<div class="col-md-12" style="border: 1px solid #eee; margin-top: 25px;">
			<div id="main-slider-space">
				    <div class="slider-wrapper">
			<?php
				$counter=0; 
				foreach ($model2 as $randKonten): ?>
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
			<div id="main-slider-next" class="slider-buttons">
				<button type="button" class="btn btn-default btn-lg">
				  <span class="glyphicon glyphicon-arrow-right"></span>Next
				</button>
			</div>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function() {
        $('.carousel').carousel({             
         	interval: 10000
        });
    });
</script>
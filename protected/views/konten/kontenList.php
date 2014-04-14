<?php
/* @var $this KontenController */
/* @var $model Kontens */
$this->breadcrumbs=array(
	'Daftar Konten',
);?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-9 column">
					<div class="carousel slide" id="carousel-748657" style="width: 600px"> 
						<ol class="carousel-indicators">
							<li class="active" data-slide-to="0" data-target="#carousel-748657">
							</li>
							<li data-slide-to="1" data-target="#carousel-748657">
							</li>
							<li data-slide-to="2" data-target="#carousel-748657">
							</li>
						</ol>
						<div class="carousel-inner">
							<div class="item active">
								<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/03.jpg" style="height: 400px;">
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
								<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/05.jpg" style="height: 400px;">
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
								<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/KWG-2011.jpg" style="height: 400px;">
								<div class="carousel-caption">
									<h4>
										Third Thumbnail label
									</h4>
									<p>
										Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
									</p>
								</div>
							</div>
						</div> <a class="left carousel-control" href="#carousel-748657" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-748657" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
					</div>
				</div>
				<?php $counter = 0; ?>
				<div class="col-md-12 column">
				<!-- <div class="panel-group" id="panel-898425" style="margin: 5px;"> -->			
					<?php foreach ($model as $konten):?>
						<!--  -->
						<?php if($counter%3==0):?>
							<div class="rowa">
						<?php endif;?>
						<div class="col-md-4" style="border-right: 1px solid #eee; height: 10em;">
							<h3><?php echo CHtml::link($konten->judul,array('index','id'=>$konten->id))?></h3>
							<p> <?php 
								$prev = $konten->isi; 
								echo substr($prev, 0, 100);
								?>
							</p>
							<p class="more">
								<?php echo CHtml::link("More details",array('index','id'=>$konten->id))?>
							</p>
						</div>

						<?php if($counter%3==2 || $counter == sizeof($model)-1):?>
							</div>
						<?php endif;?>
							
						<?php $counter++;?>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</div>
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
				<div class="col-md-7 column">
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
				<div class="col-md-4 column">
					<!-- <div class="row clearfix">
						<div class="col-md-12 column">
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 column">
						</div>
					</div> -->
					<?php 	$counter = 0; ?>
					<div class="panel-group" id="panel-898425">			
					<?php
					foreach ($model as $konten){?>
						<!-- <div class="col-md-12" overflow: scroll>
						    <?php echo CHtml::link($konten->judul,array('index','id'=>$konten->id))?>
						    <br>
					    </div> -->
					    <?php 
					    	$judul = $konten->judul;
					    if ($counter==0) {?>
					    	<div class="panel panel-default">
								<div class="panel-heading">
									<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-898425" href="#panel-element-<?php echo $counter;?>"><?php echo "$konten->judul" ?></a>
								</div>
								<div id="panel-element-<?php echo $counter;?>" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="col-md-12 column">
											<h2>
												<?php echo $konten->judul;?>
											</h2>
											<p align="justify">
												<?php 
													$prev = $konten->isi;
													echo substr($prev, 0, 100);
												?>
											</p>
											<p>
												<?php echo CHtml::link("More details",array('index','id'=>$konten->id))?>
											</p>
										</div>
									</div>
								</div>
							</div>
					    <?php
					    	$counter++;
					    } 
					    else {?>
					    	<div class="panel panel-default">
							<div class="panel-heading">
								 <a class="panel-title" data-toggle="collapse" data-parent="#panel-898425" href="#panel-element-<?php echo $counter;?>">Fakultas Kedokteran Gigi</a>
							</div>
							<div id="panel-element-<?php echo $counter;?>" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="col-md-12 column">
										<h2>
											<?php echo $konten->judul;?>
										</h2>
										<p align="justify">
											<?php 
												$prev = $konten->isi;
												echo substr($prev, 0, 100);
											?>
										</p>
										<p>
											<?php echo CHtml::link("More details",array('index','id'=>$konten->id))?>
										</p>
									</div>
								</div>
							</div>
						</div>
					    <?php 
					    	$counter++;
					    }?>
					<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
				<div class="col-md-12 column">
					<div class="carousel slide" id="carousel-748657">
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
								<img alt="" src="http://lorempixel.com/1600/500/sports/1">
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
								<img alt="" src="http://lorempixel.com/1600/500/sports/2">
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
								<img alt="" src="http://lorempixel.com/1600/500/sports/3">
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
					<div class="row clearfix">
						<div class="col-md-12 column">
						<!-- Pembatas -->
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-md-12 column">
						<!-- Pemabatas -->
						</div>
					</div>
					<div class="panel-group" id="panel-898425">			
					<?php
					foreach ($model as $konten){?>
						<div class="col-md-12" overflow: scroll>
						    <?php echo CHtml::link($konten->judul,array('index','id'=>$konten->id))?>
						    <br>
					    </div>
						<div class="panel panel-default">
							<div class="panel-heading">
								 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-898425" href="#panel-element-55533"><?php echo "$konten->judul" ?></a>
							</div>
							<div id="panel-element-55533" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="col-md-12 column">
										<h2>
											Program Studi atau Jurusan
										</h2>
										<p align="justify">
											Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
										</p>
										<p>
											<?php echo CHtml::link($konten->judul,array('index','id'=>$konten->id))?>
										</p>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
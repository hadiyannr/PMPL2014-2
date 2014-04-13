<div class="container">
	<div class="row clearfix">
		<!-- <div class="col-md-3 column"></div> -->
		<div class="col-md-12 column">
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
			<!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
			    <ol class="carousel-indicators">
			        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			    </ol>
			    <div class="carousel-inner">
			        <div class="item">
			            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/01.jpg" alt="" style="height: 500px;">
			            <div class="container">
			                <div class="carousel-caption">

			                </div>
			            </div>
			        </div>
			        <div class="item active">
			            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/02.jpg" alt="" style="height: 500px;">
			            <div class="container">
			                <div class="carousel-caption">              
			                </div>
			            </div>
			        </div>
			        <div class="item">
			            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider/03.jpg" alt="" style="height: 500px;">
			            <div class="container">
			                <div class="carousel-caption">

			                </div>
			            </div>
			        </div>
			    </div>
			    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
			    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> -->
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
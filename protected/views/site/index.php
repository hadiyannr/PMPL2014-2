<div id="myCarousel" class="carousel slide" data-ride="carousel">
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
    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div>
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 3000
        });
    });
</script>
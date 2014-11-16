<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
    <!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/screen.css" media="screen, projection" />-->
    <!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/print.css" media="print" />-->

    <!--bootstrap-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.css">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/designPattern.css" />

    <!--font-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>body{font-family: 'Open Sans', sans-serif;}</style>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/jquery-1.11.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.js"></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <header>
        <div class="header-nav">
            <div class="container">


                <div class="navbar-header">
                    <?php echo CHtml::link("Admin SiapMasukUI.com", array('/admin/index'),array('class'=>'navbar-brand')); ?>
                </div>

                <?php $controllerName = $this->getId();?>
                <nav role="navigation" class="navbar-default">
                    <ul class="nav navbar-nav">
                        <?php if(Yii::app()->user->isAdmin()):?>
                            <li class="<?php echo (in_array($controllerName, array("adminKonten")))?"active":""?>">
                                <?php echo CHtml::link("Konten", array('/konten/adminKonten/index'),array('style'=>"color: #ecf0f1")); ?>
                            </li>
                            <li class="<?php echo (in_array($controllerName, array("adminTryout")))?"active":""?>">
                                <?php echo CHtml::link("Tryout", array('/tryout/adminTryout/index'),array('style'=>"color: #ecf0f1")); ?>
                            </li>
                            <li class="<?php echo (in_array($controllerName, array("kategori")))?"active":""?>">
                                <?php echo CHtml::link("Kategori", array('/konten/kategori/index'),array('style'=>"color: #ecf0f1")); ?>
                            </li>
                        <?php endif;?>
                        <li>
                            <?php echo CHtml::link("Web Home", array('/site/index'),array('style'=>"color: #ecf0f1")); ?>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (Yii::app()->user->isGuest) { ?>
                            <li>
                                <a href="#Login" data-toggle="modal" style="color: #ecf0f1">Login</a>
                            </li>
                            <?php } ?>
                            <?php if (!Yii::app()->user->isGuest) { ?>
                                <li>
                                    <?php echo CHtml::link("Logout", array('site/logout'),array('style'=>"color: #ecf0f1")); ?>
                                </li>
                                <?php } ?>
                            </ul>

                            <?php $this->widget('UserLogin',array('visible'=>Yii::app()->user->isGuest)); ?>
                        </nav>
                    </div>
                </div>
            </header>

            <div class="container content">
                <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                       'links'=>$this->breadcrumbs,
                       )); ?><!-- breadcrumbs -->
                   <?php endif?>

                   <?php echo $content; ?>

                   <div class="clear"></div>
               </div>



               <footer>
                <div class="container-fluid">
                    <div class="col-md-3">
                        <p><span class="ft-golden-yellow">SiapMasukUI.com</span> adalah website yang bertujuan mempersiapkan siswa SMA untuk lebih matang dalam menghadapi ujian saringan masuk UI. SiapMasukUi.com memberkan variasi soal TO beserta simulasi dan jawaban TO. Pengguna juga dapat melihat hasil statistik test mereka pada halaman profile pengguna.</p>
                        <p>Fitur forum juga penting untu berdiskusi antar pengguna. Selain itu, terdapat portal berita yang disinkronisasikan dari humas.ui.ac.id.<br>Selamat bergabung!</p>
                        <p><span class="ft-golden-yellow">WE ARE THE YELLOW JACKET!</span></p>

                    </div>
                    <div class="col-md-2 footer-mid">
                        <p>&copy;</p>
                        <p>siapmasukUI.com</p>
                        <p>2014</p>
                    </div>
                    <div class="col-md-7">
                        <div class="col-maps">
                            <div class="col1-maps">
                                <h5>Jelajahi kampus impian kamu disini!</h5>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconGPS.png" alt="">
                            </div>
                            <div class="col2-maps">
                                <div id="map" style="width: 100%; height:100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/gmaps.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/jquery-1.11.0.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.js"></script>
            <script>
                var Site = {
                    init: function(){
                        $('html').removeClass('no-js');
                        if($('#zoom').length)
                            Site.zoom();

                        if($('#map').length)
                            Site.map();
                    },

                    zoom: function() {
                        $('#zoom').elevateZoom({
                            zoomWindowWidth: 300,
                            zoomWindowHeight: 300,
                            easing:true
                        });
                    },

                    map: function() {
                        var mark = new GMaps({
                            div:"#map",
                            lat: -6.368074,
                            lng: 106.829559

                        })
                        mark.addMarker({
                            lat: -6.368074,
                            lng: 106.829559,
                            title: 'Universitas Indonesia',
                            click: function(e) {
                                alert('You clicked in this marker');
                            }
                        });
                    },  
                };

                $(function (){
                    Site.init();
                });

            </script>

        </body>
        </html>

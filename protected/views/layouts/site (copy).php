<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>	
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.css">	
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.css">


        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/designPattern.css" />
        <!--font-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>
    <body>	
        <?php if(Yii::app()->user->hasFlash('message')):?>
        <nav class="user-nav notif-error">
            <div class="container">
                    <?php echo Yii::app()->user->getFlash('message'); ?>
            </div>
        </nav>
        <?php endif;?>

        <header>		
            <div class="header-nav">
                <div class="container">
                    <div class="nav-wrapper">
                        <div class="navbar-header">
                             <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                                <img class="logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="">
                            </a>        
                            <div class="dropdown responsive-nav">
                              <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                <hr><hr><hr>
                              </a>
                                <?php $controllerName = $this->getId();?>
                              <ul class="dropdown-menu responsive-dropdown" role="menu" aria-labelledby="dLabel">
                                     <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #ecf0f1">Konten <b class="caret"></b></a>
                                        <ul>
                                            <?php
                                            $kategoris = Kategori::model()->findAll();
                                            foreach ($kategoris as $kategori): ?>
                                                <li> <?php echo CHtml::link($kategori->nama, array('/konten/konten/viewbycategory','idcategory'=>$kategori->id),array('style'=>"color: #ecf0f1"));?></li>
                                            <?php endforeach;?>
                                        </ul>
                                    </li>
                                    <li class="<?php echo (in_array($controllerName, array("tryout","answerSheet")))?"active":""?>">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/tryout/tryout/index">
                                            <img class="icon" src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconTO.png" alt="">
                                            <span>Uji Coba Kemampuan</span>
                                        </a>
                                    </li>
                                     <li class="<?php echo (in_array($controllerName, array("forum","Thread","User","Post")))?"active":""?>">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/forum">
                                            <img class="icon" src="<?php echo Yii::app()->request->baseUrl; ?>/images/forum.png" alt="">
                                            <span>Forum</span>
                                        </a>
                                    </li>

                                    <?php if(Yii::app()->user->isAdmin()):?>
                                    <li>
                                        <?php echo CHtml::link("Admin", array('/admin/index'),array('style'=>"color: #ecf0f1")); ?>
                                    </li>
                                    <?php endif;?>

                                    <?php if (Yii::app()->user->isGuest) { ?>
                                        <li>
                                            <a href="#Login" data-toggle="modal" style="color: #ecf0f1">Login</a>
                                        </li>      
                                        <li>
                                            <a href="#SignUp" data-toggle="modal" style="color: #ecf0f1">Daftar</a>
                                        </li>                   
                                    <?php } ?>
                                    <?php if (!Yii::app()->user->isGuest) { ?>
                                        <li class="<?php echo (in_array($controllerName, array("profil")))?"active":""?>">
                                            <?php echo CHtml::link("Profil", array('/profile/index'),array('style'=>"color: #ecf0f1")); ?>
                                        </li>      
                                        <li>
                                            <?php echo CHtml::link("Keluar", array('/site/logout'),array('style'=>"color: #ecf0f1")); ?>
                                        </li>                   
                                    <?php } ?>

                              </ul>
                            </div>
                        </div>
                        <nav role="navigation" class="navbar-default">
                            <ul class="nav navbar-nav">                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #ecf0f1">Konten <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $kategoris = Kategori::model()->findAll();
                                        foreach ($kategoris as $kategori): ?>
                                            <li> <?php echo CHtml::link($kategori->nama, array('/konten/konten/viewbycategory','idcategory'=>$kategori->id),array('style'=>"color: #ecf0f1"));?></li>
                                        <?php endforeach;?>
                                    </ul>
                                </li>
                                <li class="<?php echo (in_array($controllerName, array("tryout","answerSheet")))?"active":""?>">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/tryout/tryout/index">
                                        <img class="icon" src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconTO.png" alt="">
                                        <span>Uji Coba Kemampuan</span>
                                    </a>
                                </li>

                                <li class="<?php echo (in_array($controllerName, array("forum","Thread","User","Post")))?"active":""?>">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/forum">
                                        <img class="icon" src="<?php echo Yii::app()->request->baseUrl; ?>/images/forum.png" alt="">
                                        <span>Forum</span>
                                    </a>
                                </li>

                                <?php if(Yii::app()->user->isAdmin()):?>
                                <li>
                                    <?php echo CHtml::link("Admin", array('/admin/index'),array('style'=>"color: #ecf0f1")); ?>
                                </li>
                                <?php endif;?>

                            </ul> 
                            <ul class="nav navbar-nav navbar-right">
                                
                                <?php if (Yii::app()->user->isGuest) { ?>
                                    <li>
                                        <a href="#Login" data-toggle="modal" style="color: #ecf0f1">Masuk</a>
                                    </li>      
                                    <li>
                                        <a href="#SignUp" data-toggle="modal" style="color: #ecf0f1">Daftar</a>
                                    </li>                   
                                <?php } ?>
                                <?php if (!Yii::app()->user->isGuest) { ?>
                                    <li class="<?php echo (in_array($controllerName, array("profil")))?"active":""?>">
                                        <?php echo CHtml::link("Profil", array('/profile/index'),array('style'=>"color: #ecf0f1")); ?>
                                    </li>      
                                    <li>
                                        <?php echo CHtml::link("Keluar", array('/site/logout'),array('style'=>"color: #ecf0f1")); ?>
                                    </li>                   
                                <?php } ?>
                            </ul>             
                            <!--login and register modal, call component-->
                            <?php $this->widget('UserLogin',array('visible'=>Yii::app()->user->isGuest)); ?>

                            <?php $this->widget('UserRegister',array('visible'=>Yii::app()->user->isGuest)); ?>
                            <!-- end of modal -->
    
                        </nav>  

                    </div>
                                            
                </div>
            </div>
        </header>
        
        <div class="content-home <?php if ($_SESSION['home'] == false): ?><?php echo "nothome"?><?php endif ?> ">
             <div class="container">
                <div class="pull-left">
                    <?php if(isset($this->breadcrumbs)):?>
                        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
                    <?php endif?>
                </div>
<!--                --><?php //$this->widget('Search')?>
            </div>
            <?php if ($_SESSION['home'] == true): ?>
                <?php echo $content ?>
                <?php $_SESSION['home'] = false ?>
            <?php else: ?>
                <div class="container">
                    <?php echo $content;?>
                </div>
            <?php endif ?>
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

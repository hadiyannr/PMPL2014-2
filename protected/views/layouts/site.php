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

        <!--font-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <style>body{font-family: 'Open Sans', sans-serif;}</style>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/jquery-1.11.0.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.js"></script>			
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.js"></script>
    </head>
    <body>	
        <?php if(Yii::app()->user->hasFlash('message')):?>
        <nav class="user-nav text-right" style="background-color: #e74c3c; color:#ecf0f1;font-size: 20px;">
            <div class="container">
                    <?php echo Yii::app()->user->getFlash('message'); ?>
            </div>
        </nav>
        <?php endif;?>

        <header>		
            <div class="header-nav">
                <div class="container">
                    
                        
                        <div class="navbar-header">
                            <?php echo CHtml::link("SiapMasukUI.com", array('site/index'),array('class'=>'navbar-brand')); ?>                            
                        </div>
                        <?php $controllerName = $this->getId();?>
                        <nav role="navigation" class="navbar-default">
                            <ul class="nav navbar-nav">                                
                                <li class="<?php echo (in_array($controllerName, array("site")))?"active":""?>">
                                    <?php echo CHtml::link("Home", array('site/index'),array('style'=>"color: #ecf0f1")); ?>
                                </li>                                        

                                <li class="dropdown">
                                    <?php $coloring= (in_array($controllerName, array("konten")))?"background-color: #27ae60;":""?>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="<?php echo $coloring;?>color: #ecf0f1">Konten <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $kategoris = Kategori::model()->findAll();
                                        foreach ($kategoris as $kategori): ?>
                                            <li> <?php echo CHtml::link($kategori->nama, array('konten/kategori','idcategory'=>$kategori->id),array('style'=>"color: #ecf0f1"));?></li>
                                        <?php endforeach;?>
                                    </ul>
                                </li>
                                <li class="<?php echo (in_array($controllerName, array("tryout","pengerjaanTryout")))?"active":""?>">
                                    <?php echo CHtml::link("Tryout", array('tryout/index'),array('style'=>"color: #ecf0f1")); ?>
                                </li>

                                <?php if(Yii::app()->user->isAdmin()):?>
                                <li>
                                    <?php echo CHtml::link("Admin", array('admin/index'),array('style'=>"color: #ecf0f1")); ?>
                                </li>
                                <?php endif;?>

                            </ul> 

                            <ul class="nav navbar-nav navbar-right">		      	
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
                                        <?php echo CHtml::link("Profil", array('profil/index'),array('style'=>"color: #ecf0f1")); ?>
                                    </li>      
                                    <li>
                                        <?php echo CHtml::link("Logout", array('site/logout'),array('style'=>"color: #ecf0f1")); ?>
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

            <?php $this->widget('Search')?>
            <br><br><br>
        </header>

        <div class="content">
            <div class="container">
                <?php echo $content;?>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 social">
                        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico-facebook.png" alt="FB"><span>FACEBOOK</span></a>
                        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico-twitter.png" alt="Twitter"><span>TWITTER</span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="#">ABOUT</a>&nbsp;&middot;&nbsp;
                        <a href="#">PRIVACY POLICY</a>&nbsp;&middot;&nbsp;
                        <a href="#">CONTACT</a>&nbsp&nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Copyright &copy; <?php echo date('Y'); ?> by SiapMasukUI.com<br/>
                    </div>
                </div>
            </div>
        </footer>       
    </body>
</html>

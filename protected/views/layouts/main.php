<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/screen.css" media="screen, projection" />-->
<!--	<link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->request->baseUrl; ?><!--/css/print.css" media="print" />-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <!--bootstrap-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.css">

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
                    <?php echo CHtml::link("Admin SiapMasukUI.com", array('admin/index'),array('class'=>'navbar-brand')); ?>
                </div>

                <?php $controllerName = $this->getId();?>
                <nav role="navigation" class="navbar-default">
                    <?php if(Yii::app()->user->isAdmin()):?>
                    <ul class="nav navbar-nav">
                        <li class="<?php echo (in_array($controllerName, array("admin")))?"active":""?>">
                            <?php echo CHtml::link("Home", array('admin/index'),array('style'=>"color: #ecf0f1")); ?>
                        </li>
                        <li class="<?php echo (in_array($controllerName, array("adminKonten")))?"active":""?>">
                            <?php echo CHtml::link("Konten", array('adminKonten/index'),array('style'=>"color: #ecf0f1")); ?>
                        </li>
                        <li class="<?php echo (in_array($controllerName, array("adminTryout")))?"active":""?>">
                            <?php echo CHtml::link("Tryout", array('adminTryout/index'),array('style'=>"color: #ecf0f1")); ?>
                        </li>
                        <?php endif;?>
                        <li>
                            <?php echo CHtml::link("Web Home", array('site/index'),array('style'=>"color: #ecf0f1")); ?>
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

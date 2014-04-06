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
    </head>
    <body>	
        <?php if(Yii::app()->user->hasFlash('message')):?>
        <nav class="user-nav text-right" style="background-color: black; color:wheat;font-size: 20px;">
            <div class="container">
                    <?php echo Yii::app()->user->getFlash('message'); ?>
            </div>
        </nav>
        <?php endif;?>
        <header>		
            <div class="header-nav">
                <div class="container">
                    <div class="navbar-header">
                        <a href="" class="navbar-brand">SiapMasukUI.com</a>
                    </div>
                    <nav role="navigation">
                        <ul class="nav navbar-nav">
                            <li>
                                <?php echo CHtml::link("Home", array('site/index')); ?>
                            </li>        
                                <?php $this->widget('KontenKategori'); ?>
                            <li>
                                <?php echo CHtml::link("Tryout", array('tryout/index')); ?>
                            </li>

                        </ul> 

                        <ul class="nav navbar-nav navbar-right">		      	
                            <?php if (Yii::app()->user->isGuest) { ?>
                                <li>
                                    <a href="#Login" data-toggle="modal">Login</a>
                                </li>      
                                <li>
                                    <a href="#SignUp" data-toggle="modal">Daftar</a>
                                </li>        			
                            <?php } ?>
                            <?php if (!Yii::app()->user->isGuest) { ?>
                                <li>
                                    <?php echo CHtml::link("Profil", array('profil/index')); ?>
                                </li>      
                                <li>
                                    <?php echo CHtml::link("Logout", array('site/logout')); ?>
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

            <!-- search bar-->
            <div class="col-xs-5 col-sm-2 pull-right">
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            </div><br><br><br>
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
                        Copyright &copy; <?php echo date('Y'); ?> by SiapMasukUI.com.<br/>
                        
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/jquery-1.11.0.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.js"></script>			
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.js"></script>
    </body>
</html>
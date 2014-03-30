<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8">
        <title>SiapMasukUI</title>	
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.css">	
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.css">
    </head>
    <body>	
        <header>		
            <div class="header-nav">
                <div class="container">
                    <div class="navbar-header">
                        <a href="" class="navbar-brand">SiapMasukUI.com</a>
                    </div>
                    <nav role="navigation">
                        <ul class="nav navbar-nav">
                            <li>
                                <?php echo CHtml::link("Home",array(''));?>
                            </li>        
                            <li>
                                <?php echo CHtml::link("Konten",array(''));?>
                            </li>
                            <li>
                                <?php echo CHtml::link("Tryout",array(''));?>
                            </li>

                        </ul> 

                        <ul class="nav navbar-nav navbar-right">		      	
                            <li>
                                <a href="#Login" data-toggle="modal">Login</a>
                            </li>      
                            <li>
                                <a href="#SignUp" data-toggle="modal">Register</a>
                            </li>        						       
                        </ul> 		      
                    </nav>	

                    <!-- Login & register code -->			

                    <div class="modal fade bs-example-modal-sm" id="Login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                                </div>
                                <div class="modal-body">                                    
                                    <form role="form" method="post" action="<?php Yii::app()->createUrl('site/login')?>">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="Pengguna" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>					  			 					  
                                        <button type="submit" class="btn btn-primary">Login</button>					
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>			        	
                                    </form>                                    
                                    
                                </div>			      
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bs-example-modal-sm" id="SignUp" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Register</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form">			          
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" placeholder="username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" class="form-control" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>				
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password">
                                        </div>					  			 	  			 					  
                                        <button type="submit" class="btn btn-primary">Register</button>					
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>			        	
                                    </form>
                                </div>			      
                            </div>
                        </div>
                    </div>
                    <!-- end of code -->
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
            </div><br>
        </header>

        <div class="content">
            <div class="container">

            </div>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 social">
                        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico-facebook.png" alt="FB"\><span>FACEBOOK</span></a>
                        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ico-twitter.png" alt="Twitter"\><span>TWITTER</span></a>
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
                        &copy;2014 SiapMasukUI.com
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/jquery-1.11.0.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/bootstrap.min.js"></script>			
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/main.js"></script>
    </body>
</html>
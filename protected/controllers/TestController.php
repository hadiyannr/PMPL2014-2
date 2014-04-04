<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestController
 *
 * @author hanifnaufal
 */
class TestController extends Controller{
    
    public $layout='//layouts/site';
    
    public function actionIndex(){
        $model = Pengguna::model()->findAll();
        $inivar = 'aaaa';
        $this->render("index",array('model'=>$model,'x'=>$inivar));
    }
    
    public function actionTest(){                 
        echo CHtml::link('ini link',
                 "#",
                 array("submit"=>array('tulis', 'm'=>"lol"),'confirm' => 'Are you sure?')
                
                ); 
    }
    
    public function actionTulis($m){
        echo $m;
    }       
}

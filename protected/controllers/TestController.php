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
    
    public function actionIndex(){
        $model = Soal::model()->findByPk(1);
        $this->render("index",array('model'=>$model));
    }
    
}

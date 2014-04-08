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
        $tryout = Tryout::model()->findByPk(6);        
        $waktuSelesai = $tryout->getWaktuSelesai();
        echo ';'.$waktuSelesai;
    }
    
    public function actionTulis($m){
        echo $m;
    }       
    
    public function actionTrigger(){
//        echo 'test';
//        for($i=1;$i<=10;$i++){
//            for($j=0;$j<5;$j++){
//                $model = new Opsi;
//                $model->idsoal = $i;
//                $model->isJawaban = $j==0?1:0;
//                $model->nomor = "".$j;
//                $model->pernyataan = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae ";
//                $model->save();
//            }            
//        }
    }    
}

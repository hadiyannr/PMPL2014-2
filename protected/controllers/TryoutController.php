<?php

class TryoutController extends Controller {

    public $layout = '//layouts/site';
    public function actionIndex() {    
        $model = Tryout::model()->findAll();
        $pastTO = array();
        $presentTO = array();
        $futureTO = array();
        foreach($model as $to){
            if($to->status() < 0){
                $pastTO[] = $to;                
            }else if($to->status() == 0){
                $presentTO[] = $to;
            }else{
                $futureTO[] = $to;
            }
        }
        $model = array($presentTO,$futureTO,$pastTO);
        
        if(isset($_POST['Register'])){
            $this->register($_POST['Register']['id']);
        }elseif(isset($_POST['Perform'])){
            
        }elseif(isset($_POST['Statistic'])){
            
        }
        $this->render('index',array('model'=>$model));
    }
    
    public function perform($id){
        echo 'perform' . $id;
    }
    
    public function statistic(){
        
    }
    
    public function register($id){
        if(Yii::app()->user->isGuest){
            Yii::app()->user->setFlash('message',"Login untuk mendaftar");    
        }else{
            $model = new Pengerjaantryout;
            $model->idTryout = $id;
            $model->idPengguna = Yii::app()->user->id;
            $model->save();
            Yii::app()->user->setFlash('message',"anda telah berhasil mendaftar tryout");
        }                
    }
}

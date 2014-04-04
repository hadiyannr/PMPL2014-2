<?php
/* @var $to Tryout */

class TryoutController extends Controller {

    public $layout = '//layouts/site';
    public function actionIndex() {    
        $model = Tryout::model()->findAll();
        $pastTO = array();
        $myTO = array();
        $futureTO = array();
        foreach($model as $to){
            if($to->status() < 0){
                $pastTO[] = $to;
            }else if($to->isRegistered(Yii::app()->user->id)){
                $myTO[] = $to;
            }elseif($to->status()>0){
                $futureTO[] = $to;
            }
        }
        $model = array($myTO,$futureTO,$pastTO);        
        if(isset($_POST['Register'])){
            $this->register($_POST['Register']['id']);
        }elseif(isset($_POST['Perform'])){
            
        }elseif(isset($_POST['Statistic'])){
            $this->statistic($_POST['Statistic']['id']);
            return;
        }
        $this->render('index',array('model'=>$model));
    }
    
    public function perform($id){
        echo 'perform' . $id;
    }
    
    public function statistic($id){        
        $criteria = new CDbCriteria;
        $criteria->order = 'nilai DESC';        
        $criteria->compare('idTryout',$id);        
        $criteria->limit = 10;
        $listPengguna = Pengerjaantryout::model()->findAll($criteria);
        
        $tryoutName = Tryout::model()->findByPk($id)->nama;
        
        $criteria = new CDbCriteria;
        $criteria->select = array("MAX(nilai) as max","MIN(nilai) as min","AVG(nilai) as avg");
        $criteria->compare('idTryout',$id);
        $tryoutStatistic =Pengerjaantryout::model()->find($criteria);
        
        $this->render('statistic',array('listPengguna'=>$listPengguna,'tryoutName'=>$tryoutName,'tryoutStatistic'=>$tryoutStatistic));
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

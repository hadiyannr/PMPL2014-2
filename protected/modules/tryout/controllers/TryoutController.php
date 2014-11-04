<?php
/* @var $to Tryout */
/* @var $tryout Tryout */

class TryoutController extends Controller {

    public $layout = '//layouts/site';
    public function actionIndex() {
        $model = Tryout::model()->findAll();
        $pastTO = array();
        $myTO = array();
        $futureTO = array();
        foreach($model as $to){
            if($to->status() < 0){
                $futureTO[] = $to;
            }else if($to->isRegistered(Yii::app()->user->id)){
                $myTO[] = $to;
            }else{
                $pastTO[] = $to;
            }
        }
        $model = array($myTO,$pastTO,$futureTO);        
        
        
        if(isset($_POST['Register'])){
            $this->register($_POST['Register']['id']);
        }elseif(isset($_POST['Perform'])){
            CController::forward('pengerjaanTryout/perform');
        }elseif(isset($_POST['Statistic'])){
            //CController::forward('statistic');
            $this->redirect(array('statistic','id'=>$_POST['Statistic']['id']));
        }
        
        $this->render('index',array('model'=>$model));
    }    
    
    public function actionStatistic($id){
        $criteria = new CDbCriteria;
        $criteria->order = 'nilai DESC';
        $criteria->compare('idTryout',$id);
        $criteria->compare('isSubmitted',1);

        //pagination code
        $count = PengerjaanTryout::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);

        $listPengerjaan = PengerjaanTryout::model()->findAll($criteria);
        
        $tryoutModel = Tryout::model()->findByPk($id);
        
        $criteria = new CDbCriteria;
        $criteria->select = array("MAX(nilai) as max","MIN(nilai) as min","AVG(nilai) as avg");
        $criteria->compare('idTryout',$id);
        $tryoutStatistic =PengerjaanTryout::model()->find($criteria);

        $this->render('statistic',array('listPengerjaan'=>$listPengerjaan,'tryoutModel'=>$tryoutModel,'tryoutStatistic'=>$tryoutStatistic, 'pages'=>$pages));
    }
    
    public function register($id){
        if(Yii::app()->user->isGuest){
            Yii::app()->user->setFlash('message',"Login untuk mendaftar");    
        }else{
            $model = new PengerjaanTryout;
            $model->idTryout = $id;
            $model->idPengguna = Yii::app()->user->id;
            $model->save();
            Yii::app()->user->setFlash('message',"anda telah berhasil mendaftar tryout");
            $this->refresh();
        }
    }
}

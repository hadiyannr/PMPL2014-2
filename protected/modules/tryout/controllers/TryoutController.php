<?php
/* @var $to Tryout */
/* @var $tryout Tryout */

class TryoutController extends Controller {

    public $layout = '//layouts/site';
    private $statisticPageSize = 10;

    public function actionIndex() {
        $tryoutModelList = Tryout::model()->findAll();
        $pastTryout = array();
        $myTryout = array();
        $futureTO = array();
        foreach($tryoutModelList as $tryout){
            if($tryout->status() < 0){
                $futureTO[] = $tryout;
            }else if($tryout->isRegistered(Yii::app()->user->id)){
                $myTryout[] = $tryout;
            }else{
                $pastTryout[] = $tryout;
            }
        }
        $tryoutModelList = array($myTryout,$pastTryout,$futureTO);
        
        
        if(isset($_POST['Register'])){
            $this->register($_POST['Register']['id']);
        }elseif(isset($_POST['Perform'])){
            CController::forward('answerSheet/perform');
        }elseif(isset($_POST['Statistic'])){
            $this->redirect(array('statistic','id'=>$_POST['Statistic']['id']));
        }
        
        $this->render('index',array('tryoutModelList'=>$tryoutModelList));
    }    
    
    public function actionStatistic($id){
        $criteria = new CDbCriteria;
        $criteria->order = 'nilai DESC';
        $criteria->compare('idTryout',$id);
        $criteria->compare('isSubmitted',1);

        //pagination code
        $count = AnswerSheet::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=$this->statisticPageSize;
        $pages->applyLimit($criteria);

        $answerSheetList = AnswerSheet::model()->findAll($criteria);
        
        $tryoutModel = Tryout::model()->findByPk($id);
        
        $criteria = new CDbCriteria;
        $criteria->select = array("MAX(nilai) as max","MIN(nilai) as min","AVG(nilai) as avg");
        $criteria->compare('idTryout',$id);
        $tryoutStatistic =AnswerSheet::model()->find($criteria);

        $this->render('statistic',array('answerSheetList'=>$answerSheetList,'tryoutModel'=>$tryoutModel,'tryoutStatistic'=>$tryoutStatistic, 'pages'=>$pages));
    }
    
    public function register($id){
        if(Yii::app()->user->isGuest){
            Yii::app()->user->setFlash('message',"Login untuk mendaftar");    
        }else{
            $answerSheetModel = new AnswerSheet;
            $answerSheetModel->idTryout = $id;
            $answerSheetModel->idPengguna = Yii::app()->user->id;
            $answerSheetModel->save();
            Yii::app()->user->setFlash('message',"anda telah berhasil mendaftar tryout");
            $this->refresh();
        }
    }
}

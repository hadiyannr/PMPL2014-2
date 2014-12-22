<?php
/* @var $to Tryout */
/* @var $tryout Tryout */

class TryoutController extends Controller {

    public $layout = '//layouts/site';
    private $statisticPageSize = 10;

    public function actionIndex() {
        $tryoutModelList = Tryout::model()->findAll();
        $tryoutModelList = Tryout::getSeparatedTryout($tryoutModelList);
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
        $criteria = AnswerSheet::getDescendingSubmittedTryoutCriteria($id);
        $count = AnswerSheet::countBasedOfCriteria($criteria);
        $pages=AnswerSheet::getPaginationSetting($count,$this->statisticPageSize,$criteria);
        $answerSheetList = AnswerSheet::model()->findAll($criteria);
        $tryoutModel = Tryout::model()->findByPk($id);
        $tryoutStatistic = AnswerSheet::getStatistic($id);

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

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
            CController::forward('perform');
        }elseif(isset($_POST['Statistic'])){
            CController::forward('statistic');
        }
        
        $this->render('index',array('model'=>$model));
    }
    
    public function actionPerform(){
        $id = $_POST['Perform']['id'];       
        $tryout = Tryout::model()->findByPk($id);                
        $soalList = Soal::model()->findAllByAttributes(array('idtryout' => $id));
        $lembarJawab = Pengerjaantryout::model()->findByAttributes(array('idPengguna'=>Yii::app()->user->id,'idTryout'=>$tryout->id));        
        $jawaban = array();
        foreach($soalList as $soal){
            $jawabanFromDB = Jawaban::model()->findByAttributes(array('idsoal'=>$soal->id));
            if($jawabanFromDB == null){
                $jawaban[$soal->nomor] = new Jawaban;
                $jawaban[$soal->nomor]->idsoal = $soal->id;
                $jawaban[$soal->nomor]->idpengerjaan = $lembarJawab->id;
                $jawaban[$soal->nomor]->isiJawaban = null;
            }else{
                $jawaban[$soal->nomor] = $jawabanFromDB;
            }            
        }
        
        
        
        if(isset($_POST['jawaban'])){            
            foreach($soalList as $soal){
                if(isset($_POST['jawaban'][$soal->nomor])){
                    $jawaban[$soal->nomor]->isiJawaban = $_POST['jawaban'][$soal->nomor];
                    $jawaban[$soal->nomor]->save();                    
                }
                else{
                    if(Jawaban::model()->findAllByAttributes(array('idsoal'=>$soal->id)) != null){
                        $jawaban[$soal->nomor]->delete();
                    }                    
                }                
            }
        }
        
        
        if(isset($_POST['Submit'])){
            $lembarJawab->hitungNilai();
            $lembarJawab->save();
            $this->redirect(array('index'));
        }                
        
        $this->render('exam',array('soalList'=>$soalList, 'tryout'=>$tryout,'jawaban'=>$jawaban));
    }
    
    public function actionStatistic(){        
        $id = $_POST['Statistic']['id'];
        $criteria = new CDbCriteria;
        $criteria->order = 'nilai DESC';        
        $criteria->compare('idTryout',$id);        
        $criteria->limit = 10;
        $listPengguna = Pengerjaantryout::model()->findAll($criteria);
        
        $tryoutModel = Tryout::model()->findByPk($id);
        
        $criteria = new CDbCriteria;
        $criteria->select = array("MAX(nilai) as max","MIN(nilai) as min","AVG(nilai) as avg");
        $criteria->compare('idTryout',$id);
        $tryoutStatistic =Pengerjaantryout::model()->find($criteria);
        
        $this->render('statistic',array('listPengguna'=>$listPengguna,'tryoutModel'=>$tryoutModel,'tryoutStatistic'=>$tryoutStatistic));
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

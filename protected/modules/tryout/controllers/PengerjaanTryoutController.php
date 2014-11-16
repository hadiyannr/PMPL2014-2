<?php

class PengerjaanTryoutController extends Controller
{       
        public $layout = '//layouts/site';
	    public function actionPerform(){
            $idTryout = $_POST['Perform']['id'];
            $tryoutModel = Tryout::model()->findByPk($idTryout);
            $criteria = new CDbCriteria();
            $criteria->order = "nomor ASC,isHasJawaban ASC";
            $questionList = Soal::model()->findAllByAttributes(array('idtryout' => $idTryout),$criteria);
            $answerSheet = PengerjaanTryout::model()->findByAttributes(array('idPengguna'=>Yii::app()->user->id,'idTryout'=>$tryoutModel->id));
            $answerList = array();
            //init jawaban dari db(kalo ada)
            foreach($questionList as $question){
                $answerModel = Jawaban::model()->findByAttributes(array('idsoal'=>$question->id));
                if($answerModel == null){
                    $answerList[$question->nomor] = new Jawaban;
                    $answerList[$question->nomor]->idsoal = $question->id;
                    $answerList[$question->nomor]->idpengerjaan = $answerSheet->id;
                    $answerList[$question->nomor]->isiJawaban = null;
                }else{
                    $answerList[$question->nomor] = $answerModel;
                }            
            }

            if(isset($_POST['jawaban'])){            
                foreach($questionList as $question){
                    if(isset($_POST['jawaban'][$question->nomor])){
                        $answerList[$question->nomor]->isiJawaban = $_POST['jawaban'][$question->nomor];
                        $answerList[$question->nomor]->save();
                    }
                    else{
                        if(Jawaban::model()->findAllByAttributes(array('idsoal'=>$question->id)) != null){
                            $answerList[$question->nomor]->delete();
                        }                    
                    }                
                }
                $answerSheet->hitungNilai();
                $answerSheet->save();
            }
            
            if($tryoutModel->status() < 0 || isset($_POST['Submit'])){
                $answerSheet->isSubmitted = 1;
                $answerSheet->save();
                $this->redirect(array('postExam','id'=>$answerSheet->id));
            }
            
            
            
            $this->render('exam',array('questionList'=>$questionList, 'tryoutModel'=>$tryoutModel,'answerList'=>$answerList));
        }
        
        public function actionPreview($id){
            $idTryout = $id;
            $tryoutModel = Tryout::model()->findByPk($idTryout);
            $criteria = new CDbCriteria();
            $criteria->order = "nomor ASC,isHasJawaban ASC";
            $questionList = Soal::model()->findAllByAttributes(array('idtryout' => $idTryout),$criteria);                                  
            $this->render('preview',array('questionList'=>$questionList, 'tryoutModel'=>$tryoutModel));
        }
        public function actionPostExam($id){
            $answerSheetModel = PengerjaanTryout::model()->findByPk($id);
            $answerSheetDetail = $answerSheetModel->getDetail($answerSheetModel->idTryout);
            $this->render('postExam',array('answerSheetModel'=>$answerSheetModel,'answerSheetDetail'=>$answerSheetDetail));
        }
        
        public function actionHistory(){
            if(isset($_POST['Tryout']['id'])){                  
                $this->redirect(array('result','idTryout'=>$_POST['Tryout']['id']));
            }
            
            $criteria = new CDbCriteria();
            $criteria->join = 'JOIN pengerjaantryout p ON t.id = p.idTryout';
            $criteria->compare('idPengguna', Yii::app()->user->id);
            $tryoutModelList = Tryout::model()->findAll($criteria);
            $this->render('historyList',array('tryoutModelList'=>$tryoutModelList));
        }
        
        public function actionResult($idTryout){
            $answerSheetModel = PengerjaanTryout::model()->findByAttributes(array('idTryout'=>$idTryout,'idPengguna'=>Yii::app()->user->id));
            $answerSheetDetail = $answerSheetModel->getDetail($idTryout);
            
            $questionList = Soal::model()->findAllByAttributes(array('idtryout' => $idTryout));
            $answerList = array();
            foreach($questionList as $question){
                $answerModel = Jawaban::model()->findByAttributes(array('idsoal'=>$question->id));
                $answerList[$question->nomor] = $answerModel;
            }
            
            $this->render('examResult',array('answerSheetModel'=>$answerSheetModel,'answerSheetDetail'=>$answerSheetDetail,'questionList'=>$questionList,'answerList'=>$answerList));
        }
                
}
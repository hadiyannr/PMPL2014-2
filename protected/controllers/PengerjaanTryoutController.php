<?php

class PengerjaanTryoutController extends Controller
{       
        public $layout = '//layouts/site';
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
                $lembarJawab->hitungNilai();
                $lembarJawab->save();
            }
            
            if($tryout->status() < 0 || isset($_POST['Submit'])){                
                $this->redirect(array('tryout/index'));
            }                

            $this->render('exam',array('soalList'=>$soalList, 'tryout'=>$tryout,'jawaban'=>$jawaban));
        }
        
        public function actionHistory(){
            if(isset($_POST['Tryout']['id'])){                  
                $this->redirect(array('result','idTryout'=>$_POST['Tryout']['id']));
            }
            
            $criteria = new CDbCriteria();
            $criteria->join = 'JOIN pengerjaantryout p ON t.id = p.idTryout';
            $criteria->compare('idPengguna', Yii::app()->user->id);
            $model = Tryout::model()->findAll($criteria);
            $this->render('historyList',array('model'=>$model));
        }
        
        public function actionResult($idTryout){
            $pengerjaan = PengerjaanTryout::model()->findByAttributes(array('idTryout'=>$idTryout));
            $detail = $pengerjaan->getDetail($idTryout);
            
            $soalList = Soal::model()->findAllByAttributes(array('idtryout' => $idTryout));
            $jawaban = array();
            foreach($soalList as $soal){
                $jawabanFromDB = Jawaban::model()->findByAttributes(array('idsoal'=>$soal->id));                
                $jawaban[$soal->nomor] = $jawabanFromDB;                
            }
            
            $this->render('examResult',array('pengerjaan'=>$pengerjaan,'detail'=>$detail,'soalList'=>$soalList,'jawaban'=>$jawaban));
        }

}
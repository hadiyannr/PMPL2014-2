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
            }


            if($tryout->status() < 0 || isset($_POST['Submit'])){
                $lembarJawab->hitungNilai();
                $lembarJawab->save();
                $this->redirect(array('index'));
            }                

            $this->render('exam',array('soalList'=>$soalList, 'tryout'=>$tryout,'jawaban'=>$jawaban));
        }

}
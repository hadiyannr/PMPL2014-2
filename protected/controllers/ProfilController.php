<?php

class ProfilController extends Controller {

    public $layout = '//layouts/site';

    public function actionIndex() {
        $model = $this->loadModel();
        if ($model == null) {
            $this->redirect(array('update'));
        }
        $this->render('index', array('model' => $model));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {       
        $model = $this->loadModel();
        if($model==null){
            $model = new Profil;
            $model->tanggalLahir= '1996-01-01';            
        }
        
        if(isset($_POST['Profil'])){
            $model->attributes = $_POST['Profil'];
            $model->idPengguna = Yii::app()->user->id;
            $model->image=CUploadedFile::getInstance($model,'image');
            $uploading = $model->image != null;
            if($uploading){
                $model->fotoUrl= Yii::app()->user->id . '.' .explode("/", $model->image->getType())[1];
            }
//            $imageValidation = true;
//            $message= '';
//            
//            if(strtolower($model->image->type) != 'jpg' || strtolower($model->image->type) != 'png'){
//                $imageValidation = false;
//                $message = 'Tipe file salah, harus .jpg atau .png';
//            }
//            if($model->image->getSize() > 20000000){
//                $imageValidation = false;
//                $message = 'Ukuran harus kurang dari 20MB';
//            }
//            
//            if(!$imageValidation){                
//                $model->addError('image', $message);
//            }                         
            
            
            if($model->save()) {
                if($uploading){
                    $model->image->saveAs(Yii::app()->basePath.'/../images/profilPic/'.$model->fotoUrl);
                }
                $this->redirect(array('index'));
            }
        }        
        $this->render('update',array('model'=>$model));
    }
    
    public function loadModel(){
        return Profil::model()->findByAttributes(array('idPengguna' => Yii::app()->user->id));
    }
}

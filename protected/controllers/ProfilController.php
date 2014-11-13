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
    
    public function actionView($id) {
        $model = Profil::model()->findByPk($id);
        
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
                $filetype = explode("/", $model->image->getType())[1];
                $model->fotoUrl= Yii::app()->user->id . '.' .$filetype; 
                
                
                $imageValidation = true;
                $message= '';                
                                
                if($filetype != 'jpeg' && $filetype != 'png'&& $filetype != 'jpg'){
                    $imageValidation = false;
                    $message = 'Tipe file salah, harus .jpg atau .png';
                }
                
                if($model->image->getSize() > 20000000){
                    $imageValidation = false;
                    $message = 'Ukuran harus kurang dari 20MB';
                }

                if(!$imageValidation){                                          
                    $model->addError('image', $message);                    
                }
            }           
            
            if(!$model->hasErrors() && $model->save()) {
                if($uploading){
                    $model->image->saveAs(Yii::app()->basePath.'/../images/profilPic/'.$model->fotoUrl);
                }
                $this->redirect(array('index'));
            }
        }                
        $this->render('update',array('model'=>$model));
    }

    public function actionUbahPassword()
    {
        if(isset($_POST['submit'])){
            $pengguna = Pengguna::model()->findByPk(Yii::app()->user->id);
            if($pengguna->password!=md5($_POST['OldPassword'])){
                Yii::app()->user->setFlash('message',"Password lama salah");
                $this->refresh();
            }
            elseif($_POST['password']!=$_POST['confirmpassword']){
                Yii::app()->user->setFlash('message',"Password baru dan konfirmasi password baru tidak cocok");
                $this->refresh();
            }
            else{
                $pengguna->password = md5($_POST['password']);
                $pengguna->save();
                Yii::app()->user->setFlash('message',"Penggantian password berhasil");
                $this->redirect(array("index"));                
            }
        }
        $this->render('changePasswordForm');
    }
    
    public function loadModel(){
        return Profil::model()->findByAttributes(array('idPengguna' => Yii::app()->user->id));
    }
}

<?php

class ProfilController extends Controller {

    public $layout = '//layouts/site';

    public function actionIndex() {
        $profilModel = $this->loadModel();
        if ($profilModel == null) {
            $this->redirect(array('update'));
        }
        $this->render('index', array('profilModel' => $profilModel));
    }
    
    public function actionView($id) {
        $profilModel = Profil::model()->findByAttributes(array('idPengguna'=>$id));
        if($profilModel==null){
            $this->render('emptyProfil');
        }
        $this->render('index', array('profilModel' => $profilModel));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {       
        $profilModel = $this->loadModel();
        if($profilModel==null){
            $profilModel = new Profil;
            $profilModel->tanggalLahir= '1996-01-01';            
        }
        
        if(isset($_POST['Profil'])){
            $profilModel->attributes = $_POST['Profil'];
            $profilModel->idPengguna = Yii::app()->user->id;
            $profilModel->image=CUploadedFile::getInstance($profilModel,'image');
            $uploading = $profilModel->image != null;            
            if($uploading){
                $filetype = explode("/", $profilModel->image->getType())[1];
                $profilModel->fotoUrl= Yii::app()->user->id . '.' .$filetype; 
                
                
                $imageValidation = true;
                $message= '';                
                                
                if($filetype != 'jpeg' && $filetype != 'png'&& $filetype != 'jpg'){
                    $imageValidation = false;
                    $message = 'Tipe file salah, harus .jpg atau .png';
                }
                
                if($profilModel->image->getSize() > 20000000){
                    $imageValidation = false;
                    $message = 'Ukuran harus kurang dari 20MB';
                }

                if(!$imageValidation){                                          
                    $profilModel->addError('image', $message);                    
                }
            }           
            
            if(!$profilModel->hasErrors() && $profilModel->save()) {
                if($uploading){
                    $profilModel->image->saveAs(Yii::app()->basePath.'/../images/ProfilPic/'.$profilModel->fotoUrl);
                }
                $this->redirect(array('index'));
            }
        }                
        $this->render('update',array('profilModel'=>$profilModel));
    }

    public function actionUbahPassword()
    {
        if(isset($_POST['submit'])){
            $penggunaModel = Pengguna::model()->findByPk(Yii::app()->user->id);
            if($penggunaModel->password!=md5($_POST['OldPassword'])){
                Yii::app()->user->setFlash('message',"Password lama salah");
                $this->refresh();
            }
            elseif($_POST['password']!=$_POST['confirmpassword']){
                Yii::app()->user->setFlash('message',"Password baru dan konfirmasi password baru tidak cocok");
                $this->refresh();
            }
            else{
                $penggunaModel->password = md5($_POST['password']);
                $penggunaModel->save();
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

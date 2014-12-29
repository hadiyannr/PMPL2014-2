<?php

class ProfileController extends Controller {

    public $layout = '//layouts/site';

    public function actionIndex() {
        $profileModel = $this->loadProfileModel();
        if ($profileModel == null) {
            $this->redirect(array('update'));
        }
        $this->render('index', array('profilModel' => $profileModel));
    }
    
    public function actionViewByID($id) {
        if(is_numeric($id)){
            $profileModel = Profile::model()->findByAttributes(array('idPengguna'=>$id));
            if($profileModel==null){
                $this->render('emptyProfil');
            }
            $this->render('index', array('profilModel' => $profileModel));
        }
        else{
            $this->render('emptyProfil');
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $profileModel = $this->loadProfileModel();
        if($profileModel==null){
            $profileModel = new Profile;
            $profileModel->tanggalLahir= '1996-01-01';
        }
        
        if(isset($_POST['Profil'])){
            $profileModel->attributes = $_POST['Profil'];
            $profileModel->idPengguna = Yii::app()->user->id;
            $profileModel->image=CUploadedFile::getInstance($profileModel,'image');
            $uploading = $profileModel->image != null;
            if($uploading){
                $file_type = explode("/", $profileModel->image->getType())[1];
                $profileModel->fotoUrl= Yii::app()->user->id . '.' .$file_type;
                
                
                $imageValidation = true;
                $message= '';                
                                
                if($file_type != 'jpeg' && $file_type != 'png'&& $file_type != 'jpg'){
                    $imageValidation = false;
                    $message = 'Tipe file salah, harus .jpg atau .png';
                }
                
                if($profileModel->image->getSize() > 20000000){
                    $imageValidation = false;
                    $message = 'Ukuran harus kurang dari 20MB';
                }

                if(!$imageValidation){                                          
                    $profileModel->addError('image', $message);
                }
            }           
            
            if(!$profileModel->hasErrors() && $profileModel->save()) {
                if($uploading){
                    $profileModel->image->saveAs(Yii::app()->basePath.'/../images/ProfilPic/'.$profileModel->fotoUrl);
                }
                $this->redirect(array('index'));
            }
        }                
        $this->render('update',array('profilModel'=>$profileModel));
    }

    public function actionChangePassword()
    {
        if(isset($_POST['submit'])){
            $userModel = User::model()->findByPk(Yii::app()->user->id);
            if($userModel->password!=md5($_POST['OldPassword'])){
                Yii::app()->user->setFlash('message',"Password lama salah");
                $this->refresh();
            }
            elseif($_POST['password']!=$_POST['confirmpassword']){
                Yii::app()->user->setFlash('message',"Password baru dan konfirmasi password baru tidak cocok");
                $this->refresh();
            }
            else{
                $userModel->password = md5($_POST['password']);
                $userModel->save();
                Yii::app()->user->setFlash('message',"Penggantian password berhasil");
                $this->redirect(array("index"));                
            }
        }
        $this->render('changePasswordForm');
    }
    
    public function loadProfileModel(){
        return Profile::model()->findByAttributes(array('idPengguna' => Yii::app()->user->id));
    }
    
    public function loadModelSosmed(){
        return UserOAuth::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
    }
}

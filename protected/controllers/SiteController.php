<?php

class SiteController extends Controller
{
        public $layout='//layouts/site';
	/**
	 * Declares class-based actions.
	 */
	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{                        
                session_start();
                $_SESSION['home'] = true;
                $criteria = new CDbCriteria;
                $criteria->order = "RAND()";
                $criteria->limit = 5;
                $criteria->compare('idcategory','3');
                $criteria->compare('isPublished','1');
                $model = Konten::model()->findAll($criteria);   
		$this->render('index',array('model'=>$model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('index'));
	}
        
    public function actionActivation($username, $code){           
        $pengguna = Pengguna::model()->findByAttributes(array('username'=>$username));
        $correctCode = crypt(Yii::app()->params['adminPassword'], $pengguna->username.$pengguna->email);
        if(strcmp($code, $correctCode) == 0){                
            $pengguna->isActive = 1;                                
            $pengguna->save();                
            Yii::app()->user->setFlash('message',"Selamat, akun anda telah aktif. Silahkan login.");
            $this->redirect(array('index'));
        }else{
            Yii::app()->user->setFlash('message',"Terjadi kesalahan dalam aktivasi akun");
            $this->redirect(array('index'));
        }
    }

    public function actionForget()
    {
        if(isset($_POST['submit'])){
            $pengguna = Pengguna::model()->findByAttributes(array("username"=>$_POST['username']));
            if($pengguna == null || $pengguna->email != $_POST['email']){
                Yii::app()->user->setFlash('message',"username atau email tidak cocok");
                $this->refresh();
            }elseif(!$this->sendEmail($pengguna)){
                Yii::app()->user->setFlash('message',"Email tidak terkirim, silahkan coba lagi");
            }else{
                Yii::app()->user->setFlash('message',"Silahkan cek email untuk melanjutkan proses penggantian password");
                $this->redirect(array("index"));
            }
        }
        $this->render('forgetPasswordForm');
    }

    public function sendEmail($pengguna){
            $activationCode = crypt(Yii::app()->params['adminPassword'], $pengguna->username.$pengguna->email);
            $link = Yii::app()->params['site'].'/siapmasukui/index.php/site/confirmForgetPassword?username='.$pengguna->username.'&code='.$activationCode.'';
            Yii::import('application.extensions.phpmailer.JPhpMailer');
            $mail = new JPhpMailer();
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;        
            $mail->SMTPSecure = 'tls';
            $mail->Username = Yii::app()->params['adminEmail'];
            $mail->Password = Yii::app()->params['adminPassword'];
            $mail->CharSet="utf-8";
            $mail->SetFrom(Yii::app()->params['adminEmail'], 'Admin SiapMasukUI.com');
            $mail->Subject = "[SiapMasukUI.com] Lupa Password";
            $mail->MsgHTML('<div style="text-align:left">'
                    . '<h1>SiapMasukUI.com</h1><br>'
                    . '<p>Selamat datang '.$pengguna->username.',</p> '
                    . '<p>Ikuti tautan di bawah ini untuk melanjutkan proses penggantian password</p> '
                    . '<p><a href="'.$link.'">klik untuk mengganti password</a></p>'
                    . '<br><p>Hormat kami,</p> <p>Admin <a href="'.Yii::app()->params['site'].'">'.Yii::app()->params['site'].'</a></p> '
                    . '</div>');
            $mail->AddAddress($pengguna->email, $pengguna->username);
            return $mail->Send();
        }

    public function actionConfirmForgetPassword($username, $code){
        $pengguna = Pengguna::model()->findByAttributes(array('username'=>$username));
        if(isset($_POST['submit'])){
            if($_POST['password'] != $_POST['confirmpassword']){
                Yii::app()->user->setFlash('message',"Konfirmasi password salah");
            }else{
                $pengguna->password = md5($_POST['password']);
                $pengguna->save();
                Yii::app()->user->setFlash('message',"Password berhasil diganti, silahkan login");
                $this->redirect(array('index'));
            }
        }else{
            $correctCode = crypt(Yii::app()->params['adminPassword'], $pengguna->username.$pengguna->email);
            if(strcmp($code, $correctCode) == 0){
                Yii::app()->user->setFlash('message',"Silahkan ganti password anda");
            }else{
                Yii::app()->user->setFlash('message',"Terjadi kesalahan link dalam proses lupa password");
                $this->redirect(array('index'));
            }
        }
        $this->render('confirmForgetPasswordForm');
    }
}
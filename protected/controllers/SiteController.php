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
                $criteria = new CDbCriteria;
                $criteria->order = "RAND()";
                $criteria->limit = 5;
                $criteria->compare('idcategory','2');
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

    protected function actionLupaPassword()
        {  
            $this->render('UbahPasswordForm');
        }

    public function actionForget($pengguna){            
            $activationCode = crypt('dingdonglala13', $pengguna->username.$pengguna->email);
            $link = 'localhost/siapmasukui/index.php/site/activation?username='.$pengguna->username.'&code='.$activationCode.'';
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
            $mail->Subject = "[SiapMasukUI.com] Verifikasi Pendaftaran";        
            $mail->MsgHTML('<div style="text-align:left">'
                    . '<h1>SiapMasukUI.com</h1><br>'
                    . '<p>Selamat datang '.$pengguna->username.',</p> '
                    . '<p>Terimakasih sudah mendaftar di SiapMasukUI.com.</p> '
                    . '<p>Ikuti tautan di bawah ini untuk melengkapi pendaftaran</p> '
                    . '<p><a href="'.$link.'">klik untuk aktivasi akun</a></p>'
                    . '<br><p>Hormat kami,</p> <p>Admin <a href="siapmasukui.com">SiapMasukUI.com</a></p> '
                    . '</div>');
            $mail->AddAddress($pengguna->email, $pengguna->username);
            return $mail->Send();
        }

    public function actionConfirm($username, $code){

    }
}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestController
 *
 * @author hanifnaufal
 */
class TestController extends Controller{
    
    public $layout='//layouts/site';
    
    public function actionIndex(){
        $model = User::model()->findAll();
        $inivar = 'aaaa';
        $this->render("index",array('model'=>$model,'x'=>$inivar));
    }
    
    public function actionTest(){
        echo Yii::app()->params['site'].'/siapmasukui/index.php/site/activation?username=';
    }
    
    public function actionTulis($m){
        echo $m;
    }       
    
    public function actionTrigger(){
//        echo 'test';
//        for($i=1;$i<=10;$i++){
//            for($j=0;$j<5;$j++){
//                $model = new Opsi;
//                $model->idsoal = $i;
//                $model->isJawaban = $j==0?1:0;
//                $model->nomor = "".$j;
//                $model->pernyataan = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, enim, aut, recusandae ";
//                $model->save();
//            }            
//        }
    }    
    
    
    public function sendEmail($pengguna){            
        $activationCode = crypt('dingdonglala13', $pengguna->username.$pengguna->email);
        $link = 'localhost/siapmasukui/index.php/site/activation?username='.$pengguna->username.'&code='.$activationCode.'';
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer();
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;        
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'siapmasukui@gmail.com';
        $mail->Password = 'dingdonglala13';
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
        $mail->Send();                                                                        
    }
    
    public function actionTestSosmed()
	{
		$serviceName = Yii::app()->request->getQuery('service');
                $data = "mulai";
		if (isset($serviceName)) {
//                    $data = $serviceName;
			/** @var $eauth EAuthServiceBase */
			$eauth = Yii::app()->eauth->getIdentity($serviceName);
//                        if($serviceName == 'facebook'){
//                            $this->redirect(array('test/testsosmed'));
//                        }
			$eauth->redirectUrl = Yii::app()->user->returnUrl;
			$eauth->cancelUrl = array('site/forgetpassword');

			try {
				if ($eauth->authenticate()) {
					$identity = new EAuthUserIdentity($eauth);
                                        $data = Yii::app()->user->id;
//                                        $data = Yii::app()->user->returnUrl;
//                                        $data = oAuthConsumer.GetUserInfo("https://www.googleapis.com/userinfo/email", consumerKey, consumerSecret, token, tokenSecret);

//					var_dump($eauth->getIsAuthenticated(), $eauth->getAttributes());

					// successful authentication
                                        echo $eauth->getServices();die();
					if ($identity->authenticate()) {
//                                            $emailUser = $identity->email;
						Yii::app()->user->login($identity);
//                                                Yii::app()->user->email='sds@ada.com';
						//var_dump($identity->id, $identity->name, Yii::app()->user->id);exit;

						// Save the attributes to display it in layouts/main.php
						$session = Yii::app()->session;
						$session['eauth_profile'] = $eauth->attributes;

//                                                $model = UserOauth::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
//                                                if($model == null){
//                                                    $model = new UserOauth;
//                                                    $model->user_id = Yii::app()->user->id;
//                                                    $model->save();
//                                                }
                                                
//                                                Yii::app()->user = $model;
						// redirect and close the popup window if needed
						$eauth->redirect();
//                                                $this->render('test', array('data'=>$data));
					}
					else {
						// close popup window and redirect to cancelUrl
                                                $data = 'gagal';
						$eauth->cancel();
					}
				}

				// Something went wrong, redirect back to login page
				$this->redirect(array('test/testsosmed'));
			}
			catch (EAuthException $e) {
				// save authentication error to session
				Yii::app()->user->setFlash('error', 'EAuthException: '.$e->getMessage());

				// close popup window and redirect to cancelUrl
				$eauth->redirect($eauth->getCancelUrl());
			}
		}
		// display the login form
		$this->render('test', array('data'=>$data));
	}
        
        public function loadModel(){
            return Profile::model()->findByAttributes(array('idPengguna' => Yii::app()->user->id));
        }
}

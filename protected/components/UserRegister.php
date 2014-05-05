    <?php

    /**
     * Description of UserRegister
     *
     * @author hanifnaufal
     */
    class UserRegister extends Portlet
    {
        public $title='Register';
     
        protected function renderContent()
        {
            $model=new DaftarForm;
            if(isset($_POST['DaftarForm']))
            {            
                $model->attributes=$_POST['DaftarForm'];            
                if($model->validate() && $this->sendEmail($model)){
                    $model->register();
                    Yii::app()->user->setFlash('message',"Selamat anda telah terdaftar, silahkan lakukan aktivasi melalui email");
                }else{
                    Yii::app()->user->setFlash('message',"Email tidak terkirim, silahkan coba kembali");
                }
                $this->controller->refresh();                            
                    
            }        
            $this->render('userRegister',array('model'=>$model));
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
        
    }
<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel {

    public $username;
    public $password;
    public $email;
    public $confirmPassword;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('username, password, confirmPassword, email', 'required'),
            // password needs to be authenticated
            array('password', 'checkField'),
        );
    }

    /**
     * 
     * This is the validator as declared in rules().
     */
    public function checkField($attribute, $params) {
        $error = 'error';
        if (!$this->hasErrors()) {

            if ($this->password != $this->confirmPassword) {
                Yii::app()->user->setFlash('message', "konfirmasi password salah");
                $this->addError('confirmPassword', $error);
            }

            $record = User::model()->findByAttributes(array('username' => $this->username));
            if ($record != null) {
                Yii::app()->user->setFlash('message', "username telah terdaftar");
                $this->addError('username', $error);
            }

            $record = User::model()->findByAttributes(array('email' => $this->email));
            if ($record != null) {
                Yii::app()->user->setFlash('message', "email telah terdaftar");
                $this->addError('email', $error);
            }
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function register() {
        $model = new User;
        $model->username = $this->username;
        $model->password = md5($this->password);
        $model->email = $this->email;
        $model->isActive = 0;
        $model->isAdmin = 0;
        $model->save();
//        $activation = md5(uniqid(rand(), true));
//        $message_part1 = "Silahkan masuk ke link ini untuk melakukan aktivasi akun SiapMasukUI.com";
//        $message_part2 = "http://localhost/siapmasukui/index.php/activate" . '?email=' . urlencode($model->email) . '&activation=' . $activation;                        
//        
//        $yiimail = new YiiMailMessage;
//        $yiimail->setBody($message_part1 . $message_part2, 'text/html');
//        $yiimail->subject = '[SiapMasukUI.com]Aktivasi akun';        
//        $yiimail->addTo($model->email);
//        $yiimail->from = Yii::app()->params['adminEmail'];
//        Yii::app()->mail->send($yiimail);
    }   

}

<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    
    public function authenticate()
    {
        $record=Pengguna::model()->findByAttributes(array('username'=>$this->username));
        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID; 
            Yii::app()->user->setFlash('message', "username atau password salah");
        }else if($record->password!==$this->password){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            Yii::app()->user->setFlash('message', "username atau password salah");
        }else if($record->isActive == 0){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            Yii::app()->user->setFlash('message', "username belum aktif");
        }else{
            $this->_id=$record->id;
            $this->setState('username', $record->username);
            $this->errorCode=self::ERROR_NONE;
        }
        
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}
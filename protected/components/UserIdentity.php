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
        $record=User::model()->findByAttributes(array('username'=>$this->username));
        if($record===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID; 
            Yii::app()->user->setFlash('message', "username belum terdaftar");
        }else if($record->password !== md5($this->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            Yii::app()->user->setFlash('message', "username atau password tidak cocok");
        }else if($record->isActive == 0){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
            Yii::app()->user->setFlash('message', "username belum aktif");
        }else{
            $this->_id=$record->id;
            $this->setState('username', $record->username);
            $this->setState('id', $record->id);
            $this->setState('isAdmin', ($this->isAdmin($record->id)));
            $this->errorCode=self::ERROR_NONE;
        }
        
        return !$this->errorCode;
    }
    function isAdmin($id) {
        $user = User::model()->findByPk($id);
        if ($user === null)
            return 0;
        else {
            return intval($user->isAdmin) === 1;
        }
    }
 
    public function getId()
    {
        return $this->_id;
    }
}
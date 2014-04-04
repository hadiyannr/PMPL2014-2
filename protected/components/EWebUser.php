<?php

class EWebUser extends CWebUser {

    private $_model;
    
    function isGuest() {
        return 0;
    }

    function isAdmin() {
        $user = $this->loadUser(Yii::app()->user->id);
        if ($user === null)
            return 0;
        else {                        
            return intval($user->isAdmin) === 1;
        }
    }

    protected function loadUser($user = null) {
        if ($this->_model === null) {
            if ($user !== null) {
                $this->_model = Pengguna::model()->findByPk($user); 
            }
        }
        return $this->_model;
    }

}
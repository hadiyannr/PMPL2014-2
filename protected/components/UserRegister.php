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
            if($model->validate()){                
                $model->register();     
                Yii::app()->user->setFlash("Selamat anda telah terdaftar, silahkan lakukan aktivasi melalui email");
            }
            $this->controller->refresh();                            
                
        }        
        $this->render('userRegister',array('model'=>$model));
    }

}
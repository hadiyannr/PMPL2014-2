<?php
class UserLogin extends Portlet
{
    public $title='Login';
 
    protected function renderContent()
    {
        $model=new LoginForm;
        if(isset($_POST['LoginForm']))
        {            
            $model->attributes=$_POST['LoginForm'];            
            if($model->validate()){
                $model->login();                
            }
            if(Yii::app()->user->isAdmin()){
                $this->controller->redirect(array('admin/index'));
            }else{
                $this->controller->refresh();
            }
        }
        
        $this->render('userLogin',array('model'=>$model));
    }
}
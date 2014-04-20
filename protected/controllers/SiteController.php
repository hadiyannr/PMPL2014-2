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
}
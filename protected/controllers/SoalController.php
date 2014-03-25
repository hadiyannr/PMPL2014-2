<?php

class SoalController extends Controller
{	
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex($idTryout)
	{
		$model=new Soal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Soal']))
			$model->attributes=$_GET['Soal'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tryout the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tryout::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
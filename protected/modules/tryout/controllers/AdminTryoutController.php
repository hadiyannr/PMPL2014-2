<?php

class AdminTryoutController extends Controller
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
//			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','view','create','update','delete'),
				'expression'=>'Yii::app()->user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'tryoutModel'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$tryoutModel=new Tryout;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tryout']))
		{
			$tryoutModel->attributes=$_POST['Tryout'];
                        $tryoutModel->idAdmin = Yii::app()->user->id;
			if($tryoutModel->save())
				$this->redirect(array('view','id'=>$tryoutModel->id));
		}

		$this->render('create',array(
			'tryoutModel'=>$tryoutModel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$tryoutModel=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tryout']))
		{
			$tryoutModel->attributes=$_POST['Tryout'];
                        $tryoutModel->idAdmin = Yii::app()->user->id;
			if($tryoutModel->save())
				$this->redirect(array('view','id'=>$tryoutModel->id));
		}

		$this->render('update',array(
			'tryoutModel'=>$tryoutModel,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('index'));
	}
	

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$tryoutModel=new Tryout('search');
		$tryoutModel->unsetAttributes();  // clear any default values
		if(isset($_GET['Tryout']))
			$tryoutModel->attributes=$_GET['Tryout'];

		$this->render('admin',array(
			'tryoutModel'=>$tryoutModel,
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
		$tryoutModel=Tryout::model()->findByPk($id);
		if($tryoutModel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $tryoutModel;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tryout $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tryout-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

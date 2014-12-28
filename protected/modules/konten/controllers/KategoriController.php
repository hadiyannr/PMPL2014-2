<?php

class KategoriController extends Controller
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
			'kategoriModel'=>$this->loadKategoriModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$kategoriModel = new KategoriKonten;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kategori']))
		{
			$kategoriModel->attributes=$_POST['Kategori'];
			if($kategoriModel->save())
				$this->redirect(array('view','id'=>$kategoriModel->id));
		}

		$this->render('create',array(
			'kategoriModel'=>$kategoriModel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$kategoriModel=$this->loadKategoriModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Kategori']))
		{
			$kategoriModel->attributes=$_POST['Kategori'];
			if($kategoriModel->save())
				$this->redirect(array('view','id'=>$kategoriModel->id));
		}

		$this->render('update',array(
			'kategoriModel'=>$kategoriModel,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadKategoriModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$kategoriModel = new KategoriKonten('search');
		$kategoriModel->unsetAttributes();  // clear any default values
		if(isset($_GET['Kategori']))
			$kategoriModel->attributes=$_GET['Kategori'];

		$this->render('admin',array(
			'kategoriModel'=>$kategoriModel,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return KategoriKonten the loaded model
	 * @throws CHttpException
	 */
	public function loadKategoriModel($id)
	{
		$kategoriModel = KategoriKonten::model()->findByPk($id);
		if($kategoriModel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $kategoriModel;
	}

	/**
	 * Performs the AJAX validation.
	 * @param KategoriKonten $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kategori-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

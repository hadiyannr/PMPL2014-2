<?php

class AdminKontenController extends Controller
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
            CController::forward('konten/index');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$contentModel=new Konten;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Konten']))
		{
			$contentModel->attributes=$_POST['Konten'];
            $contentModel->idAdmin = Yii::app()->user->id;
            $contentModel->image=CUploadedFile::getInstance($contentModel,'image');
            $uploading = $contentModel->image != null;

            if($uploading){
                $filetype = explode("/", $contentModel->image->getType())[1];
                $contentModel->imagepath= Yii::app()->user->id . '.' .$filetype;


                $imageValidation = true;
                $message= '';

                if($filetype != 'jpeg' && $filetype != 'png'&& $filetype != 'jpg'){
                    $imageValidation = false;
                    $message = 'Tipe file salah, harus .jpg atau .png';
                }

                if($contentModel->image->getSize() > 20000000){
                    $imageValidation = false;
                    $message = 'Ukuran harus kurang dari 20MB';
                }

                if(!$imageValidation){
                    $contentModel->addError('image', $message);
                }
            }

			if(!$contentModel->hasErrors() && $contentModel->save()){
            //if(!$contentModel->hasErrors()){
                if($uploading){
                    $contentModel->image->saveAs(Yii::app()->basePath.'/../images/ContentPic/'.$contentModel->imagepath);
                }
				$this->redirect(array('view','id'=>$contentModel->id));
            }
		}

		$this->render('create',array(
			'contentModel'=>$contentModel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$contentModel=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Konten']))
		{
			$contentModel->attributes=$_POST['Konten'];
                        $contentModel->idAdmin = Yii::app()->user->id;

            $uploading = $contentModel->image != null;
            if($uploading){
                $filetype = explode("/", $contentModel->image->getType())[1];
                $contentModel->imagepath= Yii::app()->user->id . '.' .$filetype;


                $imageValidation = true;
                $message= '';

                if($filetype != 'jpeg' && $filetype != 'png'&& $filetype != 'jpg'){
                    $imageValidation = false;
                    $message = 'Tipe file salah, harus .jpg atau .png';
                }

                if($contentModel->image->getSize() > 20000000){
                    $imageValidation = false;
                    $message = 'Ukuran harus kurang dari 20MB';
                }

                if(!$imageValidation){
                    $contentModel->addError('image', $message);
                }
            }
            if(!$contentModel->hasErrors() && $contentModel->save()){
                if($uploading){
                    $contentModel->image->saveAs(Yii::app()->basePath.'/../images/ContentPic/'.$contentModel->imagepath);
                }
                $this->redirect(array('view','id'=>$contentModel->id));
            }
		}

		$this->render('update',array(
			'contentModel'=>$contentModel,
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$contentModel=new Konten('search');
		$contentModel->unsetAttributes();  // clear any default values
		if(isset($_GET['Konten']))
			$contentModel->attributes=$_GET['Konten'];

		$this->render('admin',array(
			'contentModel'=>$contentModel,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Konten the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$contentModel=Konten::model()->findByPk($id);
		if($contentModel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $contentModel;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Konten $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='konten-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

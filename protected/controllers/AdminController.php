<?php

class AdminController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{		
		$this->render('index');
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
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$loginFormModel = new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($loginFormModel);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$loginFormModel->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($loginFormModel->validate() && $loginFormModel->login())
				$this->redirect('index');
		}
		// display the login form
		$this->render('login',array('loginModel'=>$loginFormModel));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('index');
	}
}
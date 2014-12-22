<?php

class AdminQuestionController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'create', 'update', 'delete','createStory','updateStory'),
                'expression' => 'Yii::app()->user->isAdmin()',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $questionModel = $this->loadModel($id);
        $htmlOption = $questionModel->getHtmlAdminOption();
        $this->render('view', array(
            'questionModel' => $questionModel,
            'htmlOption' => $htmlOption,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idtryout) {
        $questionModel = new Question;
        $questionModel->setAttribute('idtryout', $idtryout);
        $optionModelList = array(new Option, new Option, new Option, new Option, new Option);
        if (isset($_POST['Soal'])) {
            if(Question::saveQuestion($questionModel,$_POST['Soal'],$_POST['Opsi'],$optionModelList)){
                $this->redirect(array('view', 'id' => $questionModel->id));
            }
        }

        $this->render('create', array(
            'questionModel' => $questionModel,
            'optionModelList'=>$optionModelList,
        ));
    }
    public function actionCreateStory($idtryout){
        $questionModel = new Question;
        $questionModel->setAttribute('idtryout', $idtryout);
        $questionModel->setAttribute('isHasJawaban', 0);
        if(isset($_POST['Soal'])){
            $questionModel->attributes = $_POST['Soal'];

            if($questionModel->validate() && $questionModel->save())
            $this->redirect(array('view', 'id' => $questionModel->id));
        }
        $this->render('createStory', array(
            'questionModel' => $questionModel,
        ));
    }
    public function actionUpdateStory($id){
        $questionModel = $this->loadModel($id);
        if(isset($_POST['Soal'])){
            $questionModel->attributes = $_POST['Soal'];

            if($questionModel->validate() && $questionModel->save())
                $this->redirect(array('view', 'id' => $questionModel->id));
        }
        $this->render('updateStory', array(
            'questionModel' => $questionModel,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $questionModel = $this->loadModel($id);
        if($questionModel->isHasJawaban == 0){
            $this->redirect(array("updateStory","id"=>$id));
        }
        $optionModelList = array();
        foreach($questionModel->opsis as $option){
            $optionModelList[] = $option;
        }
        if (isset($_POST['Question'])) {
            if(Question::saveQuestion($questionModel,$_POST['Question'],$_POST['Option'],$optionModelList)){
                $this->redirect(array('view', 'id' => $questionModel->id));
            }
        }

        $this->render('update', array(
            'questionModel' => $questionModel,
            'optionModelList'=>$optionModelList,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $idTryout =$this->loadModel($id)->idtryout;
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(array('index','idtryout'=>$idTryout));
    }

    /**
     * Manages all models.
     */
    public function actionIndex($idtryout) {
        $questionModel = new Question('search');
        $questionModel->unsetAttributes();  // clear any default values
        if (isset($_GET['idtryout'])) {
            $questionModel->idtryout = $_GET['idtryout'];
        }
        if (isset($_GET['Soal']))
            $questionModel->attributes = $_GET['Soal'];

        $this->render('admin', array(
            'questionModel' => $questionModel,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Question the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $questionModel = Question::model()->findByPk($id);
        if ($questionModel === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $questionModel;
    }

    /**
     * Performs the AJAX validation.
     * @param Question $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'soal-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

<?php

class AdminSoalController extends Controller {

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
        $htmlOption = $questionModel->getHtmlAdminOpsi();
        $this->render('view', array(
            'model' => $questionModel,
            'opsi' => $htmlOption,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idtryout) {
        $questionModel = new Soal;
        $questionModel->setAttribute('idtryout', $idtryout);
        $modelOption = array(new Opsi, new Opsi, new Opsi, new Opsi, new Opsi);

        if (isset($_POST['Soal'])) {
            $questionModel->attributes = $_POST['Soal'];
            $transaction = Yii::app()->db->beginTransaction();
            try {
                if ($questionModel->validate() && $questionModel->save()){
                    for ($i = 0; $i < 5; $i++) {
                        $modelOption[$i]->attributes = $_POST['Opsi'][$i];
                        $modelOption[$i]->idsoal = $questionModel->id;

                        if($_POST['Opsi']['jawaban'] == $i){
                            $modelOption[$i]->isJawaban = 1;
                        }else{
                            $modelOption[$i]->isJawaban = 0;
                        }

                        if(!($modelOption[$i]->validate() && $modelOption[$i]->save())){
                            throw new Exception("Opsi rollback");
                        }
                    }
                }else{
                    throw new Exception("Soal rollback");
                }
                $transaction->commit();
                $this->redirect(array('view', 'id' => $questionModel->id));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }

        $this->render('create', array(
            'model' => $questionModel,
            'modelOpsi'=>$modelOption,
        ));
    }

    public function actionCreateStory($idtryout){
        $questionModel = new Soal;
        $questionModel->setAttribute('idtryout', $idtryout);
        $questionModel->setAttribute('isHasJawaban', 0);
        if(isset($_POST['Soal'])){
            $questionModel->attributes = $_POST['Soal'];

            if($questionModel->validate() && $questionModel->save())
            $this->redirect(array('view', 'id' => $questionModel->id));
        }
        $this->render('createStory', array(
            'model' => $questionModel,
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
            'model' => $questionModel,
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
        if (isset($_POST['Soal'])) {
            $questionModel->attributes = $_POST['Soal'];
            $transaction = Yii::app()->db->beginTransaction();
            try {
                if ($questionModel->validate() && $questionModel->save()){
                    for ($i = 0; $i < 5; $i++) {
                        $optionModelList[$i]->attributes = $_POST['Opsi'][$i];
                        $optionModelList[$i]->idsoal = $questionModel->id;

                        if($_POST['Opsi']['jawaban'] == $i){
                            $optionModelList[$i]->isJawaban = 1;
                        }else{
                            $optionModelList[$i]->isJawaban = 0;
                        }

                        if(!($optionModelList[$i]->validate() && $optionModelList[$i]->save())){
                            throw new Exception("Opsi rollback");
                        }
                    }
                }else{
                    throw new Exception("Soal rollback");
                }
                $transaction->commit();
                $this->redirect(array('view', 'id' => $questionModel->id));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }

        $this->render('create', array(
            'model' => $questionModel,
            'modelOpsi'=>$optionModelList,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $to_id =$this->loadModel($id)->idtryout;
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(array('index','idtryout'=>$to_id));
    }

    /**
     * Manages all models.
     */
    public function actionIndex($idtryout) {
        $questionModel = new Soal('search');
        $questionModel->unsetAttributes();  // clear any default values
        if (isset($_GET['idtryout'])) {
            $questionModel->idtryout = $_GET['idtryout'];
        }
        if (isset($_GET['Soal']))
            $questionModel->attributes = $_GET['Soal'];

        $this->render('admin', array(
            'model' => $questionModel,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Soal the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $questionModel = Soal::model()->findByPk($id);
        if ($questionModel === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $questionModel;
    }

    /**
     * Performs the AJAX validation.
     * @param Soal $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'soal-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

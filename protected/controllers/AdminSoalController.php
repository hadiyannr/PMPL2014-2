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
                'actions' => array('index', 'view', 'create', 'update', 'delete'),
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
        $model = $this->loadModel($id);
        $htmlopsi = $model->getHtmlAdminOpsi();
        $this->render('view', array(
            'model' => $model,
            'opsi' => $htmlopsi,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idtryout) {
        $model = new Soal;
        $model->setAttribute('idtryout', $idtryout);
        $modelOpsi = array(new Opsi, new Opsi, new Opsi, new Opsi, new Opsi);

        if (isset($_POST['Soal'])) {
            $model->attributes = $_POST['Soal'];
            $transaction = Yii::app()->db->beginTransaction();
            try {
                if ($model->validate() && $model->save()){
                    for ($i = 0; $i < 5; $i++) {
                        $modelOpsi[$i]->attributes = $_POST['Opsi'][$i];
                        $modelOpsi[$i]->idsoal = $model->id;

                        if($_POST['Opsi']['jawaban'] == $i){
                            $modelOpsi[$i]->isJawaban = 1;
                        }else{
                            $modelOpsi[$i]->isJawaban = 0;
                        }

                        if(!($modelOpsi[$i]->validate() && $modelOpsi[$i]->save())){
                            throw new Exception("Opsi rollback");
                        }
                    }
                }else{
                    throw new Exception("Soal rollback");
                }
                $transaction->commit();
                $this->redirect(array('view', 'id' => $model->id));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelOpsi'=>$modelOpsi,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelOpsi = array();
        foreach($model->opsis as $opsi){
            $modelOpsi[] = $opsi;
        }
        if (isset($_POST['Soal'])) {
            $model->attributes = $_POST['Soal'];
            $transaction = Yii::app()->db->beginTransaction();
            try {
                if ($model->validate() && $model->save()){
                    for ($i = 0; $i < 5; $i++) {
                        $modelOpsi[$i]->attributes = $_POST['Opsi'][$i];
                        $modelOpsi[$i]->idsoal = $model->id;

                        if($_POST['Opsi']['jawaban'] == $i){
                            $modelOpsi[$i]->isJawaban = 1;
                        }else{
                            $modelOpsi[$i]->isJawaban = 0;
                        }

                        if(!($modelOpsi[$i]->validate() && $modelOpsi[$i]->save())){
                            throw new Exception("Opsi rollback");
                        }
                    }
                }else{
                    throw new Exception("Soal rollback");
                }
                $transaction->commit();
                $this->redirect(array('view', 'id' => $model->id));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelOpsi'=>$modelOpsi,
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
        $model = new Soal('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['idtryout'])) {
            $model->idtryout = $_GET['idtryout'];
        }
        if (isset($_GET['Soal']))
            $model->attributes = $_GET['Soal'];

        $this->render('admin', array(
            'model' => $model,
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
        $model = Soal::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
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

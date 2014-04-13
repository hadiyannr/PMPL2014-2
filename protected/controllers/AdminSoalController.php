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
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Soal'])) {
            $model->attributes = $_POST['Soal'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        $modelOpsi = array(new Opsi, new Opsi, new Opsi, new Opsi, new Opsi);

        $tmpOpsi = Yii::app()->db->createCommand()->select('*')->from('opsi')->where('idsoal=:idsoal', array(':idsoal' => $id))->queryAll();

        if (sizeof($tmpOpsi) > 0) {
            $i = 0;
            foreach ($tmpOpsi as $to) {
                $modelOpsi[$i] = Opsi::model()->findByPk($tmpOpsi[$i]['id']);
                $i++;
            }
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Soal'])) {

            $valid = true;
            $model->attributes = $_POST['Soal'];
            $valid = $valid && $model->validate();

            for ($i = 0; $i < 5; $i++) {
                if (isset($_POST['Opsi'][$i])) {
                    $modelOpsi[$i]->attributes = $_POST['Opsi'][$i];
                    $modelOpsi[$i]->idsoal = $model->id;
                    $valid = $valid && $modelOpsi[$i]->validate();
                }                
                
                if($_POST['Opsi']['jawaban'] == $i){
                    $modelOpsi[$i]->isJawaban = 1;
                }else{                                        
                    $modelOpsi[$i]->isJawaban = 0;                    
                }
            }            
            if ($valid) {
                if ($model->save()) {
                    for ($i = 0; $i < 5; $i++) {
                        $modelOpsi[$i]->save();
                    }
                }
            }

            $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'modelOpsi' => $modelOpsi,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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

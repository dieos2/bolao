<?php

class ApostaController extends Controller {

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','GetApostas'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','CreateAjax'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Aposta;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['ajax'])) {
            $model->id_confronto = $_POST['$id_confronto'];
             $model->placa_visitante = $_POST['$placa_visitante'];
              $model->placar_casa = $_POST['$placar_casa'];
               $model->data = $_POST['$data'];
                $model->id_user = $_POST['$id_user'];
            $model->save();
            echo json_encode($model);

            Yii::app()->end();
        }
        if (isset($_POST['Aposta'])) {
            $model->attributes = $_POST['Aposta'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
 public function actionCreateAjax() {
        $model = new Aposta;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
         
            $model->id_confronto = $_POST['id_confronto'];
             $model->placar_visitante = $_POST['placar_visitante'];
              $model->placar_casa = $_POST['placar_casa'];
               $model->data = $_POST['data'];
                $model->id_user = $_POST['id_user'];
           $Criteria = new CDbCriteria();
           $Criteria->condition = "id_confronto = $model->id_confronto and id_user = $model->id_user";
           $apostaExiste = Aposta::model()->find($Criteria);
           if($apostaExiste != null){
            $model = $this->loadModel($apostaExiste->id);
             $model->id_confronto = $_POST['id_confronto'];
             $model->placar_visitante = $_POST['placar_visitante'];
              $model->placar_casa = $_POST['placar_casa'];
               $model->data = $_POST['data'];
                $model->id_user = $_POST['id_user'];
           } $model->save();
            echo json_encode($model);

            Yii::app()->end();
     
      
    }
    public function actionGetApostas($id) {
        $this->layout = false;
        header('Content-type: application/json');
        $arr = array();
        $Criteria = new CDbCriteria();

        $arrAposta = array();
            $id_user = $id;
            if($id_user != 0){
            $Criteria->condition = "id_user = $id_user";
            }
            $Criteria->order = "data";
            
            $aposta = Aposta::model()->findAll($Criteria);
        

        foreach ($aposta as $item) {
            $dataHoje = strtotime(date("m/d/Y"));
            $dataExp = $item->data;
            array_push($arr, $item->id, $item->id_confronto, $item->id_user, $item->data, $item->placar_casa, $item->placar_visitante, ucfirst($item->idUser->username));
            array_push($arrAposta, $arr);
            $arr = array();
        }

        echo json_encode($arrAposta);

        Yii::app()->end();
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

        if (isset($_POST['Aposta'])) {
            $model->attributes = $_POST['Aposta'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
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
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Aposta');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Aposta('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Aposta']))
            $model->attributes = $_GET['Aposta'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Aposta the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Aposta::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Aposta $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'aposta-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

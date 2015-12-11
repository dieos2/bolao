<?php

class GrupoTimeController extends Controller {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'GetPontosDoTime', 'aasort'),
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
        $model = new GrupoTime;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['GrupoTime'])) {
            $model->attributes = $_POST['GrupoTime'];
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

        if (isset($_POST['GrupoTime'])) {
            $model->attributes = $_POST['GrupoTime'];
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
    public function aasort(&$array, $key) {
        $sorter = array();
        $ret = array();
        reset($array);
        foreach ($array as $ii => $va) {
            $sorter[$ii] = $va[$key];
        }
        arsort($sorter);
        foreach ($sorter as $ii => $va) {
            $ret[$ii] = $array[$ii];
        }
        $array = $ret;
        return $array;
    }

    public function actionIndex($id) {
        $model = new GrupoTime;
        $classificacao = array();
        if ($id != 0) {
            $Criteria = new CDbCriteria();
            $Criteria->condition = "id_grupo=$id";
            $model = GrupoTime::model()->findAll($Criteria);
            foreach ($model as $item) {
                $itemArray = array("id" => $item->id, "id_grupo" => $item->id_grupo, "id_time" => $item->idTime->nome, "escudo" => $item->idTime->escudo, "pontos" => GrupoTimeController::GetPontosDoTime($item->id_time)
                        , "vitoria" => GrupoTimeController::GetNVitoriaDoTime($item->id_time)
                        , "empate" => GrupoTimeController::GetNEmpateDoTime($item->id_time)
                        , "derrota" => GrupoTimeController::GetNDerrotaDoTime($item->id_time));
                array_push($classificacao, $itemArray);
            }

            $this->render('index', array(
                'dataProvider' => GrupoTimeController::aasort($classificacao, "pontos"),
            ));
        } else {
            $dataProvider = new CActiveDataProvider('GrupoTime');
            $this->render('index', array(
                'dataProvider' => $dataProvider,
            ));
        }
    }
 public function GetNVitoriaDoTime($id) {
            $pontos = 0;    
            $model = new Confronto;
            $Criteria = new CDbCriteria();
            $Criteria->condition = "vencedor=$id and empate = 0 and id_grupo < 10";
            
            $model = Confronto::model()->findAll($Criteria);
            foreach ($model as $ponto){
                $pontos = $pontos + 1;
            }
        return $pontos;
    }
    
    public function GetNDerrotaDoTime($id) {
            $pontos = 0;   
            
            $model = new Confronto;
            $Criteria = new CDbCriteria();
            $Criteria->condition = "(id_time_casa = $id || id_time_visitante = $id) And empate = false and vencedor !=$id and id_grupo < 10";
            
            $model = Confronto::model()->findAll($Criteria);
            foreach ($model as $ponto){
                $pontos = $pontos + 1;
            }
        return $pontos;
    }
    public function GetPontosDoTime($id) {
            $pontos = 0;    
            $model = new Confronto;
            $Criteria = new CDbCriteria();
            $Criteria->condition = "vencedor=$id and empate = 0 and id_grupo < 10";
            
            $model = Confronto::model()->findAll($Criteria);
            foreach ($model as $ponto){
                $pontos = $pontos + 3;
            }
             $Criteria = new CDbCriteria();
            $Criteria->condition = "(id_time_casa = $id || id_time_visitante = $id) And empate = true";
             $model = new Confronto;
            $model = Confronto::model()->findAll($Criteria);
            foreach ($model as $ponto){
                $pontos = $pontos + 1;
            }
        return $pontos;
    }

    public function GetNEmpateDoTime($id) {
            $pontos = 0;    
            $model = new Confronto;
            $Criteria = new CDbCriteria();
            $Criteria->condition = "(id_time_casa = $id || id_time_visitante = $id) And empate = true";
            
            $model = Confronto::model()->findAll($Criteria);
            foreach ($model as $ponto){
                $pontos = $pontos + 1;
            }
        return $pontos;
    }
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new GrupoTime('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['GrupoTime']))
            $model->attributes = $_GET['GrupoTime'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return GrupoTime the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = GrupoTime::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param GrupoTime $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'grupo-time-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

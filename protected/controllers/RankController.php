<?php

class RankController extends Controller {

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
                'actions' => array('index', 'view',  'Classificacao'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create','GetRank', 'update', 'GetTotal'),
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
        $model = new Rank;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Rank'])) {
            $model->attributes = $_POST['Rank'];
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

        if (isset($_POST['Rank'])) {
            $model->attributes = $_POST['Rank'];
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
    public function actionIndex($id) {
        if ($id == 0) {
            $dataProvider = new CActiveDataProvider('Rank');
        } else {
            $dataProvider = new CActiveDataProvider('Rank', array(
                'criteria' => array(
                    'condition' => "id_user = $id",
                    'order' => 'data',
            )));
        }
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public static function aasort(&$array, $key) {
        $sorter = array();
        $ret = array();

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

    public static function ordenarRank(&$array, $key, $desempate) {
        $sorter = array();
         $ret = array();
        foreach ($array as $ii => $row) {
            $pontos[$ii] = $row[$key];
            $acertos[$ii] = $row[$desempate];
        }

// Ordena os dados com volume descendente, edition ascendente
// adiciona $data como o último parãmetro, para ordenar pela chave comum
      array_multisort($pontos, SORT_DESC, $acertos, SORT_DESC,$array);
        foreach ($array as $ii => $va) {
            $ret[$ii] = $array[$ii];
        }
      return $ret;
    }
    public function actionGetPosicaoAtual($id) {
       
       
        $Criteria = new CDbCriteria();
        $Criteria->condition = "id_user = $id";

        $model = Posicao::model()->find($Criteria);
       
if($model != null){
                return $model->atual;
}else{
    return RankController::actionGetPosicao($id);
}
            
        
    }
    
    
public function actionGetPosicaoAntiga($id) {
       
       
        $Criteria = new CDbCriteria();
        $Criteria->condition = "id_user = $id";

        $model = Posicao::model()->find($Criteria);
       
if($model != null){
                return $model->antiga;
}else{
    return RankController::actionGetPosicao($id);
}
            
        
    }
    public static function actionGetPosicao($id) {
        $nome = User::model()->findByPk($id)->username;
        $rankLista = array();
        $rankUser = array();
        $Criteria = new CDbCriteria();
        $Criteria->order = "username";

        $modelAposta = User::model()->findAll($Criteria);
        $total = 0;
        $id_user = 0;
        foreach ($modelAposta as $item) {
            $rankUser = array("acertos" => RankController::GetAcertos($item->id)
                , "nome" => $item->username, "pontos" => RankController::actionGetTotal($item->id)
                , "resultados" => RankController::GetResultados($item->id));
            array_push($rankLista, $rankUser);
        }
        $rankLista = RankController::ordenarRank($rankLista, 'pontos', 'acertos');
        $posicao = 0;
        foreach ($rankLista as $item) {
            $posicao = $posicao + 1;
            if ($item["nome"] == $nome) {

                return $posicao;
            }
        }
    }

    public function actionGetRank() {
        $rankLista = array();
        $rankUser = array();
        $Criteria = new CDbCriteria();
        $Criteria->order = "username";

        $modelAposta = User::model()->findAll($Criteria);
        $total = 0;
        $id_user = 0;
        foreach ($modelAposta as $item) {
            $rankUser = array("acertos" => RankController::GetAcertos($item->id)
                , "nome" => $item->username, "pontos" => RankController::actionGetTotal($item->id)
                , "resultados" => RankController::GetResultados($item->id),"id"=>$item->id);
            array_push($rankLista, $rankUser);
        }

        $rankLista = RankController::ordenarRank($rankLista, 'pontos', 'acertos');
        $this->render('GetRank', array(
            'dataProvider' => $rankLista,
        ));
    }
public function actionClassificacao() {
        $rankLista = array();
        $rankUser = array();
        $Criteria = new CDbCriteria();
        $Criteria->order = "username";

        $modelAposta = User::model()->findAll($Criteria);
        $total = 0;
        $id_user = 0;
        foreach ($modelAposta as $item) {
            $rankUser = array("acertos" => RankController::GetAcertos($item->id)
                , "nome" => $item->username, "pontos" => RankController::actionGetTotal($item->id)
                , "resultados" => RankController::GetResultados($item->id),"id"=>$item->id);
            array_push($rankLista, $rankUser);
        }

        $rankLista = RankController::ordenarRank($rankLista, 'pontos', 'acertos');
        $this->renderPartial('Classificacao', array(
            'dataProvider' => $rankLista,
        ));
    }
    public static function actionGetTotal($id) {

        $Criteria = new CDbCriteria();
        $Criteria->condition = "id_user=$id";
        $modelAposta = Rank::model()->findAll($Criteria);
        $total = 0;
        foreach ($modelAposta as $item) {
            $total = $total + $item->idPonto->pontos;
        }
        return $total;
    }

    public static function GetErros($id) {

        $Criteria = new CDbCriteria();
        $Criteria->condition = "id_user=$id";
        $modelAposta = Rank::model()->findAll($Criteria);
        $model = Aposta::model()->findAll($Criteria);
        $total = 0;
        $totalAposta = 0;
        foreach ($modelAposta as $item) {
            $total = $total + 1;
        }
        foreach ($model as $item) {
            $totalAposta = $totalAposta + 1;
        }
        return $totalAposta - $total;
    }

    public static function GetAcertos($id) {

        $Criteria = new CDbCriteria();
        $Criteria->condition = "id_user=$id and id_ponto = 1 or id_user=$id and id_ponto = 3 or id_user=$id and id_ponto = 5 or id_user=$id and id_ponto = 7 or id_user=$id and id_ponto = 9";
        $modelAposta = Rank::model()->findAll($Criteria);
        $total = 0;
        foreach ($modelAposta as $item) {
            $total = $total + 1;
        }
        return $total;
    }

    public static function GetResultados($id) {

        $Criteria = new CDbCriteria();
        $Criteria->condition = "id_user=$id and id_ponto = 2 or id_user=$id and id_ponto = 4 or id_user=$id and id_ponto = 6 or id_user=$id and id_ponto = 8 or id_user=$id and id_ponto = 10";
        $modelAposta = Rank::model()->findAll($Criteria);
        $total = 0;
        foreach ($modelAposta as $item) {
            $total = $total + 1;
        }
        return $total;
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Rank('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Rank']))
            $model->attributes = $_GET['Rank'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Rank the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Rank::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Rank $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'rank-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

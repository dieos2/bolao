<?php

class ConfrontoController extends Controller {

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
                'actions' => array('view', 'GetConfronto', 'ajax', 'Curtir'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'index', 'oitavas'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'update'),
                'users' => array('diego'),
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

    public function actionCurtir($id) {

        $this->renderPartial('curtir', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Confronto;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Confronto'])) {
            $model->attributes = $_POST['Confronto'];
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

        if (isset($_POST['Confronto'])) {
            $model->attributes = $_POST['Confronto'];
            if ($model->empate == 1) {
                $model->vencedor = null;
            }
            $Criteria = new CDbCriteria();
            $Criteria->condition = "id_confronto=$model->id";
            $modelAposta = Aposta::model()->findAll($Criteria);

            foreach ($modelAposta as $item) {
				  $Criteria = new CDbCriteria();
           $Criteria->condition = "id_aposta = $item->id and id_user = $item->id_user";
           $apostaExiste = Rank::model()->find($Criteria);
          	if($apostaExiste != null){
				$apostaExiste->delete();
			}
                if ($item->placar_casa == $model->placar_casa && $item->placar_visitante == $model->placar_visitante) {
					
                    $modelRank = new Rank;
                    $modelRank->id_user = $item->id_user;
                    $modelRank->data = date('Y-m-d H:i:s');
                    $modelRank->id_aposta = $item->id;
                    if($item->idConfronto->id_grupo == 10){
                    $modelRank->id_ponto = 3;
                }else if($item->idConfronto->id_grupo == 11)
                    {
						$modelRank->id_ponto = 5;
                    }else if($item->idConfronto->id_grupo == 12)
                    {
						$modelRank->id_ponto = 7;
                    }else if($item->idConfronto->id_grupo == 13)
                    {
						$modelRank->id_ponto = 9;
                    }else if($item->idConfronto->id_grupo == 9)
                    {
						$modelRank->id_ponto = 9;
                    }else
					{
					$modelRank->id_ponto = 1;
					}
                    $modelRank->save();
                } else if ($model->vencedor != null) {
                    if ($item->placar_casa > $item->placar_visitante && $model->vencedor == $model->id_time_casa) {
                        $modelRank = new Rank;
                        $modelRank->id_user = $item->id_user;
                        $modelRank->data = date('Y-m-d H:i:s');
                        $modelRank->id_aposta = $item->id;
                          if($item->idConfronto->id_grupo == 10){
                    $modelRank->id_ponto = 4;
                }else if($item->idConfronto->id_grupo == 11)
                    {
						$modelRank->id_ponto = 6;
                    }else if($item->idConfronto->id_grupo == 12)
                    {
						$modelRank->id_ponto = 8;
                    }else if($item->idConfronto->id_grupo == 13)
                    {
						$modelRank->id_ponto = 10;
                    }else if($item->idConfronto->id_grupo == 9)
                    {
						$modelRank->id_ponto = 10;
                    }else
					{
					$modelRank->id_ponto = 2;
					}
                        $modelRank->save();
                    } else if ($item->placar_casa < $item->placar_visitante && $model->vencedor == $model->id_time_visitante) {
                        $modelRank = new Rank;
                        $modelRank->id_user = $item->id_user;
                        $modelRank->data = date('Y-m-d H:i:s');
                        $modelRank->id_aposta = $item->id;
                          if($item->idConfronto->id_grupo == 10){
                    $modelRank->id_ponto = 4;
                }else if($item->idConfronto->id_grupo == 11)
                    {
						$modelRank->id_ponto = 6;
                    }else if($item->idConfronto->id_grupo == 12)
                    {
						$modelRank->id_ponto = 8;
                    }else if($item->idConfronto->id_grupo == 13)
                    {
						$modelRank->id_ponto = 10;
                    }else if($item->idConfronto->id_grupo == 9)
                    {
						$modelRank->id_ponto = 10;
                    }else
					{
					$modelRank->id_ponto = 2;
					}
                        $modelRank->save();
                    }
                } else if ($item->placar_casa == $item->placar_visitante && $model->placar_casa == $model->placar_visitante) {
                    $modelRank = new Rank;
                    $modelRank->id_user = $item->id_user;
                    $modelRank->data = date('Y-m-d H:i:s');
                    $modelRank->id_aposta = $item->id;
                       if($item->idConfronto->id_grupo == 10){
                    $modelRank->id_ponto = 4;
                }else if($item->idConfronto->id_grupo == 11)
                    {
						$modelRank->id_ponto = 6;
                    }else if($item->idConfronto->id_grupo == 12)
                    {
						$modelRank->id_ponto = 8;
                    }else if($item->idConfronto->id_grupo == 13)
                    {
						$modelRank->id_ponto = 10;
                    }else if($item->idConfronto->id_grupo == 9)
                    {
						$modelRank->id_ponto = 10;
                    }else
					{
					$modelRank->id_ponto = 2;
					}
                    $modelRank->save();
                }
            }
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
    public function actionOitavas() {

        $oitavasLista = array();
        $rankTime = array();
        $Criteria = new CDbCriteria();



        $rankTime = array("nome1" => ConfrontoController::GetPosicaoTime("1", "a")->nome
            , "escudo1" => ConfrontoController::GetPosicaoTime("1", "a")->escudo
            , "nome2" => ConfrontoController::GetPosicaoTime("2", "b")->nome
            , "escudo2" => ConfrontoController::GetPosicaoTime("2", "b")->escudo
        );
        array_push($oitavasLista, $rankTime);
        $rankTime = array("nome1" => ConfrontoController::GetPosicaoTime("1", "C")->nome
            , "escudo1" => ConfrontoController::GetPosicaoTime("1", "C")->escudo
            , "nome2" => ConfrontoController::GetPosicaoTime("2", "D")->nome
            , "escudo2" => ConfrontoController::GetPosicaoTime("2", "D")->escudo
        );
        array_push($oitavasLista, $rankTime);
        $rankTime = array("nome1" => ConfrontoController::GetPosicaoTime("1", "E")->nome
            , "escudo1" => ConfrontoController::GetPosicaoTime("1", "E")->escudo
            , "nome2" => ConfrontoController::GetPosicaoTime("2", "F")->nome
            , "escudo2" => ConfrontoController::GetPosicaoTime("2", "F")->escudo
        );
        array_push($oitavasLista, $rankTime);
        $rankTime = array("nome1" => ConfrontoController::GetPosicaoTime("1", "G")->nome
            , "escudo1" => ConfrontoController::GetPosicaoTime("1", "G")->escudo
            , "nome2" => ConfrontoController::GetPosicaoTime("2", "H")->nome
            , "escudo2" => ConfrontoController::GetPosicaoTime("2", "H")->escudo
        );
        array_push($oitavasLista, $rankTime);
        $rankTime = array("nome1" => ConfrontoController::GetPosicaoTime("1", "B")->nome
            , "escudo1" => ConfrontoController::GetPosicaoTime("1", "B")->escudo
            , "nome2" => ConfrontoController::GetPosicaoTime("2", "A")->nome
            , "escudo2" => ConfrontoController::GetPosicaoTime("2", "A")->escudo
        );
        array_push($oitavasLista, $rankTime);
        $rankTime = array("nome1" => ConfrontoController::GetPosicaoTime("1", "D")->nome
            , "escudo1" => ConfrontoController::GetPosicaoTime("1", "D")->escudo
            , "nome2" => ConfrontoController::GetPosicaoTime("2", "C")->nome
            , "escudo2" => ConfrontoController::GetPosicaoTime("2", "C")->escudo
        );
        array_push($oitavasLista, $rankTime);
        $rankTime = array("nome1" => ConfrontoController::GetPosicaoTime("1", "F")->nome
            , "escudo1" => ConfrontoController::GetPosicaoTime("1", "F")->escudo
            , "nome2" => ConfrontoController::GetPosicaoTime("2", "E")->nome
            , "escudo2" => ConfrontoController::GetPosicaoTime("2", "E")->escudo
        );
        array_push($oitavasLista, $rankTime);
        $rankTime = array("nome1" => ConfrontoController::GetPosicaoTime("1", "H")->nome
            , "escudo1" => ConfrontoController::GetPosicaoTime("1", "H")->escudo
            , "nome2" => ConfrontoController::GetPosicaoTime("2", "G")->nome
            , "escudo2" => ConfrontoController::GetPosicaoTime("2", "G")->escudo
        );
        array_push($oitavasLista, $rankTime);

        $this->render('oitavas', array(
            'dataProvider' => $oitavasLista,
        ));
    }

    public function GetPosicaoTime($posicao, $grupo) {
        $modelGrupo = new Grupo;
        $Criteria = new CDbCriteria();
        $Criteria->condition = "nome = '$grupo'";
        $classificacao = array();
       
        $modelGrupo = Grupo::model()->find($Criteria);
        $Criteria = new CDbCriteria();
        $Criteria->condition = "id_grupo=$modelGrupo->id";
        $model = GrupoTime::model()->findAll($Criteria);
        foreach ($model as $item) {
            $itemArray = array("id" => $item->id_time, "id_grupo" => $item->id_grupo, "nome" => $item->idTime->nome, "escudo" => $item->idTime->escudo, "pontos" => ConfrontoController::GetPontosDoTime($item->id_time)
              );
            array_push($classificacao, $itemArray);
        }

        $classificacao = ConfrontoController::aasort($classificacao, "pontos");
        $conta = 1;
        foreach ($classificacao as $item) {
            if ($conta == $posicao) {
                $time = Time::model()->findByPk($item["id"]);
            }
           $conta = $conta +1;
        }

        return $time;
    }
 public function GetPontosDoTime($id) {
            $pontos = 0;    
            $model = new Confronto;
            $Criteria = new CDbCriteria();
            $Criteria->condition = "vencedor=$id and empate = 0";
            
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
        $Criteria = new CDbCriteria();


        if ($id != 0) {
            $dataProvider = new CActiveDataProvider('Confronto', array(
                'criteria' => array(
                    'condition' => "id_grupo = $id",
                    'order' => 'data',
                ),
                'pagination' => array(
                    'pageSize' => 50,
                ),));
        } else {
            $dataProvider = new CActiveDataProvider('Confronto', array(
                'criteria' => array(
                    'condition' => 'data > "' . date("Y-m-d 00:00:00") . '"',
                    'order' => 'data',
                ),
                'pagination' => array(
                    'pageSize' => 50,
                ),));
        }
 
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'idGrupo' => $id,
        ));
    }

    public function actionAjax() {

        $this->render('ajax');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Confronto('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Confronto']))
            $model->attributes = $_GET['Confronto'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionGetConfronto($id) {
        $this->layout = false;
        header('Content-type: application/json');
        $arr = array();
        $Criteria = new CDbCriteria();

        $arrConfronto = array();
        if ($id != 0) {
            $Criteria->condition = "id_grupo = $id";
            $Criteria->order = "data";
            $confronto = Confronto::model()->findAll($Criteria);
        } else {
            $Criteria->order = "data";
            $confronto = Confronto::model()->findAll($Criteria);
        }

        foreach ($confronto as $item) {
            $dataHoje = strtotime(date("m/d/Y"));
            $dataExp = $item->data;


            array_push($arr, $item->id, $item->idGrupo->nome, $item->idTimeCasa->nome, $item->idTimeCasa->escudo, $item->idTimeVisitante->nome, $item->idTimeVisitante->escudo, $item->data, $item->placar_casa, $item->placar_visitante, $item->vencedor, $item->empate);
            array_push($arrConfronto, $arr);
            $arr = array();
        }

        echo json_encode($arrConfronto);

        Yii::app()->end();
    }

    public function GetNumeroApostaCasa($id) {
        $model = new Aposta;
        $Criteria = new CDbCriteria();

        $Criteria->condition = "id_confronto = $id and placar_casa > placar_visitante";

        $model = Aposta::model()->findAll($Criteria);
        $conta = 0;
        foreach ($model as $item) {
            $conta = $conta + 1;
        }
        return $conta;
    }

    public function GetNumeroApostaVisitante($id) {
        $model = new Aposta;
        $Criteria = new CDbCriteria();

        $Criteria->condition = "id_confronto = $id and placar_casa < placar_visitante";

        $model = Aposta::model()->findAll($Criteria);
        $conta = 0;
        foreach ($model as $item) {
            $conta = $conta + 1;
        }
        return $conta;
    }

    public function GetPorcentagemApostaCasa($id) {

        $apostasCasa = ConfrontoController::GetNumeroApostaCasa($id);
        $apostasVisitante = ConfrontoController::GetNumeroApostaVisitante($id);

        $total = 0;
        if ($apostasCasa != 0 && $apostasVisitante != 0) {
            $total = $apostasCasa / ($apostasCasa + $apostasVisitante) * 100;
        } else if ($apostasCasa != 0 && $apostasVisitante == 0) {
            $total = 100;
        }
        return $total;
    }

    public function GetPorcentagemApostaVisitante($id) {
        $apostasCasa = ConfrontoController::GetNumeroApostaCasa($id);
        $apostasVisitante = ConfrontoController::GetNumeroApostaVisitante($id);

        $total = 0;
        if ($apostasCasa != 0 && $apostasVisitante != 0) {
            $total = $apostasVisitante / ($apostasCasa + $apostasVisitante) * 100;
        } else if ($apostasCasa == 0 && $apostasVisitante != 0) {
            $total = 100;
        }
        return $total;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Confronto the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Confronto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Confronto $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'confronto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

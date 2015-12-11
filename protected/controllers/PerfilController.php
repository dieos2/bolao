<?php

class PerfilController extends Controller {

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
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create','Update', 'UpdateLoja','senha','trocasenha'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'GetGrafico'),
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
     public function actionCreate() {
        $model = new Arquiteto;
        $modelUser = new User;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Arquiteto'])) {
            $model->attributes = $_POST['Arquiteto'];
            $senha = uniqid("", true);
            $modelUser->password = $senha;
            $modelUser->username = $_POST['username'];
            $modelUser->email = trim($model->email);
            $modelUser->attributes = $modelUser;

            if ($modelUser->save()) {

                $model->id_user = $modelUser->id;
                if ($model->save()) {
                    $this->redirect(array('EnviaEmail', 'nomedestinatario' => $model->nome, "emaildestinatario" => $model->email, "nomedeusuario" => $modelUser->username, "senha" => $modelUser->password));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
 public function actionUpdate() {
        $model = Arquiteto::model()->findByPk($_POST['id']);
      
      
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        
            $model->attributes = $_POST['Arquiteto'];
            $modelUser =  User::model()->findByPk($model->id_user);
            $modelUser->attributes = $_POST['User'];

//            if ($modelUser->save()) {
//
               
             $model->update();
             $modelUser->update();
            $this->render('index');
                
//        $this->layout = false;
//        header('Content-type: application/json');
//            $id   = $_POST['User_username'];
//        echo json_encode($id);
//       
//        Yii::app()->end();
    }
 public function actionUpdateLoja() {
        $model = Loja::model()->findByPk($_POST['idloja']);
      
      
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        
            $model->attributes = $_POST['Loja'];
            $modelUser =  User::model()->findByPk($model->id_user);
            $modelUser->attributes = $_POST['User'];

//            if ($modelUser->save()) {
//
               
             $model->update();
             $modelUser->update();
            $this->render('index');
                
//        $this->layout = false;
//        header('Content-type: application/json');
//            $id   = $_POST['User_username'];
//        echo json_encode($id);
//       
//        Yii::app()->end();
    }
   public function actionSenha() {
      
            $modelUser =  User::model()->findByPk($_POST['id']);
            $modelUser->password = $_POST['passwordNova'];
            $modelUser->senha = 1;
            $modelUser->update();
            $this->redirect(array('site/index'));
                

    }
     public function actionTrocaSenha() {
            $model =  new User;
            $model = User::model()->findByPk(Yii::app()->user->getId());
            if($model->senha == 0){
            $this->renderPartial('trocasenha');
            }else
            {
                   $this->redirect(array('site/index'));
            }

    }
    public function actionIndex() {


        $this->render('index');
    }
     
    /**
     * Performs the AJAX validation.
     * @param Pontuacao $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pontuacao-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

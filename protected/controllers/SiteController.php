<?php



class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $this->redirect(array('confronto/index&id=0'));


        $this->render('index');
    }

    public function actionPc() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('pc');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }
 public function actionAtualiza() {
     
     
         $uri = 'http://api.football-data.org/v1/fixtures?matchday=1';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: a41e5fabfe4e47c3a1c6182573bf8297';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $fixtures = json_decode($response);
    foreach ($fixtures->fixtures as $resultados) {
        if($resultados->status !="TIMED"){
         $Criteria = new CDbCriteria();
            $Criteria->condition = "nomeOriginal = '$resultados->homeTeamName'";
             $timeCasa = Time::model()->find($Criteria);  
             
             $Criteria->condition = "nomeOriginal = '$resultados->awayTeamName'";
             $timeVisitante = Time::model()->find($Criteria);
              
             $Criteria->condition = "id_time_casa = $timeCasa->id and id_time_visitante = $timeVisitante->id";
            $confronto = Confronto::model()->find($Criteria);
            if($confronto->placar_casa != $resultados->result->goalsHomeTeam || $confronto->placar_visitante !=  $resultados->result->goalsAwayTeam){
            $confronto->placar_casa = $resultados->result->goalsHomeTeam;
             $confronto->placar_visitante = $resultados->result->goalsAwayTeam;
             if($confronto->placar_casa == $confronto->placar_visitante){
                 $confronto->empate = 1;
                 $confronto->vencedor = null;
             }else if($confronto->placar_casa > $confronto->placar_visitante) {
                 $confronto->vencedor = $timeCasa->id;
				  $confronto->empate = 0;
             }else{
                 $confronto->vencedor = $timeVisitante->id;
				  $confronto->empate = 0;
             }
        
         $model= $confronto;
            
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
            
            			  $Criteria = new CDbCriteria();
           
           $existe = Posicao::model()->find($Criteria);
          	if($existe == null){
                     $Criteria = new CDbCriteria();
        $Criteria->order = "id";
                    $usuarios = User::model()->findAll($Criteria);
                    foreach ($usuarios as $item) {
                        $posicao = new Posicao();
                        $posicao->id_user = $item->id;
                       
                        Yii::import('application.controllers.RankController');
                        $posicao->antiga = RankController::actionGetPosicao($item->id);
                        $posicao->atual = RankController::actionGetPosicao($item->id);
                        $posicao->save();
                    }
                }else
                {
                     $Criteria = new CDbCriteria();
        $Criteria->order = "id";
                    $usuarios = User::model()->findAll($Criteria);
                    foreach ($usuarios as $item) {
                        $Criteria = new CDbCriteria();
           $Criteria->condition = "id_user = $item->id";
                        $posicao = Posicao::model()->find($Criteria);
                        $posicao->id_user = $item->id;
                       
                        Yii::import('application.controllers.RankController');
                        $posicao->antiga = $posicao->atual;
                        $posicao->atual = RankController::actionGetPosicao($item->id);
                        $posicao->save();
                    }
                }
				 
		   $confronto->save();
		}
		}
            
    
    }
	
        $this->render('atualiza', array('model' => $fixtures->fixtures));
    }
    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;



	
        // if it is ajax validation request
     
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
          //   validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
               $id_user = Yii::app()->user->getId();
               $model = User::model()->findByPk($id_user);
                $sen = $model->senha;
                if (!$sen) {
                    $this->redirect(array('perfil/trocasenha'));
                } else {
                     $this->redirect(Yii::app()->user->returnUrl);
                }
               
            }
        }
               $this->renderPartial('login', array('model' => $model));

     
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
